@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome!') }}
                </div>
            </div>

            @can('store-user')
                <div class="card">
                    <div class="card-body">
                        <div>
                        <a href="{{ route('admin_registration') }}" class="form-control">
                            Adicionar Colaborador
                        </a>
                        </div>
                    </div>
                </div>
            @endcan

            <div class="card">
                <div class="card-body">
                    <div>
                      <a href="{{route('users.index')}}" class="form-control">
                        Listar Usuários
                      </a>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
