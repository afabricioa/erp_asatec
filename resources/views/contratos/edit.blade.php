@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <h2>Novo contrato</h2>
            </div>
        </div>
    </div>

    <div class="container">
        <form method="POST" action="{{ route('contrato.update', $contrato->cliente_cpf) }}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <input type="text" name="cpf_cliente" class="form-control" value="{{ $contrato->cliente_cpf }}">
            </div>
            <div class="form-group">
                <input type="text" name="corretor" class="form-control{{ $errors->has('corretor') ? ' is-invalid' : '' }}" placeholder="Corretor">
                @if ($errors->has('corretor'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('corretor') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <input type="text" name="empreendimento" class="form-control{{ $errors->has('empreendimento') ? ' is-invalid' : '' }}" placeholder="Empreendimento">
                @if ($errors->has('empreendimento'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('empreendimento') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-row">
                <div class="form-group col-sm-4">
                    <select name="tipodacasa" class="form-control form-control-md">
                        <option value="C1">C1</option>
                        <option value="C2">C2</option>
                        <option value="C3">C3</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="lote" class="form-control{{ $errors->has('lote') ? ' is-invalid' : '' }}" placeholder="Lote">
                    @if ($errors->has('lote'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('lote') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group col-sm-4">
                    <input type="number" name="planta" class="form-control{{ $errors->has('planta') ? ' is-invalid' : '' }}" placeholder="Plata(m²)" min="0">
                    @if ($errors->has('planta'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('planta') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="endereco" class="form-control{{ $errors->has('endereco') ? ' is-invalid' : '' }}" placeholder="Endereço">
                    @if ($errors->has('endereco'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('endereco') }}</strong>
                        </span>
                    @endif
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="number" name="tamanhoLote" class="form-control{{ $errors->has('tamanhoLote') ? ' is-invalid' : '' }}" placeholder="Lote(m²)" min="0">
                    @if ($errors->has('tamanhoLote'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('tamanhoLote') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group col-md-4">
                    <input type="number" name="valorLote" class="form-control{{ $errors->has('valorLote') ? ' is-invalid' : '' }}" placeholder="Valor do Lote" min="0">
                    @if ($errors->has('valorLote'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('valorLote') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group col-sm-4">
                    <input type="number" name="valorPlanta" class="form-control{{ $errors->has('valorPlanta') ? ' is-invalid' : '' }}" placeholder="Valor da Planta" min="0">
                    @if ($errors->has('valorPlanta'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('valorPlanta') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>

    <script>
        function validar(formato, valor){
            var i = valor.value.length;
            var saida = formato.substring(0,1);
            var texto = formato.substring(i);

            if(texto.substring(0,1) != saida){
                valor.value += texto.substring(0,1);
            }
        }
    </script>
@endsection