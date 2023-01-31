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
 

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>

     <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>

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
        <section class="showcase">
			<div class="video-container">
				<video src="video/backgroundVideo.mov" autoplay muted loop></video>
			</div>
			 <!-- Optional: some overlay text to describe the video -->
             <div class="contacte-text">
                <h1>Contacta'ns</h1>
                <h3>Envia el teu missatge</h3>
                <a href="#" class="btn3">Formulari de contacte</a>
            </div>
              
		</section>
		<section id="about">
        
            <h1>Vols visitar-nos?</h1>

            <h2>ubica'ns al mapa</h2>
        
        </section>
        <div id="map">
            <script>
                var map = L.map('map').setView([41.23, 1.73], 13);

                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);
            </script> 
        
        </div>

			

			<div class="social">
            <h2>Follow Me On Social Media</h2>
			<a href="https://twitter.com/traversymedia" target="_blank"><i class="fab fa-twitter fa-3x"></i></a>
				<a href="https://facebook.com/traversymedia" target="_blank"><i class="fab fa-facebook fa-3x"></i></a>
				<a href="https://github.com/bradtraversy" target="_blank"><i class="fab fa-github fa-3x"></i></a>
				<a href="https://www.linkedin.com/in/bradtraversy" target="_blank"><i class="fab fa-linkedin fa-3x"></i></a>
			</div>
		</section>
</body>
</html> 




<style>
   
   @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap');

:root {
	--primary-color: #3a4052;
}

* {
	box-sizing: border-box;
	margin: 0;
	padding: 0;
}

body {
	font-family: 'Open Sans', sans-serif;
	line-height: 1.5;
}

a {
	text-decoration: none;
	color: var(--primary-color);
}

h1 {
	font-weight: 300;
	font-size: 60px;
	line-height: 1.2;
	margin-bottom: 15px;
}

.showcase {
	height: 100vh;
	display: flex;
	align-items: center;
	justify-content: center;
	text-align: center;
	color: #fff;
	padding: 0 20px;
}

.video-container {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	overflow: hidden;
	background: var(--primary-color) url('./https://traversymedia.com/downloads/cover.jpg') no-repeat center
		center/cover;
}

.video-container video {
	min-width: 100%;
	min-height: 100%;
  position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	object-fit: cover;
}

.video-container:after {
	content: '';
	z-index: 1;
	height: 100%;
	width: 100%;
	top: 0;
	left: 0;
	background: rgba(0, 0, 0, 0.5);
	position: absolute;
}

.content {
	z-index: 2;
}

.btn {
	display: inline-block;
	padding: 10px 30px;
	background: var(--primary-color);
	color: #fff;
	border-radius: 5px;
	border: solid #fff 1px;
	margin-top: 25px;
	opacity: 0.7;
}

.btn:hover {
	transform: scale(0.98);
}

#about {
	padding: 40px;
	text-align: center;
}

#about p {
	font-size: 1.2rem;
	max-width: 600px;
	margin: auto;
}

#about h2 {
	margin: 30px 0;
	color: var(--primary-color);
}

.social a {
	margin: 0 5px;
}





.contacte-text { 
    position: fixed;
    bottom: 55%;
    color: #f1f1f1;
    width: 36%;
    padding: 20px;
    flex-direction:column;
    margin:auto;
    display:flex;
    align-items:center;
    
}


/* Style the button used to pause/play the video */
.btn3 {
  width: 200px;
  font-size: 18px;
  padding: 10px;
  border: solid 3px white;
  background: #000;
  color: #fff;
  cursor: pointer;
  background:rgb(0,0,0,0.3);
  border-radius:15px;
}

.btn3:hover {
  background: #ddd;
  color: black;
} 

#map {
    height: 200px;
    
}
</style>