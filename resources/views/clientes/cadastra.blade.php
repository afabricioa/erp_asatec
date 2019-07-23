@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="descricao">
            <h4 class="titulo-secao">Cadastro de cliente</h4>
        </div>
    </div>

    <div class="container">
        <form method="POST" action="{{ route('cliente.store') }}">
            @csrf
            <div class="form-group">
                <label class="titulo-detalhes" for="nome">Nome</label>
                <input type="text" name="nome" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}">
                @if ($errors->has('nome'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nome') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label class="titulo-detalhes" for="cpf">CPF</label>
                    <input type="text" name="cpf" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" value="{{ old('cpf') }}" maxlength="14" OnKeyPress="validar('###.###.###-##',this)">
                    
                    @if ($errors->has('cpf'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('cpf') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group col-md-4">
                    <label class="titulo-detalhes" for="rg">RG</label>
                    <input type="text" name="rg" class="form-control{{ $errors->has('rg') ? ' is-invalid' : '' }}" maxlength="9" OnKeyPress="validar('#.###.###', this)">
                    @if ($errors->has('rg'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('rg') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group col-sm-4">
                    <label class="titulo-detalhes" for="estadocivil">Estado Civil</label>
                    <select name="estadocivil" class="form-control form-control-md">
                        <option value="Solteiro">Solteiro(a)</option>
                        <option value="Casado">Casado(a)</option>
                        <option value="Divorciado">Divorciado(a)</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label class="titulo-detalhes" for="endereco">Endereço</label>
                    <input type="text" name="endereco" class="form-control{{ $errors->has('endereco') ? ' is-invalid' : '' }}">
                    @if ($errors->has('endereco'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('endereco') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group col-md-4">
                    <label class="titulo-detalhes" for="bairro">Bairro</label>
                    <input type="text" name="bairro" class="form-control{{ $errors->has('bairro') ? ' is-invalid' : '' }}">
                    @if ($errors->has('bairro'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('bairro') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="titulo-detalhes" for="profissao">Ocupação</label>
                <input type="text" name="profissao" class="form-control{{ $errors->has('profissao') ? ' is-invalid' : '' }}">
                @if ($errors->has('profissao'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('profissao') }}</strong>
                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
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