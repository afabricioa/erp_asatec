<?php

namespace App\Http\Controllers;

use App\Empreendimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class EmpreendimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if (Auth::check()) {
            $empreendimentos = Empreendimento::get();
            return view('empreendimento', ['empreendimentos' => $empreendimentos]);
        }else{
            return view('restrita');
        }
        
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
        $empreendimento = new Empreendimento();

        $request->validate([
            'nome' => 'required',
            'endereco' => 'required',
            'nLotes' => 'required',
        ]);

        $empreendimento->create($request->all());
        Session::flash('msg', 'Empreendimento cadastrado com sucesso!');

        return redirect()->route('empreendimento.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empreendimento  $empreendimento
     * @return \Illuminate\Http\Response
     */
    public function show(Empreendimento $empreendimento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empreendimento  $empreendimento
     * @return \Illuminate\Http\Response
     */
    public function edit(Empreendimento $empreendimento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empreendimento  $empreendimento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empreendimento $empreendimento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empreendimento  $empreendimento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empreendimento $empreendimento)
    {
        //
    }
}
