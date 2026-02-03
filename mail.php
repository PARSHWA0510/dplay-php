<?php include('config.php'); $order_id = 'order_RMVLy2vnr3i9f3';
$uretbo=mysqli_query($con,"select * from user_order where order_id = '$order_id'");
$urowtbo=mysqli_fetch_array($uretbo);
$user_id = $urowtbo['user_id'];
$event_id = $urowtbo['event_id'];
$event_book_id = $urowtbo['event_book_id'];
$order_mainid = $urowtbo[0];

$sqll = mysqli_query($con,"SELECT * FROM user_master WHERE id='$user_id'");
$rse = mysqli_fetch_array($sqll);
$name = $rse['name'];
$user_email = $rse['email1'];
	
$ure=mysqli_query($con,"select * from company_master");
$row=mysqli_fetch_array($ure);
$company_logo = $row['company_logo']; 
$company_email = $row['email']; 
$company_mobile1 = $row['mobile1']; 
$fullMessage = $fullMessage.'<!DOCTYPE html>
<html>
<body style="padding: 20px; font-family: font-size: 14px; line-height: 1.43; font-family: &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif;">
<div style="max-width: 800px; margin: 0px auto; background-color: #fff; box-shadow: 0px 20px 50px rgba(0,0,0,0.05); border:solid 2px #00ffcc">
  <table style="width: 100%;">
    <tr>
      <td style="background-color: #fff;"><center><img style="width: 30%; padding:10px" src="<?php echo $siteurl_link; ?>/images/'.$company_logo.'"></center></td>
    </tr>
  </table>
  <div style="padding: 25px; border-top: 1px solid rgba(0,0,0,0.05);">
    <h1 style="margin-top: 0px;">Dear <span style="text-transform:capitalize">'.$name.'</span></h1>
    <div style="color: #000000; font-size: 14px; margin-bottom: 30px">Your Order is Confirmed. Please check detail below.</div>
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
      <div class="dz-post-text">';

$ureb=mysqli_query($con,"select * from event_master where id = '$event_id'");
$master_detail=mysqli_fetch_array($ureb); 
				
$fullMessage = $fullMessage.'<table border="1" style="width:100%; margin-bottom:10px" cellpadding="0" cellspacing="0">
<tr><td style="padding-left:10px; width:20%"><p><b style="font-size:14px">Event Name <b></p></td><td><p><span style="font-size:14px">'.$master_detail['name'].'</span></p></td></tr>
<tr><td style="padding-left:10px;"><p><b style="font-size:14px">Description <b></p></td><td><p><span style="font-size:14px">'.$master_detail['small_des'].'</span></p></td></tr>
<tr><td style="padding-left:10px;"><p><b style="font-size:14px">Event Dates <b></p></td><td><p><span style="font-size:14px">'.date("d-m-Y", strtotime($master_detail['start_datetime'])).' To '.date("d-m-Y", strtotime($master_detail['end_datetime'])).'</span></p></td></tr>
<tr><td style="padding-left:10px;"><p><b style="font-size:14px">Sport Type <b></p></td><td><p><span style="font-size:14px">'.$master_detail['sport_type'].'</span></p></td></tr>
<tr><td style="padding-left:10px;"><p><b style="font-size:14px">Location <b></p></td><td><p><span style="font-size:14px">'.$master_detail['address'].' '.$master_detail['city'].' '.$master_detail['state'].'</span></p></td></tr>
</table>';

$urebe=mysqli_query($con,"select * from event_data where id = '$event_book_id'");
$master_detaile=mysqli_fetch_array($urebe); 

$fullMessage = $fullMessage.'<table border="1" style="width:100%; margin-bottom:10px" cellpadding="0" cellspacing="0">
<tr><td style="padding-left:10px; width:20%"><p><b style="font-size:14px">Name <b></p></td><td><p><span style="font-size:14px">'.$master_detaile['data_title'].'</span></p></td></tr>
<tr><td style="padding-left:10px;"><p><b style="font-size:14px">Description <b></p></td><td><p><span style="font-size:14px">'.$master_detaile['data_description'].'</span></p></td></tr>
<tr><td style="padding-left:10px;"><p><b style="font-size:14px">Max Player <b></p></td><td><p><span style="font-size:14px">'.$master_detaile['data_max_player'].'</span></p></td></tr>
</table>';

