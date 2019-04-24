@extends('layouts.app')

@section('content')
    <div class="table responsive-lg" id="showEmp">
        @if(Session::has('msg'))
            <div class="alert alert-success">{{ Session::get('msg') }}</div>
        @endif

        <table class="table">
            <th>Nome</th>
            <th>Lotes</th>
            <th>Endereço</th>

            <tbody>
                @foreach ($empreendimentos as $empreendimento)
                    <tr>
                        <td>{{ $empreendimento->nome }}</td>
                        <td>{{ $empreendimento->nLotes }}</td>
                        <td>{{ $empreendimento->endereco }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button class="btn btn-primary bt" data-toggle="collapse" data-target="#cadastroemp" aria-expanded="true" aria-controls="cadastroemp">Novo</button>
    </div>
    <div class="collapse hide" id="cadastroemp">
        <div class="text-center">
            <h5>Informações do empreendimento</h5>
        </div>
        <form method="POST" action="{{ route('empreendimento.store') }}">
            @csrf
            <div class="form-row">
                <div class="col-md-4 mb-6">
                    <input type="text" class="form-control" name="nome" placeholder="Nome" required>
                </div>
                <div class="col-md-4 mb-6">
                    <input type="text" class="form-control" name="nLotes" placeholder="Quantidade de Lotes" required>
                </div>
            </div>
            <br>
            <div class="form-group">
                <input type="text" class="form-control" name="endereco" placeholder="Endereço" required>
            </div>

            <button type="submit" class="btn btn-success">Cadastrar</button>
        </form>
    </div>

    <script>
        $('.collapse').on('click', function (){
            $('#cadastroemp.in').toggleClass('in');
        });
    </script>
@endsection