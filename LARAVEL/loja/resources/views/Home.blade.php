@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Produtos Disponíveis</h1>
        </div>
    </div>
    <div class="row">
        @foreach($produtos as $produto)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $produto->image) }}" class="card-img-top" alt="{{ $produto->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $produto->name }}</h5>
                    <p class="card-text">{{ $produto->description }}</p>
                    <p class="card-text">Preço: R$ {{ $produto->price }}</p>
                    <form action="{{ route('carrinho.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                        <div class="form-group">
                            <label for="quantidade">Quantidade:</label>
                            <input type="number" name="quantidade" class="form-control" value="1" min="1">
                        </div>
                        <button type="submit" class="btn btn-primary">Adicionar ao Carrinho</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
