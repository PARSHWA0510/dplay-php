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

$idx = explode('@',$checktbl);
$id0 = $idx[0];
$id1 = $idx[1];

$ure=mysqli_query($con,"select * from coach_batch_date where id = '$id0'");
$urow=mysqli_fetch_array($ure);	
$batch_date = $urow['batch_date'];
$batch_id = $urow['batch_id'];

//$sql=mysqli_query($con,"INSERT INTO `coach_batch_attendance` (`attendance_status`, `attendance_datetime`, `batch_id`, `batch_date`, `user_id`) VALUES ('$id','$today_datetime','$batch_id','$batch_date','$id1')");

$uupQry=mysqli_query($con,"UPDATE coach_batch_attendance SET `coach_note` = '$id' WHERE batch_id='$batch_id' and batch_date = '$batch_date' and user_id = '$id1'");
?>
