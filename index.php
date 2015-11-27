<!DOCTYPE HTML>
<?php
include 'config.php';
session_start();
?>

<html>
	<head>
		<title>ZEUS Zephyr Tracker</title>
		<meta name="description" content="website description" />
		<meta name="keywords" content="website keywords, website keywords" />
		<meta http-equiv="content-type" content="text/html; charset=windows-1252" />
		<link rel="stylesheet" type="text/css" href="styles.css" title="style" />
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
						<li><a href="about.php">About JP2A</a></li>
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
					<script>

var map;
function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: -34.397, lng: 150.644},
		zoom: 8
	});
}

					</script>
					<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"
			 async defer></script>


				</div>
			</div>
			<div id="content_footer"></div>
			<div id="footer">
				<a>Created by Indra Prasetyo | Christopher Smith | Neil Baskerville-Bridges | Jonathan Wan</a>
			</div>
		</div>
	</body>
</html>
