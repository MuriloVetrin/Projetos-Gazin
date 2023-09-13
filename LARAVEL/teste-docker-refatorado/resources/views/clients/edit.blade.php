@extends('app')
@section('title', 'Editar Cliente')

@section('content')
    <form action="{{ route('clients.update', $client) }}" method="POST">
         @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Digite o nome" value="{{ $client->nome }}"
                class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" name="endereco" id="endereco" placeholder="Digite o endereço"
                value="{{ $client->endereco }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" id="cpf" placeholder="Digite o seu CPF"
                value="{{ $client->cpf }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="observacao" class="form-label">Observação</label>
            <textarea name="observacao" id="observacao" placeholder="Digite a observação" cols="30" rows="10"
                class="form-control" required>{{ $client->observacao }}</textarea>
        </div>
        <button class="btn btn-success w-100" type="submit">Enviar</button>
    </form>
@endsection