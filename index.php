<!DOCTYPE HTML>
<?php
include 'config.php';
session_start();
?>

<html>
	<head>
		<meta name="description" content="Trackking application used to check status of the Zephyr bike in real time." />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="keywords" content="ZEUS, Zephyr, NovAtel, tracker" />
		<meta name="viewport" content="initial-scale=1.0">
		<meta charset="utf-8">
		<title>ZEUS Zephyr Tracker</title>
		<link rel="stylesheet" type="text/css" href="styles.css" title="style" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.11&sensor=false" type="text/javascript"></script>
        <script type="text/javascript">
        // check DOM Ready
        $(document).ready(function() {
            // execute
            (function() {
                // map options
                var options = {
                    zoom: 18,
                    center: new google.maps.LatLng(51.08098761039,-114.13523451699),
                    mapTypeId: google.maps.MapTypeId.SATELLITE,
                };

                // init map
                var map = new google.maps.Map(document.getElementById('map_canvas'), options);

				// test data points
				var markerData = [
						['Point 1', 51.07965142300,-114.13475132266,1109.6614],
						['Point 2', 51.07965113529,-114.13474666073,1109.7713],
						['Point 3', 51.07965344979,-114.13474009499,1110.0888],
						['Point 4', 51.07965563579,-114.13473414347,1110.5077],
						['Point 5', 51.07965560235,-114.13473405127,1110.2680],
						['Point 6', 51.07965848068,-114.13472584087,1110.8369],
						['Point 7', 51.07966392958,-114.13471905682,1111.5994],
						['Point 8', 51.07966438041,-114.13471512865,1111.6527],
						['Point 9', 51.07966171494,-114.13471395800,1111.1365],
						['Point 10', 51.07966023564,-114.13471191817,1110.7994],
						['Point 11', 51.07965590700,-114.13471307355,1109.9515]
					];

                for (var i = 0; i < markerData.length; i++) {
                    // init markers
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(markerData[i][1], markerData[i][2]),
                        map: map,
                        title: 'Data Point: ' + i
                    });

                    // process multiple info windows
                    (function(marker, i) {
                        // add click event
                        google.maps.event.addListener(marker, 'click', function() {
                            infowindow = new google.maps.InfoWindow({
                                content: 'This is a test'
                            });
                            infowindow.open(map, marker);
                        });
                    })(marker, i);
                }
            })();
        });
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
        <div id="map_canvas" style="width: 800px; height:500px;"></div>

				</div>
			</div>
		<div id="content_footer"></div>
	<div id="footer">
	<a>Created by Indra Prasetyo | Christopher Smith | Neil Baskerville-Bridges | Jonathan Wan</a>
	</div>
	</div>
	</body>
</html>
