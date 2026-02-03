<?php  error_reporting(0);
session_start();
ob_start();
include('../config.php');
  $admin_id = $_SESSION['admin_id'];
  $company_id = $_SESSION['company_id'];
if($admin_id == '' || $company_id == '')
{
?>
<script>window.location.href="index.php";</script>
<?php } 
if(empty($_SESSION['cartid']))
{
$_SESSION['cartid'] = uniqid();
}
$cartid = $_SESSION['cartid']; 
?>
<?php date_default_timezone_set('Asia/Kolkata');  $today_datetime = date('Y-m-d H:i:s');  $today_date = date('Y-m-d'); $today_time = date('H:i:s'); ?>
<!doctype html>
<html lang="en">
<head>
<title>Sport CRM Panel</title>
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
<!-- swiper carousel CSS -->
<link rel="stylesheet" href="vendor/swiper/css/swiper.min.css">
<!-- daterange CSS -->
<link rel="stylesheet" href="vendor/bootstrap-daterangepicker-master/daterangepicker.css">
<!-- dataTable CSS -->
<link rel="stylesheet" href="vendor/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
<!-- jvector map CSS -->
<link rel="stylesheet" href="vendor/jquery-jvectormap/jquery-jvectormap-2.0.3.css">
<!-- app CSS -->
<link rel="stylesheet" href="vendor/chosen1.8/chosen.css">
<link id="theme" rel="stylesheet" href="css/purplesidebar.css" type="text/css">
<link href="icon_fonts_assets/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
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
xmlhttp.open("GET","court_booking_customer.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>
<body class="fixed-header sidebar-right-close">
<!-- page loader -->
<!-- page loader ends  -->
<div class="wrapper">
  <!-- main header -->
  <?php include 'header.php' ?>
  <?php include 'left.php' ?>
  <?php include 'right.php' ?>
  <!-- setting sidebar ends -->
  <!-- content page title -->
  <div class="container-fluid bg-light-opac">
    <div class="row">
      <div class="container my-3 main-container">
        <div class="row align-items-center">
          <div class="col">
            <h2 class="content-color-primary page-title">Offline Booking</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content page title ends -->
  <!-- content page -->
  <div class="container mt-4 main-container">
    <div class="card mb-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="element-wrapper">
            <div class="element-box">
            <form autocomplete="off"  name="form" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="">Select Court </label>
                    <select name="id" class="form-control" required onChange="window.location = this.options[this.selectedIndex].value;">
                      <option value="">Select Court</option>
                      <?php 
							$coun=mysqli_query($con,"select * from court_master where status = '1' and user_id = '$admin_id' order by name asc");
							while($Fcoun=mysqli_fetch_array($coun)) { 
							 ?>
                      <option value="court_booking.php?id=<?php echo $Fcoun[0]; ?>&date=<?php echo $_GET['date']; ?>" <?php if($Fcoun[0] == $_GET['id']) echo 'selected="selected"';?>><?php echo $Fcoun['name']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="">Select Date </label>
                    <select name="date" class="form-control" required onChange="window.location = this.options[this.selectedIndex].value;">
                      <option value="">Select Date</option>
                      <?php 
						$fd = date('Y-m-d');
						$td = date('Y-m-d', strtotime("+30 days"));
								  
						$startTime = strtotime($fd);
						$endTime = strtotime($td);
						// Loop between timestamps, 24 hours at a time
						for ( $i = $startTime; $i <= $endTime; $i = $i + 86400 ) 
						{
						$curdate = date( 'Y-m-d', $i ); ?>
                      <option value="court_booking.php?id=<?php echo $_GET['id']; ?>&date=<?php echo $curdate; ?>" <?php if($curdate == $_GET['date']) echo 'selected="selected"';?>><?php echo date("d-m-Y", strtotime($curdate)); ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for=""> View Schedule</label>
                    <section class="booking-date">
                    <div class="row">
                      <?php   $id = $_GET['id']; $date = $_GET['date'];
				  if($date == $today_date) { $slot_query = "and start_time > '$today_time'"; }
				  $dayNumber = date('N', strtotime($date)); 
				  // N: 1 (for Monday) through 7 (for Sunday)
				  if ($dayNumber >= 6) {
				  $slot_price = " and weeekend_slot_price != '0'";
				  $slot_status = " and weeekend_slot_status = '1'";
				  }
				  else
				  {
				  $slot_price = " and weeekday_slot_price != '0'";
				  $slot_status = " and weeekday_slot_status = '1'";
				  }

				  $urexx=("select * from court_slot where court_id = '$id' $slot_price $slot_status  $slot_query");
				  $urex = mysqli_query($con,$urexx);
				  while($urowx=mysqli_fetch_array($urex)) { 
				  $slot_timing = $urowx['slot_timing'];
				  $noof_booking = $urowx['noof_booking'];
				  $court_id = $urowx['court_id'];
				  
				  $urexyy=("select * from slot_disable where court_id = '$court_id' and court_time = '$slot_timing' and disable_date = '$date'");
				  $urexy = mysqli_query($con,$urexyy);
				  $urowxy_no0=mysqli_num_rows($urexy);

				  $urexyy=("select * from user_court where court_id = '$court_id' and court_time = '$slot_timing' and court_date = '$date' and payment_status = '1'");
				  $urexy = mysqli_query($con,$urexyy);
				  $urowxy_no00=mysqli_num_rows($urexy);
					
				  $urowxy_no1 = $urowxy_no0 + $urowxy_no00;

				  $urexyy=("select * from user_court where court_id = '$court_id' and court_time = '$slot_timing' and court_date = '$date' and payment_status = '0' and cartid = '$cartid'");
				  $urexy = mysqli_query($con,$urexyy);
				  $urowxy_no2=mysqli_num_rows($urexy);
				  $urexyz=mysqli_fetch_array($urexy);
				  $payment_status2 = $urexyz['payment_status'];
				  
				  $available_slot = $noof_booking - $urowxy_no1 - $urowxy_no2;
				  ?>
                      <?php if($urowxy_no0 == 0) { ?>
                      <div class="col-12 col-sm-4 col-md-3" <?php if(isMobileDevice()) { ?> style="width:33%" <?php } else { ?> <?php } ?>>
                        <div class="time-slot active" style="display:block; margin-bottom: 10px; background:#f5f5f5; <?php if($urowxy_no00 == $noof_booking) { ?> background-color:#cccccc; <?php } ?> <?php if($urowxy_no2 > 0 && $payment_status2 == '0') { ?> background-color:#009900; <?php } ?> padding:5px; border-radius:10px;" <?php if($urowxy_no00 == $noof_booking) { } else { ?> <?php if($urowxy_no2 > 0 && $payment_status2 == '0') { } else { ?> onClick="location.href = 'court-book-insert.php?id=<?php echo $id; ?>&slot=<?php echo $urowx[0]; ?>&date=<?php echo $date; ?>';" <?php } } ?> <?php if($urowxy_no2 > 0 && $payment_status2 == '0') { ?> onClick="location.href = 'court-book-insert.php?id=<?php echo $id; ?>&slot=<?php echo $urowx[0]; ?>&date=<?php echo $date; ?>';" <?php } ?>>
                        <span <?php if(isMobileDevice()) { ?> style="font-size:13px;" <?php } ?>><?php echo $urowx['slot_timing']; ?></span><i class="fa-regular fa-check-circle"></i> <br/>
                        <div class="" style="color:#000000">Rs.
                          <?php if ($dayNumber >= 6) { echo $urowx['weeekend_slot_price']; } else { echo $urowx['weeekday_slot_price']; } ?>
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
				 		  <?php } } ?> 	
                        </div>
                      </div>
                    </div>
                    <?php } } ?>
                  </div>
                  </section>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for=""> Total Amount</label>
                  <?php 
					  $urexy=mysqli_query($con,"select SUM(court_price) from user_court where court_id = '$id' and payment_status = '0' and cartid = '$cartid'");
					  $urowx=mysqli_fetch_array($urexy);
					  $court_price = $urowx['SUM(court_price)'];
					 ?>
                  <input class="form-control" name="court_price"  value="<?php echo $court_price; ?>" type="text">
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for=""> Contact No</label>
                  <input class="form-control" name="contact_no"  type="text" onChange="showUser1(this.value)">
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for=""> Email</label>
                  <span id="txtHint1">
                  <input class="form-control" name="email1" type="text">
                  </span> </div>
              </div>
              </div>
              <div class="form-buttons-w">
                <input type="submit" name="book_order" value="Book Order" class="btn btn-primary">
                <input value="Cancel" name="cancel" type="reset" class="btn btn-danger">
              </div>
            </form>
            <?php 
if ($_POST['book_order']) 
{
$contact_no = $_REQUEST['contact_no'];
$email1 = $_REQUEST['email1'];
$contact_no = $_REQUEST['contact_no'];
$ure=mysqli_query($con,"select * from user_master where contact1 = '$contact_no'");
$memno=mysqli_num_rows($ure);
if($memno == '0')
{
$sql=mysqli_query($con,"INSERT INTO `user_master` (`username`,`contact1`,`email1`, `password`, `join_date`, `status`, `user_type`) VALUES ('".mysqli_real_escape_string($con,$_REQUEST['contact_no'])."','".mysqli_real_escape_string($con,$_REQUEST['contact_no'])."','".mysqli_real_escape_string($con,$_REQUEST['email1'])."', '123456','$today_date','1','customer')");	 
$insid = mysqli_insert_id($con);
}
else
{
$urow=mysqli_fetch_array($ure); 
$insid = $urow[0];
}

$uretbo=mysqli_query($con,"select * from user_court where manager_id = '0' and cartid = '$cartid'");
while($urowtbo=mysqli_fetch_array($uretbo))
{
$court_id = $urowtbo['court_id']; 
$id = $urowtbo[0]; 
				
$urehid=mysqli_query($con,"select * from court_master where id = '$court_id'");
$urowhid=mysqli_fetch_array($urehid);
$manager_id = $urowhid['user_id']; 
				
$uupQry="UPDATE user_court SET `manager_id` = '$manager_id' WHERE id = '$id'";
$uuresult=mysqli_query($con,$uupQry);	
}

$uupQry="UPDATE user_court SET user_id='$insid' where user_id = '0' and cartid = '$cartid'";
$uuresult=mysqli_query($con,$uupQry);		

$id = $_GET['id']; $date = $_GET['date'];
$uupQry="UPDATE user_court SET payment_status='1' WHERE court_id='$id' and user_id='$insid' and payment_status = '0' and cartid = '$cartid'";
$uuresult=mysqli_query($con,$uupQry);

unset($_SESSION['cartid']);
?>
            <script language="javascript">window.location.href="court_booking.php";</script>
            <?php  } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- content page ends -->
</div>
<?php include 'footer.php' ?>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="vendor/bootstrap-4.1.3/js/bootstrap.min.js"></script>
<!-- Cookie jquery file -->
<script src="vendor/cookie/jquery.cookie.js"></script>
<!-- sparklines chart jquery file -->
<script src="vendor/sparklines/jquery.sparkline.min.js"></script>
<!-- Circular progress gauge jquery file -->
<script src="vendor/circle-progress/circle-progress.min.js"></script>
<!-- Swiper carousel jquery file -->
<script src="vendor/swiper/js/swiper.min.js"></script>
<!-- Chart js jquery file -->
<script src="vendor/chartjs/Chart.bundle.min.js"></script>
<script src="vendor/chartjs/utils.js"></script>
<!-- DataTable jquery file -->
<script src="vendor/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
<script src="vendor/DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>
<!-- datepicker jquery file -->
<script src="vendor/bootstrap-daterangepicker-master/moment.js"></script>
<script src="vendor/bootstrap-daterangepicker-master/daterangepicker.js"></script>
<!-- jVector map jquery file -->
<script src="vendor/jquery-jvectormap/jquery-jvectormap.js"></script>
<script src="vendor/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- circular progress file -->
<script src="vendor/chosen1.8/chosen.jquery.min.js"></script>
<script src="vendor/circle-progress/circle-progress.min.js"></script>
<!-- Application main common jquery file -->
<script src="js/main.js"></script>
<!-- page specific script -->
<script>
    "use script";
        $('.chosen_select').chosen();
    </script>
<script>
        "use strict"
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                "order": [
                    [0, "desc"]
                ]
            });
        });

    </script>
<!-- page specific script -->
</body>
</html>
