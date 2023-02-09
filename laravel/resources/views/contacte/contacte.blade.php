
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
        <section>
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
    bottom: 55%;
    color: #f1f1f1;
    width: 36%;
    padding: 20px;
    flex-direction:column;
    margin:auto;
    display:flex;
    align-items:center;
    position:fixed;
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
#map{
	z-index: 2;
}

</style>