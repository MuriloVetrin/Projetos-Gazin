@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Editar Produto</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('produtos.update', $produto->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" name="nome" class="form-control" value="{{ $produto->nome }}" required>
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição:</label>
                            <textarea id="descricao" name="descricao" class="form-control" rows="3" required>{{ $produto->descricao }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="preco">Preço:</label>
                            <input type="number" id="preco" name="preco" class="form-control" value="{{ $produto->preco }}" required>
                        </div>
                        <div class="form-group">
                            <label for="imagem">Imagem:</label>
                            <input type="file" id="imagem" name="imagem" class="form-control-file">
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
