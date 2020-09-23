@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('headers.create.coworkers')}}</div>

                <div class="card-body">
                    @include('shared.user_register_form', ['route_name' => 'register'])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
