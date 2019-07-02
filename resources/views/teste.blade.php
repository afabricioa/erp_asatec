@extends('layouts.app')

@section('content')

    @if(isset($message))
        {{ $message }}
        <div class="modal fade" id="modalErro" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDelete">ASATEC</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ $message }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div id="paginaProcesso">
        <div class="steps">
            {{-- <section id="sec-timeline" class="sec-container">
                <div class="sec-passo"> 
                    <div class="step-svg">
                        <object id="imgP1" class="nao" data="svg/contrato.svg" type="image/svg+xml"></object>
                    </div>
                    
                    <div class="passo-conteudo">
                        Passo 1
                    </div>
                </div>
                <div class="sec-passo"> 
                    <div class="step-svg">
                        <object id="imgP1" class="nao" data="svg/docpessoal.svg" type="image/svg+xml"></object>
                    </div>
                    <div class="passo-conteudo">
                        Passo 2
                    </div>
                </div>
                <div class="sec-passo"> 
                    <div class="step-svg">
                        <object id="imgP1" class="nao" data="svg/contrato.svg" type="image/svg+xml"></object>
                    </div>
                    <div class="passo-conteudo">
                        Passo 2
                    </div>
                </div>
            </section> --}}
            
            <ul class="timeline_processo">
                <li id="contrato_step" class="timeline_step">
                    <div class="timeline_step_icone">
                        <object id="svgContrato" class="completo" data="svg/contrato.svg" type="image/svg+xml"></object>
                    </div>
                    <div id="desc_contrato" class="timeline_step_desc">
                        <strong>Assinatura do Contrato na Construtora</strong>
                        <p>Data</p>
                    </div>
                </li>
                <li id="terreno_step" class="timeline_step">
                    <div class="timeline_step_icone">
                        <object id="svgDocterreno" class="completo" data="svg/documentos.svg" type="image/svg+xml"></object>
                    </div>
                    <div id="desc_documentos" class="timeline_step_desc">
                        <strong>Documentação do Terreno</strong>
                        <span>Observação</span>
                        <p>Data</p>
                    </div>
                </li>
                <li id="engenharia_step" class="timeline_step">
                    <div class="timeline_step_icone">
                        <object id="svgEngenharia" class="completo" data="svg/documentos.svg" type="image/svg+xml"></object>
                    </div>
                    <div id="desc_engenharia" class="timeline_step_desc">
                        <strong>Documentação do Terreno</strong>
                        <span>Observação</span>
                        <p>Data</p>
                    </div>
                </li>
                <li id="docpessoal_step" class="timeline_step">
                    <div class="timeline_step_icone">
                        <object id="svgDocpessoal" class="atual" data="svg/docpessoal.svg" type="image/svg+xml"></object>
                    </div>
                    <div id="desc_pessoal" class="timeline_step_desc">
                        <strong>Engenharia</strong>
                        <span>Observação</span>
                        <p>Data</p>
                    </div>
                </li>
                <li id="conformidade_step" class="timeline_step">
                    <div class="timeline_step_icone">
                        <object id="svgConformidade" class="atual" data="svg/docpessoal.svg" type="image/svg+xml"></object>
                    </div>
                    <div id="desc_conformidade" class="timeline_step_desc">
                        <strong>Engenharia</strong>
                        <span>Observação</span>
                        <p>Data</p>
                    </div>
                </li>
                <li id="entrevista_step" class="timeline_step">
                    <div class="timeline_step_icone">
                        <object id="svgEntrevista" class="completo" data="svg/documentos.svg" type="image/svg+xml"></object>
                    </div>
                    <div id="desc_entrevista" class="timeline_step_desc">
                        <strong>Documentação do Terreno</strong>
                        <span>Observação</span>
                        <p>Data</p>
                    </div>
                </li>
                <li id="ccaixa_step" class="timeline_step">
                    <div class="timeline_step_icone">
                        <object id="svgContratoCaixa" class="atual" data="svg/docpessoal.svg" type="image/svg+xml"></object>
                    </div>
                    <div id="desc_ccaixa" class="timeline_step_desc">
                        <strong>Engenharia</strong>
                        <span>Observação</span>
                        <p>Data</p>
                    </div>
                </li>
                <li id="cartorio1_step" class="timeline_step">
                    <div class="timeline_step_icone">
                        <object id="svgCartorio1" class="completo" data="svg/documentos.svg" type="image/svg+xml"></object>
                    </div>
                    <div id="desc_cartorio1" class="timeline_step_desc">
                        <strong>Documentação do Terreno</strong>
                        <span>Observação</span>
                        <p>Data</p>
                    </div>
                </li>
                <li id="prefeitura_step" class="timeline_step">
                    <div class="timeline_step_icone">
                        <object id="svgDocpessoal" class="atual" data="svg/docpessoal.svg" type="image/svg+xml"></object>
                    </div>
                    <div id="desc_pessoal" class="timeline_step_desc">
                        <strong>Engenharia</strong>
                        <span>Observação</span>
                        <p>Data</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <?php
        $pontuacoes = array(".","-");
        // Variable to check
        $frasefinal = str_replace($pontuacoes,"","025.820.353-60");
        echo $frasefinal;
    ?>

    <script>
        $('#modalErro').modal('show');

        window.onload=function() {
            svgObject = document.getElementById('svgContrato').contentDocument;
            var svg = svgObject.getElementById('circuloContrato');
            var element = document.getElementById("contrato_step");
            
            if(document.getElementById('svgContrato').className == "completo"){
                svg.setAttribute("fill", "blue");
                element.classList.add("done");
                //$('#contrato_step').addClass('done');
            }else{
                svg.setAttribute("fill", "red");
            }

            if(document.getElementById('imgP2').className == "completo"){
                $('#desc_documentos').toggleClass('active');
            }
        };
    </script>

@endsection