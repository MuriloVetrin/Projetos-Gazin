@extends('app')
@section('title', 'Adicionar Nova Sala')
@section('content')

    <h1>Nova Sala</h1>

    <form action="{{ route('salas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Digite o nome da sala" class="form-control" required>
        </div>
       
        <button class="btn btn-success mb-3" type="submit">Enviar</button>
        <a class="btn btn-secondary mb-3" href="{{ route('salas.index') }}">Voltar para lista de Estudantes</a>
    </form>

@endsection
