@extends('app')
@section('title','Lista de Estudantes')

@section('content')
<h1>Lista de Estudantes</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col">Aniversario</th>
            <th scope="col">ID_Sala</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($estudantes as $estudantes )
        <tr>
            <th scope="row">{{$estudantes ->id}}</th>
            <th scope="row">
                <a href="{{route('estudantes.show', $estudantes )}}">{{$estudantes->nome}}</a>
            </th>
            <th scope="row">{{ substr($estudantes->cpf, 0, 3) . '.' . substr($estudantes->cpf, 3, 3) . '.' . substr($estudantes->cpf, 6, 3) . '-' . substr($estudantes->cpf, 9, 2) }}</th>
            <th scope="row">{{ date('d/m/Y', strtotime($estudantes->nascimento)) }}</th>
            <th scope="row">{{$estudantes->sala_id}}</th>
            <th>
            
                <a class="btn btn-primary" href="{{route('estudantes.edit', $estudantes)}}">Editar</a>

            <form action="{{route('estudantes.destroy', $estudantes)}}"
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
            </th>
           
        </tr>

        @endforeach
    </tbody>
</table>
<a class="btn btn-success" href="{{ route('estudantes.create') }}">Novo Estudantes</a>
<a class="btn btn-primary" href="{{ route('salas.index') }}">Gerenciar Salas</a>
@endsection