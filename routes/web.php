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

// Rota inicial (Raiz)
Route::get('/', function () {
    return view('welcome')->with('temas', App\Tema::all());
});

// Rotas de Tema

Route::get('temas/', 'TemaController@index');
Route::get('temas/{id}', 'TemaController@showPostagens');

Route:: group(['prefix' => 'temas', 'middleware' =>'auth'], function(){
    Route::get('cadastrar', 'TemaController@getViewCadastrar');
	Route::post('cadastrar', 'TemaController@cadastrar');
    Route::get('atualizar/{id}', 'TemaController@getViewAtualizar');
    Route::put('atualizar', 'TemaController@atualizar');
    Route::patch('atualizar/{id}', 'TemaController@atualizar');
    Route::delete('deletar/{id}', 'TemaController@deletar');
});

// Rotas de Postagem

Route::get('postagens/','PostagemController@index');
Route::get('postagem/{id}', 'PostagemController@detail');
Route:: group(['prefix' => 'postagens','middleware' => 'auth'], function(){
    Route::get('cadastrar', 'PostagemController@getViewCadastrar');
    Route::post('cadastrar', 'PostagemController@cadastrar');
    Route::get('atualizar/{id}', 'PostagemController@getViewAtualizar');
    Route::put('atualizar', 'PostagemController@atualizar');
    Route::patch('atualizar/{id}', 'PostagemController@atualizar');
    Route::delete('deletar/{id}', 'PostagemController@deletar');
});

// Rotas de Resposta

Route::get('respostas/', 'TemaController@index');

Route:: group(['prefix' => 'respostas', 'middleware' =>'auth'], function(){
    Route::get('cadastrar', 'TemaController@getViewCadastrar');
    Route::post('cadastrar', 'TemaController@cadastrar');
    Route::get('atualizar/{id}', 'TemaController@getViewAtualizar');
    Route::put('atualizar/{id}', 'TemaController@atualizar');
    Route::patch('atualizar/{id}', 'TemaController@atualizar');
    Route::patch('atualizar/{id}', 'TemaController@realizarAtualizacaoParcial');
    Route::delete('deletar/{id}', 'TemaController@deletar');
});


// Rotas de Pesquisa
Route::get('pesquisar/', 'TemaController@index');


// Rotas de Autenticacao

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
