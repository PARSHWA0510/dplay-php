<?php  error_reporting(0); session_start(); include('config.php'); ?>
<?php $user_id = $_SESSION['user_id']; if($user_id == '') { ?>
<script>window.location.href="index.php";</script>
<?php } ?>
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
$seo1 = mysqli_query( $con, "SELECT * FROM seo_master WHERE page_name = 'My Court'" );
$seo2 = mysqli_fetch_array( $seo1 );
?>
<title><?php echo $seo2['seo_title']; ?></title>
<meta name="keywords" content="<?php echo $seo2['seo_keyword']; ?>">
<meta name="description" content="<?php echo $seo2['seo_description']; ?>">
<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
<link rel="apple-touch-icon" sizes="120x120" href="assets/img/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="152x152" href="assets/img/apple-touch-icon-152x152.png">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<!-- Fontawesome CSS -->
<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
<!-- Datatables CSS -->
<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
<!-- Select CSS -->
<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
<!-- Feathericon CSS -->
<link rel="stylesheet" href="assets/css/feather.css">
<!-- Main CSS -->
<link rel="stylesheet" href="assets/css/style.css">
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
      <h1 class="text-white">Courts</h1>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li>My Court</li>
      </ul>
    </div>
  </section>
  <!-- /Breadcrumb --> 
  <!-- Dashboard Menu -->
  <div class="dashboard-section coach-dash-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="dashboard-menu coaurt-menu-dash">
            <?php include 'user_menu.php'; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Dashboard Menu --> 
  <!-- Page Content -->
  <div class="content court-bg">
    <div class="container"> 
      <!-- Sort By --> 
      <!-- Sort By -->
      <div class="row">
        <div class="col-sm-12">
          <div class="court-tab-content">
            <div class="card card-tableset">
              <div class="card-body">
                <div class="table-responsive">
                  <center>
                    <h4>Upcoming Court</h4>
                  </center>
                  <table class="table table-borderless">
                    <style>
