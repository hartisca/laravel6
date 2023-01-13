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
            <audio src="/audio/wololo.mp3" id="audioM"></audio>

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
                                <img id="video1" src="img/jack.jpg">
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
                                <video id="playerM" class="img-fluid" autoplay>
                                    <source src="/video/The.wait.mp4" type="video/mp4" />
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
    <!-- <script src="about.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script> -->
</body>