$fullMessage = $fullMessage.'</div></div></div>';

$ure=mysqli_query($con,"select * from user_order where order_id = '$order_id'");
$urow=mysqli_fetch_array($ure);

$fullMessage = $fullMessage.'
  <div class="col-12 col-sm-12 col-md-12 col-lg-5">
<div class="dz-post-text">
      <h3 class="border-bottom">Payment Summary</h3>
        <table border="1" style="width:100%; margin-bottom:10px" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;<p>Sub Total<br>
      &nbsp;<h3 style="margin-block-start: 0.5em; margin-block-end: 0.5em;">Rs '.$urow['total_amount'].' </h3></p></td>
    <td>&nbsp;<p>Discount<br>
      &nbsp;<h3 style="margin-block-start: 0.5em; margin-block-end: 0.5em;">Rs '.$urow['couponcode_price'].'</h3></p></td>
    <td>&nbsp;<p>Order Total<br>
      &nbsp;<h3 style="margin-block-start: 0.5em; margin-block-end: 0.5em;">Rs '.$urow['final_amount'].' </h3></p></td>
  </tr>
</table>
  </div>
  </div>
</div>
';
	
	
echo $fullMessage = $fullMessage.'<div style="background-color: #f6f4ff; margin: 20px 0px 20px;">
      <div style="padding: 20px;
    text-transform: uppercase;
    font-size: 16px;
    font-weight: bold;
    letter-spacing: 0px;
    text-align: center;
    background: #5745a6; color:#FFFFFF"><a  style="color:#FFFFFF" href="<?php echo $siteurl_link; ?>/order-coach.php?order_id='.$order_id.'" target="_blank">View Your Order</a></div>
    </div>
	 <div style="color: #000000; font-size: 14px; margin-bottom: 30px">Best Regards,<br/>
DPlays Team
</div>
    <h4 style="margin-bottom: 10px;">Need Help?</h4>
    <div style="color: #A5A5A5; font-size: 12px;">
      <p>If you have any questions, please dont hesitate to reply to this email, or reach out to us at <a href="mailto:'.$company_email.'" style="text-decoration: underline; color: #4B72FA;">'.$company_email.'</a>, or by calling <a href="tel:'.$company_mobile1.'" style="text-decoration: underline; color: #4B72FA;">'.$company_mobile1.'</a>.
</p>
    </div>
  </div>
</div>
</body>
</html>';


