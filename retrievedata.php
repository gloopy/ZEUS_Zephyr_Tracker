<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

	include 'config.php';

	$connected = new mysqli($Database_Address, $Database_User, $Database_Password, $Database_Name);
	if ($connected->connect_errno > 0) {
		die('Unable to connect to database [' . mysqli_connect_errno() . ']' . mysqli_connect_error());
	}
	$searchID = $_GET["ID"];
	$query = "SELECT DataPoint.pointID, DataPoint.time, DataPoint.acceleration, DataPoint.velocity, DataPoint.latitude, DataPoint.longitude, DataPoint.altitude From DataPoint JOIN DataSet ON DataSet.DataID = DataPoint.DataID WHERE DataPoint.DataID = $searchID";
	$result=$connected->query($query);
	/* $result->execute(); */
	/* $result->bind_result($pointID, $time, $acc, $vel, $lat, $long, $alt); */

	while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
	echo json_encode($data);

	print("\n");
	}
	$result->free();

/* close connection */
$connected->close();
?>

