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
$master = mysqli_query($con,"SELECT * FROM event_master WHERE seo_url = '$id'");
$master_detail = mysqli_fetch_array($master);
$event_id = $master_detail[0];
?>
<title><?php echo $master_detail['seo_title']; ?></title>
<meta name="keywords" content="<?php echo $master_detail['seo_keyword']; ?>">
<meta name="description" content="<?php echo $master_detail['seo_description']; ?>">
<!-- Meta Tags -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $siteurl_link; ?>/assets/img/favicon.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $siteurl_link; ?>/assets/img/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $siteurl_link; ?>/assets/img/apple-touch-icon-152x152.png">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?php echo $siteurl_link; ?>/assets/css/bootstrap.min.css">
<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="<?php echo $siteurl_link; ?>/assets/plugins/owl-carousel/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo $siteurl_link; ?>/assets/plugins/owl-carousel/owl.theme.default.min.css">
<!-- Select CSS -->
<link rel="stylesheet" href="<?php echo $siteurl_link; ?>/assets/plugins/select2/css/select2.min.css">
<!-- Fontawesome CSS -->
<link rel="stylesheet" href="<?php echo $siteurl_link; ?>/assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="<?php echo $siteurl_link; ?>/assets/plugins/fontawesome/css/all.min.css">
<!-- Feathericon CSS -->
<link rel="stylesheet" href="<?php echo $siteurl_link; ?>/assets/css/feather.css">
<!-- Fancybox CSS -->
<link rel="stylesheet" href="<?php echo $siteurl_link; ?>/assets/plugins/fancybox/jquery.fancybox.min.css">
<!-- Main CSS -->
<link rel="stylesheet" href="<?php echo $siteurl_link; ?>/assets/css/style.css">
</head>
<body>
<!-- Main Wrapper -->
<div class="main-wrapper venue-coach-details coach-detail">
  <!-- Header -->
  <?php include 'header.php' ?>
  <!-- /Header -->
  <!-- Banner -->
  <div class="banner"> <?php $bgimage = $master_detail['bgimage']; ?> <img src="<?php echo $siteurl_link; ?>/images/<?php if($bgimage == '') { echo 'event-detail-bg.jpg'; } else { echo $bgimage; } ?>" alt="Banner" > </div>
  <!-- Page Content -->
  <div class="content">
    <div class="container">
      <!-- Row -->
      <div class="row move-top">
        <div class="col-12 col-sm-12 col-md-12 col-lg-8">
          <div class="dull-bg corner-radius-10 coach-info d-md-flex justify-content-start align-items-start">
            <div class="profile-pic"><img alt="User" class="corner-radius-10" src="<?php echo $siteurl_link; ?>/images/<?php echo $master_detail['image']; ?>" style="width:200px"></div>
            <div class="info w-100">
              <div class="d-sm-flex justify-content-between align-items-start">
                <h3 class="d-flex align-items-center justify-content-start mb-0"><?php echo $master_detail['name']; ?><span class="d-flex justify-content-center align-items-center"><i class="fas fa-check-double"></i></span></h3>
                <?php /*?><a href="javascript:;"><span class="favourite fav-icon"><i class="feather-star"></i>Favourite</span></a><?php */?>
              </div>
              <p><?php echo $master_detail['small_des']; ?></p>
              <ul class="d-sm-flex align-items-center">
                <li><img src="<?php echo $siteurl_link; ?>/assets/img/icons/flag-01.png" style="width:20px" alt="Icon"><?php echo $master_detail['address']; ?></li>
              </ul>
              <hr>
            </div>
          </div>
          <div class="venue-options white-bg mb-4">
            <ul class="clearfix">
              <li class="active"><a href="#short-bio">Overview</a></li>
              <li><a href="#Categories">Book Event</a></li>
              <li><a href="#rules">Rules</a></li>
              <li><a href="#location">Locations</a></li>
              <li><a href="#contact">Contact Detail</a></li>
            </ul>
          </div>
          <!-- Accordian Contents -->
          <div class="accordion" id="accordionPanel">
            <div class="accordion-item mb-4" id="short-bio">
              <h4 class="accordion-header" id="panelsStayOpen-short-bio">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne"> Overview </button>
              </h4>
              <style>.service-content { background-color:#f5f5f5; padding:10px; border-radius:10px; width:100%; margin-bottom:10px; } </style>
              <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-short-bio">
                <div class="accordion-body">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 d-flex">
                      <div class="service-content">
                        <h4>Event Dates</h4>
                        <h6><?php echo date("d-m-Y h:i A", strtotime($master_detail['start_datetime'])); ?> To <?php echo date("d-m-Y h:i A", strtotime($master_detail['end_datetime'])); ?></h6>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 d-flex">
                      <div class="service-content">
                        <h4>Registration Deadline</h4>
                        <h6><?php echo date("d-m-Y", strtotime($master_detail['reg_deadline'])); ?></h6>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 d-flex">
                      <div class="service-content">
                        <h4>Starting Fees</h4>
                        <h6>Rs. <?php echo $master_detail['reg_fees']; ?></h6>
                      </div>
                    </div>
                    <?php /*?><div class="col-lg-6 col-md-6 d-flex">
                      <div class="service-content">
                        <h4>Winning Prize</h4>
                        <h6>Rs. <?php echo $master_detail['win_prize']; ?></h6>
                      </div>
                    </div><?php */?>
                    <div class="col-lg-6 col-md-6 d-flex">
                      <div class="service-content">
                        <h4>Team Limit</h4>
                        <h6><?php echo $master_detail['team_limit']; ?></h6>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 d-flex">
                      <div class="service-content">
                        <h4>Max Team Size</h4>
                        <h6><?php echo $master_detail['max_team_size']; ?></h6>
                      </div>
                    </div>
                    <div class="col-lg-12 col-md-12 d-flex">
                      <div class="service-content">
                        <h4>Additional Information</h4>
                        <h6><?php echo $master_detail['additional_info']; ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item mb-4" id="Categories">
              <h4 class="accordion-header" id="panelsStayOpen-bookcourt">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">Book Event </button>
              </h4>
              <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-bookcourt">
                <div class="accordion-body">
                  <div class="row">
                    <?php			
					$ureb=mysqli_query($con,"select * from event_data where event_id = '$event_id' and status = '1'");
					while($urowb=mysqli_fetch_array($ureb))	{ ?>
                    <div class="col-lg-6 col-md-6 d-flex" <?php if(isMobileDevice()) { ?> style="width:50%" <?php } ?>>
                      <div class="service-content">
                        <h3><?php echo $urowb['data_title']; ?></h3>
                        <h6><?php echo $urowb['data_description']; ?></h6>
                        <h6 style="margin-top:10px;">Max Player : <?php echo $urowb['data_max_player']; ?></h6>
                        <h5>Rs. <?php echo $urowb['data_fees']; ?></h5>
                        <a href="<?php echo $siteurl_link; ?>/event-book.php?id=<?php echo $urowb[0]; ?>" class="btn btn-mini btn-primary" style="padding:6px 10px">Book Now</a> </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item mb-4" id="rules">
              <h4 class="accordion-header" id="panelsStayOpen-rules">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree"> Rules </button>
              </h4>
              <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-rules">
                <div class="accordion-body">
                  <ul>
                    <?php								 
						$ure=mysqli_query($con,"select * from event_rules where event_id = '$event_id'");
						while($urow=mysqli_fetch_array($ure)) { ?>
                    <li>
                      <p><i class="feather-alert-octagon"></i><?php echo $urow['name']; ?></p>
                    </li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
            </div>
            <div class="accordion-item mb-0" id="location">
              <h4 class="accordion-header" id="panelsStayOpen-location">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false" aria-controls="panelsStayOpen-collapseSeven"> Location </button>
              </h4>
              <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-location">
                <div class="accordion-body">
                  <div class="dull-bg d-flex justify-content-start align-items-center mb-0">
                    <div class="white-bg me-2"> <i class="fas fa-location-arrow"></i> </div>
                    <div class="">
                      <h6>Event Location</h6>
                      <p><?php echo $master_detail['address']; ?> <?php echo $master_detail['state']; ?> <?php echo $master_detail['city']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="accordion-item mb-4" id="contact">
              <h4 class="accordion-header" id="panelsStayOpen-contact">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false" aria-controls="panelsStayOpen-collapseSeven"> Contact Detail </button>
              </h4>
              <style>.service-content { background-color:#f5f5f5; padding:10px; border-radius:10px; width:100%; margin-bottom:10px; } </style>
              <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-short-bio">
                <div class="accordion-body">
                  <div class="row">
                    
                    
                    <div class="col-lg-6 col-md-6 d-flex">
                      <div class="service-content">
                        <h4>Contact Person Name</h4>
                        <h6><?php echo $master_detail['cp_name']; ?></h6>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 d-flex">
                      <div class="service-content">
                        <h4>Contact Person Mobile</h4>
                        <h6><?php echo $master_detail['cp_mobile']; ?></h6>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 d-flex">
                      <div class="service-content">
                        <h4>Contact Person Email</h4>
                        <h6><?php echo $master_detail['cp_email']; ?></h6>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          <!-- Accordian Contents -->
        </div>
        <aside class="col-12 col-sm-12 col-md-12 col-lg-4 theiaStickySidebar">
          <?php /*?><div class="white-bg">
            <h4 class="border-bottom">Book A Coach</h4>
            <p><strong><?php echo $urow['name']; ?></strong> Available Now </p>
            <div class="dull-bg text-center">
              <p class="mb-1">Start’s From</p>
              <h4 class="d-inline-block primary-text mb-0">Rs. <?php echo $coaching_fees = $urow['coaching_fees']; ?></h4>
              <span>/hr</span> </div>
            <script type="text/javascript">  
function doCalc(form) {
  var amt  = parseFloat(form.qty.value) * parseFloat(form.price.value); 
  form.total.value = amt.toFixed(2);
}  
</script>
            <script type="text/javascript" language="javascript">
function validateForm()
{
var x=document.forms["form"]["email"].value;
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
            <form name="form" method="post" onSubmit="return validateForm()" style="margin-top:5px;">
              <div class="mb-10">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" required>
              </div>
              <div class="mb-10">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
              </div>
              <div class="mb-10">
                <label for="name" class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="mobile" id="mobile" onKeyPress="return isNumberKey(event)" maxlength="10" required>
              </div>
              <div class="mb-10">
                <label for="name" class="form-label">Date & Time</label>
                <input type="datetime-local" class="form-control" name="booking_datetime" required min="<?php echo date('Y-m-d'); ?>T00:00"
>
              </div>
              <div class="mb-10">
                <label for="name" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" required value="<?php echo $coaching_fees; ?>" readonly>
              </div>
              <div class="mb-10" >
                <label for="name" class="form-label">No of Person</label>
                <input type="text" class="form-control" name="qty" required onKeyUp="doCalc(this.form)">
              </div>
              <div class="mb-10" >
                <label for="name" class="form-label">Total Amount</label>
                <input type="text" class="form-control" name="total" required>
              </div>
              <div class="d-grid btn-block">
                <input type="submit" class="btn btn-secondary d-inline-flex justify-content-center align-items-center" name="book" value="Book Now">
              </div>
            </form>
            <?php 


if ($_POST['book']) 
{
$sql=("INSERT INTO `coach_booked` (  `name`, `email`, `mobile`, `price`, `qty`,`total`,`ins_datetime`,`coach_id`,`manager_id`,`venue_id`,`booking_datetime`) VALUES ( '".mysqli_real_escape_string($con,$_REQUEST['name'])."','".mysqli_real_escape_string($con,$_REQUEST['email'])."','".mysqli_real_escape_string($con,$_REQUEST['mobile'])."','".mysqli_real_escape_string($con,$_REQUEST['price'])."','".mysqli_real_escape_string($con,$_REQUEST['qty'])."','".mysqli_real_escape_string($con,$_REQUEST['total'])."','$todaydatetime','$coach_id','$manager_id','$venue_id','".mysqli_real_escape_string($con,$_REQUEST['booking_datetime'])."')");	 
$z = mysqli_query($con,$sql);
?>
            <script>alert('Your Coach Booked With Us. We Will Give You Confirmation on Email');</script>
            <script language="javascript">window.location.href="coach-detail.php?id=<?php echo $_GET['id']; ?>";</script>
            <?php  } ?>
          </div><?php */?>
          <div class="white-bg">
            <h4 class="border-bottom">Quick Inquiry</h4>
            <form name="form" method="post">
              <div class="mb-10">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" required>
              </div>
              <div class="mb-10">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
              </div>
              <div class="mb-10">
                <label for="name" class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="mobile" required>
              </div>
              <div class="mb-10">
                <label for="comments" class="form-label">Details</label>
                <textarea class="form-control" name="comments" rows="3" required></textarea>
              </div>
              <div class="d-grid btn-block">
                <input type="submit" class="btn btn-secondary d-inline-flex justify-content-center align-items-center" name="send_event_inquiry">
              </div>
            </form>
            <?php 
if ($_POST['send_event_inquiry']) 
{
$sql=("INSERT INTO `event_inquiry` (  `name`, `email`, `mobile`, `subject`, `comments`,`ins_datetime`,`event_id`,`manager_id`) VALUES ( '".mysqli_real_escape_string($con,$_REQUEST['name'])."','".mysqli_real_escape_string($con,$_REQUEST['email'])."','".mysqli_real_escape_string($con,$_REQUEST['mobile'])."','".mysqli_real_escape_string($con,$_REQUEST['subject'])."','".mysqli_real_escape_string($con,$_REQUEST['comments'])."','$todaydatetime','$event_id','$manager_id')");	 
$z = mysqli_query($con,$sql);
?>
            <script>alert('Thank you for Contact to Us');</script>
            <script language="javascript">window.location.href="<?php echo $siteurl_link; ?>/event/<?php echo $_GET['id']; ?>";</script>
            <?php  } ?>
          </div>
          <div class="white-bg">
            <h4 class="border-bottom">Share Event</h4>
            <div class="a2a_kit a2a_kit_size_32 a2a_default_style"> <a class="a2a_button_facebook"></a> <a class="a2a_button_email"></a> <a class="a2a_button_whatsapp"></a> <a class="a2a_button_linkedin"></a> <a class="a2a_button_threads"></a> <a class="a2a_button_x"></a> </div>
            <script defer src="https://static.addtoany.com/menu/page.js"></script>
          </div>
        </aside>
      </div>
      <!-- /Row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /Page Content -->
  <!-- Footer -->
  <?php include 'footer.php' ?>
  <!-- /Footer -->
  <!-- Add Review Modal -->
  
  <!-- /Add Review Modal -->
</div>
<!-- /Main Wrapper -->
<!-- jQuery -->
<script src="<?php echo $siteurl_link; ?>/assets/js/jquery-3.7.1.min.js" type="326337f23c980d7f818a342d-text/javascript"></script>
<!-- Bootstrap Core JS -->
<script src="<?php echo $siteurl_link; ?>/assets/js/bootstrap.bundle.min.js" type="326337f23c980d7f818a342d-text/javascript"></script>
<!-- Owl Carousel JS -->
<script src="<?php echo $siteurl_link; ?>/assets/plugins/owl-carousel/owl.carousel.min.js" type="326337f23c980d7f818a342d-text/javascript"></script>
<!-- Select JS -->
<script src="<?php echo $siteurl_link; ?>/assets/plugins/select2/js/select2.min.js" type="326337f23c980d7f818a342d-text/javascript"></script>
<!-- Fancybox JS -->
<script src="<?php echo $siteurl_link; ?>/assets/plugins/fancybox/jquery.fancybox.min.js" type="326337f23c980d7f818a342d-text/javascript"></script>
<!-- Sticky Sidebar JS -->
<script src="<?php echo $siteurl_link; ?>/assets/plugins/theia-sticky-sidebar/ResizeSensor.js" type="326337f23c980d7f818a342d-text/javascript"></script>
<script src="<?php echo $siteurl_link; ?>/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js" type="326337f23c980d7f818a342d-text/javascript"></script>
<!-- Custom JS -->
<script src="<?php echo $siteurl_link; ?>/assets/js/script.js" type="326337f23c980d7f818a342d-text/javascript"></script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="326337f23c980d7f818a342d-|49" defer></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"93b856c28903c188","version":"2025.4.0-1-g37f21b1","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>
</html>
