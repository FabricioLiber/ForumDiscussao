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


Route::get('temas/', 'TemaController@index');

//, 'middleware' =>'auth'

Route:: group(['prefix' => 'temas', 'middleware' =>'auth'], function(){
//  Route::get('/', 'TemaController@index');
    Route::get('cadastrar', 'TemaController@getViewCadastrar');
	Route::post('cadastrar', 'TemaController@cadastrar');
    Route::get('atualizar/{id}', 'TemaController@getViewAtualizar');
    Route::put('atualizar', 'TemaController@atualizar');
    Route::patch('atualizar', 'TemaController@realizarAtualizacaoParcial');
    Route::delete('/{id}', 'TemaController@deletar');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
