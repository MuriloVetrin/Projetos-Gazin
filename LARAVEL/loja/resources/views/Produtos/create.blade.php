@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Criar Produto</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('produtos.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição:</label>
                            <textarea id="descricao" name="descricao" class="form-control" rows="3" required>{{ old('descricao') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="preco">Preço:</label>
                            <input type="number" id="preco" name="preco" class="form-control" value="{{ old('preco') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="imagem">Imagem:</label>
                            <input type="file" id="imagem" name="imagem" class="form-control-file" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
