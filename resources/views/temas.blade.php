@extends('layouts.app')

@section('title', 'Temas')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Tema</th>
            <th scope="col">Descrição</th>
            <th scope="col">Opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($temas as $tema)
                <tr>
                    <th scope="row">{{$tema->id}}</th>
                    <td>{{$tema->nome}}</td>
                    <td>{{$tema->descricao}}</td>
                    <td>
                        <i class="fas fa-edit"></i>
                        <i class="fas fa-trash-alt"></i>
                    </td>
                </tr>
            {{-- <li class="list-group-item"><a href="{{ url('/temas/atualizar/'.$tema->id) }}">This is user {{ $tema->nome }}</p></li> --}}
            @endforeach
        </tbody>
          </table>
@endsection
{{-- @section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection --}}

