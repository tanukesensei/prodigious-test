<form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{__('fields.users.name')}}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">Endereço de E-mail</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email  }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="username" class="col-md-4 col-form-label text-md-right">Usuário</label>

        <div class="col-md-6">
            <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') ?? $user->username }}" required autocomplete="username">

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

     @auth
        @if(Auth::user()->is_admin)
            <div class="form-group row">
                <label for="is_admin" class="col-md-4 col-form-label text-md-right">Administrador?</label>

                <div class="col-md-6">
                    <input id="is_admin" type="checkbox" class="form-control @error('is_admin') is-invalid @enderror" @if((old('is_admin') ?? $user->is_admin) === '1') checked @endif name="is_admin" value="1">

                    @error('is_admin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

        @endif
    @endauth

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Senha</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
        </div>
    </div>

    <div class="form-group row">
        <label for="avatar" class="col-md-4 col-form-label text-md-right">{{__('fields.users.avatar')}}</label>

        <div class="col-md-6">
            <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" accept="image/*">

            @error('avatar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Editar') }}
            </button>
        </div>
    </div>
</form>
