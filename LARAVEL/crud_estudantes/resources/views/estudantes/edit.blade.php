@extends('app')
@section('title', 'Editar Estudante')

@section('content')
    <form action="{{ route('estudantes.update', $estudantes) }}" method="POST">
         @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Digite o nome" value="{{ $estudantes->nome }}"
                class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" id="cpf" placeholder="Digite o seu CPF"
                value="{{ $estudantes->cpf }}" class="form-control" required>
        </div>
        <div class="mb-3">
           <label for="nascimento">Coloque sua data de Nascimento:</label>
           <input type="date" name="nascimento" id="nascimento" placeholder="Preencha sua data de nascimento" required>
        </div>
        <button class="btn btn-success mb-3" type="submit"> Enviar </button>
        <a class="btn btn-secondary mb-3" href="{{ route('estudantes.index') }}">Voltar para lista de estudantes</a>
    </form>
@endsection
