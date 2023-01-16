

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<style>

/*Definim el color de fons com a degradat de blaus i especifiquem que l'altura del cos sigui el màxim*/
body{
    background-image: linear-gradient(lightgray, lightblue,blue);
    height: 100%;   
}
/* Escollim el mateix blau que en degradat com a fons, i centrem el text del títol al centre */
.title-about-us{
    display: flex;
    justify-content: center; 
    background-color: lightblue;
}
/*Definim el tamany, la font i el marge superior del títol */
.title{
    font-size: 45px;
    font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
    margin-top:10px;   
}
/*  Escollim el mateix blau que en el degradat(que queda sota) i centrem l'espai que ocupa
    i el que ocuparan les dos arees internes*/
.container-about-us{
    display: flex;
    justify-content:center;
    align-items:center;
    background-color: lightblue;
}
/* Escollim el mateix blau per que encaixi amb el container anterior,especifiquem les 
    els marges per definir la separació entre elles, li donem alçada i amplada 
    i eliminem el contorn de la "targeta"*/
.card{  
    width: 300px;
    height: 350px;
    margin-right: 40px;
    margin-left: 40px;
    border: none;
    background-color: lightblue;  
}
/*
En les següents classes definim un contorn arrodonit i establim que la posicio i el tamany de les diferents capes
siguin iguals. Tambe definim quina esta en cada capa, establim la duració de la transició, les animacions. Apliquem 
filtre gris per la primera capa i contrast al 150% al passar-hi el ratolí i a la segona i ombre a la caixa.
 */
.card .cara{
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    border-radius: 10px;
    overflow: hidden;
    transition: 1s;
}
.card img{
    position: absolute;
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: grayscale(100%);
}
.card .front{
    transform: perspective(600px) rotateX(0deg);
    box-shadow: 0 5px 10px black;
}
.card .back{
    transform: perspective(600px) rotateX(180deg);
    box-shadow: 0 5px 10px black;
}
.card:hover .front{
    transform: perspective(600px) rotateX(180deg);
}
.card:hover .back{
    transform: perspective(600px) rotateX(360deg);
}
.card .front2{
    transform: perspective(600px) rotateY(0deg);
    box-shadow: 0 5px 10px black;
}
.card .back2{
    transform: perspective(600px) rotateY(180deg);
    box-shadow: 0 5px 10px black;
}
.card:hover .front2{
    transform: perspective(600px) rotateY(180deg);
}
.card:hover .back2{
    transform: perspective(600px) rotateY(360deg);
}
.card:hover img{
    filter: contrast(150%);
} 
/* Sobreposem una zona amb color gris, definim tamany i centrem, li donem color al text dels càrrecs i dels noms
(Ho fem per les dos capes "face" i "back")*/
.description-about{
    display: flex;
    align-items:center;
    flex-direction:column;
    color: lightblue;
    background-color: rgba(0, 0, 0, .4);
    position: absolute;
    bottom: 0;
    width: 100%;
    height: auto;
}
.face .description-about .linia{
    background-color: #a7a7a7b9;
    box-shadow: 0px 1px 15px -3px rgb(80, 80, 80);
    width: 80%;
    height: 1.5px;
}
.name{
    font-weight:bold;
    font-size:22px;
    color: white;        
}
.descripcion{
    font-size:18px;
    color:rgb(218, 218, 218);
}
p{
    margin: 5px;
    padding: 0;
    width: 100%;
}

/*Modal */

.modal-content .menu-navigation{
    position: absolute;
    bottom: 40px;
    left: 50%;
    transform:translateX(-50%);
    z-index: 100;
    display:flex;
    justify-content: center;
    align-items: center;
}
/*Definim posició de les imatges "botó"*/
.imagenes{
    display: flex;
    align-items: center;
    justify-content: space-around;
}
/*Definim els contorns i tamanys dels videos a reproduir */
#video1{
    width: 100px;
    border-radius: 5px;
    border: 1px solid black;
    height: baseline;
}
#video1M{
    width: 100px;
    border-radius: 5px;
    border: 1px solid black;
    height: baseline;
}

#video1:hover{
    transition: 1s;
    width: 110px;
    filter: contrast(120%);
}
#video1M:hover{
    transition: 1s;
    width: 110px;
    filter: contrast(120%);
}

