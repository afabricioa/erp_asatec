@extends('layouts.app')

@section('content')
    @if (empty($contrato->cliente_cpf))
        <div id="restrita">
            Registro não encontrado, retorne para a página 
            <br><a style="color: #f49332" href="{{ route('contrato.index') }}">Inicial</a>
        </div>
    @else
        <div class="row justify-content-center">
            <div class="descricao">
                <h4 class="titulo-secao">Novo contrato</h4>
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
                    <input type="text" name="corretor" class="form-control{{ $errors->has('corretor') ? ' is-invalid' : '' }}" placeholder="Corretor" value="{{ $contrato->corretor }}">
                    @if ($errors->has('corretor'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('corretor') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="text" name="empreendimento" class="form-control{{ $errors->has('empreendimento') ? ' is-invalid' : '' }}" placeholder="Empreendimento" value="{{ $contrato->empreendimento }}">
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
                        <input type="text" name="lote" class="form-control{{ $errors->has('lote') ? ' is-invalid' : '' }}" placeholder="Lote" value="{{ $contrato->lote }}">
                        @if ($errors->has('lote'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('lote') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-sm-4">
                        <input type="number" name="planta" class="form-control{{ $errors->has('planta') ? ' is-invalid' : '' }}" placeholder="Plata(m²)" min="0" value="{{ $contrato->planta }}">
                        @if ($errors->has('planta'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('planta') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="endereco" class="form-control{{ $errors->has('endereco') ? ' is-invalid' : '' }}" placeholder="Endereço" value="{{ $contrato->endereco }}">
                        @if ($errors->has('endereco'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('endereco') }}</strong>
                            </span>
                        @endif
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <input type="number" name="tamanhoLote" class="form-control{{ $errors->has('tamanhoLote') ? ' is-invalid' : '' }}" placeholder="Lote(m²)" min="0" value="{{ $contrato->tamanhoLote }}">
                        @if ($errors->has('tamanhoLote'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('tamanhoLote') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <input type="number" name="valorLote" class="form-control{{ $errors->has('valorLote') ? ' is-invalid' : '' }}" placeholder="Valor do Lote" min="0" value="{{ $contrato->valorLote }}">
                        @if ($errors->has('valorLote'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('valorLote') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-sm-4">
                        <input type="number" name="valorPlanta" class="form-control{{ $errors->has('valorPlanta') ? ' is-invalid' : '' }}" placeholder="Valor da Planta" min="0" value="{{ $contrato->valorPlanta }}">
                        @if ($errors->has('valorPlanta'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('valorPlanta') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-sm-4">
                        <input type="number" name="entrada" class="form-control{{ $errors->has('entrada') ? ' is-invalid' : '' }}" placeholder="Valor da Entrada" min="0" value="{{ $contrato->entrada }}">
                        @if ($errors->has('entrada'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('entrada') }}</strong>
                            </span>
                        @endif
                    </div>
                    <br>
                </div>
                <label for="formGroupExampleInput">Construção do Muro</label>
                <div class="form-check">
                    <input class="form-check-input" name="muro" type="radio" value="sim" id="sim">
                    <label class="form-check-label" for="sim">
                        Sim
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="muro" type="radio" value="nao" id="nao">
                    <label class="form-check-label" for="nao">
                        Não 
                    </label>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    @endif
    

    <script>
        function validar(formato, valor){
            var i = valor.value.length;
            var saida = formato.substring(0,1);
            var texto = formato.substring(i);

            if(texto.substring(0,1) != saida){
                valor.value += texto.substring(0,1);
            }
        }

        if("{{ $contrato->muro }}" == "sim"){
            document.getElementById("sim").checked = true;
        }else{
            document.getElementById("nao").checked = true;
        }
    </script>
@endsection