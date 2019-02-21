<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Postagem;
use \App\Resposta;

class RespostaController extends Controller
{

    public function cadastrar ($id, Request $request) {
        $resposta = new Resposta();
        $post = Postagem::find($id);
        $resposta->id_usuario = auth()->user()->id;
        $resposta->id_postagem = $post->id;
        $resposta->descricao = $request->input('resposta');
        $post->respostas()->save($resposta);
        $resposta->save();
        return redirect('postagem/'.$post->id);
    }

    public function getViewAtualizar($id_p, $id){
        $postagem = Postagem::find($id_p);
        $resposta = Resposta::find($id);
        return view('resposta.atualizar', ['postagem'=>$postagem, 'resposta'=>$resposta]);
    }


    public function atualizar (Request $req, $id, $id_p) {
        $resposta = Resposta::find($id);
        if ($req->filled('resposta')){
            if ($resposta->descricao === $req->input('resposta')){
                return redirect('postagens');
            } else {
                if ($resposta->descricao !== $req->input('resposta'))
                    $resposta->descricao = $req->input('resposta');
                $resposta->save();
                return redirect('postagem/'.$id_p);
            }
        }
        return redirect('postagem/'.$id_p);
    }

    public function deletar ($id_p, $id) {
        $resposta = Resposta::find($id);
        if ($resposta != null)
            $resposta->delete();
        return redirect('postagem/'.$id_p);
    }
}
