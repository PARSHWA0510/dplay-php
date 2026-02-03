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
$seo1 = mysqli_query($con,"SELECT * FROM seo_master WHERE page_name = 'Membership Payment'");
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
               <?php  $order_id = $_GET['order_id'];
				$ure=mysqli_query($con,"select * from user_membership where order_id = '$order_id'  order by id desc");
				$urow=mysqli_fetch_array($ure);
				$buy_id = $urow[0];
				$package_id = $urow['package_id'];
				$orderid = $urow['order_no'];
				$package_price = $urow['package_price'];
				
				$ure=mysqli_query($con,"select * from package_user where id = '$package_id'");
				$urow=mysqli_fetch_array($ure);
				?>
              <ul>
                <li><i class="feather-calendar me-2"></i><strong>Package Name&nbsp;&nbsp; : &nbsp;&nbsp;</strong> <?php echo $urow['name']; ?></li>
                <li><i class="feather-users me-2"></i>No of Session&nbsp;&nbsp; : &nbsp;&nbsp;<strong><?php echo $urow['session_no']; ?></strong></li>
                <li><i class="feather-calendar me-2"></i><strong>Details&nbsp;&nbsp;&nbsp;&nbsp;</strong>
                  <div style="width:90%; margin-left:5px"><?php echo $urow['remarks']; ?></div>
                </li>
               
              </div>
               
            </div>
          </div> <div class="col-12 col-sm-12 col-md-12 col-lg-5">
            <aside class="card payment-modes">
              <h3 class="border-bottom">Payment Summary</h3>
              <ul class="order-sub-total">
                <li>
                  <p>Sub total</p>
                  <h6>Rs
                    <?php echo $package_price ?>
                  </h6>
                </li>
                <li>
                  <p>Other Charge</p>
                  <h6>Rs 0</h6>
                </li>
              </ul>
              <div class="order-total d-flex justify-content-between align-items-center">
                <h5>Order Total</h5>
                <h5>Rs
                  <?php $c1 = $package_price; echo $c3 = ceil($c1); ?>
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
