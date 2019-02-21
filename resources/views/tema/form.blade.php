@extends('layouts.app')

@section('title', 'Cadastrar Tema')

@section('content')
    <div class="container">
        @if (Route::has('login'))
            @auth
                <div class="row" style=" justify-content: center; padding: 30px 0px;">
                    <div class="col-lg-6">
                        <h3 class="text-center">Cadastro de Tema</h3>
                        <form method="post" action="{{ url('/temas/cadastrar') }}" class="">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="nameInput">Tema</label>
                                <input type="text" class="form-control" name="nome" id="nameInput" placeholder="Ex.: Python">
                            </div>
                            <div class="form-group">
                                <label for="descriptionInput">Descrição</label>
                                <textarea class="form-control" id="descriptionInput" rows="4" name="descricao"
                                          placeholder="Ex.: É uma linguagem de programação."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </div>
                </div>

            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        @endif
    </div>
@endsection
