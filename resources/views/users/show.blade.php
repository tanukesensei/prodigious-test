@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>{{ $user->username }}</h4></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <img src="/uploads/{{ $user->avatar }}" alt="{{$user->avatar}}" class="rounded-circle mx-auto d-block my-4" style="width:250px; height:250px; object-fit:cover;" >
                            </div>

                            <div class="col-lg-8 col-12">
                                <h3 class="mb-3 mx-md-5 mx-2 mt-5" > <b>{{ __('fields.users.name') }} :</b> {{$user->name}}  </h3>
                                <h3 class="mb-3 mx-md-5 mx-2" > <b>{{ __('fields.users.email')}}  :</b> {{$user->email}} </h3>
                                <h3 class="mb-3 mx-md-5 mx-2" > <b>{{ __('fields.users.description')}}  :</b> {{$user->description}} </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
