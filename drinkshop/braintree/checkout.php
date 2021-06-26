<?php

require_once('braintree_init.php');
require_once('lib/Braintree.php');

$amount = $_POST["amount"];
$nonce = $_POST["nonce"];

$result = Braintree_Transaction::sale([
    'amount' => $amount,
    'paymentMethodNonce' => $nonce,
    'options' => [
        'submitForSettlement' => true
    ]
]);
echo $result;
