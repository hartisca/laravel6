

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<style>

html{
    height: 100%;
    
}

body{
    background-image: linear-gradient(lightgray, lightblue,blue);
    height: 100vh;
    
}


/* propiedades y card equipo */
.title-about-us{
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: lightblue;

}

.title{
    font-size: 45px;
    font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
    margin-top:10px;
    
}

.container-about-us{
    display: flex;
    justify-content:center;
    align-items:center;

    background-color: lightblue;

}

.card{
    position: relative;
    width: 300px;
    height: 350px;
    margin-right: 40px;
    margin-left: 40px;
    border: none;
    background-color: lightblue;
    
}

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

.imagenes{
    display: flex;
    align-items: center;
    justify-content: space-around;
}

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


.closeBtn{
    color:#ccc;
    float:right;
    font-size:30px;
  
  }
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
        <div class="card" id="hectorBox" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
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

        <div class="card" id="marcBox" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
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
                                <img id="video1" src="img/hombre-barbudo-serio-preocupado-gafas-redondas-tira-palma-camara-detiene-o-advierte_273609-18648.webp">
                                <img id="video2" src="img/vegeta.jpg">
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
                        <img id="video1M" src="img/green_laptop.jpg">
                        <img id="video2M" src="img/red_laptop.jpeg">
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

/// Video change
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

///modal close
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


window.addEventListener('click', outsideClick);

function outsideClick(e) {
    if (e.target == modal) {
        modal.style.display = 'none';
    }
}
function stopVideo(){
    player.pause();
    video1.currentTime = 0;
    video2.currentTime = 0;    
}
closeBtn.addEventListener('click', function(){
    stopVideo();
});


    //videos
   let playerm = document.getElementById('playerM');
   let video1m = document.getElementById('video1M');
   let video2m = document.getElementById('video2M');
   
   function changeSourceM(event) {
       playerm.pause();
       playerm.setAttribute("src", event.currentTarget.filename);
       playerm.load();
       playerm.play();
   }
   
   video1m.addEventListener('click', changeSourceM);
   video1m.filename = "video/Dogs.mp4";
   video2m.addEventListener('click', changeSourceM);
   video2m.filename = "video/The.wait.mp4";
   
//audio
let audioM = document.getElementById('audioM');
let marcBox = document.getElementById('marcBox');



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
closeBtnM.addEventListener('click', function(){
    stopVideoM();
});
</script>

</body>

