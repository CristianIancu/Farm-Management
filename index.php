<?php
	session_start();
	require_once("PHP/dbcontroller.php");
	$db_handle = new DBController();
	// We need to use sessions, so you should always start sessions using the below code.


?>
<?php
include_once("PHP/config.php");
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$query=mysqli_query($con,"insert into users (username,email,password) values('$username','$email','$password')");
	if($query)
	{
	echo "<script>alert('Data inserted successfully');</script>";
	}
	else
	{
		echo "<script>alert('Data not inserted');</script>";
	}
}
 ?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<script defer src="theme.js"></script>
	<link rel="stylesheet" href="style.css" />
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.js"></script>
	<script src="http://leafletjs.com/reference-1.3.0.html#tooltip"></script>

	<link href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" rel="stylesheet" />
	<!-- Bootstrap CSS CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

	<!-- jQuery CDN - Slim version (=without AJAX) -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<!-- Popper.JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<!-- Bootstrap JS -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

	<!--<link rel="stylesheet" href="CSS/map.css">-->
	<link
		href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap"

		rel="stylesheet"
	/>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin="" />
	<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet-src.js" integrity="sha512-+ZaXMZ7sjFMiCigvm8WjllFy6g3aou3+GZngAtugLzrmPFKFK7yjSri0XnElvCTu/PrifAYQuxZTybAEkA8VOA==" crossorigin=""></script>

	<link rel="stylesheet" href="https://unpkg.com/leaflet-draw@1.0.2/dist/leaflet.draw.
	css" />
	<script src="https://unpkg.com/leaflet-draw@1.0.2/dist/leaflet.draw-src.js"></script>
		
	
</head>

<?php
	 if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['field']))
{
	$fieldName=$_POST['fieldN'];
	$lat=explode(',',$_POST['lat']);
	$lng=explode(',',$_POST['lng']);
	$area = $_POST['area'];

	$link = mysqli_connect("localhost", "root", "", "farmmanagement");
	if($link === false){
          die("ERROR: Could not connect. " . mysqli_connect_error());
    }
	
	
	$sql = "INSERT INTO fields (name,area) VALUES ('$fieldName','$area')";
	if(mysqli_query($link, $sql)){
		//echo $sql;
	} else{
		echo "ERROR: Nu s-a putut introduce field $sql. " . mysqli_error($link);
	}
	//let's get field id to add points to that field
	
    $query = "SELECT * FROM fields where name='$fieldName'";
    $result = mysqli_query($link,$query);
	
    if($result)
	   $rez=mysqli_fetch_array($result);
	$id_field=$rez['id'];
	
	
	
	//adding the points to field
	
	for ($i = 0; $i < count($lat); $i++) {
		$sql = "INSERT INTO points (id_field,lat,lng,i) VALUES ('$id_field','$lat[$i]','$lng[$i]','$i')";
		if(mysqli_query($link, $sql)){
			//echo $sql;
		} else{
			echo "ERROR: Nu s-a putut introduce punctele in field $sql. " . mysqli_error($link);
		}
	}
	
}

?>
<?php
					$link = mysqli_connect("localhost", "root", "", "farmmanagement");
				   if($link === false){
					  die("ERROR: Could not connect. " . mysqli_connect_error());
				   }
				   
				   $query = "SELECT * FROM fields";
				   $result = mysqli_query($link,$query);
				   $teren=array();
				   
				   while($rez=mysqli_fetch_array($result))
				   {
					   
					   array_push($teren,$rez);
					   
					   
					   
					   
					   
					}
				 
				  			  
				
			 ?>
	<style>
	
	.iasmi, select {
	  width: 100%;
	  padding: 12px 20px;
	  margin: 8px 0;
	  display: inline-block;
	  border: 1px solid #ccc;
	  border-radius: 4px;
	  box-sizing: border-box;
	}

	.iasmi[type=submit] {
	  width: 100%;
	  background-color: #4CAF50;
	  color: white;
	  padding: 14px 20px;
	  margin: 8px 0;
	  border: none;
	  border-radius: 4px;
	  cursor: pointer;
	}

	.iasmi[type=submit]:hover {
	  background-color
	}
	
	.flex-container {
  display: flex;
  height: 500px;
  color:white;
  flex-direction: column;
  background-color:#23232e;
  overflow-x: hidden;
        overflow-y: auto;
	
  
}
.flex-container > div {
  background-color: #f1f1f1;
  width: 100%;
  margin: 10px;
  
  line-height: 75px;
  font-size: 30px;
}
.div.scroll {
        background-color: #fed9ff;
        width: 600px;
        height: 150px;
        overflow-x: hidden;
        overflow-y: auto;
        text-align: center;
        padding: 20px;
      }
      }
