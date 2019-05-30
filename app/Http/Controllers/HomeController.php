<?php

namespace App\Http\Controllers;


use App\Noticias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        if (Auth::user()->isAdmin == 'admin') {
            $noticias = Noticias::get()->sortKeysDesc();
            return view('home', ['noticias' => $noticias]);
        }else{
            Auth::logout();
            Session::flush();
            return view('restrita');
        }
    }
}
