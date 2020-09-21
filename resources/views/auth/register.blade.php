@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cadastro de Usuários</div>

                <div class="card-body">
                    @include('shared.user_register_form', ['route_name' => 'register'])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
