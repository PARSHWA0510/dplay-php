<?php error_reporting(0); session_start(); include('config.php'); ?>
<?php  date_default_timezone_set("Asia/Kolkata");  $todaydatetime = date('Y-m-d H:i:s'); $user_id = $_SESSION['user_id']; ?>
<?php 
$ureurl=mysqli_query($con,"select * from website_url");
$rowurl=mysqli_fetch_array($ureurl);
$siteurl_link = $rowurl['url_link']; 

if(empty($_SESSION['cartid']))
{
$_SESSION['cartid'] = uniqid();
}
$cartid = $_SESSION['cartid']; 

$id = $_GET['id'];
$_SESSION['membership_id_session'] = $id;

$buy_session = 'membership';
$_SESSION['buy_session'] = $buy_session;

$uree=mysqli_query($con,"select * from user_membership where id = '$id'");
$uroww=mysqli_fetch_array($uree);
$venue_id = $uroww['venue_id'];
$urevn=mysqli_query($con,"select * from venue_master where id = '$venue_id'");
$urowvn=mysqli_fetch_array($urevn);

?>
<script language="javascript">window.location.href="<?php echo $siteurl_link; ?>/<?php echo $urowvn['seo_url']; ?>";</script>
