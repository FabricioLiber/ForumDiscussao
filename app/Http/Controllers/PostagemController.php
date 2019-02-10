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
        $postagem->id_usuario = auth()->user()->id;
        $postagem->titulo = $request->input('titulo');
        $postagem->descricao = $request->input('descricao');
        $id_tema = $request->input('tema');
        $postagem->id_tema = $id_tema;
        $postagem->save();
        return redirect('postagem/'.$postagem->id);
    }
}
