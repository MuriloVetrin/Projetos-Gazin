@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Seu Carrinho de Compras</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if (count($itensCarrinho) === 0)
            <p>Seu carrinho está vazio.</p>
            @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço Unitário</th>
                        <th>Subtotal</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($itensCarrinho as $item)
                    <tr>
                        <td>{{ $item->produto->name }}</td>
                        <td>
                            <form action="{{ route('carrinho.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantidade" value="{{ $item->quantidade }}" min="1">
                                <button type="submit" class="btn btn-primary btn-sm">Atualizar</button>
                            </form>
                        </td>
                        <td>R$ {{ $item->produto->price }}</td>
                        <td>R$ {{ $item->produto->price * $item->quantidade }}</td>
                        <td>
                            <form action="{{ route('carrinho.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Remover</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-right">
                <strong>Total: R$ {{ $total }}</strong>
            </div>
            <div class="text-right mt-3">
                <a href="{{ route('carrinho.checkout') }}" class="btn btn-success">Finalizar Compra</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
