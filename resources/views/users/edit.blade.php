@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>Editar Colaboradores</h4></div>
                <div class="card-body">

                    @include('shared.user_edit_form', ['user' => $user])

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
