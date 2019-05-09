@extends('layouts.app')

@section('content')
    <div class="text-center">
        <form id="formulario" method="POST" action="{{ route('login') }}">
            @csrf
            <h3>Acompanhe seu processo</h3>
            <br>
            <div class="form-group row">
                <label for="email" class="sr-only">Email</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group row">
                <label for="password" class="sr-only">Senha</label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Senha" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group row">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        Lembrar
                    </label>
                </div>
            </div>

            <div class="form-group row">
                    <button type="submit" class="btn btn-lg btn-primary btn-block">
                        Login
                    </button>
                    <a  href="#" class="btn btn-lg btn-asatec btn-block">
                        Área do Cliente
                    </a>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Esqueceu a senha?
                        </a>
                    @endif
            </div>
            <p class="mt-5 mb-3 text-muted">ASATEC © 2019</p>
        </form>
    </div>
@endsection