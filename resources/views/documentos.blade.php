@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="descricao">
            <h4 class="titulo-secao">Gerar Documentos</h4>
        </div>
    </div>
    <p class="titulo-detalhes">Selecione o tipo de documento
    <form method="post" action="/relatorio" target="_blank">
        @csrf
        <div class="row">
            <div class="form-check" style="margin: 20px">
                <input class="form-check-input" name="documento" type="radio" value="procuracao" id="procuracao">
                <label class="form-check-label" for="procuracao">
                    <strong>Procuração</strong>
                </label> 
            </div>
            <div class="form-check" style="margin: 20px">
                <input class="form-check-input" name="documento" type="radio" value="viabilidade" id="viabilidade">
                <label class="form-check-label" for="viabilidade">
                    <strong>Viabilidade</strong>
                </label>
            </div>
        </div>
        <div class="form-group" id="informacoes">
        </div>

        <button type="submit" class="btn btn-danger text-white">Gerar
        </button>
    </form>
    
         
</div>

<script>
    $('input:radio[name="documento"]').change(function(){
        var labelEmpresa = document.createElement('label');
        labelEmpresa.class = "form-check-label";
        labelEmpresa.for = "empresa";
        labelEmpresa.innerHTML = "Nome da Empresa";

        var labelData = document.createElement('label');
        labelData.class = "form-check-label";
        labelData.for = "dataprocuracao";
        labelData.innerHTML = "Validade da Procuração";

        var empresa = $('<input />',{
            'class': 'form-control form-control-md',
            'id': 'empresa',
            'name': 'empresa',
            'type': 'text',
            'placeholder': 'Empresa',
            'style': 'margin-bottom: 15px'
        });

        var dataProcuracao = $('<input />',{
            'name': 'dataprocuracao',
            'id': 'dataprocuracao',
            'class': 'form-control col-md-4',
            'type': 'date'
        });


        var valor = $("input[name=documento]:checked").val();
        if(valor == "procuracao"){
            var listaclientes = [
                @foreach ($clientes as $cliente)
                    {val : "{{ $cliente->cpf }}", text1: "{{ $cliente->nome }}"},
                @endforeach
            ];

            var sel = $('<select multiple class="form-control" name="cpf" style="margin-bottom: 15px">').appendTo('#informacoes');
            $(listaclientes).each(function() {
                sel.append($("<option>").attr('value',this.val).text(this.text1));
            });
            
            $(labelEmpresa).appendTo('#informacoes');
            $(empresa).appendTo('#informacoes');
            $(labelData).appendTo('#informacoes');
            $(dataProcuracao).appendTo('#informacoes');
            $("#viabilidade").addClass("disabled").prop("disabled", true);
        }
    });
    
</script>
@endsection
