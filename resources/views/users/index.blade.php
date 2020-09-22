@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <table class="table table-striped table-dark">
                    <tr>
                        <th>
                            {{__('fields.users.name')}}
                        </th>
                        <th>
                            {{__('fields.users.e-mail adress')}}
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

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
