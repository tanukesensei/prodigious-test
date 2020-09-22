@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>{{ $user->username }}</h4></div>
                <div class="card-body">

                    <img src="/uploads/{{ $user->avatar }}" alt="{{$user->avatar}}" class="rounded-circle" style="width: 75px; height: 75px;">

                    <p> <b>{{ __('fields.users.name') }} :</b> {{$user->name}}  </p>
                    <p> <b>{{ __('fields.users.e-mail adress')}}  :</b> {{$user->email}} </p>
                    <p> <b>{{ __('fields.users.description')}}  :</b> {{$user->description}} </p>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
