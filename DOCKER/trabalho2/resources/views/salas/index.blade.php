@extends('app')
@section('title','Lista de Salas')
@section('content')
<h1>Lista de Salas</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Quantidade de Alunos</th>
            <th scope="col">Editar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($salas as $sala)
        <tr>
            <th scope="row">{{$sala->id}}</th>
            <th scope="row">
                <a href="{{route('salas.show', $sala)}}">{{$sala->nome}}</a>
            </th>
            <td>{{ $sala->estudante->count() }}</td>
            <th>
                <a class="btn btn-primary" href="{{route('salas.edit', $sala)}}">Editar</a>

            <form action="{{route('salas.destroy', $sala)}}"
            method="POST"
            >
            @method('DELETE')
            @csrf

            <button  

              class="btn btn-danger"
              type="submit"
              onclick="return confirm('Tem certeza que quer apagar?')" 
              > 
              
              APAGAR

            </button>
             </form>
             @if(session('error') && session('sala_id') == $sala->id)
                <div class="alert alert-danger mt-2">{{ session('error') }}</div>
             @endif
            </th>
           
        </tr>

        @endforeach
    </tbody>
</table>

<a class="btn btn-success" href="{{ route('salas.create') }}">Nova Sala</a>
<a class="btn btn-secondary" href="{{ route('estudantes.index') }}">Voltar para Lista de Estudantes</a>

@endsection