<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \App\Tema;

class TemaController extends Controller
{
    //
    public function index () {
        return view('temas')->with('temas', \App\Tema::all());
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
        return view('atualizar_tema', ['tema'=>$tema]);
    }

    public function atualizar () {

    }

    public function realizarAtualizacaoParcial (Request $request, $id) {
        $tema_atual = Tema::find($id);;
        var_dump($tema_atual);
        if ($request->filled('nome') and $request->filled('descricao')) {
            if ($tema_atual->nome === $request->input('nome') and $tema_atual->descricao === $request->input('descricao')) {
                return view('/home');
            } else {
                if (!$tema_atual->nome === $request->input('nome')) {
                    $tema_atual->nome = $request->input('nome');
                }
                if (!$tema_atual->nome === $request->input('nome')) {
                    $tema_atual = $request->input('descricao');
                }
                $tema_atual->save();
//                return redirect('/temas');
            }
        }
        return view('/home');
    }

    public function deletar () {

    }
}
