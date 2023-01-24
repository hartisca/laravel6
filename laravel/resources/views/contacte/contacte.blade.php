<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <title>NearME</title>
 
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
 
    <!-- Scripts -->
    @env(['local','development'])
       @vite(['resources/sass/app.scss', 'resources/js/bootstrap.js'])  
   @endenv
   @env(['production'])
       @php
           $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
       @endphp
       <script type="module" src="/build/{{ $manifest['resources/js/app.js']['file'] }}"></script>
       <link rel="stylesheet" href="/build/{{ $manifest['resources/sass/app.scss']['file'] }}">
   @endenv

</head>
<body class="tapisat">    
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class = "lang-switcher">            
            @include('partials.language-switcher')
        </div>
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    NearME
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
            </div>   

        @endguest
    </div>
    <header class="container"   >
        <!-- The video -->
        <video autoplay muted loop id="myVideo">
            <source src="/video/Vertical-Glowing-Neon-Lights-Stage-Loop-Animated-Background-Motion-Made.mov" type="video/mp4">
        </video>

        <!-- Optional: some overlay text to describe the video -->
        <div class="content">
            <h1>Heading</h1>
            <p>Lorem ipsum...</p>
        <!-- Use a button to pause/play the video with JavaScript -->
            <button id="myBtn" onclick="myFunction()">Pause</button>
        </div>
    </header>    
</body>
</html>
