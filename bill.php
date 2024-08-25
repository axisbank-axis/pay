<?php

// Card details
$cardNumber = $_POST['card-number'];
$expMonth = $_POST['expiration-month'];
$expYear = $_POST['expiration-year'];
$cvn = $_POST['cvv'];
$cardHolderName = $_POST['card-holder'];
$amount = $_POST['total'];

// Configuration details
$merchant_id = '2492619';  // Replace with your actual Merchant ID
$accountId = "8042636558api";  // Replace with your actual Account ID
$shared_secret = '9OAPK4KOBH3KOZHW973981GJUIGK4OOZWMDWFLOAOGYAES1RM2MI2WF37QAPS9O8';
$serviceUrl = 'https://api.convergepay.com/VirtualMerchant/processxml.do';

// Transaction details
$currency = 'USD';
$orderId = uniqid();
$requestType = 'ccsale';  // Example request type for credit card authorization

// Prepare the XML payload
$xml = <<<XML
<Request>
    <merchant_id>{$merchant_id}</merchant_id>  
    <account_id>{$accountId}</account_id>  
    <request_type>{$requestType}</request_type>
    <amount>{$amount}</amount>
    <currency>{$currency}</currency>
    <order_id>{$orderId}</order_id>
    <card>
        <number>{$cardNumber}</number>
        <exp_month>{$expMonth}</exp_month>
        <exp_year>{$expYear}</exp_year>
        <cvn>{$cvn}</cvn>
        <card_holder_name>{$cardHolderName}</card_holder_name>
    </card>
</Request>
XML;

// Generate HMAC signature
$hmac = hash_hmac('sha256', $xml, $shared_secret);

// Prepare headers
$headers = [
    'Content-Type: application/xml',
    'Authorization: HMAC ' . $hmac,
];

// Initialize cURL
$ch = curl_init($serviceUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);

// Execute the request
$response = curl_exec($ch);
if ($response === false) {
    echo 'cURL error: ' . curl_error($ch);
} else {
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($httpCode == 503) {
        echo 'Service Unavailable: The server is temporarily unable to handle the request.';
    } else {
        echo 'Response: ' . htmlspecialchars($response);
    }
}



?>
