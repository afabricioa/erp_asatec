@extends('layouts.app')

@section('content')

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
        window.onload=function() {
            svgObject = document.getElementById('svgContrato').contentDocument;
            var svg = svgObject.getElementById('circuloContrato');
            var element = document.getElementById("contrato_step");
            
            if(document.getElementById('svgContrato').className == "completo"){
                //svg.setAttribute("fill", "blue");
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