@extends('layouts.app')

@section('title', 'Welcome')

@section('styles')

@endsection

@section('content')
    <div class="container">
        <div class="row align-content-center">
            <div class="col-lg-9">
                <h3 class="title">Postagens</h3>
            </div>
            <div class="col-lg-3">
                <h3 class="title">Temas</h3>
                <ul class="list-group">
                    @foreach ($temas as $tema)
                            <li class="list-group-item text-center">{{$tema->nome}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

