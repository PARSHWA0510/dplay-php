<?php  error_reporting(0); session_start(); include('config.php'); ?>
<?php $user_id = $_SESSION['user_id']; if($user_id == '') { ?>
<script>window.location.href="index.php";</script>
<?php } ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
$logoaddp = mysqli_query( $con, "select * from company_master" );
$logoaddsp = mysqli_fetch_array( $logoaddp );
echo $google_analytic_code = $logoaddsp[ 'google_analytic_code' ];
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<?php
$seo1 = mysqli_query( $con, "SELECT * FROM seo_master WHERE page_name = 'My Profile'" );
$seo2 = mysqli_fetch_array( $seo1 );
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
        <li>Profile</li>
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
              <?php
              $urez = mysqli_query( $con, "select * from user_master where id = '$user_id'" );
              $urowz = mysqli_fetch_array( $urez );
              ?>
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
  
   var mobile = document.getElementById("mobile").value;
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
              <form autocomplete="off"  name="form" method="post" enctype="multipart/form-data" onSubmit="return validateForm()">
                <div class="row">
                  <div class="col-lg-4 col-md-6">
                    <div class="input-space">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control"  name="name" value="<?php echo $urowz['name']; ?>" placeholder="Enter Name">
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="input-space">
                      <label for="name" class="form-label">Email</label>
                      <input type="email" class="form-control" name="email1" value="<?php echo $urowz['email1']; ?>" placeholder="Enter Email Address">
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="input-space">
                      <label for="name" class="form-label">Phone Number</label>
                      <input type="text" class="form-control" value="<?php echo $urowz['contact1']; ?>" name="contact1" placeholder="Enter Phone Number" id="mobile" onKeyPress="return isNumberKey(event)" maxlength="10" required  readonly >
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="input-space">
                      <label for="name" class="form-label">Gender</label>
                      <br>
                      <input type="radio" required name="gender" <?php if($urowz['gender'] == 'Male') echo 'checked="checked"';?>  value="Male">
                      Male&nbsp;
                      <input required name="gender" type="radio" <?php if($urowz['gender'] == 'Female') echo 'checked="checked"';?> value="Female" >
                      Female&nbsp;
                      <input required name="gender" type="radio" <?php if($urowz['gender'] == 'Other') echo 'checked="checked"';?> value="Other" >
                      Other&nbsp; </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="input-space">
                      <label for="name" class="form-label">Date of Birth</label>
                      <input type="date" class="form-control" value="<?php echo $urowz['dob']; ?>" name="dob" >
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="input-space">
                      <label for="name" class="form-label">Profile Photo</label>
                      <input class="form-control"  name="img5" type="file">
                      <?php $photo = $urowz['photo']; if($photo != '') { ?>
                      <img src="images/<?php echo $photo; ?>" width="150"  />
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="save-changes text-end">
                  <input type="submit"  class="btn btn-secondary save-profile" name="update" value="Save Change">
                </div>
              </form>
              <?php

              if ( isset( $_REQUEST[ 'update' ] ) ) {


                $uupQry = "UPDATE user_master SET  `name` = '" . mysqli_real_escape_string( $con, $_REQUEST[ 'name' ] ) . "', `email1` = '" . mysqli_real_escape_string( $con, $_REQUEST[ 'email1' ] ) . "', `dob` = '" . mysqli_real_escape_string( $con, $_REQUEST[ 'dob' ] ) . "', `gender` = '" . mysqli_real_escape_string( $con, $_REQUEST[ 'gender' ] ) . "' WHERE id='$user_id'";
                $uuresult = mysqli_query( $con, $uupQry );

                $img1 = $_FILES[ 'img1' ][ 'name' ];
                if ( $img1 != '' ) {
                  $img1 = rand( 1, 1000000 ) . str_replace( " ", "_", trim( $_FILES[ 'img1' ][ 'name' ] ) );
                  $tmp_name = $_FILES[ "img1" ][ "tmp_name" ];
                  $pr = "../images/";
                  $pr1 = $pr . $img1;
                  move_uploaded_file( $tmp_name, $pr1 );
                }

                if ( $img1 != '' ) {
                  $uupQry = "UPDATE user_master SET photo='$img1'  WHERE id='$id'";
                  $uuresult = mysqli_query( $con, $uupQry );
                }

                ?>
              <script>alert('Profile Updated Successfully');</script> 
              <script language="javascript">window.location.href="my-profile.php";</script>
              <?php  } ?>
            </div>
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
