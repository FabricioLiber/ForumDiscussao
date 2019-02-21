@extends('layouts.app')

@section('title', 'Postagens')

@section('styles')
    <link href="{{ asset('css/temas.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">   
        <div class="blog-post">
            <h2 class="blog-post-title">{{$postagem->titulo}}</h2>
            <p class="blog-post-meta text-right">{{date("d M Y", $postagem->creat_at)}}, by {{$postagem->user->name}}</p>
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
            <h3>Respostas</h3>
            @forelse ($postagem->respostas as $resposta)
                <p>{{$resposta->descricao}}</p>
                <p class="blog-post-meta ">{{date("d M Y", $resposta->created_at->timestamp)}}, by {{$resposta->user->name}}</p>
                @if ($resposta->user == Auth::user())
                    <div class="links-table">
                        <a href="{{url('respostas/'.$postagem->id.'/atualizar/'.$resposta->id)}}" method="put" class="icon-edit"><i class="fas fa-edit"></i></a>
                        <form action="{{url('respostas/'.$postagem->id.'/deletar/'.$resposta->id)}}" method="post" style="display: inline;">
                            {{csrf_field()}}
                            {{ method_field('delete') }}
                            <button type="submit" id="icon-submit" class="icon-trash"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </div>
                @endif
            @empty 
            @endforelse
            @auth  
                <form method="post" action="{{ url('/respostas/'.$postagem->id.'/cadastrar') }}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="text" class="form-control" name="resposta" id="respostaInput">
                        <input type="submit" rows="4" class="btn btn-primary" value="cadastrar">
                    </div>
                </form>    
            @endauth
        <div>
    </div>
@endsection

