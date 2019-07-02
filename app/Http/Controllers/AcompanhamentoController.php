<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; 

use App\Processo;
use App\Cliente;

class AcompanhamentoController extends Controller{
    
    public function buscar(){
        $cpf = Input::get('cpf');
        $processo = Processo::find($cpf);
        $cliente = Cliente::find($cpf);

        return view('showprocesso', compact('processo', 'cliente'));
    }
}
