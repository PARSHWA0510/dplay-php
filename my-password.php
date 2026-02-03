<?php  error_reporting(0); session_start(); include('config.php'); ?>
<?php $user_id = $_SESSION['user_id']; if($user_id == '') { ?><script>window.location.href="index.php";</script><?php } ?>
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
$seo1 = mysqli_query($con,"SELECT * FROM seo_master WHERE page_name = 'My Password'");
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
<!-- Fancybox CSS -->
<link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css">
<!-- Select CSS -->
<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
<!-- Feathericon CSS -->
<link rel="stylesheet" href="assets/css/feather.css">
<!-- Main CSS -->
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<!-- Main Wrapper -->
<div class="main-wrapper">
  <!-- Header -->
  <?php include 'header.php' ?>
  <!-- /Header -->
  <!-- Breadcrumb -->
  <section class="breadcrumb breadcrumb-list mb-0"> <span class="primary-right-round"></span>
    <div class="container">
      <h1 class="text-white">Profile</h1>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li>Change Password</li>
      </ul>
    </div>
  </section>
  <!-- /Breadcrumb -->
  <!-- Dashboard Menu -->
  <div class="dashboard-section coach-dash-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="dashboard-menu coaurt-menu-dash">
            <?php include 'user_menu.php'; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Dashboard Menu -->
  <div class="content court-bg">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="profile-detail-group">
            <div class="card ">
              <form name="form" method="post">
                <div class="row">
                  <div class="col-lg-4 col-md-6">
                    <div class="input-space">
                      <label for="name" class="form-label">Old Password</label>
                      <input type="text" class="form-control" name="op" required>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="input-space">
                      <label for="name" class="form-label">New Password</label>
                      <input type="text" class="form-control" name="password" required>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="input-space">
                      <label for="name" class="form-label">Confirm Password</label>
                      <input type="text" class="form-control" name="cpassword" required>
                    </div>
                  </div>
                </div>
                <div class="save-changes text-end">
                  <input type="submit"  class="btn btn-secondary save-profile" name="change" value="Save Change">
                </div>
              </form>
            </div>
            <?php 
				   
if(isset($_REQUEST['change'])) 
{

$data = mysqli_query($con,"select * from user_master where id='$user_id'");
$urow = mysqli_fetch_array($data);
			
$op=$_REQUEST['op'];
$password_old = $urow['password'];
 		
 
if($op != $password_old)
{
?>
            <script language="javascript">alert('Old Password does not Match');</script>
            <script language="javascript">window.location.href="my-password.php";</script>
            <?php
	}
	else
	{
	$password=$_REQUEST['password'];
	$cpassword=$_REQUEST['cpassword'];
    if($password == $cpassword)
	{	
	$uupQry="UPDATE user_master SET password='$password' WHERE id='$user_id'";
	$uuresult=mysqli_query($con,$uupQry);
	
	
?>
            <script language="javascript">alert('Password Change Successfully');</script>
            <script language="javascript">window.location.href="my-password.php";</script>
            <?php
	}
	else
	{
?>
            <script language="javascript">alert('Password & Confirm Password does not Match');</script>
            <script language="javascript">window.location.href="my-password.php";</script>
            <?php
	}
	}
	}	?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Content -->
  <!-- /Page Content -->
  <!-- Footer -->
  <?php include 'footer.php' ?>
  <!-- /Footer -->
</div>
<!-- /Main Wrapper -->
<!-- jQuery -->
<script src="assets/js/jquery-3.7.1.min.js" type="28a1b1647c061247a918a747-text/javascript"></script>
<!-- Bootstrap Core JS -->
<script src="assets/js/bootstrap.bundle.min.js" type="28a1b1647c061247a918a747-text/javascript"></script>
<!-- Fancybox JS -->
<script src="assets/plugins/fancybox/jquery.fancybox.min.js" type="28a1b1647c061247a918a747-text/javascript"></script>
<!-- Select JS -->
<script src="assets/plugins/select2/js/select2.min.js" type="28a1b1647c061247a918a747-text/javascript"></script>
<!-- Custom JS -->
<script src="assets/js/script.js" type="28a1b1647c061247a918a747-text/javascript"></script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="28a1b1647c061247a918a747-|49" defer></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"93b857b519eec188","version":"2025.4.0-1-g37f21b1","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>
</html>
