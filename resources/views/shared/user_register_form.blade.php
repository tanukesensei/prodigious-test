<form method="POST" action="{{ route($route_name) }}" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('fields.users.name')}}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{__('fields.users.email')}}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="username" class="col-md-4 col-form-label text-md-right">{{__('fields.users.username')}}</label>

        <div class="col-md-6">
            <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{__('fields.users.password')}}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{__('fields.users.password_confirmation')}}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div>


    @auth
        @if(Auth::user()->is_admin)

        <div class="form-group row">
            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{__('fields.users.avatar')}}</label>

            <div class="col-md-6">
                <input id="avatar" type="file" class=" @error('avatar') is-invalid @enderror" name="avatar" accept="image/*">

                @error('avatar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        @endif
    @endauth

    @auth
        @if(Auth::user()->is_admin)

            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">{{__('fields.users.description')}}</label>

                <div class="col-md-6">
                    <textarea id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="is_admin" class="col-md-4 col-form-label text-md-right">{{__('fields.users.is_admin')}}</label>

                <div class="col-md-6">
                    <input id="is_admin" type="checkbox" class="form-control @error('is_admin') is-invalid @enderror" @if(old('is_admin') === '1') checked @endif name="is_admin" value="1">

                    @error('is_admin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        @endif
    @endauth


            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        @if(Auth::check())
                            {{ __('buttons.register.coworker') }}
                        @else
                            {{ __('Register') }}
                        @endif
                    </button>
                </div>
            </div>

</form>
