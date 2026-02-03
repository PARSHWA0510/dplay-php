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
<?php } ?>
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
<!-- swiper carousel CSS -->
<link rel="stylesheet" href="vendor/swiper/css/swiper.min.css">
<!-- daterange CSS -->
<link rel="stylesheet" href="vendor/bootstrap-daterangepicker-master/daterangepicker.css">
<!-- footable CSS -->
<link rel="stylesheet" href="vendor/footable-bootstrap/css/footable.bootstrap.min.css">
<!-- jvector map CSS -->
<link rel="stylesheet" href="vendor/jquery-jvectormap/jquery-jvectormap-2.0.3.css">
<!-- Bootstra tour CSS -->
<link rel="stylesheet" href="vendor/bootstrap_tour/css/bootstrap-tour-standalone.css">
<!-- app CSS -->
<link id="theme" rel="stylesheet" href="css/purplesidebar.css" type="text/css">
<script src="js/jquery.min.js"></script>
<title>Sport CRM Panel</title>
</head>
<body class="fixed-header sidebar-right-close">
<!-- page loader -->
<!-- page loader ends  -->
<div class="wrapper">
  <!-- main header -->
  <?php include 'header.php' ?>
  <?php include 'left.php' ?>
  <?php include 'right.php' ?>
  <div class="container-fluid bg-light-opac">
    <div class="row">
      <div class="container my-3 main-container">
        <div class="row align-items-center">
          <div class="col">
            <h2 class="content-color-primary page-title">
              <form name="form" method="post">
                <select  class='form-control chosen_select' name="venue" style="width:300px; display:inline">
                  <option value="">Please Select Venue</option>
                  <?php 
							$coun=mysqli_query($con,"select * from venue_master where status = '1' order by name asc");
							while($Fcoun=mysqli_fetch_array($coun)) { 
							 ?>
                  <option value="<?php echo $Fcoun['manager_id']; ?>" <?php if($Fcoun['manager_id'] == $_GET['venue']) echo 'selected="selected"';?>><?php echo $Fcoun['name']; ?></option>
                  <?php } ?>
                </select>
                <input class="form-control" name="datestring" type="text" id="datetimerange-input1" style="width:210px; display:inline" >
                <input type="submit" name="search" value="Search" class="btn btn-primary" style="font-size:15px">
              </form>
              <?php 
if ($_POST['search']) 
{

 $venue=$_REQUEST['venue'];
 $datestring=$_REQUEST['datestring'];
 
 $first_date = substr($datestring, 0, 10); 

 $end_date = substr($datestring, 13, 10); 

 $fd = date("Y-m-d", strtotime($first_date));

 $td = date("Y-m-d", strtotime($end_date));

 
?>
              <script>window.location.href="dashboard.php?venue=<?php echo $venue; ?>&fd=<?php echo $fd; ?>&td=<?php echo $td; ?>";</script>
              <?php } 
	  				$fd = $_GET['fd'];
					$td = $_GET['td'];
					$today = date('Y-m-d');
?>
              <?php $venue = $_GET['venue']; if($venue == '') { } else { $manager_qry = "and manager_id = '$venue'"; $user_qry = "and user_qry = '$venue'"; } ?>
            </h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <style>
