<?php error_reporting(0); session_start(); include('../config.php'); $buy_session = $_SESSION['buy_session']; $membership_id_session = $_SESSION['membership_id_session'];
 ?>
<?php  date_default_timezone_set("Asia/Kolkata");  $todaydatetime = date('Y-m-d H:i:s'); $user_id = $_SESSION['user_id']; ?>
<?php 
if(empty($_SESSION['cartid']))
{
$_SESSION['cartid'] = uniqid();
}
$cartid = $_SESSION['cartid']; 

$id = $_GET['id'];
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

if($buy_session == 'membership')
{
$uree=mysqli_query($con,"select * from user_membership where id = '$membership_id_session' and user_id = '$user_id'");
$uroww=mysqli_fetch_array($uree);
$session_no = $uroww['session_no'];
$venue_id_purchased = $uroww['venue_id'];
$urevn=mysqli_query($con,"select * from venue_master where id = '$venue_id_purchased'");
$urowvn=mysqli_fetch_array($urevn);

if($venue_id_purchased != $venue_id) 
{
?>
<script>alert("You are not Authorized to Purchase This Venue's Court Booking");</script>
<script language="javascript">window.location.href="https://dplays.in/<?php echo $urowvn['seo_url']; ?>";</script>
<?php 
}
else
{
$urexy=mysqli_query($con,"select * from user_court where court_id = '$id' and payment_status = '0' and cartid = '$cartid' and court_date >= '$today_date'");
$booked_no=mysqli_num_rows($urexy);
if($booked_no == $session_no)
{
?>
<script>alert("You Can Only Book Maximum <?php echo $session_no; ?> Court in Membership Plan");</script>
<script language="javascript">window.location.href="court-book.php?id=<?php echo $id; ?>&date=<?php echo $court_date; ?>";</script>
<?php 

}
else
{
$delete = mysqli_query($con,"DELETE FROM user_court WHERE court_id = '$id' and slot_id = '$slot' and court_date = '$court_date' and payment_status = '0' and cartid = '$cartid'");

$sql=("INSERT INTO `user_court` (`venue_id`,`user_id`, `court_date`,`court_time`,`court_price`, `payment_status`, `order_no`, `order_datetime`, `court_id`, `slot_id`, `cartid`) VALUES ('$venue_id','$user_id','$court_date','$slot_timing','$slot_price','0','$order_no','$todaydatetime','$id','$slot','$cartid')");	
$z = mysqli_query($con,$sql);
}
}
}

if($buy_session == '' || $buy_session == 'courtbook')
{

$urex=mysqli_query($con,"select * from user_court where court_id = '$id' and slot_id = '$slot' and court_date = '$court_date' and payment_status = '0' and cartid = '$cartid'");
$urowxno=mysqli_num_rows($urex);
if($urowxno > 0)
{
$delete = ("DELETE FROM user_court WHERE court_id = '$id' and slot_id = '$slot' and court_date = '$court_date' and payment_status = '0' and cartid = '$cartid'");
$z = mysqli_query($con,$delete);
}
else
{
$sql=("INSERT INTO `user_court` (`venue_id`,`user_id`, `court_date`,`court_time`,`court_price`, `payment_status`, `order_no`, `order_datetime`, `court_id`, `slot_id`, `cartid`) VALUES ('$venue_id','$user_id','$court_date','$slot_timing','$slot_price','0','$order_no','$todaydatetime','$id','$slot','$cartid')");	
$z = mysqli_query($con,$sql);
}
}

if($buy_session == '')
{
$buy_session = 'courtbook';
$_SESSION['buy_session'] = $buy_session;
}
//exit(); 
?>
<script language="javascript">window.location.href="court_booking.php?id=<?php echo $id; ?>&date=<?php echo $court_date; ?>";</script>