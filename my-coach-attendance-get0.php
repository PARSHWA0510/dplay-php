<?php session_start();
error_reporting(0);
ob_start();
include('config.php');

$id=$_GET['id'];
$checktbl=$_GET['checktbl'];
$data=array();

date_default_timezone_set("Asia/Kolkata");
$today_datetime = date('Y-m-d H:i:s');  
$curdate = date('Y-m-d');
$randcode = rand(1111,9999);

$uupQry=mysqli_query($con,"UPDATE coach_batch_attendance SET `user_note` = '$id' WHERE id='$checktbl'");
?>
