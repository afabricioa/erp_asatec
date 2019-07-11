<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Processo;
use App\Noticias;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use DB;
use DateTime;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        if (Auth::user()->isAdmin == 'admin') {
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
        if(Auth::user()->isAdmin == 'admin'){
            return view('clientes.cadastra');
        }else{
            return view('restrita');
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
            'cpf' => ['max:14', 'unique:clientes'],
            'rg' => ['max:9', 'unique:clientes'],
            'endereco' => 'required',
            'estadocivil' => 'required',
            'profissao' => 'required',
        ]);

        $cliente->create($request->all());

        $cpf = $request->input('cpf');
        $nome = $request->input('nome');    
        $processo = array('cliente_cpf'=>$cpf);
        $contrato = array('cliente_cpf'=>$cpf);

        $pontuacoes = array(".", "-");
        $cpfsenha = str_replace($pontuacoes, "", $cpf);

        //$usuario = array('name' => $nome, 'username' => $username, 'password' => Hash::make($cpfsenha), 'isAdmin' => 'cliente');

        DB::table('processos')->insert($processo);
        DB::table('contratos')->insert($contrato);
        //DB::table('users')->insert($usuario);
        Session::flash('msg', 'Cliente cadastrado com sucesso!');

        return redirect()->route('contrato.show', $cpf);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($cpf){
        if(Auth::user()->isAdmin == 'admin'){
            $cliente = Cliente::find($cpf);
            $processo = Processo::find($cpf);
            
            return view('clientes.show', compact('cliente', 'processo'));
        }else{
            return view('restrita');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($cpf){
        if(Auth::user()->isAdmin == 'admin'){
            $cliente = Cliente::find($cpf);
            return view('clientes.edit', compact('cliente'));
        }else{
            return view('restrita');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cpf){
        if(Auth::user()->isAdmin == 'admin'){
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
        }else{
            return view('restrita');
        }
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
        // $usuario = User::query()->where('username', 'LIKE', $cliente->username)->first();
        // $usuarioExcluir = User::find($usuario->id);
        // $usuarioExcluir->delete();

        return redirect()->route('cliente.index')->with('msg', 'Cliente excluido com sucesso!');
        
    }
}
