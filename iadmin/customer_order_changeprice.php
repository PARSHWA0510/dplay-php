<?php   session_start();
error_reporting(0);
ob_start();
include('../config.php');

	
$id=$_GET['id'];
$checktbl=$_GET['checktbl'];
$data=array();
		
$order_randcode = $_SESSION['order_randcode'];

$uupQry="UPDATE order_store SET `qty` = '$id'  WHERE autono='$checktbl' and code='$order_randcode'";
$uuresult=mysqli_query($con,$uupQry);

$ure=mysqli_query($con,"select * from order_store where autono = '$checktbl' and code='$order_randcode'");
$urow=mysqli_fetch_array($ure);		

$qty = $urow['qty'];
$price = $urow['price'];
$total = $qty * $price;

$uupQry="UPDATE order_store SET `total` = '$total'  WHERE autono='$checktbl' and code='$order_randcode'";
$uuresult=mysqli_query($con,$uupQry);

?>
