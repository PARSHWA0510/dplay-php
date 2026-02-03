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

$ureee=("select * from coach_batch where id = '$id'");
$uree = mysqli_query($con,$ureee);
$uroww=mysqli_fetch_array($uree);
$amount = $uroww['amount'];
$coach_id = $uroww['coach_id'];


$sql=mysqli_query($con,"INSERT INTO `user_order` (`user_id`, `order_no`, `order_datetime`, `cartid`, `order_type`, `coach_batch_id`, `total_amount`, `final_amount`, `coach_id`) VALUES ('$user_id','$order_no','$todaydatetime','$cartid','coachbook','$id','$amount','$amount','$coach_id')");
$insid = mysqli_insert_id($con);

//exit();						
?>
<script language="javascript">window.location.href="coach-payment.php?id=<?php echo $insid; ?>";</script>
