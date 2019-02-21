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

function cmp($a, $b)
{
    return strcmp($a->nome, $b->nome);
}

// Rota inicial (Raiz)
Route::get('/', function () {
    // 5 temas com mais postagens
    $temas = App\Tema::orderBy('qtd_postagens', 'desc')->take(5)->get();

    // 5 Postagens com mais votos
    $postagens = App\Postagem::orderBy('votos', 'desc')->take(5)->get();

    return view('welcome')->with(['temas'=> $temas, 'postagens' => $postagens]);
});

// Rotas de Tema

Route::get('temas/', 'TemaController@index');
Route::get('temas/show/{id}', 'TemaController@showPostagens');

Route::group(['prefix' => 'temas', 'middleware' =>'auth'], function(){
    Route::get('cadastrar', 'TemaController@getViewCadastrar');
	Route::post('cadastrar', 'TemaController@cadastrar');
    Route::get('atualizar/{id}', 'TemaController@getViewAtualizar');
    Route::patch('atualizar/{id}', 'TemaController@atualizar');
    Route::delete('deletar/{id}', 'TemaController@deletar');
});

// Rotas de Postagem

Route::get('postagens/','PostagemController@index');
Route::get('postagem/{id}', 'PostagemController@detail');
Route::group(['prefix' => 'postagens','middleware' => 'auth'], function(){
    Route::get('cadastrar', 'PostagemController@getViewCadastrar');
    Route::post('cadastrar', 'PostagemController@cadastrar');
    Route::get('atualizar/{id}', 'PostagemController@getViewAtualizar');
    Route::put('atualizar', 'PostagemController@atualizar');
    Route::patch('atualizar/{id}', 'PostagemController@atualizar');
    Route::delete('deletar/{id}', 'PostagemController@deletar');
});

// Rotas de Resposta

Route::group(['prefix' => 'respostas', 'middleware' =>'auth'], function(){
    Route::post('{id_p}/cadastrar', 'RespostaController@cadastrar');
    Route::put('{id_p}/atualizar/{id}', 'RespostaController@atualizar');
    Route::patch('{id_p}/atualizar/{id}', 'RespostaController@atualizar');
    Route::delete('{id_p}/deletar/{id}', 'RespostaController@deletar');
});


// Rotas de Pesquisa
Route::get('search/', 'PesquisaController@index');


// Rotas de Autenticacao
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
