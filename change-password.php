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
<title>Venue Sport</title>
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
<div class="main-wrapper authendication-pages">
  <!-- Page Content -->
  <div class="content blur-ellipses login-password">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-7 mx-auto vph-100 d-flex align-items-center">
          <div class="change-password w-100">
            <header class="text-center"> <a href="index.php"> <img src="assets/img/logo-black.svg" class="img-fluid" alt="Logo"> </a> </header>
            <div class="shadow-card">
              <h2>Change Password</h2>
              <p>Your New Password must be different from<br>
                Previous used Password</p>
              <!-- Login Form -->
              <form>
                <div class="form-group">
                  <div class="pass-group group-img"> <i class="toggle-password feather-eye"></i>
                    <input type="password" class="form-control pass-input" placeholder="New Password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="pass-group group-img"> <i class="toggle-password-confirm feather-eye"></i>
                    <input type="password" class="form-control pass-confirm" placeholder="Confirm Password">
                  </div>
                </div>
                <button type="submit"  class="btn btn-secondary w-100 d-inline-flex justify-content-center align-items-center">Change Password<i class="feather-arrow-right-circle ms-2"></i></button>
              </form>
              <!-- /Login Form -->
            </div>
            <div class="bottom-text text-center">
              <p>Have an account? <a href="">Sign In!</a></p>
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
<script src="assets/js/jquery-3.7.1.min.js" type="caa82e98092d4ebf948b3e1a-text/javascript"></script>
<!-- Bootstrap Core JS -->
<script src="assets/js/bootstrap.bundle.min.js" type="caa82e98092d4ebf948b3e1a-text/javascript"></script>
<!-- Select JS -->
<script src="assets/plugins/select2/js/select2.min.js" type="caa82e98092d4ebf948b3e1a-text/javascript"></script>
<!-- Custom JS -->
<script src="assets/js/script.js" type="caa82e98092d4ebf948b3e1a-text/javascript"></script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="caa82e98092d4ebf948b3e1a-|49" defer></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"93b856fe1a60c188","version":"2025.4.0-1-g37f21b1","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>
</html>
