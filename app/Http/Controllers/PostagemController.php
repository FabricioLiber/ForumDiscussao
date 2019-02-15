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
        // olhar se está funcionando a atribuição de tema->postagens
        $tema = Tema::find($id_tema);
        $tema->postagens()->save($postagem);
        $postagem->id_tema = $id_tema;
        $postagem->save();
        return redirect('postagem/'.$postagem->id);
    }

    public function getViewAtualizar($id){
        $postagem = Postagem::find($id);
        $temas = Tema::all();
        return view('postagem.atualizar', ['postagem'=>$postagem, 'temas'=>$temas]);
    }

    public function atualizar(Request $req, $id){
        $post = Postagem::find($id);
        if ($req->filled('titulo') and $req->filled('descricao') and $req->filled('tema')) {
            if ($post->titulo === $req->input('titulo') and $post->descricao === $req->input('descricao') and $post->tema === $req->input('tema')) {
                return redirect('/temas');
            } else {
                if ($post->titulo !== $req->input('titulo'))
                    $post->titulo = $req->input('titulo');
                if ($post->descricao !== $req->input('descricao'))
                    $post->descricao = $req->input('descricao');
                if ($post->tema !== $post->input('tema'))
                    $post->tema = $req->input('tema');
                $post->save();
                return redirect('/temas');
            }
        }
        return redirect('/postagens');
    }

    public function detail($id)
    {
        $postagem = Postagem::find($id);
        return view('postagem.detail', ['postagem'=>$postagem]);
    }

    public function deletar ($id) {
        $postagem = Postagem::find($id);
        $postagem->delete();
        return redirect('/postagens');
    }

}
