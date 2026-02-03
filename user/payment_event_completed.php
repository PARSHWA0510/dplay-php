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
            <h2 class="content-color-primary page-title">Event Booking Payment Completed</h2>
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
<style>
a.tooltipt1 {outline:none; }

a.tooltipt1:hover {text-decoration:none;} 
a.tooltipt1 span {
    z-index:10;display:none; padding:5px;
    margin-top:0px; margin-left:20px;
    width:200px; line-height:16px; text-align:left;
}
a.tooltipt1:hover span{
    display:inline; position:absolute; color:#111;
    border:1px solid #DCA; background:#fffAF0;}
.callout {z-index:20;position:absolute;top:30px;border:0;left:-12px;}
    
/*CSS3 extras*/
a.tooltipt1 span
{
    border-radius:4px;
    box-shadow: 5px 5px 8px #CCC;
}
				  </style>
				  
				  <?php 
			  $coun=mysqli_query($con,"select * from event_master where status = '1' and user_id = '$admin_id'");
			  $Fcoun_no=mysqli_num_rows($coun);
			  if($Fcoun_no > 0) { ?>
					
                <table class="table " id="dataTables-example">
                  <thead>
                    <tr>
                      <th style="display:none"> </th>
                      <th>Order No </th>
                      <th>Order Date </th>
                      <th>Event Name <br>Category </th>
                      <th>Accessories </th>
                      <th>Lable </th>
                      <th>No of Ppl </th>
                      <th>User Detail </th>
                      <th>Print </th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
					while($Fcoun=mysqli_fetch_array($coun)) 
					{ 
					$event_id[] = $Fcoun[0];
					}				
					$event_all = "'" . implode("','", $event_id) . "'";
					if($session != '') { $query = "and event_id IN ($event_all)"; }
					
					$uree=mysqli_query($con,"select * from user_order where payment_status = '1' and order_type = 'eventbook' $query");
					while($uroww=mysqli_fetch_array($uree))
					{  ?>
                    <tr class="showtr">
                      <td style="display:none"><?php echo $uroww['order_datetime']; ?> </td>
                      <td><?php echo $uroww['order_no']; ?></td>
                      <td><?php echo $invoice_date = date("d-m-Y", strtotime($uroww['order_datetime'])); ?> </td>
                      <td><strong>
                        <?php
                        $event_id = $uroww[ 'event_id' ];
                        $urez = mysqli_query( $con, "select * from event_master where id = '$event_id'" );
                        $urowz = mysqli_fetch_array( $urez );
                        echo $urowz[ 'name' ];
                        ?>
                        </strong> <br>
                        <?php
                        $event_book_id = $uroww[ 'event_book_id' ];
                        $urez = mysqli_query( $con, "select * from event_data where id = '$event_book_id'" );
                        $urowz = mysqli_fetch_array( $urez );
                        echo $urowz[ 'data_title' ];
                        ?></td>
                      <td><?php $order_id = $uroww[0];
						  $urez=mysqli_query($con,"select * from user_order_accessories where order_id = '$order_id' order by ABS(event_id) asc");
						  while($urowz=mysqli_fetch_array($urez)) { $event_id = $urowz['event_id']; $event_accessories_id = $urowz['event_accessories_id'];
						  ?>
                        <strong>
                        <?php  
						  $ureb1=mysqli_query($con,"select * from event_accessories where id = '$event_id'");
						  $ureb_no1 = mysqli_fetch_array($ureb1); echo $ureb_no1['name']; ?>
                        </strong> :
                        <?php  
						  $ureb2=mysqli_query($con,"select * from event_accessories where id = '$event_accessories_id'");
						  $ureb_no2 = mysqli_fetch_array($ureb2); echo $ureb_no2['accessories']; ?>
                        <br/>
                        <?php } ?>
                      </td>
						<td>
					  <?php
						$urezmm = mysqli_query( $con, "select * from user_order_labledata where order_id = '$order_id' order by ABS(id) asc" );
						$urezmm_no = mysqli_num_rows($urezmm); if($urezmm_no > 0) {  ?>
	  					<a class="btn btn-success btn-mini tooltipt1" style="color:#ffffff " data-toggle="tooltip" title="Manage Followup">View <span> <strong>
                        <table class="table table-striped table-bordered">
                          <tr>
                            <th>Lable/Field</th>
                            <th>Lable Data</th>
                          </tr>
                          <?php
                          while($urowmm = mysqli_fetch_array($urezmm)) { ?>
                          <tr>
                            <td><?php echo $urowmm['lable_title']; ?></td>
                            <td><?php echo $urowmm['lable_data']; ?></td>
                          </tr>
                          <?php } ?>
                        </table>
                        </strong> </span> </a>
						<?php } ?>
					  </td>
                      <td><?php echo $uroww['event_qty']; ?></td>
                      <td><?php $user_id = $uroww['user_id'];
						  $urez=mysqli_query($con,"select * from user_master where id = '$user_id'");
						  $urowz=mysqli_fetch_array($urez); echo $urowz['name']; ?>
                        <br/>
                        <?php echo $urowz['contact1']; ?></td>
                      <td><a href="../order-event.php?order_id=<?php echo $uroww['order_id']; ?>" class="btn btn-success btn-mini" target="_blank"><i class="feather-printer me-2"></i>Print</a></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <?php } else { ?>
                <center><b class="btn btn-danger">No Booking Found</b></center>
                <?php } ?>
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
