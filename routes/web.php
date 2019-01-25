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

Route:: group(['prefix' => 'temas', 'middleware' =>'auth'], function(){
    Route::get('cadastrar', 'TemaController@getViewCadastrar');
	Route::post('cadastrar', 'TemaController@cadastrar');
    Route::get('atualizar/{id}', 'TemaController@getViewAtualizar');
    Route::put('atualizar', 'TemaController@atualizar');
    Route::patch('atualizar/{id}', 'TemaController@atualizar');
    Route::delete('deletar/{id}', 'TemaController@deletar');
});

// Rotas de Resposta

Route::get('respostas/', 'TemaController@index');

Route:: group(['prefix' => 'respostas', 'middleware' =>'auth'], function(){
    Route::get('cadastrar', 'TemaController@getViewCadastrar');
    Route::post('cadastrar', 'TemaController@cadastrar');
    Route::get('atualizar/{id}', 'TemaController@getViewAtualizar');
    Route::put('atualizar/{id}', 'TemaController@atualizar');
    Route::patch('atualizar/{id}', 'TemaController@atualizar');
    Route::delete('deletar/{id}', 'TemaController@deletar');
});

// Rotas de Autenticacao

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');