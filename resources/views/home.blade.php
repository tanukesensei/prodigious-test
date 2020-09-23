@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <h2 class="mb-4 text-center" >{{ __('home.welcome.myTest') }}</h2>


                <div class="row">
                    @can('store-user')
                        <div class="col-md-6 col-12">
                            <a href="{{ route('users.create') }}" class="btn btn-success btn-block text-light btn-lg">
                                {{__('buttons.add.coworker')}}
                            </a>
                        </div>
                    @endcan

                    <div class="
                        @can('store-user')
                            col-md-6 col-12
                        @else
                            col-md-12 col-12
                        @endcan
                    ">
                        <a href="{{route('users.index')}}" class="btn btn-info btn-block text-light btn-lg">
                            {{__('buttons.list.users')}}
                        </a>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>
@endsection
