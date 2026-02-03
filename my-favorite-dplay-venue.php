<?php  error_reporting(0); session_start(); include('config.php'); ?>
<?php $user_id = $_SESSION['user_id']; if($user_id == '') { ?><script>window.location.href="index.php";</script><?php } ?>
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
$seo1 = mysqli_query($con,"SELECT * FROM seo_master WHERE page_name = 'My Favorite Venue'");
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
      <h1 class="text-white">Courts</h1>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li>My Favorite Venue</li>
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
                  <table class="table table-borderless">
                    <thead class="thead-light">
                      <tr>
                        <th>Image </th>
                        <th>Venue Name </th>
                        <th>Date & Time </th>
                        <th>Action </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php		
						$uree=mysqli_query($con,"select * from venue_favorite where user_id = '$user_id'");
						while($uroww=mysqli_fetch_array($uree))
						{ $venue_id = $uroww['venue_id'];
						$urec=("select * from venue_master where id = '$venue_id' and status = '1'");
						$urecc = mysqli_query($con,$urec);
						$memno=mysqli_num_rows($urecc);
						if($memno > 0) { ?>
                      <tr class="showtr">
                        <td><?php $venue_id = $uroww['venue_id'];
						$urowc=mysqli_fetch_array($urecc); ?> 
                        <img src="images/<?php echo $urowc['logo_img']; ?>" style="width:70px"></td>
                        <td><a href="<?php echo $siteurl_link; ?>/<?php echo $urowc['seo_url']; ?>"><?php echo $urowc['name']; ?></a></td>
                        <td><?php echo date("d-m-Y h:i A", strtotime($uroww['ins_datetime'])); ?> </td>
                        <td><a href="#" onClick="performDelete('my-favorite-dplay-venue.php?id=<?php echo $uroww[0]; ?>'); return false;" class="btn btn-primary btn-mini"><i class="feather-eye me-2"></i>Remove</a>
                        </td>
                      </tr>
                      <?php } } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

<script>
function performDelete(DestURL) { 
var ok = confirm("Are you sure you want to delete?"); 
if (ok) {location.href = DestURL;} 
return ok; 
} 
</script>

<?php  
$id = $_GET['id'];
if($id)
{
$dusr="delete from venue_favorite where id = '$id'";
$dre=mysqli_query($con,$dusr);
?>
<script language="javascript">window.location.href="my-favorite-dplay-venue.php";</script>
<?php } ?>
            
            
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
