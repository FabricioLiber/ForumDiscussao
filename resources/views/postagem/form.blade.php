@extends('layouts.app')

@section('title', 'Cadastrar Postagem')

@section('content')
{{-- style="padding: 50px 0px;" --}}
    <div class="container">
        @if (Route::has('login'))
            @auth
                <div class="row" style=" justify-content: center; padding: 30px 0px;">
                    <div class="col-lg-6">
                        <h3 class="text-center">Cadastro de Postagem</h3>
                        <form method="post" action="{{ url('/postagens/cadastrar') }}" class="">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="tituloInput">Postagem</label>
                                <input type="text" class="form-control" name="titulo" id="tituloInput" placeholder="Ex.: Python">
                            </div>
                            <div class="form-group">
                                <label for="descriptionInput">Descrição</label>
                                <textarea class="form-control" id="descriptionInput" rows="4" name="descricao"
                                    placeholder="Ex.: É uma linguagem de programação.">
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="temaInput">Tema</label>
                                <select class="form-control" id="temaInput">
                                @foreach ($temas as $tema)
                                    <option value="{{$tema->id}}">{{$tema->nome}}</option>
                                @endforeach
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
