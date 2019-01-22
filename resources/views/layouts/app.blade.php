<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    @yield('styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" 
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet"> 
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-ligth" id="navbar-menu">
            <div class="container">
                <img class="navbar-brand col-lg-2" src="{{asset('img/stackoverflow.png')}}" alt="">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <form class="form-inline col-lg-6" id="search">
                    <input class="form-control mr-sm-2 col-lg-8" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-1 my-sm-0" type="submit">Search</button>
                </form>
                <div class="collapse navbar-collapse col-lg-4" id="opcoes-menu">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/temas">Temas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/Postagens">Postagens</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('logout') }}"><i class="fas fa-sign-out-alt"></i></a>
                        </li>                        
                        @endauth
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('register') }}"><i class="fas fa-user-plus"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('login') }}"><i class="fas fa-sign-in-alt"></i></a>
                        </li>  
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>

    <!-- Scripts -->
    @yield('scripts')

    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js" 
        integrity="sha384-vhJnz1OVIdLktyixHY4Uk3OHEwdQqPppqYR8+5mjsauETgLOcEynD9oPHhhz18Nw" crossorigin="anonymous"></script>
</body>
</html>
