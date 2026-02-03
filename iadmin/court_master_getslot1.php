<?php  error_reporting(0); session_start();
include('../config.php');

$q=$_GET["q"];
$_SESSION['start_time'] = $q;
?>