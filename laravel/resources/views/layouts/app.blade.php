<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <title>{{ config('app.name', 'Laravel') }}</title>
 
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
 
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="tapisat">    
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class = "lang-switcher">            
            @include('partials.language-switcher')
        </div>
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>             
 
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
 
                    </ul>
 
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
 
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>                              
 
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
 
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>                              
 
                                </div>
                            </li>
                           
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @guest
            <main class="py-4">
                @include('flash')
                @yield('content')
            </main>
        @else
        <br>
            <div class="container" bg>  
            @include('flash')
            
                <div class="row ">
                    <div class="col-md-2">    
                    <div class="menu sticky-top">   
                        <img src="https://www.pngall.com/wp-content/uploads/5/User-Profile-PNG-High-Quality-Image.png" class="rounded-circle img-thumbnail" alt="Profile image" width="120px">
                        
                        <div class="nom fontGuay">{{ Auth::user()->name }}</div>
                        <br>                        
                        <ul class="nav flex-column ">
                            <li class="nav-item">
                                <a class="dropdown-item" href="#"><i class="bi bi-people-fill"></i> Contactes</a>
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item" href="#"><i class="bi bi-eye-fill"></i> Seguidors</a>
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item" href="#"><i class="bi bi-pin-fill"></i> Preferits</a>
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item" href="#"><i class="bi bi-globe-americas"></i> Xat Global</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="dropdown-item" href="#" role="button" data-bs-toggle="dropdown"><i class="bi bi-images"></i> Crear</a>
                                    <ul class="dropdown-menu dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('posts.create') }}"><i class="bi bi-plus-square-fill"></i> Afegir Post</a></li>
                                        <li><a class="dropdown-item" href="{{ route('places.create') }}"><i class="bi bi-plus-square-fill"></i> Afegir Place</a></li>                                        
                                    </ul>
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item" href="#"><i class="bi bi-search"></i> Filtrar</a>
                            </li>
                        </ul>
                    </div>    
                        
                    </div>
                    <div class="col-md-8 ">
                        <div class="card">
                            
                            <div class="card-body">
                                @yield('box-content')
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>   

        @endguest
    </div>
</body>
</html>