/*$ure=mysqli_query($con,"select * from company_master");
$row=mysqli_fetch_array($ure);
$company_logo = $row['company_logo']; 
$company_email = $row['email']; 
$company_mobile1 = $row['mobile1']; 
$fullMessage = $fullMessage.'<!DOCTYPE html>
<html>
<body style="padding: 20px; font-family: font-size: 14px; line-height: 1.43; font-family: &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif;">
<div style="max-width: 800px; margin: 0px auto; background-color: #fff; box-shadow: 0px 20px 50px rgba(0,0,0,0.05); border:solid 2px #00ffcc">
  <table style="width: 100%;">
    <tr>
      <td style="background-color: #fff;"><center><img style="width: 30%; padding: 10px" src="<?php echo $siteurl_link; ?>/images/'.$company_logo.'"></center></td>
    </tr>
  </table>
  <div style="padding: 25px; border-top: 1px solid rgba(0,0,0,0.05);">
    <h1 style="margin-top: 0px;">Dear <span style="text-transform:capitalize">'.$name.'</span></h1>
    <div style="color: #000000; font-size: 14px; margin-bottom: 30px">Please Find Your Password detail below.</div>
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
</style>';


echo $fullMessage = $fullMessage.'<div style="background-color: #f6f4ff; margin: 20px 0px 20px;">
      <div style="padding: 20px;
    text-transform: uppercase;
    color: #ffffff;
    font-size: 16px;
    font-weight: bold;
    letter-spacing: 0px;
    text-align: center;
    background: #5745a6;">View Your Order</div>
    </div>
	 <div style="color: #000000; font-size: 14px; margin-bottom: 30px">Best Regards,<br/>
DPlays Team
</div>
    <h4 style="margin-bottom: 10px;">Need Help?</h4>
    <div style="color: #A5A5A5; font-size: 12px;">
      <p>If you have any questions, please dont hesitate to reply to this email, or reach out to us at <a href="mailto:'.$company_email.'" style="text-decoration: underline; color: #4B72FA;">'.$company_email.'</a>, or by calling <a href="tel:'.$company_mobile1.'" style="text-decoration: underline; color: #4B72FA;">'.$company_mobile1.'</a>.
</p>
    </div>
  </div>
</div>
</body>
</html>';*/

    /*try {
        $mail = new PHPMailer(true);

        $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
        $mail->isSMTP(); 
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true; 
        $mail->Username   = 'ritesh.it1@gmail.com'; 
        $mail->Password   = 'rbnk qacn ndqr chej';
	 //password set in path=Account/security/2-step verification/add password 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port       = 587; 

        $mail->setFrom('ritesh.it1@gmail.com', 'DPlays');
        $mail->addAddress($user_email, 'DPlays'); 

        $mail->isHTML(true); 
        $mail->Subject = 'Order Confirmed For Dplays!'; 
        $mail->Body    = $fullMessage; 

        $mail->send();
        echo 'Message has been sent successfully';
    	} catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    	}*/
?>
		
