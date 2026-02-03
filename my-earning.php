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
      <h1 class="text-white">My Earning</h1>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li>My Earning</li>
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
                        <th>Total Earning </th>
                        <th>Total Paid </th>
                        <th>Pending Receive </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php	
					  	$urez=mysqli_query($con,"select * from user_master where id = '$user_id'");
						$urowz=mysqli_fetch_array($urez);
						$coach_model = $urowz['coach_model'];
						$commission = $urowz['commission'];
					    
						$couns=("select * from coach_batch where coach_id = '$user_id'");
						$coun = mysqli_query($con,$couns);
						$Fcoun_no=mysqli_num_rows($coun);
						if($Fcoun_no > 0) { 
						while($Fcoun=mysqli_fetch_array($coun)) 
						{ 
						$batch_id[] = $Fcoun['id'];
						}				
						$batch_all = "'" . implode("','", $batch_id) . "'";
						$query = "and coach_batch_id IN ($batch_all)"; 
						}							 
						$uree=mysqli_query($con,"select SUM(final_amount) from user_order where payment_status = '1' and order_type = 'coachbook' $query");
						$uroww=mysqli_fetch_array($uree);
						 ?>
                      <tr class="showtr">
                        <td><?php $final_amount = $uroww['SUM(final_amount)']; ?>
                          <?php 
						if($coach_model == 'subscription') {
						$urezz=("select * from coach_subscription_range where coach_id = '$user_id' and from_amt <= '$final_amount' and to_amt >= '$final_amount'");
						$urez = mysqli_query($con,$urezz);
						$urowz=mysqli_fetch_array($urez); $commission_per = $urowz['commission_per']; ?>
                          <?php $c1 = $final_amount * $commission_per; $c2 = $c1 / 100; $c3 = ceil($c2); $net_pay = $final_amount - $c3; ?>
                          <?php } ?>
                          <?php 
						if($coach_model == 'commission') { ?>
                          <?php $c1 = $final_amount * $commission; //echo '<br>'; 
						 $c2 = $c1 / 100; //echo '<br>'; 
						 $c3 = ceil($c2); //echo '<br>'; 
						echo $net_pay = $final_amount - $c3; ?>
                          <?php } ?>
                        </td>
                        <td><?php 
							$urezz=("select SUM(amount) from payment_master where coach_id = '$user_id'");
							$urez = mysqli_query($con,$urezz);
						  	$urowz=mysqli_fetch_array($urez); 
							echo $paid = $urowz['SUM(amount)']; ?>
                        </td>
                        <td><?php echo $net_pay - $paid; ?></td>
                      </tr>
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
