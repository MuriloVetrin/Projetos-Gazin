@extends('app')
@section('title','Detalhes do estudante')

@section('content')

<div class="card" style="width: 18rem;">
    <div class="card-header">
        {{$estudante->nome}}
    </div>
    <div class="card-body">
        <p class="card-text"><strong>ID: </strong>{{$estudante->id}}</p>
        <p class="card-text"><strong>Nome: </strong>{{$estudante->nome}}</p>
        <p class="card-text"><strong>CPF: </strong>{{ substr($estudante->cpf, 0, 3) . '.' . substr($estudante->cpf, 3, 3) . '.' . substr($estudante->cpf, 6, 3) . '-' . substr($estudante->cpf, 9, 2) }}</p>
        <p class="card-text"><strong>Data de Nascimento: </strong>{{ date('d/m/Y', strtotime($estudante->nascimento)) }}</p>
        <br>
        <a href="{{route('estudantes.index')}}" class="btn btn-success">Voltar á lista de estudantes</a>
    </div>
</div>

@endsection