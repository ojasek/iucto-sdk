<?php

require __DIR__ . '\..\..\vendor\autoload.php';

$iUcto = new \Ojasek\IuctoSdk\IUctoApi("apikey");
$customerList = $iUcto->customers->listCustomers();
var_dump($customerList->getData());
die;