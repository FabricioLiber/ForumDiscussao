@extends('layouts.app')

@section('title', 'Temas')

@section('styles')
    <link href="{{ asset('css/temas.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <h3 class="title">Temas</h3>        
        @auth
        <a href="{{url('temas/cadastrar')}}" id="addTema"><i class="fas fa-plus-circle"></i></a>
        @endauth
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tema</th>
                    <th scope="col">Descrição</th>
                    @auth
                    <th scope="col">Opções</th>
                    @endauth
                </tr>
            </thead>
            <tbody>
                @foreach ($temas as $tema)
                    <tr>
                        <th scope="row">{{$tema->id}}</th>
                        <td>{{$tema->nome}}</td>
                        <td>{{$tema->descricao}}</td>
                        @auth
                        <td class="links-table">
                            <a href="{{url('temas/atualizar/'.$tema->id)}}" class="icon-edit"><i class="fas fa-edit"></i></a>
                            <form action="{{url('temas/deletar/'.$tema->id)}}" method="post" style="display: inline;">
                                {{csrf_field()}}
                                {{ method_field('delete') }}
                                <button type="submit" id="icon-submit"><i class="fas fa-trash-alt"></i></button>
                            </form>
                            
                        </td>
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

