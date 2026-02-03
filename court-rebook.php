<?php  error_reporting(0); session_start(); include('config.php'); $cartid = $_SESSION['cartid']; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include 'PHPMailer/src/Exception.php';
include 'PHPMailer/src/PHPMailer.php';
include 'PHPMailer/src/SMTP.php';
?>
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
$seo1 = mysqli_query($con,"SELECT * FROM seo_master WHERE page_name = 'Court Re-Book'");
$seo2 = mysqli_fetch_array($seo1);
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
      <h1 class="text-white">Book A Court</h1>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li>Book A Court</li>
      </ul>
    </div>
  </div>
  <!-- /Breadcrumb -->
  <!-- Page Content -->
  <div class="content">
    <div class="container">
      <section class="card">
        <div class="text-centerx">
          <h3 class="mb-1">Select Date</h3>
          Book your training session at a time and date that suits your needs.
          <?php $id = $_GET['id']; ?>
          <?php $date = $_GET['date']; ?>
          <select name="date" class="form-control" style="width:150px;" required onChange="window.location = this.options[this.selectedIndex].value;">
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
            <option value="court-rebook.php?id=<?php echo $id; ?>&date=<?php echo $curdate; ?>" <?php if($curdate == $_GET['date']) echo 'selected="selected"';?>><?php echo date("d-m-Y", strtotime($curdate)); ?></option>
            <?php } ?>
          </select>
          <?php /*?><div class="asjkdjsdaskj">
            <table border="0" style="margin-top:10px;">
              <tr>
                <td style="padding-right:5px;"><div class="newnwnsasdl" style="display:inline"> <img src="images/circlrr.png">
                    <p>Default</p>
                  </div></td>
                <td style="padding-right:5px;"><div class="newnwnsasdl"  style="display:inline"> <img src="images/circlrr-dot.png">
                    <p>Available</p>
                  </div></td>
                <td><div class="newnwnsasdl"  style="display:inline"> <img src="images/userxs.png">
                    <p>Booked</p>
                  </div></td>
              </tr>
            </table>
          </div><?php */?>
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
				  if($date == $today_date) { $slot_query = "and start_time > '$today_time'"; }
				  $dayNumber = date('N', strtotime($date)); 
				  if ($dayNumber >= 6) {
				  $slot_price = " and weeekend_slot_price != '0'";
				  $slot_status = " and weeekend_slot_status = '1'";
				  }
				  else
				  {
				  $slot_price = " and weeekday_slot_price != '0'";
				  $slot_status = " and weeekday_slot_status = '1'";
				  }
				 
				  $urex=mysqli_query($con,"select * from court_slot where court_id = '$id' $slot_price $slot_status  $slot_query");
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

				  ?>
              <?php if($urowxy_no0 == 0) { ?>
              <div class="col-12 col-sm-4 col-md-3">
                <div class="time-slot active" style="display:block; padding-top:5px; <?php if($urowxy_no00 == $noof_booking) { ?> background-color:#cccccc; <?php } ?> <?php if($urowxy_no2 > 0 && $payment_status2 == '0') { ?> background-color:#009900; <?php } ?>" <?php if($urowxy_no00 == $noof_booking) { } else { ?> <?php if($urowxy_no2 > 0 && $payment_status2 == '0') { } else { ?> onClick="location.href = 'court-rebook-insert.php?id=<?php echo $id; ?>&slot=<?php echo $urowx[0]; ?>&date=<?php echo $date; ?>';" <?php } } ?> <?php if($urowxy_no2 > 0 && $payment_status2 == '0') { ?> onClick="location.href = 'court-rebook-insert.php?id=<?php echo $id; ?>&slot=<?php echo $urowx[0]; ?>&date=<?php echo $date; ?>';" <?php } ?>>
                <span><?php echo $urowx['slot_timing']; ?></span><i class="fa-regular fa-check-circle"></i> <br/>
                <div class="" style="color:#000000">Rs.
                  <?php if ($dayNumber >= 6) { echo $urowx['weeekend_slot_price']; } else { echo $urowx['weeekday_slot_price']; } ?>
                </div>
                <div class="">
                  <?php if($urowxy_no00 == $noof_booking) { ?>
                  <a href="#" style="font-size:14px; cursor:default">Booked</a>
                  <?php } else { ?>
                  <?php if($urowxy_no2 > 0 && $payment_status2 == '0') { } else { ?>
                  <a href="court-rebook-insert.php?id=<?php echo $id; ?>&slot=<?php echo $urowx[0]; ?>&date=<?php echo $date; ?>" style="font-size:14px; color:#000000">Book Now</a>
                  <?php } } ?>
                  <?php if($urowxy_no2 > 0 && $payment_status2 == '0') { ?>
                  <a href="#" style="font-size:14px; color:#FFFFFF; cursor:default">Selected</a>
                  <?php } ?>
                </div>
              </div>
            </div>
            <?php } ?>
            <?php } ?>
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
$ure=mysqli_query($con,"select * from user_court where payment_status = '0' and cartid = '$cartid' and court_date >= '$today_date' group by venue_id order by venue_id asc");
while($urow=mysqli_fetch_array($ure)) { 
$venue_id = $urow['venue_id'];
$master = mysqli_query($con,"SELECT * FROM venue_master WHERE id = '$venue_id'");
$master_detail = mysqli_fetch_array($master); ?>
              <tr>
                <td colspan="3"><strong><?php echo $master_detail['name']; ?></strong></td>
              </tr>
              <?php 
$urec=mysqli_query($con,"select * from user_court where venue_id = '$venue_id' and payment_status = '0' and cartid = '$cartid' and court_date >= '$today_date' group by court_id order by court_id asc");
while($urowc=mysqli_fetch_array($urec)) { 
$court_id = $urowc['court_id'];
$masterc = mysqli_query($con,"SELECT * FROM court_master WHERE id = '$court_id'");
$master_detailc = mysqli_fetch_array($masterc); ?>
              <tr>
                <td colspan="3">&nbsp;&nbsp;<?php echo $master_detailc['name']; ?></td>
              </tr>
              <?php 
$urecd=mysqli_query($con,"select * from user_court where venue_id = '$venue_id' and court_id = '$court_id' and payment_status = '0' and cartid = '$cartid' and court_date >= '$today_date' group by court_date order by court_date asc");
while($urowcd=mysqli_fetch_array($urecd)) { 
$court_date = $urowcd['court_date'];
?>
              <tr>
                <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("d-m-Y", strtotime($urowcd['court_date'])); ?></td>
              </tr>
              <?php 
$urecdc=mysqli_query($con,"select * from user_court where venue_id = '$venue_id' and court_id = '$court_id' and payment_status = '0' and cartid = '$cartid' and court_date = '$court_date' order by ABS(id) asc");
while($urowcdc=mysqli_fetch_array($urecdc)) { ?>
              <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $urowcdc['court_time'];  ?></strong></td>
                <td><strong>Rs. <?php echo $urowcdc['rebook_price']; ?></strong></td>
                <td><a style="padding:0px 5px" href="#" class='btn btn-mini btn-danger' onClick="performDelete('court-rebook.php?id=<?php echo $_GET['id']; ?>&date=<?php echo $_GET['date']; ?>&slot_id=<?php echo $urowcdc[0]; ?>'); return false;">X</a></td>
              </tr>
              <?php } } } } ?>
            </table>
            <script>
