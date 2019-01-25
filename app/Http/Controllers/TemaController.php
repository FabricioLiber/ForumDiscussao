<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \App\Tema;

class TemaController extends Controller
{
    //
    public function index () {
        return view('temas')->with('temas', \App\Tema::paginate(5));
    }

    public function getViewCadastrar () {
        return view('cadastrarTema');
    }

    public function cadastrar (Request $request) {

        $tema = new Tema();
        $tema->nome = $request->input('nome');
        $tema->descricao = $request->input('descricao');
        $tema->save();
        return redirect('/temas');
    }

    public function getViewAtualizar ($id) {
        $tema = Tema::find($id);
        return view('atualizarTema', ['tema'=>$tema]);
    }

    public function atualizar (Request $request, $id) {
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

    public function deletar ($id) {
        $tema = Tema::find($id);
        $tema->delete();
        return redirect('/temas');
    }
}
