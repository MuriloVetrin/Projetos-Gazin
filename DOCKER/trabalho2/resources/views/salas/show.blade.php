@extends('app')
@section('title','Detalhes da Sala')

@section('content')

<div class="card" style="width: 18rem;">
    <div class="card-header">
        {{$sala->nome}}
    </div>
    <div class="card-body">
        <p class="card-text"><strong>ID: </strong>{{$sala->id}}</p>
        <p class="card-text"><strong>Nome: </strong>{{$sala->nome}}</p>
        <p class="card-text"><strong>Quantidade de alunos nessa sala: </strong>{{ $sala->estudante->count() }}</p>

        <br>
        <a href="{{route('salas.index')}}" class="btn btn-success">Voltar á lista de Salas</a>
    </div>
</div>

@endsection