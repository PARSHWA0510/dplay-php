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
      <h1 class="text-white">Payment Status</h1>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li>Payment Status</li>
      </ul>
    </div>
  </div>
  <!-- /Breadcrumb -->
  <!-- Page Content -->
  
  <div class="content">
    <div class="container">
      <section>
        <div class="text-center mb-40">
          <h3 class="mb-1">Payment Successfully Done!</h3>
          <p class="sub-title">Securely make your payment for the booking. Contact support for assistance.</p>
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
                  <?php  $order_id = $_GET['order_id'];
$ure=mysqli_query($con,"select * from user_court where order_id = '$order_id' group by venue_id order by venue_id asc");
while($urow=mysqli_fetch_array($ure)) { 
$venue_id = $urow['venue_id'];
$master = mysqli_query($con,"SELECT * FROM venue_master WHERE id = '$venue_id'");
$master_detail = mysqli_fetch_array($master); ?>
                  <tr>
                    <td colspan="3"><strong><a href="<?php echo $siteurl_link; ?>/<?php echo $master_detail['seo_url']; ?>"><?php echo $master_detail['name']; ?></a></strong></td>
                  </tr>
                  <?php 
$urec=mysqli_query($con,"select * from user_court where venue_id = '$venue_id' and order_id = '$order_id' group by court_id order by court_id asc");
while($urowc=mysqli_fetch_array($urec)) { 
$court_id = $urowc['court_id'];
$masterc = mysqli_query($con,"SELECT * FROM court_master WHERE id = '$court_id'");
$master_detailc = mysqli_fetch_array($masterc); ?>
                  <tr>
                    <td colspan="3">&nbsp;&nbsp;<a href="court-book.php?id=<?php echo $master_detailc[0]; ?>"><?php echo $master_detailc['name']; ?></a></td>
                  </tr>
                  <?php 
$urecd=mysqli_query($con,"select * from user_court where venue_id = '$venue_id' and court_id = '$court_id' and order_id = '$order_id' group by court_date order by court_date asc");
while($urowcd=mysqli_fetch_array($urecd)) { 
$court_date = $urowcd['court_date'];
?>
                  <tr>
                    <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("d-m-Y", strtotime($urowcd['court_date'])); ?></td>
                  </tr>
                  <?php 
$urecdc=mysqli_query($con,"select * from user_court where venue_id = '$venue_id' and court_id = '$court_id' and order_id = '$order_id' and court_date = '$court_date' order by ABS(id) asc");
while($urowcdc=mysqli_fetch_array($urecdc)) { ?>
                  <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $urowcdc['court_time'];  ?></strong></td>
                    <td><strong>Rs. <?php echo $urowcdc['court_price']; ?></strong></td>
                    <td></td>
                  </tr>
                  <?php } } } } ?>
                </table>
               
              </div>
               
            </div>
          </div> <div class="col-12 col-sm-12 col-md-12 col-lg-5">
            <aside class="card payment-modes">
              <h3 class="border-bottom">Payment Summary</h3>
              <ul class="order-sub-total">
                <li>
                  <p>Sub total</p>
                  <h6>Rs
                  <?php 
				  $couponcode_entered = $_SESSION['couponcode_entered']; 
				  $couponcode_price = $_SESSION['couponcode_price']; 
				  $urexy=mysqli_query($con,"select SUM(court_price) from user_court where order_id = '$order_id'");
				  $urowx=mysqli_fetch_array($urexy);
				  echo $court_price = $urowx['SUM(court_price)'];
				  ?>
                  </h6>
                </li>
                <?php if($couponcode_entered != '') { ?>
                <li>
                  <p>Discount (<?php echo $couponcode_entered; ?>)</p>
                  <h6>Rs <?php echo $couponcode_price; ?></h6>
                </li>
                <?php } ?>
                <li>
                  <p>Other Charge</p>
                  <h6>Rs 0</h6>
                </li>
              </ul>
              <div class="order-total d-flex justify-content-between align-items-center">
                <h5>Order Total</h5>
                <h5>Rs
                  <?php $c1 = $court_price - $couponcode_price; echo $c3 = ceil($c1); ?>
                </h5>
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
