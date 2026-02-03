<?php
// Your Razorpay credentials
$keyId = 'rzp_live_R625jYYmaoZE0W';
$keySecret = 'wCmIzbmDq54Zy35TSnMurxOJ';

// The payment ID you want to refund
$payment_id = 'pay_Ra0sNkeharLcIf';

// Refund data
$data = [
    "amount" => 200, // in paise (e.g., ₹50 = 5000)
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