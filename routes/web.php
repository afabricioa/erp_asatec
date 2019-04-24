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

Route::get('/cadastra', 'PageController@cadastra');

Route::get('/contrato', 'PageController@contrato');

Route::get('/restrita', 'PageController@restrita');

Route::resource('cliente', 'ClienteController');

Route::resource('empreendimento', 'EmpreendimentoController');



