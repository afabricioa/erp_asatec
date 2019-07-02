@extends('layouts.app')

@section('content')
    <div class="text-center">
        @if(isset($message))
            <div class="modal fade" id="modalErro" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalDelete">ASATEC</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ $message }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <form id="formulario" method="POST" action="/buscar" role="search">
            @csrf
            <h4>Acompanhamento do Processo</h4>
            <div class="form-group row">
                <label for="cpf" class="sr-only">cpf</label>
                <input id="cpf" type="text" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf" value="{{ old('cpf') }}" placeholder="CPF" required autofocus>

                @if ($errors->has('cpf'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('cpf') }}</strong>
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