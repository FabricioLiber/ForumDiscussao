<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesquisaController extends Controller
{
    //
    public function index (Request $request)
    {
        if ($request->filled('search'))
            return view('pesquisar', [])
        return view('pesquisar', [])
    }
}
