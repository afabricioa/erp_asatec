<?php

namespace App\Http\Controllers;

use Carbon;
use App\Processo;
use App\Contrato;
use App\Cliente;
use Illuminate\Http\Request;

use App\Noticias;
use DateTime;
use DB;
use Session;

class ProcessoController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
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
    public function show($usuario){
        $cliente = Cliente::query()->where('username', 'LIKE', $usuario)->first();
        $processo = Processo::find($cliente->cpf);

        return view('showprocesso', compact('processo', 'cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Processo  $processo
     * @return \Illuminate\Http\Response
     */
    public function edit(Processo $processo){
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
        $contrato = Contrato::find($cpf);
        $cliente = Cliente::find($cpf);

        $descricao = '';
        $tipoprocesso = '';
        
        if(empty($processo->asscontrato)){ 
            $processo->asscontrato = $request->get('contrato');
            $processo->dataass = $request->get('asscontrato');
            
        }

        //condicional responsável por atualizar a descrição do objeto noticia
        if(!empty($request->get('contrato'))){
            $descricao = 'Contrato assinado na construtora. Empreendimento '.$contrato->empreendimento;
            $processo->faseatual = "terreno_step";
            $dataEvento = $request->get('asscontrato');
            $tipoprocesso = 'processo';
        }
        //condicional responsável para que o valor da data anterior não anule no envio do formulário
        if(empty($processo->docterreno)){
            $processo->docterreno = $request->get('docterreno');
            $processo->dataterreno = $request->get('dataterreno');
            
        }
        if(!empty($request->get('docterreno'))){
            $descricao = 'Documentos do terreno '.$contrato->quadra.$contrato->lote.' foram solicitados.';
            $processo->faseatual = "engenharia_step";
            $dataEvento = $request->get('dataterreno');
            $tipoprocesso = 'processo';
        }
        
        if(empty($processo->engenharia)){
            $processo->engenharia = $request->get('engenharia');
            $processo->dataengenharia = $request->get('dataengenharia');
            
        }
        if(!empty($request->get('engenharia'))){
            $descricao = 'Engenharia solicitada. Lote: '.$contrato->quadra.$contrato->lote;
            $processo->faseatual = "docpessoal_step";
            $dataEvento = $request->get('dataengenharia');
            $tipoprocesso = 'processo';
        }
        
        
        if(empty($processo->docpessoal)){
            $processo->docpessoal = $request->get('docpessoal');
            $processo->datadocpessoal = $request->get('datadocpessoal');
            
        }
        if(!empty($request->get('docpessoal'))){
            $descricao = 'Solicitado atualização de documentação pessoal. Cliente: '.$cliente->nome;
            $processo->faseatual = "conformidade_step";
            $dataEvento = $request->get('datadocpessoal');
            $tipoprocesso = 'processo';
        }
        
        if(empty($processo->conformidade)){
            $processo->conformidade = $request->get('conformidade');
            $processo->dataconformidade = $request->get('dataconformidade');
            
            
        }
        if(!empty($request->get('conformidade'))){
            $descricao = 'Processo enviado para conformidade. Cliente: '.$cliente->nome;
            $processo->faseatual = "entrevista_step";
            $dataEvento = $request->get('dataconformidade');
            $tipoprocesso = 'processo';
        }


        if(empty($processo->entrevista)){
            $processo->entrevista = $request->get('entrevista');
            $processo->dataentrevista = $request->get('dataentrevista');
            
            
        }
        if(!empty($request->get('entrevista'))){
            $descricao = 'Cliente marcado para entrevista com gerente da Caixa. Cliente: '.$cliente->nome;
            $processo->faseatual = "ccaixa_step";
            $dataEvento = $request->get('dataentrevista');
            $tipoprocesso = 'processo';
        }
        

        if(empty($processo->contratocaixa)){
            $processo->contratocaixa = $request->get('contratocaixa');
            $processo->datacaixa = $request->get('datacaixa');
            
        }
        if(!empty($request->get('contratocaixa'))){
            $descricao = 'Contrato assinado na Caixa. Cliente: '.$cliente->nome;
            $processo->faseatual = "cartorio1_step";
            $dataEvento = $request->get('datacaixa');
            $tipoprocesso = 'processo';
        }
        

        if(empty($processo->doctercartorio1reno)){
            $processo->cartorio1 = $request->get('cartorio1');
            $processo->datacartorio1 = $request->get('datacartorio1');
            
        }
        if(!empty($request->get('cartorio1'))){
            $descricao = 'Entrada nos documentos do cartório fase 1. Lote: '.$contrato->quadra.$contrato->lote;
            $processo->faseatual = "obras_step";
            $dataEvento = $request->get('datacartorio1');
            $tipoprocesso = 'processo';
        }
        

        if(empty($processo->obras)){
            $processo->obras = $request->get('obras');
            $processo->dataobras = $request->get('dataobras');
            
        }
        if(!empty($request->get('obras'))){
            $descricao = 'Obras iniciadas. Casa: '.$contrato->quadra.$contrato->lote;
            $processo->faseatual = "prefeitura_step";
            $dataEvento = $request->get('dataobras');
            $tipoprocesso = 'processo';
        }
        

        if(empty($processo->cartorio2)){
            $processo->cartorio2 = $request->get('cartorio2');
            $processo->datacartorio2 = $request->get('datacartorio2');
            
        }
        if(!empty($request->get('cartorio2'))){
            $descricao = 'Entrada nos documentos do cartório fase final. Casa: '.$contrato->quadra.$contrato->lote;
            //$processo->faseatual = "cartorio2";
            $dataEvento = $request->get('datacartorio2');
            $tipoprocesso = 'processo';
        }
        
        if(!empty($request->get('avisos'))){
            $processo->observacao = $request->get('avisos');
            $dataEvento = new DateTime();
            $descricao = $request->get('avisos');
            $tipoprocesso = 'aviso';
        }
        
        
        $processo->save();

        //$dataEvento = new DateTime();
        $noticia = array('cpf'=>$cpf, 'descricao'=>$descricao, 'data'=>$dataEvento, 'tipo'=>$tipoprocesso);
        DB::table('noticias')->insert($noticia);

        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Processo  $processo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Processo $processo){
        //
    }
}
