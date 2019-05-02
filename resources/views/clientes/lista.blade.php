@extends('layouts.app')

@section('content')
    @if(Session::has('msg'))
        <div class="modal fade" id="modalExclusao" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDelete">ASATEC</h5>
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
        <div class="card-body">
            <div class="text-center">
                <h2>Clientes</h2>
            </div>
        </div>
    </div>

    <div class="container mb-3 mt-3">
        <table class="table listaclientes" id="tabelaclientes">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>RG</th>
                    <th id="teste">Ocupação</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->cpf }}</td>
                        <td>{{ $cliente->rg }}</td>
                        <td>{{ $cliente->profissao }}</td>
                        <td><a href="{{ route('cliente.show', $cliente->cpf) }}"><i class="fas fa-info"></a></i></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    

    <script>
        $('.listaclientes').DataTable({
            dom: 'Bfrtip',
                buttons: [{
                    extend: 'pdfHtml5',
                    messageTop: 'Lista de clientes listados de acordo com o filtro.'
                }
            ]
        });
    </script>

    <script>

        $('#modalExclusao').modal('show');
        
        var table = document.getElementById('tabelaclientes');
        for (var r = 0, n = table.rows.length; r < n; r++) {
            for(var c = 0, m = table.rows[r].cells.length; c < m; c++){
                if(table.rows[r].cells[c].innerHTML == "1"){
                    table.rows[r].className = "table-danger";
                }
            }
        }
    </script>
  
@endsection