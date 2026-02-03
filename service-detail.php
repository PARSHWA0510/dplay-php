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
<?php $id = $_GET['id'];
$master = mysqli_query($con,"SELECT * FROM service_master WHERE id = '$id'");
$master_detail = mysqli_fetch_array($master);
?>
<title><?php echo $master_detail['seo_title']; ?></title>
<meta name="keywords" content="<?php echo $master_detail['seo_keyword']; ?>">
<meta name="description" content="<?php echo $master_detail['seo_description']; ?>">
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
<div class="main-wrapper blog">
  <!-- Header -->
  <?php include 'header.php' ?>
  <!-- /Header -->
  <!-- Breadcrumb -->
  <div class="breadcrumb breadcrumb-list mb-0"> <span class="primary-right-round"></span>
    <div class="container">
      <h1 class="text-white"><?php echo $master_detail['name']; ?></h1>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><?php echo $master_detail['name']; ?></li>
      </ul>
    </div>
  </div>
  <!-- /Breadcrumb -->
  <!-- Page Content -->
  <div class="content blog-details">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-8 col-lg-8">
          <!-- Blog -->
          <div class="featured-venues-item">
            <div class="listing-item blog-info">
              <div class="listing-img"><img src="images/<?php echo $master_detail['image']; ?>" class="img-fluid">
                <div class="fav-item-venues news-sports"> <span class="tag tag-blue"><?php echo $master_detail['name']; ?></span> </div>
              </div>
              <div class="listing-content news-content"> <?php echo $master_detail['additional_info']; ?> </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 blog-sidebar theiaStickySidebar">
          <div class="card">
            <h4>Quick Link</h4>
            <ul class="categories">
              <?php								 
			$ure=mysqli_query($con,"select * from service_master where status = '1'");
			while($urow=mysqli_fetch_array($ure))
			{ ?>
              <li style="list-style:square; margin-left:15px;">
                <h6><a href="service-detail.php?id=<?php echo $urow[0]; ?>"><?php echo $urow['name']; ?> </a></h6>
              </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Page Content -->
  <!-- Footer -->
  <?php include 'footer.php' ?>
  <!-- /Footer -->
</div>
<!-- /Main Wrapper -->
<!-- jQuery -->
<script src="assets/js/jquery-3.7.1.min.js" type="2a928222ea0a2076b2d660a7-text/javascript"></script>
<!-- Bootstrap Core JS -->
<script src="assets/js/bootstrap.bundle.min.js" type="2a928222ea0a2076b2d660a7-text/javascript"></script>
<!-- Select JS -->
<script src="assets/plugins/select2/js/select2.min.js" type="2a928222ea0a2076b2d660a7-text/javascript"></script>
<!-- Owl Carousel JS -->
<script src="assets/plugins/owl-carousel/owl.carousel.min.js" type="2a928222ea0a2076b2d660a7-text/javascript"></script>
<!-- Sticky Sidebar JS -->
<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js" type="2a928222ea0a2076b2d660a7-text/javascript"></script>
<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js" type="2a928222ea0a2076b2d660a7-text/javascript"></script>
<!-- Custom JS -->
<script src="assets/js/script.js" type="2a928222ea0a2076b2d660a7-text/javascript"></script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="2a928222ea0a2076b2d660a7-|49" defer></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"93b857430f96a8b0","version":"2025.4.0-1-g37f21b1","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>
</html>
