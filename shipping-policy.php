<?php  error_reporting(0); session_start(); include('config.php'); ?>
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
$seo1 = mysqli_query($con,"SELECT * FROM policypage_master WHERE page_name = 'Shipping Policy'");
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
<div class="main-wrapper terms-page innerpagebg">
  <!-- Header -->
  <?php include 'header.php'?>
  <!-- /Header -->
  <!-- Breadcrumb -->
  <div class="breadcrumb breadcrumb-list mb-0"> <span class="primary-right-round"></span>
    <div class="container">
      <h1 class="text-white">Shipping Policy</h1>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li>Shipping Policy</li>
      </ul>
    </div>
  </div>
  <!-- /Breadcrumb -->
  <!-- Page Content -->
  <div class="content">
    <div class="container">
      <h3>Shipping Policy</h3>
      <div class="condition-details"> <?php echo $seo2['additional_info']; ?> </div>
    </div>
  </div>
  <!-- /Page Content -->
  <!-- Footer -->
  <?php include 'footer.php' ?>
  <!-- /Footer -->
</div>
<!-- /Main Wrapper -->
<!-- jQuery -->
<script src="assets/js/jquery-3.7.1.min.js" type="54f0c8b45aebd8b1bc2bb453-text/javascript"></script>
<!-- Bootstrap Core JS -->
<script src="assets/js/bootstrap.bundle.min.js" type="54f0c8b45aebd8b1bc2bb453-text/javascript"></script>
<!-- Select JS -->
<script src="assets/plugins/select2/js/select2.min.js" type="54f0c8b45aebd8b1bc2bb453-text/javascript"></script>
<!-- Custom JS -->
<script src="assets/js/script.js" type="54f0c8b45aebd8b1bc2bb453-text/javascript"></script>
<script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="54f0c8b45aebd8b1bc2bb453-|49" defer></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"93b857194829c188","version":"2025.4.0-1-g37f21b1","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>
</html>
