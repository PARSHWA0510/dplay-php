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
$seo1 = mysqli_query($con,"SELECT * FROM seo_master WHERE page_name = 'Event Main'");
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
<div class="main-wrapper events-page innerpagebg">
  <!-- Header -->
  <?php include 'header.php' ?>
  <!-- /Header -->
  <!-- Breadcrumb -->
  <div class="breadcrumb breadcrumb-list mb-0"> <span class="primary-right-round"></span>
    <div class="container">
      <h1 class="text-white">Events</h1>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li>Events</li>
      </ul>
    </div>
  </div>
  <!-- /Breadcrumb -->
  <!-- Page Content -->
  <div class="content">
    <div class="container">
      <section class="services">
        <div class="row">
          <div class="col-lg-12">
            <div class="sortby-section">
              <div class="sorting-info">
                <div class="row d-flex align-items-center">
                  <div class="col-xl-12 col-lg-12 col-sm-12 col-12">
                    <form name="form" method="post" action="event-search.php" autocomplete="off">
                      <?php if(isMobileDevice()) { ?>
                      <div class="sortby-filter-group">
                        <div class="sortbyset" style="width:100%; display:block">
                          <script src="js/searchjquery.min.js"></script>
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
                          <input placeholder="Enter Event Name" type="text" class="form-control" name="name" data-provide="typeahead" data-items="9999" data-source="[&quot;<?php $z=("select * from event_master where status = '1' order by name asc"); $ures = mysqli_query($con,$z); while($urows=mysqli_fetch_array($ures)) {?><?php echo mysqli_real_escape_string($con,$urows['name']); ?>&quot;,&quot;<?php } ?>&quot;]" style="border:solid 1px #f5f5f5; width:100%; background-color:#f5f5f5; margin-bottom:5px;">
                        </div>
                        <table border="0" style="width:100%">
                          <tr>
                            <td><div class="sortbyset">
                                <div class="sorting-select">
                                  <select class="form-control select" name="category">
                                    <option value="">Select Category</option>
                                    <?php 
									$coun=mysqli_query($con,"select * from event_category where status = '1' order by name asc");
									while($Fcoun=mysqli_fetch_array($coun)) { 
									 ?>
                                    <option value="<?php echo $Fcoun[0]; ?>"><?php echo $Fcoun['name']; ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div></td>
                            <td><div class="sortbyset">
                                <div class="sorting-select">
                                  <select class="form-control select" name="city">
                                    <option value="">Select Location</option>
                                    <?php 
							$coun=mysqli_query($con,"select distinct(city) from event_master where status = '1' and city != '' order by city asc");
							while($Fcoun=mysqli_fetch_array($coun)) { 
							 ?>
                                    <option value="<?php echo $Fcoun['city']; ?>"><?php echo $Fcoun['city']; ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div></td>
                            <td><div class="sortbyset">
                                <div class="sorting-select">
                                  <input type="submit" name="search" class="btn btn-secondary d-flex align-items-center" value="Search" style="padding:10px; margin-left:10px;">
                                </div>
                              </div></td>
                          </tr>
                        </table>
                      </div>
                      <?php } else { ?>
                      <div class="sortby-filter-group">
                        <div class="sortbyset"> <span class="sortbytitle">Name</span>
                          <script src="js/searchjquery.min.js"></script>
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
                          <input placeholder="Enter Event Name" type="text" class="form-control" name="name" data-provide="typeahead" data-items="9999" data-source="[&quot;<?php $z=("select * from event_master where status = '1' order by name asc"); $ures = mysqli_query($con,$z); while($urows=mysqli_fetch_array($ures)) {?><?php echo mysqli_real_escape_string($con,$urows['name']); ?>&quot;,&quot;<?php } ?>&quot;]" style="border:solid 1px #f5f5f5; width:100%; background-color:#f5f5f5; margin-bottom:5px;">
                        </div>
                        <div class="sortbyset"> <span class="sortbytitle">&nbsp;&nbsp;Category</span>
                          <div class="sorting-select">
                            <select class="form-control select" name="category">
                              <option value="">Select Category</option>
                              <?php 
									$coun=mysqli_query($con,"select * from event_category where status = '1' order by name asc");
									while($Fcoun=mysqli_fetch_array($coun)) { 
									 ?>
                              <option value="<?php echo $Fcoun[0]; ?>"><?php echo $Fcoun['name']; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="sortbyset"> <span class="sortbytitle">&nbsp;&nbsp;Location</span>
                          <div class="sorting-select">
                            <select class="form-control select" name="city">
                              <option value="">Select Location</option>
                              <?php 
							$coun=mysqli_query($con,"select distinct(city) from event_master where status = '1' and city != '' order by city asc");
							while($Fcoun=mysqli_fetch_array($coun)) { 
							 ?>
                              <option value="<?php echo $Fcoun['city']; ?>"><?php echo $Fcoun['city']; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="sortbyset">
                          <div class="sorting-select">
                            <input type="submit" name="search" class="btn btn-secondary d-flex align-items-center" value="Search" style="padding:10px; margin-left:10px;">
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <?php						
		$limit = 6;  // Number of entries to show in a page.
		// Look for a GET variable page if not found default is 1.     
		if (isset($_GET["page"])) { 
		  $pn  = $_GET["page"]; 
		} 
		else { 
		  $pn=1; 
		};  
	
		$start_from = ($pn-1) * $limit;  ?>
            <?php $session = $_GET['session'];
		$coun=mysqli_query($con,"select * from search_result where session = '$session'");
		$Fcoun_no=mysqli_num_rows($coun);
		if($Fcoun_no > 0) { 
		while($Fcoun=mysqli_fetch_array($coun)) 
		{ 
		$event_id[] = $Fcoun['event_id'];
		}				
		$event_all = "'" . implode("','", $event_id) . "'";
		if($session != '') { $query = "and id IN ($event_all)"; }
		}

		$urec=("select * from event_master where status = '1' and DATE(end_datetime) > '$today_date' $query order by ins_datetime asc LIMIT $start_from, $limit");
		$ure = mysqli_query($con,$urec);
		$Fcoun_nos=mysqli_num_rows($ure); ?>
		<?php if($Fcoun_nos == '0') { ?> <center><img src="images/coming-soon.jpg"></center> <?php } else { ?>	
		<?php while($urow=mysqli_fetch_array($ure)) { ?>
            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
              <div class="listing-item"> <a href="event/<?php echo $urow['seo_url']; ?>">
                <div class="listing-img"> <img src="images/<?php echo $urow['image']; ?>" class="img-fluid" style="height:250px;">
                  <div class="date-info text-center">
                    <h6>
                      <?php $cat_id = $urow['cat_id']; 
                      $urex=mysqli_query($con,"select * from event_category where id = '$cat_id'");
					  $urowx=mysqli_fetch_array($urex); echo $urowx['name']; ?>
                    </h6>
                  </div>
                </div>
                <div class="listing-content">
                  <h4 class="listing-title" style="text-align:left; margin-bottom:5px;"><?php echo $urow['name']; ?></h4>
                  <h6 class="listing-title" style="text-align:left; margin-bottom:15px;"><?php echo $urow['small_des']; ?></h6>
                  <ul class="d-flex justify-content-start align-items-center">
                    <li> <i class="feather-clock"></i><?php echo date("M d Y h:i A", strtotime($urow['start_datetime'])); ?> - <?php echo date("M d Y h:i A", strtotime($urow['end_datetime'])); ?></li>
                  </ul>
                  <ul class="d-flex justify-content-start align-items-center">
                    <li> <i class="feather-map-pin"></i><?php echo $urow['address']; ?> </li>
                  </ul>
                  <ul class="d-flex justify-content-start align-items-center">
                    <li> <i class="feather-bell"></i><?php echo $urow['sport_type']; ?></li>
                  </ul>
                  <?php $win_prize = $urow['win_prize']; if($win_prize != '0') { ?>
                  <ul class="d-flex justify-content-start align-items-center">
                    <li> <i class="feather-star"></i><strong>Prize : Rs <?php echo $urow['win_prize']; ?></strong></li>
                  </ul>
                  <?php } ?>
                  <center>
                    <div class="coach-btn"> <span class="btn btn-primary w-100"><i class="feather-eye me-2"></i>View Detail</span> </div>
                  </center>
                </div>
                </a> </div>
            </div>
            <?php } }  ?>
        </div>
        <center>
          <?php  
        $sql = "SELECT COUNT(*) FROM event_master where status = '1' and DATE(end_datetime) > '$today_date' $query order by ins_datetime asc";  
        $rs_result = mysqli_query($con,$sql);  
        $row = mysqli_fetch_row($rs_result);  
        $total_records = $row[0];  
        
        // Number of pages required.
        $total_pages = ceil($total_records / $limit);  
        $pagLink = "";                        
        for ($i=1; $i<=$total_pages; $i++) {
          if ($i==$pn) {
              $pagLink .= "<span class='active'><a style='background-color:#034AAB; color:#ffffff; padding:5px 10px; font-size:19px; margin:5px;' href='dplay-events.php?page=".$i."'>".$i."</a></span>";
          }            
          else  {
              $pagLink .= "<span><a style='background-color:#02BE61; color:#ffffff; padding:5px 10px; font-size:19px; margin:5px;' href='dplay-events.php?page=".$i."'>".$i."</a></span>";  
          }
        };  
        echo $pagLink;  
      ?>
        </center>
      </section>
    </div>
  </div>
  <!-- /Page Content -->
  <!-- Footer -->
  <?php include 'footer.php' ?>
  <!-- /Footer -->
</div>
<!-- /Main Wrapper -->
<!-- jQuery -->
<script src="assets/js/jquery-3.7.1.min.js" type="9afa937b329f5456d1833359-text/javascript"></script>
<!-- Bootstrap Core JS -->
<script src="assets/js/bootstrap.bundle.min.js" type="9afa937b329f5456d1833359-text/javascript"></script>
<!-- Select JS -->
<script src="assets/plugins/select2/js/select2.min.js" type="9afa937b329f5456d1833359-text/javascript"></script>
<!-- Custom JS -->
<script src="assets/js/script.js" type="9afa937b329f5456d1833359-text/javascript"></script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="9afa937b329f5456d1833359-|49" defer></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"93b856f309b1c188","version":"2025.4.0-1-g37f21b1","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>
</html>
