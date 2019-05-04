<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Contrato;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('contratos.lista');
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
        $contrato = Contrato::find($cpf);
        if(empty($contrato->empreendimento)){
            return redirect()->route('contrato.edit', $contrato->cliente_cpf);
        }else{
            return view('contratos.show', compact('contrato'));
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
            'quadra' => 'required',
            'lote' => 'required',
            'planta' => 'required',
            'endereco' => 'required',
            'tamanhoLote' => 'required',
            'valorLote' => 'required',
            'valorPlanta' => 'required'
        ]);

        $contrato->corretor = $request->get('corretor');
        $contrato->empreendimento = $request->get('empreendimento');
        $contrato->quadra = $request->get('quadra');
        $contrato->lote = $request->get('lote');
        $contrato->planta = $request->get('planta');
        $contrato->endereco = $request->get('endereco');
        $contrato->tamanhoLote = $request->get('tamanhoLote');
        $contrato->valorLote = $request->get('valorLote');
        $contrato->valorPlanta = $request->get('valorPlanta');
        $contrato->save();

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
