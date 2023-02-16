<!doctype html>
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

<script src="keymaster.js"></script>
<script>
    document.getElementById("myAnchor").accessKey = "f";
</script>

<section class="showcase">
    <div class="video-container">
        <video src="/video/backgroundVideo.mov" autoplay muted loop></video>
    </div>
    <div class="content">
        <h1 class="h1contacte">Contacta'ns</h1>
        <h2>Envia el teu missatge</h2>
        <a href="www.google.com" accesskey="f" id="myAnchor" class="btncontacte">Formulari de contacte(SHFT+ALT+f)</a>
    </div>
</section>
<section id="mapa">
    <div class="cajamapa">
        <div class="ubicans">
            <h1>Vols visitar-nos?</h1>
            <h2>Ubica'ns al mapa</h2>
        </div>
        <button onclick="getLocation()">Ubicarte on ets!</button>

<p id="demo"></p>

        <div id="map">
            <script>
               

  const mir = { lat: 42.24, lng: 1.70 };
   var map = L.map('map').setView([41.23112, 1.72866], 18);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
         maxZoom: 19,
         center: mir,
            }).addTo(map);
    L.marker([41.23089, 1.72917]).addTo(map).bindPopup('Els mossos!<br> oju!').openPopup();

    
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.watchPosition(showPosition);
  }
}
function showPosition(position) {
  Lat = position.coords.latitude;
  Lon =position.coords.longitude;
  
  L.marker([ Lat, Lon ]).addTo(map).bindPopup('Estas aqui!').openPopup();
}

            
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
<style>

    /* Afegim estils a les etiquetes h1 de contacte */
    .h1contacte {
    font-weight: 300;
    font-size: 60;
    line-height: 1.2;
    margin-bottom: 15px;
}

/* Secció del video fixe amb el cartell, fixem la posició donem alçada, fem que sigui un contenidor flex per tal d'alinear tot el contingut a dins, després donem estils */
.showcase {
    position: relative;
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 0.20px;
    color: #fff;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
/* Posició absolute i la fixem a dalt */
.video-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    /*Definim les propietats del video, que no repeteixi la imatge, centrat... */
    background: black no-repeat center center/cover;
}

.video-container video {
    min-width: 100;
    min-height: 100;
    width: 100%;
    height: 100%;
    /*Aqui fem que el video ocupi tot el tamany del contenidor */
    object-fit: cover;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.video-container:after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.4);

}
/*Contingut de la secció del video, on està el text, li donem la posició amb el index-z */
.content {
    z-index: 0;
    margin-bottom: 150px;
}
/*Botó de contacte, donem estils i a sota definim que es faci més gran al passar el ratoí per sobre. */
.btncontacte {
    display: inline-block;
    padding: 10px 30px;
    background: #3a4052;
    color: #fff;
    border: 1px #fff solid;
    border-radius: 5px;
    margin-top: 25px;
    opacity: 0.7;
}
.btncontacte:hover {
    transform: scale(0.98);
}
/*Estils i tamanys del contenidor del mapa */
#map { 
    height: 430px;
    width: 90%;
    margin-bottom: 50px;
    margin-left: 5%;
}
#mapa {
    background-color: white;
}
.cajamapa {
    width: 100%;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.cajamapa h1 {
    color: black;
    font-size: 3em;
}
.cajamapa h2 {
    color: black;
    font-size: 2.3em;
}
.ubicans {
    width: 40%;
    margin-top: 3%;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
}

/*En els seguents ja definim tots els estils i posicions de les icones del footer*/
.footer {
    background-color: #403c54;
    height: 150px;
    color: white;
}
.contenidofooter {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.segueixnoscontacte {
    margin-top: 3%;
    width: 40%;
    text-align: center;
}
.iconoscontacte {
    width: 30%;
    margin: auto;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
.iconoscontacte i {
    font-size: 1.5em;
}

</style>