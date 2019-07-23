@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="descricao">
            <h4 class="titulo-secao">Empresas cadastradas</h4>
        </div>
    </div>

    <div class="container">
        <button class="btn btn-asatec bt esquerda" data-toggle="collapse" data-target="#cadastro" aria-controls="cadastro">Nova Empresa</button>
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Razão Social</th>
                    <th scope="col">CNPJ</th>
                </tr>
                <tbody>
                    @foreach ($empresas as $empresa)
                        <tr>
                            <td>{{ $empresa->nome }}</td>
                            <td>{{ $empresa->cnpj }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </thead>
        </table>

        <div class="collapse hide" id="cadastro">
            <form method="POST" action="/cadastrarEmpresa">
                @csrf
                <div class="form-group">
                    <p class="titulo-detalhes">Nome da Empresa
                    <input type="text" name="nome" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}">
                    
                    @if ($errors->has('nome'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nome') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <p class="titulo-detalhes">CNPJ
                        <input type="text" name="cnpj" class="form-control{{ $errors->has('cnpj') ? ' is-invalid' : '' }}" value="{{ old('cnpj') }}" maxlength="18" OnKeyPress="validar('##.###.###/####-##',this)">        
                        @if ($errors->has('cnpj'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('cnpj') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <p class="titulo-detalhes">Endereço
                        <input type="text" name="endereco" class="form-control{{ $errors->has('endereco') ? ' is-invalid' : '' }}">
                        @if ($errors->has('endereco'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('endereco') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <p class="titulo-detalhes">Bairro
                        <input type="text" name="bairro" class="form-control{{ $errors->has('bairro') ? ' is-invalid' : '' }}">
                        @if ($errors->has('bairro'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('bairro') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <p class="titulo-detalhes">Cidade
                        <input type="text" name="cidade" class="form-control{{ $errors->has('cidade') ? ' is-invalid' : '' }}">
                        
                        @if ($errors->has('cidade'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('cidade') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <p class="titulo-detalhes">Estado
                        <input type="text" name="estado" class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}">
                        
                        @if ($errors->has('estado'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('estado') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>

    </div>

    <script>

        $('.collapse').on('click', function (){
            $('#cadastro.in').toggleClass('in');
        });

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