@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header text-white card-asatec">
            Dados cadastrados do cliente
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $cliente->nome }}</h5>
            <p class="card-text">CPF: {{ $cliente->cpf }}</p>
            <p class="card-text">RG: {{ $cliente->rg }}</p>
            <p class="card-text">Endereço: {{ $cliente->endereco }}</p>
            <p class="card-text">Estado Civil: {{ $cliente->estadocivil }}</p>
            <p class="card-text">Ocupação: {{ $cliente->profissao }}</p>
        </div>
    </div>

    <br>
    <div class="card">
        <div class="card-header bg-primary text-white">
            Processo
            <button class="btn btn-primary bt open" data-toggle="collapse" data-target="#processo" aria-expanded="true" aria-controls="processo"><i class="fas fa-sort-down"></i></button>
        </div>
        <div class="collapse hide card-body" id="processo">
            <div class="row">
                <h5 class="card-title">Contrato Construtora</h5>
            </div>
            <form>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="contrato" id="contrato" value="verdade">
                            <label class="form-check-label" for="contrato">
                                Assinado
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div id="dataass">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary bt" id="btnObs">Adicionar Observação</button>
                        <div class="form-group" id="obs">
                        </div>
                    </div>
                </div> 
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="caixa" id="caixa" value="verdade">
                            <label class="form-check-label" for="caixa">
                                Assinado
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div id="dataCaixa">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary bt" id="btnObsCaixa">Adicionar Observação</button>
                        <div class="form-group" id="obsCaixa">
                        </div>
                    </div>
                </div> 

                <button class="btn btn-primary bt" type="submit">Salvar</button>
            </form>
        </div>
    </div>

    <script>
        $('.collapse').on('click', function (){
            $('#processo.in').toggleClass('in');
        });

        var appendData = $('<input />',{
            'id': 'dataassinatura',
            'type': 'date'
        });

        var appendObs = $('<input />', {
            'id': 'obs',
            'type': 'text',
            'class': 'form-control',
            'placeholder': 'Observação'
        });

        var appendDataCaixa = $('<input />',{
            'id': 'dataCaixa',
            'type': 'date'
        });

        var appendObsCaixa = $('<input />', {
            'id': 'obsCaixa',
            'type': 'text',
            'class': 'form-control',
            'placeholder': 'Observação'
        });

        var btnAdd = "<button class='btn btn-primary by' id='btnObsCaixa'>Adicionar Observação</button>";
        

        $('input:checkbox[name="contrato"]').change(function(){
            if(this.checked){
                $(appendData).appendTo('#dataass');
            }
        });

        $("#btnObs").click(function(){
            $('#btnObs').remove();
            $(appendObs).appendTo('#obs');
        });

        $('input:checkbox[name="caixa"]').change(function(){
            if(this.checked){
                $(appendDataCaixa).appendTo('#dataCaixa');
            }
        });

        $("#btnObsCaixa").click(function(){
            $('#btnObsCaixa').remove();
            $(appendObsCaixa).appendTo('#obsCaixa');
        });
    </script>
@endsection

{{-- <div class="form-group" id="observacao">
                            <input type="text" class="form-control" id="obs" placeholder="Observação">
                        </div> --}}