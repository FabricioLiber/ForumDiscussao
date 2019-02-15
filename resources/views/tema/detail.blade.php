@extends('layouts.app')

@section('title', 'Postagens por temas')

@section('styles')
    <link href="{{ asset('css/temas.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <h1 class="title">Postagens do Tema: {{$tema->nome}}</h1>
        @auth
            <a href="{{url('postagens/cadastrar')}}" id="addPostagem"><i class="fas fa-plus-circle"></i></a>
        @endauth
        @foreach ($tema->postagens as $postagem)
            <div class="blog-post">
                <h2 class="blog-post-title">{{$postagem->titulo}}</h2>
                <p class="blog-post-meta">{{date("d M Y", $postagem->creat_at)}}, by{{$postagem->user->name}}</p>
                <p>{{$postagem->tema->nome}}</p>
                <p>{{$postagem->descricao}}</p>
                @if ($postagem->user == Auth::user())
                    <div class="links-table">
                        <a href="{{url('postagens/atualizar/'.$postagem->id)}}" class="icon-edit"><i class="fas fa-edit"></i></a>
                        <form action="{{url('postagens/deletar/'.$postagem->id)}}" method="post" style="display: inline;">
                            {{csrf_field()}}
                            {{ method_field('delete') }}
                            <button type="submit" id="icon-submit" class="icon-trash"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
@endsection

