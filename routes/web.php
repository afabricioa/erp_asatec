<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Input; 
use JasperPHP\JasperPHP;
use PHPJasper\PHPJasper;
use App\Processo;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->middleware('auth');

Route::get('/teste', 'PageController@teste');

Route::get('/restrita', 'PageController@restrita');

Route::get('/areacliente', 'PageController@areacliente');

//JasperPHP - copam library
//PHPJasper - geekcom library
Route::get('/relatorio', 'RelatorioController@gerar');

//Route::get('/showprocesso', 'PageController@showprocesso');

/*Route::any('/buscar', function () {
    $cpf = Input::get('cpf');
    $processo = Processo::where('cliente_cpf', 'LIKE', $cpf)->first();

    if($cpf){
        if(count($processo) > 0){
            return view('showprocesso')->withDetails($processo)->withQuery($cpf);
        }else{ 
            return view ('areacliente')->withMessage('Nenhum processo foi encontrado com o CPF fornecido!');
        }
    }else{
        return view('areacliente');
    }
});*/

Route::any('/buscar', 'AcompanhamentoController@buscar');

Route::resource('cliente', 'ClienteController')->middleware('auth');

Route::resource('empreendimento', 'EmpreendimentoController')->middleware('auth');

Route::resource('processo', 'ProcessoController')->middleware('auth');

Route::resource('contrato', 'ContratoController')->middleware('auth');