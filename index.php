<!DOCTYPE HTML>
<?php
include 'config.php';
session_start();
?>

<html>
	<head>
		<title>ZEUS Zephyr Tracker</title>
		<meta name="description" content="Trackking application used to check status of the Zephyr bike in real time." />
		<meta name="keywords" content="ZEUS, Zephyr, NovAtel, tracker" />
		<meta name="viewport" content="initial-scale=1.0">
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="styles.css" title="style" />
	<script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
      function initialize() {
        var mapCanvas = document.getElementById('map');
        var mapOptions = {
          center: new google.maps.LatLng(44.5403, -78.5463),
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions)
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
	</head>

	<body>
		<div id="main">
			<div id="header">
				<div id="logo">
					<div id="logo_text">
						<!-- class="logo_colour", allows you to change the colour of the text -->
						<h1><a href="index.php">ZEUS</a></h1>
						<under>Zephyr Tracker</under>
					</div>
				</div>
				<div id="menubar">
					<ul id="menu">
						<!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
						<li class="selected"><a href="index.php">Home</a></li>
						<li><a href="about.php">About</a></li>
<?php
if (empty($_SESSION["username"])) {
?>
			 <li><a href="loginpage.php">Login</a></li>
<?php
} else if (!empty($_SESSION["username"])) {
?>
	<li><a href="UserCP.php">User: <?php
	if (!empty($_SESSION["username"])) {
		echo $_SESSION["username"];
	}
?> CP</a></li> 
		   <li><a href = "setuprace.php" title ="Setup Race">Upload Image</a></li>
		   <li><a href="logout.php" tite="Logout">Logout</a></li>              
<?php
}
?>
					</ul>
				</div>
			</div>
			<div id="site_content">
				<div id="content">
					<b>Most Recent Test Data</b>
					<br></br>
					<div id="map"></div>
				</div>
			</div>
		<div id="content_footer"></div>
	<div id="footer">
	<a>Created by Indra Prasetyo | Christopher Smith | Neil Baskerville-Bridges | Jonathan Wan</a>
	</div>
	</div>
	</body>
</html>