<?php /*?><?php include('config.php');
$ure=mysqli_query($con,"select * from company_master");
$row=mysqli_fetch_array($ure);
$company_logo = $row['company_logo']; 
$company_email = $row['email']; 
$company_mobile1 = $row['mobile1']; 
$fullMessage = $fullMessage.'<!DOCTYPE html>
<html>
<body style="padding: 20px; font-family: font-size: 14px; line-height: 1.43; font-family: &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif;">
<div style="max-width: 800px; margin: 0px auto; background-color: #fff; box-shadow: 0px 20px 50px rgba(0,0,0,0.05); border:solid 2px #00ffcc">
  <table style="width: 100%;">
    <tr>
      <td style="background-color: #fff;"><center><img style="width: 30%; padding: 10px" src="<?php echo $siteurl_link; ?>/images/'.$company_logo.'"></center></td>
    </tr>
  </table>
  <div style="padding: 25px; border-top: 1px solid rgba(0,0,0,0.05);">
    <h1 style="margin-top: 0px;">Dear <span style="text-transform:capitalize">'.$name.'</span></h1>
    <div style="color: #000000; font-size: 14px; margin-bottom: 30px">Your Order is Confirmed. Please check detail below.</div>
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

$order_id = $_GET['order_id'];
$ure=mysqli_query($con,"select * from user_court where order_id = '$order_id' group by venue_id order by venue_id asc");
while($urow=mysqli_fetch_array($ure)) { 
$venue_id = $urow['venue_id'];
$master = mysqli_query($con,"SELECT * FROM venue_master WHERE id = '$venue_id'");
$master_detail = mysqli_fetch_array($master); 

$fullMessage = $fullMessage.'<tr><td colspan="2"><strong>'.$master_detail['name'].'</strong></td></tr>';

$urec=mysqli_query($con,"select * from user_court where venue_id = '$venue_id' and order_id = '$order_id' group by court_id order by court_id asc");
while($urowc=mysqli_fetch_array($urec)) { 
$court_id = $urowc['court_id'];
$masterc = mysqli_query($con,"SELECT * FROM court_master WHERE id = '$court_id'");
$master_detailc = mysqli_fetch_array($masterc); 

$fullMessage = $fullMessage.'<tr><td colspan="2"><strong>'.$master_detailc['name'].'</strong></td></tr>';

$urecd=mysqli_query($con,"select * from user_court where venue_id = '$venue_id' and court_id = '$court_id' and order_id = '$order_id' group by court_date order by court_date asc");
while($urowcd=mysqli_fetch_array($urecd)) { 
$court_date = $urowcd['court_date'];

$fullMessage = $fullMessage.'<tr><td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;'.date("d-m-Y", strtotime($urowcd['court_date'])).'</td></tr>';

$urecdc=mysqli_query($con,"select * from user_court where venue_id = '$venue_id' and court_id = '$court_id' and order_id = '$order_id' order by ABS(id) asc");
while($urowcdc=mysqli_fetch_array($urecdc)) { 

$fullMessage = $fullMessage.'<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>'.$urowcdc['court_time'].'</strong></td>
<td><strong>Rs. '.$urowcdc['court_price'].'</strong></td>
</tr>';

} } } }

$fullMessage = $fullMessage.'</table></div></div></div>';

$ure=mysqli_query($con,"select * from user_order where order_id = '$order_id'");
$urow=mysqli_fetch_array($ure);

$fullMessage = $fullMessage.'
  <div class="col-12 col-sm-12 col-md-12 col-lg-5">
<div class="dz-post-text">
      <h3 class="border-bottom">Payment Summary</h3>
        <table border="1" style="width:100%; margin-bottom:10px" cellpadding="0" cellspacing="0">
  <tr>
    <td><p>Sub Total<br>
      <h3 style="margin-block-start: 0.5em; margin-block-end: 0.5em;">Rs '.$urow['total_amount'].' </h3></p></td>
    <td><p>Discount ('.$urow['couponcode_entered'].')<br>
      <h3 style="margin-block-start: 0.5em; margin-block-end: 0.5em;">Rs '.$urow['couponcode_price'].'</h3></p></td>
    <td><p>Order Total<br>
      <h3 style="margin-block-start: 0.5em; margin-block-end: 0.5em;">Rs '.$urow['final_amount'].' </h3></p></td>
  </tr>
</table>
  </div>
  </div>
</div>
';
	
	
echo $fullMessage = $fullMessage.'<div style="background-color: #f6f4ff; margin: 20px 0px 20px;">
      <div style="padding: 20px;
    text-transform: uppercase;
    color: #ffffff;
    font-size: 16px;
    font-weight: bold;
    letter-spacing: 0px;
    text-align: center;
    background: #5745a6;">View Your Order</div>
    </div>
	 <div style="color: #000000; font-size: 14px; margin-bottom: 30px">Best Regards,<br/>
DPlays Team
</div>
    <h4 style="margin-bottom: 10px;">Need Help?</h4>
    <div style="color: #A5A5A5; font-size: 12px;">
      <p>If you have any questions, please dont hesitate to reply to this email, or reach out to us at <a href="mailto:'.$company_email.'" style="text-decoration: underline; color: #4B72FA;">'.$company_email.'</a>, or by calling <a href="tel:'.$company_mobile1.'" style="text-decoration: underline; color: #4B72FA;">'.$company_mobile1.'</a>.
</p>
    </div>
  </div>
</div>
</body>
</html>';	


	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    include 'PHPMailer/src/Exception.php';
    include 'PHPMailer/src/PHPMailer.php';
    include 'PHPMailer/src/SMTP.php';

    try {
        $mail = new PHPMailer(true);

        $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
        $mail->isSMTP(); 
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true; 
        $mail->Username   = 'ritesh.it1@gmail.com'; 
        $mail->Password   = 'rbnk qacn ndqr chej';
	 //password set in path=Account/security/2-step verification/add password 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port       = 587; 

        $mail->setFrom('ritesh.it1@gmail.com', 'xyz');
        $mail->addAddress('ritesh.it1@gmail.com', 'abc'); 

        $mail->isHTML(true); 
        $mail->Subject = 'Order Confirmed For Dplays!'; 
        $mail->Body    = $fullMessage; 

        $mail->send();
        echo 'Message has been sent successfully';
    	} catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    	}
?><?php */?>
