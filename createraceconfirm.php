<!DOCTYPE HTML>
<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off to display errors
include 'config.php';
session_start();

$racename =  $_POST["racename"];
$location =  $_POST["location"];
$description =  $_POST["desc"];
$createdBy = $_SESSION["ID"];

if (count($_POST) > 0) {
    // Establish connection and test that it works properly
    $connected = mysql_connect($Database_Address, $Database_User, $Database_Password, $Database_Name);
    if (!$connected) {
        die("MySQL connection failed" . mysql_error());
    }

    $db_connected = mysql_select_db("tracker", $connected);
    if (!$db_connected) {
        die("Database connection failed" . mysql_error());
	}

	$test = mysql_query("SELECT racename FROM Race");
	$valid = 1;
	while($dup = mysql_fetch_assoc($test)) {
		if($dup['racename'] == $racename){
			$valid = 0;
			header("Location:setupracefail.php");
		}
	}          

	if($valid == 1) {
		$to_insert = "INSERT INTO Race(createdBy, racename, location, description) VALUES ('$createdBy', '$racename', '$location', '$description')";
		$result = mysql_query($to_insert);

		if($result){
			header("Location:setupracesuccess.php");
		} else {
			header("Location:setupracefail.php");
		}
	}
}
?>
