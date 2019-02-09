@extends('layouts.app')

@section('title', 'Temas')

@section('styles')
    <link href="{{ asset('css/temas.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <h3 class="title">Postagens</h3>        
        @auth
        <a href="{{url('postagens/cadastrar')}}" id="addPostagem"><i class="fas fa-plus-circle"></i></a>
        @endauth
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tema</th>
                    <th scope="col">Descrição</th>
                    @auth
                    <th scope="col" class="links-table-title">Opções</th>
                    @endauth
                </tr>
            </thead>
            <tbody>
                @foreach ($postagens as $postagem)
                    <div>
                        <h1>{{$postagem->titulo}}</h1>
                    </div>
                    <div>
                        <h1>{{$postagem->user->name}}</h1>
                        <p>{{$postagem->tema->nome}}</p>
                    </div>
                    <div>
                        <div>{{$postagem->descricao}}</div>
                    </div>
                    <div>
                    </div>

                    @auth
                    <td class="links-table">
                        <a href="{{url('postagems/atualizar/'.$postagem->id)}}" class="icon-edit"><i class="fas fa-edit"></i></a>
                        <form action="{{url('postagens/deletar/'.$postagem->id)}}" method="post" style="display: inline;">
                            {{csrf_field()}}
                            {{ method_field('delete') }}
                            <button type="submit" id="icon-submit" class="icon-trash"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        
                    </td>
                    @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$postagens->render()}}
        {{-- <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav> --}}
    </div>
@endsection

