<?php  error_reporting(0); session_start(); include('config.php'); $cartid = $_SESSION['cartid']; $buy_session = $_SESSION['buy_session']; $membership_id_session = $_SESSION['membership_id_session']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php 
$logoaddp=mysqli_query($con,"select * from company_master");
$logoaddsp=mysqli_fetch_array($logoaddp);
echo $google_analytic_code = $logoaddsp['google_analytic_code'];
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<?php
$seo1 = mysqli_query($con,"SELECT * FROM seo_master WHERE page_name = 'Court Payment'");
$seo2 = mysqli_fetch_array($seo1);
?>
<title><?php echo $seo2['seo_title']; ?></title>
<meta name="keywords" content="<?php echo $seo2['seo_keyword']; ?>">
<meta name="description" content="<?php echo $seo2['seo_description']; ?>">
<!-- Meta Tags -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
<link rel="apple-touch-icon" sizes="120x120" href="assets/img/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="152x152" href="assets/img/apple-touch-icon-152x152.png">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<!-- Fontawesome CSS -->
<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
<!-- Select CSS -->
<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
<!-- Feathericon CSS -->
<link rel="stylesheet" href="assets/css/feather.css">
<!-- Main CSS -->
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<!-- Main Wrapper -->
<div class="main-wrapper coach">
  <!-- Header -->
  <?php include 'header.php' ?>
  <div class="breadcrumb mb-0"> <span class="primary-right-round"></span>
    <div class="container">
      <h1 class="text-white">Court Payment</h1>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li>Court Payment</li>
      </ul>
    </div>
  </div>
  <!-- /Breadcrumb -->
  <!-- Page Content -->
  <div class="content">
    <div class="container">
      <section>
        <div class="text-center mb-40">
          <?php 
		  $uretbo=mysqli_query($con,"select * from user_court where payment_status = '0' and cartid = '$cartid' and court_date >= '$today_date'");
		  $urowtbono=mysqli_num_rows($uretbo); ?>
          <?php if($cartid == '' || $urowtbono == '0') { ?>
          <h3 class="mb-1">No Booking Yet!</h3>
          <p class="sub-title">Please Start Booking of your Favorite Court. <a href="<?php echo $siteurl_link; ?>/">Click Here</a></p>
          <?php } else { ?>
          <h3 class="mb-1">Payment</h3>
          <p class="sub-title">Securely make your payment for the booking. Contact support for assistance.</p>
          <?php } ?>
        </div>
        <div class="row checkout" <?php if($cartid == '' || $urowtbono == '0') { ?> style="display:none" <?php } ?>>
          <div class="col-12 col-sm-12 col-md-12 col-lg-7">
            <div class="card booking-details">
              <h3 class="border-bottom">Order Summary</h3>
              <?php 
			    $uretbo=mysqli_query($con,"select * from user_order where payment_status = '0' and cartid = '$cartid'");
				$urowtbono=mysqli_num_rows($uretbo);
				if($urowtbono == '0')
				{
				$order_no = rand(11111,99999);
				$sql=mysqli_query($con,"INSERT INTO `user_order` (`user_id`, `order_no`, `order_datetime`, `cartid`, `order_type`) VALUES ('$user_id','$order_no','$today_datetime','$cartid','$buy_session')");
				$ref_orderid = mysqli_insert_id($con);
				}
				else
				{
				$urowtbo=mysqli_fetch_array($uretbo);
				$ref_orderid = $urowtbo[0];
				}
				
			    $uretbo=mysqli_query($con,"select * from user_court where manager_id = '0' and cartid = '$cartid'");
				while($urowtbo=mysqli_fetch_array($uretbo))
				{
				$court_id = $urowtbo['court_id']; 
				$id = $urowtbo[0]; 
				
				$urehid=mysqli_query($con,"select * from court_master where id = '$court_id'");
				$urowhid=mysqli_fetch_array($urehid);
				$manager_id = $urowhid['user_id']; 
				
				$uupQry="UPDATE user_court SET `manager_id` = '$manager_id' WHERE id = '$id'";
				$uuresult=mysqli_query($con,$uupQry);	
				}
			    $uupQry="UPDATE user_court SET user_id='$user_id' where user_id = '0' and cartid = '$cartid'";
				$uuresult=mysqli_query($con,$uupQry);
				?>
              <div class="dz-post-text">
                <style>