function performDelete(DestURL) { 
var ok = confirm("Are you sure you want to delete?"); 
if (ok) {location.href = DestURL;} 
return ok; 
} 
</script>
            <?php  
$slot_id = $_GET['slot_id'];
 
if($slot_id)
{
$dusr="delete from user_court where id = '$slot_id'";
$dre=mysqli_query($con,$dusr);
?>
            <script language="javascript">window.location.href="court-rebook.php?id=<?php echo $_GET['id']; ?>&date=<?php echo $_GET['date']; ?>";</script>
            <?php  }  ?>
          </div>
          <?php 
			  $urexy=mysqli_query($con,"select * from user_court where cartid = '$cartid'");
			  $urowxno=mysqli_num_rows($urexy);
			  $urowx=mysqli_fetch_array($urexy);
			  $rebook_price = $urowx['rebook_price'];
 			 ?>
          <?php if($urowxno > 0) { ?>
          <div class="d-grid btn-block"> <a <?php if($rebook_price == '0') { ?> href="court-rebook.php?confirm=1" <?php } else { ?> href="court-rebook-payment.php" <?php } ?> class="btn btn-primary">Confirm ReBook </a></div>
          <?php } ?>
          
          
          <?php 
$confirm = $_GET['confirm'];
if($confirm != '') 
{   
$uupQry="UPDATE user_court SET submit_status='1',payment_status='1' where submit_status = '0' and user_id = '$user_id' and cartid = '$cartid'";
$uuresult=mysqli_query($con,$uupQry);
		   
$sqll = mysqli_query($con,"SELECT * FROM user_master WHERE id='$user_id'");
$rse = mysqli_fetch_array($sqll);
$name = $rse['name'];
$user_email = $rse['email1'];

$ure=mysqli_query($con,"select * from company_master");
$row=mysqli_fetch_array($ure);
$company_logo = $row['company_logo']; 
$company_email = $row['email']; 
$company_mobile1 = $row['mobile1']; 

$urexy=mysqli_query($con,"select * from user_court where user_id = '$user_id' and cartid = '$cartid' and rebook = '1'");
$urow=mysqli_fetch_array($urexy);
$manager_id = $urow['manager_id']; 

$sqll = mysqli_query($con,"SELECT * FROM user_master WHERE id='$manager_id'");
$rse = mysqli_fetch_array($sqll);
$manager_email = $rse['email1'];
		   
$fullMessage = $fullMessage.'<!DOCTYPE html>
<html>
<body style="padding: 20px; font-family: font-size: 14px; line-height: 1.43; font-family: &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif;">
<div style="max-width: 800px; margin: 0px auto; background-color: #fff; box-shadow: 0px 20px 50px rgba(0,0,0,0.05); border:solid 2px #00ffcc">
  <table style="width: 100%;">
    <tr>
      <td style="background-color: #fff;"><center><img style="width: 30%; padding: 10px" src="'.$siteurl_link.'/images/'.$company_logo.'"></center></td>
    </tr>
  </table>
  <div style="padding: 25px; border-top: 1px solid rgba(0,0,0,0.05);">
    <h1 style="margin-top: 0px;">Dear <span style="text-transform:capitalize">'.$name.'</span></h1>
    <div style="color: #000000; font-size: 14px; margin-bottom: 30px">Re-Book Court Order is Confirmed. Please check detail below.</div>
	<style>
.dz-post-text table tbody tr:nth-of-type(odd),
.dz-page-text table tbody tr:nth-of-type(odd),
.wp-block-table tbody tr:nth-of-type(odd) {
  text-align:left; background-color:#f5f5f5 }
.dz-post-text td,
.dz-post-text th,
.dz-page-text td,
.dz-page-text th,
.wp-block-table td,
.wp-block-table th {
  border: 0.0625rem solid #e4e4e4;
   }
.dz-post-text td p { margin:0px }
td { text-align:left !important; padding:5px 10px; } 
</style> 
<div class="row checkout">
  <div class="col-12 col-sm-12 col-md-12 col-lg-7">
    <div class="card booking-details">
      <h3 class="border-bottom">Order Summary</h3>
      <div class="dz-post-text">
	  <table border="1" style="width:100%; margin-bottom:10px" cellpadding="0" cellspacing="0">';
$venue_id = $urow['venue_id'];
$master = mysqli_query($con,"SELECT * FROM venue_master WHERE id = '$venue_id'");
$master_detail = mysqli_fetch_array($master); 

$fullMessage = $fullMessage.'<tr><td colspan="2">&nbsp;<strong>'.$master_detail['name'].'</strong></td></tr>';

$court_id = $urow['court_id'];
$masterc = mysqli_query($con,"SELECT * FROM court_master WHERE id = '$court_id'");
$master_detailc = mysqli_fetch_array($masterc); 

$fullMessage = $fullMessage.'<tr><td colspan="2">&nbsp;&nbsp;<strong>'.$master_detailc['name'].'</strong></td></tr>';

$court_date = $urow['court_date'];

$fullMessage = $fullMessage.'<tr><td colspan="2">&nbsp;&nbsp;&nbsp;'.date("d-m-Y", strtotime($urow['court_date'])).'</td></tr>';

$fullMessage = $fullMessage.'<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<strong>'.$urow['court_time'].'</strong></td>
<td>&nbsp;&nbsp;<strong>Rs. 0</strong></td>
</tr>';

$fullMessage = $fullMessage.'</table></div></div></div>';

$fullMessage = $fullMessage.'
  <div class="col-12 col-sm-12 col-md-12 col-lg-5">
<div class="dz-post-text">
      <h3 class="border-bottom">Payment Summary</h3>
        <table border="1" style="width:100%; margin-bottom:10px" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;<p>Sub Total<br>
      &nbsp;<h3 style="margin-block-start: 0.5em; margin-block-end: 0.5em;">Rs 0 </h3></p></td>
    <td>&nbsp;<p>Discount ('.$urow['couponcode_entered'].')<br>
      &nbsp;<h3 style="margin-block-start: 0.5em; margin-block-end: 0.5em;">Rs 0</h3></p></td>
    <td>&nbsp;<p>Order Total<br>
      &nbsp;<h3 style="margin-block-start: 0.5em; margin-block-end: 0.5em;">Rs 0 </h3></p></td>
  </tr>
</table>
  </div>
  </div>
</div>
';
	
	
$fullMessage = $fullMessage.'<div style="color: #000000; font-size: 14px; margin-bottom: 30px">Best Regards,<br/>DPlays Team</div>
    <h4 style="margin-bottom: 10px;">Need Help?</h4>
    <div style="color: #A5A5A5; font-size: 12px;">
      <p>If you have any questions, please dont hesitate to reply to this email, or reach out to us at <a href="mailto:'.$company_email.'" style="text-decoration: underline; color: #4B72FA;">'.$company_email.'</a>, or by calling <a href="tel:'.$company_mobile1.'" style="text-decoration: underline; color: #4B72FA;">'.$company_mobile1.'</a>.
</p>
    </div>
  </div>
</div>
</body>
</html>';

$sqllr = mysqli_query($con,"SELECT * FROM api_email WHERE ins_type='Google Email Account'");
$rser = mysqli_fetch_array($sqllr);
$title1 = $rser['title1'];
$title2 = $rser['title2'];

        /*$mail = new PHPMailer(true);

        $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
        $mail->isSMTP(); 
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true; 
        $mail->Username   = $title1; 
        $mail->Password   = $title2;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port       = 587; 

        $mail->setFrom($title1, 'DPlays');
        $mail->addAddress($user_email, 'DPlays'); 
	    $mail->addCC($manager_email); 

        $mail->isHTML(true); 
        $mail->Subject = 'Re Book Order Confirmed - Dplays!'; 
        $mail->Body    = $fullMessage; 

		$mail->SMTPDebug = 0; //after all functions work proper set to 0;
        $mail->send();*/
?>
          <script>alert('Rebook Request Sent Successfully.');</script>
          <script language="javascript">window.location.href="my-court.php";</script>
          <?php 
}
?>
        </aside>
      </div>
    </div>
  </div>
  <!-- /Container -->
</div>
<!-- /Page Content -->
<!-- Footer -->
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
