<?php error_reporting(0); session_start(); include('config.php'); $buy_session = $_SESSION['buy_session']; $membership_id_session = $_SESSION['membership_id_session'];
 ?>
<?php  date_default_timezone_set("Asia/Kolkata");  $todaydatetime = date('Y-m-d H:i:s'); $user_id = $_SESSION['user_id']; ?>
<?php 


$id = $_GET['id'];

$ure=mysqli_query($con,"select * from user_order where id = '$id'");
$urow=mysqli_fetch_array($ure); 
$razorpay_payment_id = $urow['razorpay_payment_id'];
$final_amount = $urow['final_amount'];



$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.razorpay.com/v1/payments/'.$razorpay_payment_id.'/refund',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "amount": '.$final_amount.'
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Basic Og=='
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

?>
<?php /*?><script language="javascript">window.location.href="court-book.php?id=<?php echo $id; ?>&date=<?php echo $court_date; ?>";</script><?php */?>
