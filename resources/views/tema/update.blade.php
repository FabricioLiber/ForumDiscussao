@extends('layouts.app')

@section('title', 'Atualizar Tema')

@section('content')
    {{-- style="padding: 50px 0px;" --}}
    <div class="container">
        @if (Route::has('login'))
            @auth
                <div class="row" style=" justify-content: center; padding: 30px 0px;">
                    <div class="col-lg-6">
                        <h3 class="text-center">Atualização de Tema</h3>
                        <form method="post" action="{{ url('temas/atualizar/'.$tema->id) }}" class="">
                            {{csrf_field()}}
                            {{ method_field('PATCH') }}
                            <div class="form-group">
                                <label for="nameInput">Tema</label>
                                <input type="text" class="form-control" name="nome" value="{{ $tema->nome }}" id="nameInput">
                            </div>
                            <div class="form-group">
                                <label for="descriptionInput">Descrição</label>
                                <textarea class="form-control" id="descriptionInput" rows="4" name="descricao">{{ $tema->descricao }}</textarea>                            </textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </form>
                    </div>
                </div>

            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        @endif
    </div>
@endsection