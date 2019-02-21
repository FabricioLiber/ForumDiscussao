@extends('layouts.app')

@section('title', 'Pesquisa')

@section('content')
    <div class="container">
        @if(isset($_GET['q']))
            <h3>Temas relacionados a "{{$_GET['q']}}"</h3>
            <ul class="list-group">
                @forelse ($temas as $tema)
                    <li class="list-group-item text-center">{{$tema->nome}}</li>
                @empty
                    <p>Não existem temas que contenham esta parte no título!</p>  
                @endforelse
            </ul>
            <h3>Posts relacionados a "{{$_GET['q']}}"</h3>
            @forelse ($postagens as $postagem)
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
            @empty
                <p>Não existem postagens que contenham esta parte no título!</p>
            @endforelse
        @else
            <h3>Nenhum resultado encontrado para ""</h3>
        @endif
    </div>
    
@endsection