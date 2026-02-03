<?php
include('../config.php');

$sqllr = mysqli_query($con,"SELECT * FROM api_email WHERE ins_type='Razorpay'");
$rser = mysqli_fetch_array($sqllr);
$keyId = $rser['title1'];
$keySecret = $rser['title2'];

$id = $_GET['id'];
$uree=mysqli_query($con,"select * from user_court_refund where id = '$id'");
$uroww=mysqli_fetch_array($uree);
$payment_id = $uroww['razorpay_payment_id'];
$refund_amount = $uroww['refund_amount'];

$refund_amount_final = $refund_amount * 100;

// The payment ID you want to refund
//$payment_id = 'pay_Ra0sNkeharLcIf';

// Refund data
$data = [
    "amount" => $refund_amount_final, // in paise (e.g., ₹50 = 5000)
    "speed" => "normal", // or "optimum"
    "notes" => [
        "reason" => "Customer returned the product"
    ]
];

// Initialize cURL
$ch = curl_init("https://api.razorpay.com/v1/payments/$payment_id/refund");
curl_setopt($ch, CURLOPT_USERPWD, "$keyId:$keySecret");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

// Execute and get response
$response = curl_exec($ch);
$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($response === false) {
    echo "cURL Error: " . curl_error($ch);
} else {
    if ($http_status == 200 || $http_status == 201) {
        echo "Refund Successful:<br>";
        echo "<pre>" . $response . "</pre>";
    } else {
        echo "Refund Failed (HTTP $http_status):<br>";
        echo "<pre>" . $response . "</pre>";
    }
}
curl_close($ch);
?>