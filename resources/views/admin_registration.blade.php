@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>{{__('headers.register.coworkers')}}</h4></div>
                <div class="card-body">

                    @include('shared.user_register_form', ['route_name' => 'user_store'])

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
