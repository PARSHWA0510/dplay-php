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
            <h2 class="content-color-primary page-title">Equipment Rented List &nbsp;|&nbsp;<a class="btn btn-mini btn-success" href="equipment_rented.php">Back</a></h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content page title ends -->
  <!-- content page -->
  <div class="container mt-4 main-container">
    <div class="row">
      
      <div class="col-lg-12">
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
                          <th> Date</th>
                          <th> Customer Detail</th>
                          <th> Venue Name </th>
                          <th> Equipment Name </th>
                          <th> Duration </th>
                          <th> Price</th>
                          <th> Qty </th>
                          <th> Total </th>
                          <th> Inward </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php								 
						$ure=mysqli_query($con,"select * from equipment_rented where user_id = '$admin_id' and inward_status = '1'");
						while($urow=mysqli_fetch_array($ure))
						 {
						?>
                        <tr class="showtr">
                          <td style="display:none"><?php echo $urow[0]; ?> </td>
                          <td style="width:100px;"><?php echo date("d-m-y", strtotime($urow['ins_datetime'])); ?><br/><?php echo date("h:i A", strtotime($urow['ins_datetime'])); ?> </td>
                          <td><?php echo $urow['cust_name']; ?> <br/><?php echo $urow['cust_mobile']; ?> </td>
                      	  <td><?php $venue_id = $urow['venue_id']; 
						   $urex=mysqli_query($con,"select * from venue_master where id = '$venue_id'");
						   $urowx=mysqli_fetch_array($urex); echo $urowx['name'];?>
                      	 </td>
                     	 <td><?php $equipment_id = $urow['equipment_id'];
						  $urez=mysqli_query($con,"select * from equipment_master where id = '$equipment_id'");
						  $urowz=mysqli_fetch_array($urez); echo $urowz['name'];  ?>
                      </td>
                          <td><?php echo date("h:i", strtotime($urow['duration'])); ?> </td>
                          <td><?php echo $urow['qty']; ?> </td>
                          <td><?php echo $urow['price']; ?> </td>
                          <td><?php echo $urow['total']; ?> </td>
                          <td style="width:100px;"><?php echo date("d-m-y", strtotime($urow['inward_datetime'])); ?><br/><?php echo date("h:i A", strtotime($urow['inward_datetime'])); ?> </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                   
                   
                  </div>
                </div>
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
                    [0, "asc"]
                ]
            });
        });

    </script>
<!-- page specific script -->
</body>
</html>
