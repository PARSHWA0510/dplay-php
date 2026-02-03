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
$seo1 = mysqli_query($con,"SELECT * FROM seo_master WHERE page_name = 'Court Refund'");
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
      <h1 class="text-white">Court Refund</h1>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li>Court Refund</li>
      </ul>
    </div>
  </div>
  <!-- /Breadcrumb -->
  <!-- Page Content -->
  <div class="content">
    <div class="container">
      <section>
        <div class="text-center mb-40">
          <h3 class="mb-1">Court Refund</h3>
          <p class="sub-title">Securely make your refund for the booking. Contact support for assistance.</p>
        </div>
        <div class="row checkout">
          <div class="col-12 col-sm-12 col-md-12 col-lg-7">
            <div class="card booking-details">
              <h3 class="border-bottom">Order Summary</h3>
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
                  <?php $id = $_GET['id'];
$ure=mysqli_query($con,"select * from user_court where id = '$id' group by venue_id order by venue_id asc");
while($urow=mysqli_fetch_array($ure)) { 
$venue_id = $urow['venue_id'];
$master = mysqli_query($con,"SELECT * FROM venue_master WHERE id = '$venue_id'");
$master_detail = mysqli_fetch_array($master); ?>
                  <tr>
                    <td colspan="3"><strong><a href="<?php echo $siteurl_link; ?>/<?php echo $master_detail['seo_url']; ?>"><?php echo $master_detail['name']; ?></a></strong></td>
                  </tr>
                  <?php 
$urec=mysqli_query($con,"select * from user_court where venue_id = '$venue_id' and id = '$id' group by court_id order by court_id asc");
while($urowc=mysqli_fetch_array($urec)) { 
$court_id = $urowc['court_id'];
$masterc = mysqli_query($con,"SELECT * FROM court_master WHERE id = '$court_id'");
$master_detailc = mysqli_fetch_array($masterc); ?>
                  <tr>
                    <td colspan="3">&nbsp;&nbsp;<a href="court-book.php?id=<?php echo $master_detailc[0]; ?>"><?php echo $master_detailc['name']; ?></a></td>
                  </tr>
                  <?php 
$urecd=mysqli_query($con,"select * from user_court where venue_id = '$venue_id' and court_id = '$court_id' and id = '$id' group by court_date order by court_date asc");
while($urowcd=mysqli_fetch_array($urecd)) { 
$court_date = $urowcd['court_date'];
?>
                  <tr>
                    <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("d-m-Y", strtotime($urowcd['court_date'])); ?></td>
                  </tr>
                  <?php 
$urecdc=mysqli_query($con,"select * from user_court where venue_id = '$venue_id' and court_id = '$court_id' and court_date = '$court_date' and id = '$id' order by ABS(id) asc");
while($urowcdc=mysqli_fetch_array($urecdc)) { ?>
                  <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $urowcdc['court_time'];  ?></strong></td>
                    <td><strong>Rs. <?php echo $urowcdc['court_price']; ?></strong></td>
                  </tr>
                  <?php } } } } ?>
                </table>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-12 col-lg-5">
            <aside class="card payment-modes">
              <h3 class="border-bottom">Payment Summary</h3>
              <ul class="order-sub-total">
                <li>
                  <p>Total Amount</p>
                  <h6>Rs
                    <?php 
				  $urexy=mysqli_query($con,"select * from user_court where id = '$id'");
				  $urowx=mysqli_fetch_array($urexy);
				  echo $court_price = $urowx['court_price']; $court_time = $urowx['court_time']; $court_date = $urowx['court_date'];
				  ?>
                  </h6>
                </li>
                <li>
                  <p>Refund Amount</p>
                  <h6>Rs
                    <?php  $datetime1 = new DateTime(); 
				  $court_time_first = substr($court_time, 0, 5); 
				  $datetime2 = new DateTime("".$court_date." ".$court_time_first.":00");

						// Calculate difference
				  $interval = $datetime1->diff($datetime2);
						
						// Total hours (including days converted to hours)
				  $totalHours = ($interval->days * 24) + $interval->h + ($interval->i / 60);
				  
				  if($totalHours > '24' && $totalHours < '48')
				  {  $ra1 = $court_price * 50; $ra2 = $ra1 / 100; echo $refund_amt = ceil($court_price - $ra2); }
				  
				  if($totalHours > '48')
				  {  echo $refund_amt = ceil($court_price); }
				  
				  ?>
                  </h6>
                </li>
              </ul>
              <div class="order-total d-flex justify-content-between align-items-center">
                <h5>Total Refund Amount</h5>
                <h5>Rs <?php echo $refund_amt; ?> </h5>
              </div>
              <div class="d-grid btn-block">
                <div align="center"> </div>
                <form name="form" method="post" style="margin-top:10px;">
                  <center>
                    <input type="submit" name="initiate_refund" class="btn btn-primary" value="Initiate Refund">
                  </center>
                </form>
                <?php 
if(isset($_REQUEST['initiate_refund'])) 
{
$urexy=mysqli_query($con,"select * from user_court where id = '$id'");
$urowx=mysqli_fetch_array($urexy);
$venue_id = $urowx['venue_id']; 
$user_id = $urowx['user_id']; 
$court_date = $urowx['court_date'];
$court_time = $urowx['court_time']; 
$order_no = $urowx['order_no']; 
$order_datetime = $urowx['order_datetime']; 
$court_id = $urowx['court_id']; 
$slot_id = $urowx['slot_id']; 
$cartid = $urowx['cartid']; 
$order_id = $urowx['order_id']; 
$razorpay_payment_id = $urowx['razorpay_payment_id']; 
$razorpay_signature = $urowx['razorpay_signature']; 
$manager_id = $urowx['manager_id']; 

$sql=("INSERT INTO `user_court_refund` (`venue_id`,`user_id`, `court_date`,`court_time`,`court_price`, `order_no`, `order_datetime`, `court_id`, `slot_id`, `cartid`, `order_id`, `razorpay_payment_id`, `razorpay_signature`, `refund_amount`, `manager_id`) VALUES ('$venue_id','$user_id','$court_date','$court_time','$court_price','$order_no','$order_datetime','$court_id','$slot_id','$cartid','$order_id','$razorpay_payment_id','$razorpay_signature','$refund_amt','$manager_id')");	
$z = mysqli_query($con,$sql);

//$delete = mysqli_query($con,"DELETE FROM user_court WHERE id = '$id'");

	?>
                <script>alert('Thank You for chossing Dplay. We have got your request for cancellation. Refund amount will credit in your account in 3-6 working days.');</script>
                <script language="javascript">window.location.href="my-court.php";</script>
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
