<?php session_start();
error_reporting(0);
ob_start();
include('../config.php');

$id=$_GET['id'];
$checktbl=$_GET['checktbl'];
$data=array();

$curdate = date('Y-m-d');
$randcode = rand(1111,9999);

$sql=("INSERT INTO `user_court_date_temp` (`insdate`) VALUES ('$id')");	
$z = mysqli_query($con,$sql);

?>
