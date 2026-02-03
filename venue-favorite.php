<?php error_reporting(0); session_start(); include('config.php'); ?>
<?php  date_default_timezone_set("Asia/Kolkata");  $todaydatetime = date('Y-m-d H:i:s'); $user_id = $_SESSION['user_id']; ?>
<?php 
$id = $_GET['id'];

$ure=mysqli_query($con,"select * from venue_favorite where user_id = '$user_id' and venue_id = '$id'");
$memno=mysqli_num_rows($ure);
if($memno == 0)
{
$sql=("INSERT INTO `venue_favorite` (`user_id`, `venue_id`,`ins_datetime`) VALUES ('$user_id','$id','$todaydatetime')");	
$z = mysqli_query($con,$sql);
}
else
{ }
?>
<script>alert('Venue Added in Favorite List');</script>
<script language="javascript">window.location.href="dplay-venue.php";</script>
