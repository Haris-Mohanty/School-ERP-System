<?php

require('config.php');
require('razorpay-php/Razorpay.php');
session_start();
// create the razorpay order

$brand_name = $_SESSION['brand-name'];


$enrollment = $_GET['enrollment'];
$name = $_GET['name'];
$category = $_GET['category'];
$course = $_GET['course'];
$batch = $_GET['batch'];
$recent = $_GET['recent'];
$total = $_GET['total'];
$pending = $_GET['pending'];
$date = $_GET['date'];
$fee_time = $_GET['fee_time'];

use Razorpay\Api\Api;

$api = new Api($keyId,$keySecret);
//
// we create an razorpay order using order api
// doc: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => 'rcptid_11',
    'amount'          => $recent*100, // 39900 rupees in paise
    'currency'        => 'INR'
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];
$_SESSION['razorpay_order_id'] = $razorpayOrderId;
$displayAmount = $amount = $orderData['amount'];

if($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);
    $displayAmount = $exchange['rates'][$displayCurrency]*$amount/100;
}
$checkout = 'automatic';
if(isset($_GET['checkout']) and in_array($_GET['checkout'],['automatic','manual'], true))
{
    $checkout = $_GET['checkout'];
}
$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => $brand_name,
    "description"       => $brand_name,
    "image"             => "",
    "prefill"           => [
    "name"              => "zeeshan khan",
    "email"             => "zeeshan@gmail.com",
    "contact"           => "6393640841",
    ],
    "notes"             => [
    "address"           => "Mahrastra",
    "merchant_order_id" => "32564258",
    ],
    "theme"             => [
    "color"             => "#99cc33"
    ],
    "order_id"          => $razorpayOrderId,
];
if($displayCurrency !== 'INR')
{
    $data['display_currency'] = $displayCurrency;
    $data['displayAmount'] = $displayAmount;
}
$json = json_encode($data);
require("checkout/manual.php");
?>