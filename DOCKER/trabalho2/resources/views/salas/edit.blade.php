@extends('app')
@section('title', 'Editar Sala')
@section('content')

    <h1>Editar Sala</h1>
 <form action="{{ route('salas.update', $sala) }}" method="POST">
         @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Digite o nome" value="{{ $sala->nome }}"
                class="form-control" required>
        </div>

        <button class="btn btn-success mb-3" type="submit">Enviar</button>
        <a class="btn btn-secondary mb-3" href="{{ route('salas.index') }}">Voltar para lista de Salas</a>
    </form>
@endsection
