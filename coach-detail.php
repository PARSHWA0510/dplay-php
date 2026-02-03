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
<title>Coach Detail</title>
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
  <div class="banner"> <img src="<?php echo $siteurl_link; ?>/assets/img/bg/coach-detail-bg.jpg" alt="Banner" > </div>
  <!-- Page Content -->
  <div class="content">
    <div class="container">
      <!-- Row -->
      <div class="row move-top">
        <?php $id = $_GET['id'];								 
		$ure=mysqli_query($con,"select * from user_master where seo_url = '$id'");
		$urow=mysqli_fetch_array($ure); $manager_id = $urow['manager_id']; $venue_id = $urow['venue_id'];
		$coach_id = $urow[0];
		$urex=mysqli_query($con,"select * from coach_review where coach_id = '$coach_id' and status = '1'");
		$urowxno=mysqli_num_rows($urex);
		
		$urex=mysqli_query($con,"select SUM(rating) from coach_review where coach_id = '$coach_id' and status = '1'");
		$urowx=mysqli_fetch_array($urex);
		$total_rating = $urowx['SUM(rating)']; ?>
        <div class="col-12 col-sm-12 col-md-12 col-lg-8">
          <div class="dull-bg corner-radius-10 coach-info d-md-flex justify-content-start align-items-start">
            <div class="profile-pic"><img alt="User" class="corner-radius-10" src="<?php echo $siteurl_link; ?>/images/<?php echo $urow['photo']; ?>" style="width:200px"></div>
            <div class="info w-100">
              <div class="d-sm-flex justify-content-between align-items-start">
                <h3 class="d-flex align-items-center justify-content-start mb-0"><?php echo $urow['name']; ?><span class="d-flex justify-content-center align-items-center"><i class="fas fa-check-double"></i></span></h3>
                <?php /*?><a href="javascript:;"><span class="favourite fav-icon"><i class="feather-star"></i>Favourite</span></a><?php */?> </div>
              <p><?php echo $urow['short_info']; ?></p>
              <ul class="d-sm-flex align-items-center">
                <li class="d-flex align-items-center">
                  <div class="white-bg d-flex align-items-center review">
                    <?php if($urowxno != '0') { ?>
                    <span class="white-bg dark-yellow-bg d-flex align-items-center"><?php echo round($total_rating / $urowxno,1); ?></span>
                    <?php } ?>
                    <span><?php echo $urowxno; ?> Reviews</span> </div>
                </li>
                <li><img src="<?php echo $siteurl_link; ?>/assets/img/icons/flag-01.png" style="width:20px" alt="Icon"><?php echo $urow['address']; ?></li>
              </ul>
              <hr>
              <ul class="d-xl-flex">
                <li class="d-flex align-items-center"><img src="<?php echo $siteurl_link; ?>/assets/img/icons/expert.svg" alt="Icon">Rank : Expert</li>
                <li class="d-flex align-items-center"><img src="<?php echo $siteurl_link; ?>/assets/img/icons/since.svg" alt="Icon">With Us : Since <?php echo date("d M Y", strtotime($urow['join_date'])); ?></li>
              </ul>
            </div>
          </div>
          <div class="venue-options white-bg mb-4">
            <ul class="clearfix">
              <li class="active"><a href="#short-bio">About Me</a></li>
              <li><a href="#gallerys">Gallery</a></li>
              <li><a href="#bookbatch">Book Batch</a></li>
              <li><a href="#location">Locations</a></li>
              <li><a href="#reviews">Reviews</a></li>
            </ul>
          </div>
          <!-- Accordian Contents -->
          <div class="accordion" id="accordionPanel">
            <div class="accordion-item mb-4" id="short-bio">
              <h4 class="accordion-header" id="panelsStayOpen-short-bio">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne"> About Me </button>
              </h4>
              <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-short-bio">
                <div class="accordion-body"> <?php echo $urow['additional_info']; ?> </div>
              </div>
            </div>
            <div class="accordion-item mb-4" id="gallerys">
              <h4 class="accordion-header" id="panelsStayOpen-gallery">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive"> Gallery </button>
              </h4>
              <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-gallery">
                <div class="accordion-body">
                  <div class="row">
                    <?php								 
                        $ureg=mysqli_query($con,"select * from user_photo where user_id = '$coach_id' order by ABS(id) desc");
                        while($urowg=mysqli_fetch_array($ureg)) { ?>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4"> <img src="<?php echo $siteurl_link; ?>/images/<?php echo $urowg['image']; ?>" style="margin-bottom:10px;"> </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="accordion-item mb-4" id="bookbatch">
              <h4 class="accordion-header" id="panelsStayOpen-bookcourt">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">Book Batch </button>
              </h4>
              <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-bookcourt">
                <div class="accordion-body">
                  <div class="row">
                    <?php			
					$cur_date = date('Y-m-d');					 
					$ureb=mysqli_query($con,"select * from coach_batch where coach_id = '$coach_id' and end_date >= '$cur_date'");
					while($urowb=mysqli_fetch_array($ureb))	{ $batch_id = $urowb[0]; ?>
                    <div class="col-lg-4 col-md-6 d-flex" <?php if(isMobileDevice()) { ?> style="width:50%" <?php } ?>>
                      <div class="service-content">
                        <h3><?php echo $urowb['name']; ?></h3>
                        <h6><?php echo date("d-m-y", strtotime($urowb['start_date'])); ?> To <?php echo date("d-m-y", strtotime($urowb['end_date'])); ?></h6>
                        <h6><?php echo date("h:i A", strtotime($urowb['start_time'])); ?> To <?php echo date("h:i A", strtotime($urowb['end_time'])); ?></h6>
                        <?php 
						$urebd=mysqli_query($con,"select * from coach_batch_date where batch_id = '$batch_id' group by batch_day order by batch_date asc");
						while($urowbd=mysqli_fetch_array($urebd)) { ?>
                        <span class="btn btn-mini btn-primary" style="padding:2px; font-size:11px"><?php echo $urowbd['batch_day']; ?></span>&nbsp;
                        <?php } ?>
                        <h6 style="margin-top:10px;">No of Session : <?php echo $urowb['noof_session']; ?></h6>
                        <h5>Rs. <?php echo $urowb['amount']; ?></h5>
                        <a href="<?php echo $siteurl_link; ?>/coach-book.php?id=<?php echo $urowb[0]; ?>" class="btn btn-mini btn-primary" style="padding:6px 10px">Book Now</a> </div>
                    </div>
                    <?php } ?>
                  </div>
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
                      <h6>Coaching Location</h6>
                      <p><?php echo $urow['address']; ?> <?php echo $urow['state']; ?> <?php echo $urow['city']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item mb-4" id="reviews">
              <div class="accordion-header" id="panelsStayOpen-reviews">
                <div class="accordion-button d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-controls="panelsStayOpen-collapseSix"> <span class="w-75 mb-0"> Reviews </span> </div>
                <a href="javascript:void(0);" class="btn btn-gradient pull-right write-review add-review" data-bs-toggle="modal" data-bs-target="#add-review">Write a review</a> </div>
              <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-reviews">
                <div class="accordion-body">
                  <div class="row review-wrapper">
                    <div class="col-lg-3">
                      <div class="ratings-info corner-radius-10 text-center">
                        <h3>
                          <?php if($urowxno != '0') { ?>
                          <?php echo round($total_rating / $urowxno,1); ?>
                          <?php } else { echo '0'; } ?>
                        </h3>
                        <span>out of 5.0</span>
                        <div class="rating"> <i class="fas fa-star filled"></i> <i class="fas fa-star filled"></i> <i class="fas fa-star filled"></i> <i class="fas fa-star filled"></i> <i class="fas fa-star filled"></i> </div>
                      </div>
                    </div>
                    <div class="col-lg-9">
                      <div class="recommended">
                        <h5>Recommended by 97% of Players</h5>
                        <div class="row">
                          <div class="col-12 col-sm-12 col-md-4 col-lg-4 mb-3">
                            <p class="mb-0">Quality of service</p>
                            <ul>
                              <li><i></i></li>
                              <li><i></i></li>
                              <li><i></i></li>
                              <li><i></i></li>
                              <li><i></i></li>
                              <li><span>5.0</span></li>
                            </ul>
                          </div>
                          <div class="col-12 col-sm-12 col-md-4 col-lg-4 mb-3">
                            <p class="mb-0">Quality of service</p>
                            <ul>
                              <li><i></i></li>
                              <li><i></i></li>
                              <li><i></i></li>
                              <li><i></i></li>
                              <li><i></i></li>
                              <li><span>5.0</span></li>
                            </ul>
                          </div>
                          <div class="col-12 col-sm-12 col-md-4 col-lg-4 mb-3">
                            <p class="mb-0">Quality of service</p>
                            <ul>
                              <li><i></i></li>
                              <li><i></i></li>
                              <li><i></i></li>
                              <li><i></i></li>
                              <li><i></i></li>
                              <li><span>5.0</span></li>
                            </ul>
                          </div>
                          <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                            <p class="mb-0">Quality of service</p>
                            <ul>
                              <li><i></i></li>
                              <li><i></i></li>
                              <li><i></i></li>
                              <li><i></i></li>
                              <li><i></i></li>
                              <li><span>5.0</span></li>
                            </ul>
                          </div>
                          <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                            <p class="mb-0">Quality of service</p>
                            <ul>
                              <li><i></i></li>
                              <li><i></i></li>
                              <li><i></i></li>
                              <li><i></i></li>
                              <li><i></i></li>
                              <li><span>5.0</span></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php								 
				$urer=mysqli_query($con,"select * from coach_review where status = '1' and coach_id = '$coach_id' order by ins_datetime desc");
				while($urowr=mysqli_fetch_array($urer)) { ?>
                  <div class="review-box d-md-flex">
                    <div class="review-profile"> <img src="<?php echo $siteurl_link; ?>/assets/img/profiles/avatar-01.jpg" alt="User"> </div>
                    <div class="review-info">
                      <h6 class="mb-2 tittle"><?php echo $urowr['name']; ?> Reviews on <?php echo date("d M Y", strtotime($urowr['ins_datetime'])); ?></h6>
                      <div class="rating"> <i class="fas fa-star filled"></i> <i class="fas fa-star filled"></i> <i class="fas fa-star filled"></i> <i class="fas fa-star filled"></i> <i class="fas fa-star filled"></i> <span class=""><?php echo $urowr['rating']; ?>.0</span> </div>
                      <p><?php echo $urowr['remarks']; ?></p>
                    </div>
                  </div>
                  <?php } ?>
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
            <h4 class="border-bottom">Request for Availability</h4>
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
                <input type="submit" class="btn btn-secondary d-inline-flex justify-content-center align-items-center" name="send_coach">
              </div>
            </form>
            <?php 
if ($_POST['send_coach']) 
{
 $sql=("INSERT INTO `coach_inquiry` (  `name`, `email`, `mobile`, `subject`, `comments`,`ins_datetime`,`coach_id`,`manager_id`) VALUES ( '".mysqli_real_escape_string($con,$_REQUEST['name'])."','".mysqli_real_escape_string($con,$_REQUEST['email'])."','".mysqli_real_escape_string($con,$_REQUEST['mobile'])."','".mysqli_real_escape_string($con,$_REQUEST['subject'])."','".mysqli_real_escape_string($con,$_REQUEST['comments'])."','$todaydatetime','$coach_id','$manager_id')");	 
$z = mysqli_query($con,$sql);

//exit();
?>
            <script>alert('Thank you for Contact to Us');</script>
            <script language="javascript">window.location.href="<?php echo $siteurl_link; ?>/coach/<?php echo $_GET['id']; ?>";</script>
            <?php  } ?>
          </div>
          <div class="white-bg">
            <h4 class="border-bottom">Share Coach</h4>
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
  <div class="modal custom-modal fade payment-modal" id="add-review" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <div class="form-header modal-header-title">
            <h4 class="mb-0">Write a Review</h4>
          </div>
          <a  class="close" data-bs-dismiss="modal" aria-label="Close"> <span class="align-center" aria-hidden="true"><i class="feather-x"></i></span> </a> </div>
        <div class="modal-body">
          <form name="form" method="post">
            <div class="row">
              <div class="col-lg-6">
                <div class="input-space">
                  <label  class="form-label">Your Name <span>*</span></label>
                  <input type="text" class="form-control" name="name" required>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="input-space">
                  <label  class="form-label">Your Mobile No <span>*</span></label>
                  <input type="text" class="form-control" name="mobile" required>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="input-space">
                  <label  class="form-label">Your Review <span>*</span></label>
                  <textarea class="form-control" name="remarks" required rows="3"></textarea>
                  <small class="text-muted"><span id="chars">100</span> characters remaining</small> </div>
              </div>
              <div class="col-lg-12">
                <div class="input-space review">
                  <label  class="form-label">Rating <span>*</span></label>
                  <div class="star-rating">
                    <input id="star-5" type="radio" name="rating" value="5">
                    <label for="star-5" title="5 stars"> <i class="active fa fa-star"></i> </label>
                    <input id="star-4" type="radio" name="rating" value="4">
                    <label for="star-4" title="4 stars"> <i class="active fa fa-star"></i> </label>
                    <input id="star-3" type="radio" name="rating" value="3">
                    <label for="star-3" title="3 stars"> <i class="active fa fa-star"></i> </label>
                    <input id="star-2" type="radio" name="rating" value="2">
                    <label for="star-2" title="2 stars"> <i class="active fa fa-star"></i> </label>
                    <input id="star-1" type="radio" name="rating" value="1">
                    <label for="star-1" title="1 star"> <i class="active fa fa-star"></i> </label>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="table-accept-btn">
                  <input type="submit" class="btn btn-primary" value="Add Review" name="submit_review">
                </div>
              </div>
            </div>
          </form>
          <?php 
if ($_POST['submit_review']) 
{
$sql=("INSERT INTO `coach_review` (  `name`, `coach_id`, `mobile`, `rating`, `remarks`,`ins_datetime`,`manager_id`,`venue_id`) VALUES ( '".mysqli_real_escape_string($con,$_REQUEST['name'])."','$coach_id','".mysqli_real_escape_string($con,$_REQUEST['mobile'])."','".mysqli_real_escape_string($con,$_REQUEST['rating'])."','".mysqli_real_escape_string($con,$_REQUEST['remarks'])."','$todaydatetime','$manager_id','$venue_id')");	 
$z = mysqli_query($con,$sql);
?>
          <script>alert('Thank you for Submit Review');</script>
          <script language="javascript">window.location.href="coach-detail.php?id=<?php echo $_GET['id']; ?>";</script>
          <?php  } ?>
        </div>
      </div>
    </div>
  </div>
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
