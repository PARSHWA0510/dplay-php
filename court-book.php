<?php  error_reporting(0); session_start(); include('config.php'); $cartid = $_SESSION['cartid']; $buy_session = $_SESSION['buy_session']; ?>
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
$seo1 = mysqli_query( $con, "SELECT * FROM seo_master WHERE page_name = 'Book A Court'" );
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
<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="assets/plugins/owl-carousel/owl.carousel.min.css">
<link rel="stylesheet" href="assets/plugins/owl-carousel/owl.theme.default.min.css">
<!-- Fontawesome CSS -->
<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
<!-- Select CSS -->
<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
<!-- Feathericon CSS -->
<link rel="stylesheet" href="assets/css/feather.css">
<!-- Main CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<script src="assets/js/jquery-3.7.1.min.js" type="e4eb4f411713e8cac3aaf691-text/javascript"></script> 
<script language="javascript" type="text/javascript">  
function get0(nm,str)
{
	if (window.XMLHttpRequest)
  	{// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttp=new XMLHttpRequest();
  	}
	else
  	{// code for IE6, IE5
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	
	xmlhttp.open("GET","court-book-date.php?checktbl="+nm+"&id="+str,true);
	xmlhttp.send();	
}
</script>
</head>
<body>
<!-- Main Wrapper -->
<div class="main-wrapper coach"> 
  <!-- Header -->
  <?php include 'header.php' ?>
  <!-- /Header --> 
  <!-- Breadcrumb -->
  <div class="breadcrumb mb-0"> <span class="primary-right-round"></span>
    <div class="container">
      <?php
      $court_id = $_GET[ 'id' ];
      $urex = mysqli_query( $con, "select * from court_master where id = '$court_id'" );
      $urowx = mysqli_fetch_array( $urex );
      $venue_id = $urowx[ 'venue_id' ];
      $urexv = mysqli_query( $con, "select * from venue_master where id = '$venue_id'" );
      $urowxv = mysqli_fetch_array( $urexv );
      ?>
      <h1 class="text-white">Book A Court : <?php echo $urowx['name']; ?></h1>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="<?php echo $siteurl_link; ?>/<?php echo $urowxv['seo_url']; ?>"><?php echo $urowxv['name']; ?></a></li>
        <li><?php echo $urowx['name']; ?></li>
        <li>Book A Court</li>
      </ul>
    </div>
  </div>
  <!-- /Breadcrumb --> 
  <!-- Page Content -->
  <div class="content">
    <div class="container">
      <section class="card" style="margin-bottom: 10px;">
        <div class="text-centerx">
          <?php $id = $_GET['id']; ?>
          <?php $date = $_GET['date']; ?>
          <h3 class="mb-1" style="display:inline">Select Date&nbsp;:&nbsp;</h3>
          <select name="date" class="form-control" style="width:150px; display:inline" required onChange="window.location = this.options[this.selectedIndex].value;">
            <option value="">Select Date</option>
            <?php
            $fd = date( 'Y-m-d' );
            $td = date( 'Y-m-d', strtotime( "+30 days" ) );

            $startTime = strtotime( $fd );
            $endTime = strtotime( $td );
            // Loop between timestamps, 24 hours at a time
            for ( $i = $startTime; $i <= $endTime; $i = $i + 86400 ) {
              $curdate = date( 'Y-m-d', $i );
              ?>
            <option value="court-book.php?id=<?php echo $id; ?>&date=<?php echo $curdate; ?>" <?php if($curdate == $_GET['date']) echo 'selected="selected"';?>><?php echo date("d-m-Y", strtotime($curdate)); ?></option>
            <?php } ?>
          </select>
          <?php /*?>
<div class="asjkdjsdaskj">
  <table border="0" style="margin-top:10px;">
    <tr>
      <td style="padding-right:5px;">
        <div class="newnwnsasdl" style="display:inline"> <img src="images/circlrr.png">
          <p>Default</p>
        </div>
      </td>
      <td style="padding-right:5px;">
        <div class="newnwnsasdl" style="display:inline"> <img src="images/circlrr-dot.png">
          <p>Available</p>
        </div>
      </td>
      <td>
        <div class="newnwnsasdl" style="display:inline"> <img src="images/userxs.png">
          <p>Booked</p>
        </div>
      </td>
    </tr>
  </table>
</div>
          <?php */?>
        </div>
      </section>
      <div class="row text-center">
        <div class="col-12 col-sm-12 col-md-12 col-lg-8">
          <div class="card time-date-card">
          <?php if($date == '') { ?>
          <h3>Please Select Date</h3>
          <?php } else { ?>
          <section class="booking-date">
            <div class="row">
              <?php
              $urexx = ( "select * from discount_master where court_id = '$id' and status = '1' and start_date <= '$date' and end_date >= '$date' and discount_for = 'courtbook'" );
              $urex = mysqli_query( $con, $urexx );
              $urowx = mysqli_fetch_array( $urex );
              $discount_no = mysqli_num_rows( $urex );
              $discount_per = $urowx[ 'discount_per' ];
              $discount_rs = $urowx[ 'discount_rs' ];

              if ( $date == $today_date ) {
                $slot_query = "and start_time > '$today_time'";
              }
              $dayNumber = date( 'N', strtotime( $date ) );
              // N: 1 (for Monday) through 7 (for Sunday)
              if ( $dayNumber >= 6 ) {
                $slot_price = " and weeekend_slot_price != '0'";
                $slot_status = " and weeekend_slot_status = '1'";
              } else {
                $slot_price = " and weeekday_slot_price != '0'";
                $slot_status = " and weeekday_slot_status = '1'";
              }

              $urexx = ( "select * from court_slot where court_id = '$id' $slot_price $slot_status  $slot_query" );
              $urex = mysqli_query( $con, $urexx );
              while ( $urowx = mysqli_fetch_array( $urex ) ) {
                $slot_timing = $urowx[ 'slot_timing' ];
                $noof_booking = $urowx[ 'noof_booking' ];
                $court_id = $urowx[ 'court_id' ];

                $urexyy = ( "select * from slot_disable where court_id = '$court_id' and court_time = '$slot_timing' and disable_date = '$date'" );
                $urexy = mysqli_query( $con, $urexyy );
                $urowxy_no0 = mysqli_num_rows( $urexy );

                $urexyy = ( "select * from user_court where court_id = '$court_id' and court_time = '$slot_timing' and court_date = '$date' and payment_status = '1'" );
                $urexy = mysqli_query( $con, $urexyy );
                $urowxy_no00 = mysqli_num_rows( $urexy );

                $urowxy_no1 = $urowxy_no0 + $urowxy_no00;


                $urexyy = ( "select * from user_court where court_id = '$court_id' and court_time = '$slot_timing' and court_date = '$date' and payment_status = '0' and cartid = '$cartid'" );
                $urexy = mysqli_query( $con, $urexyy );
                $urowxy_no2 = mysqli_num_rows( $urexy );
                $urexyz = mysqli_fetch_array( $urexy );
                $payment_status2 = $urexyz[ 'payment_status' ];

                $available_slot = $noof_booking - $urowxy_no1 - $urowxy_no2;
                ?>
              <?php if($urowxy_no0 == 0) { ?>
              <div class="col-12 col-sm-4 col-md-3" <?php if(isMobileDevice()) { ?> style="width:33%" <?php } ?>>
                <div class="time-slot active" style="display:block; margin-bottom: 10px; <?php if($urowxy_no00 == $noof_booking) { ?> background-color:#cccccc; <?php } ?> <?php if($urowxy_no2 > 0 && $payment_status2 == '0') { ?> background-color:#009900; <?php } ?>" <?php if($urowxy_no00 == $noof_booking) { } else { ?> <?php if($urowxy_no2 > 0 && $payment_status2 == '0') { } else { ?> onClick="location.href = 'court-book-insert.php?id=<?php echo $id; ?>&slot=<?php echo $urowx[0]; ?>&date=<?php echo $date; ?>';" <?php } } ?> <?php if($urowxy_no2 > 0 && $payment_status2 == '0') { ?> onClick="location.href = 'court-book-insert.php?id=<?php echo $id; ?>&slot=<?php echo $urowx[0]; ?>&date=<?php echo $date; ?>';" <?php } ?>>
                <span <?php if(isMobileDevice()) { ?> style="font-size:13px;" <?php } ?>><?php echo $urowx['slot_timing']; ?></span><i class="fa-regular fa-check-circle"></i> <br/>
                <?php if($discount_no != '0') { $del1 = '<del>'; $del2 = '</del>'; } else { } ?>
                <div style="color:#000000"> Rs. <?php echo $del1; ?>
                  <?php if($dayNumber >= 6) { echo $weeekend_slot_price = $urowx['weeekend_slot_price']; } else { echo $weeekday_slot_price = $urowx['weeekday_slot_price']; } ?>
                  <?php echo $del2; ?>
                  <?php if($discount_no != '0') { ?>
                  <?php
                  if ( $dayNumber >= 6 ) {
                    if ( $discount_per != '0' ) {
                      $d1 = $weeekend_slot_price * $discount_per;
                      $d2 = $d1 / 100;
                      echo $final_dis = $weeekend_slot_price - $d2;
                    } else {
                      echo $final_dis = ceil( $weeekend_slot_price - $discount_rs );
                    }
                  } else {
                    if ( $discount_per != '0' ) {
                      $d1 = $weeekday_slot_price * $discount_per;
                      $d2 = $d1 / 100;
                      echo $final_dis = $weeekday_slot_price - $d2;
                    } else {
                      echo $final_dis = ceil( $weeekday_slot_price - $discount_rs );
                    }
                  }
                  }
                  ?>
                </div>
                <div class="">
                  <?php if($urowxy_no00 == $noof_booking) { ?>
                  <a href="#" style="font-size:14px; cursor:default">Booked</a>
                  <?php } else { ?>
                  <?php if($urowxy_no2 > 0 && $payment_status2 == '0') { } else { ?>
                  <a href="court-book-insert.php?id=<?php echo $id; ?>&slot=<?php echo $urowx[0]; ?>&date=<?php echo $date; ?>" style="font-size:14px; color:#000000">Book Now</a>
                  <?php } } ?>
                  <?php if($urowxy_no2 > 0 && $payment_status2 == '0') { ?>
                  <a href="court-book-insert.php?id=<?php echo $id; ?>&slot=<?php echo $urowx[0]; ?>&date=<?php echo $date; ?>" style="font-size:14px; color:#FFFFFF;">Selected</a>
                  <?php } ?>
                  <?php if($noof_booking != '1') { if($available_slot > '0') { ?>
				  <span style="color:#ff0000; font-size:10px;"><br>Available Slot : <?php echo $available_slot; ?></span>
				  <?php } } ?></div>
              </div>
            </div>
            <?php } } ?>
            </div>
          </section>
          <?php } ?>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-4">
        <aside class="card booking-details">
          <h3 class="border-bottom">Court Details</h3>
          <div class="dz-post-text">
            <style>
.dz-post-text table tbody tr:nth-of-type(odd),
.dz-page-text table tbody tr:nth-of-type(odd),
.wp-block-table tbody tr:nth-of-type(odd) {
  text-align:left; }
.dz-post-text td,
.dz-post-text th,
.dz-page-text td,
.dz-page-text th,
.wp-block-table td,
.wp-block-table th {
  padding: 1px 2px !important;
  border: 0.0625rem solid #e4e4e4;
   }
.dz-post-text td p { margin:0px }
td { text-align:left !important; } 
</style>
            <table border="1" style="width:100%">
              <?php
              $ure = mysqli_query( $con, "select * from user_court where payment_status = '0' and cartid = '$cartid' and court_date >= '$today_date' group by venue_id order by venue_id asc" );
              while ( $urow = mysqli_fetch_array( $ure ) ) {
                $venue_id = $urow[ 'venue_id' ];
                $master = mysqli_query( $con, "SELECT * FROM venue_master WHERE id = '$venue_id'" );
                $master_detail = mysqli_fetch_array( $master );
                ?>
              <tr>
                <td colspan="3"><strong><?php echo $master_detail['name']; ?></strong></td>
              </tr>
              <?php
              $urec = mysqli_query( $con, "select * from user_court where venue_id = '$venue_id' and payment_status = '0' and cartid = '$cartid' and court_date >= '$today_date' group by court_id order by court_id asc" );
              while ( $urowc = mysqli_fetch_array( $urec ) ) {
                $court_id = $urowc[ 'court_id' ];
                $masterc = mysqli_query( $con, "SELECT * FROM court_master WHERE id = '$court_id'" );
                $master_detailc = mysqli_fetch_array( $masterc );
                ?>
              <tr>
                <td colspan="3">&nbsp;&nbsp;<?php echo $master_detailc['name']; ?></td>
              </tr>
              <?php
              $urecd = mysqli_query( $con, "select * from user_court where venue_id = '$venue_id' and court_id = '$court_id' and payment_status = '0' and cartid = '$cartid' and court_date >= '$today_date' group by court_date order by court_date asc" );
              while ( $urowcd = mysqli_fetch_array( $urecd ) ) {
                $court_date = $urowcd[ 'court_date' ];
                ?>
              <tr>
                <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("d-m-Y", strtotime($urowcd['court_date'])); ?></td>
              </tr>
              <?php
              $urecdc = mysqli_query( $con, "select * from user_court where venue_id = '$venue_id' and court_id = '$court_id' and payment_status = '0' and cartid = '$cartid' and court_date = '$court_date' order by ABS(id) asc" );
              while ( $urowcdc = mysqli_fetch_array( $urecdc ) ) {
                ?>
              <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $urowcdc['court_time'];  ?></strong></td>
                <td><strong>Rs. <?php echo $urowcdc['court_price']; ?></strong></td>
                <td><a style="padding:0px 5px" href="#" class='btn btn-mini btn-danger' onClick="performDelete('court-book.php?id=<?php echo $_GET['id']; ?>&date=<?php echo $_GET['date']; ?>&slot_id=<?php echo $urowcdc[0]; ?>'); return false;">X</a></td>
              </tr>
              <?php } } } } ?>
            </table>
          </div>
          <div class="d-grid btn-block"> <a href="<?php if($user_id == '') { ?>login.php<?php } else { ?>court-payment.php<?php } ?>" class="btn btn-primary">Subtotal : Rs
            <?php
            $urexy = ( "select SUM(court_price) from user_court where payment_status = '0' and cartid = '$cartid' and court_date >= '$today_date'" );
            $urexyy = mysqli_query( $con, $urexy );
            $urowx = mysqli_fetch_array( $urexyy );
            $court_price = $urowx[ 'SUM(court_price)' ];
            if ( $buy_session == 'courtbook' ) {
              echo $court_price;
            } else {
              echo '0';
            }
            ?>
            </a> </div>
        </aside>
      </div>
    </div>
  </div>
  <!-- /Container --> 
</div>
<script>
function performDelete(DestURL) { 
var ok = confirm("Are you sure you want to delete Court ?"); 
if (ok) {location.href = DestURL;} 
return ok; 
} 
</script>
<?php
$slot_id = $_GET[ 'slot_id' ];

if ( $slot_id ) {
  $dusr = "delete from user_court where id = '$slot_id'";
  $dre = mysqli_query( $con, $dusr );
  ?>
<script language="javascript">window.location.href="court-book.php?id=<?php echo $_GET['id']; ?>&date=<?php echo $_GET['date']; ?>";</script>
<?php  }  ?>
<!-- /Page Content --> 
<!-- Footer -->
<?php if(isMobileDevice()) { ?>
<?php
$urexy = mysqli_query( $con, "select * from user_court where payment_status = '0' and cartid = '$cartid'" );
$urowxno = mysqli_num_rows( $urexy );
if ( $urowxno > 0 ) {
  ?>
<style>
.mobcart
{
	position:fixed;
	bottom:8%;
	z-index:99;
	width:100%;
	float:right
}
</style>
<div class="d-grid btn-block mobcart"> <a href="<?php if($user_id == '') { ?>login.php<?php } else { ?>court-payment.php<?php } ?>" class="btn btn-primary">My Cart Total : Rs
  <?php
  $urexy = mysqli_query( $con, "select SUM(court_price) from user_court where payment_status = '0' and cartid = '$cartid'" );
  $urowx = mysqli_fetch_array( $urexy );
  $court_price = $urowx[ 'SUM(court_price)' ];
  if ( $buy_session == 'courtbook' ) {
    echo $court_price;
  } else {
    echo '0';
  }
  ?>
  </a> </div>
<?php } ?>
<?php } ?>
<?php include 'footer.php' ?>
<!-- /Footer -->
</div>
<!-- /Main Wrapper --> 
<!-- jQuery --> 
<script data-cfasync="false" src="court-timedate.phpcdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> 
<!-- Bootstrap Core JS --> 
<script src="assets/js/bootstrap.bundle.min.js" type="e4eb4f411713e8cac3aaf691-text/javascript"></script> 
<!-- Select JS --> 
<script src="assets/plugins/select2/js/select2.min.js" type="e4eb4f411713e8cac3aaf691-text/javascript"></script> 
<!-- Owl Carousel JS --> 
<script src="assets/plugins/owl-carousel/owl.carousel.min.js" type="e4eb4f411713e8cac3aaf691-text/javascript"></script> 
<!-- Custom JS --> 
<script src="assets/js/script.js" type="e4eb4f411713e8cac3aaf691-text/javascript"></script> 
<script src="court-timedate.phpcdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="e4eb4f411713e8cac3aaf691-|49" defer></script> 
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"93b858e34801c188","version":"2025.4.0-1-g37f21b1","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
</body>
</html>
