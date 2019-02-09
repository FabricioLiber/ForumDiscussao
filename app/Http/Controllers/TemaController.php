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
        return view('atualizar_tema', $tema);
    }

    public function atualizar (Request $request, $id) {

    }

    public function deletar ($id) {

    }
}
