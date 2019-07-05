@extends('layouts.app')

@section('content')
    @if(Session::has('msg'))
        <div class="modal fade" id="modalAtualizacao" tabindex="-1" role="dialog" aria-labelledby="modalUpgrade" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalUpgrade">ASATEC</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ Session::get('msg') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-header text-white card-asatec">
            Dados cadastrados do cliente
        </div>
        <div class="card-body">
            <p class="titulo-detalhes">Dados Básicos
            <br>
            <p class="card-text">Nome: {{ $cliente->nome }}</p>
            <p class="card-text">CPF: {{ $cliente->cpf }}</p>
            <p class="card-text">RG: {{ $cliente->rg }}</p>
            <hr>
            <p>
            <p class="card-text">Endereço: {{ $cliente->endereco }}</p>
            <p class="card-text">Estado Civil: {{ $cliente->estadocivil }}</p>
            <p class="card-text">Ocupação: {{ $cliente->profissao }}</p>
        </div>
    </div>

    <br>
    <div class="botoes">
        <a href="{{ route('cliente.edit', $cliente->cpf) }}" class="btn btn-info text-white">Alterar</a>
        
        <button class="btn btn-info text-white" data-target="modalDeletar" id="btnexcluir" data-toggle="modal">Excluir</button>
        <div class="modal fade" id="modalDeletar" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Excluindo cliente</h5>
                    </div>
                    <div class="modal-body">
                        Confirma a exclusão do cliente: {{ $cliente->nome }}
                        <form action="{{ route('cliente.destroy', $cliente->cpf) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <br>
                            <button type="submit" id="btnsim" class="btn btn-danger text-white">Sim</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('contrato.show', $cliente->cpf) }}" class="btn btn-info text-white">
            Contrato
        </a>
    </div>
    
    <script>
        $('.collapse').on('click', function (){
            $('#processo.in').toggleClass('in');
        });

        $('#modalAtualizacao').modal('show');

        $('#btnexcluir').on('click', function (event) {
           $('#modalDeletar').modal('show');
        });

    </script>
@endsection
