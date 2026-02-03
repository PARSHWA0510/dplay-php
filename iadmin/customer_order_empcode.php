<?php   session_start();
error_reporting(0);
ob_start();
include('../config.php');

	
$id=$_GET['id'];
$checktbl=$_GET['checktbl'];
$data=array();
		

$uupQry="UPDATE order_store SET `emp_code` = '$id'  WHERE code='$checktbl'";
$uuresult=mysqli_query($con,$uupQry);
?>
