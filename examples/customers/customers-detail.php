<?php

require __DIR__ . '\..\..\vendor\autoload.php';

$iUcto = new \Ojasek\IuctoSdk\IUctoApi("apikey");
$customer = $iUcto->customers->detail(711449);
var_dump($customer);
die;