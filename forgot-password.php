<?php  error_reporting(0); session_start(); include('config.php'); ?>
<?php  date_default_timezone_set("Asia/Kolkata");  $todaydatetime = date('Y-m-d H:i:s');  $todaydate = date('Y-m-d'); $user_id = $_SESSION['user_id'];
$ureurl=mysqli_query($con,"select * from website_url");
$rowurl=mysqli_fetch_array($ureurl);
$siteurl_link = $rowurl['url_link']; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include 'PHPMailer/src/Exception.php';
include 'PHPMailer/src/PHPMailer.php';
include 'PHPMailer/src/SMTP.php';
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
$seo1 = mysqli_query($con,"SELECT * FROM seo_master WHERE page_name = 'Forgot Password'");
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
<div class="main-wrapper authendication-pages">
  <!-- Page Content -->
  <div class="content">
    <div class="container wrapper no-padding">
      <div class="row no-margin vph-100">
        <?php 
					$ure=mysqli_query($con,"select * from page_forgotpass");
					$row=mysqli_fetch_array($ure); ?>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 no-padding">
          <div class="banner-bg register" style="background-image: url(images/<?php echo $row['image']; ?>);">
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
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 no-padding">
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
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
                      <!-- Register Form -->
                      <form name="form" method="post">
                        <div class="form-group">
                          <div class="group-img"> <i class="feather-mail"></i>
                            <input type="text" class="form-control" name="email1" required placeholder="Enter Email">
                          </div>
                        </div>
                        <button name="forgot" class="btn btn-secondary register-btn d-inline-flex justify-content-center align-items-center w-100 btn-block" type="submit">Forgot Password<i class="feather-arrow-right-circle ms-2"></i></button>
                        <?php /*?> <div class="form-group">
                          <div class="login-options text-center"> <span class="text">Or continue with</span> </div>
                        </div>
                        <div class="form-group mb-0">
                          <ul class="social-login d-flex justify-content-center align-items-center">
                            <li class="text-center">
                              <button type="button" class="btn btn-social d-flex align-items-center justify-content-center"> <img src="assets/img/icons/google.svg" class="img-fluid" alt="Google"> <span>Google</span> </button>
                            </li>
                            <li class="text-center">
                              <button type="button" class="btn btn-social d-flex align-items-center justify-content-center"> <img src="assets/img/icons/facebook.svg" class="img-fluid" alt="Facebook"> <span>Facebook</span> </button>
                            </li>
                          </ul>
                        </div><?php */?>
                      </form>
                      <?php  
if(isset($_REQUEST['forgot']))
{
$email1 = $_REQUEST['email1'];
$ure=mysqli_query($con,"select * from user_master where email1 = '$email1'");
$memno=mysqli_num_rows($ure);
if($memno == '0')
{
echo'<script language="javascript">alert("Email ID Not Found.");</script>';
echo'<script language="javascript">window.location.href="forgot-password.php";</script>';
}
else
{

$rand = rand(111111,999999);

$sqll = mysqli_query($con,"SELECT * FROM user_master WHERE email1 = '$email1' and user_type IN ('manager','customer')");
$rse = mysqli_fetch_array($sqll);
$custid = $rse[0];
$name = $rse['name'];
$password = $rse['password'];

$newcode = $rand.$custid;

$ure=mysqli_query($con,"select * from company_master");
$row=mysqli_fetch_array($ure);
$company_logo = $row['company_logo']; 
$company_email = $row['email']; 
$company_mobile1 = $row['mobile1']; 
$fullMessage = $fullMessage.'<!DOCTYPE html>
<html>
<body style="padding: 20px; font-family: font-size: 14px; line-height: 1.43; font-family: &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif;">
<div style="max-width: 800px; margin: 0px auto; background-color: #fff; box-shadow: 0px 20px 50px rgba(0,0,0,0.05); border:solid 2px #00ffcc">
  <table style="width: 100%;">
    <tr>
      <td style="background-color: #fff;"><center><img style="width: 30%; padding: 10px" src="'.$siteurl_link.'/images/'.$company_logo.'"></center></td>
    </tr>
  </table>
  <div style="padding: 25px; border-top: 1px solid rgba(0,0,0,0.05);">
    <h1 style="margin-top: 0px;">Dear <span style="text-transform:capitalize">'.$name.'</span></h1>
    <div style="color: #000000; font-size: 14px; margin-bottom: 30px">Please Reset Your Password</div>
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
  border: 0.0625rem solid #e4e4e4;
   }
.dz-post-text td p { margin:0px }
td { text-align:left !important; padding:5px 10px; } 
</style>';


 $fullMessage = $fullMessage.'<div style="background-color: #f6f4ff; margin: 20px 0px 20px;">
      <div style="padding: 20px;
    text-transform: uppercase;
    color: #ffffff;
    font-size: 16px;
    font-weight: bold;
    letter-spacing: 0px;
    text-align: center;
    background: #5745a6;"><a href="'.$siteurl_link.'/reset-password.php?code='.$newcode.'" style="color:#FFFFFF">Click Here</a></div>
    </div>
	 <div style="color: #000000; font-size: 14px; margin-bottom: 30px">Best Regards,<br/>
DPlays Team
</div>
    <h4 style="margin-bottom: 10px;">Need Help?</h4>
    <div style="color: #A5A5A5; font-size: 12px;">
      <p>If you have any questions, please dont hesitate to reply to this email, or reach out to us at <a href="mailto:'.$company_email.'" style="text-decoration: underline; color: #4B72FA;">'.$company_email.'</a>, or by calling <a href="tel:'.$company_mobile1.'" style="text-decoration: underline; color: #4B72FA;">'.$company_mobile1.'</a>.
</p>
    </div>
  </div>
</div>
</body>
</html>';

$sqllr = mysqli_query($con,"SELECT * FROM api_email WHERE ins_type='Google Email Account'");
$rser = mysqli_fetch_array($sqllr);
$title1 = $rser['title1'];
$title2 = $rser['title2'];

        $mail = new PHPMailer(true);

        $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
        $mail->isSMTP(); 
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true; 
        $mail->Username   = $title1; 
        $mail->Password   = $title2;
	 //password set in path=Account/security/2-step verification/add password 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port       = 587; 

        $mail->setFrom($title1, 'DPlays');
        $mail->addAddress($email1, 'DPlays'); 

        $mail->isHTML(true); 
        $mail->Subject = 'Reset Password From Dplays!'; 
        $mail->Body    = $fullMessage; 

		$mail->SMTPDebug = 0; //after all functions work proper set to 0;
        $mail->send();

		

?>
<script>alert('Reset Link sent to your Email ID')</script>
<script language="javascript">window.location.href="forgot-password.php";</script>
<?php } } ?>
                    </div>
                  </div>
                </div>
                <div class="bottom-text text-center">
                  <p>Have an account? <a href="login.php">Sign In!</a></p>
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
<script src="assets/js/jquery-3.7.1.min.js" type="0eb119d50431fc4661324012-text/javascript"></script>
<!-- Bootstrap Core JS -->
<script src="assets/js/bootstrap.bundle.min.js" type="0eb119d50431fc4661324012-text/javascript"></script>
<!-- Select JS -->
<script src="assets/plugins/select2/js/select2.min.js" type="0eb119d50431fc4661324012-text/javascript"></script>
<!-- Custom JS -->
<script src="assets/js/script.js" type="0eb119d50431fc4661324012-text/javascript"></script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="0eb119d50431fc4661324012-|49" defer></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"93b856f76902a8b0","version":"2025.4.0-1-g37f21b1","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>
</html>
