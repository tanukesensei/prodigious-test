@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="">
                <table class="table table-striped ">
                <thead>
                                       <tr>
                        <th>
                            {{__('fields.users.name')}}
                        </th>
                        <th>
                            {{__('fields.users.email')}}
                        </th>
                        <th>
                            {{__('fields.users.username')}}
                        </th>
                        <th>
                            {{__('head.table.role')}}
                        </th>

                        <th></th>

                        <th>{{__('head.table.actions')}}</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                                        @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->username }}</td>
                        <td>
                            @if($user->is_admin)
                                {{__('table.field.administrator')}}
                            @else
                                {{__('table.field.coworker')}}
                            @endif
                        </td>

                        <td><a href="{{ route('users.show', $user->id) }}" class="btn btn-primary" role="button">{{__('buttons.visualize')}}</a></td>
                        <td>
                            @can('update-user', $user)
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success" role="button">{{__('buttons.edit')}}</a>
                            @endcan
                        </td>

                        <td>
                            @can('destroy-user')
                                <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                    @CSRF
                                    @method('DELETE')

                                    <button class="btn btn-danger" role="button">{{__('buttons.delete')}}</button>
                                </form>
                            @endcan
                        </td>

                    </tr>
                    @endforeach

                </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
