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
            <div class="form-check" style="margin: 20px">
                <input class="form-check-input" name="documento" type="radio" value="contrato" id="contrato">
                <label class="form-check-label" for="contrato">
                    <strong>Contrato de Compra e Venda</strong>
                </label>
            </div>
        </div>
        <div class="form-group titulo-detalhes" id="formProcuracao">
        </div>
        <div class="form-group titulo-detalhes" id="formViabilidade">
        </div>
        <div class="form-group titulo-detalhes" id="formContrato">
        </div>

        <button type="submit" class="btn btn-danger text-white">Visualizar
        </button>
    </form>
    
         
</div>

<script>

    $('input:radio[name="documento"]').change(function(){
        function validar(formato, valor){
            var i = valor.value.length;
            var saida = formato.substring(0,1);
            var texto = formato.substring(i);

            if(texto.substring(0,1) != saida){
                valor.value += texto.substring(0,1);
            }
        }
        var labelEmpresa = document.createElement('label');
        labelEmpresa.class = "form-check-label";
        labelEmpresa.for = "empresa";
        labelEmpresa.innerHTML = "Nome da Empresa";

        var empresa = $('<input />',{
            'class': 'form-control form-control-md',
            'id': 'empresa',
            'name': 'empresa',
            'type': 'text',
            'placeholder': 'Empresa',
            'style': 'margin-bottom: 15px'
        });

        var labelCliente = document.createElement('label');
        labelCliente.class = "form-check-label";
        labelCliente.for = "cliente";
        labelCliente.innerHTML = "Cliente";

        var cliente = $('<input />',{
            'class': 'form-control form-control-md',
            'id': 'cliente',
            'name': 'cliente',
            'type': 'text',
            'placeholder': 'Cliente',
            'style': 'margin-bottom: 15px'
        });

        var labelLoteamento = document.createElement('label');
        labelLoteamento.class = "form-check-label";
        labelLoteamento.for = "loteamento";
        labelLoteamento.innerHTML = "Loteamento";

        var loteamento = $('<input />',{
            'class': 'form-control form-control-md cold-md-4',
            'id': 'loteamento',
            'name': 'loteamento',
            'type': 'text',
            'placeholder': 'Loteamento',
            'style': 'margin-bottom: 15px'
        });

        var labelData = document.createElement('label');
        labelData.class = "form-check-label";
        labelData.for = "dataprocuracao";
        labelData.innerHTML = "Validade da Procuração";

        var dataProcuracao = $('<input />',{
            'name': 'dataprocuracao',
            'id': 'dataprocuracao',
            'class': 'form-control col-md-4',
            'type': 'date',
            'style': 'margin-bottom: 15px'
        });

        var labelQuadra = document.createElement('label');
        labelQuadra.class = "form-check-label";
        labelQuadra.for = "quadra";
        labelQuadra.innerHTML = "Quadra";

        var quadra = $('<input />',{
            'class': 'form-control form-control-md col-md-4',
            'id': 'quadra',
            'name': 'quadra',
            'type': 'text',
            'placeholder': 'Quadra',
            'style': 'margin-bottom: 15px'
        });

        var labelLote = document.createElement('label');
        labelLote.class = "form-check-label";
        labelLote.for = "lote";
        labelLote.innerHTML = "Lote";

        var lote = $('<input />',{
            'class': 'form-control form-control-md col-md-4',
            'id': 'lote',
            'name': 'lote',
            'type': 'text',
            'placeholder': 'Lote',
            'style': 'margin-bottom: 15px'
        });


        var valor = $("input[name=documento]:checked").val();
        if(valor == "procuracao"){
            var listaclientes = [
                @foreach ($clientes as $cliente)
                    {val : "{{ $cliente->cpf }}", text1: "{{ $cliente->nome }}"},
                @endforeach
            ];

            var sel = $('<select multiple class="form-control" name="cpf" style="margin-bottom: 15px">').appendTo('#formProcuracao');
            $(listaclientes).each(function() {
                sel.append($("<option>").attr('value',this.val).text(this.text1));
            });
            
            $(labelEmpresa).appendTo('#formProcuracao');
            $(empresa).appendTo('#formProcuracao');
            $(labelData).appendTo('#formProcuracao');
            $(dataProcuracao).appendTo('#formProcuracao');
            
            $("#viabilidade").addClass("disabled").prop("disabled", true);
            $("#contrato").addClass("disabled").prop("disabled", true);
        }else if(valor == 'viabilidade'){
            $(labelEmpresa).appendTo('#formViabilidade');
            var empresas = [
                {val: 'aguas', text: 'Águas de Teresina'},
                {val: 'equatorial', text: 'Equatorial Energia'}
            ]

            var sel = $('<select multiple class="form-control" name="empresa" style="margin-bottom: 15px">').appendTo('#formViabilidade');
            $(empresas).each(function() {
                sel.append($("<option>").attr('value',this.val).text(this.text));
            });
            
            $(labelLoteamento).appendTo('#formViabilidade');
            $(loteamento).appendTo('#formViabilidade');

            $(labelQuadra).appendTo('#formViabilidade');
            $(quadra).appendTo('#formViabilidade');

            $("#procuracao").addClass("disabled").prop("disabled", true);
            $("#contrato").addClass("disabled").prop("disabled", true);
        }else if(valor == 'contrato'){
            $(labelCliente).appendTo('#formContrato');
            var listaclientes = [
                @foreach ($clientes as $cliente)
                    {val : "{{ $cliente->cpf }}", text1: "{{ $cliente->nome }}"},
                @endforeach
            ];

            var sel = $('<select multiple class="form-control" name="cpf" style="margin-bottom: 15px">').appendTo('#formContrato');
            $(listaclientes).each(function() {
                sel.append($("<option>").attr('value',this.val).text(this.text1));
            });
            $(labelEmpresa).appendTo('#formContrato');
            var listaEmpresas = [
                @foreach ($empresas as $empresa)
                    {val : "{{ $empresa->cnpj }}", text: "{{ $empresa->nome }}"},
                    {val : "222", text: "teste"},
                @endforeach
            ];

            var sel = $('<select class="form-control" id="empresas" onchange="changeFunc()" name="cnpj" style="margin-bottom: 15px">').appendTo('#formContrato');
            $(listaEmpresas).each(function() {
                sel.append($("<option>").attr('value',this.val).text(this.text));
            });

            var labelIMO = document.createElement('label');
            labelIMO.class = "form-check-label";
            labelIMO.for = "imo";
            labelIMO.innerHTML = "Inscrição Municipal";

            var imo = $('<input />',{
                'class': 'form-control form-control-md col-md-4',
                'id': 'imo',
                'name': 'imo',
                'type': 'text',
                'placeholder': 'IMO',
                'style': 'margin-bottom: 15px'
            });

            var labelPerimetro = document.createElement('label');
            labelPerimetro.class = "form-check-label";
            labelPerimetro.for = "perimetro";
            labelPerimetro.innerHTML = "Perímetro";

            var perimetro = $('<input />',{
                'class': 'form-control form-control-md col-md-4',
                'id': 'perimetro',
                'name': 'perimetro',
                'type': 'number',
                'min': '0',
                'placeholder': 'm²',
                'style': 'margin-bottom: 15px'
            });

            var labelEsquerda = document.createElement('label');
            labelEsquerda.class = "form-check-label";
            labelEsquerda.for = "esquerda";
            labelEsquerda.innerHTML = "Esquerda";

            var esquerda = $('<input />',{
                'class': 'form-control form-control-md col-md-4',
                'id': 'esquerda',
                'name': 'esquerda',
                'type': 'text',
                'placeholder': 'm²',
                'style': 'margin-bottom: 15px'
            });

            var labelDireita = document.createElement('label');
            labelDireita.class = "form-check-label";
            labelDireita.for = "direita";
            labelDireita.innerHTML = "Direita";

            var direita = $('<input />',{
                'class': 'form-control form-control-md col-md-4',
                'id': 'direita',
                'name': 'direita',
                'type': 'text',
                'placeholder': 'm²',
                'style': 'margin-bottom: 15px'
            });

            var labelFundo = document.createElement('label');
            labelFundo.class = "form-check-label";
            labelFundo.for = "fundo";
            labelFundo.innerHTML = "Fundo";

            var fundo = $('<input />',{
                'class': 'form-control form-control-md col-md-4',
                'id': 'fundo',
                'name': 'fundo',
                'type': 'text',
                'placeholder': 'm²',
                'style': 'margin-bottom: 15px'
            });

            var labelFrente = document.createElement('label');
            labelFrente.class = "form-check-label";
            labelFrente.for = "frente";
            labelFrente.innerHTML = "Frente";

            var frente = $('<input />',{
                'class': 'form-control form-control-md col-md-4',
                'id': 'frente',
                'name': 'frente',
                'type': 'text',
                'placeholder': 'm²',
                'style': 'margin-bottom: 15px'
            });

            var labelArea = document.createElement('label');
            labelArea.class = "form-check-label";
            labelArea.for = "area";
            labelArea.innerHTML = "Área";

            var area = $('<input />',{
                'class': 'form-control form-control-md col-md-4',
                'id': 'area',
                'name': 'area',
                'type': 'number',
                'min': '0',
                'placeholder': 'm²',
                'style': 'margin-bottom: 15px'
            });

            $(labelIMO).appendTo("#formContrato");
            $(imo).appendTo("#formContrato");
            $(labelArea).appendTo("#formContrato");
            $(area).appendTo("#formContrato");
            $(labelPerimetro).appendTo("#formContrato");
            $(perimetro).appendTo("#formContrato");
            $(labelFrente).appendTo("#formContrato");
            $(frente).appendTo("#formContrato");
            $(labelDireita).appendTo("#formContrato");
            $(direita).appendTo("#formContrato");
            $(labelEsquerda).appendTo("#formContrato");
            $(esquerda).appendTo("#formContrato");
            $(labelFundo).appendTo("#formContrato");
            $(fundo).appendTo("#formContrato");
            
            var selectBox = document.getElementById("area");
            selectBox.addEventListener('change', medicoes);
            function medicoes(){
                if(this.value == 160){
                    document.getElementById("esquerda").value = "20";
                    document.getElementById("frente").value = "8";
                    document.getElementById("fundo").value = "8";
                    document.getElementById("direita").value = "20";
                }else if(this.value == 200){
                    document.getElementById("esquerda").value = "20";
                    document.getElementById("frente").value = "10";
                    document.getElementById("fundo").value = "10";
                    document.getElementById("direita").value = "20";
                }else if(this.value == 300){
                    document.getElementById("esquerda").value = "30";
                    document.getElementById("frente").value = "10";
                    document.getElementById("fundo").value = "10";
                    document.getElementById("direita").value = "30";
                }else if(this.value == 480){
                    document.getElementById("esquerda").value = "40";
                    document.getElementById("frente").value = "12";
                    document.getElementById("fundo").value = "12";
                    document.getElementById("direita").value = "40";
                }    
            }

            $("#procuracao").addClass("disabled").prop("disabled", true);
            $("#viabilidade").addClass("disabled").prop("disabled", true);

        }
    });
    
</script>
@endsection
