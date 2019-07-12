@extends('layouts.app')

@section('content')
    <div class="text-center">
        @if(Session::has('msg'))
            <div class="modal fade" id="modalErro" tabindex="-1" role="dialog" aria-labelledby="modalErro" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-white" id="modalErro">ASATEC</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ $message }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-asatec-azul" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <form id="formulario" method="POST" action="/buscar" role="search">
            @csrf
            <img class="mb-4" src="/../imgs/astcv2.png" width="140" height="100">
            <h4>Acompanhamento do Processo</h4>
            <div class="form-group row">
                <label for="cliente_cpf" class="sr-only">CPF</label>
                <input id="cliente_cpf" type="text" class="form-control{{ $errors->has('cliente_cpf') ? ' is-invalid' : '' }}" name="cliente_cpf" value="{{ old('cliente_cpf') }}" placeholder="CPF" autofocus>

                @if ($errors->has('cliente_cpf'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('cliente_cpf') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group row">
                <button type="submit" class="btn btn-lg btn-primary btn-block">
                    Visualizar
                </button>
            </div>
            <p class="mt-5 mb-3 text-muted">© 2019. Construtora ASATEC</p>
        </form>
    </div>

    <script>
        $('#modalErro').modal('show');
    </script>
@endsection