<?php

namespace App\Http\Controllers;

use App\Postagem;
use App\Tema;
use Illuminate\Http\Request;

class PesquisaController extends Controller
{
    //
    public function index (Request $request)
    {

        if (!$request->filled('q'))
            return back();
        $temas = Tema::where('nome', 'LIKE', '%'.$request->query('q').'%')->get();
        $postagens = Postagem::where('titulo', 'LIKE', '%'.$request->query('q').'%')->get();
        return view('search', ['temas' => $temas, 'postagens' => $postagens]);
    }
}
