<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function teste(){
        return view('teste');
    }

    public function cadastra(){
        if(Auth::check()){
            return view('clientes.cadastra');
        }else{
            return view('restrita');
        }
    }
    public function cliente(){
        if(Auth::check()){
            return view('clientes.lista');
        }else{
            return view('restrita');
        }
    }

    public function empreendimento(){
        if (Auth::check()) {
            return view('empreendimento');
        }else{
            return view('restrita');
        }
    }

    public function contrato(){
        if(Auth::check()){
            return view('contratos.lista');
        }else{
            return view('restrita');
        }
    }

    public function restrita(){
        return view('restrita');
    }

    public function areacliente(){
        return view('areacliente');
    }
}
