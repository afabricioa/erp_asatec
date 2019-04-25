@extends('layouts.app')

@section('content')
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