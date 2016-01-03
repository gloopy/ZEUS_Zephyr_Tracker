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
				    tilt: 0,
                    zoom: 18,
                    center: new google.maps.LatLng(51.08046525830, -114.13115824621),
                    mapTypeId: google.maps.MapTypeId.SATELLITE,
                };

                // init map
                var map = new google.maps.Map(document.getElementById('map_canvas'), options);

				// test data points
				var markerData = [
						['Point', 51.08046675182, -114.13115363834, 1120.9111],
						['Point', 51.08046525830, -114.13115824621, 1120.4446],
						['Point', 51.08048599545, -114.13114181231, 1123.2572],
						['Point', 51.08052772191, -114.13109897239, 1128.9341],
						['Point', 51.08055907471, -114.13108089432, 1132.5900],
						['Point', 51.08052517029, -114.13111777736, 1127.1075],
						['Point', 51.08052089525, -114.13112193132, 1126.4992],
						['Point', 51.08059299614, -114.13102870848, 1141.2048],
						['Point', 51.08059345185, -114.13103043539, 1141.1481],
						['Point', 51.08059526863, -114.13103104902, 1141.2425],
						['Point', 51.08059576938, -114.13103346209, 1141.1454],
						['Point', 51.08049989066, -114.13114167547, 1124.1777],
						['Point', 51.08059416555, -114.13103713375, 1140.7942],
						['Point', 51.08051374013, -114.13112528426, 1126.5375],
						['Point', 51.08049835196, -114.13113718940, 1124.5871],
						['Point', 51.08053409624, -114.13111609931, 1128.6612],
						['Point', 51.08047173249, -114.13110414708, 1127.5029],
						['Point', 51.08054704292, -114.13145455467, 1097.6230],
						['Point', 51.08036806919, -114.13065044478, 1161.2898],
						['Point', 51.08046504834, -114.13108015100, 1126.1095],
						['Point', 51.08050524590, -114.13118209248, 1110.7614],
						['Point', 51.08060555552, -114.13126035449, 1106.1844],
						['Point', 51.08059567846, -114.13136002411, 1090.5273],
						['Point', 51.08047723385, -114.13116081815, 1118.7578],
						['Point', 51.08046357716, -114.13113311729, 1123.7511],
						['Point', 51.08048726380, -114.13113798039, 1112.3681],
						['Point', 51.08045005229, -114.13112121675, 1120.8721],
						['Point', 51.08045555304, -114.13115819039, 1117.1890],
						['Point', 51.08046253022, -114.13122664821, 1112.4072],
						['Point', 51.08054682140, -114.13153257421, 1081.4323],
						['Point', 51.08052696001, -114.13147986775, 1088.8394],
						['Point', 51.08028970509, -114.13127522450, 1162.9769],
						['Point', 51.08031246973, -114.13081272560, 1155.6327],
						['Point', 51.08009848324, -114.13099814491, 1136.3149],
						['Point', 51.08012832664, -114.13101194007, 1126.9091],
						['Point', 51.08013243891, -114.13100622621, 1123.9679]
				];
				console.log(markerData);
				// Modify marker point appearance
				var pinIcon = new google.maps.MarkerImage(
					"http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|FFFF00",
					null, 
					null,
					null,
					new google.maps.Size(18, 30)
				);  

				// Initialize array to contain travel path
				var travelPath = new Array();
				var origin = new google.maps.LatLng(markerData[0][1], markerData[0][2]);

                for (var i = 0; i < markerData.length; i++) {
                    // Initialize markers
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(markerData[i][1], markerData[i][2]),
                        map: map,
                        title: 'Data Point: ' + i
                    });
                	var markerPath = new google.maps.LatLng(markerData[i][1], markerData[i][2]);
					marker.setIcon(pinIcon);
					travelPath.push(markerPath);

                    // Process multiple info windows
                    (function(marker, i) {
                        // Add click event
                        google.maps.event.addListener(marker, 'click', function() {
                            infowindow = new google.maps.InfoWindow({
							content: '<b>Data Point:</b> ' + i +
								'<br>Latitude: ' + markerData[i][1] +
								'<br>Longitude: ' + markerData[i][2] +
								'<br>Altitude: ' + markerData[i][3] +
								'<br>Speed: TOO FAST' +
								'<br>Acceleration: ZOOM ZOOM' 
                            });
                            infowindow.open(map, marker);
                        });
                    })(marker, i);
                }

				// Initialize travel path properties
				var pathProperties=new google.maps.Polyline({
					path:travelPath,
					strokeColor:"#0000FF",
					strokeOpacity:0.8,
					strokeWeight:2
				});
				console.log(pathProperties);
				pathProperties.setMap(map);

				// Event for resetting to origin on button press
				google.maps.event.addDomListener(document.getElementById("reset"), 'click', function() {
					map.setCenter(origin);
					map.setZoom(30);
				});

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
						<li><a href="allraces.php">All Races</a></li>
<?php
if (empty($_SESSION["username"])) {
?>
			 <li><a href="loginpage.php">Login</a></li>
<?php
} else if (!empty($_SESSION["username"])) {
?>
	<li><a href = "setuprace.php">Setup/Modify Race</a></li>
	<li><a href="usercp.php">User CP: <?php
	if (!empty($_SESSION["username"])) {
		echo $_SESSION["username"];
	}
?></a></li> 
		   <li><a href="logout.php">Logout</a></li>              
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
						<input type="button" id="reset" value="Reset to origin"></input>

				</div>
			</div>
		<div id="content_footer"></div>
	<div id="footer">
	<a>Created by the University of Calgary ZEUS Racing Team</a>
	</div>
	</div>
	</body>
</html>
