<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; 
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Processo;
use App\Cliente;
use App\Contrato;

class AcompanhamentoController extends Controller{
    
    public function buscar(){
        $cpf = Input::get('cliente_cpf');

        $data = [
            'cliente_cpf' => $cpf,
        ];

        $validator = Validator::make($data, [
            'cliente_cpf' => ['required', 'exists:processos'],
        ]);
        
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator); //retorna para a página anterior pra mostrar o erro
        }else{
            try{
                $processo = Processo::where('cliente_cpf', $cpf)->firstOrFail();
                $cliente = Cliente::where('cpf', $cpf)->firstOrFail();
                $contrato = Contrato::where('cliente_cpf', $cpf)->firstOrFail();
            }catch(ModelNotFoundException $e){
                return view ('areacliente')->with('msg', 'CPF fornecido não possui um processo cadastrado!');
            }
        }

        return view('showprocesso', compact('processo', 'cliente', 'contrato'));
    }
}
