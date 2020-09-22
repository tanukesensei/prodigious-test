<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('store-user')) {
            return response()->view('errors.generic', [], 403);
        }

        return view('admin_registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('store-user')) {
            return response()->view('errors.generic', [], 403);
        }

        $data = $request->all();
        $data['is_admin'] = $data['is_admin'] ?? false;
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'is_admin' => ['boolean'],
            'avatar' => ['image','max:102400'],
            'description' =>['string', 'max:300'],
            ]);

            if ($validator->fails()) {
                return redirect()->route('admin_registration')
                ->withErrors($validator)
                ->withInput();
            }

        $user = User::createFromData($data);

        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $avatarName = $user->id.'.'.time().'.'.$file->extension();
            $file->move(public_path('uploads'), $avatarName);
            $user->avatar = $avatarName;
            $user->save();
        }

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        if (Gate::denies('update-user', $user)) {
            return response()->view('errors.generic', [], 403);
        }

        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (Gate::denies('update-user', $user)) {
            return response()->view('errors.generic', [], 403);
        }

        $data = $request->all();
        $data['is_admin'] = $data['is_admin'] ?? false;
        if(!Auth::user()->is_admin) {
            $data['is_admin'] = $user->is_admin;
        }

        $validator = Validator::make($data, [
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'username' => ['string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['sometimes', 'string', 'min:8', 'confirmed'],
            'is_admin' => ['boolean'],
            'avatar' => ['image','max:10240'],
            'description' =>['string', 'max:300'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.edit', $user->id)
                ->withErrors($validator)
                ->withInput();
        }

        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $avatarName = $user->id.'.'.time().'.'.$file->extension();
            $file->move(public_path('uploads'), $avatarName);
            $user->avatar = $avatarName;
        }

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->username = $data['username'];

        if(!empty(trim($data['password']))) {
            $user->password = $data['password'];
        }
        $user->is_admin = $data['is_admin'];
        $user->description = $data['description'];
        $user->save();
        return redirect()->route('users.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!Gate::denies('destroy-user', $user)) {
            return abort(403, 'Unauthorized action.');
        }

        $user->delete();

        return redirect()->route('users.index');
    }
}
