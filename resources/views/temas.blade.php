@extends('layouts.app')

@section('title', 'Temas')

@section('content')
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
                    <td>
                        <a href="{{url('temas/atualizar/'.$tema->id)}}"><i class="fas fa-edit"></i></a>
                        <i class="fas fa-trash-alt"></i>
                    </td>
                    @endauth
                </tr>
            {{-- <li class="list-group-item"><a href="{{ url('/temas/atualizar/'.$tema->id) }}">This is user {{ $tema->nome }}</p></li> --}}
            @endforeach
        </tbody>
    </table>
    
   <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="teste">
        Launch demo modal
      </button>
      
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

    
    <script>
        console.log('funfou');
        document.querySelector('#teste').addEventListener('click', evt => {
            console.log('Funfou d+')
        })
        
    </script>
@endsection
{{-- @section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection --}}

