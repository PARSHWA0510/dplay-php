<script language="javascript">window.location.href="../login.php";</script>
<?php session_start();
error_reporting(0);
include('../config.php');
if(isset($_REQUEST['login']))
{

	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	$year_range = $_REQUEST['year_range'];
	
	  $data = mysqli_query($con,"select * from user_master where username='$username' and password='$password' and status = '1'");
	  $aarry = mysqli_fetch_array($data);
			
		$name = $aarry['name'];
		$ue = $aarry['username'];
		$up = $aarry['password'];
		$ut = $aarry['user_type']; 
		$ui = $aarry['id'];	

	
	if($username == $ue && $password == $up)
	{
		$_SESSION['name'] = $name;
		$_SESSION['admin_id'] = $ui;
		$_SESSION['company_id'] = '1';
		$_SESSION['user_type'] = $ut;
		$_SESSION['year_range'] = '2024-25';
				
?>
<script language="javascript">window.location.href="dashboard.php";</script>
<?php  } 
	 else 
	 {
	  echo'<script language="javascript">alert("Invalid User name And Password");</script>';
      echo'<script language="javascript">window.location.href="index.php";</script>';
	  }
}  ?>
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">
<!-- favicons -->
<link rel="apple-touch-icon" href="img/favicon-apple.png">
<link rel="icon" href="img/favicon.png">
<!-- Material design icons CSS -->
<link rel="stylesheet" href="vendor/materializeicon/material-icons.css">
<!-- aniamte CSS -->
<link rel="stylesheet" href="vendor/animatecss/animate.css">
<!-- swiper slider CSS -->
<link rel="stylesheet" href="vendor/swiper/css/swiper.min.css">
<!-- app CSS -->
<link id="theme" rel="stylesheet" href="css/purplesidebar.css" type="text/css">
<title>Sport CRM Panel</title>
</head>
<body class="fixed-header sidebar-right-close sidebar-left-close">
<!-- page loader -->
<!-- page loader ends  -->
<div class="wrapper h-100  h-sm-auto justify-content-center">
  <!-- main header -->
  <!-- main header ends -->
  <!-- sidebar left -->
  <!-- sidebar left ends -->
  <!-- sidebar right -->
  <!-- sidebar right ends -->
  <!-- content page -->
  <div class="carosel swiper-location-carousel bg-dark background-img position-fixed">
    <div data-pagination='{"el": ".swiper-pagination"}' data-space-between="0" data-slides-per-view="1" class="swiper-container swiper-init swiper-signin h-100">
      <div class="swiper-pagination"></div>
      <div class="swiper-wrapper">
        <div class="swiper-slide text-center ">
          <div class="background-img"><img src="../images/most-popular-sport-illustration-free-vector.jpg" alt="" class="w-100"></div>
        </div>
        <div class="swiper-slide text-center">
          <div class="background-img"><img src="../images/athlete-sport-design-illustration-art-vector.jpg" alt="" class="w-100"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="container h-100  h-sm-auto align-items-center">
    <div class="row align-items-center h-100  h-sm-auto">
      <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 mx-auto text-center">
        <h1 class="font-weight-light mb-3 text-white mt-2">Sport CRM Panel</h1>
        <h4 class="font-weight-light mb-5 text-white text-center">Welcome back,<br>
          Please sign in to your account.</h4>
        <form method="post" name="form">
        <div class="card mb-3">
          <div class="card-body p-0">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="text" id="inputEmail" class="form-control text-center form-control-lg border-0" placeholder="Username" name="username" autofocus>
            <hr class="my-0">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control text-center form-control-lg border-0" placeholder="Password" name="password">
          </div>
        </div>
        <div class="text-center">
          <input type="submit" name="login" class=" btn btn-primary pink-gradient">
        </div>
        </form>
        <br>
        <br>
        <div class="text-center mb-4"> <a href="#" class="text-white">Forgot Password?</a> </div>
      </div>
    </div>
  </div>
  <!-- content page ends -->
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="vendor/bootstrap-4.1.3/js/bootstrap.min.js"></script>
<!-- Cookie jquery file -->
<script src="vendor/cookie/jquery.cookie.js"></script>
<!-- swiper slider jquery file -->
<script src="vendor/swiper/js/swiper.min.js"></script>
<!-- Application main common jquery file -->
<script src="js/main.js"></script>
<!-- page specific script -->
<script>
        'use strict';
        var mySwiper = new Swiper('.swiper-signin', {
            slidesPerView: 1,
            spaceBetween: 0,
            autoplay: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            }
        });

    </script>
</body>
</html>