</style>
<body style="overflow: hidden;">
<div class="screen">
  <nav id="icons" class="icons-container" onmouseover="">
    <ul class="icons-list">
      <li class="logo" onmouseover="changeMenu(0);">
        <a href="#" class="nav-link">
          <img class="img-icon" src="assets/tasks.svg" alt="Tasks">
        </a>
      </li>

      <li class="icon" onmouseover="changeMenu(1);">
        <a href="#" class="nav-link">
          <img class="img-icon" src="assets/fields.svg" alt="Fields">
        </a>
      </li>


      <li class="icon" onmouseover="changeMenu(3);">
        <a href="#" class="nav-link">
          <img class="img-icon" src="assets/workers.svg" alt="Workers">
        </a>
      </li>

      <li class="icon" id="themeButton">
        <a href="#" class="nav-link">
          <svg
            class="theme-img-icon"
            id="lightIcon"
            aria-hidden="true"
            focusable="false"
            data-prefix="fad"
            data-img-icon="moon-stars"
            role="img"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 512 512"
            class="svg-inline--fa fa-moon-stars fa-w-16 fa-7x"
          >
            <g class="fa-group">
              <path
                fill="currentColor"
                d="M320 32L304 0l-16 32-32 16 32 16 16 32 16-32 32-16zm138.7 149.3L432 128l-26.7 53.3L352 208l53.3 26.7L432 288l26.7-53.3L512 208z"
                class="fa-secondary"
              ></path>
              <path
                fill="currentColor"
                d="M332.2 426.4c8.1-1.6 13.9 8 8.6 14.5a191.18 191.18 0 0 1-149 71.1C85.8 512 0 426 0 320c0-120 108.7-210.6 227-188.8 8.2 1.6 10.1 12.6 2.8 16.7a150.3 150.3 0 0 0-76.1 130.8c0 94 85.4 165.4 178.5 147.7z"
                class="fa-primary"
              ></path>
            </g>
          </svg>
          <svg
            class="theme-img-icon"
            id="solarIcon"
            aria-hidden="true"
            focusable="false"
            data-prefix="fad"
            data-img-icon="sun"
            role="img"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 512 512"
            class="svg-inline--fa fa-sun fa-w-16 fa-7x"
          >
            <g class="fa-group">
              <path
                fill="currentColor"
                d="M502.42 240.5l-94.7-47.3 33.5-100.4c4.5-13.6-8.4-26.5-21.9-21.9l-100.4 33.5-47.41-94.8a17.31 17.31 0 0 0-31 0l-47.3 94.7L92.7 70.8c-13.6-4.5-26.5 8.4-21.9 21.9l33.5 100.4-94.7 47.4a17.31 17.31 0 0 0 0 31l94.7 47.3-33.5 100.5c-4.5 13.6 8.4 26.5 21.9 21.9l100.41-33.5 47.3 94.7a17.31 17.31 0 0 0 31 0l47.31-94.7 100.4 33.5c13.6 4.5 26.5-8.4 21.9-21.9l-33.5-100.4 94.7-47.3a17.33 17.33 0 0 0 .2-31.1zm-155.9 106c-49.91 49.9-131.11 49.9-181 0a128.13 128.13 0 0 1 0-181c49.9-49.9 131.1-49.9 181 0a128.13 128.13 0 0 1 0 181z"
                class="fa-secondary"
              ></path>
              <path
                fill="currentColor"
                d="M352 256a96 96 0 1 1-96-96 96.15 96.15 0 0 1 96 96z"
                class="fa-primary"
              ></path>
            </g>
          </svg>
          <svg
            class="theme-img-icon"
            id="darkIcon"
            aria-hidden="true"
            focusable="false"
            data-prefix="fad"
            data-img-icon="sunglasses"
            role="img"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 576 512"
            class="svg-inline--fa fa-sunglasses fa-w-18 fa-7x"
          >
            <g class="fa-group">
              <path
                fill="currentColor"
                d="M574.09 280.38L528.75 98.66a87.94 87.94 0 0 0-113.19-62.14l-15.25 5.08a16 16 0 0 0-10.12 20.25L395.25 77a16 16 0 0 0 20.22 10.13l13.19-4.39c10.87-3.63 23-3.57 33.15 1.73a39.59 39.59 0 0 1 20.38 25.81l38.47 153.83a276.7 276.7 0 0 0-81.22-12.47c-34.75 0-74 7-114.85 26.75h-73.18c-40.85-19.75-80.07-26.75-114.85-26.75a276.75 276.75 0 0 0-81.22 12.45l38.47-153.8a39.61 39.61 0 0 1 20.38-25.82c10.15-5.29 22.28-5.34 33.15-1.73l13.16 4.39A16 16 0 0 0 180.75 77l5.06-15.19a16 16 0 0 0-10.12-20.21l-15.25-5.08A87.95 87.95 0 0 0 47.25 98.65L1.91 280.38A75.35 75.35 0 0 0 0 295.86v70.25C0 429 51.59 480 115.19 480h37.12c60.28 0 110.38-45.94 114.88-105.37l2.93-38.63h35.76l2.93 38.63c4.5 59.43 54.6 105.37 114.88 105.37h37.12C524.41 480 576 429 576 366.13v-70.25a62.67 62.67 0 0 0-1.91-15.5zM203.38 369.8c-2 25.9-24.41 46.2-51.07 46.2h-37.12C87 416 64 393.63 64 366.11v-37.55a217.35 217.35 0 0 1 72.59-12.9 196.51 196.51 0 0 1 69.91 12.9zM512 366.13c0 27.5-23 49.87-51.19 49.87h-37.12c-26.69 0-49.1-20.3-51.07-46.2l-3.12-41.24a196.55 196.55 0 0 1 69.94-12.9A217.41 217.41 0 0 1 512 328.58z"
                class="fa-secondary"
              ></path>
              <path
                fill="currentColor"
                d="M64.19 367.9c0-.61-.19-1.18-.19-1.8 0 27.53 23 49.9 51.19 49.9h37.12c26.66 0 49.1-20.3 51.07-46.2l3.12-41.24c-14-5.29-28.31-8.38-42.78-10.42zm404-50l-95.83 47.91.3 4c2 25.9 24.38 46.2 51.07 46.2h37.12C489 416 512 393.63 512 366.13v-37.55a227.76 227.76 0 0 0-43.85-10.66z"
                class="fa-primary"
              ></path>
            </g>
          </svg>
          <span class="link-text">Themify</span>
        </a>
      </li>
    </ul>
  </nav>
  <nav class="vertical-line"></nav>
	<nav id="menu" class="menu-container">
		<!-- ACTIVITY -->
		<div id="menu1">
			<div class="top-menu">
				<div class="top-menu-left">
					<h1 class="top-menu-h1">Activity</h1>
				</div>
				<div class="top-menu-right">
					<button id="add-activity" class="add-activity" onmousedown="addNewActivity();">ADD NEW</button>
				</div>
			</div>
			<hr>
			<div class="search">
			  <input type="text" placeholder="  Search..">
			</div>
			<hr>
			
			<!-- ADDING NEW ACTIVITY -->
			<div style="display:none;" id="new-activity" class="new-activity" >
			
			 <div  class="flex-container"style="height:410px;">
				<form class="new-activity-form" action="activit.php" method="POST">
				  <p style="color:var(--text-primary); font-size: 25px;">Please select a job type:</p>
				  <input type="radio" name="type" value="plowing">
				  <label style="color:var(--text-primary);"for="">PLOWING</label><br>
				  <input type="radio" name="type" value="seeding">
				  <label style="color:var(--text-primary);"for="" >SEEDING</label><br>
				  <input type="radio" name="type" value="cultivating">
				  <label style="color:var(--text-primary);"for="">CULTIVATING</label><br>
				  <input type="radio" name="type" value="harvesting">
				  <label style="color:var(--text-primary);"for="">HARVESTING</label><br>
				
				  <p style="color:var(--text-primary); font-size: 25px;">Please select fields:</p>
					
					<?php
					for ($i = 0 ; $i < count($teren) ; $i++)
					{
					?>
					<input type="radio"  name="fiel" value="<?php  echo $teren[$i][1];?>">
					<label style="color:var(--text-primary);" for="teren"><?php  echo $teren[$i][1];?></p></label><br>
					<?php
					
					}
					?>
					</div>
				  <!-- for all fields show as radio -->
				  <button type="submit" name="save_radio" >Submit</button>
				
			</form>
			
			
			</div>
			<hr>
			<?php
					$lin = mysqli_connect("localhost", "root", "", "farmmanagement");
				   if($lin === false){
					  die("ERROR: Could not connect. " . mysqli_connect_error());
				   }
				   
				   $quer = "SELECT type, field FROM activity ";
				   $q = "SELECT * FROM fields where id=";
				   $r = mysqli_query($lin,$q);
				   $a = array();
				   
				   $resul = mysqli_query($lin,$quer);
				   $actv=array();
				   
				   while($re=mysqli_fetch_array($resul))
				   {
					   
					   array_push($actv,$re);
		
					}
				 
				  			  
				
				 ?>
				 <div id="new-activity-scroll"  class="flex-container" style="height:700px;">
				<?php
				for ($i = 0 ; $i < count($actv) ; $i++)
				{
					?><div class="top-menu" style=" background-color:#23232e;">
					<div class="top-menu-left"><p><?php  echo $actv[$i][0];?></p></div>
					<div class="top-menu-right"><p style="margin-right:50px;" ><?php  echo $actv[$i][1];?></p></div></div>
					<?php
					
				}
				?>
				</div>

		</div>
		<!-- FIELDS -->
		<div id="menu2">
			<div class="top-menu">
				<div class="top-menu-left">
					<h1 class="top-menu-h1">Fields</h1>
				</div>
				<div class="top-menu-right">
					<button id="button" class="add-activity" onmousedown="addFieldForm();">ADD NEW</button>
				</div>
			</div>
			<hr>
			<div class="search">
			  <input type="text" placeholder="  Search..">
			</div>
			<hr>
			<!-- ADD NEW FIELD -->
			<div style="display:none;" id="new-field" class="new-activity">
				
				  <p style="color:var(--text-primary); font-size: 25px;">Please enter field name:</p>
				  <input type="text" name="fieldName" id="fieldName" onfocusout="addFields();"><br>
					
				  <!---->
				<form style="display:none;" id="fields" action="index.php" method="post">
				  <input style="display:none;" name="fieldN" id="fieldN" type="text" value="Default Field"><br>
				  <input style="display:none;" name="lat" id="lat" type="text" value="14"><br>
				  <input style="display:none;" name="lng" id="lng" type="text" value="14"><br>
				  <input style="display:none;" name="area" id="area" type="text" value="14"><br>
				  
				  <input type="submit" value="Add field" name="field" id="field">
				</form>
			</div>
			
			<script src="JS/field.js"></script>
			<hr>
			
				 <div id="new-activity"  class="flex-container">
				<?php
				for ($i = 0 ; $i < count($teren) ; $i++)
				{
					?><div class="top-menu" style=" background-color:#23232e;">
					<div class="top-menu-left"><p><?php  echo $teren[$i][1];?></p></div>
					<div class="top-menu-right"><p style="margin-right:50px;" ><?php  echo $teren[$i][2];?></p></div></div>
					<?php
					
				}
				?>
				</div>
				
		</div>
		<!-- NUSH -->
		<div id="menu3">
		
		</div>
		<!-- WORKERS -->
		<div id="menu4">
			<div class="top-menu">
				<div class="top-menu-left">
					<h1 class="top-menu-h1">WORKERS</h1>
				</div>
				<div class="top-menu-right">
					<button id="button" class="add-activity" onmousedown="addWorkerForm();">ADD NEW</button>
				</div>
			</div>
			<hr>
			<div style="display:none;" id="new-worker" class="new-activity">
				<form action="" method="post"  >
				  <p style="color:var(--text-primary); font-size: 25px;">Creare cont angajati</p>
        <input class="iasmi" name="username" type="text"  name="username" autocomplete="false" placeholder="Name">
      	  <p class='field'>
        <input class="iasmi" name="email" type="text"  name="email" autocomplete="false" placeholder="E-mail">
      </p>
      <p class='field'>
        <input class="iasmi" name="password" type="password" name="password" autocomplete="false" placeholder="Password">
      </p>
					
				<div class="wrap">
        <input class="iasmi" class='button' type="submit" align="center" name="submit" value ="Add" />
      </div>  
				</form>
				</div>
				<hr>
				<?php
					$link = mysqli_connect("localhost", "root", "", "farmmanagement");
				   if($link === false){
					  die("ERROR: Could not connect. " . mysqli_connect_error());
				   }
				   
				   $query = "SELECT * FROM users";
				   $result = mysqli_query($link,$query);
				   $username=array();
				   
				   while($rez=mysqli_fetch_array($result))
				   {
					   array_push($username,$rez);
		
					}
				 ?>
				 <div id="new-activity"  class="flex-container">
				<?php
				for ($i = 0 ; $i < count($username) ; $i++)
				{
					?><div class="top-menu" style=" background-color:#23232e; color: white">
					<div class="top-menu-left"><p><?php  echo $username[$i][1];?></p></div>
					<div class="top-menu-right"><p style="margin-right:50px;" ></p></div></div>
					<?php
					
				}
				?>
				</div>
		</div>
		
		
	</nav>
	
	<button id="button-icon" class="button-icon" onmousedown="small();"><</button>
	
  <div id="mapContainer" class="map">
    <div id="map1"></div>
  </div>
