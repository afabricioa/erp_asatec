@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 my-3 p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom border-gray pb-2 mb-0">Últimas Atualizações</h6>
            @foreach ($noticias as $noticia)
                <div class="media text-muted pt-3">
                    <p class="media-body pb-3 mb-0 small lh-200 border-bottom border-gray">
                        @if ($noticia->tipo == 'contrato')
                            <strong class="d-block text-gray-dark">Novo Contrato</strong>
                            {{ $noticia->descricao }}
                            <br><br>
                            <span> Data: {{ Carbon::parse($noticia->data)->format('d/m/Y') }} </span>
                            <span class="d-block text-left mt-3">
                                <a href="{{ route('contrato.show', $noticia->cpf) }}">Detalhes</a>
                            </span>
                        @elseif ($noticia->tipo == 'processo')
                            <strong class="d-block text-gray-dark">Atualização de processo</strong>
                            {{ $noticia->descricao }}
                            <br><br>
                            <span> Data: {{ Carbon::parse($noticia->data)->format('d/m/Y') }} </span>
                            <span class="d-block text-left mt-3">
                                <a href="{{ route('contrato.show', $noticia->cpf) }}">Detalhes</a>
                            </span>
                        @endif

                    </p>
                </div>
                
            @endforeach
        </div>
    </div>
</div>
@endsection
