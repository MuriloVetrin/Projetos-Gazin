@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Painel de Controle do Funcionário</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Gerenciar Produtos</h5>
                    <p class="card-text">Aqui você pode listar, criar, editar e excluir produtos.</p>
                    <a href="{{ route('produtos.index') }}" class="btn btn-primary">Produtos</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
