<?php  error_reporting(0); session_start(); include('config.php'); $cartid = $_SESSION['cartid']; ?>
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
$seo1 = mysqli_query($con,"SELECT * FROM seo_master WHERE page_name = 'Event Payment'");
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
<script language="javascript" type="text/javascript">  
function get0(nm,str)
{
	if (window.XMLHttpRequest)
  	{// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}
	else
  	{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	
	xmlhttp.open("GET","event-payment-accessories.php?checktbl="+nm+"&id="+str,true);
	xmlhttp.send();	
}
</script>
<script language="javascript" type="text/javascript">  
function get1(nm,str)
{
	if (window.XMLHttpRequest)
  	{// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}
	else
  	{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	
	xmlhttp.open("GET","event-payment-labledata.php?checktbl="+nm+"&id="+str,true);
	xmlhttp.send();	
}
</script>	
</head>
<body>
<!-- Main Wrapper -->
<div class="main-wrapper coach">
  <!-- Header -->
  <?php include 'header.php' ?>
  <div class="breadcrumb mb-0"> <span class="primary-right-round"></span>
    <div class="container">
      <h1 class="text-white">Event Payment</h1>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li>Event Payment</li>
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
		  $uretbo=mysqli_query($con,"select * from user_order where payment_status = '0' and cartid = '$cartid'");
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
			    $uretbo=mysqli_query($con,"select * from user_order where payment_status = '0' and cartid = '$cartid' order by ABS(id) desc");
				$urowtbono=mysqli_num_rows($uretbo);
				$urowtbo=mysqli_fetch_array($uretbo);
				$ref_orderid = $urowtbo[0];
				$event_id = $urowtbo['event_id'];
				$event_book_id = $urowtbo['event_book_id'];
				$accessories = $urowtbo['accessories'];
				?>
              <div class="dz-post-text">
                <style>
.service-content { background-color:#f5f5f5; padding:10px; border-radius:10px; width:100%; margin-bottom:10px; } 
</style>
                <?php
				$ureb=mysqli_query($con,"select * from event_master where id = '$event_id'");
				$master_detail=mysqli_fetch_array($ureb); $accessories_id = $master_detail['accessories_id']; ?>
                <div class="row">
                  <div class="col-lg-6 col-md-6 d-flex">
                    <div class="service-content">
                      <h4>Event Name</h4>
                      <h6><?php echo $master_detail['name']; ?></h6>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 d-flex">
                    <div class="service-content">
                      <h4>Event Dates</h4>
                      <h6><?php echo date("d-m-Y", strtotime($master_detail['start_datetime'])); ?> To <?php echo date("d-m-Y", strtotime($master_detail['end_datetime'])); ?></h6>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <?php 
					$ureb=mysqli_query($con,"select * from event_data where id = '$event_book_id'");
					$urowb=mysqli_fetch_array($ureb); $event_fees = $urowb['data_fees']; ?>
                  <div class="col-lg-12 col-md-12 d-flex">
                    <div class="service-content">
                      <h3><?php echo $urowb['data_title']; ?></h3>
                      <h6><?php echo $urowb['data_description']; ?></h6>
                      <h6 style="margin-top:10px;">Max Player : <?php echo $urowb['data_max_player']; ?></h6>
                    </div>
                  </div>
                </div>
                <?php $accessories_ids = explode('@',$urowb['accessories_id']); $ids = "'" . implode("','", $accessories_ids) . "'";  ?>
                <?php			
					$ureb=mysqli_query($con,"select * from event_accessories where id IN ($ids)");
					$ureb_no = mysqli_num_rows($ureb);
					if($ureb_no > 0) { ?>
                <div class="row">
                  <?php	while($urowb=mysqli_fetch_array($ureb)) { ?>
                  <?php $qty = $_GET['qty']; for($j=1;$j<=$qty;$j++) { ?>
                  <div class="col-lg-12 col-md-12 d-flex">
                    <div class="service-content">
                      <h3><?php echo $j; ?>. <?php echo $urowb['name']; $aid = $urowb[0]; ?></h3>
                      <select name="accessories" class="form-control" style="margin-bottom:5px;" onChange="get0('<?php echo $ref_orderid; ?>@<?php echo $aid; ?>@<?php echo $j; ?>',this.value);">
                        <option value="">Please Select</option>
                        <?php 
							$coun=mysqli_query($con,"select * from event_accessories where ref_id = '$aid' order by ABS(id) asc");
							while($Fcoun=mysqli_fetch_array($coun)) 
							{ 
							$event_accessories_id = $Fcoun[0];
							$ureba=mysqli_query($con,"select * from user_order_accessories where order_id = '$ref_orderid' and event_accessories_id = '$event_accessories_id' and event_qty = '$j'");
							$ureb_noa = mysqli_num_rows($ureba); ?>
                        <option value="<?php echo $Fcoun[0]; ?>" <?php if($ureb_noa > '0') echo 'selected="selected"';?>><?php echo $Fcoun['accessories']; ?></option>
                        <?php } ?>
                      </select>
                      <h6><?php echo $urowb['small_des']; ?></h6>
						<?php
$urebc=mysqli_query($con,"select * from event_lable where event_id = '$event_id'");
$ureb_noc = mysqli_num_rows($urebc);
if($ureb_noc > 0) { ?>
<div class="row">
  <?php	while($urowbc=mysqli_fetch_array($urebc)) { ?>
  <div class="col-lg-3 col-md-3 d-flex">
    <div class="service-content">
      <h6><?php echo $lable_title = $urowbc['lable_title']; ?></h6>
      <input name="lable_data" class="form-control" onChange="get1('<?php echo $ref_orderid; ?>@<?php echo $lable_title; ?>@<?php echo $j; ?>',this.value);">
    </div>
  </div>
  <?php } ?>
</div>
<?php } ?>

                    </div>
                  </div>
                  <?php } } ?>
                </div>
                <?php } ?>
              </div>
              <a style="padding:0px 5px" href="#" class='btn btn-mini btn-danger' onClick="performDelete('event-payment.php?delid=<?php echo $ref_orderid; ?>'); return false;">Delete Event X</a>
              <script>
function performDelete(DestURL) { 
var ok = confirm("Are you sure you want to delete?"); 
if (ok) {location.href = DestURL;} 
return ok; 
} 
</script>
              <?php  
$delid = $_GET['delid'];
 
if($delid)
{
$dusr="delete from user_order where id = '$delid'";
$dre=mysqli_query($con,$dusr);

$dusr="delete from user_order_accessories where order_id = '$delid'";
$dre=mysqli_query($con,$dusr);
?>
              <script language="javascript">window.location.href="dplay-events.php";</script>
              <?php  }  ?>
              
              <ul style="margin-top:15px;">
                <li>
                  <?php /*?><?php if(isMobileDevice()) { } else { ?>
                  <i class="feather-triangle me-2"></i>
                  <?php } ?><?php */?>
                  <?php 
$uretbo=mysqli_query($con,"select * from user_order where cartid = '$cartid' and payment_status = '0'");
while($urowtbo=mysqli_fetch_array($uretbo))
{
$event_idx[] = $urowtbo['event_id']; 
}
$event_all = "'" . implode("','", $event_idx) . "'";  
?>
                  <form name="form" method="post">
                    <input type="text" name="couponcode" placeholder='Enter Coupon Code' value="<?php echo $_SESSION['couponcode_entered']; ?>"  style="font-size:12px; padding:10px 10px;">
                    <input type="submit" value="Submit" name="submit_coupon" class="btn btn-primary btn-mini" style="padding:8px 15px; display:inline">
                    <?php $couponcode_entered = $_SESSION['couponcode_entered'];  if($couponcode_entered != '') { ?>
                    <input type="submit" value="Remove" name="remove_coupon" class="btn btn-danger btn-mini" style="padding:8px 15px; display:inline; margin-left:10px;">
                    <?php } ?>
                    <?php 
					$ure1=("select * from promocode_event where event_id IN ($event_all) group by promo_id");
					$uree1 = mysqli_query($con,$ure1);
					$urowno1=mysqli_num_rows($uree1);
					if($urowno1 > 0) { ?>
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
                    <?php } } ?>
                  </form>
                  <?php 

if ($_POST['submit_coupon']) 
{
$couponcode = $_REQUEST['couponcode'];
$ure1=("select * from promocode_event where promo_code = '$couponcode' and event_id IN ($event_all)");
$uree1 = mysqli_query($con,$ure1);
$urowno1=mysqli_num_rows($uree1);
$ure2=("select * from promocode_master where name = '$couponcode' and discount_start <= '$today_date' and discount_end >= '$today_date'");
$uree2 = mysqli_query($con,$ure2);
$urowno2=mysqli_num_rows($uree2);
if($urowno1 == '0' || $urowno2 == '0') 
{ ?>
                  <script>alert('Coupon Code Invalid. Please Change');</script>
                  <script language="javascript">window.location.href="event-payment.php?id=<?php echo $_GET['id']; ?>&qty=<?php echo $_GET['qty']; ?>";</script>
                  <?php } else { 
$urow=mysqli_fetch_array($uree2);
$discount_per = $urow['discount_per']; 
$discount_rs = $urow['discount_rs']; 
$discount_minvalue = $urow['discount_minvalue']; 
$discount_maximum = $urow['discount_maximum']; 
$urexy=mysqli_query($con,"select SUM(total_amount) from user_order where user_id = '$user_id' and cartid = '$cartid' and payment_status = '0'");
$urowx=mysqli_fetch_array($urexy);
$court_price = $urowx['SUM(total_amount)'];
if($court_price <= $discount_minvalue)
{ ?>
                  <script>alert('Minimum Cart Value is <?php echo $discount_minvalue; ?>');</script>
                  <script language="javascript">window.location.href="event-payment.php?id=<?php echo $_GET['id']; ?>&qty=<?php echo $_GET['qty']; ?>";</script>
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
                  <script language="javascript">window.location.href="event-payment.php?id=<?php echo $_GET['id']; ?>&qty=<?php echo $_GET['qty']; ?>";</script>
                  <?php 
} }  }
?>
                  <?php 
if ($_POST['remove_coupon']) 
{
unset($_SESSION['couponcode_price']); 
unset($_SESSION['couponcode_entered'])
?>
                  <script language="javascript">window.location.href="event-payment.php?id=<?php echo $_GET['id']; ?>&qty=<?php echo $_GET['qty']; ?>";</script>
                  <?php 
} ?>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-12 col-lg-5">
            <aside class="card payment-modes">
              <h3 class="border-bottom">Checkout</h3>
              <h6 class="mb-3">Select Payment Method</h6>
              <ul class="order-sub-total">
                <li>
                  <p>No of Person</p>
                  <h6>
                    <select id="selectProductSort" class="selectProductSort form-control" onChange="window.location = this.options[this.selectedIndex].value;">
                      <?php for($i=1;$i<=10;$i++) { ?>
                      <option value="event-payment.php?id=<?php echo $_GET['id']; ?>&qty=<?php echo $i; ?>" <?php if($_GET['qty'] == $i) echo 'selected="selected"';?>><?php echo $i; ?></option>
                      <?php } ?>
                    </select>
                  </h6>
                </li>
                <li>
                  <p>Sub Total</p>
                  <h6>Rs
                    <?php 
				  $final_amountx = $event_fees;
				  $qty = $_GET['qty'];
				  echo $final_amount = $final_amountx * $qty; $total_amount = $final_amountx * $qty;
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
                <?php }  $total_amt = $final_amount - $couponcode_price; ?>
                
                <li>
                  <p> <a href="javascript:void(0);" data-toggle="tooltip" class="tooltipt1">GST & Other Charges <span> <strong>
                    <?php								 
			    $ure=mysqli_query($con,"select * from charges_master where status = '1' and ins_type = 'Event' limit 0,1");
				$nox = mysqli_num_rows($ure);
				if($nox != '0') {
				$urow=mysqli_fetch_array($ure); ?>
                    <?php echo $urow['title1']; ?> :  Rs
                    <?php $ch1 = $urow['title2'];  $c11 = $total_amt * $ch1; $c12 = $c11 / 100; echo $c13 = round($c12,2); ?>
                    <br/>
                    <?php } ?>
                    <?php								 
			    $ure=mysqli_query($con,"select * from charges_master where status = '1' and ins_type = 'Event' limit 1,1");
				$nox = mysqli_num_rows($ure);
				if($nox != '0') {
				$urow=mysqli_fetch_array($ure); ?>
                    <?php echo $urow['title1']; ?> :  Rs
                    <?php $ch2 = $urow['title2'];  $c21 = $total_amt * $ch2; $c22 = $c21 / 100; echo $c23 = round($c22,2); ?>
                    <br/>
                    <?php } ?>
                    <?php								 
			    $ure=mysqli_query($con,"select * from charges_master where status = '1' and ins_type = 'Event' limit 2,1");
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
                  <?php $c1 = $final_amount - $couponcode_price + $c13 + $c23 + $c33; echo $final_amt = ceil($c1);  ?>
                  <?php $uupQry=mysqli_query($con,"UPDATE user_order SET total_amount='$total_amount',final_amount='$final_amt',charge1='$c13',charge2='$c23',charge3='$c33',event_qty='$qty',couponcode_entered='$couponcode_entered',couponcode_price='$couponcode_price' WHERE user_id='$user_id' and payment_status = '0' and cartid = '$cartid'"); ?>
                </h5>
              </div>
              <div class="d-grid btn-block">
                <div align="center">
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

$uupQry=mysqli_query($con,"UPDATE user_order SET order_id='$razorpayOrderId'  WHERE user_id = '$user_id' and payment_status = '0' and cartid = '$cartid' and order_type = 'eventbook'");

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
require("checkout5/{$checkout}.php"); 
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
