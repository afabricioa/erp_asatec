@extends('layouts.app')

@section('content')
    <div class="text-center">
        <form id="formulario" method="POST" action="#">
            @csrf
            <img class="mb-3" src="/../imgs/asatec.png" width="140" height="100">
            <h3>Acompanhe seu processo</h3>
            <br>
            <div class="form-group row">
                <label for="cpf" class="sr-only">CPF</label>
                <input id="cpf" type="text" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf" value="{{ old('cpf') }}" placeholder="CPF" required autofocus>

                @if ($errors->has('cpf'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('cpf') }}</strong>
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
                    <button type="submit" class="btn btn-lg btn-primary btn-block">
                        Visualizar
                    </button>

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