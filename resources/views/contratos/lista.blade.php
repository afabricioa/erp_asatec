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
            <h4 class="titulo-secao">Lista de contratos</h4>
        </div>
    </div>

    <div class="container mb-3 mt-3">
        <table class="table listaclientes" id="tabelacontratos">
            <thead>
                <tr>
                    <th>Empreendimento</th>
                    <th>Lote</th>
                    <th>Casa</th>
                    <th>Muro</th>
                    <th>Entrada</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contratos as $contrato)
                    <tr>
                        <td>{{ $contrato->empreendimento }}</td>
                        <td>{{ $contrato->quadra }}{{ $contrato->lote }}</td>
                        <td>{{ $contrato->tipodacasa }}</td>
                        @if ($contrato->muro == 'sim')
                            <td>Sim</td>
                        @else
                            <td>Não</td>
                        @endif
                        @if ($contrato->entrada != 0)
                            <td>R$ {{ number_format($contrato->entrada, 2, ',', '.') }}</td>
                        @else
                            <td>Sem entrada</td>
                        @endif
                        <td>
                            <a href="{{ route('contrato.show', $contrato->cliente_cpf) }}"><i class="fas fa-info"></i></a>
                            <a href="{{ route('contrato.edit', $contrato->cliente_cpf) }}"><i class="fas fa-edit"></i></a>
                        </td>
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
                    messageTop: 'Lista de contratos cadastrado.'
                }
            ]
        });
    </script>

    <script>

        $('#modalExclusao').modal('show');
        
        var table = document.getElementById('tabelacontratos');
        for (var r = 0, n = table.rows.length; r < n; r++) {
            for(var c = 0, m = table.rows[r].cells.length; c < m; c++){
                if(table.rows[r].cells[c].innerHTML == "1"){
                    table.rows[r].className = "table-danger";
                }
            }
        }


        const formatter = new Intl.NumberFormat('pt-BR', {
            style: 'currency',
            currency: 'BRL',
            minimumFractionDigits: 2
        });

    </script>
  
@endsection