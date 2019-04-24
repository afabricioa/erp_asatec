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
                            <input class="form-check-input" type="radio" name="contrato" id="contrato" value="assinado">
                            <label class="form-check-label" for="contrato">
                                Assinatura do Contrato
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div id="dataass">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="dataassinada">
                        </div>
                    </div>
                </div> 
                <hr>
                <div class="row">
                    <h5 class="card-title">Terreno</h5>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="docterreno" id="docterreno" value="terrenorecebido">
                            <label class="form-check-label" for="docterreno">
                                Documentação do Terreno
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div id="dataterreno">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="dataterrenook">
                        </div>
                    </div>
                </div> 
                <hr>
                <div class="row">
                    <h5 class="card-title">Engenharia</h5>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="engenharia" id="engenharia" value="realizadaeng">
                            <label class="form-check-label" for="engenharia">
                                Realizada
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div id="dataengenharia">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="dataengenhariaok">
                        </div>
                    </div>
                </div> 
                <hr>
                <div class="row">
                    <h5 class="card-title">Documentação Pessoal</h5>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="docpessoal" id="docpessoal" value="docatualizada">
                            <label class="form-check-label" for="docpessoal">
                                Atualizada
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div id="datadocpessoal">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="datadocpessoalok">
                        </div>
                    </div>
                </div> 
                <hr>
                <div class="row">
                    <h5 class="card-title">Conformidade</h5>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="conformidade" id="conformidade" value="enviadoconform">
                            <label class="form-check-label" for="conformidade">
                                Enviado
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div id="dataconformidade">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="dataconformidadeok">
                        </div>
                    </div>
                </div> 
                <hr>
                <div class="row">
                    <h5 class="card-title">Entrevista</h5>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="entrevista" id="entrevista" value="entrevistarealizada">
                            <label class="form-check-label" for="entrevista">
                                Realizada
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div id="dataentrevista">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="dataentrevistaok">
                        </div>
                    </div>
                </div> 
                <hr>
                <div class="row">
                    <h5 class="card-title">Contrato com a Caixa</h5>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="contratocaixa" id="contratocaixa" value="caixaassinado">
                            <label class="form-check-label" for="contratocaixa">
                                Assinado
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div id="datacaixa">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="datacaixaok">
                        </div>
                    </div>
                </div> 
                <hr>
                <div class="row">
                    <h5 class="card-title">Cartório: ITBI e Alvará</h5>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="catorio1" id="catorio1" value="cartorio1rec">
                            <label class="form-check-label" for="catorio1">
                                Recebido
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div id="datacartorio1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="datacartorio1ok">
                        </div>
                    </div>
                </div> 
                <hr>
                <div class="row">
                    <h5 class="card-title">Obras</h5>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="obras" id="obras" value="obrainiciada">
                            <label class="form-check-label" for="obras">
                                Iniciado
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div id="dataobras">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="dataobrasok">
                        </div>
                    </div>
                </div> 
                <hr>
                <div class="row">
                    <h5 class="card-title">Cartório: Habite-se e Averbação</h5>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="cartorio2" id="cartorio2" value="cartorio2rec">
                            <label class="form-check-label" for="cartorio2">
                                Recebido
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div id="datacartorio2">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="datacartorio2ok">
                        </div>
                    </div>
                    {{-- <div class="col-md-6">
                        <button class="btn btn-primary bt" id="btnObsCaixa">Adicionar Observação</button>
                        <div class="form-group" id="obsCaixa">
                        </div>
                    </div> --}}
                </div>
                <div class="form-group">
                    <input type="text" name="nome" class="form-control" placeholder="Observações">
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
            'name': 'asscontrato',
            'type': 'date'
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
        

        $('input:radio[name="contrato"]').change(function(){
            if(this.checked){
                $(appendData).appendTo('#dataass');
                $('#observacao').append(observacao);
                $('#dataassinada').append("<span class='data'>22/02/1993</span>");
            }
        });

        $("#btnObs").click(function(){
            $('#btnObs').remove();
            $(appendObs).appendTo('#obs');
        });

        $('input:radio[name="docterreno"]').change(function(){
            if(this.checked){
                $(appendDataCaixa).appendTo('#dataterreno');
            }
        });
    </script>
@endsection

{{-- <div class="form-group" id="observacao">
                            <input type="text" class="form-control" id="obs" placeholder="Observação">
                        </div> --}}