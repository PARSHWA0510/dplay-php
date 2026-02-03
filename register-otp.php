<?php  error_reporting(0); session_start(); $cartid = $_SESSION['cartid']; ?>
<?php $user_id = $_SESSION['user_id']; ?>
<?php include('config.php'); date_default_timezone_set("Asia/Kolkata");  $todaydatetime = date('Y-m-d H:i:s'); $todaydate = date('Y-m-d'); 
$ureurl=mysqli_query($con,"select * from website_url");
$rowurl=mysqli_fetch_array($ureurl);
$siteurl_link = $rowurl['url_link']; 
?>
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
$seo1 = mysqli_query($con,"SELECT * FROM seo_master WHERE page_name = 'OTP'");
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
<style>
.google-login-btn {
	display: flex;
	align-items: center;
	text-decoration: none;
	font-size: 14px;
	font-weight: 500;
	color: #fff;
	width: 100%;
	overflow: hidden;
	border-radius: 5px;
	background-color: #d6523e;
	cursor: pointer;
}
.google-login-btn .icon {
	display: inline-flex;
	height: 100%;
	padding: 15px 20px;
	align-items: center;
	justify-content: center;
	background-color: #cf412c;
	margin-right: 15px;
}
.google-login-btn .icon svg {
	fill: #fff;
}
.google-login-btn:hover {
	background-color: #d44a36;
}
.google-login-btn:hover .icon {
	background-color: #c63f2a;
}
.profile-picture {
	display: flex;
	align-items: center;
	justify-content: center;
	margin: 15px 0 25px 0;
}
.profile-picture img {
	width: 100%;
	max-width: 100px;
	border-radius: 50%;
}
.profile-details {
	display: flex;
	flex-flow: column;
	padding: 10px 0;
}
.profile-details > div {
	display: flex;
	align-items: center;
	border-bottom: 1px solid #f1f2f5;
	margin-bottom: 15px;
	padding-bottom: 15px;
}
.profile-details > div .icon {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	width: 36px;
	height: 36px;
	border-radius: 50%;
	background-color: #9196a5;
	margin-right: 15px;
	font-size: 14px;
}
.profile-details > div .icon svg {
	fill: #fff;
}
.profile-details > div strong {
	display: block;
	font-size: 14px;
	font-weight: 500;
}
.profile-details > div:last-child {
	border-bottom: none;
}
.logout-btn {
	display: flex;
	align-items: center;
	text-decoration: none;
	font-size: 14px;
	font-weight: 500;
	color: #fff;
	width: 100%;
	overflow: hidden;
	border-radius: 5px;
	background-color: #db5d36;
	cursor: pointer;
}
.logout-btn .icon {
	display: inline-flex;
	height: 100%;
	padding: 15px 20px;
	align-items: center;
	justify-content: center;
	background-color: #d24e26;
	margin-right: 15px;
}
.logout-btn .icon svg {
	fill: #fff;
}
.logout-btn:hover {
	background-color: #d9562d;
}
.logout-btn:hover .icon {
	background-color: #c94b24;
}
</style>
</head>
<body>
<!-- Main Wrapper -->
<div class="main-wrapper authendication-pages">
  <!-- Page Content -->
  <div class="content">
    <div class="container wrapper no-padding">
      <div class="row no-margin vph-100">
        <?php 
					$ure=mysqli_query($con,"select * from page_otp");
					$row=mysqli_fetch_array($ure); ?>
        <div class="col-12 col-sm-12 col-lg-6 no-padding">
          <div class="banner-bg login" style="background-image: url(images/<?php echo $row['image']; ?>);">
            <div class="row no-margin h-100">
              <div class="col-sm-10 col-md-10 col-lg-10 mx-auto">
                <div class="h-100 d-flex justify-content-center align-items-center">
                  <div class="text-bg register text-center">
                    <button type="button" class="btn btn-limegreen text-capitalize"><i class="fa-solid fa-thumbs-up me-3"></i><?php echo $row['title1']; ?></button>
                    <p><?php echo $row['title2']; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-12  col-lg-6 no-padding">
          <div class="dull-pg">
            <div class="row no-margin vph-100 d-flex align-items-center justify-content-center">
              <div class="col-sm-10 col-md-10 col-lg-10 mx-auto">
                <header class="text-center">
                  <?php 
					$urec=mysqli_query($con,"select * from company_master");
					$rowc=mysqli_fetch_array($urec); ?>
                  <a href="<?php echo $siteurl_link; ?>/"> <img src="images/<?php echo $company_logo = $rowc['company_logo']; ?>" style="width:150px" class="img-fluid" alt="Logo"> </a> </header>
                <div class="shadow-card">
                  <h2><?php echo $row['title1']; ?></h2>
                  <p>Login into your account</p>
                  <?php /*?><ul class="nav nav-tabs" id="myTab" role="tablist">
											<li class="nav-item" role="presentation">
												<button class="nav-link active d-flex align-items-center" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button" role="tab" aria-controls="user" aria-selected="true">
													<span class="d-flex justify-content-center align-items-center"></span>I am a User
												</button>
											</li>
											<li class="nav-item" role="presentation">
												<button class="nav-link d-flex align-items-center" id="coach-tab" data-bs-toggle="tab" data-bs-target="#coach" type="button" role="tab" aria-controls="coach" aria-selected="false">
													<span class="d-flex justify-content-center align-items-center"></span>I am a Coach
												</button>
											</li>
										</ul><?php */?>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
                      <!-- Login Form -->
                      <form name="form" method="post">
                        
                        <div class="form-group">
                          <div class="pass-group group-img"> <i class="toggle-password feather-eye-off"></i>
                            <input type="password" name="otp_code" required class="form-control pass-input" placeholder="Enter OTP Code">
                          </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-secondary register-btn d-inline-flex justify-content-center align-items-center w-100 btn-block">Submit<i class="feather-arrow-right-circle ms-2"></i></button>
                        
                      </form>
                      
                      <?php 
