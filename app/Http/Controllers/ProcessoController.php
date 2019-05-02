<?php

namespace App\Http\Controllers;

use Carbon;
use App\Processo;
use Illuminate\Http\Request;

class ProcessoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Processo  $processo
     * @return \Illuminate\Http\Response
     */
    public function show(Processo $processo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Processo  $processo
     * @return \Illuminate\Http\Response
     */
    public function edit(Processo $processo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Processo  $processo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cpf){
        $processo = Processo::find($cpf);
        
        
        if(empty($processo->asscontrato)){
            $processo->asscontrato = $request->get('contrato');
            $processo->dataass = $request->get('asscontrato');
        }

        if(empty($processo->docterreno)){
            $processo->docterreno = $request->get('docterreno');
            $processo->dataterreno = $request->get('dataterreno');
        }
        
        
        if(empty($processo->engenharia)){
            $processo->engenharia = $request->get('engenharia');
            $processo->dataengenharia = $request->get('dataengenharia');
        }
        
        
        if(empty($processo->docpessoal)){
            $processo->docpessoal = $request->get('docpessoal');
            $processo->datadocpessoal = $request->get('datadocpessoal');
        }
        
        if(empty($processo->conformidade)){
            $processo->conformidade = $request->get('conformidade');
            $processo->dataconformidade = $request->get('dataconformidade');
        }


        if(empty($processo->entrevista)){
            $processo->entrevista = $request->get('entrevista');
            $processo->dataentrevista = $request->get('dataentrevista');
        }
        

        if(empty($processo->contratocaixa)){
            $processo->contratocaixa = $request->get('contratocaixa');
            $processo->datacaixa = $request->get('datacaixa');
        }
        

        if(empty($processo->doctercartorio1reno)){
            $processo->cartorio1 = $request->get('cartorio1');
            $processo->datacartorio1 = $request->get('datacartorio1');
        }
        

        if(empty($processo->obras)){
            $processo->obras = $request->get('obras');
            $processo->dataobras = $request->get('dataobras');
        }
        

        if(empty($processo->cartorio2)){
            $processo->cartorio2 = $request->get('cartorio2');
            $processo->datacartorio2 = $request->get('datacartorio2');
        }
        
        $processo->observacao = $request->get('avisos');
        $processo->save();

        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Processo  $processo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Processo $processo)
    {
        //
    }
}
