<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \App\Tema;

class TemaController extends Controller
{
    //
    public function index ()
    {
        return view('tema.list')->with('temas', \App\Tema::paginate(5));
    }

    public function showPostagens ($id)
    {
        $tema = Tema::find($id);
//        $teste = $tema->postagens;
//        var_dump($teste);
        return view('tema.detail')->with('tema', $tema);
    }

    public function getViewCadastrar ()
    {
        return view('tema.form');
    }

    public function cadastrar (Request $request)
    {
        $tema = new Tema();
        $tema->nome = $request->input('nome');
        $tema->descricao = $request->input('descricao');
        $tema->id_usuario = auth()->user()->id;
        $tema->qtd_postagens = 0;
        $tema->save();
        auth()->user()->temas()->save($tema);
        return redirect('/temas');
    }

    public function getViewAtualizar ($id)
    {

        $tema = Tema::find($id);
        return view('tema.update', ['tema'=>$tema]);
    }

    public function atualizar (Request $request, $id)
    {
        $tema_atual = Tema::find($id);
        if ($request->filled('nome') and $request->filled('descricao')) {
            if ($tema_atual->nome === $request->input('nome') and $tema_atual->descricao === $request->input('descricao')) {
                return redirect('/home');
            } else {
                if ($tema_atual->nome !== $request->input('nome'))
                    $tema_atual->nome = $request->input('nome');
                if ($tema_atual->descricao !== $request->input('descricao'))
                    $tema_atual->descricao = $request->input('descricao');
                $tema_atual->save();
                return redirect('/temas');
            }
        }
        return redirect('/home');
    }

    public function deletar ($id)
    {
        $tema = Tema::find($id);
        $tema->delete();
        return redirect('/temas');
    }
}