</div>


<script>
	function addNewActivity(){
		document.getElementById( 'new-activity' ).style.display = "block";
		document.getElementById( 'new-activity-scroll' ).style.height = "200px";
		
		
	}
	function addFieldForm(){
		document.getElementById( 'new-field' ).style.display = "block";
	}
	function addWorkerForm(){
		document.getElementById( 'new-worker' ).style.display = "block";
	}
	
	function small(){
		document.getElementById( 'menu' ).style.display = "none";
		document.getElementById( 'mapContainer' ).style.width = "95%";
		document.getElementById( 'button-icon' ).style.display = "none";
		menu = false;
	}
	function changeMenu(index){
		document.getElementById( 'menu' ).style.display = "block";
		document.getElementById( 'button-icon' ).style.display = "block";
		document.getElementById( 'mapContainer' ).style.width = "50%";
		
		document.getElementById( 'menu1' ).style.display = "none";
		document.getElementById( 'menu2' ).style.display = "none";
		document.getElementById( 'menu3' ).style.display = "none";
		document.getElementById( 'menu4' ).style.display = "none";
		document.getElementById( 'new-activity' ).style.display = "none";
		document.getElementById( 'new-field' ).style.display = "none";
		document.getElementById( 'new-worker' ).style.display = "none";
		document.getElementById( 'new-activity-scroll' ).style.height = "700px";
		if(index == 0){
			document.getElementById( 'menu1' ).style.display = "block";
		}
		else if(index == 1){
			document.getElementById( 'menu2' ).style.display = "block";
		}
		else if(index == 2){
			document.getElementById( 'menu3' ).style.display = "block";
		}
		else if(index == 3){
			document.getElementById( 'menu4' ).style.display = "block";
		}
	}