#video2{
    width: 100px;
    border-radius: 5px;
    border: 1px solid black;
}
#video2M{
    width: 100px;
    border-radius: 5px;
    border: 1px solid black;
}

#video2:hover{
    transition: 1s;
    width: 110px;
    filter: contrast(120%);
}
#video2M:hover{
    transition: 1s;
    width: 110px;
    filter: contrast(120%);
}

.video{
    position: absolute;
}

/*coloquem la X de tencar a dalt a la dreta i la fem transparent
(els dos es tenquen amb la x pero un també es pot tencar clicant fora, aixó esta fet amb javascript)
*/
.closeBtn{
    color:#ccc;
    float:right;
    font-size:30px;
  
  }
  /*fem que es vegi negre al passar-hi el ratolí*/

.closeBtn:hover,.closeBtn:focus{
    color:#000;
    text-decoration:none;
    cursor:pointer;
  }


    </style>





<body>
    <div class="title-about-us">
        <h1 class="title">Meet our team</h1>
    </div>

    <div class="container-about-us">
    
        <div class="card" id="hectorBox" data-bs-toggle="modal" data-bs-target="#staticBackdrop" draggable="true" ondragstart="drag(Event)">
            <div class="cara front">

                <img id="seria"
                    src="img/hombre-barbudo-serio-preocupado-gafas-redondas-tira-palma-camara-detiene-o-advierte_273609-18648.webp">
                <div class="description-about">
                    <div class="name">
                        <p>Héctor Artisó</p>
                    </div>
                    <div class="linia"></div>
                    <div class="description">
                        <p>Project Manager</p>
                    </div>
                </div>

            </div>

            <div class="cara back">

                <img id="diver" src="img/gettyimages-520749695-612x612.jpg">
                <div class="description-about">
                    <div class="name">
                        <p>Héctor Artisó</p>
                    </div>
                    <div class="linia"></div>
                    <div class="description">
                        <p>Party Manager</p>
                    </div>
                </div>

            </div>
            <audio src="/audio/658285__matrixxx__dat-high-life.wav" id="audioHector"></audio>

        </div>

        


        <div class="card" id="marcBox" data-bs-toggle="modal" data-bs-target="#staticBackdrop2" draggable="true" ondragstart="drag(Event)">
            <div class="cara front2">

                <img id="seria"
                    src="img/jefe.jpeg">
                <div class="description-about">
                    <div class="name">
                        <p>Marc Albero</p>
                    </div>
                    <div class="linia"></div>
                    <div class="description">
                        <p>C.E.O.</p>
                    </div>
                </div>

            </div>

            <div class="cara back2">

                <img id="diver" src="img/nojefe.jpeg">
                <div class="description-about">
                    <div class="name">
                        <p>Marc Albero</p>
                    </div>
                    <div class="linia"></div>
                    <div class="description">
                        <p>Techno King</p>
                    </div>
                </div>

            </div>
            <audio src="/audio/Acid.mp3" id="audioM"></audio>

        </div>

        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Choose your video</h5>
                        <button id="stop" type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Carousel wrapper -->
                        <div id="carouselVideoExample" class="carousel slide carousel-fade" data-mdb-ride="carousel">
                            <!-- Inner -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <!-- Single item -->
                                    <div class="carousel-item active">
                                        <video id="player" class="img-fluid" autoplay muted>
                                            <source src="video/Tenacious D -  Sax a Boom.mp4" type="video/mp4" />
                                        </video>
                                    </div>
                                </div>
                            </div>
                            <div class="imagenes">
                                <img id="video1" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse2.mm.bing.net%2Fth%3Fid%3DOIP.H2ahuAZkcdc8FIX3VBIhJwHaE7%26pid%3DApi&f=1&ipt=66ff60f62136f98bb3654a7c92873ac975660e871b681756d3f7edf3e9e00970&ipo=images">
                                <img id="video2" src="https://www.seekpng.com/png/detail/83-839449_sad-guy-png-depressed-man-in-suit.png">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="staticBackdrop2">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Choose your video</h5>
                        <span id="close" class="closeBtn" data-bs-dismiss="modal" aria-label="Close">&times;</span>
                    </div>
                    <div class="modal-body">
                      
                        <div class="carousel-inner">
                          
                            <div class="carousel-item active">
                                <video id="playerM" class="img-fluid" autoplay muted>
                                    <source src="video/The.wait.mp4" type="video/mp4" />
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="imagenes">
                        <img id="video1M" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcf.ltkcdn.net%2Fdogs%2Fimages%2Fstd%2F185072-425x283-beagle-puppy.jpg&f=1&nofb=1&ipt=8cbf41e728c2c9f965d459aa55581e66e525eca99403f957179982ded215133d&ipo=images">
                        <img id="video2M" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse4.mm.bing.net%2Fth%3Fid%3DOIP.aMEsVCRnD-8KVly59oIT-wHaEK%26pid%3DApi&f=1&ipt=0a01a4ddb1bc18213daa3685965ec57fb3ed69a4e9380d0a80f0684cdc2f2d7a&ipo=images">
                    </div>


                </div>
            </div>
        </div>
    </div>

    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script>
