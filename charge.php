<?php
require_once 'vendor/autoload.php';

\Stripe\Stripe::setApiKey("sk_test_MKgmayMxKOwJfmO1UnLKA9X3");

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
$token = $_POST['stripeToken'];


$charge = \Stripe\Charge::create([
    'amount' => 299,
    'currency' => 'jpy',
    'description' => '決済',
    'source' => $token,
]);