</script>
<script>
	var osmUrl = 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}',
	  
	osm = L.tileLayer(osmUrl, {
		maxZoom: 18,
		attributionControl: false
	  });
	var map = L.map('map1').setView([45.699024, 21.072861], 17).addLayer(osm);
	
	
	
	function checkDistance(a,b,v){
		var dst = Math.sqrt((b.lat - a.lat)*(b.lat - a.lat) + (b.lng - a.lng)*(b.lng - a.lng))
		
		if(dst < v)
			return true
		else 
			return false
	}
	var points = []; 
	var polygons=[];
	addTerrain = false;
	let fieldName;
	function addFields(){
		fieldName = document.getElementById('fieldName').value;
		alert(fieldName);
		addTerrain = true;
		alert("please add points to map");
	}
	
	function makeFormActive(){
		document.getElementById( 'fields' ).style.display = "block";
		var lat = [];
		var lng = [];
		var area;
		var poly = polygons[0].getLatLngs();
		for (let i = 0; i < poly[0].length; i++) {
		  lat.push(poly[0][i].lat);
		  lng.push(poly[0][i].lng);
		}
			
	    area = L.GeometryUtil.geodesicArea(polygons[0].getLatLngs()[0]);
		
		document.getElementById('fieldN').value = fieldName;
		document.getElementById('lat').value = lat;
		document.getElementById('lng').value = lng;
		document.getElementById('area').value = area;
		
		//console.log(document.getElementById('lat').value);
		//console.log(document.getElementById('lng').value);
	}

	

	map.on('click', function(e) {
		if(addTerrain == true){
		
		points.push(e.latlng);
		
			if(points.length > 1 && checkDistance(points[0],points[points.length-1],0.0001) == true){
				points[points.length-1] = points[0];
				
				var polygon = L.polygon(points).addTo(map);
				polygons.push(polygon);
				points = [];
				polygon.bindPopup("<h1>"+fieldName+"</h1>");
				makeFormActive();
			}
			else{
				L.marker(e.latlng).addTo(map);
			}
			//alert(points)
		}
	});
	
