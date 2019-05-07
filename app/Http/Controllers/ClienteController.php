<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Processo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        if (Auth::check()) {
            $clientes = Cliente::get();
            return view('clientes.lista', ['clientes' => $clientes]);
        }else{
            return view('restrita');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        if(Auth::check()){
            return view('clientes.cadastra');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $cliente = new Cliente();

        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'rg' => 'required',
            'endereco' => 'required',
            'estadocivil' => 'required',
            'profissao' => 'required',
        ]);

        $cliente->create($request->all());

        $cpf = $request->input('cpf');
        $processo = array('cliente_cpf'=>$cpf);
        $contrato = array('cliente_cpf'=>$cpf);
        DB::table('processos')->insert($processo);
        DB::table('contratos')->insert($contrato);
        Session::flash('msg', 'Cliente cadastrado com sucesso!');

        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($cpf){
        $cliente = Cliente::find($cpf);
        $processo = Processo::find($cpf);
        
        return view('clientes.show', compact('cliente', 'processo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($cpf){
        $cliente = Cliente::find($cpf);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cpf){
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'rg' => 'required',
            'estadocivil' => 'required',
            'endereco' => 'required',
            'profissao' => 'required'
        ]);

        $cliente = Cliente::find($cpf);
        $cliente->nome = $request->get('nome');
        $cliente->cpf = $request->get('cpf');
        $cliente->rg = $request->get('rg');
        $cliente->estadocivil = $request->get('estadocivil');
        $cliente->endereco = $request->get('endereco');
        $cliente->profissao = $request->get('profissao');
        $cliente->save();

        return redirect()->route('cliente.show', $cpf)->with('msg', 'Cliente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($cpf){
        $cliente = Cliente::find($cpf);
        $cliente->delete();
        return redirect()->route('cliente.index')->with('msg', 'Cliente excluido com sucesso!');
        
    }
}
