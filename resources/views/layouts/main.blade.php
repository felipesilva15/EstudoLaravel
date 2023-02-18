<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>

        <!-- Fonte do Google -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- CSS do bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light px-3">
                <div class="colapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/img/felipeevents_logo.svg" alt="">
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a href="/events/create" class="nav-link">Criar evento</a>
                        </li>
                        <li class="nav-item">
                            <a href="/" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="/" class="nav-link">Cadastrar-se</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            <p>Felipe's Events &copy; 2023</p>
        </footer>

        <!-- JS do bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

        <!-- JS da aplicação -->
        <script src="/js/script.js"></script>
    </body>
</html>
