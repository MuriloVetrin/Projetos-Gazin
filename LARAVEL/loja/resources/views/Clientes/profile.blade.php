@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Seu Perfil</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Informações do Cliente</h5>
                    <p><strong>Nome:</strong> {{ auth()->user()->name }}</p>
                    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                    <a href="{{ route('cliente.edit') }}" class="btn btn-primary">Editar Perfil</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