.btn-mini { font-size:12px !important; padding:5px !important; } 
</style>
                    <thead class="thead-light">
                      <tr>
                        <th style="display:none"> </th>
                        <th>Order No </th>
                        <th>Order Date </th>
                        <th>Court Date </th>
                        <th>Court Time </th>
                        <th>Court Price </th>
                        <th>Re-Book </th>
                        <th>Print </th>
                        <th>Refund </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $daylen = 60 * 60 * 24;
                      $cur_date = date( 'Y-m-d' );
                      $datetime1 = new DateTime();

                      $ureee = ( "select * from user_court where payment_status = '1' and user_id = '$user_id' and rebook = '0' and court_date >= '$cur_date' order by order_datetime asc" );
                      $uree = mysqli_query( $con, $ureee );
                      while ( $uroww = mysqli_fetch_array( $uree ) ) {
                        $court_date = $uroww[ 'court_date' ];
                        $court_id = $uroww[ 'court_id' ];
                        $slot_id = $uroww[ 'slot_id' ];
                        $order_no = $uroww[ 'order_no' ];
                        $rebook_accepted = $uroww[ 'rebook_accepted' ];
                        $old_bookid = $uroww[ 0 ];

                        $ureex = mysqli_query( $con, "select * from user_court where old_bookid = '$old_bookid' and submit_status = '1'" );
                        $urowwx_no = mysqli_num_rows( $ureex );
						
						$ureexr = mysqli_query( $con, "select * from user_court_refund where order_no = '$order_no'" );
                        $urowwx_nor = mysqli_num_rows( $ureexr ); 
                        ?>
                      <tr class="showtr">
                        <td style="display:none"><?php echo $uroww['order_datetime']; ?></td>
                        <td><?php echo $uroww['order_no']; ?></td>
                        <td><?php echo $invoice_date = date("d-m-Y", strtotime($uroww['order_datetime'])); ?></td>
                        <td><?php echo date("d-m-Y", strtotime($uroww['court_date'])); ?></td>
                        <td><?php echo $court_time = $uroww['court_time']; ?></td>
                        <td><?php echo $uroww['court_price']; ?></td>
                        <td>
						<?php
						if($rebook_accepted == '0000-00-00 00:00:00') { $court_time_first = substr($court_time, 0, 5); 
						$datetime2 = new DateTime("".$court_date." ".$court_time_first.":00");

						// Calculate difference
						$interval = $datetime1->diff($datetime2);
						
						// Total hours (including days converted to hours)
						$totalHours = ($interval->days * 24) + $interval->h + ($interval->i / 60);
						?>
						<?php if($totalHours > 48) { ?>
                        <?php if($urowwx_no > 0) { ?>
                          <a style="cursor:default" class="btn btn-danger btn-mini"><i class="feather-eye me-2"></i>Re-Book Sent</a>
                          <?php } else { ?>
                          <?php $days = (strtotime($today_date)-strtotime($court_date))/$daylen;  if($days < 0) { ?>
                          <a href="court-rebook-insert.php?old_bookid=<?php echo $uroww[0]; ?>&id=<?php echo $court_id; ?>&slot=<?php echo $slot_id; ?>&date=<?php echo $court_date; ?>" class="btn btn-primary btn-mini"><i class="feather-eye me-2"></i>Re-Book</a>
                          <?php } ?>
                          <?php } ?>
                        <?php } } else { ?> <a class="btn btn-danger btn-mini"><i class="feather-eye me-2"></i>Re-Book Done</a> <?php } ?>
						</td>
                        <td><a href="order.php?order_id=<?php echo $uroww['order_id']; ?>" class="btn btn-success btn-mini" target="_blank"><i class="feather-printer me-2"></i>Print</a></td>
                        <td><?php
						if($urowwx_nor > 0)
						{ ?>
						<span class="btn btn-danger btn-mini"><i class="feather-printer me-2"></i>Refund Raised</a>
						<?php } else { 	
                        $court_time_first = substr( $court_time, 0, 5 );
                        $datetime2 = new DateTime( "" . $court_date . " " . $court_time_first . ":00" );

                        // Calculate difference
                        $interval = $datetime1->diff( $datetime2 );

                        // Total hours (including days converted to hours)
                        $totalHours = ( $interval->days * 24 ) + $interval->h + ( $interval->i / 60 );
                        ?>
                          <?php if($totalHours > 24) { ?>
                          <a href="court-refund.php?id=<?php echo $uroww[0]; ?>" class="btn btn-danger btn-mini"><i class="feather-printer me-2"></i>Refund</a>
                          <?php } ?>
						  <?php } ?>
						  </td>
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
      <br>
      <div class="row">
        <div class="col-sm-12">
          <div class="court-tab-content">
            <div class="card card-tableset">
              <div class="card-body">
                <div class="table-responsive">
                  <center>
                    <h4>Completed Court</h4>
                  </center>
                  <table class="table table-borderless">
                    <style>
.btn-mini { font-size:12px !important; padding:5px !important; } 
</style>
                    <thead class="thead-light">
                      <tr>
                        <th style="display:none"> </th>
                        <th>Order No </th>
                        <th>Order Date </th>
                        <th>Court Date </th>
                        <th>Court Time </th>
                        <th>Court Price </th>
                        <?php /*?><th>Re-Book </th><?php */?>
                        <th>Print </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $daylen = 60 * 60 * 24;

                      $uree = mysqli_query( $con, "select * from user_court where payment_status = '1' and user_id = '$user_id' and rebook = '0' and court_date < '$cur_date'  order by order_datetime desc" );
                      while ( $uroww = mysqli_fetch_array( $uree ) ) {
                        $court_date = $uroww[ 'court_date' ];
                        $court_id = $uroww[ 'court_id' ];
                        $slot_id = $uroww[ 'slot_id' ];
                        $old_bookid = $uroww[ 0 ];

                        $ureex = mysqli_query( $con, "select * from user_court where old_bookid = '$old_bookid'" );
                        $urowwx_no = mysqli_num_rows( $ureex );
                        ?>
                      <tr class="showtr">
                        <td style="display:none"><?php echo $uroww['order_datetime']; ?></td>
                        <td><?php echo $uroww['order_no']; ?></td>
                        <td><?php echo $invoice_date = date("d-m-Y", strtotime($uroww['order_datetime'])); ?></td>
                        <td><?php echo date("d-m-Y", strtotime($uroww['court_date'])); ?></td>
                        <td><?php echo $uroww['court_time']; ?></td>
                        <td><?php echo $uroww['court_price']; ?></td>
                        <?php /*?><td><?php if($urowwx_no > 0) { ?> <
                        a style = "cursor:default"
                        class = "btn btn-danger btn-mini" > < i class = "feather-eye me-2" > < /i>Re-Book Sent</a >
                          <?php } else { ?>
                        <?php $days = (strtotime($today_date)-strtotime($court_date))/$daylen;  if($days < 0) { ?> <
                        a href = "court-rebook-insert.php?old_bookid=<?php echo $uroww[0]; ?>&id=<?php echo $court_id; ?>&slot=<?php echo $slot_id; ?>&date=<?php echo $court_date; ?>"
                        class = "btn btn-primary btn-mini" > < i class = "feather-eye me-2" > < /i>Re-Book</a >
                          <?php } ?>
                        <?php } ?>
</td>
                        <?php */?>
                        <td><a href="order.php?order_id=<?php echo $uroww['order_id']; ?>" class="btn btn-success btn-mini" target="_blank"><i class="feather-printer me-2"></i>Print</a></td>
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
  <!-- /Page Content --> 
  <!-- Footer -->
  <?php include 'footer.php' ?>
  <!-- /Footer --> 
</div>
<!-- /Main Wrapper --> 
<!-- jQuery --> 
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> 
<script src="assets/js/jquery-3.7.1.min.js" type="f0084786be1f092c3a4f8f0f-text/javascript"></script> 
<!-- Bootstrap Core JS --> 
<script src="assets/js/bootstrap.bundle.min.js" type="f0084786be1f092c3a4f8f0f-text/javascript"></script> 
<script src="assets/plugins/datatables/jquery.dataTables.min.js" type="f0084786be1f092c3a4f8f0f-text/javascript"></script> 
<script src="assets/plugins/datatables/datatables.min.js" type="f0084786be1f092c3a4f8f0f-text/javascript"></script> 
<!-- Select JS --> 
<script src="assets/plugins/select2/js/select2.min.js" type="f0084786be1f092c3a4f8f0f-text/javascript"></script> 
<!-- Custom JS --> 
<script src="assets/js/script.js" type="f0084786be1f092c3a4f8f0f-text/javascript"></script> 
<script src="/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="f0084786be1f092c3a4f8f0f-|49" defer></script> 
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"949afbf45968a821","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2025.5.0","token":"3ca157e612a14eccbb30cf6db6691c29"}' crossorigin="anonymous"></script>
</body>
</html>