.card-body { padding:0px !important; } 
</style>
  <!-- content page title ends -->
  <!-- content page -->
  <div class="container mt-4 main-container">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3"> <a href="venue_master.php">
        <div class="card mb-4 success-gradient">
          <div class="card-body">
            <div class="media">
              <div class="media-body">
                <p class="text-white mb-0">Today Venue</p>
                <h4 class="mb-0 mt-1">
                  <?php $ure=mysqli_query($con,"select * from venue_master where id != '0' $manager_qry"); echo $urow=mysqli_num_rows($ure); ?>
                </h4>
              </div>
            </div>
          </div>
        </div>
        </a> </div>
      <div class="col-12 col-md-6 col-lg-3"> <a href="court_master.php">
        <div class="card mb-4 danger-gradient">
          <div class="card-body">
            <div class="media">
              <div class="media-body">
                <p class="text-white mb-0">Total Court</p>
                <h4 class="mb-0 mt-1">
                  <?php $ure=mysqli_query($con,"select * from court_master where id != '0' $user_qry"); echo $urow=mysqli_num_rows($ure); ?>
                </h4>
              </div>
            </div>
          </div>
        </div>
        </a> </div>
      <div class="col-12 col-md-6 col-lg-3"> <a href="coach_master.php">
        <div class="card mb-4 warning-gradient">
          <div class="card-body">
            <div class="media">
              <div class="media-body">
                <p class="text-white mb-0">Total Coaches</p>
                <h4 class="mb-0 mt-1">
                  <?php $ure=mysqli_query($con,"select * from user_master where user_type = 'coach' $manager_qry"); echo $urow=mysqli_num_rows($ure); ?>
                </h4>
              </div>
            </div>
          </div>
        </div>
        </a> </div>
      <div class="col-12 col-md-6 col-lg-3"> <a href="package_manager.php">
        <div class="card mb-4 primary-gradient">
          <div class="card-body">
            <div class="media">
              <div class="media-body">
                <p class="text-white mb-0">Total Package</p>
                <h4 class="mb-0 mt-1">
                  <?php $ure=mysqli_query($con,"select * from package_user where id != '0' $user_qry"); echo $urow=mysqli_num_rows($ure); ?>
                </h4>
              </div>
            </div>
          </div>
        </div>
        </a> </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-3">
        <div class="card mb-4 success-gradient">
          <div class="card-body">
            <div class="media">
              <div class="media-body">
                <p class="text-white mb-0">Today Booking</p>
                <h4 class="mb-0 mt-1">
                  <?php $ure=mysqli_query($con,"select * from user_court where court_date = '$today_date' $manager_qry"); echo $urow=mysqli_num_rows($ure); ?>
                </h4>
              </div>
              <div class="w-auto position-relative">
                <div class="text-white"><i class="material-icons icon-sm">arrow_drop_down</i>
                  <?php $ure=mysqli_query($con,"select SUM(court_price) from user_court where court_date = '$today_date' $manager_qry"); $urow=mysqli_fetch_array($ure); echo $urow['SUM(court_price)']; ?>
                </div>
                <div class="dynamicsparkline mt-2"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-3">
        <div class="card mb-4 danger-gradient">
          <div class="card-body">
            <div class="media">
              <div class="media-body">
                <p class="text-white mb-0">Total Re-Book Request</p>
                <h4 class="mb-0 mt-1">
                  <?php $ure=mysqli_query($con,"select * from user_court_rebook where court_date = '$today_date' $manager_qry"); echo $urow=mysqli_num_rows($ure); ?>
                  <span class="dynamicsparkline mt-1 float-right"></span></h4>
              </div>
              <div class="w-auto position-relative">
                <div class="text-white"><i class="material-icons icon-sm">arrow_drop_down</i>
                  <?php $ure=mysqli_query($con,"select SUM(court_price) from user_court_rebook where court_date = '$today_date' $manager_qry"); $urow=mysqli_fetch_array($ure); echo $urow['SUM(court_price)']; ?>
                </div>
                <div class="dynamicsparkline mt-2"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-3">
        <div class="card mb-4 warning-gradient">
          <div class="card-body">
            <div class="media">
              <div class="media-body">
                <p class="text-white mb-0">Total Equipment Rented</p>
                <h4 class="mb-0 mt-1">
                  <?php $ure=mysqli_query($con,"select * from equipment_rented where inward_status = '0' $user_qry"); echo $urow=mysqli_num_rows($ure); ?>
                  <span class="dynamicsparkline mt-1 float-right"></span></h4>
              </div>
              <div class="w-auto position-relative">
                <div class="text-white"><i class="material-icons icon-sm">arrow_drop_down</i>
                  <?php $ure=mysqli_query($con,"select SUM(total) from equipment_rented where inward_status = '0' $user_qry"); $urow=mysqli_fetch_array($ure); echo $urow['SUM(total)']; ?>
                </div>
                <div class="dynamicsparkline mt-2"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-3">
        <div class="card mb-4 primary-gradient">
          <div class="card-body">
            <div class="media">
              <div class="media-body">
                <p class="text-white mb-0">Total Cafe Order</p>
                <h4 class="mb-0 mt-1">
                  <?php $ure=mysqli_query($con,"select * from order_master where red_oid = '0' $user_qry"); echo $urow=mysqli_num_rows($ure); ?>
                  <span class="dynamicsparkline mt-1 float-right"></span></h4>
              </div>
              <div class="w-auto position-relative">
                <div class="text-white"><i class="material-icons icon-sm">arrow_drop_down</i>
                  <?php $ure=mysqli_query($con,"select SUM(amount) from order_master where id != '0' $user_qry"); $urow=mysqli_fetch_array($ure); echo $urow['SUM(amount)']; ?>
                </div>
                <div class="dynamicsparkline mt-2"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-5">
        <div class="card mb-4">
          <div class="element-wrapper">
            <div class="element-box">
              <div class="table-responsive">
                <div class="btn btn-primary">Today Court Booking</div>
                <table class="table " id="dataTables-example" style="margin-top:5px;">
                  <thead>
                    <tr>
                      <th>User Detail </th>
                      <th>Court Date </th>
                      <th>Court Time </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php								 
					$uree=mysqli_query($con,"select * from user_court where payment_status = '1' and court_date = '$today_date' $manager_qry order by court_time asc");
					while($uroww=mysqli_fetch_array($uree))
					{ ?>
                    <tr class="showtr">
                      <td><?php $user_id = $uroww['user_id'];
						  $urez=mysqli_query($con,"select * from user_master where id = '$user_id'");
						  $urowz=mysqli_fetch_array($urez); echo $urowz['contact1']; echo '<br/>'; echo $urowz['name'];   ?>
                      </td>
                      <td><?php echo date("d-m-Y", strtotime($uroww['court_date'])); ?> </td>
                      <td><?php echo $uroww['court_time']; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="card mb-4">
          <div class="element-wrapper">
            <div class="element-box">
              <div class="table-responsive">
                <div class="btn btn-primary">ReBook Request</div>
                <table class="table " id="dataTables-example">
                  <thead>
                    <tr>
                      <th style="display:none"> </th>
                      <th>Venue </th>
                      <th>Court </th>
                      <th>User Detail </th>
                      <th>Old DateTime </th>
                      <th>New DateTime </th>
                      <th>Approve </th>
                      <th>Reject </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php								 
						$uree=mysqli_query($con,"select * from user_court_rebook where submit_status = '1' $manager_qry");
						while($uroww=mysqli_fetch_array($uree))
						{
						$old_bookid = $uroww['old_bookid'];
						$court_id = $uroww['court_id'];
						$urezc=mysqli_query($con,"select * from court_master where id = '$court_id'");
						$urowzc=mysqli_fetch_array($urezc);
						$venue_id = $urowzc['venue_id'];
						
						$urexyz=mysqli_query($con,"select * from user_court where id = '$old_bookid'");
						$urowxy=mysqli_fetch_array($urexyz);
						$order_no = $urowxy['order_no'];
						$order_datetime = $urowxy['order_datetime'];

						?>
                    <tr class="showtr">
                      <td><?php 
						  $urez=mysqli_query($con,"select * from venue_master where id = '$venue_id'");
						  $urowz=mysqli_fetch_array($urez); echo $urowz['name'];  ?>
                      </td>
                      <td><?php echo $urowzc['name']; ?></td>
                      <td><?php $user_id = $uroww['user_id'];
						  $urez=mysqli_query($con,"select * from user_master where id = '$user_id'");
						  $urowz=mysqli_fetch_array($urez); echo $urowz['contact1']; echo '<br/>'; echo $urowz['name'];   ?>
                      </td>
                      <td><?php 
					  $ureex=mysqli_query($con,"select * from user_court where id = '$old_bookid'");
					  $urowwx=mysqli_fetch_array($ureex); echo date("d-m-Y", strtotime($urowwx['court_date'])); ?>
                        <br/>
                        <?php echo $urowwx['court_time']; ?> </td>
                      <td><?php echo date("d-m-Y", strtotime($uroww['court_date'])); ?><br/>
                        <?php echo $uroww['court_time']; ?></td>
                      <td><a class="btn btn-mini btn-success" href="dashboard.php?id=<?php echo $uroww[0]; ?>&status=1">Approve</a></td>
                      <td><a class="btn btn-mini btn-danger" href="dashboard.php?id=<?php echo $uroww[0]; ?>&status=0">Reject</a> </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <?php 
$status = $_GET['status'];
$id = $_GET['id'];
?>
                <?php 
if($status == '1')
{
$urexy=mysqli_query($con,"select * from user_court_rebook where id = '$id'");
$urowx=mysqli_fetch_array($urexy);
$user_id = $urowx['user_id'];
$court_id = $urowx['court_id'];
$slot_id = $urowx['slot_id'];
$court_date = $urowx['court_date'];
$court_time = $urowx['court_time'];
$court_price = $urowx['court_price'];
$manager_id = $urowx['manager_id'];
$old_bookid = $urowx['old_bookid'];

$urexyz=mysqli_query($con,"select * from user_court where id = '$old_bookid'");
$urowxy=mysqli_fetch_array($urexyz);
$order_no = $urowxy['order_no'];
$order_datetime = $urowxy['order_datetime'];

$sql=("INSERT INTO `user_court` (`user_id`, `court_date`,`court_time`,`court_price`,  `order_no`, `order_datetime`, `court_id`, `slot_id`, `payment_status`) VALUES ('$user_id','$court_date','$court_time','$court_price','$order_no','$order_datetime','$court_id','$slot_id','1')");	
$z = mysqli_query($con,$sql);

$delete = "DELETE FROM user_court WHERE id = '$old_bookid'";
mysqli_query($con, $delete);

$delete = "DELETE FROM user_court_rebook WHERE id = '$id'";
mysqli_query($con, $delete);
?>
                <script>alert('Rebook Successfully Approved.');</script>
                <script language="javascript">window.location.href="dashboard.php";</script>
                <?php 
}
?>
                <?php 
if($status == '0')
{
$delete = "DELETE FROM user_court_rebook WHERE id = '$id'";
mysqli_query($con, $delete);
?>
                <script>alert('Rebook Successfully Rejected.');</script>
                <script language="javascript">window.location.href="dashboard.php";</script>
                <?php 
}
?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="card mb-4">
          <div class="element-wrapper">
            <div class="element-box">
              <div class="table-responsive">
                <div class="btn btn-primary">Today Coach Booking</div>
                <table class="table " id="dataTables-example" style="margin-top:5px;">
                  <thead>
                    <tr>
                      <th> Time</th>
                      <th> Coach </th>
                      <th> Name<br/>
                        Email<br/>
                        Mobile</th>
                      <th> Price</th>
                      <th> Qty</th>
                      <th> Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php								 
						$ure=mysqli_query($con,"select * from coach_booked where DATE(booking_datetime) = '$today_date' $manager_qry order by booking_datetime asc");
						while($urow=mysqli_fetch_array($ure))
						 {
						?>
                    <tr class="showtr">
                      <td><?php echo date("h:i A", strtotime($urow['booking_datetime'])); ?></td>
                      <td><?php $coach_id = $urow['coach_id']; 
						   $urex=mysqli_query($con,"select * from user_master where id = '$coach_id'");
						   $urowx=mysqli_fetch_array($urex); echo $urowx['name'];?>
                      </td>
                      <td><?php echo $urow['name']; ?> <br/>
                        <?php echo $urow['email']; ?> <br/>
                        <?php echo $urow['mobile']; ?> </td>
                      <td><?php echo $urow['price']; ?> </td>
                      <td><?php echo $urow['qty']; ?> </td>
                      <td><?php echo $urow['total']; ?> </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card mb-4">
          <div class="element-wrapper">
            <div class="element-box">
              <div class="table-responsive">
                <div class="btn btn-primary">Today Event Booking</div>
                <table class="table " id="dataTables-example">
                  <thead>
                    <tr>
                      <th> Time</th>
                      <th> Name<br/>
                        Email<br/>
                        Mobile</th>
                      <th> Event</th>
                      <th> Price</th>
                      <th> Qty</th>
                      <th> Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php								 
						$ure=mysqli_query($con,"select * from event_booked where DATE(ins_datetime) = '$today_date' $manager_qry order by ins_datetime asc");
						while($urow=mysqli_fetch_array($ure))
						 {
						?>
                    <tr class="showtr">
                      <td><?php echo date("h:i A", strtotime($urow['ins_datetime'])); ?></td>
                      <td><?php echo $urow['name']; ?> <br/>
                        <?php echo $urow['email']; ?> <br/>
                        <?php echo $urow['mobile']; ?> </td>
                      <td><?php $event_id = $urow['event_id']; 
						   $urex=mysqli_query($con,"select * from event_master where id = '$event_id'");
						   $urowx=mysqli_fetch_array($urex); echo $urowx['name'];?>
                      </td>
                      <td><?php echo $urow['price']; ?> </td>
                      <td><?php echo $urow['qty']; ?> </td>
                      <td><?php echo $urow['total']; ?> </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php /*?><div class="col-lg-12">
        <div class="card mb-4">
          <div class="element-wrapper">
            <div class="element-box">
              <div class="table-responsive">
                <div class="btn btn-primary">Booking Monthwise</div>
                <?php
$year_range = date('Y');
$uree1=("select * from user_court where court_date between '".$year_range."-01-01' and '".$year_range."-01-31' and payment_status = '1'");
$ureex1 = mysqli_query($con,$uree1);
$ad1x=mysqli_num_rows($ureex1);
$uree2=("select * from user_court where court_date between '".$year_range."-02-01' and '".$year_range."-02-29' and payment_status = '1'");
$ureex2 = mysqli_query($con,$uree2);
$ad2x=mysqli_num_rows($ureex2);
$uree3=("select * from user_court where court_date between '".$year_range."-03-01' and '".$year_range."-03-31' and payment_status = '1'");
$ureex3 = mysqli_query($con,$uree3);
$ad3x=mysqli_num_rows($ureex3);
$uree4=("select * from user_court where court_date between '".$year_range."-04-01' and '".$year_range."-04-30' and payment_status = '1'");
$ureex4 = mysqli_query($con,$uree4);
$ad4x=mysqli_num_rows($ureex4);
$uree5=("select * from user_court where court_date between '".$year_range."-05-01' and '".$year_range."-05-31' and payment_status = '1'");
$ureex5 = mysqli_query($con,$uree5);
$ad5x=mysqli_num_rows($ureex5);
$uree6=("select * from user_court where court_date between '".$year_range."-06-01' and '".$year_range."-06-30' and payment_status = '1'");
$ureex6 = mysqli_query($con,$uree6);
$ad6x=mysqli_num_rows($ureex6);
$uree7=("select * from user_court where court_date between '".$year_range."-07-01' and '".$year_range."-07-31' and payment_status = '1'");
$ureex7 = mysqli_query($con,$uree7);
$ad7x=mysqli_num_rows($ureex7);
$uree8=("select * from user_court where court_date between '".$year_range."-08-01' and '".$year_range."-08-31' and payment_status = '1'");
$ureex8 = mysqli_query($con,$uree8);
$ad8x=mysqli_num_rows($ureex8);
$uree9=("select * from user_court where court_date between '".$year_range."-09-01' and '".$year_range."-09-30' and payment_status = '1'");
$ureex9 = mysqli_query($con,$uree9);
$ad9x=mysqli_num_rows($ureex9);
$uree10=("select * from user_court where court_date between '".$year_range."-10-01' and '".$year_range."-10-31' and payment_status = '1'");
$ureex10 = mysqli_query($con,$uree10);
$ad10x=mysqli_num_rows($ureex10);
$uree11=("select * from user_court where court_date between '".$year_range."-11-01' and '".$year_range."-11-30' and payment_status = '1'");
$ureex11 = mysqli_query($con,$uree11);
$ad11x=mysqli_num_rows($ureex11);
$uree12=("select * from user_court where court_date between '".$year_range."-12-01' and '".$year_range."-12-31' and payment_status = '1'");
$ureex12 = mysqli_query($con,$uree12);
$ad12x=mysqli_num_rows($ureex12);
?>
                <?php
$dataPoints1 = array(
	array("label"=> "JAN", "y"=> $ad1x),
	array("label"=> "FEB", "y"=> $ad2x),
	array("label"=> "MAR", "y"=> $ad3x),
	array("label"=> "APR", "y"=> $ad4x),
	array("label"=> "MAY", "y"=> $ad5x),
	array("label"=> "JUN", "y"=> $ad6x),
	array("label"=> "JUL", "y"=> $ad7x),
	array("label"=> "AUG", "y"=> $ad8x),
	array("label"=> "SEP", "y"=> $ad9x),
	array("label"=> "OCT", "y"=> $ad10x),
	array("label"=> "NOV", "y"=> $ad11x),
	array("label"=> "DEC", "y"=> $ad12x)
);
	
?>
                <script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Total Booking"
	},
	axisY:{
		includeZero: true
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Court Booking",
		indexLabel: "{y}",
		yValueFormatString: "#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
}
 
}
</script>
                <div id="chartContainer" style="height: 440px; width: 100%;"></div>
                <script src="canvasjs.min.js"></script>
              </div>
            </div>
          </div>
        </div>
      </div><?php */?>
    </div>
  </div>
  <!-- content page ends -->
</div>
<?php include 'footer.php' ?>
<!-- modal for create form -->
<!-- modal for create form ends-->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
<!-- Footable jquery file -->
<script src="vendor/footable-bootstrap/js/footable.min.js"></script>
<!-- CK editor file -->
<script src="vendor/ckeditor/ckeditor.js"></script>
<!-- datepicker jquery file -->
<script src="vendor/bootstrap-daterangepicker-master/moment.js"></script>
<script src="vendor/bootstrap-daterangepicker-master/daterangepicker.js"></script>
<!-- jVector map jquery file -->
<script src="vendor/jquery-jvectormap/jquery-jvectormap.js"></script>
<script src="vendor/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- circular progress file -->
<script src="vendor/circle-progress/circle-progress.min.js"></script>
<!-- Bootstrap tour jquery file -->
<script src="vendor/bootstrap_tour/js/bootstrap-tour-standalone.min.js"></script>
<!-- Application main common jquery file -->
<script src="js/main.js"></script>
<!-- page specific script -->
<script src="js/dashboard-network.js"></script>
<?php include 'daterangepicker.php'; ?>
</body>
</html>
