@extends('layouts.app')

@section('title', 'Welcome')

@section('styles')

@endsection

@section('content')
    <div class="container">
        <div class="row align-content-center">
            <div class="col-lg-8">
                <h3 class="title">Postagens mais votadas</h3>
                @foreach ($postagens as $postagem)                    
                    <div class="row">
                        <div class="col-lg-2">
                            {{$postagem->votos}} votos
                        </div>
                        <div class="col-lg-2">
                            {{count($postagem->respostas)}} respostas
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col">
                                    {{$postagem->titulo}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    {{date("d M Y", $postagem->created_at->timestamp)}}, by {{$postagem->user->name}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-4">
                <h3 class="title">Temas mais comentados</h3>
                <ol class="list-group">
                    @foreach ($temas as $tema)
                            <li class="list-group-item text-center">{{$tema->nome}}</li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
@endsection

