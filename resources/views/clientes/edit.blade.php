@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <h2>Alterar informações do Cliente</h2>
            </div>
        </div>
    </div>

    <div class="container">
        <br>
        <form action="{{ route('cliente.update', $cliente->cpf) }}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
                <input type="text" name="nome" class="form-control" placeholder="Nome" required value="{{ $cliente->nome }}">
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" name="cpf" class="form-control" placeholder="CPF" value="{{ $cliente->cpf }}">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="rg" class="form-control" placeholder="RG" value="{{ $cliente->rg }}">
                </div>
                <div class="form-group col-sm-4">
                    <select name="estadocivil" class="form-control form-control-md">
                        <option value="Solteiro">Solteiro(a)</option>
                        <option value="Casado">Casado(a)</option>
                        <option value="Divorciado">Divorciado(a)</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="endereco" class="form-control" placeholder="Endereço" value="{{ $cliente->endereco }}">
            </div>
            <div class="form-group">
                <input type="text" name="profissao" class="form-control" placeholder="Ocupação" value="{{ $cliente->profissao }}">
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection