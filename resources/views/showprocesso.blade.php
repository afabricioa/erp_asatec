@extends('layouts.app')

@section('content')


    @if(isset($processo))
        <div id="paginaProcesso">
            
            {{-- <ul class="passosProcesso">
                <li class="passosProcesso-item is-done">
                    <div class="timeline_step_icone">
                        <object id="svgContrato" class="completo" data="svg/contrato.svg" type="image/svg+xml"></object>
                    </div>
                    <p class="negrito">Assinatura do Contrato na Construtora
                    
                    <p>Data</p>
                </li>
                <li class="passosProcesso-item">
                    <p class="negrito">Documentação do Terreno

                    <p>Data</p>
                </li>
                <li class="passosProcesso-item">
                    <p class="negrito">Engenharia

                    <p>Data</p>
                </li>
                <li class="passosProcesso-item">
                    <p class="negrito">Documentação Pessoal

                    <p>Data</p>
                </li>
                <li class="passosProcesso-item">
                    <p class="negrito">Conformidade

                    <p>Data</p>
                </li>
                <li class="passosProcesso-item">
                    <p class="negrito">Entrevista

                    <p>Data</p>
                </li>
                <li class="passosProcesso-item">
                    <p class="negrito">Contrato da Caixa

                    <p>Data</p>
                </li>
                <li class="passosProcesso-item">
                    <p class="negrito">Cartório

                    <p>Data</p>
                </li>
                <li class="passosProcesso-item">
                    <p class="negrito">Prefeitura

                    <p>Data</p>
                </li>
                <li class="passosProcesso-item">
                    <p class="negrito">Obras

                    <p>Data</p>
                </li>
                <li class="passosProcesso-item">
                    <p class="negrito">Cartório 2

                    <p>Data</p>
                </li>
                <li class="passosProcesso-item">
                    <p class="negrito">Casa

                    <p>Data</p>
                </li>
            </ul> --}}
            
            <div class="descricao">
                <h4 class="titulo-secao">Meu processo</h4>
                <h5>
                    <p>Cliente: {{ $cliente->nome }}
                    <p>CPF: {{ $cliente->cpf }}
                    <p>Loteamento {{ $contrato->empreendimento }}
                    <p>Imóvel: {{$contrato->lote  }}
                </h5>
                <div class="row flex flex-wrap flex-spaced-fixed margin-bottom">
                    <div class="col-md-6">
                        <div class="descProcesso">
                            Situação: <span class="spanDesc" id="fase"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="descProcesso">
                            Início do Processo: <span class="spanDesc">{{ Carbon::parse($processo->dataass)->format('d/m/Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="steps">
                <h5 class="titulo-historico">Resumo do processo</h5>
                <ul class="timeline_processo">
                    <li id="contrato_step" class="timeline_step">
                        <div class="timeline_step_icone">
                            <object id="svgContrato" data="svg/contrato.svg" type="image/svg+xml"></object>
                        </div>
                        <div id="desc_contrato" class="timeline_step_desc">
                            <p class="negrito">Assinatura do Contrato na Construtora
                            @if($processo->dataass != NULL)
                                <p>{{ Carbon::parse($processo->dataass)->formatLocalized('%d de %B de %Y') }}
                            @endif
                        </div>
                    </li>
                    <li id="terreno_step" class="timeline_step">
                        <div class="timeline_step_icone">
                            <object id="svgDocterreno" data="svg/docterreno.svg" type="image/svg+xml"></object>
                        </div>
                        <div id="desc_documentos" class="timeline_step_desc">
                            <p class="negrito">Documentação do Terreno
                            @if($processo->dataterreno != NULL)
                                <p>{{ Carbon::parse($processo->dataterreno)->formatLocalized('%d de %B de %Y') }}
                            @endif
                        </div>
                    </li>   
                    <li id="engenharia_step" class="timeline_step">
                        <div class="timeline_step_icone">
                            <object id="svgEngenharia" class="completo" data="svg/engenharia.svg" type="image/svg+xml"></object>
                        </div>
                        <div id="desc_engenharia" class="timeline_step_desc">
                            <p class="negrito">Avaliação da Engenharia
                            @if($processo->dataengenharia != NULL)
                                <p>{{ Carbon::parse($processo->dataengenharia)->formatLocalized('%d de %B de %Y') }}
                            @endif
                        </div>
                    </li>
                    <li id="docpessoal_step" class="timeline_step">
                        <div class="timeline_step_icone">
                            <object id="svgDocpessoal" class="atual" data="svg/docpessoal.svg" type="image/svg+xml"></object>
                        </div>
                        <div id="desc_pessoal" class="timeline_step_desc">
                            <p class="negrito">Atualização de documentação pessoal
                            @if($processo->datadocpessoal != NULL)
                                <p>{{ Carbon::parse($processo->datadocpessoal)->formatLocalized('%d de %B de %Y') }}
                            @endif
                        </div>
                    </li>
                    <li id="conformidade_step" class="timeline_step">
                        <div class="timeline_step_icone">
                            <object id="svgConformidade" class="atual" data="svg/conformidade.svg" type="image/svg+xml"></object>
                        </div>
                        <div id="desc_conformidade" class="timeline_step_desc">
                            <p class="negrito">Conformidade da Caixa
                            @if($processo->dataconformidade != NULL)
                                <p>{{ Carbon::parse($processo->dataconformidade)->formatLocalized('%d de %B de %Y') }}
                            @endif
                        </div>
                    </li>
                    <li id="entrevista_step" class="timeline_step">
                        <div class="timeline_step_icone">
                            <object id="svgEntrevista" class="completo" data="svg/entrevista.svg" type="image/svg+xml"></object>
                        </div>
                        <div id="desc_entrevista" class="timeline_step_desc">
                            <p class="negrito">Entrevista com Gerente da Caixa
                            @if($processo->dataentrevista != NULL)
                                <p>{{ Carbon::parse($processo->dataentrevista)->formatLocalized('%d de %B de %Y') }}
                            @endif
                        </div>
                    </li>
                    <li id="caixa_step" class="timeline_step">
                        <div class="timeline_step_icone">
                            <object id="svgContratoCaixa" class="atual" data="svg/contratocaixa.svg" type="image/svg+xml"></object>
                        </div>
                        <div id="desc_ccaixa" class="timeline_step_desc">
                            <p class="negrito">Assinatura do Contrato da Caixa
                            @if($processo->datacaixa != NULL)
                                <p>{{ Carbon::parse($processo->datacaixa)->formatLocalized('%d de %B de %Y') }}
                            @endif
                        </div>
                    </li>
                    <li id="cartorio1_step" class="timeline_step">
                        <div class="timeline_step_icone">
                            <object id="svgCartorio1" class="completo" data="svg/cartorio1.svg" type="image/svg+xml"></object>
                        </div>
                        <div id="desc_cartorio1" class="timeline_step_desc">
                            <p class="negrito">Entrada de Documentos no Cartório
                            @if($processo->datacartorio1 != NULL)
                                <p>{{ Carbon::parse($processo->datacartorio1)->formatLocalized('%d de %B de %Y') }}
                            @endif
                        </div>
                    </li>
                    <li id="prefeitura_step" class="timeline_step">
                        <div class="timeline_step_icone">
                            <object id="svgPrefeitura" class="atual" data="svg/prefeitura.svg" type="image/svg+xml"></object>
                        </div>
                        <div id="desc_pessoal" class="timeline_step_desc">
                            <p class="negrito">Entrada de documentos na Prefeitura
                            @if($processo->datacartorio2 != NULL)
                                <p>{{ Carbon::parse($processo->datacartorio2)->formatLocalized('%d de %B de %Y') }}
                            @endif
                        </div>
                    </li>
                    <li id="final_step" class="timeline_step">
                        <object id="svgCasa" class="done" data="svg/casa.svg" type="image/svg+xml"></object>
                    </li>
                </ul>
            </div>
        </div>
    @endif

    <script> 
        $('#modalErro').modal('show');

        //função para preencher os icones/objetos com cores demonstrando a fase atual
        window.onload=function() {
            if("{{ $processo->dataass }}"){
                svgObject = document.getElementById('svgContrato').contentDocument;
                svgObject.getElementById('circuloContrato').setAttribute("fill", "#369648");
                $('#contrato_step').addClass('done');
            }
            if("{{ $processo->dataterreno }}"){
                svgObject = document.getElementById('svgDocterreno').contentDocument;
                svgObject.getElementById('circuloDocterreno').setAttribute("fill", "#369648");
                $('#terreno_step').addClass('done');
            }
            if("{{ $processo->dataengenharia }}"){
                svgObject = document.getElementById('svgEngenharia').contentDocument;
                svgObject.getElementById('circuloEngenharia').setAttribute("fill", "#369648");
                $('#engenharia_step').addClass('done');
            }
            if("{{ $processo->datadocpessoal }}"){
                svgObject = document.getElementById('svgDocpessoal').contentDocument;
                svgObject.getElementById('circuloDocpessoal').setAttribute("fill", "#369648");
                $('#docpessoal_step').addClass('done');
            }
            if("{{ $processo->dataconformidade }}"){
                svgObject = document.getElementById('svgConformidade').contentDocument;
                svgObject.getElementById('circuloConformidade').setAttribute("fill", "#369648");
                svgObject.getElementById('ponto1').setAttribute("fill", "#369648");
                svgObject.getElementById('ponto2').setAttribute("fill", "#369648");
                $('#conformidade_step').addClass('done');
            }
            if("{{ $processo->dataentrevista }}"){
                svgObject = document.getElementById('svgEntrevista').contentDocument;
                svgObject.getElementById('circuloEntrevista').setAttribute("fill", "#369648");
                svgObject.getElementById('ponto1').setAttribute("fill", "#369648");
                svgObject.getElementById('ponto2').setAttribute("fill", "#369648");
                $('#entrevista_step').addClass('done');
            }
            if("{{ $processo->datacaixa }}"){
                svgObject = document.getElementById('svgContratoCaixa').contentDocument;
                svgObject.getElementById('circuloCaixa').setAttribute("fill", "#369648");
                svgObject.getElementById('ponto1').setAttribute("fill", "#369648");
                svgObject.getElementById('ponto2').setAttribute("fill", "#369648");
                $('#caixa_step').addClass('done');
            }
            if("{{ $processo->datacartorio1 }}"){
                svgObject = document.getElementById('svgCartorio1').contentDocument;
                svgObject.getElementById('circuloCartorio1').setAttribute("fill", "#369648");
                $('#cartorio1_step').addClass('done');
            }
            if("{{ $processo->datacartorio2 }}"){
                svgObject = document.getElementById('svgPrefeitura').contentDocument;
                svgObject.getElementById('circuloPrefeitura').setAttribute("fill", "#369648");
                svgObject.getElementById('ponto1').setAttribute("fill", "#369648");
                svgObject.getElementById('ponto2').setAttribute("fill", "#369648");
                svgObject.getElementById('ponto3').setAttribute("fill", "#369648");
                $('#prefeitura_step').addClass('done');
            }
            if("{{ $processo->faseatual }}" == "concluido"){
                svgObject = document.getElementById('svgCasa').contentDocument;
                svgObject.getElementById('base').setAttribute("fill", "#221f61");
                svgObject.getElementById('base').setAttribute("stroke", "#221f61");
                svgObject.getElementById('telhado').setAttribute("stroke", "#F68B23");
                svgObject.getElementById('chamine').setAttribute("fill", "#F68B23");
                svgObject.getElementById('janela').setAttribute("fill", "#369648");
                svgObject.getElementById('porta').setAttribute("fill", "#fff");
            }
        };

        var valorFase = "{{ $processo->faseatual }}";
        var faseatual = "";
        
        if(valorFase == "terreno_step"){
            faseatual = "Documentação do Terreno";
            $('#terreno_step').toggleClass('active');
        }else if(valorFase == "engenharia_step"){
            faseatual = "Engenharia da Caixa";
        }else if(valorFase == "docpessoal_step"){
            faseatual = "Documentação Pessoal";
        }else if(valorFase == "conformidade_step"){
            faseatual = "Conformidade da CAIXA";
        }else if(valorFase == "entrevista_step"){
            faseatual = "Entrevista da CAIXA";
        }else if(valorFase == "ccaixa_step"){
            faseatual = "Contrato da CAIXA";
        }else if(valorFase == "cartorio1_step"){
            faseatual = "Documentação de Cartório";
        }else if(valorFase == "obras_step"){
            faseatual = "Ínicio das Obras";
        }else if(valorFase == "prefeitura_step"){
            faseatual = "Documentação na Prefeitura";
        }

        $("#fase").text(faseatual);
         
    </script>

@endsection