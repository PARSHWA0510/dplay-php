<?php error_reporting(0); session_start(); include('config.php'); ?>
<?php  date_default_timezone_set("Asia/Kolkata");  $todaydatetime = date('Y-m-d H:i:s'); $user_id = $_SESSION['user_id']; ?>
<?php 
if(empty($_SESSION['cartid']))
{
$_SESSION['cartid'] = uniqid();
}
$cartid = $_SESSION['cartid']; 

$order_no = rand(11111,99999);

$id = $_GET['id'];

$delete = mysqli_query($con,"DELETE FROM user_order WHERE payment_status = '0' and cartid = '$cartid' and order_type = 'eventbook'");

$ureee=("select * from event_data where id = '$id'");
$uree = mysqli_query($con,$ureee);
$uroww=mysqli_fetch_array($uree);
$event_id = $uroww['event_id'];
$data_fees = $uroww['data_fees'];


$sql=mysqli_query($con,"INSERT INTO `user_order` (`user_id`, `order_no`, `order_datetime`, `cartid`, `order_type`, `event_id`, `event_book_id`, `total_amount`, `final_amount`) VALUES ('$user_id','$order_no','$todaydatetime','$cartid','eventbook','$event_id','$id','$data_fees','$data_fees')");
$insid = mysqli_insert_id($con);

//exit();						
?>
<script language="javascript">window.location.href="event-payment.php?id=<?php echo $insid; ?>&qty=1";</script>