if(isset($_REQUEST['submit']))
{
	  $otp_code = $_REQUEST['otp_code'];

	  $z=("select * from user_master where id = '$user_id'");
	  $ure = mysqli_query($con,$z);				 
	  $catdata=mysqli_fetch_array($ure);
	  $otp_code_old = $catdata['otp_code'];

	 if($otp_code == $otp_code_old) 
	 {
     $uupQry="UPDATE user_master SET otp_code='0' WHERE id='$user_id'";
     $uuresult=mysqli_query($con,$uupQry);

		 
	$buy_session = $_SESSION['buy_session'];
?>

<?php if($buy_session == '') { ?>
<script language="javascript">window.location.href="index.php";</script>
<?php } ?>

<?php if($buy_session == 'courtbook') { ?>
<script language="javascript">window.location.href="court-payment.php";</script>
<?php } ?>

<?php if($buy_session == 'membership') { ?>
<script language="javascript">window.location.href="membership-payment.php";</script>
<?php } ?>
			
<?php }
else
{
?>
<script>alert('Enter OTP Code is Wrong.');</script>
<script language="javascript">window.location.href="register-otp.php";</script>
<?php 
}						
}  ?>
                      <!-- /Login Form -->
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Page Content -->
</div>
<!-- /Main Wrapper -->
<!-- jQuery -->
<script src="assets/js/jquery-3.7.1.min.js" type="ff474a2356ea476e79a57105-text/javascript"></script>
<!-- Bootstrap Core JS -->
<script src="assets/js/bootstrap.bundle.min.js" type="ff474a2356ea476e79a57105-text/javascript"></script>
<!-- Select JS -->
<script src="assets/plugins/select2/js/select2.min.js" type="ff474a2356ea476e79a57105-text/javascript"></script>
<!-- Custom JS -->
<script src="assets/js/script.js" type="ff474a2356ea476e79a57105-text/javascript"></script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="ff474a2356ea476e79a57105-|49" defer></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"93b856f97b78c188","version":"2025.4.0-1-g37f21b1","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>
</html>
