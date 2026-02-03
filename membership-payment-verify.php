<?php session_start(); error_reporting(0); include('config.php');

$sqllr = mysqli_query($con,"SELECT * FROM api_email WHERE ins_type='Razorpay'");
$rser = mysqli_fetch_array($sqllr);
$keyId = $rser['title1'];
$keySecret = $rser['title2'];
$displayCurrency = 'INR';

require __DIR__ . '/vendor/autoload.php';
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

	$uupQry="UPDATE user_membership SET payment_status='1',razorpay_payment_id='$razorpay_payment_id',razorpay_signature='$razorpay_signature' WHERE order_id='$order_id'";
	$uuresult=mysqli_query($con,$uupQry);
	
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

echo $html;
?>
<script>window.location.href="membership-payment-status.php?order_id=<?php echo $order_id; ?>";</script>