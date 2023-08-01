@extends('app')
@section('title','Detalhes do estudante')

@section('content')

<div class="card" style="width: 18rem;">
    <div class="card-header">
        {{$estudantes->nome}}
    </div>
    <div class="card-body">
        <p class="card-text"><strong>ID: </strong>{{$estudantes->id}}</p>
        <p class="card-text"><strong>Nome: </strong>{{$estudantes->nome}}</p>
        <p class="card-text"><strong>CPF: </strong>{{ substr($estudantes->cpf, 0, 3) . '.' . substr($estudantes->cpf, 3, 3) . '.' . substr($estudantes->cpf, 6, 3) . '-' . substr($estudantes->cpf, 9, 2) }}</p>
        <p class="card-text"><strong>Data de Nascimento: </strong>{{ date('d/m/Y', strtotime($estudantes->nascimento)) }}</p>
        <br>
        <a href="{{route('estudantes.index')}}" class="btn btn-success">Voltar á lista de estudantes</a>
    </div>
</div>

@endsection