<?php session_start();
error_reporting(0);
ob_start();
include('config.php');

$id=$_GET['id'];
$checktbl=$_GET['checktbl'];
$data=array();

$curdate = date('Y-m-d');
$randcode = rand(1111,9999);

$idx = explode('@',$checktbl);
$id0 = $idx[0];
$id1 = $idx[1];
$id2 = $idx[2];


$ureb=mysqli_query($con,"select * from user_order_accessories where order_id = '$id0' and event_id = '$id1' and event_qty = '$id2'");
$ureb_no = mysqli_num_rows($ureb);
if($ureb_no > 0) 
{
$dusr="delete from user_order_accessories where order_id = '$id0' and event_id = '$id1' and event_qty = '$id2'";
$dre=mysqli_query($con,$dusr);
}

$sql=("INSERT INTO `user_order_accessories` (`order_id`, `event_id`, `event_accessories_id`, `event_qty`) VALUES ('$id0','$id1','$id','$id2')");	 
$z = mysqli_query($con,$sql);

?>
