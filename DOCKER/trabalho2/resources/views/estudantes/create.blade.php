@extends('app')
@section('title', 'Adicionar Novo Estudante')
@section('content')

    <h1>Novo Estudante</h1>

    <form action="{{ route('estudantes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Digite o nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" id="cpf" placeholder="Digite seu CPF" class="form-control" required>
        </div>
        <div class="mb-3">
           <label for="nascimento">Coloque sua data de Nascimento:</label>
           <input type="date" name="nascimento" id="nascimento" placeholder="Preencha sua nascimento" required>
        </div>
        <div class="mb-3">
           <label for="sala_id" class="form-label">Sala</label>
           <select name="sala_id" id="sala_id" class="form-control" required>
              
               <option value="">Selecione a sala</option>

            @foreach($salas as $sala)
                <option value="{{ $sala->id }}">{{ $sala->nome }}</option>
             @endforeach
          </select>
        </div>

         <button class="btn btn-success mb-3" type="submit"> Enviar </button>
         <a class="btn btn-secondary mb-3" href="{{ route('estudantes.index') }}">Voltar para lista de Estudantes</a>
    </form>

@endsection
