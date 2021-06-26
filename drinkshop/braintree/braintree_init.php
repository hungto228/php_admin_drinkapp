<?php
session_start();
require_once('lib/autoload.php');

if(file_exists(__DIR__ . '/../.env')) {
    $dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
    $dotenv->load();
}
Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('qgk737fk9zmrnqn8');
Braintree_Configuration::publicKey('tfpr2bfy8t6rc9bh');
Braintree_Configuration::privateKey('2f24308bad5064cea42341a016fe31a1');

?> 