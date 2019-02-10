<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Postagem;
use \App\Tema;

class PostagemController extends Controller
{
    //
    public function index(){
        return view('postagem.list')->with('postagens', Postagem::paginate(5));
    }
    public function getViewCadastrar(){
        return view('postagem.form')->with('temas', Tema::all());
    }

    public function cadastrar(Request $request){
        $postagem = new Postagem();
        $postagem->titulo = $request->input('titulo');
        $postagem->descricao = $request->input('descricao');
        $tema = $request->input('tema');
        $postagem->tema = $tema;
        $postagem->save;
        return redirect('/postagens');
    }
}
