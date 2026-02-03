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
<?php
$seo1 = mysqli_query($con,"SELECT * FROM seo_master WHERE page_name = 'Home'");
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
<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="assets/plugins/owl-carousel/owl.carousel.min.css">
<link rel="stylesheet" href="assets/plugins/owl-carousel/owl.theme.default.min.css">
<!-- Aos CSS -->
<link rel="stylesheet" href="assets/plugins/aos/aos.css">
<!-- Fontawesome CSS -->
<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
<!-- Select CSS -->
<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
<!-- Feathericon CSS -->
<link rel="stylesheet" href="assets/css/feather.css">
<!-- Main CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<link href="select2/select2.min.css" rel="stylesheet" />
<script src="select2/jquery.min.js"></script>
<script src="select2/select2.min.js"></script>
</head>
<body>
<?php /*?><div id="global-loader" ><div class="loader-img"><img src="assets/img/loader.png" class="img-fluid" alt="Global"></div></div><?php */?>
<!-- Main Wrapper -->
<div class="main-wrapper">
  <!-- Header -->
  <?php include 'header.php';
  $urehome=mysqli_query($con,"select * from homepage_title");
  $urowhome=mysqli_fetch_array($urehome);  ?>
  <!-- /Header -->
  <!-- Hero Section -->
  <section class="hero-section">
    <div class="container">
      <div class="home-banner">
        <div class="row align-items-center w-100">
          <?php 
		$ure=mysqli_query($con,"select * from homepage_des1");
		$urow=mysqli_fetch_array($ure); ?>
          <div class="col-lg-7 col-md-10 mx-auto">
            <div class="section-search aos" data-aos="fade-up">
              <h4><?php echo $urow['title1']; ?></h4>
              <h1><?php echo $urow['title2']; ?></h1>
              <p class="sub-info"><?php echo $urow['title3']; ?></p>
              <div class="private-venue aos" data-aos="fade-up" style="margin-top:10px;">
                <div class="convenient-btns become-owner " role="tablist"> <a href="javascript:void(0);" class="btn btn-secondary become-venue d-inline-flex align-items-center nav-link active" id="nav-tab1" data-bs-toggle="tab" data-bs-target="#nav-1"  role="tab" aria-controls="nav-1" aria-selected="true"> Venue </a> <a href="javascript:void(0);" class="btn btn-primary become-coche d-inline-flex align-items-center nav-link" id="nav-tab2" data-bs-toggle="tab" data-bs-target="#nav-2"  role="tab" aria-controls="nav-2" aria-selected="false" style="margin-right:15px;"> Coach </a> <a href="javascript:void(0);" class="btn btn-primary become-coche d-inline-flex align-items-center nav-link" id="nav-tab3" data-bs-toggle="tab" data-bs-target="#nav-3"  role="tab" aria-controls="nav-3" aria-selected="false"> Event </a> </div>
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-tab1" tabindex="0">
                    <div class="search-box">
                      <form name="form" method="post" action="venue-search.php">
                        <div class="search-input line">
                          <div class="form-group mb-0">
                            <label>Search for</label>
                            <select id="sport_type1" class="form-control" name="sport_type">
                            <option value="">Select Sport Type</option>
                              <?php 
								$coun=mysqli_query($con,"select distinct(sport_type) from venue_sporttype order by sport_type asc");
								while($Fcoun=mysqli_fetch_array($coun)) { 
								$sport_type = $Fcoun['sport_type'];
								$urex=mysqli_query($con,"select * from sport_type where name = '$sport_type'");
								$urowx=mysqli_fetch_array($urex);
								 ?>
                              <option value="<?php echo $Fcoun['sport_type']; ?>" data-image="<?php echo $urowx['icon']; ?>"><?php echo $Fcoun['sport_type']; ?></option>
                              <?php } ?>
                            </select>
                            <script>
							$('#sport_type1').select2({
							  templateResult: function (state) {
								if (!state.id) return state.text;
								var img = $(state.element).data('image');
								return $('<span><img src="images/' + img + '" style="width:20px; margin-right:8px;">' + state.text + '</span>');
							  },
							  templateSelection: function (state) {
								if (!state.id) return state.text;
								var img = $(state.element).data('image');
								return $('<span><img src="images/' + img + '" style="width:20px; margin-right:8px;">' + state.text + '</span>');
							  }
							});
							</script>
                            <?php /*?><select class="form-control select" name="sport_type">
                              <option value="">Choose Sport</option>
                              <?php 
								$coun=mysqli_query($con,"select distinct(sport_type) from venue_sporttype order by sport_type asc");
								while($Fcoun=mysqli_fetch_array($coun)) { 
								 ?>
                              <option value="<?php echo $Fcoun['sport_type']; ?>"><?php echo $Fcoun['sport_type']; ?></option>
                              <?php } ?>
                            </select><?php */?>
                          </div>
                        </div>
                        <div class="search-input">
                          <div class="form-group mb-0">
                            <label>Where </label>
                            <select class="form-control select" name="city" required>
                              <option value="">Choose Location</option>
                              <?php 
								$coun=mysqli_query($con,"select distinct(city) from venue_master where status = '1' order by city asc");
								while($Fcoun=mysqli_fetch_array($coun)) { 
								 ?>
                              <option value="<?php echo $Fcoun['city']; ?>">&nbsp;<?php echo $Fcoun['city']; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="search-btn">
                          <button class="btn" name="search1" type="submit"><i class="feather-search"></i><span class="search-text">Search</span></button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="tab-content">
                  <div class="tab-pane fade show " id="nav-2" role="tabpanel" aria-labelledby="nav-tab2" tabindex="0">
                    <div class="search-box">
                      <form name="form" method="post" action="coach-search.php">
                        <div class="search-input line">
                          <div class="form-group mb-0">
                            <label>Search for</label>
                            <select id="sport_type2" class="form-control" name="sport_type">
                            <option value="">Select Sport Type</option>
                              <?php 
								$coun=mysqli_query($con,"select distinct(sport_type) from user_sporttype order by sport_type asc");
								while($Fcoun=mysqli_fetch_array($coun)) { 
								$sport_type = $Fcoun['sport_type'];
								$urex=mysqli_query($con,"select * from sport_type where name = '$sport_type'");
								$urowx=mysqli_fetch_array($urex);
								 ?>
                              <option value="<?php echo $Fcoun['sport_type']; ?>" data-image="<?php echo $urowx['icon']; ?>"><?php echo $Fcoun['sport_type']; ?></option>
                              <?php } ?>
                            </select>
                            <script>
							$('#sport_type2').select2({
							  templateResult: function (state) {
								if (!state.id) return state.text;
								var img = $(state.element).data('image');
								return $('<span><img src="images/' + img + '" style="width:20px; margin-right:8px;">' + state.text + '</span>');
							  },
							  templateSelection: function (state) {
								if (!state.id) return state.text;
								var img = $(state.element).data('image');
								return $('<span><img src="images/' + img + '" style="width:20px; margin-right:8px;">' + state.text + '</span>');
							  }
							});
							</script>
							<?php /*?><select class="form-control select" name="sport_type">
                              <option value="">Choose Sport</option>
                              <?php 
							$coun=mysqli_query($con,"select distinct(sport_type) from user_sporttype order by sport_type asc");
							while($Fcoun=mysqli_fetch_array($coun)) { 
							 ?>
                              <option value="<?php echo $Fcoun['sport_type']; ?>"><?php echo $Fcoun['sport_type']; ?></option>
                              <?php } ?>
                            </select><?php */?>
                          </div>
                        </div>
                        <div class="search-input">
                          <div class="form-group mb-0">
                            <label>Where </label>
                            <select class="form-control select" name="city" required>
                              <option value="">Choose Location</option>
                              <?php 
							$coun=mysqli_query($con,"select distinct(city) from user_master where status = '1' and user_type = 'coach' order by city asc");
							while($Fcoun=mysqli_fetch_array($coun)) { 
							 ?>
                              <option value="<?php echo $Fcoun['city']; ?>"><?php echo $Fcoun['city']; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="search-btn">
                          <button class="btn" name="search2" type="submit"><i class="feather-search"></i><span class="search-text">Search</span></button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="tab-content">
                  <div class="tab-pane fade show " id="nav-3" role="tabpanel" aria-labelledby="nav-tab3" tabindex="0">
                    <div class="search-box">
                      <form name="form" method="post" action="event-search.php">
                        <div class="search-input">
                          <div class="form-group mb-0">
                            <label>Where </label>
                            <select class="form-control select" name="city" required>
                              <option value="">Choose Location</option>
                              <?php 
								$coun=mysqli_query($con,"select distinct(city) from event_master where status = '1' and city != '' order by city asc");
								while($Fcoun=mysqli_fetch_array($coun)) { 
								 ?>
                              <option value="<?php echo $Fcoun['city']; ?>"><?php echo $Fcoun['city']; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="search-btn">
                          <button class="btn" name="search3" type="submit"><i class="feather-search"></i><span class="search-text">Search</span></button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="banner-imgs text-center aos" data-aos="fade-up"> <img class="img-fluid" src="images/<?php echo $urow['image']; ?>" alt="Banner"> </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Hero Section -->
  <!-- How It Works -->
  
  <section class="section featured-section">
    <div class="container">
      <div class="section-heading aos" data-aos="fade-up">
        <h2><span><?php echo $urowhome['title2']; ?></span></h2>
        <p class="sub-title"><?php echo $urowhome['title22']; ?></p>
      </div>
      <div class="row">
        <div class="featured-slider-group aos" data-aos="fade-up">
          <div class="owl-carousel featured-coache-slider owl-theme">
            <!-- Featured Item -->
            <?php								 
			$ure=mysqli_query($con,"select * from sport_type where status = '1' and home_status = '1' order by ABS(orderlist) asc");
			while($urow=mysqli_fetch_array($ure))
			{ ?>
            <div class="featured-venues-item" style="border:solid 1px #CCCCCC">
              <div class="listing-item mb-0">
                <div class="listing-img" style="padding:30px;"> <a href="venue-search.php?sport_type=<?php echo $urow['name']; ?>"> <img src="images/<?php echo $urow['image']; ?>"> </a></div>
                <div class="listing-content list-coche-content" style="background-color:#f5f5f5">
                  <h3 style="font-size:18px;"><a href="venue-search.php?sport_type=<?php echo $urow['name']; ?>"><?php echo $urow['name']; ?></a></h3>
                  <a href="venue-search.php?sport_type=<?php echo $urow['name']; ?>"><i class="feather-arrow-right"></i></a> <a href="venue-search.php?sport_type=<?php echo $urow['name']; ?>" class="icon-hover"><i class="feather-arrow-right"></i></a> </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /How It Works -->
  <!-- Rental Deals -->
  <section class="section featured-venues">
    <div class="container">
      <div class="section-heading aos" data-aos="fade-up">
        <h2><span><?php echo $urowhome['title3']; ?></span></h2>
        <p class="sub-title"><?php echo $urowhome['title33']; ?></p>
      </div>
      <div class="row">
        <div class="featured-slider-group ">
          <div class="owl-carousel featured-venues-slider owl-theme">
            <!-- Featured Item -->
            <?php
		$ure=mysqli_query($con,"select * from venue_master where status = '1' order by rand() limit 9");
		while($urow=mysqli_fetch_array($ure)) { 
		$venue_id = $urow[0];
		$urex=mysqli_query($con,"select * from venue_review where venue_id = '$venue_id' and status = '1'");
		$urowxno=mysqli_num_rows($urex);
		
		$urex=mysqli_query($con,"select SUM(rating) from venue_review where venue_id = '$venue_id' and status = '1'");
		$urowx=mysqli_fetch_array($urex);
		$total_rating = $urowx['SUM(rating)']; ?>
            <div class="featured-venues-item aos" data-aos="fade-up">
              <div class="listing-item mb-0">
                <div class="listing-img"> <a href="<?php echo $siteurl_link; ?>/<?php echo $urow['seo_url']; ?>"> <img src="images/<?php echo $urow['photo']; ?>" style="height:250px;"> </a>
                  <div class="fav-item-venues"> <span class="tag tag-blue">Featured</span>
                    <?php /*?><h5 class="tag tag-primary">₹450<span>/hr</span></h5><?php */?>
                  </div>
                </div>
                <div class="listing-content">
                  <div class="list-reviews">
                    <div class="d-flex align-items-center">
                      <?php if($urowxno != '0') { ?>
                      <span class="rating-bg"><?php echo round($total_rating / $urowxno,1); ?></span>
                      <?php } ?>
                      <span><?php echo $urowxno; ?> Reviews</span> </div>
                    <a <?php if($user_id != '') { ?> href="venue-favorite.php?id=<?php echo $urow[0]; ?>" <?php } ?> <?php if($user_id == '') { ?> onClick="alert('Please Login First!')" <?php } ?> class="fav-icon"> <i class="feather-heart"></i> </a> </div>
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
      <!-- View More -->
      <div class="view-all text-center aos" data-aos="fade-up"> <a href="dplay-venue.php" class="btn btn-secondary d-inline-flex align-items-center">View All Venue<span class="lh-1"><i class="feather-arrow-right-circle ms-2"></i></span></a> </div>
      <!-- View More -->
    </div>
  </section>
  <!-- /Rental Deals -->
  <!-- Services -->
  
  <section class="section work-section">
    <div class="work-cock-img"> <img src="assets/img/icons/work-cock.svg" alt="Icon"> </div>
    <div class="work-img">
      <div class="work-img-right"> <img src="assets/img/bg/work-bg.png" alt="Icon"> </div>
    </div>
    <div class="container">
      <div class="section-heading aos" data-aos="fade-up">
        <h2><span><?php echo $urowhome['title1']; ?></span></h2>
        <p class="sub-title"><?php echo $urowhome['title11']; ?></p>
      </div>
      <div class="row justify-content-center ">
        <?php								 
		$ure=mysqli_query($con,"select * from homepage_des0 order by ABS(id) asc");
		while($urow=mysqli_fetch_array($ure))
		{ ?>
        <div class="col-lg-4 col-md-6 d-flex">
          <div class="work-grid w-100 aos" data-aos="fade-up">
            <div class="work-icon">
              <div class="work-icon-inner"> <img src="images/<?php echo $urow['image']; ?>" alt="Icon"> </div>
            </div>
            <div class="work-content">
              <h5> <a href="<?php echo $urow['url_link']; ?>"><?php echo $urow['name']; ?></a> </h5>
              <p><?php echo $urow['additional_info1']; ?></p>
              <a class="btn" href="<?php echo $urow['url_link']; ?>"> <?php echo $urow['url_title']; ?> <i class="feather-arrow-right"></i> </a> </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <section class="section service-section"  style="background:#F9F9F6">
    <div class="work-cock-img"> <img src="assets/img/icons/work-cock.svg" alt="Service"> </div>
    <div class="container">
      <div class="section-heading aos" data-aos="fade-up">
        <h2><span><?php echo $urowhome['title4']; ?></span></h2>
        <p class="sub-title"><?php echo $urowhome['title44']; ?></p>
      </div>
      <div class="row">
        <?php								 
		$ure=mysqli_query($con,"select * from service_master where status = '1' order by rand() limit 4");
		while($urow=mysqli_fetch_array($ure))	{ ?>
        <div class="col-lg-3 col-md-6 d-flex">
          <div class="service-grid w-100 aos" data-aos="fade-up">
            <div class="service-img"> <a href="service-detail.php?id=<?php echo $urow[0]; ?>"> <img src="images/<?php echo $urow['image']; ?>" class="img-fluid" alt="<?php echo $urow['name']; ?>" style="min-height:200px"> </a> </div>
            <div class="service-content">
              <h4><a href="service-detail.php?id=<?php echo $urow[0]; ?>"><?php echo $urow['name']; ?> </a></h4>
              <a href="service-detail.php?id=<?php echo $urow[0]; ?>">Learn More</a> </div>
          </div>
        </div>
        <?php } ?>
      </div>
      <div class="view-all text-center aos" data-aos="fade-up"> <a href="services.php" class="btn btn-secondary d-inline-flex align-items-center"> View All Services <span class="lh-1"><i class="feather-arrow-right-circle ms-2"></i></span> </a> </div>
    </div>
  </section>
  <!-- /Services -->
  <!-- Convenient -->
  <section class="section convenient-section">
    <div class="container">
      <div class="convenient-content aos" data-aos="fade-up">
        <h2 style="color:#000000">Convenient & Flexible Scheduling</h2>
        <p style="color:#000000">Find and book coaches conveniently with our online system that matches your schedule and location.</p>
      </div>
      <div class="convenient-btns aos" data-aos="fade-up"> <a href="login.php" class="btn btn-primary d-inline-flex align-items-center"> Login <span class="lh-1"><i class="feather-arrow-right-circle ms-2"></i></span> </a> <a href="register.php" class="btn btn-secondary d-inline-flex align-items-center"> Register <span class="lh-1"><i class="feather-arrow-right-circle ms-2"></i></span> </a> </div>
    </div>
  </section>
  <!-- /Convenient -->
  <!-- Featured Coaches -->
  <section class="section featured-section">
    <div class="container">
      <div class="row">
        <?php 
		  $ure=mysqli_query($con,"select * from homepage_des2");
		  $urow=mysqli_fetch_array($ure); ?>
        <div class="col-lg-6 d-flex align-items-center">
          <div class="start-your-journey aos" data-aos="fade-up">
            <h2><?php echo $urow['title1']; ?></h2>
            <?php echo $urow['title2']; ?>
            <div class="convenient-btns" style="margin-top:10px; float:right"> <a href="about-us.php" class="btn btn-secondary d-inline-flex align-items-center"> <span><i class="feather-align-justify me-2"></i></span>Learn More </a> <a href="register.php" class="btn btn-primary d-inline-flex align-items-center"> <span><i class="feather-user-plus me-2"></i></span>Join With Us </a></div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="journey-img aos" data-aos="fade-up"> <img src="images/<?php echo $urow['image1']; ?>" class="img-fluid" alt="User"> </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Featured Coaches -->
  <!-- Journey -->
  <!-- /Journey -->
  <!-- Group Coaching -->
  <?php /*?><section class="section group-coaching">
    <div class="container">
      <div class="section-heading aos" data-aos="fade-up">
        <h2><span><?php echo $urowhome['title5']; ?></span></h2>
        <p class="sub-title"><?php echo $urowhome['title55']; ?></p>
      </div>
      <div class="row justify-content-center">
        <?php								 
	  $ure=mysqli_query($con,"select * from features_master where status = '1' order by rand() limit 6");
	  while($urow=mysqli_fetch_array($ure)) { ?>
        <div class="col-lg-4 col-md-6 d-flex">
          <div class="work-grid coaching-grid w-100 aos" data-aos="fade-up"> <img src="images/<?php echo $urow['image']; ?>">
            <div class="work-content">
              <h3 align="center" style="margin-top:10px;"><?php echo $urow['name']; ?></h3>
              <p><?php echo $urow['additional_info1']; ?></p>
              <center>
                <a href="features-detail.php?id=<?php echo $urow[0]; ?>"> Learn More </a>
              </center>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section><?php */?>
  <!-- Group Coaching -->
  <!-- Earn Money -->
  <section class="section earn-money">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="private-venue aos" data-aos="fade-up">
            <div class="convenient-btns become-owner " role="tablist">
              <?php								 
			$ure1=mysqli_query($con,"select * from home_become_member where id = '1'");
			$urow1=mysqli_fetch_array($ure1);	?>
              <?php								 
			$ure2=mysqli_query($con,"select * from home_become_member where id = '2'");
			$urow2=mysqli_fetch_array($ure2);	?>
              <a href="javascript:void(0);" class="btn btn-secondary become-venue d-inline-flex align-items-center nav-link active" id="nav-Recent-tab" data-bs-toggle="tab" data-bs-target="#nav-Recent"  role="tab" aria-controls="nav-Recent" aria-selected="true"> <?php echo $urow1['name']; ?> </a> <a href="javascript:void(0);" class="btn btn-primary become-coche d-inline-flex align-items-center nav-link" id="nav-RecentCoaching-tab" data-bs-toggle="tab" data-bs-target="#nav-RecentCoaching"  role="tab" aria-controls="nav-RecentCoaching" aria-selected="false"> <?php echo $urow2['name']; ?> </a> </div>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="nav-Recent" role="tabpanel" aria-labelledby="nav-Recent-tab" tabindex="0">
                <p><?php echo $urow1['additional_info']; ?></p>
                <div class="convenient-btns"> <a href="<?php echo $urow1['url_link']; ?>" class="btn btn-secondary d-inline-flex align-items-center"> <span class="lh-1"><i class="feather-user-plus me-2"></i></span>Join With Us </a> </div>
              </div>
            </div>
            <div class="tab-content">
              <div class="tab-pane fade show " id="nav-RecentCoaching" role="tabpanel" aria-labelledby="nav-Recent-tab" tabindex="0">
                <p><?php echo $urow2['additional_info']; ?></p>
                <div class="convenient-btns"> <a href="<?php echo $urow2['url_link']; ?>" class="btn btn-secondary d-inline-flex align-items-center"> <span class="lh-1"><i class="feather-user-plus me-2"></i></span>Join With Us </a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Earn Money -->
  <!-- Best Services -->
  <section class="section best-services">
    <div class="container">
      <div class="section-heading aos" data-aos="fade-up">
        <h2><span><?php echo $urowhome['title6']; ?></span></h2>
        <p class="sub-title"><?php echo $urowhome['title66']; ?></p>
      </div>
      <div class="row">
        <?php 
		$ure=mysqli_query($con,"select * from homepage_des3");
		$urow=mysqli_fetch_array($ure); ?>
        <div class="col-lg-6">
          <div class="best-service-img aos" data-aos="fade-up"> <img src="images/<?php echo $urow['image']; ?>" style="width:100%" class="img-fluid" alt="Service">
            <div class="service-count-blk">
              <div class="coach-count">
                <h3><?php echo $urow['title1']; ?></h3>
                <h2><span class="counter-up" ><?php echo $urow['title2']; ?></span>+</h2>
                <h4><?php echo $urow['title3']; ?></h4>
              </div>
              <div class="coach-count coart-count">
                <h3><?php echo $urow['title4']; ?></h3>
                <h2><span class="counter-up" ><?php echo $urow['title5']; ?></span>+</h2>
                <h4><?php echo $urow['title6']; ?></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="ask-questions aos" data-aos="fade-up">
            <div class="faq-info">
              <div class="accordion" id="accordionExample">
                <?php								 
				$ure=mysqli_query($con,"select * from faqs_master where status = '1'");
				while($urow=mysqli_fetch_array($ure)) { ?>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading<?php echo $urow[0]; ?>"> <a href="javascript:;" class="accordion-button collapsed"  data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $urow[0]; ?>" aria-expanded="false" aria-controls="collapse<?php echo $urow[0]; ?>"> <?php echo $urow['additional_info1']; ?> </a> </h2>
                  <div id="collapse<?php echo $urow[0]; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $urow[0]; ?>" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <div class="accordion-content">
                        <p><?php echo $urow['additional_info2']; ?> </p>
                      </div>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Best Services -->
  <!-- Courts Near -->
  <!-- /Courts Near -->
  <!-- Testimonials -->
  <section class="section our-testimonials">
    <div class="container">
      <div class="section-heading aos" data-aos="fade-up">
        <h2><span><?php echo $urowhome['title7']; ?></span></h2>
        <p class="sub-title"><?php echo $urowhome['title77']; ?></p>
      </div>
      <div class="row">
        <div class="featured-slider-group aos" data-aos="fade-up">
          <div class="owl-carousel testimonial-slide featured-venues-slider owl-theme">
            <!-- Testimonials Item -->
            <?php								 
			$ure=mysqli_query($con,"select * from testimonial_master where admin_status = '1' and status = '1'");
			while($urow=mysqli_fetch_array($ure)) { ?>
            <div class="testimonial-group">
              <div class="testimonial-review">
                <?php /*?><div class="rating-point"> <i class="fas fa-star filled"></i> <i class="fas fa-star filled"></i> <i class="fas fa-star filled"></i> <i class="fas fa-star filled"></i> <i class="fas fa-star filled"></i> <span > 5.0</span> </div><?php */?>
                <p><?php echo $urow['additional_info']; ?></p>
              </div>
              <div class="listing-venue-owner"> <a class="navigation"> <img src="images/<?php echo $urow['image']; ?>" alt="User"> </a>
                <div class="testimonial-content">
                  <h5><a href="javascript:;"><?php echo $urow['name']; ?></a></h5>
                  <a href="javascript:void(0);" class="btn btn-primary "> <?php echo $urow['designation']; ?> </a> </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
        <!-- Testimonials Slide -->
        <?php /*?><div class="brand-slider-group aos" data-aos="fade-up">
          <div class="owl-carousel testimonial-brand-slider owl-theme">
            <div class="brand-logos"> <img  src="assets/img/testimonial-icon-01.svg" alt="Brand"> </div>
            <div class="brand-logos"> <img  src="assets/img/testimonial-icon-04.svg" alt="Brand"> </div>
            <div class="brand-logos"> <img  src="assets/img/testimonial-icon-03.svg" alt="Brand"> </div>
            <div class="brand-logos"> <img  src="assets/img/testimonial-icon-04.svg" alt="Brand"> </div>
            <div class="brand-logos"> <img  src="assets/img/testimonial-icon-05.svg" alt="Brand"> </div>
            <div class="brand-logos"> <img  src="assets/img/testimonial-icon-03.svg" alt="Brand"> </div>
            <div class="brand-logos"> <img  src="assets/img/testimonial-icon-04.svg" alt="Brand"> </div>
          </div>
        </div><?php */?>
        <!-- /Testimonials Slide -->
      </div>
    </div>
  </section>
  <!-- /Testimonials -->
  <!-- Featured Plans -->
  <?php /*?><section class="section featured-plan">
    <div class="work-img ">
      <div class="work-img-right"> <img src="assets/img/bg/work-bg.png" alt="Icon"> </div>
    </div>
    <div class="container">
      <div class="section-heading aos" data-aos="fade-up">
        <h2>We Have Excellent <span>Plans For You</span></h2>
        <p class="sub-title">Choose monthly or yearly plans for uninterrupted access to our premium sport facilities. Join us and experience convenient excellence.</p>
      </div>
      <div class="interset-btn aos" data-aos="fade-up">
        <div class="status-toggle d-inline-flex align-items-center"> Monthly
          <input type="checkbox" id="status_1" class="check">
          <label for="status_1" class="checktoggle">checkbox</label>
          Yearly </div>
      </div>
      <div class="price-wrap aos" data-aos="fade-up">
        <div class="row justify-content-center">
          <div class="col-lg-4 d-flex col-md-6">
            <!-- Price Card -->
            <div class="price-card flex-fill ">
              <div class="price-head"> <img  src="assets/img/icons/price-01.svg" alt="Price">
                <h3>Professoinal</h3>
              </div>
              <div class="price-body">
                <div class="per-month">
                  <h2><sup>₹</sup><span>6000.00</span></h2>
                  <span>Per Month</span> </div>
                <div class="features-price-list">
                  <h5>Features</h5>
                  <p>Everything in our free Upto 10 users. </p>
                  <ul>
                    <li class="active"><i class="feather-check-circle"></i>Included : Quality Checked By Envato</li>
                    <li class="active"><i class="feather-check-circle"></i>Included : Future Updates</li>
                    <li class="active"><i class="feather-check-circle"></i>Technical Support</li>
                    <li class="inactive"><i class="feather-x-circle"></i>Add Listing </li>
                    <li class="inactive"><i class="feather-x-circle"></i>Approval of Listing</li>
                  </ul>
                </div>
                <div class="price-choose"> <a href="javascript:;" class="btn viewdetails-btn">Choose Plan</a> </div>
                <div class="price-footer">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                </div>
              </div>
            </div>
            <!-- /Price Card -->
          </div>
          <div class="col-lg-4 d-flex col-md-6">
            <!-- Price Card -->
            <div class="price-card flex-fill">
              <div class="price-head expert-price"> <img  src="assets/img/icons/price-02.svg" alt="Price">
                <h3>Expert</h3>
                <span>Recommended</span> </div>
              <div class="price-body">
                <div class="per-month">
                  <h2><sup>₹</sup><span>6000.00</span></h2>
                  <span>Per Month</span> </div>
                <div class="features-price-list">
                  <h5>Features</h5>
                  <p>Everything in our free Upto 10 users. </p>
                  <ul>
                    <li class="active"><i class="feather-check-circle"></i>Included : Quality Checked By Envato</li>
                    <li class="active"><i class="feather-check-circle"></i>Included : Future Updates</li>
                    <li class="active"><i class="feather-check-circle"></i>6 Months Technical Support</li>
                    <li class="inactive"><i class="feather-x-circle"></i>Add Listing </li>
                    <li class="inactive"><i class="feather-x-circle"></i>Approval of Listing</li>
                  </ul>
                </div>
                <div class="price-choose active-price"> <a href="javascript:;" class="btn viewdetails-btn">Choose Plan</a> </div>
                <div class="price-footer">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                </div>
              </div>
            </div>
            <!-- /Price Card -->
          </div>
          <div class="col-lg-4 d-flex col-md-6">
            <!-- Price Card -->
            <div class="price-card flex-fill">
              <div class="price-head"> <img  src="assets/img/icons/price-03.svg" alt="Price">
                <h3>Enterprise</h3>
              </div>
              <div class="price-body">
                <div class="per-month">
                  <h2><sup>₹</sup><span>6000.00</span></h2>
                  <span>Per Month</span> </div>
                <div class="features-price-list">
                  <h5>Features</h5>
                  <p>Everything in our free Upto 10 users. </p>
                  <ul>
                    <li class="active"><i class="feather-check-circle"></i>Included : Quality Checked By Envato</li>
                    <li class="active"><i class="feather-check-circle"></i>Included : Future Updates</li>
                    <li class="active"><i class="feather-check-circle"></i>Technical Support</li>
                    <li class="active"><i class="feather-check-circle"></i>Add Listing </li>
                    <li class="active"><i class="feather-check-circle"></i>Approval of Listing</li>
                  </ul>
                </div>
                <div class="price-choose"> <a href="javascript:;" class="btn viewdetails-btn">Choose Plan</a> </div>
                <div class="price-footer">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                </div>
              </div>
            </div>
            <!-- /Price Card -->
          </div>
        </div>
      </div>
    </div>
  </section><?php */?>
  <!-- /Featured Plans -->
  <!-- Latest News -->
  <section class="section featured-venues latest-news">
    <div class="container">
      <div class="section-heading aos" data-aos="fade-up">
        <h2><span><?php echo $urowhome['title8']; ?></span></h2>
        <p class="sub-title"><?php echo $urowhome['title88']; ?></p>
      </div>
      <div class="row">
        <div class="featured-slider-group ">
          <div class="owl-carousel featured-venues-slider owl-theme">
            <!-- News -->
            <?php								 
			$ure=mysqli_query($con,"select * from blog_master where status = '1' order by insdate desc");
			while($urow=mysqli_fetch_array($ure)) { ?>
            <div class="featured-venues-item aos" data-aos="fade-up">
              <div class="listing-item mb-0">
                <div class="listing-img"> <a href="blog-detail.php?id=<?php echo $urow[0]; ?>"> <img src="images/<?php echo $urow['image']; ?>" style="height:250px;"> </a> </div>
                <div class="listing-content news-content">
                  <div class="listing-venue-owner listing-dates"> <a href="blog-detail.php?id=<?php echo $urow[0]; ?>" class="navigation"> <img src="assets/img/profiles/avatar-01.jpg" alt="User">Admin</a> <span ><i class="feather-calendar"></i><?php echo date("d M Y", strtotime($urow['insdate'])); ?></span> </div>
                  <h3 class="listing-title"> <a href="blog-detail.php?id=<?php echo $urow[0]; ?>"><?php echo $urow['name']; ?></a> </h3>
                </div>
              </div>
            </div>
            <?php } ?>
            <!-- /News -->
          </div>
        </div>
      </div>
      <!-- View More -->
      <div class="view-all text-center aos" data-aos="fade-up"> <a href="blog.php" class="btn btn-secondary d-inline-flex align-items-center">View All Blog <span class="lh-1"><i class="feather-arrow-right-circle ms-2"></i></span></a> </div>
      <!-- View More -->
    </div>
  </section>
  <!-- /Latest News -->
  <!-- Newsletter -->
  <section class="section newsletter-sport">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <?php 
		$ure=mysqli_query($con,"select * from subscribe_newsletter");
		$urow=mysqli_fetch_array($ure); ?>
          <div class="subscribe-style aos" data-aos="fade-up">
            <div class="banner-blk"> <img src="images/<?php echo $urow['image']; ?>" class="img-fluid" alt="Subscribe"> </div>
            <div class="banner-info "> <img src="assets/img/icons/subscribe.svg" class="img-fluid" alt="Subscribe">
              <h2><?php echo $urow['title1']; ?></h2>
              <p><?php echo $urow['title2']; ?></p>
              <form name="form" method="post">
                <div class="subscribe-blk bg-white">
                  <div class="input-group align-items-center"> <i class="feather-mail"></i>
                    <input type="email" class="form-control" placeholder="Enter Email Address" name="email" required aria-label="email">
                    <div class="subscribe-btn-grp">
                      <input type="submit" name="subscribe" class="btn btn-secondary" value="Subscribe">
                    </div>
                  </div>
                </div>
              </form>
              <?php 
if ($_POST['subscribe']) 
{
$sql=("INSERT INTO `subscribe_master` ( `email`,`ins_datetime`) VALUES ( '".mysqli_real_escape_string($con,$_REQUEST['email'])."','$todaydatetime')");	 
$z = mysqli_query($con,$sql);
?>
              <script>alert('Thank you for Subscribe with Us');</script>
              <script language="javascript">window.location.href="index.php";</script>
              <?php  } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Newsletter -->
  <!-- Footer -->
  <?php include 'footer.php' ?>
  <!-- /Footer -->
</div>
<!-- /Main Wrapper -->
<!-- scrollToTop start -->
<div class="progress-wrap active-progress">
  <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
    <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919px, 307.919px; stroke-dashoffset: 228.265px;"></path>
  </svg>
</div>
<!-- scrollToTop end -->
<!-- jQuery -->
<script src="assets/js/jquery-3.7.1.min.js" type="4fb01ffb89a2f8f60e51a684-text/javascript"></script>
<!-- Bootstrap Core JS -->
<script src="assets/js/bootstrap.bundle.min.js" type="4fb01ffb89a2f8f60e51a684-text/javascript"></script>
<!-- Select JS -->
<script src="assets/plugins/select2/js/select2.min.js" type="4fb01ffb89a2f8f60e51a684-text/javascript"></script>
<!-- Owl Carousel JS -->
<script src="assets/plugins/owl-carousel/owl.carousel.min.js" type="4fb01ffb89a2f8f60e51a684-text/javascript"></script>
<!-- Aos -->
<script src="assets/plugins/aos/aos.js" type="4fb01ffb89a2f8f60e51a684-text/javascript"></script>
<!-- Counterup JS -->
<script src="assets/js/jquery.waypoints.js" type="4fb01ffb89a2f8f60e51a684-text/javascript"></script>
<script src="assets/js/jquery.counterup.min.js" type="4fb01ffb89a2f8f60e51a684-text/javascript"></script>
<!-- Top JS -->
<script src="assets/js/backToTop.js" type="4fb01ffb89a2f8f60e51a684-text/javascript"></script>
<!-- Custom JS -->
<script src="assets/js/script.js" type="4fb01ffb89a2f8f60e51a684-text/javascript"></script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="4fb01ffb89a2f8f60e51a684-|49" defer></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"93b8567d5f5ca8b0","version":"2025.4.0-1-g37f21b1","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>
</html>
