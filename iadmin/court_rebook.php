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
<link id="theme" rel="stylesheet" href="css/purplesidebar.css" type="text/css">
<link href="icon_fonts_assets/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
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
            <h2 class="content-color-primary page-title">Court ReBook Request</h2>
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
              <div class="table-responsive">
                <table class="table " id="dataTables-example">
                  <thead>
                    <tr>
                      <th style="display:none"> </th>
                      <th>Venue </th>
                      <th>Court </th>
                      <th>Order No </th>
                      <th>Order Date </th>
                      <th>User Detail </th>
                      <th>Old Court Date & Time </th>
                      <th>New Court Date & Time </th>
                      <th>Court Price </th>
                      <th>Approve </th>
                      <th>Reject </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php								 
						$uree=mysqli_query($con,"select * from user_court_rebook where submit_status = '1'");
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
                      <td style="display:none"><?php echo $uroww['order_datetime']; ?> </td>
                      <td><?php 
						  $urez=mysqli_query($con,"select * from venue_master where id = '$venue_id'");
						  $urowz=mysqli_fetch_array($urez); echo $urowz['name'];  ?>
                      </td>
                      <td><?php  echo $urowzc['name']; ?></td>
                      <td><?php echo $urowxy['order_no']; ?></td>
                      <td><?php echo date("d-m-Y", strtotime($urowxy['order_datetime'])); ?> </td>
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
                      <td><?php echo $uroww['court_price']; ?></td>
                      <td><a class="btn btn-mini btn-success" href="court_rebook.php?id=<?php echo $uroww[0]; ?>&status=1">Approve</a></td>
                      <td><a class="btn btn-mini btn-danger" href="court_rebook.php?id=<?php echo $uroww[0]; ?>&status=0">Reject</a>
                      </td>
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
<script language="javascript">window.location.href="court_rebook.php";</script>
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
<script language="javascript">window.location.href="court_rebook.php";</script>
<?php 
}
?>

              </div>
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
<script src="vendor/circle-progress/circle-progress.min.js"></script>
<!-- Application main common jquery file -->
<script src="js/main.js"></script>
<!-- page specific script -->
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
