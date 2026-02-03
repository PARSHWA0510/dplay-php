<?php error_reporting(0); session_start(); include('config.php'); ?>
<?php  date_default_timezone_set("Asia/Kolkata");  $todaydatetime = date('Y-m-d H:i:s'); $user_id = $_SESSION['user_id']; $today_date = date('Y-m-d'); ?>
<?php 
$package_id = $_GET['id'];
$manager_id = $_GET['manager_id'];
$order_no = rand(11111,99999);

if(empty($_SESSION['cartid']))
{
$_SESSION['cartid'] = uniqid();
}
$cartid = $_SESSION['cartid']; 


$urexx=("select * from discount_master where user_id = '$manager_id' and status = '1' and start_date <= '$today_date' and end_date >= '$today_date' and discount_for = 'membership'");
$urex = mysqli_query($con,$urexx);
$urowx=mysqli_fetch_array($urex);
$discount_no=mysqli_num_rows($urex);
$discount_per = $urowx['discount_per'];
$discount_rs = $urowx['discount_rs']; 

$ure=mysqli_query($con,"select * from package_user where id = '$package_id'");
$urow=mysqli_fetch_array($ure);
$venue_id = $urow['venue_id'];
$price = $urow['price'];
$session_no = $urow['session_no'];

if($discount_no != '0') 
{
if($discount_per != '0') { $d1 = $price * $discount_per; $d2 = $d1 / 100;  $price = ceil($price - $d2); } else {  $price = ceil($price - $discount_rs); }
}

$delete = "DELETE FROM user_membership where payment_status = '0' and cartid = '$cartid'";
mysqli_query($con, $delete);

$delete = "DELETE FROM user_order where payment_status = '0' and cartid = '$cartid'";
mysqli_query($con, $delete);


$sql=("INSERT INTO `user_membership` (`user_id`, `package_id`, `payment_status`, `order_no`, `order_datetime`, `venue_id`, `cartid`, `package_price`, `session_no`) VALUES ('$user_id','$package_id','0','$order_no','$todaydatetime','$venue_id','$cartid','$price','$session_no')");	
$z = mysqli_query($con,$sql);

//exit();

$buy_session = 'membership';
$_SESSION['buy_session'] = $buy_session;

//exit(); 
?>
<?php if($user_id == '') { ?><script language="javascript">window.location.href="login.php";</script><?php } ?>
<?php if($user_id != '') { ?><script language="javascript">window.location.href="membership-payment.php";</script><?php } ?>