</script>

		<?php
			$query = "SELECT * FROM fields";
		    $result = mysqli_query($link,$query);
		    $teren=array();
		    
		    while($rez=mysqli_fetch_array($result))
		    {
			    array_push($teren,$rez);
			}
			//$teren[0]['name'];
			//$teren[0]['id'];
			//$teren[0]['area'];
			$points_arr = array();
			for($i=0;$i<count($teren);$i++)
			{
				$id = $teren[$i]['id'];

				$query = "SELECT * FROM points where id_field = '$id' ORDER BY i ASC";
				$result = mysqli_query($link,$query);
			 
				$points=array();
				
				while($rez=mysqli_fetch_array($result))
				{
					array_push($points,$rez);
				}
				array_push($points_arr,$points);
			}
			for($i=0;$i<count($points_arr);$i++)
			{
				$points = $points_arr[$i];
?>
<script>
				var LatLng = [];
</script>
<?php
				//echo $teren[$i]['name'] . '<br>';
				for($j=0;$j<count($points);$j++)
				{
					//echo $points[$j]['lat'] . '<br>';
?>
					<script>
					var latlng = L.latLng(<?php echo $points[$j]['lat']; ?>, <?php echo $points[$j]['lng']; ?>);
					LatLng.push(latlng);
					</script>
<?php
				}
?>
<script>
				console.log(LatLng);
				var polygon = L.polygon(LatLng).addTo(map);
				polygon.bindPopup("<?php echo '<h1>'.$teren[$i]['name'].'</h1>'; ?>");
	</script>
			
			<?php
			}
			?>
	
<!-- jQuery -->
    <script src="js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="js/owl-carousel.js"></script>
    <script src="js/scrollreveal.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imgfix.min.js"></script> 
    <script src="js/slick.js"></script> 
    <script src="js/lightbox.js"></script> 
    <script src="js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="js/custom.js"></script>
	
</body>