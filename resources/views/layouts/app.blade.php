<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/temas.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" 
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <style>
        #navbar-menu {
            background-color: #e3fbe3;
            font-family: 'Comfortaa', cursive;
        }
        #navbar-menu i {
            border: 2px solid #28a745;
            padding: 5px;
            border-radius: 10px;
            transition: all 0.5s;
        }
        .navbar-nav > * {
            padding: 0px 5px;
        }
        #navbar-menu a:hover, #navbar-menu a:link{
            color: #158815;
        }
        #app a:link, #app a:hover {
            outline: none;
            text-decoration: none;
        }
        .nav-link {
            color: #28a745;
            font-size: 1.5em;
        }
        #navbar-menu i:hover {
            background: #28a745;
            color: whitesmoke;
        }
        #search {
            justify-content: center;
        }
    </style>
</head>
<body>
    <div id="app">
        {{-- <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}
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
                            <a class="nav-link" href="{{ url('login') }}"><i class="fas fa-sign-in-alt"></i></a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('register') }}"><i class="fas fa-user-plus"></i></a>
                        </li>   
                        @endguest
                    </ul>
                </div>
            </div>
          </nav>
          

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
