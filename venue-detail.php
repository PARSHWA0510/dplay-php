<?php  error_reporting(0); session_start(); include('config.php');
if(empty($_SESSION['cartid']))
{
$_SESSION['cartid'] = uniqid();
}
$cartid = $_SESSION['cartid']; 
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
<?php $id = $_GET['id'];
$master = mysqli_query($con,"SELECT * FROM venue_master WHERE seo_url = '$id'");
$master_detail = mysqli_fetch_array($master);
$venue_id = $master_detail[0];
$manager_id = $master_detail['manager_id'];
?>
<title><?php echo $master_detail['seo_title']; ?></title>
<meta name="keywords" content="<?php echo $master_detail['seo_keyword']; ?>">
<meta name="description" content="<?php echo $master_detail['seo_description']; ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Dreamguys - DreamSports">
<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
<link rel="apple-touch-icon" sizes="120x120" href="assets/img/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="152x152" href="assets/img/apple-touch-icon-152x152.png">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="assets/plugins/owl-carousel/owl.carousel.min.css">
<link rel="stylesheet" href="assets/plugins/owl-carousel/owl.theme.default.min.css">
<!-- Select CSS -->
<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
<!-- Bootstrap DateTime Picker -->
<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
<!-- Fontawesome CSS -->
<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
<!-- Feathericon CSS -->
<link rel="stylesheet" href="assets/css/feather.css">
<!-- Fancybox CSS -->
<link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css">
<!-- Main CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<style>
#bookcourt,#bookmembership,#callnow 
{
scroll-behavior: smooth;
scroll-margin-top:80px;
}
</style>
</head>
<body>
<?php /*?><div id="global-loader" >
  <div class="loader-img"> <img src="assets/img/loader.png" class="img-fluid" alt="Global"> </div>
</div><?php */?>
<!-- Main Wrapper -->
<div class="main-wrapper venue-coach-details">
  <!-- Header -->
  <?php include 'header.php' ?>
  <div class="bannergallery-section">
    <div class="main-gallery-slider owl-carousel owl-theme">
      <?php								 
		$ure=mysqli_query($con,"select * from venue_photo where venue_id = '$venue_id'");
		while($urow=mysqli_fetch_array($ure)) { ?>
      <div class="gallery-widget-item"> <a href="images/<?php echo $urow['image']; ?>" data-fancybox="gallery1"> <img class="img-fluid" alt="Image" src="images/<?php echo $urow['image']; ?>" style="height:250px;"> </a> </div>
      <?php } ?>
    </div>
    <?php 
	$ure=mysqli_query($con,"select * from venue_photo where venue_id = '$venue_id'");
	$urow=mysqli_fetch_array($ure); ?>
    <div class="showphotos corner-radius-10"> <a href="images/<?php echo $urow['image']; ?>" data-fancybox="gallery1"><i class="fa-regular fa-images"></i>More Photos</a> </div>
  </div>
  <div class="venue-info white-bg d-block">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
          <h1 class="d-flex align-items-center justify-content-start"><?php echo $master_detail['name']; ?><span class="d-flex justify-content-center align-items-center"><i class="fas fa-check-double"></i></span></h1>
          <ul class="d-sm-flex justify-content-start align-items-center">
            <li><i class="feather-map-pin"></i><?php echo $master_detail['address']; ?></li>
            <li><i class="feather-phone-call"></i><?php echo $master_detail['contact1']; ?></li>
            <li><i class="feather-mail"></i><a href="mailto:<?php echo $master_detail['email1']; ?>"><?php echo $master_detail['email1']; ?></a></li>
          </ul>
        </div>
        <?php
		$urex=mysqli_query($con,"select * from venue_review where venue_id = '$venue_id' and status = '1'");
		$urowxno=mysqli_num_rows($urex);
		
		$urex=mysqli_query($con,"select SUM(rating) from venue_review where venue_id = '$venue_id' and status = '1'");
		$urowx=mysqli_fetch_array($urex);
		$total_rating = $urowx['SUM(rating)']; ?>
        <?php if(isMobileDevice()) { } else { ?>
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 text-right">
          <ul class="social-options float-lg-end d-sm-flex justify-content-start align-items-center">
            <?php /*?><li><a href="javascript:void(0);"><i class="feather-share-2"></i>Share</a></li><?php */?>
            <li><a <?php if($user_id != '') { ?> href="venue-favorite.php?id=<?php echo $urow[0]; ?>" <?php } ?> <?php if($user_id == '') { ?> onClick="alert('Please Login First!')" <?php } ?> class="favour-adds"><i class="feather-star"></i>Add to favourite</a></li>
            <li class="venue-review-info d-flex justify-content-start align-items-center"> <span class="d-flex justify-content-center align-items-center">
              <?php if($urowxno != '0') { ?>
              <?php echo $avg_rating = round($total_rating / $urowxno,1); ?>
              <?php } ?>
              </span>
              <div class="review">
                <div class="rating">
                  <?php if($avg_rating == '1') { ?>
                  <i class="fas fa-star filled"></i>
                  <?php } ?>
                  <?php if($avg_rating == '2') { ?>
                  <i class="fas fa-star filled"></i><i class="fas fa-star filled"></i>
                  <?php } ?>
                  <?php if($avg_rating == '3') { ?>
                  <i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i>
                  <?php } ?>
                  <?php if($avg_rating == '4') { ?>
                  <i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i>
                  <?php } ?>
                  <?php if($avg_rating == '5') { ?>
                  <i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i><i class="fas fa-star filled"></i>
                  <?php } ?>
                </div>
                <p class="mb-0"><a href="javascript:;"><?php echo $urowxno; ?> Reviews</a></p>
              </div>
              <i class="fa-regular fa-comments"></i> </li>
          </ul>
        </div>
        <?php } ?>
      </div>
      <?php /*?><div class="row bottom-row d-flex align-items-center">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
          <ul class="d-sm-flex details">
            <li>
              <div class="profile-pic"> <a href="javascript:void(0);" class="venue-type"><img class="img-fluid"  src="assets/img/icons/venue-type.svg" alt="Icon"></a> </div>
              <div class="ms-2">
                <p>Venue Type</p>
                <h6 class="mb-0">Indoor</h6>
              </div>
            </li>
            <li>
              <div class="profile-pic"> <a href="javascript:void(0);"><img class="img-fluid"  src="assets/img/profiles/avatar-01.jpg" alt="Icon"></a> </div>
              <div class="ms-2">
                <p>Added By</p>
                <h6 class="mb-0">Hendry Williams</h6>
              </div>
            </li>
          </ul>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
          <div class="d-flex float-sm-end align-items-center">
            <p class="d-inline-block me-2 mb-0">Starts From :</p>
            <h3 class="primary-text mb-0 d-inline-block">$150<span>/ hr</span></h3>
          </div>
        </div>
      </div><?php */?>
    </div>
  </div>
  <!-- Page Content -->
  <div class="content">
    <div class="container">
      <!-- Row -->
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-8">
          <div class="venue-options white-bg mb-4">
          <?php if(isMobileDevice()) { ?>
          <style>
		  .venue-coach-details .venue-options ul li a {  padding: 8px 8px !important; font-size: 13px !important; } 
          .venue-coach-details .accordion .accordion-item .accordion-header .accordion-button { padding: 10px 0 10px 0 !important; font-size: 15px !important; } </style>
          <?php } ?>
            <ul class="clearfix">
              <li class="active"><a href="#overview">Overview</a></li>
              <li><a href="#sport">Sport</a></li>
              <li><a href="#bookcourt">Court</a></li>
              <li><a href="#includes">Includes</a></li>
              <li><a href="#rules">Rules</a></li>
              <li><a href="#amenities">Amenities</a></li>
              <li><a href="#reviews">Reviews</a></li>
              <li><a href="#location">Locations</a></li>
            </ul>
          </div>
          <!-- Accordian Contents -->
          <div class="accordion" id="accordionPanel">
            <div class="accordion-item mb-4" id="overview">
              <h4 class="accordion-header" id="panelsStayOpen-overview">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne"> Overview </button>
              </h4>
              <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-overview">
                <div class="accordion-body">
                  <div class="text show-more-height"> <?php echo $master_detail['about_venue']; ?> </div>
                  <div class="show-more d align-items-center primary-text"><i class="feather-plus-circle"></i>Show More</div>
                </div>
              </div>
            </div>
            <div class="accordion-item mb-4" id="sport">
              <h4 class="accordion-header" id="panelsStayOpen-sport">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive"> Sport Available </button>
              </h4>
              <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-sport">
                <div class="accordion-body">
                  <ul class="d-md-flex align-items-center">
                    <?php	 
						$ure=mysqli_query($con,"select * from venue_sporttype where venue_id = '$venue_id' order by sport_type asc");
						while($urow=mysqli_fetch_array($ure))
						{ $sport_type = $urow['sport_type'];
						$urex=mysqli_query($con,"select * from sport_type where name = '$sport_type'");
						$urowx=mysqli_fetch_array($urex);
						 ?>
                    <li style="padding-right:20px;"><img src="images/<?php echo $urowx['icon']; ?>" width="35"> <?php echo $sport_type; ?></li>
                    <?php } ?>
                  </ul>
                  <?php /*?><div class="owl-carousel gallery-slider owl-theme"> 
                  <?php								 
				$ure=mysqli_query($con,"select * from venue_photo where venue_id = '$venue_id'");
				while($urow=mysqli_fetch_array($ure)) { ?>
                  <a class="corner-radius-10" href="images/<?php echo $urow['image']; ?>" data-fancybox="gallery3"> <img class="img-fluid corner-radius-10" alt="Image" src="images/<?php echo $urow['image']; ?>"> </a> 
                  <?php } ?>
                   </div><?php */?>
                </div>
              </div>
            </div>
            <div class="accordion-item mb-4" id="bookcourt">
              <h4 class="accordion-header" id="panelsStayOpen-bookcourt">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">Book A Court </button>
              </h4>
              <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-bookcourt">
              <div class="accordion-body">
                  <div class="text show-more-height"> <?php echo $master_detail['note_court']; ?> </div>
                  
                </div>
                <div class="accordion-body">
                  <div class="row">
                    <?php								 
		$ure=mysqli_query($con,"select * from court_master where status = '1' and venue_id = '$venue_id'");
		while($urow=mysqli_fetch_array($ure))	{ ?>
                    <div class="col-lg-4 col-md-6 d-flex" <?php if(isMobileDevice()) { ?> style="width:50%" <?php } ?>>
                      <div class="service-content">
                        <h3><a href="court-book.php?id=<?php echo $urow[0]; ?>"><?php echo $urow['name']; ?> </a></h3>
                        <h6><?php echo date("h:i A", strtotime($urow['start_time'])); ?> To <?php echo date("h:i A", strtotime($urow['end_time'])); ?></h6>
                        <?php 
						$ure1=("select * from promocode_venue where venue_id = '$venue_id'");
						$uree1 = mysqli_query($con,$ure1);
						$urowno1=mysqli_num_rows($uree1);
						$urows=mysqli_fetch_array($uree1);
						$promo_code = $urows['promo_code']; 
						$ure2=("select * from promocode_master where name = '$promo_code' and discount_start <= '$today_date' and discount_end >= '$today_date'");
						$uree2 = mysqli_query($con,$ure2);
						$urowno2=mysqli_num_rows($uree2);
						if($urowno1 == '0' || $urowno2 == '0') 
						{ } else { ?>
                        <b style="color:#FF0000; font-size:13px;">Discount : <?php
						$urow2=mysqli_fetch_array($uree2);
						$discount_per = $urow2['discount_per']; 
						$discount_rs = $urow2['discount_rs']; 
						if($discount_per != '0')
						{
						echo $c1 = $discount_per.'%'; 
						}
						else
						{
						echo $c1 = 'Rs'.$discount_rs; ?>
						<?php } ?> </b> <br><?php } ?>
                        <a href="court-book.php?id=<?php echo $urow[0]; ?>&date=<?php echo date('Y-m-d'); ?>" class="btn btn-mini btn-primary" style="padding:6px 10px">Book Now</a> </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item mb-4" id="includes">
              <h4 class="accordion-header" id="panelsStayOpen-includes">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo"> Includes </button>
              </h4>
              <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-includes">
                <div class="accordion-body">
                  <ul class="clearfix">
                    <?php								 
						$ure=mysqli_query($con,"select * from venue_includes where venue_id = '$venue_id' and status = '1'");
						while($urow=mysqli_fetch_array($ure)) { ?>
                    <li><i class="feather-check-square"></i><?php echo $urow['name']; ?></li>
                    <?php } ?>
                  </ul>
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
						$ure=mysqli_query($con,"select * from venue_rules where venue_id = '$venue_id'");
						while($urow=mysqli_fetch_array($ure)) { ?>
                    <li>
                      <p><i class="feather-alert-octagon"></i><?php echo $urow['name']; ?></p>
                    </li>
                    <?php } ?>
                  </ul>
                </div>
              </div>
            </div>
            <div class="accordion-item mb-4" id="amenities">
              <h4 class="accordion-header" id="panelsStayOpen-amenities">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour"> Amenities </button>
              </h4>
              <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-amenities">
                <div class="accordion-body">
                <?php if(isMobileDevice()) { ?>
                <div class="row">
                    <?php								 
					$urex=mysqli_query($con,"select * from venue_amenities where venue_id = '$venue_id'");
					while($urowx=mysqli_fetch_array($urex)) 
					{ 
                    $amenities = $urowx['amenities'];    
					$ure=mysqli_query($con,"select * from amenities_master where name = '$amenities'");
					$urow=mysqli_fetch_array($ure); ?>
                    <div class="col-lg-4 col-md-6" <?php if(isMobileDevice()) { ?> style="width:33%; border:solid 1px #f5f5f5; margin-bottom:5px;" <?php } ?>>
                      <center>
                        <img src="images/<?php echo $urow['image']; ?>" width="35"><br/>
                      <?php echo $amenities; ?></center> 
                    </div>
                    <?php } ?>
                  </div>
                  <?php } else { ?>
                  <ul class="d-md-flex  align-items-center">
                    <?php								 
					$urex=mysqli_query($con,"select * from venue_amenities where venue_id = '$venue_id' limit 0,5");
					while($urowx=mysqli_fetch_array($urex)) 
					{ 
                    $amenities = $urowx['amenities'];    
					$ure=mysqli_query($con,"select * from amenities_master where name = '$amenities'");
					$urow=mysqli_fetch_array($ure); ?>
                    <li style="text-align:center; padding-left:10px; padding-right:10px; width:120px"><img src="images/<?php echo $urow['image']; ?>" width="35"><br/>
                      <?php echo $amenities; ?></li>
                    <?php } ?>
                  </ul>
                  <ul class="d-md-flex align-items-center" style="margin-top:10px;">
                    <?php								 
					$urex=mysqli_query($con,"select * from venue_amenities where venue_id = '$venue_id' limit 5,5");
					while($urowx=mysqli_fetch_array($urex)) 
					{ 
                    $amenities = $urowx['amenities'];    
					$ure=mysqli_query($con,"select * from amenities_master where name = '$amenities'");
					$urow=mysqli_fetch_array($ure); ?>
                    <li style="text-align:center; padding-left:10px; padding-right:10px; width:120px"><img src="images/<?php echo $urow['image']; ?>" width="35"><br/>
                      <?php echo $amenities; ?></li>
                    <?php } ?>
                  </ul>
                  <ul class="d-md-flex align-items-center" style="margin-top:10px;">
                    <?php								 
					$urex=mysqli_query($con,"select * from venue_amenities where venue_id = '$venue_id' limit 10,5");
					while($urowx=mysqli_fetch_array($urex)) 
					{ 
                    $amenities = $urowx['amenities'];    
					$ure=mysqli_query($con,"select * from amenities_master where name = '$amenities'");
					$urow=mysqli_fetch_array($ure); ?>
                    <li style="text-align:center; padding-left:10px; padding-right:10px; width:120px"><img src="images/<?php echo $urow['image']; ?>" width="35"><br/>
                      <?php echo $amenities; ?></li>
                    <?php } ?>
                  </ul>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="accordion-item mb-4" id="reviews">
              <div class="accordion-header" id="panelsStayOpen-reviews">
                <div class="accordion-button d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-controls="panelsStayOpen-collapseSix"> <span class="w-75 mb-0"> Reviews </span> <a href="javascript:void(0);" class="btn btn-gradient pull-right write-review add-review" data-bs-toggle="modal" data-bs-target="#add-review">Write a review</a> </div>
              </div>
              <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-reviews">
                <div class="accordion-body">
                  <div class="row review-wrapper">
                    <div class="col-lg-3">
                      <div class="ratings-info corner-radius-10 text-center">
                        <h3>
                          <?php $venue_id = $master_detail[0];
$urex=mysqli_query($con,"select * from venue_review where venue_id = '$venue_id' and status = '1'");
$urowxno=mysqli_num_rows($urex);
		
$urex=mysqli_query($con,"select SUM(rating) from venue_review where venue_id = '$venue_id' and status = '1'");
$urowx=mysqli_fetch_array($urex);
$total_rating = $urowx['SUM(rating)']; if($urowxno != '0') { ?>
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
                        <?php $social_facebook = $master_detail['social_facebook']; if($social_facebook != '') { ?>
                        <img src="images/4202110_facebook_logo_social_social media_icon.png" style="width:40px; margin-right:5px;">
                        <?php } ?>
                        <?php $social_instagram = $master_detail['social_instagram']; if($social_instagram != '') { ?>
                        <img src="images/4102579_applications_instagram_media_social_icon.png"style="width:40px; margin-right:5px;">
                        <?php } ?>
                        <?php $social_linkedin = $master_detail['social_linkedin']; if($social_linkedin != '') { ?>
                        <img src="images/5296501_linkedin_network_linkedin logo_icon.png" style="width:40px; margin-right:5px;">
                        <?php } ?>
                        <?php $social_youtube = $master_detail['social_youtube']; if($social_youtube != '') { ?>
                        <img src="images/386762_youtube_video_you tube_icon.png" style="width:40px; margin-right:5px;">
                        <?php } ?>
                        <?php $social_pinterest = $master_detail['social_pinterest']; if($social_pinterest != '') { ?>
                        <img src="images/4745735_online_pin_pinterest_profile_sharing_icon.png" style="width:40px; margin-right:5px;">
                        <?php } ?>
                        <?php $social_x = $master_detail['social_x']; if($social_x != '') { ?>
                        <img src="images/x-twitter-logo-social-media-app-button_197792-9306.png" style="width:40px; margin-right:5px;">
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                  <?php								 
			$ure=mysqli_query($con,"select * from venue_review where status = '1' and venue_id = '$venue_id' order by ins_datetime desc");
			while($urow=mysqli_fetch_array($ure)) { ?>
                  <div class="review-box d-md-flex">
                    <div class="review-profile"> <img src="assets/img/profiles/avatar-01.jpg" alt="User"> </div>
                    <div class="review-info">
                      <h6 class="mb-2 tittle"><?php echo $urow['name']; ?> Booked on <?php echo date("d M Y", strtotime($urow['ins_datetime'])); ?></h6>
                      <div class="rating"> <i class="fas fa-star filled"></i> <i class="fas fa-star filled"></i> <i class="fas fa-star filled"></i> <i class="fas fa-star filled"></i> <i class="fas fa-star filled"></i> <span class=""><?php echo $urow['rating']; ?>.0</span> </div>
                      <span class="success-text"><i class="feather-check"></i>Yes, I would book again.</span>
                      <h6>Absolutely perfect</h6>
                      <p><?php echo $urow['remarks']; ?></p>
                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="accordion-item" id="location">
              <h4 class="accordion-header" id="panelsStayOpen-location">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false" aria-controls="panelsStayOpen-collapseSeven"> Location </button>
              </h4>
              <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-location">
                <div class="accordion-body">
                  <div class="google-maps"> <a href="<?php echo $master_detail['google_map']; ?>" target="_blank">Click To View Location</a> </div>
                  <div class="dull-bg d-flex justify-content-start align-items-center mt-3">
                    <div class="white-bg me-2"> <i class="fas fa-location-arrow"></i> </div>
                    <div class="">
                      <h6>Our Venue Location</h6>
                      <p><?php echo $master_detail['address'];  $manager_id = $master_detail['manager_id']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Accordian Contents -->
        </div>
        <aside class="col-12 col-sm-12 col-md-12 col-lg-4 theiaStickySidebar">
          <div class="white-bg book-court" id="bookmembership">
            <h4 class="border-bottom">Book A Membership</h4>
            <?php echo $master_detail['note_membership']; ?>
            <?php								 
						$ure=mysqli_query($con,"select * from package_user where venue_id = '$venue_id' and status = '1'");
						while($urow=mysqli_fetch_array($ure))
						 {
						?>
            <h5 class="d-inline-block"><?php echo $urow['name']; ?>,</h5>
            <p class="d-inline-block"> available Now</p>
            <p><?php echo $urow['remarks']; ?></p>
            <ul class="d-sm-flex align-items-center justify-content-evenly">
            <?php 
			$urexx=("select * from discount_master where user_id = '$manager_id' and status = '1' and start_date <= '$today_date' and end_date >= '$today_date' and discount_for = 'membership'");
			$urex = mysqli_query($con,$urexx);
			$urowx=mysqli_fetch_array($urex);
			$discount_no=mysqli_num_rows($urex);
			$discount_per = $urowx['discount_per'];
			$discount_rs = $urowx['discount_rs']; ?>
              <?php if($discount_no != '0') { $del1 = '<del>'; $del2 = '</del>'; } else { } ?>    
              <li>
                <h3 class="d-inline-block primary-text">
				<?php echo $del1; ?>Rs. <?php echo $price = $urow['price']; ?><?php echo $del2; ?>
                <?php if($discount_no != '0') 
				{ echo '<br/>Rs. ';
				if($discount_per != '0') { $d1 = $price * $discount_per; $d2 = $d1 / 100; echo $final_dis = ceil($price - $d2); } else { echo $final_dis = ceil($price - $discount_rs); }
				} ?>
                </h3>
                <p>Price</p>
              </li>
              <li> <span><i class="feather-plus"></i></span> </li>
              <li>
                <h4 class="d-inline-block primary-text"><?php echo $urow['session_no']; ?></h4>
                <p>No of Session</p>
              </li>
            </ul>
            <div class="d-grid btn-block mt-3 mb-3"> <a href="membership-buy.php?id=<?php echo $urow[0]; ?>&manager_id=<?php echo $urow['user_id']; ?>" class="btn btn-secondary d-inline-flex justify-content-center align-items-center"><i class="feather-calendar"></i>Book Now</a> </div>
            <?php } ?>
          </div>
          <?php $callbuttton_show = $master_detail['callbuttton_show']; if($callbuttton_show == '1') { ?>
          <div class="white-bg book-court" id="callnow">
            <h4 class="border-bottom">Call Now</h4>
            <div class="d-grid btn-block mt-3 mb-3"> <a href="tel:<?php echo $master_detail['callbuttton_mobile']; ?>" class="btn btn-secondary d-inline-flex justify-content-center align-items-center"><i class="feather-phone"></i><?php echo $master_detail['callbuttton_mobile']; ?></a> </div>
          </div>
          <?php } ?>
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
                <input type="submit" class="btn btn-secondary d-inline-flex justify-content-center align-items-center" name="send">
              </div>
            </form>
            <?php 
if ($_POST['send']) 
{
$sql=("INSERT INTO `venue_inquiry` (  `name`, `email`, `mobile`, `subject`, `comments`,`ins_datetime`,`venue_id`,`manager_id`) VALUES ( '".mysqli_real_escape_string($con,$_REQUEST['name'])."','".mysqli_real_escape_string($con,$_REQUEST['email'])."','".mysqli_real_escape_string($con,$_REQUEST['mobile'])."','".mysqli_real_escape_string($con,$_REQUEST['subject'])."','".mysqli_real_escape_string($con,$_REQUEST['comments'])."','$todaydatetime','$venue_id','$manager_id')");	 
$z = mysqli_query($con,$sql);
?>
            <script>alert('Thank you for Contact to Us');</script>
            <script language="javascript">window.location.href="<?php echo $siteurl_link; ?>/<?php echo $master_detail['seo_url']; ?>";</script>
            <?php  } ?>
          </div>
          <div class="white-bg">
            <h4 class="border-bottom">Share Venue</h4>
            <!-- AddToAny BEGIN -->
            <div class="a2a_kit a2a_kit_size_32 a2a_default_style"> <a class="a2a_button_facebook"></a> <a class="a2a_button_email"></a> <a class="a2a_button_whatsapp"></a> <a class="a2a_button_linkedin"></a> <a class="a2a_button_threads"></a> <a class="a2a_button_x"></a> </div>
            <script defer src="https://static.addtoany.com/menu/page.js"></script>
            <!-- AddToAny END -->
          </div>
        </aside>
      </div>
      <!-- /Row -->
    </div>
    <!-- /Container -->
    <section class="section innerpagebg">
      <div class="container">
        <div class="featured-slider-group">
          <h3 class="mb-40">Similar Venues</h3>
          <div class="owl-carousel featured-venues-slider owl-theme">
            <!-- Featured Item -->
            <?php
			$ure=mysqli_query($con,"select * from venue_master where status = '1'");
			while($urow=mysqli_fetch_array($ure)) { ?>
            <div class="featured-venues-item">
              <div class="listing-item mb-0">
                <div class="listing-img"> <a href="<?php echo $siteurl_link; ?>/<?php echo $urow['seo_url']; ?>"> <img src="images/<?php echo $urow['photo']; ?>"> </a>
                  <div class="fav-item-venues"> <span class="tag tag-blue">Featured</span>
                    <?php /*?><h5 class="tag tag-primary">₹450<span>/hr</span></h5><?php */?>
                  </div>
                </div>
                <div class="listing-content">
                  <div class="list-reviews">
                    <div class="d-flex align-items-center"> <span class="rating-bg">4.2</span><span>300 Reviews</span> </div>
                    <a href="javascript:void(0)" class="fav-icon"> <i class="feather-heart"></i> </a> </div>
                  <h3 class="listing-title"> <a href="<?php echo $siteurl_link; ?>/<?php echo $urow['seo_url']; ?>"><?php echo $urow['name']; ?></a> </h3>
                  <div class="listing-details-group">
                    <p><?php echo $urow['small_des']; ?></p>
                    <ul>
                      <li> <span> <i class="feather-map-pin"></i><?php echo $urow['address']; ?> </span> </li>
                    </ul>
                  </div>
                  <div class="listing-button"> <a href="<?php echo $siteurl_link; ?>/<?php echo $urow['seo_url']; ?>" class="user-book-now"><span><i class="feather-calendar me-2"></i></span>Book Now</a> </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>
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
$sql=("INSERT INTO `venue_review` (  `name`, `venue_id`, `mobile`, `rating`, `remarks`,`ins_datetime`,`manager_id`) VALUES ( '".mysqli_real_escape_string($con,$_REQUEST['name'])."','$venue_id','".mysqli_real_escape_string($con,$_REQUEST['mobile'])."','".mysqli_real_escape_string($con,$_REQUEST['rating'])."','".mysqli_real_escape_string($con,$_REQUEST['remarks'])."','$todaydatetime','$manager_id')");	 
$z = mysqli_query($con,$sql);
?>
          <script>alert('Thank you for Submit Review');</script>
          <script language="javascript">window.location.href="<?php echo $siteurl_link; ?>/<?php echo $master_detail['seo_url']; ?>";</script>
          <?php  } ?>
        </div>
      </div>
    </div>
  </div>
  <!-- /Add Review Modal -->
</div>
<!-- /Main Wrapper -->
<!-- jQuery -->
<script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="assets/js/jquery-3.7.1.min.js" type="289d27ca4bfdf61465f95542-text/javascript"></script>
<!-- Bootstrap Core JS -->
<script src="assets/js/bootstrap.bundle.min.js" type="289d27ca4bfdf61465f95542-text/javascript"></script>
<!-- Select JS -->
<script src="assets/plugins/select2/js/select2.min.js" type="289d27ca4bfdf61465f95542-text/javascript"></script>
<!-- Owl Carousel JS -->
<script src="assets/plugins/owl-carousel/owl.carousel.min.js" type="289d27ca4bfdf61465f95542-text/javascript"></script>
<!-- Bootstrap DateTime Picker -->
<script src="assets/js/moment.min.js" type="289d27ca4bfdf61465f95542-text/javascript"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js" type="289d27ca4bfdf61465f95542-text/javascript"></script>
<!-- Fancybox JS -->
<script src="assets/plugins/fancybox/jquery.fancybox.min.js" type="289d27ca4bfdf61465f95542-text/javascript"></script>
<!-- Sticky Sidebar JS -->
<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js" type="289d27ca4bfdf61465f95542-text/javascript"></script>
<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js" type="289d27ca4bfdf61465f95542-text/javascript"></script>
<!-- Custom JS -->
<script src="assets/js/script.js" type="289d27ca4bfdf61465f95542-text/javascript"></script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="289d27ca4bfdf61465f95542-|49" defer></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"93b856c5ce06c188","version":"2025.4.0-1-g37f21b1","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>
</html>
