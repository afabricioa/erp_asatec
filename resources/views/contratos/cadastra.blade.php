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
        <form method="POST" action="{{ route('contrato.store') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="cpf_cliente" class="form-control" placeholder="CPF" maxlength="14" OnKeyPress="validar('###.###.###-##',this)" required>
            </div>
            <div class="form-group">
                <input type="text" name="corretor" class="form-control" placeholder="Corretor" required>
            </div>
            <div class="form-group">
                <input type="text" name="empreendimento" class="form-control" placeholder="Empreendimento" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" name="quadra" class="form-control" placeholder="Quadra">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="lote" class="form-control" placeholder="Lote">
                </div>
                <div class="form-group col-sm-4">
                    <input type="number" name="planta" class="form-control" placeholder="Plata(m²)" min="0">
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="endereco" class="form-control" placeholder="Endereço">
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="number" name="tamanhoLote" class="form-control" placeholder="Lote(m²)" min="0">
                </div>
                <div class="form-group col-md-4">
                    <input type="number" name="valorLote" class="form-control" placeholder="Valor do Lote" min="0">
                </div>
                <div class="form-group col-sm-4">
                    <input type="number" name="valorPlanta" class="form-control" placeholder="Valor da Planta" min="0">
                </div>
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