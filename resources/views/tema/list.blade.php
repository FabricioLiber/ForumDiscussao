@extends('layouts.app')

@section('title', 'Temas')

@section('styles')
    <link href="{{ asset('css/temas.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="container">
        <div style="display:flex; justify-content: space-between;   ">
            <h3 class="title">Temas</h3>
            @auth
                <a href="{{url('temas/cadastrar')}}" id="addTema"><i class="fas fa-plus-circle"></i></a>
            @endauth
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tema</th>
                <th scope="col">Descrição</th>
                <th scope="col">Postagens</th>
                @auth
                    <th scope="col" class="links-table-title">Opções</th>
                @endauth
            </tr>
            </thead>
            <tbody>
            @foreach ($temas as $tema)
                    <tr>
                        <th scope="row">{{$tema->id}}</th>
                        <td><a href="{{url('temas/show/'.$tema->id)}}">{{$tema->nome}}</a></td>
                        <td>{{$tema->descricao}}</td>
                        <td>{{$tema->qtd_postagens}}</td>                      
                        @if ($tema->user == Auth::user())
                            <td class="links-table">
                                <a href="{{url('temas/atualizar/'.$tema->id)}}" class="icon-edit"><i class="fas fa-edit"></i></a>
                                <form action="{{url('temas/deletar/'.$tema->id)}}" method="post" style="display: inline;">
                                    {{csrf_field()}}
                                    {{ method_field('delete') }}
                                    <button type="submit" id="icon-submit" class="icon-trash"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        @endif
                    </tr>
            @endforeach
            </tbody>
        </table>
        {{$temas->render()}}
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

