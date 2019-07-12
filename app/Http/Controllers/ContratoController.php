<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Contrato;
use App\Processo;

use DB;
use DateTime;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $contratos = Contrato::get();
        return view('contratos.lista', ['contratos' => $contratos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('contratos.cadastra');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\c  $contrato
     * @return \Illuminate\Http\Response
     */
    public function show($cpf){
        try{
            $processo = Processo::where('cliente_cpf', $cpf)->firstOrFail();
            $cliente = Cliente::where('cpf', $cpf)->firstOrFail();
            $contrato = Contrato::where('cliente_cpf', $cpf)->firstOrFail();

            if(empty($contrato->empreendimento)){
                return redirect()->route('contrato.edit', $contrato->cliente_cpf);
            }else{
                return view('contratos.show', compact('contrato', 'cliente', 'processo'));
            }
            
        }catch(ModelNotFoundException $e){
            return redirect()->route('contrato.index');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\c  $contrato
     * @return \Illuminate\Http\Response
     */
    public function edit($cpf){
        $contrato = Contrato::find($cpf);
        return view('contratos.edit', compact('contrato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\c  $contrato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cpf){
        $contrato = Contrato::find($cpf);

        $request->validate([
            'corretor' =>'required',
            'empreendimento' => 'required',
            'lote' => 'required',
            'planta' => 'required',
            'endereco' => 'required',
            'tipodacasa' => 'required',
            'tamanhoLote' => 'required',
            'valorLote' => 'required',
            'valorPlanta' => 'required',
            'entrada' => 'required',
            'muro' => 'required'
        ]);
        
        $contrato->corretor = $request->get('corretor');
        $contrato->empreendimento = $request->get('empreendimento');
        $contrato->lote = $request->get('lote');
        $contrato->planta = $request->get('planta');
        $contrato->endereco = $request->get('endereco');
        $contrato->tipodacasa = $request->get('tipodacasa');
        $contrato->tamanhoLote = $request->get('tamanhoLote');
        $contrato->valorLote = $request->get('valorLote');
        $contrato->valorPlanta = $request->get('valorPlanta');
        $contrato->entrada = $request->get('entrada');
        $contrato->muro = $request->get('muro');

        $contrato->save();

        $dataEvento = new DateTime();
        $noticia = array('cpf'=>$cpf, 'descricao'=>'Contrato assinado no Empreendimento: '.$contrato->empreendimento.' no lote: '.$contrato->lote, 'data'=>$dataEvento, 'tipo'=>'contrato');
        DB::table('noticias')->insert($noticia);

        return redirect()->route('contrato.index')->with('msg', 'Contrato cadastrado!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\c  $contrato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contrato $contrato){
        //
    }
}
