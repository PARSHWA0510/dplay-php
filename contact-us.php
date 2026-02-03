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
$seo1 = mysqli_query($con,"SELECT * FROM seo_master WHERE page_name = 'Contact Us'");
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
<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="assets/plugins/owl-carousel/owl.carousel.min.css">
<link rel="stylesheet" href="assets/plugins/owl-carousel/owl.theme.default.min.css">
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
<div class="main-wrapper contact-us-page">
  <!-- Header -->
  <?php include 'header.php' ?>
  <!-- /Header -->
  <!-- Breadcrumb -->
  <div class="breadcrumb breadcrumb-list mb-0"> <span class="primary-right-round"></span>
    <div class="container">
      <h1 class="text-white">Contact Us</h1>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li>Contact Us</li>
      </ul>
    </div>
  </div>
  <!-- /Breadcrumb -->
  <!-- Page Content -->
  <div class="content blog-details contact-group">
    <div class="container">
      <h2 class="text-center mb-40">Contact Information</h2>
      <div class="row mb-40">
	    <?php 
		$ure=mysqli_query($con,"select * from company_master");
		$row=mysqli_fetch_array($ure); ?>
        <div class="col-12 col-sm-12 col-md-6 col-lg-4">
          <div class="d-flex justify-content-start align-items-center details"> <i class="feather-mail d-flex justify-content-center align-items-center"></i>
            <div class="info">
              <h4>Email Address</h4>
              <p><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></p>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-4">
          <div class="d-flex justify-content-start align-items-center details"> <i class="feather-phone-call d-flex justify-content-center align-items-center"></i>
            <div class="info">
              <h4>Phone Number</h4>
              <p><?php echo $row['mobile1']; ?></p>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-4">
          <div class="d-flex justify-content-start align-items-center details"> <i class="feather-map-pin d-flex justify-content-center align-items-center"></i>
            <div class="info">
              <h4>Location</h4>
              <p><?php echo $row['address1']; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="section dull-bg">
      <div class="container">
        <h2 class="text-center mb-40">Reach out to us and let's smash your inquiries </h2>
        <form class="contact-us" name="form" method="post">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-6 mb-3">
              <label for="first-name" class="form-label">Full Name</label>
              <input type="text" class="form-control" name="name" id="first-name" requied>
            </div>
            
            <div class="col-12 col-sm-12 col-md-6 mb-3">
              <label for="e-mail" class="form-label">Email</label>
              <input type="text" class="form-control" name="email" id="e-mail" requied>
            </div>
            <div class="col-12 col-sm-12 col-md-6 mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="text" class="form-control" name="mobile" id="phone" requied>
            </div>
            <div class="col-12 col-sm-12 col-md-6 mb-3">
              <label for="subject" class="form-label">Subject</label>
              <input type="text" class="form-control" name="subject" requied>
            </div>
          </div>
          <div>
            <label for="comments" class="form-label">Comments</label>
            <textarea class="form-control" name="comments" rows="3"></textarea>
          </div>
          <input type="submit" name="send" class="btn btn-secondary d-flex align-items-center" value="Submit">
        </form>
        
<?php 
if ($_POST['send']) 
{
$sql=("INSERT INTO `contactus_inquiry` (  `name`, `email`, `mobile`, `subject`, `comments`,`ins_datetime`) VALUES ( '".mysqli_real_escape_string($con,$_REQUEST['name'])."','".mysqli_real_escape_string($con,$_REQUEST['email'])."','".mysqli_real_escape_string($con,$_REQUEST['mobile'])."','".mysqli_real_escape_string($con,$_REQUEST['subject'])."','".mysqli_real_escape_string($con,$_REQUEST['comments'])."','$todaydatetime')");	 
$z = mysqli_query($con,$sql);
?>
<script>alert('Thank you for Contact to Us');</script>
<script language="javascript">window.location.href="contact-us.php";</script>
<?php  } ?>
      </div>
    </section>
  </div>
  <!-- /Page Content -->
  <!-- Footer -->
  <?php include 'footer.php' ?>
  <!-- /Footer -->
</div>
<!-- /Main Wrapper -->
<!-- jQuery -->
<script src="assets/js/jquery-3.7.1.min.js" type="192f55c73f625ba196929644-text/javascript"></script>
<!-- Bootstrap Core JS -->
<script src="assets/js/bootstrap.bundle.min.js" type="192f55c73f625ba196929644-text/javascript"></script>
<!-- Owl Carousel JS -->
<script src="assets/plugins/owl-carousel/owl.carousel.min.js" type="192f55c73f625ba196929644-text/javascript"></script>
<!-- Select JS -->
<script src="assets/plugins/select2/js/select2.min.js" type="192f55c73f625ba196929644-text/javascript"></script>
<!-- Custom JS -->
<script src="assets/js/script.js" type="192f55c73f625ba196929644-text/javascript"></script>
<script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="192f55c73f625ba196929644-|49" defer></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"93b8574d1bbea8b0","version":"2025.4.0-1-g37f21b1","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>
</html>
