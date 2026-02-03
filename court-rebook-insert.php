<?php error_reporting(0); session_start(); include('config.php'); ?>
<?php  date_default_timezone_set("Asia/Kolkata");  $todaydatetime = date('Y-m-d H:i:s'); $user_id = $_SESSION['user_id']; ?>
<?php 
if(empty($_SESSION['cartid']))
{
$_SESSION['cartid'] = uniqid();
}
$cartid = $_SESSION['cartid']; 

$id = $_GET['id'];
$old_bookid = $_GET['old_bookid'];
if($old_bookid != '') { $_SESSION['old_bookid_session'] = $old_bookid; }
//exit();
$slot = $_GET['slot'];
$court_date = $_GET['date'];
$dayNumber = date('N', strtotime($court_date)); 
$order_no = rand(11111,99999);

$ure=mysqli_query($con,"select * from court_master where id = '$id'");
$urow=mysqli_fetch_array($ure); 
$venue_id = $urow['venue_id'];

$urex=mysqli_query($con,"select * from court_slot where court_id = '$id' and id = '$slot'");
$urowx=mysqli_fetch_array($urex);
$slot_timing = $urowx['slot_timing'];
$weeekday_slot_price = $urowx['weeekday_slot_price'];
$weeekend_slot_price = $urowx['weeekend_slot_price'];

if ($dayNumber >= 6) { $slot_price = $urowx['weeekend_slot_price']; } else { $slot_price = $urowx['weeekday_slot_price']; }
//exit();

if($old_bookid != '')
{
$urexy=mysqli_query($con,"select * from user_court where id = '$old_bookid'");
$urowx=mysqli_fetch_array($urexy);
$user_id = $urowx['user_id'];
$court_id = $urowx['court_id'];
$slot_id = $urowx['slot_id'];
$court_date = $urowx['court_date'];
$court_time = $urowx['court_time'];
$court_price = $urowx['court_price'];
$manager_id = $urowx['manager_id'];
}
else
{

$old_bookid = $_SESSION['old_bookid_session'];

$urexy=mysqli_query($con,"select * from user_court where id = '$old_bookid'");
$urowx=mysqli_fetch_array($urexy);
$manager_id = $urowx['manager_id'];
$court_price = $urowx['court_price'];
$order_id = $urowx['order_id'];
$razorpay_payment_id = $urowx['razorpay_payment_id'];
$razorpay_signature = $urowx['razorpay_signature'];

if($court_price < $slot_price) { $rebook_price = $slot_price - $court_price; } else { $rebook_price = '0'; }

$delete = mysqli_query($con,"DELETE FROM user_court WHERE old_bookid = '$old_bookid' and rebook = '1' and submit_status = '0'");

$sql=("INSERT INTO `user_court` (`venue_id`,`user_id`, `court_date`,`court_time`,`court_price`, `old_bookid`, `order_no`,`order_datetime`, `court_id`, `slot_id`, `manager_id`,`cartid`,`rebook`,`rebook_price`,`order_id`,`razorpay_payment_id`,`razorpay_signature`) VALUES ('$venue_id','$user_id','$court_date','$slot_timing','$slot_price','$old_bookid','$order_no','$todaydatetime','$id','$slot','$manager_id','$cartid','1','$rebook_price','$order_id','$razorpay_payment_id','$razorpay_signature')");	
$z = mysqli_query($con,$sql);
}
//exit();

//exit();
$buy_session = 'courtbook';
$_SESSION['buy_session'] = $buy_session;

//exit(); 
?>
<script language="javascript">window.location.href="court-rebook.php?id=<?php echo $id; ?>&date=<?php echo $court_date; ?>";</script>
