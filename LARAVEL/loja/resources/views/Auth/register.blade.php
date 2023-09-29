@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Registrar-se</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Registrar-se como:</h5>
                    <div class="mt-3">
                        <a href="{{ route('cliente.register') }}" class="btn btn-primary">Cliente</a>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('funcionario.register') }}" class="btn btn-success">Funcionário</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
