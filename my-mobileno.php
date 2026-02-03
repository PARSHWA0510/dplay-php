<?php  error_reporting(0); session_start(); include('config.php'); ?>
<?php  date_default_timezone_set("Asia/Kolkata");  $todaydatetime = date('Y-m-d H:i:s');  $todaydate = date('Y-m-d'); $user_id = $_SESSION['user_id']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php 
$ureurl=mysqli_query($con,"select * from website_url");
$rowurl=mysqli_fetch_array($ureurl);
$siteurl_link = $rowurl['url_link']; 

$logoaddp=mysqli_query($con,"select * from company_master");
$logoaddsp=mysqli_fetch_array($logoaddp);
echo $google_analytic_code = $logoaddsp['google_analytic_code'];
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<?php
$seo1 = mysqli_query($con,"SELECT * FROM seo_master WHERE page_name = 'Register'");
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

<script type="text/javascript">
function showUser1(str)
{
if (str=="")
  {
  document.getElementById("txtHint1").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","check_mobileno.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>
<body>
<!-- Main Wrapper -->
<div class="main-wrapper authendication-pages">
  <!-- Page Content -->
  <div class="content">
    <div class="container wrapper no-padding">
      <div class="row no-margin vph-100">
        <?php 
					$ure=mysqli_query($con,"select * from page_register");
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
                  <h2><?php echo $row['title1']; ?> : Enter Mobile No</h2>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
                      <!-- Register Form -->
                      <script type="text/javascript" language="javascript">
function validateForm()
{
var x=document.forms["form"]["email1"].value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }
  
   var mobile = document.getElementById("contact1").value;
        var pattern = /^\d{10}$/;
        if (pattern.test(mobile)) 
		{
            
            return true;
        } 
            alert("It is not valid mobile number.input 10 digits number!");
            return false;
			
			}
  </script>
                      <SCRIPT language=Javascript>
      
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
       
   </SCRIPT>
                      <form name="form" method="post" onSubmit="return validateForm()" >
                        <div class="form-group">
                          <div class="group-img"> <i class="feather-user"></i>
                            <input type="text" class="form-control" name="contact1" id="mobile" onKeyUp="showUser1(this.value)" onKeyPress="return isNumberKey(event)" required placeholder="Mobile No"><div id="txtHint1"></div>
                          </div>
                        </div>
                        
                         
                        
                        <button name="submit" class="btn btn-secondary register-btn d-inline-flex justify-content-center align-items-center w-100 btn-block" type="submit">Submit<i class="feather-arrow-right-circle ms-2"></i></button>
                        
                      </form>
                      <?php  
if(isset($_REQUEST['submit']))
{

$user_id = $_SESSION['user_id'];

$contact1 = $_REQUEST['contact1'];
$ure=mysqli_query($con,"select * from user_master where contact1 = '$contact1'");
$memno=mysqli_num_rows($ure);
if($memno != 0)
{
echo'<script language="javascript">alert("Mobile No is already register with Us");</script>';
echo'<script language="javascript">window.location.href="my-mobileno.php";</script>';
}
else
{
$uupQry="UPDATE user_master SET `contact1` = '".mysqli_real_escape_string($con,$_REQUEST['contact1'])."' WHERE id='$user_id'";
$uuresult=mysqli_query($con,$uupQry);
?>

<script language="javascript">window.location.href="index.php";</script>
<?php } } ?>
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
