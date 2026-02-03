<?php session_start();
error_reporting(0);
ob_start();
include('../config.php');

$id=$_GET['id'];
$checktbl=$_GET['checktbl'];
$data=array();
		
$uupQry="UPDATE venue_subscription_range SET `from_amt` = '$id'  WHERE id='$checktbl'";
$uuresult=mysqli_query($con,$uupQry);

?>
