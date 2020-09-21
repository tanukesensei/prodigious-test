@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <table class="table table-striped table-dark">
                    <tr>
                        <th>
                            Nome
                        </th>
                        <th>
                            E-mail
                        </th>
                        <th>
                            Usuário
                        </th>
                        <th>
                            Cargo
                        </th>

                        <th></th>

                        <th>Ações</th>
                        <th></th>
                    </tr>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->username }}</td>
                        <td>
                            @if($user->is_admin)
                                Administrador
                            @else
                                Colaborador
                            @endif
                        </td>

                        <td><a href="{{ route('home') }}" class="btn btn-primary" role="button">Visualizar</a></td>
                        <td>
                            @can('update-user', $user)
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success" role="button">Editar</a>
                            @endcan
                        </td>

                        <td>
                            @can('destroy-user')
                                <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                    @CSRF
                                    @method('DELETE')

                                    <button class="btn btn-danger" role="button">Excluir</button>
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
