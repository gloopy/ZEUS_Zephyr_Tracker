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
						<li><a href="index.php">Home</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="allraces.php">All Races</a></li>
<?php
if (empty($_SESSION["username"])) {
?>
			 <li><a href="loginpage.php">Login</a></li>
<?php
} else if (!empty($_SESSION["username"])) {
?>
   <li class="selected"><a href = "setuprace.php">Setup/Modify Race</a></li>
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
				<bodybold>Create a race</bodybold>
					<br>
					<form action= "createraceconfirm.php" method= "POST">
						<b>Race Name</b>
						<br>
                        <input type="text" name="racename" value="" />
                        <br>
                        <br>
                        <b>Race Location</b>
                        <br>
                        <input type="text" name="location" value= "" />
                        <br>
                        <br>
                        <b>Description</b>
                        <br>
						<textarea cols="60" rows="8" name="desc" /></textarea><br>
                        <br>
						<input type="submit" value="Create race" />
                    </form>
					<br>
					<bodybold>Select a race to modify</bodybold>
					<br>
                    <?php
                    $connected = new mysqli($Database_Address, $Database_User, $Database_Password, $Database_Name);
                    if ($connected->connect_errno > 0) {
                        die('Unable to connect to database [' . mysqli_connect_errno() . ']' . mysqli_connect_error());
                    }
					
					$result = $connected->prepare("SELECT Race.raceID, Race.racename, Race.location From Race ORDER BY raceID DESC"); 

					$result->execute();
					$result->bind_result($raceID, $racename, $location);
					while ($result->fetch()) {
					?>
						<a href="modifyrace.php?ID=<?php echo $raceID ?>"><?php echo $racename ?> at <?php echo $location ?></a>
							<br>
						<?php
						}
						?>
				</div>
			</div>
		<div id="content_footer"></div>
	<div id="footer">
	<a>Created by the University of Calgary ZEUS Racing Team</a>
	</div>
	</div>
	</body>
</html>
