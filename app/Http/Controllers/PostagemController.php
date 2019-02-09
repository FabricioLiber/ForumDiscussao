<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Postagem;

class PostagemController extends Controller
{
    //
    public function index(){
        return view('postagem.list')->with('postagens', Postagem::paginate(5));
    }
    public function cadastrar(){
        return view('postagem.form');
    }

    public function getViewCadastrar(Request $request){
        $postagem = new Postagem();
        //$postagem->
    }
}
