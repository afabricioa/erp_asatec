@extends('layouts.app')

@section('content')
    @if(Session::has('msg'))
        <div class="modal fade" id="modalExclusao" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-white" id="modalDelete">ASATEC</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ Session::get('msg') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-asatec-azul" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="descricao">
            <h4 class="titulo-secao">Lista de clientes</h4>
        </div>
    </div>

    <div class="container">
        <table class="table listaclientes" id="tabelaclientes">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>RG</th>
                    <th id="teste">Ocupação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td><a href="{{ route('cliente.show', $cliente->cpf) }}">{{ $cliente->nome }}</a></td>
                        <td>{{ $cliente->cpf }}</td>
                        <td>{{ $cliente->rg }}</td>
                        <td>{{ $cliente->profissao }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script>
        $('.listaclientes').DataTable({
            dom: 'Bfrtip',
            lengthChange: false,
            buttons: [
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    exportOptions:{
                        columns: ':visible'
                    },
                    // customize: function ( doc ) {
                    //     doc.content.splice( 1, 0, {
                    //             margin: [ 0, 0, 0, 12 ],
                    //             alignment: 'center',
                    //             width: 150,
                    //             image: '../../imgs/asatec.png',
                    //     } );
                    // }
                },
            ],
            columnDefs: [ {
                targets: -1,
                visible: false
            } ]
        });
        $(".dt-button-collection").addClass("colecao");
    </script>

@endsection
