@extends('layouts.app')

@section('title', 'Pesquisa')

@section('content')
    @if(isset($_GET['q']))
        <h3>Temas relacionados a "{{$_GET['q']}}"</h3>
        <ul class="list-group">
            @foreach ($temas as $tema)
                <li class="list-group-item text-center">{{$tema->nome}}</li>
            @endforeach
        </ul>
        <h3>Posts relacionados a "{{$_GET['q']}}"</h3>
        @foreach ($postagens as $postagem)
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
    @else
        <h3>Nenhum resultado encontrado para ""</h3>
    @endif
    {{--{{$postagens->render()}}--}}
@endsection