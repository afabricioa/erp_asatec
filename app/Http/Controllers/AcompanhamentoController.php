<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; 

use App\Processo;
use App\Cliente;
use App\Contrato;

class AcompanhamentoController extends Controller{
    
    public function buscar(){
        $cpf = Input::get('cpf');
        $processo = Processo::findOrFail($cpf);
        $cliente = Cliente::findOrFail($cpf);
        $contrato = Contrato::findOrFail($cpf);

        return view('showprocesso', compact('processo', 'cliente', 'contrato'));
    }
}
