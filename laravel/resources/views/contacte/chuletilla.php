<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="{{ asset(mix('js/app.js')) }}"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>
     <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<section class="showcase">
    <div class="video-container">
        <video src="/videos/video.mov" autoplay muted loop></video>
    </div>
    <div class="content">
        <h1 class="h1contacte">Contacta'ns</h1>
        <h2>Envia el teu missatge</h2>
        <a href="#mapa" class="btncontacte">Formulari de contacte</a>
    </div>
</section>
<section id="mapa">
    <div class="cajamapa">
        <div class="ubicans">
            <h1>Vols visitar-nos?</h1>
            <h2>Ubica'ns al mapa</h2>
        </div>
    
        <div id="map">
            <script>
                var map = L.map('map').setView([41.23112, 1.72866], 18);
                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

            </script>
        </div>
    </div>
</section>
<section class="footer">
    <div class="contenidofooter">
        <div class="segueixnoscontacte">
            <h2>Segueix-nos a xarxes!</h2>
            <div class="iconoscontacte">
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-youtube"></i>
                <i class="fa-brands fa-linkedin"></i> 
            </div>
            
        </div>
        

    </div>
</section>