.dz-post-text table tbody tr:nth-of-type(odd),
.dz-page-text table tbody tr:nth-of-type(odd),
.wp-block-table tbody tr:nth-of-type(odd) {
  text-align:left; background-color:#f5f5f5 }
.dz-post-text td,
.dz-post-text th,
.dz-page-text td,
.dz-page-text th,
.wp-block-table td,
.wp-block-table th {
  padding: 1px 2px !important;
  border: 0.0625rem solid #e4e4e4;
   }
.dz-post-text td p { margin:0px }
td { text-align:left !important; } 
</style>
                <table border="1" style="width:100%; margin-bottom:10px">
                  <?php 
$ure=mysqli_query($con,"select * from user_court where payment_status = '0' and cartid = '$cartid' and court_date >= '$today_date' group by venue_id order by venue_id asc");
while($urow=mysqli_fetch_array($ure)) { 
$venue_id = $urow['venue_id'];
$master = mysqli_query($con,"SELECT * FROM venue_master WHERE id = '$venue_id'");
$master_detail = mysqli_fetch_array($master); ?>
                  <tr>
                    <td colspan="3"><strong><a href="<?php echo $siteurl_link; ?>/<?php echo $master_detail['seo_url']; ?>"><?php echo $master_detail['name']; ?></a></strong></td>
                  </tr>
                  <?php 
$urec=mysqli_query($con,"select * from user_court where venue_id = '$venue_id' and payment_status = '0' and cartid = '$cartid' and court_date >= '$today_date' group by court_id order by court_id asc");
while($urowc=mysqli_fetch_array($urec)) { 
$court_id = $urowc['court_id'];
$masterc = mysqli_query($con,"SELECT * FROM court_master WHERE id = '$court_id'");
$master_detailc = mysqli_fetch_array($masterc); ?>
                  <tr>
                    <td colspan="3">&nbsp;&nbsp;<a href="court-book.php?id=<?php echo $master_detailc[0]; ?>"><?php echo $master_detailc['name']; ?></a></td>
                  </tr>
                  <?php 
$urecd=mysqli_query($con,"select * from user_court where venue_id = '$venue_id' and court_id = '$court_id' and payment_status = '0' and cartid = '$cartid' and court_date >= '$today_date' group by court_date order by court_date asc");
while($urowcd=mysqli_fetch_array($urecd)) { 
$court_date = $urowcd['court_date'];
?>
                  <tr>
                    <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("d-m-Y", strtotime($urowcd['court_date'])); ?></td>
                  </tr>
                  <?php 
$urecdc=mysqli_query($con,"select * from user_court where venue_id = '$venue_id' and court_id = '$court_id' and payment_status = '0' and cartid = '$cartid' and court_date = '$court_date' order by ABS(id) asc");
while($urowcdc=mysqli_fetch_array($urecdc)) { ?>
                  <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $urowcdc['court_time'];  ?></strong></td>
                    <td><strong>Rs. <?php echo $urowcdc['court_price']; ?></strong></td>
                    <td><a style="padding:0px 5px" href="#" class='btn btn-mini btn-danger' onClick="performDelete('court-payment.php?slot_id=<?php echo $urowcdc[0]; ?>'); return false;">X</a></td>
                  </tr>
                  <?php } } } } ?>
                </table>
                <script>
function performDelete(DestURL) { 
var ok = confirm("Are you sure you want to delete?"); 
if (ok) {location.href = DestURL;} 
return ok; 
} 
</script>
                <?php  
$slot_id = $_GET['slot_id'];
 
if($slot_id)
{
$dusr="delete from user_court where id = '$slot_id'";
$dre=mysqli_query($con,$dusr);
?>
                <script language="javascript">window.location.href="court-payment.php";</script>
                <?php  }  ?>
              </div>
              <ul>
                <?php if($buy_session == 'courtbook') { ?>
                <li>
                  <?php /*?><?php if(isMobileDevice()) { } else { ?>
                  <i class="feather-triangle me-2"></i>
                  <?php } ?><?php */?>
                  <?php 
$uretbo=mysqli_query($con,"select * from user_court where cartid = '$cartid' and court_date >= '$today_date' group by venue_id");
while($urowtbo=mysqli_fetch_array($uretbo))
{
$venue_idx[] = $urowtbo['venue_id']; 
}
$venue_all = "'" . implode("','", $venue_idx) . "'";  
?>
                  <form name="form" method="post">
                    <input type="text" name="couponcode" placeholder='Enter Coupon Code' value="<?php echo $_SESSION['couponcode_entered']; ?>"  style="font-size:12px; padding:10px 10px;">
                    <input type="submit" value="Submit" name="submit_coupon" class="btn btn-primary btn-mini" style="padding:8px 15px; display:inline">
                    <?php $couponcode_entered = $_SESSION['couponcode_entered'];  if($couponcode_entered != '') { ?>
                    <input type="submit" value="Remove" name="remove_coupon" class="btn btn-danger btn-mini" style="padding:8px 15px; display:inline; margin-left:10px;">
                    <?php } ?>
                    <?php 
					$ure1=("select * from promocode_venue where venue_id IN ($venue_all) group by promo_id");
					$uree1 = mysqli_query($con,$ure1);
					$urowno1=mysqli_num_rows($uree1);

					$ure2=("select * from promocode_customer where customer_id = '$user_id'");
					$uree2 = mysqli_query($con,$ure2);
					$urowno2=mysqli_num_rows($uree2);
					if($urowno1 > 0 || $urowno2 > 0) { ?>
                    <br/>
                    <br/>
                    Available PromoCodes :
                    <?php while($urow=mysqli_fetch_array($uree1)) {	?>
                    <a href="javascript:void(0);" data-toggle="tooltip" class="tooltipt2"><b style="background-color:#097E52; color:#FFFFFF; border-radius:10px; padding:3px 7px; margin-right:5px;"><?php echo $promo_code = $urow['promo_code']; ?></b> <span> <strong>
                    <table border="0">
                    <?php $promo_id = $urow['promo_id'];
					$urexy=mysqli_query($con,"select * from promocode_master where id = '$promo_id'");
					$urowx=mysqli_fetch_array($urexy); ?>
                      <tr>
                        <td>Discount</td>
                        <td><?php $discount_per = $urowx['discount_per']; $discount_rs = $urowx['discount_rs']; 
	if($discount_per != '0') { echo $discount_per; echo '&nbsp;%'; } else { echo 'Rs.&nbsp;'; echo $discount_rs; } ?></td>
                      </tr>
                      <tr>
                        <td>Min Cart Value&nbsp;&nbsp;</td>
                        <td>Rs. <?php echo $urowx['discount_minvalue']; ?></td>
                      </tr>
                      <tr>
                        <td>Max Discount</td>
                        <td>Rs. <?php echo $urowx['discount_maximum']; ?></td>
                      </tr>
                    </table>
                    </strong> </span> </a>
                    <?php } ?>

					<?php while($urow=mysqli_fetch_array($uree2)) {	?>
                    <a href="javascript:void(0);" data-toggle="tooltip" class="tooltipt2"><b style="background-color:#097E52; color:#FFFFFF; border-radius:10px; padding:3px 7px; margin-right:5px;"><?php echo $promo_code = $urow['promo_code']; ?></b> <span> <strong>
                    <table border="0">
                    <?php $promo_id = $urow['promo_id'];
					$urexy=mysqli_query($con,"select * from promocode_master where id = '$promo_id'");
					$urowx=mysqli_fetch_array($urexy); ?>
                      <tr>
                        <td>Discount</td>
                        <td><?php $discount_per = $urowx['discount_per']; $discount_rs = $urowx['discount_rs']; 
	if($discount_per != '0') { echo $discount_per; echo '&nbsp;%'; } else { echo 'Rs.&nbsp;'; echo $discount_rs; } ?></td>
                      </tr>
                      <tr>
                        <td>Min Cart Value&nbsp;&nbsp;</td>
                        <td>Rs. <?php echo $urowx['discount_minvalue']; ?></td>
                      </tr>
                      <tr>
                        <td>Max Discount</td>
                        <td>Rs. <?php echo $urowx['discount_maximum']; ?></td>
                      </tr>
                    </table>
                    </strong> </span> </a>
                    <?php } ?>  
                    <?php } ?>  
                  </form>
                  <?php 

if ($_POST['submit_coupon']) 
{
$couponcode = $_REQUEST['couponcode'];
$ure1=("select * from promocode_venue where promo_code = '$couponcode' and venue_id IN ($venue_all)");
$uree1 = mysqli_query($con,$ure1);
$urowno1=mysqli_num_rows($uree1);

$ure11=("select * from promocode_customer where customer_id = '$user_id' and promo_code = '$couponcode'");
$uree11 = mysqli_query($con,$ure11);
$urowno11=mysqli_num_rows($uree11);

$ure2=("select * from promocode_master where name = '$couponcode' and discount_start <= '$today_date' and discount_end >= '$today_date'");
$uree2 = mysqli_query($con,$ure2);
$urowno2=mysqli_num_rows($uree2);
if($urowno1 == '0' || $urowno2 == '0' || $urowno11 == '0') 
{ ?>
<script>alert('Coupon Code Invalid. Please Change');</script>
<script language="javascript">window.location.href="court-payment.php";</script>
<?php } else { 
$urow=mysqli_fetch_array($uree2);
$discount_per = $urow['discount_per']; 
$discount_rs = $urow['discount_rs']; 
$discount_minvalue = $urow['discount_minvalue']; 
$discount_maximum = $urow['discount_maximum']; 
$venue = explode('@',$urow['venue']);   $venue_promo = "'" . implode("','", $venue) . "'";
$urexy=mysqli_query($con,"select SUM(court_price) from user_court where user_id = '$user_id' and cartid = '$cartid' and court_date >= '$today_date' and venue_id IN ($venue_promo)");
$urowx=mysqli_fetch_array($urexy);
$court_price = $urowx['SUM(court_price)'];
if($court_price < $discount_minvalue)
{ ?>
                  <script>alert('Minimum Cart Value is <?php echo $discount_minvalue; ?>');</script>
                  <script language="javascript">window.location.href="court-payment.php";</script>
                  <?php } else { 
if($discount_per != '0')
{
$c1 = $court_price * $discount_per; $c2 = $c1 / 100; $c3 = ceil($c2); 
}
if($discount_rs != '0')
{
$c1 = $discount_rs; $c3 = ceil($c1); 
}
if($discount_maximum <= $c3) { echo $final_discount = $discount_maximum; } else { echo $final_discount = $c3; }
$_SESSION['couponcode_price'] = $final_discount; 
$_SESSION['couponcode_entered'] = $couponcode; 

//exit();
?>
                  <script language="javascript">window.location.href="court-payment.php";</script>
                  <?php 
} }  }
?>
                  <?php 
if ($_POST['remove_coupon']) 
{
unset($_SESSION['couponcode_price']); 
unset($_SESSION['couponcode_entered'])
?>
                  <script language="javascript">window.location.href="court-payment.php";</script>
                  <?php 
} ?>
                </li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-12 col-lg-5">
            <aside class="card payment-modes">
              <h3 class="border-bottom">Checkout</h3>
              <h6 class="mb-3">Select Payment Method</h6>
              <ul class="order-sub-total">
                <li>
                  <p>Sub Total</p>
                  <h6>Rs
                    <?php 
				   
				  $urexy=mysqli_query($con,"select SUM(court_price) from user_court where user_id = '$user_id' and payment_status = '0' and cartid = '$cartid' and court_date >= '$today_date'");
				  $urowx=mysqli_fetch_array($urexy);
				  echo $court_price = $urowx['SUM(court_price)'];
				  ?>
                  </h6>
                </li>
                <?php 
				$couponcode_entered = $_SESSION['couponcode_entered']; 
				$couponcode_price = $_SESSION['couponcode_price'];
				if($couponcode_entered != '') { ?>
                <li>
                  <p>Discount (<?php echo $couponcode_entered; ?>)</p>
                  <h6>Rs <?php echo $couponcode_price; ?></h6>
                </li>
                <?php }  $total_amt = $court_price - $couponcode_price; ?>
                <li>
                  <p> <a href="javascript:void(0);" data-toggle="tooltip" class="tooltipt1">GST & Other Charges <span> <strong>
                    <?php								 
			    $ure=mysqli_query($con,"select * from charges_master where status = '1' and ins_type = 'Booking' limit 0,1");
				$nox = mysqli_num_rows($ure);
				if($nox != '0') {
				$urow=mysqli_fetch_array($ure); ?>
                    <?php echo $urow['title1']; ?> :  Rs
                    <?php $ch1 = $urow['title2'];  $c11 = $total_amt * $ch1; $c12 = $c11 / 100; echo $c13 = round($c12,2); ?>
                    <br/>
                    <?php } ?>
                    <?php								 
			    $ure=mysqli_query($con,"select * from charges_master where status = '1' and ins_type = 'Booking' limit 1,1");
				$nox = mysqli_num_rows($ure);
				if($nox != '0') {
				$urow=mysqli_fetch_array($ure); ?>
                    <?php echo $urow['title1']; ?> :  Rs
                    <?php $ch2 = $urow['title2'];  $c21 = $total_amt * $ch2; $c22 = $c21 / 100; echo $c23 = round($c22,2); ?>
                    <br/>
                    <?php } ?>
                    <?php								 
			    $ure=mysqli_query($con,"select * from charges_master where status = '1' and ins_type = 'Booking' limit 2,1");
				$nox = mysqli_num_rows($ure);
				if($nox != '0') {
				$urow=mysqli_fetch_array($ure); ?>
                    <?php echo $urow['title1']; ?> :  Rs
                    <?php $ch3 = $urow['title2'];  $c31 = $total_amt * $ch3; $c32 = $c31 / 100; echo $c33 = round($c32,2); ?>
                    <br/>
                    <?php } ?>
                    </strong></span> </a> </p>
                  <h6>Rs <?php echo $c13 + $c23 + $c33; ?> </h6>
                </li>
              </ul>
              <div class="order-total d-flex justify-content-between align-items-center">
                <h5>Order Total</h5>
                <h5>Rs
                  <?php if($buy_session == 'courtbook') { $c1 = $total_amt + $c13 + $c23 + $c33; echo $final_amt = ceil($c1); } else { echo $final_amt = '0'; }  ?>
                  <?php $uupQry=mysqli_query($con,"UPDATE user_order SET total_amount='$court_price',couponcode_entered='$couponcode_entered',couponcode_price='$couponcode_price',final_amount='$final_amt',charge1='$c13',charge2='$c23',charge3='$c33' WHERE user_id='$user_id' and payment_status = '0' and cartid = '$cartid'"); ?>
                </h5>
              </div>
              <div class="d-grid btn-block">
                <div align="center" <?php if($buy_session == 'membership') { ?> style="display:none" <?php } ?>>
                  <style>
.razorpay-payment-button
{   
	position: relative;
    display: inline-block;
    overflow: hidden;
    font-size: 17px;
    line-height: 25px;
    font-family: 'Work Sans', sans-serif;
    font-weight: 500;
    color: #fff !important;
    text-align: center;
    padding: 17.5px 41.5px;
    border-radius: 4px;
    z-index: 1;
    box-shadow: 0px 15px 25px 0px rgb(255 124 91 / 30%);
    transition: all 500ms ease;
	background: #061a3a;
}
</style>
                  <?php 
$total_amount = $final_amt; 
$sqll = mysqli_query($con,"SELECT * FROM user_master WHERE id='$user_id'");
$rse = mysqli_fetch_array($sqll);
$name = $rse['name'];
$contactno = $rse['contact1'];
$email = $rse['email1'];
$orderid = $rse[0];
?>
                  <?php 
$sqllr = mysqli_query($con,"SELECT * FROM api_email WHERE ins_type='Razorpay'");
$rser = mysqli_fetch_array($sqllr);
$keyId = $rser['title1'];
$keySecret = $rser['title2'];
$displayCurrency = 'INR';

require __DIR__ . '/vendor/autoload.php';
session_start();
// Create the Razorpay Order
use Razorpay\Api\Api;
$api = new Api($keyId, $keySecret);
//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => 'receipt_' . time(),
    'amount'          => $total_amount * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];
$razorpayOrder = $api->order->create($orderData);
$razorpayOrderId = $razorpayOrder['id'];
$_SESSION['razorpay_order_id'] = $razorpayOrderId;
$uupQry=mysqli_query($con,"UPDATE user_order SET order_id='$razorpayOrderId'  WHERE user_id='$user_id' and payment_status = '0' and cartid = '$cartid'");
$uupQry=mysqli_query($con,"UPDATE user_court SET order_id='$razorpayOrderId',ref_orderid='$ref_orderid'  WHERE user_id='$user_id' and payment_status = '0' and cartid = '$cartid'");
$displayAmount = $amount = $orderData['amount'];
/*if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);
    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}
*/
$checkout = 'manual';
$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => "Dplays",
    "description"       => "Dplays",
    "image"             => "".$siteurl_link."/images/499170logo.png",
    "prefill"           => [
    "name"              => "".$name."",
    "email"             => "".$email."",
    "contact"           => "".$contactno."",
    ],
    "notes"             => [
    "address"           => "Hello World",
    "merchant_order_id" => "12312321",
    ],
    "theme"             => [
    "color"             => "#004AAD"
    ],
    "order_id"          => $razorpayOrderId,
];
if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}
$json = json_encode($data);
require("checkout1/{$checkout}.php"); 
?>
                  <style>
