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
$seo1 = mysqli_query($con,"SELECT * FROM seo_master WHERE page_name = 'About Us'");
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
<div class="main-wrapper aboutus-page">
  <!-- Header -->
  <?php include 'header.php' ?>
  <!-- /Header -->
  <!-- Breadcrumb -->
  <div class="breadcrumb breadcrumb-list mb-0"> <span class="primary-right-round"></span>
    <div class="container">
      <h1 class="text-white">About Us</h1>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li>About Us</li>
      </ul>
    </div>
  </div>
  <!-- /Breadcrumb -->
  <!-- Page Content -->
  <div class="content">
    <!-- About Us Info -->
    <section class="aboutus-info">
      <div class="container">
        <!-- Banners -->
        <?php 
		$ure=mysqli_query($con,"select * from aboutus_master");
		$urow=mysqli_fetch_array($ure); ?>
        <div class="row d-flex align-items-center">
          <div class=" col-12 col-sm-3 col-md-3 col-lg-3">
            <div class="banner text-center"> <img src="images/<?php echo $urow['image1']; ?>" class="img-fluid corner-radius-10" alt="Banner-01"> </div>
          </div>
          <div class=" col-12 col-sm-6 col-md-6 col-lg-6">
            <div class="banner text-center"> <img src="images/<?php echo $urow['image2']; ?>" class="img-fluid corner-radius-10" alt="Banner-02"> </div>
          </div>
          <div class=" col-12 col-sm-3 col-md-3 col-lg-3">
            <div class="banner text-center"> <img src="images/<?php echo $urow['image3']; ?>" class="img-fluid corner-radius-10" alt="Banner-03"> </div>
          </div>
        </div>
        <!-- /Banners -->
        <!-- Vision-Mission -->
        <div class="vision-mission">
          <div class="row">
            <div class=" col-12 col-sm-12 col-md-12 col-lg-8">
              <h2><?php echo $urow['title1']; ?></h2>
              <?php echo $urow['title2']; ?>
              <hr/>
              <?php 
			  $master=mysqli_query($con,"select * from company_master");
			  $master_detail=mysqli_fetch_array($master); ?>
              <?php $social_facebook = $master_detail['social_facebook']; if($social_facebook != '') { ?>
              <a href="<?php echo $social_facebook; ?>" target="_blank"><img src="images/4202110_facebook_logo_social_social media_icon.png" style="width:40px; margin-right:5px;"></a>
              <?php } ?>
              <?php $social_instagram = $master_detail['social_instagram']; if($social_instagram != '') { ?>
              <a href="<?php echo $social_instagram; ?>" target="_blank"><img src="images/4102579_applications_instagram_media_social_icon.png"style="width:40px; margin-right:5px;"></a>
              <?php } ?>
              <?php $social_linkedin = $master_detail['social_linkedin']; if($social_linkedin != '') { ?>
              <a href="<?php echo $social_linkedin; ?>" target="_blank"><img src="images/5296501_linkedin_network_linkedin logo_icon.png" style="width:40px; margin-right:5px;"></a>
              <?php } ?>
              <?php $social_youtube = $master_detail['social_youtube']; if($social_youtube != '') { ?>
              <a href="<?php echo $social_youtube; ?>" target="_blank"><img src="images/386762_youtube_video_you tube_icon.png" style="width:40px; margin-right:5px;"></a>
              <?php } ?>
              <?php $social_pinterest = $master_detail['social_pinterest']; if($social_pinterest != '') { ?>
              <a href="<?php echo $social_pinterest; ?>" target="_blank"><img src="images/4745735_online_pin_pinterest_profile_sharing_icon.png" style="width:40px; margin-right:5px;"></a>
              <?php } ?>
              <?php $social_x = $master_detail['social_x']; if($social_x != '') { ?>
              <a href="<?php echo $social_x; ?>" target="_blank"><img src="images/x-twitter-logo-social-media-app-button_197792-9306.png" style="width:40px; margin-right:5px;"></a>
              <?php } ?>

              <?php $social_reddit = $master_detail['social_reddit']; if($social_reddit != '') { ?>
              <a href="<?php echo $social_reddit; ?>" target="_blank"><img src="images/5296506_forum_reddit_reddit logo_icon.png" style="width:40px; margin-right:5px;"></a>
              <?php } ?>
            </div>
            <div class=" col-12 col-sm-12 col-md-12 col-lg-4">
              <div class="mission-bg">
                <h2><?php echo $urow['title3']; ?></h2>
                <?php echo $urow['title4']; ?> </div>
            </div>
          </div>
        </div>
        <!-- /Vision-Mission -->
      </div>
    </section>
    <!-- /About Us Info -->
    <!-- Group Coaching -->
    <?php /*?><section class="section white-bg">
      <div class="container">
        <div class="section-heading">
          <h2>Our <span>Features</span></h2>
          <p class="sub-title">Discover your potential with our comprehensive training, expert trainers, and advanced facilities.Join us to improve your athletic career</p>
        </div>
        <div class="row justify-content-center">
          <?php								 
	  $ure=mysqli_query($con,"select * from features_master where status = '1' order by rand() limit 6");
	  while($urow=mysqli_fetch_array($ure)) { ?>
          <div class="col-lg-4 col-md-6 d-flex">
            <div class="work-grid coaching-grid w-100 aos" data-aos="fade-up"> <img src="images/<?php echo $urow['image']; ?>">
              <div class="work-content">
                <h3 align="center" style="margin-top:10px;"><?php echo $urow['name']; ?></h3>
                <p><?php echo $urow['additional_info1']; ?></p>
                <center>
                  <a href="features-detail.php?id=<?php echo $urow[0]; ?>"> Learn More </a>
                </center>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </section><?php */?>
  </div>
  <!-- /Page Content -->
  <!-- Footer -->
  <?php include 'footer.php' ?>
  <!-- /Footer -->
</div>
<!-- /Main Wrapper -->
<!-- jQuery -->
<script src="assets/js/jquery-3.7.1.min.js" type="941e5aaf3b5b2b19ea2a9678-text/javascript"></script>
<!-- Bootstrap Core JS -->
<script src="assets/js/bootstrap.bundle.min.js" type="941e5aaf3b5b2b19ea2a9678-text/javascript"></script>
<!-- Select JS -->
<script src="assets/plugins/select2/js/select2.min.js" type="941e5aaf3b5b2b19ea2a9678-text/javascript"></script>
<!-- Owl Carousel JS -->
<script src="assets/plugins/owl-carousel/owl.carousel.min.js" type="941e5aaf3b5b2b19ea2a9678-text/javascript"></script>
<!-- Custom JS -->
<script src="assets/js/script.js" type="941e5aaf3b5b2b19ea2a9678-text/javascript"></script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="941e5aaf3b5b2b19ea2a9678-|49" defer></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"93b856e96a02a8b0","version":"2025.4.0-1-g37f21b1","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>
</html>
