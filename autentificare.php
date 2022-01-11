<html>
<?php 

session_start();


?>



<style>
.auth{
              position: absolute;
              top: 0;
              left: 0;
              right: 0;
              bottom: 0;
              margin: auto;
              width: 350px;
              height: 300px;
			  opacity:0.8;
              border-radius: 5px;
              background: rgb(128,128,128);
              box-shadow: 1px 1px 50px #fff;
              display: block;
            }
.sign {
        padding-top: 30px;
        color: #fff;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        font-size: 23px;
    }
</style>
<head>

  <script src="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.js"></script>
<link href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" rel="stylesheet" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">


  <link rel="stylesheet" href="css/style1.css">
  <title>Autentificare</title>
</head>

<body>
<div id="map"></div>
<div class="auth" id='form' >
<p class="sign" align="center" >Autentificare</p>
    <form action="php/login.php" method="post" class="input" >
	<p><br></p>

      <p class='field'>
        <input name="email" type="text"  name="email" autocomplete="false" placeholder="E-mail">
      </p>
      <p class='field'>
        <input id="lname" type="password" name="password" autocomplete="false" placeholder="Parolă">
      </p>
      
      
      <div class="wrap">
        <input class='button' type="submit" align="center" name="submit" value ="Autentificare" />
      </div>
	  
    </form>
</div>

<script>

	
	var tiles = L.tileLayer('https://c.tiles.wmflabs.org/osm-no-labels/{z}/{x}/{y}.png', {
                maxZoom: 18,
                attribution: '&copy; <a href="https://www.openstreetmap.org  /copyright">OpenStreetMap</a> contributors'
        }),
            latlng = new L.LatLng(45.750970, 21.226200); 
        var roads = L.tileLayer("http://tile.memomaps.de/tilegen/{z}/{x}/{y}.png", {
           maxZoom: 20, 
        });
        var media = L.tileLayer("https://maps.wikimedia.org/osm-intl/{z}/{x}/{y}.png", {
           maxZoom: 20, 
       });
       var map = new L.Map('map', {center: latlng, zoom: 12, layers: [tiles],attributionControl: false, zoomControl: false});

 	
</script>
     
</body>

</html>