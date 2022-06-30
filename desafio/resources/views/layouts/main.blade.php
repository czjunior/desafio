<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <!-- Fonte do Google -->
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- CSS da Bootstrap -->
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        
        <!-- CSS da Aplicação -->
        <link rel="stylesheet" href="https://www.sofs.com.br/desafio/public/css/styles.css">
        <script src="https://www.sofs.com.br/desafio/public/js/scripts.js"></script>
        
        {{-- Recaptcha GOOGLE --}}
        <script src="https://google.com/recaptcha/api.js" async defer></script>
        {{-- END Recaptcha GOOGLE --}}

    </head>
    <body>
        <header> 
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="https://www.sofs.com.br/desafio/public/home/" class="navbar-brand">
                        <img src="https://www.sofs.com.br/desafio/public/img/logo.png" alt="Desafio">
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="https://www.sofs.com.br/desafio/public/home/" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.sofs.com.br/desafio/public/users/show" class="nav-link">Usuários</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.sofs.com.br/desafio/public/perfil/show" class="nav-link">Perfil de Usuários</a>
                        </li>
                        @auth
                        <!--li class="nav-item">
                            <a href="https://www.sofs.com.br/desafio/public/user/profile" class="nav-link">Minha Conta</a>
                        </li-->
                        <li class="nav-item">
                            <form action="https://www.sofs.com.br/desafio/public/logout" method="POST">
                                @csrf
                                <a href="https://www.sofs.com.br/desafio/public/logout" 
                                class="nav-link" 
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                Sair</a>
                            </form>
                        </li>
                        @endauth
                        @guest
                        <li class="nav-item">
                            <a href="https://www.sofs.com.br/desafio/public/" class="nav-link">Entrar </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.sofs.com.br/desafio/public/users/create" class="nav-link">Registrar </a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>
        {{--
        <!--div id="event-create-container" class="col-md-6 offset-md-3">
            <img src="/img/image.png" alt="Banner" class="banner">
        </div-->
        --}}
        <main>
            <div class="container-fluid">
                <div class="row">
                @if(session('msg'))
                    <p class="msg">{{ session('msg') }}</p>
                @endif
                @yield('content')
                </div>
            </div>
        </main>
        <footer>
            <p>Desafio &copy; 2022</p>
        </footer>
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>