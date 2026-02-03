<?php  error_reporting(0); session_start(); include('config.php'); ?>
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
$seo1 = mysqli_query( $con, "SELECT * FROM seo_master WHERE page_name = 'Coach Main'" );
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
<!-- Select CSS -->
<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
<!-- Fontawesome CSS -->
<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
<!-- Feathericon CSS -->
<link rel="stylesheet" href="assets/css/feather.css">
<!-- Main CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<link href="select2/select2.min.css" rel="stylesheet" />
<script src="select2/jquery.min.js"></script> 
<script src="select2/select2.min.js"></script>
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
      <h1 class="text-white">Coach</h1>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li>Coaches</li>
      </ul>
    </div>
  </section>
  <!-- /Breadcrumb --> 
  <!-- Page Content -->
  <div class="content">
    <div class="container"> 
      <!-- Sort By -->
      <div class="row">
        <div class="col-lg-12">
          <div class="sortby-section">
            <div class="sorting-info">
              <div class="row d-flex align-items-center">
                <div class="col-xl-12 col-lg-12 col-sm-12 col-12">
                  <form name="form" method="post" action="coach-search.php" autocomplete="off">
                    <?php if(isMobileDevice()) { ?>
                    <div class="sortby-filter-group">
                      <div class="sortbyset" style="width:100%; display:block">
                        <?php /*?><script src="js/searchjquery.min.js"></script><?php */?>
                        <script src="js/searchbootstrap.min.js"></script> 
                        <script src="js/searchjquery.bootbox.js"></script>
                        <style>
						.dropdown-menu>li>a {
							display: block;
							padding: 3px 20px;
							clear: both;
							font-weight: 400;
							line-height: 1.42857143;
							color: #333;
							white-space: nowrap; } 
						</style>
                        <input placeholder="Enter Coach Name" type="text" class="form-control" name="name" data-provide="typeahead" data-items="9999" data-source="[&quot;<?php $z=("select * from user_master where status = '1' and user_type = 'coach' order by name asc"); $ures = mysqli_query($con,$z); while($urows=mysqli_fetch_array($ures)) {?><?php echo mysqli_real_escape_string($con,$urows['name']); ?>&quot;,&quot;<?php } ?>&quot;]" style="border:solid 1px #f5f5f5; width:100%; background-color:#f5f5f5; margin-bottom:5px;">
                      </div>
                      <table border="0" width="100%">
                        <tr>
                          <td><div class="sortbyset">
                              <div class="sorting-select">
                                <select id="sport_type2" class="form-control" name="sport_type">
                                  <option value="">Select Sport Type</option>
                                  <?php
                                  $coun = mysqli_query( $con, "select distinct(sport_type) from user_sporttype order by sport_type asc" );
                                  while ( $Fcoun = mysqli_fetch_array( $coun ) ) {
                                    $sport_type = $Fcoun[ 'sport_type' ];
                                    $urex = mysqli_query( $con, "select * from sport_type where name = '$sport_type'" );
                                    $urowx = mysqli_fetch_array( $urex );
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
                              </div>
                            </div></td>
                          <td><div class="sortbyset">
                              <div class="sorting-select">
                                <select class="form-control select" name="city">
                                  <option value="">Select Location</option>
                                  <?php
                                  $coun = mysqli_query( $con, "select distinct(city) from user_master where status = '1' and user_type = 'coach' order by city asc" );
                                  while ( $Fcoun = mysqli_fetch_array( $coun ) ) {
                                    ?>
                                  <option value="<?php echo $Fcoun['city']; ?>"><?php echo $Fcoun['city']; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div></td>
                        </tr>
                      </table>
                      <center>
                        <div class="sortbyset">
                          <div class="sorting-select">
                            <input type="submit" name="search" class="btn btn-secondary d-flex align-items-center" value="Search Coach" style="font-size:12px; padding:5px 10px; margin-top:5px;">
                          </div>
                        </div>
                      </center>
                    </div>
                    <?php } else { ?>
                    <div class="sortby-filter-group">
                      <div class="sortbyset"> <span class="sortbytitle">Coach Name</span>
                        <div class="sorting-select">
                          <?php /*?><script src="js/searchjquery.min.js"></script><?php */?>
                          <script src="js/searchbootstrap.min.js"></script> 
                          <script src="js/searchjquery.bootbox.js"></script>
                          <style>
						.dropdown-menu>li>a {
							display: block;
							padding: 3px 20px;
							clear: both;
							font-weight: 400;
							line-height: 1.42857143;
							color: #333;
							white-space: nowrap; } 
						</style>
                          <input type="text" class="form-control" name="name" data-provide="typeahead" data-items="9999" data-source="[&quot;<?php $z=("select * from user_master where status = '1' and user_type = 'coach' order by name asc"); $ures = mysqli_query($con,$z); while($urows=mysqli_fetch_array($ures)) {?><?php echo mysqli_real_escape_string($con,$urows['name']); ?>&quot;,&quot;<?php } ?>&quot;]">
                        </div>
                      </div>
                      <div class="sortbyset"> <span class="sortbytitle">&nbsp;&nbsp;Sport Type</span>
                        <div class="sorting-select">
                          <select id="sport_type2" class="form-control" name="sport_type">
                            <option value="">Select Sport Type</option>
                            <?php
                            $coun = mysqli_query( $con, "select distinct(sport_type) from user_sporttype order by sport_type asc" );
                            while ( $Fcoun = mysqli_fetch_array( $coun ) ) {
                              $sport_type = $Fcoun[ 'sport_type' ];
                              $urex = mysqli_query( $con, "select * from sport_type where name = '$sport_type'" );
                              $urowx = mysqli_fetch_array( $urex );
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
                        </div>
                      </div>
                      <div class="sortbyset"> <span class="sortbytitle">&nbsp;&nbsp;Location</span>
                        <div class="sorting-select">
                          <select class="form-control select" name="city">
                            <option value="">Choose Location</option>
                            <?php
                            $coun = mysqli_query( $con, "select distinct(city) from user_master where status = '1' and user_type = 'coach' order by city asc" );
                            while ( $Fcoun = mysqli_fetch_array( $coun ) ) {
                              ?>
                            <option value="<?php echo $Fcoun['city']; ?>"><?php echo $Fcoun['city']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="sortbyset">
                        <div class="sorting-select">
                          <input type="submit" name="search" class="btn btn-secondary d-flex align-items-center" value="Search" style="font-size:12px; padding:5px 10px; margin-left:10px;">
                        </div>
                      </div>
                      <?php /*?>
<div class="sortbyset"> <span class="sortbytitle">&nbsp;&nbsp;Sort By</span>
  <div class="sorting-select">
    <select class="form-control select">
      <option>Price Low->High</option>
      <option>Price High->Low</option>
    </select>
  </div>
</div>
                      <?php */?>
                    </div>
                    <?php } ?>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Sort By -->
      <div class="row justify-content-center"> 
        <!-- Featured Item -->
        <?php
        $limit = 6; // Number of entries to show in a page.
        // Look for a GET variable page if not found default is 1.     
        if ( isset( $_GET[ "page" ] ) ) {
          $pn = $_GET[ "page" ];
        } else {
          $pn = 1;
        };

        $start_from = ( $pn - 1 ) * $limit;
        ?>
        <?php
        $session = $_GET[ 'session' ];
        $coun = mysqli_query( $con, "select * from search_result where session = '$session'" );
        $Fcoun_no = mysqli_num_rows( $coun );
        if ( $Fcoun_no > 0 ) {
          while ( $Fcoun = mysqli_fetch_array( $coun ) ) {
            $coach_id[] = $Fcoun[ 'coach_id' ];
          }
          $coach_all = "'" . implode( "','", $coach_id ) . "'";
          if ( $session != '' ) {
            $query = "and id IN ($coach_all)";
          }
        }
        $urec = ( "select * from user_master where status = '1' and user_type = 'coach' $query LIMIT $start_from, $limit" );
        $ure = mysqli_query( $con, $urec );
		$Fcoun_nos=mysqli_num_rows($ure); ?>
		<?php if($Fcoun_nos == '0') { ?> <center><img src="images/coming-soon.jpg"></center> <?php } else { ?>	
		<?php while ( $urow = mysqli_fetch_array( $ure ) ) { ?>
        <div class="col-lg-4 col-md-6">
          <div class="featured-venues-item">
            <div class="listing-item listing-item-grid">
              <div class="listing-img"> <a href="coach/<?php echo $urow['seo_url']; ?>"> <img src="images/<?php echo $urow['photo']; ?>" style="height:250px;"> </a>
                <div class="fav-item-venues"> <span class="tag tag-blue"><?php echo $urow['city']; ?></span> </div>
                <div class="hour-list">
                  <h5 class="tag tag-primary">From Rs. <?php echo $urow['coaching_fees']; ?></h5>
                </div>
              </div>
              <div class="listing-content">
                <h3 class="listing-title"> <a href="coach/<?php echo $urow['seo_url']; ?>"><?php echo $urow['name']; ?></a> </h3>
                <ul class="mb-2">
                  <li> <span> <i class="feather-map-pin me-2"></i><?php echo $urow['state']; ?> <?php echo $urow['city']; ?> </span> </li>
                </ul>
                <div class="listing-details-group">
                  <p><?php echo $urow['short_info']; ?></p>
                </div>
                <div class="coach-btn">
                  <ul>
                    <li> <a href="coach/<?php echo $urow['seo_url']; ?>" class="btn btn-primary w-100"><i class="feather-eye me-2"></i>View Profile</a> </li>
                    <li> <a href="coach/<?php echo $urow['seo_url']; ?>" class="btn btn-secondary w-100"><i class="feather-calendar me-2"></i>Book Now</a> </li>
                  </ul>
                </div>
                <?php /*?>
<div class="avalbity-review">
  <ul>
    <li>
      <div class="avalibity-date"> <span><i class="feather-calendar"></i></span>
        <div class="avalibity-datecontent">
          <h6>Next Availabilty</h6>
          <h5>20 May 2023</h5>
        </div>
      </div>
    </li>
    <li>
      <div class="list-reviews mb-0">
        <div class="d-flex align-items-center"> <span class="rating-bg">4.5</span><span>80 Reviews</span> </div>
      </div>
    </li>
  </ul>
</div>
                <?php */?>
              </div>
            </div>
          </div>
        </div>
        <?php } } ?>
      </div>
      <center>
        <?php
        $sql = "SELECT COUNT(*) FROM user_master where status = '1' and user_type = 'coach' $query";
        $rs_result = mysqli_query( $con, $sql );
        $row = mysqli_fetch_row( $rs_result );
        $total_records = $row[ 0 ];

        // Number of pages required.
        $total_pages = ceil( $total_records / $limit );
        $pagLink = "";
        for ( $i = 1; $i <= $total_pages; $i++ ) {
          if ( $i == $pn ) {
            $pagLink .= "<span class='active'><a style='background-color:#034AAB; color:#ffffff; padding:5px 10px; font-size:19px; margin:5px;' href='dplay-coach.php?page=" . $i . "'>" . $i . "</a></span>";
          } else {
            $pagLink .= "<span><a style='background-color:#02BE61; color:#ffffff; padding:5px 10px; font-size:19px; margin:5px;' href='dplay-coach.php?page=" . $i . "'>" . $i . "</a></span>";
          }
        };
        echo $pagLink;
        ?>
      </center>
    </div>
  </div>
  <!-- /Page Content --> 
  <!-- Footer -->
  <?php include 'footer.php' ?>
  <!-- /Footer --> 
</div>
<!-- /Main Wrapper --> 
<!-- jQuery --> 
<script src="assets/js/jquery-3.7.1.min.js" type="e5a22ccf478f9b843678bbde-text/javascript"></script> 
<!-- Bootstrap Core JS --> 
<script src="assets/js/bootstrap.bundle.min.js" type="e5a22ccf478f9b843678bbde-text/javascript"></script> 
<!-- Select JS --> 
<script src="assets/plugins/select2/js/select2.min.js" type="e5a22ccf478f9b843678bbde-text/javascript"></script> 
<!-- Bootstrap DateTime Picker --> 
<script src="assets/js/moment.min.js" type="e5a22ccf478f9b843678bbde-text/javascript"></script> 
<script src="assets/js/bootstrap-datetimepicker.min.js" type="e5a22ccf478f9b843678bbde-text/javascript"></script> 
<!-- Custom JS --> 
<script src="assets/js/script.js" type="e5a22ccf478f9b843678bbde-text/javascript"></script> 
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="e5a22ccf478f9b843678bbde-|49" defer></script> 
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"93b856b85a63c188","version":"2025.4.0-1-g37f21b1","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>
</html>
