@extends('templates.base')
@section('title', 'Recados')
@section('h1', 'Página de recados pessoais')

@section('content')


<div class="row">
    <div class="col">
        <p>Sejam bem-vindos à página de recados</p>

        <a class="btn btn-primary" href="{{route('recados.inserir')}}" role="button">Novo recado</a>
    </div>
</div>

<main class="recados-container">

  {{-- para cada recado --}}
        @foreach($recs as $rec)
         {{-- gera um card do bootstrap--}}
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{$rec->nome}}</h5>
              <p class="card-text">{{$rec->comentario}}</p>
              <a href="{{ route('recados.edit', $rec) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i>Editar</a>
              @if (session('usuario'))
              <a href="{{ route('recados.delete', $rec) }}" class="btn btn-danger"><i class="bi bi-trash"></i>Excluir</a>
              @endif
            </div>
          </div>
        @endforeach
</main>
@endsection
