@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <h2>Cadastrar novo cliente</h2>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="text-center">
            <h4>Insira as informações do cliente</h4>
        </div>
        <br>
        <form method="POST" action="{{ route('cliente.store') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="nome" class="form-control" placeholder="Nome" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" name="cpf" class="form-control" placeholder="CPF" maxlength="14" OnKeyPress="validar('###.###.###-##',this)">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="rg" class="form-control" placeholder="RG" maxlength="9" OnKeyPress="validar('#.###.###', this)">
                </div>
                <div class="form-group col-sm-4">
                    <select name="estadocivil" class="form-control form-control-md">
                        <option value="Solteiro">Solteiro(a)</option>
                        <option value="Casado">Casado(a)</option>
                        <option value="Divorciado">Divorciado(a)</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="endereco" class="form-control" placeholder="Endereço">
            </div>
            <div class="form-group">
                <input type="text" name="profissao" class="form-control" placeholder="Ocupação">
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