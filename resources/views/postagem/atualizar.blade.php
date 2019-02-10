@extends('layouts.app')

@section('title', 'Atualizar Postagem')

@section('content')
{{-- style="padding: 50px 0px;" --}}
    <div class="container">
        @if (Route::has('login'))
            @auth
                <div class="row" style=" justify-content: center; padding: 30px 0px;">
                    <div class="col-lg-6">
                        <h3 class="text-center">Atualização da Postagem</h3>
                        <form method="post" action="{{ url('postagens/atualizar/'.$postagem->id) }}" class="">
                            {{csrf_field()}}
                            {{ method_field('PATCH') }}
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
                                <select class="form-control" id="temaInput" name="tema">
                                @foreach ($temas as $tema)
                                    <option value="{{$tema->id}}">{{$tema->nome}}</option>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <input type="submit" rows="4" class="btn btn-primary" value="cadastrar">
                            </div>
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