//Sonido en mouseover y pause en mouseout//

window.addEventListener('load', iniciarHector, false);

function iniciarHector() {
    var audioHector = document.getElementById("audioHector");
    var hectorBox = document.getElementById('hectorBox');
    hectorBox.addEventListener('mouseover', playHector, false);
    hectorBox.addEventListener('mouseout', pauseHector, false);
}
function playHector() {
    audioHector.play();
}
function pauseHector() {
    audioHector.pause();
}

/// Video change, treure el mute definir videos
let player = document.getElementById('player');
let video1 = document.getElementById('video1');
let video2 = document.getElementById('video2');   

    function changeSourceH(event) {
        player.pause();
        player.setAttribute("src", event.currentTarget.filename);       
        player.load();
        player.play();
        if (player.hasAttribute('muted')){
            player.muted = !player.muted;  
            player.removeAttribute('muted');  
        }
    }

    video1.addEventListener('click', changeSourceH);
    video1.filename = "video/Tenacious D -  Sax a Boom.mp4";
    video2.addEventListener('click', changeSourceH);
    video2.filename = "video/vegeta cantando con la carita empapada.mp4";

//fer que funcioni el boto de tencar i que pari de reproduir el video ( el só sobretot)
const closeBtn = document.getElementById('stop');

function stopVideo(){
    player.pause();
    video1.currentTime = 0;
    video2.currentTime = 0;    
}

closeBtn.addEventListener('click', function(){
    stopVideo();
});


/////////////////////////////////////////

//pop up
let modalBtnM = document.getElementById('marcBox');
let modal = document.getElementById('modal');
let closeBtnM = document.getElementById('close');

 //videos
let playerm = document.getElementById('playerM');
let video1m = document.getElementById('video1M');
let video2m = document.getElementById('video2M');

//audio
let audioM = document.getElementById('audioM');
let marcBox = document.getElementById('marcBox');

//al pasar el ratolí s'activa l'audio i al treure´l es pausa
marcBox.addEventListener('mouseover', () => {
    audioM.play()
});
marcBox.addEventListener('mouseout', () => {
    audioM.pause()
});

function stopVideoM(){
    playerm.pause();
    video1m.currentTime = 0;
    video2m.currentTime = 0;    
}

//tencar finestra al clicar fora:
window.addEventListener('click', outsideClick);

function outsideClick(e) {
    if (e.target == modal) {
        modal.style.display = 'none';
        
        stopVideoM();
    }

}
 
//que es pari el video al clicar a la creu de tencar pop up
closeBtnM.addEventListener('click', function(){
    stopVideoM();
});


//cambiar el video a reproduir i treure el mute
   
function changeSourceM(event) {
       playerm.pause();
       playerm.setAttribute("src", event.currentTarget.filename);
       playerm.load();
       playerm.play();
       if (playerm.hasAttribute('muted')){
            playerm.muted = !playerm.muted;  
            playerm.removeAttribute('muted');  
        }
   }
   
   video1m.addEventListener('click', changeSourceM);
   video1m.filename = "video/Dogs.mp4";
   video2m.addEventListener('click', changeSourceM);
   video2m.filename = "video/The.wait.mp4";

</script>

</body>

