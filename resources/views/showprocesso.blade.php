@extends('layouts.app')

@section('content')

    <div id="paginaProcesso">
        <h5>{{ $cliente->nome }}</h5>
    </div>
    
    <div id="paginaProcesso">
        <ul class="passosProcesso">
            <li class="passosProcesso-item is-done">
                <strong>Assinatura do Contrato na Construtora</strong>
                <span>{{ $processo->cliente_cpf }}</span>
                <p>Data</p>
            </li>
            <li class="passosProcesso-item">
                <strong>Documentação do Terreno</strong>
                <span>Observação</span>
                <p>Data</p>
            </li>
            <li class="passosProcesso-item">
                <strong>Engenharia</strong>
                <span>Observação</span>
                <p>Data</p>
            </li>
            <li class="passosProcesso-item">
                <strong>Documentação Pessoal</strong>
                <span>Observação</span>
                <p>Data</p>
            </li>
            <li class="passosProcesso-item">
                <strong>Conformidade</strong>
                <span>Observação</span>
                <p>Data</p>
            </li>
            <li class="passosProcesso-item">
                <strong>Entrevista</strong>
                <span>Observação</span>
                <p>Data</p>
            </li>
            <li class="passosProcesso-item">
                <strong>Contrato da Caixa</strong>
                <span>Observação</span>
                <p>Data</p>
            </li>
            <li class="passosProcesso-item">
                <strong>Cartório</strong>
                <span>Observação</span>
                <p>Data</p>
            </li>
            <li class="passosProcesso-item">
                <strong>Prefeitura</strong>
                <span>Observação</span>
                <p>Data</p>
            </li>
            <li class="passosProcesso-item">
                <strong>Obras</strong>
                <span>Observação</span>
                <p>Data</p>
            </li>
            <li class="passosProcesso-item">
                <strong>Cartório 2</strong>
                <span>Observação</span>
                <p>Data</p>
            </li>
            <li class="passosProcesso-item">
                <strong>Casa</strong>
                <span>Observação</span>
                <p>Data</p>
            </li>
        </ul>
    </div>

@endsection