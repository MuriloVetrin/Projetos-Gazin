<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Seu E-commerce</title>
    
    <!-- Adicione os links para os arquivos CSS do Bootstrap e qualquer outro CSS personalizado aqui -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Adicione outros estilos CSS personalizados, se necessário -->
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Seu E-commerce</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('carrinho.show') }}">Carrinho</a>
                    </li>
                    @if (auth()->check())
                        @if (auth()->user()->type === 'cliente')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cliente.profile') }}">Perfil</a>
                            </li>
                        @elseif (auth()->user()->type === 'funcionario')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('funcionario.dashboard') }}">Painel</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">Sair</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Adicione os scripts JavaScript do Bootstrap e qualquer outro JavaScript personalizado aqui -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Adicione outros scripts JavaScript personalizados, se necessário -->
</body>
</html>
