<?php session_start(); error_reporting(0); include('config.php');

$ureurl=mysqli_query($con,"select * from website_url");
$rowurl=mysqli_fetch_array($ureurl);
$siteurl_link = $rowurl['url_link']; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include 'PHPMailer/src/Exception.php';
include 'PHPMailer/src/PHPMailer.php';
include 'PHPMailer/src/SMTP.php';

$sqllr = mysqli_query($con,"SELECT * FROM api_email WHERE ins_type='Razorpay'");
$rser = mysqli_fetch_array($sqllr);
$keyId = $rser['title1'];
$keySecret = $rser['title2'];
$displayCurrency = 'INR';


require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
	 $order_id = $_SESSION['razorpay_order_id'];
	//echo '<br/>';
	 $razorpay_payment_id = $_POST['razorpay_payment_id'];
	//echo '<br/>';
	 $razorpay_signature = $_POST['razorpay_signature'];
	//echo '<br/>';
	
$uupQry="UPDATE user_order SET payment_status='1',razorpay_payment_id='$razorpay_payment_id',razorpay_signature='$razorpay_signature' WHERE order_id='$order_id'";
$uuresult=mysqli_query($con,$uupQry);
	
$uretbo=mysqli_query($con,"select * from user_order where order_id = '$order_id'");
$urowtbo=mysqli_fetch_array($uretbo);
$user_id = $urowtbo['user_id'];
$coach_batch_id = $urowtbo['coach_batch_id'];
$order_mainid = $urowtbo[0];

$urebd=mysqli_query($con,"select * from coach_batch_date where batch_id = '$coach_batch_id' order by batch_date asc");
while($urowbd=mysqli_fetch_array($urebd)) 
{
$batch_date = $urowbd['batch_date'];
$sql=("INSERT INTO `coach_batch_attendance` (`batch_id`, `batch_date`,`user_id`,`order_id`) VALUES ('$coach_batch_id','$batch_date','$user_id','$order_mainid')");	 
$z = mysqli_query($con,$sql);
}
				
$sqllc = mysqli_query($con,"SELECT * FROM coach_batch WHERE id='$coach_batch_id'");
$rsec = mysqli_fetch_array($sqllc);
$coach_id = $rsec['coach_id'];

$sqllcc = mysqli_query($con,"SELECT * FROM user_master WHERE id='$coach_id'");
$rsecc = mysqli_fetch_array($sqllcc);
$coach_email = $rsecc['email1'];

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
      <td style="background-color: #fff;"><center><img style="width: 30%; padding: 10px" src="'.$siteurl_link.'/images/'.$company_logo.'"></center></td>
    </tr>
  </table>
  <div style="padding: 25px; border-top: 1px solid rgba(0,0,0,0.05);">
    <div style="color: #000000; font-size: 14px; margin-bottom: 30px">Order is Confirmed. Please check detail below.</div>
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
$ure=mysqli_query($con,"select * from coach_batch where id = '$coach_batch_id'");
$urowb=mysqli_fetch_array($ure);

$fullMessage = $fullMessage.'<tr><td colspan="2"  style="padding-left:10px;"><strong>'.$urowb['name'].'</strong>
<h6 style="margin-top:5px; margin-bottom:5px;">'.date("d-m-y", strtotime($urowb['start_date'])).' To '.date("d-m-y", strtotime($urowb['end_date'])).'</h6>
<h6 style="margin-top:5px; margin-bottom:5px;">'.date("h:i A", strtotime($urowb['start_time'])).' To '.date("h:i A", strtotime($urowb['end_time'])).'</h6>
<h6 style="margin-top:5px; margin-bottom:5px;">No of Session : '.$urowb['noof_session'].'</h6>
</td></tr>';

$fullMessage = $fullMessage.'</table></div></div></div>';

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
    <td>&nbsp;<p>Discount ('.$urow['couponcode_entered'].')<br>
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
    background: #5745a6; color:#FFFFFF"><a  style="color:#FFFFFF" href="'.$siteurl_link.'/order-coach.php?order_id='.$order_id.'" target="_blank">View Your Order</a></div>
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

$sqllr = mysqli_query($con,"SELECT * FROM api_email WHERE ins_type='Google Email Account'");
$rser = mysqli_fetch_array($sqllr);
$title1 = $rser['title1'];
$title2 = $rser['title2'];

        $mail = new PHPMailer(true);

        $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
        $mail->isSMTP(); 
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true; 
        $mail->Username   = $title1; 
        $mail->Password   = $title2;
	 //password set in path=Account/security/2-step verification/add password 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port       = 587; 

        $mail->setFrom($title1, 'DPlays');
        $mail->addAddress($user_email, 'DPlays'); 
	    $mail->addCC($coach_email); 

        $mail->isHTML(true); 
        $mail->Subject = 'New Coach Order Confirmed - Dplays!'; 
        $mail->Body    = $fullMessage; 

		$mail->SMTPDebug = 0; //after all functions work proper set to 0;
        $mail->send();
		
		unset($_SESSION['cartid']);
		unset($_SESSION['buy_session']);

    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

//echo $html;
?>
<script>window.location.href="order-coach.php?order_id=<?php echo $order_id; ?>";</script>

<?php /*?><h1 style="margin-top: 0px;">Dear <span style="text-transform:capitalize">'.$name.'</span></h1><?php */?>