<?php
session_start();
unset($_SESSION["ID"]);
unset($_SESSION["username"]);
header("Location:index.php");
?>