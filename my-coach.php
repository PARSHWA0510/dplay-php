<?php  error_reporting(0); session_start(); include('config.php'); ?>
<?php $user_id = $_SESSION['user_id']; if($user_id == '') { ?>
<script>window.location.href="index.php";</script>
<?php } ?>
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
$seo1 = mysqli_query($con,"SELECT * FROM seo_master WHERE page_name = 'My Coach'");
$seo2 = mysqli_fetch_array($seo1);
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
      <h1 class="text-white">Coach Booked</h1>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li>Coach Booked</li>
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
      <style>
.btn-mini { font-size:12px !important; padding:5px !important; } 
</style>
      <div class="row">
        <div class="col-sm-12">
          <div class="court-tab-content">
            <div class="card card-tableset">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-borderless">
                    <thead class="thead-light">
                      <tr>
                        <th style="display:none"> </th>
                        <th>Order Detail </th>
                        <th>Coach </th>
                        <th>Batch </th>
                        <th>Date </th>
                        <th>Time </th>
                        <th>Days </th>
                        <th>Price </th>
                        <th>Attendance</th>
                        <th>Print </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php								 
						$uree=mysqli_query($con,"select * from user_order where payment_status = '1' and user_id = '$user_id' and order_type = 'coachbook'");
						while($uroww=mysqli_fetch_array($uree))
						{ ?>
                      <tr class="showtr">
                        <td style="display:none"><?php echo $uroww['order_datetime']; ?> </td>
                        <td><?php echo $uroww['order_no']; ?><br/><?php echo $invoice_date = date("d-m-Y", strtotime($uroww['order_datetime'])); ?> </td>
                        <td><?php $coach_batch_id = $uroww['coach_batch_id'];
						  $urez=mysqli_query($con,"select * from coach_batch where id = '$coach_batch_id'");
						  $urowz=mysqli_fetch_array($urez); $coach_name = $urowz['name'];  $coach_id = $urowz['coach_id']; ?>
                        <?php 
						  $urez=mysqli_query($con,"select * from user_master where id = '$coach_id'");
						  $urowz=mysqli_fetch_array($urez); echo $urowz['name']; ?>
                      </td>
                      <td><?php echo $coach_name; ?></td>
                        <td><?php echo date("d-m-Y", strtotime($urowz['start_date'])); ?> <br/> <?php echo date("d-m-Y", strtotime($urowz['end_date'])); ?> </td>
                        <td><?php echo date("h:i A", strtotime($urowz['start_time'])); ?> <br/> <?php echo date("h:i A", strtotime($urowz['end_time'])); ?> </td>
                        <td><?php 
						$urebd=mysqli_query($con,"select * from coach_batch_date where batch_id = '$coach_batch_id' group by batch_day order by batch_date asc");
						while($urowbd=mysqli_fetch_array($urebd)) { ?>
                        <span class="btn btn-mini btn-primary" style="padding:2px; font-size:11px"><?php echo $urowbd['batch_day']; ?></span>&nbsp;
                        <?php } ?></td>
                        <td><?php echo $uroww['final_amount'];   ?></td>
                        <td><a href="my-coach-attendance.php?bid=<?php echo $uroww['coach_batch_id']; ?>" class="btn btn-danger btn-mini"><i class="feather-edit me-2"></i>Attendance</a></td>
                        <td><a href="order-coach.php?order_id=<?php echo $uroww['order_id']; ?>" class="btn btn-danger btn-mini"><i class="feather-printer me-2"></i>Print</a></td>
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
