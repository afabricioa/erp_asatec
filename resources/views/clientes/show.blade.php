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
            <form method="post" action="{{ route('processo.update', $cliente->cpf) }}">
                @method('PUT')
                @csrf
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
                        <div class="data" id="dataassinada">
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
                        <div class="data" id="dataterrenook">
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
                        <div class="data" id="dataengenhariaok">
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
                        <div class="data" id="datadocpessoalok">
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
                        <div class="data" id="dataconformidadeok">
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
                        <div class="data" id="dataentrevistaok">
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
                        <div class="data" id="datacaixaok">
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
                            <input class="form-check-input" type="radio" name="cartorio1" id="cartorio1" value="cartorio1rec">
                            <label class="form-check-label" for="cartorio1">
                                Recebido
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div id="datacartorio1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="data" id="datacartorio1ok">
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
                        <div class="data" id="dataobrasok">
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
                        <div class="data" id="datacartorio2ok">
                        </div>
                    </div>
                    {{-- <div class="col-md-6">
                        <button class="btn btn-primary bt" id="btnObsCaixa">Adicionar Observação</button>
                        <div class="form-group" id="obsCaixa">
                        </div>
                    </div> --}}
                </div>
                <hr>
                <div class="form-group">
                    <input type="text" name="avisos" id="avisos" class="form-control" placeholder="Observações">
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
            'type': 'date',
            'value': '{{ $processo->dataass }}', 
            'required': 'true'
        });

        var appendDataTerreno = $('<input />',{
            'name': 'dataterreno',
            'type': 'date',
            'value': '{{ $processo->dataterreno }}', 
            'required': 'true'
        });

        var appendDataEngenharia = $('<input />',{
            'name': 'dataengenharia',
            'type': 'date',
            'required': 'true'
        });

        var appendDataDocPessoal = $('<input />',{
            'name': 'datadocpessoal',
            'type': 'date',
            'required': 'true'
        });

        var appendDataConformidade = $('<input />',{
            'name': 'dataconformidade',
            'type': 'date',
            'required': 'true'
        });

        var appendDataEntrevista = $('<input />',{
            'name': 'dataentrevista',
            'type': 'date'
        });

        var appendDataCaixa = $('<input />',{
            'name': 'datacaixa',
            'type': 'date',
            'required': 'true'
        });

        var appendDataCartorio1 = $('<input />',{
            'name': 'datacartorio1',
            'type': 'date',
            'required': 'true'
        });

        var appendDataObras = $('<input />',{
            'name': 'dataobras',
            'type': 'date',
            'required': 'true'
        });

        var appendDataCartorio2 = $('<input />',{
            'name': 'datacartorio2',
            'type': 'date',
            'required': 'true'
        });
    
        var datacompleta = "{{ Carbon::parse($processo->dataass)->format('d/m/Y') }}";
        
        if(!!"{{ $processo->asscontrato }}"){
            document.getElementById("contrato").checked = true;
            $('#dataassinada').append("Data assinatura: {{ Carbon::parse($processo->dataass)->format('d/m/Y') }}");
        }else{
            $('input:radio[name="contrato"]').change(function(){
                if(this.checked){
                    $(appendData).appendTo('#dataass');
                }
            });
        }
        
        if(!!"{{ $processo->docterreno }}"){
            document.getElementById("docterreno").checked = true;
            $('#dataterrenook').append("Data assinatura: {{ Carbon::parse($processo->dataterreno)->format('d/m/Y') }}"); 
        }else{
            $('input:radio[name="docterreno"]').change(function(){
                if(this.checked){
                    $(appendDataTerreno).appendTo('#dataterreno');
                }
            });
        }
        
        if(!!"{{ $processo->engenharia }}"){
            document.getElementById("engenharia").checked = true;
            $('#dataengenhariaok').append("Data assinatura: {{ Carbon::parse($processo->dataengenharia)->format('d/m/Y') }}"); 
        }else{
            $('input:radio[name="engenharia"]').change(function(){
                if(this.checked){
                    $(appendDataEngenharia).appendTo('#dataengenharia');
                }
            });
        }
        
        if(!!"{{ $processo->docpessoal }}"){
            document.getElementById("docpessoal").checked = true;
            $('#datadocpessoalok').append("Data assinatura: {{ Carbon::parse($processo->datadocpessoal)->format('d/m/Y') }}"); 
        }else{
            $('input:radio[name="docpessoal"]').change(function(){
                if(this.checked){
                    $(appendDataDocPessoal).appendTo('#datadocpessoal');
                }
            });
        }

        if(!!"{{ $processo->conformidade }}"){
            document.getElementById("conformidade").checked = true;
            $('#dataconformidadeok').append("Data assinatura: {{ Carbon::parse($processo->dataconformidade)->format('d/m/Y') }}"); 
        }else{
            $('input:radio[name="conformidade"]').change(function(){
                if(this.checked){
                    $(appendDataConformidade).appendTo('#dataconformidade');
                }
            });
        }

        if(!!"{{ $processo->entrevista }}"){
            document.getElementById("entrevista").checked = true;
            $('#dataentrevistaok').append("Data assinatura: {{ Carbon::parse($processo->dataentrevista)->format('d/m/Y') }}"); 
        }else{
            $('input:radio[name="entrevista"]').change(function(){
                if(this.checked){
                    $(appendDataEntrevista).appendTo('#dataentrevista');
                }
            });
        }

        if(!!"{{ $processo->contratocaixa }}"){
            document.getElementById("contratocaixa").checked = true;
            $('#datacaixaok').append("Data assinatura: {{ Carbon::parse($processo->datacaixa)->format('d/m/Y') }}"); 
        }else{
            $('input:radio[name="contratocaixa"]').change(function(){
                if(this.checked){
                    $(appendDataCaixa).appendTo('#datacaixa');
                }
            });
        }

        if(!!"{{ $processo->cartorio1 }}"){
            document.getElementById("cartorio1").checked = true;
            $('#datacartorio1ok').append("Data assinatura: {{ Carbon::parse($processo->cartorio1)->format('d/m/Y') }}"); 
        }else{
            $('input:radio[name="cartorio1"]').change(function(){
                if(this.checked){
                    $(appendDataCartorio1).appendTo('#datacartorio1');
                }
            });
        }

        if(!!"{{ $processo->obras }}"){
            document.getElementById("obras").checked = true;
            $('#dataobrasok').append("Data assinatura: {{ Carbon::parse($processo->dataobras)->format('d/m/Y') }}"); 
        }else{
            $('input:radio[name="obras"]').change(function(){
                if(this.checked){
                    $(appendDataObras).appendTo('#dataobras');
                }
            });
        }

        if(!!"{{ $processo->cartorio2 }}"){
            document.getElementById("cartorio2").checked = true;
            $('#datacartorio2ok').append("Data assinatura: {{ Carbon::parse($processo->datacartorio2)->format('d/m/Y') }}"); 
        }else{
            $('input:radio[name="cartorio2"]').change(function(){
                if(this.checked){
                    $(appendDataCartorio2).appendTo('#datacartorio2');
                }
            });
        }
    </script>
@endsection

{{-- <div class="form-group" id="observacao">
                            <input type="text" class="form-control" id="obs" placeholder="Observação">
                        </div> --}}