.razorpay-payment-button
{   
	/*position: relative;
    display: inline-block;
    overflow: hidden;
    font-size: 17px;
    line-height: 25px;
    font-family: 'Work Sans', sans-serif;
    font-weight: 500;
    color: #fff !important;
    text-align: center;
    padding: 17.5px 41.5px;
    border-radius: 4px;
    z-index: 1;
    box-shadow: 0px 15px 25px 0px rgb(255 124 91 / 30%);
    transition: all 500ms ease;
	background: #061a3a;*/
	padding:10px 20px;
	color:#FFFFFF;
	background-color:#0052a4;
	border:none
}
</style>
                </div>
                <form name="form" method="post" style="margin-top:10px; <?php if($buy_session == 'courtbook') { ?> display:none; <?php } ?>">
                  <center>
                    <input type="submit" name="make_payment" class="btn btn-primary" value="Confirm Booking">
                  </center>
                </form>
                <?php 
if(isset($_REQUEST['make_payment'])) 
{
	$uupQry="UPDATE user_court SET payment_status='1' WHERE user_id='$user_id' and payment_status = '0' and cartid = '$cartid'";
	$uuresult=mysqli_query($con,$uupQry);
	
	if($buy_session == 'membership')
	{
	$uupQry="UPDATE user_court SET membership_package='$membership_id_session' WHERE user_id='$user_id' and payment_status = '0' and cartid = '$cartid'";
	$uuresult=mysqli_query($con,$uupQry);
	$uupQry="UPDATE user_membership SET booking_status='1' WHERE id='$membership_id_session'";
	$uuresult=mysqli_query($con,$uupQry);
	}
	unset($_SESSION['cartid']);
	unset($_SESSION['buy_session']);
	?>
                <script>alert('Thank you, Your Payment Sucessfully Received');</script>
                <script language="javascript">window.location.href="index.php";</script>
                <?php  } ?>
              </div>
            </aside>
          </div>
        </div>
      </section>
    </div>
    <!-- Container -->
  </div>
  <?php //} ?>
  <!-- /Page Content -->
  <!-- Footer -->
  <?php include 'footer.php' ?>
  <!-- /Footer -->
</div>
<!-- /Main Wrapper -->
<!-- Booking Confirmed Modal -->
<!-- /Booking Confirmed Modal -->
<!-- jQuery -->
<script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="assets/js/jquery-3.7.1.min.js" type="de1784ce6b9aa1109747be34-text/javascript"></script>
<!-- Bootstrap Core JS -->
<script src="assets/js/bootstrap.bundle.min.js" type="de1784ce6b9aa1109747be34-text/javascript"></script>
<!-- Select JS -->
<script src="assets/plugins/select2/js/select2.min.js" type="de1784ce6b9aa1109747be34-text/javascript"></script>
<!-- Custom JS -->
<script src="assets/js/script.js" type="de1784ce6b9aa1109747be34-text/javascript"></script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="de1784ce6b9aa1109747be34-|49" defer></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"93b858e86c98a8b0","version":"2025.4.0-1-g37f21b1","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>
</html>
