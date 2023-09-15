@extends('app')
@section('title','Lista de clientes')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h1>Lista de Clients</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Endereço</th>
            <th scope="col">CPF</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
        <tr>
            <th scope="row">{{$client->id}}</th>
            <th scope="row">
                <a href="{{route('clients.show', $client)}}">{{$client->nome}}</a>
            </th>
            <th scope="row">{{$client->endereco}}</th>
            <th scope="row">{{ substr($client->cpf, 0, 3) . '.' . substr($client->cpf, 3, 3) . '.' . substr($client->cpf, 6, 3) . '-' . substr($client->cpf, 9, 2) }}</th>
            <th>
                <a class="btn btn-primary" href="{{route('clients.edit', $client)}}">Editar</a>

                <form action="{{route('clients.destroy', $client)}}" method="POST">
                    @method('DELETE')
                    @csrf

                    <button class="btn btn-danger" type="submit" onclick="return confirm('Tem certeza que quer apagar?')">APAGAR</button>
                </form>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>
<a class="btn btn-success" href="{{ route('clients.create') }}">Novo Cliente</a>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
       
        $(document).on('click', function () {
          
            $('.alert-success').fadeOut('fast');
        });
    });
</script>
@endsection
