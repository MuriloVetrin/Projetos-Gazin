@extends('app')
@section('title', 'Adicionar Novo Cliente')
@section('content')

<h1>Novo Cliente</h1>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<form action="{{ route('clients.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" id="nome" placeholder="Digite o nome" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="endereco" class="form-label">Endereço</label>
        <input type="text" name="endereco" id="endereco" placeholder="Digite o endereço" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="cpf" class="form-label">CPF</label>
        <input type="text" name="cpf" id="cpf" placeholder="Digite seu CPF" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="observacao" class="form-label">Observação</label>
        <textarea name="observacao" id="observacao" placeholder="Digite a observação" cols="30" rows="10"
            class="form-control" required></textarea>
    </div>
    <button class="btn btn-success w-100" type="submit">Enviar</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        
        $(document).on('click', function () {
           
            $('.alert-danger').fadeOut('fast');
        });
    });
</script>

@endsection
