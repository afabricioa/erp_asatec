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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/teste', 'PageController@teste');

Route::get('/restrita', 'PageController@restrita');

Route::get('/areacliente', 'PageController@areacliente');

Route::resource('cliente', 'ClienteController')->middleware('auth');

Route::resource('empreendimento', 'EmpreendimentoController')->middleware('auth');

Route::resource('processo', 'ProcessoController')->middleware('auth');

Route::resource('contrato', 'ContratoController')->middleware('auth');

Route::resource('noticia', 'NoticiaController')->middleware('auth');



