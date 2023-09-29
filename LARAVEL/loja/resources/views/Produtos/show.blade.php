@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Detalhes do Produto</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <img src="{{ asset('storage/' . $produto->imagem) }}" class="card-img-top" alt="{{ $produto->nome }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $produto->nome }}</h5>
                    <p class="card-text">{{ $produto->descricao }}</p>
                    <p class="card-text"><strong>Preço:</strong> R$ {{ $produto->preco }}</p>
                    <a href="{{ route('carrinho.adicionar', $produto->id) }}" class="btn btn-primary">Adicionar ao Carrinho</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2>Descrição Detalhada</h2>
            <p>{{ $produto->descricao }}</p>
        </div>
    </div>
</div>
@endsection
