<?php

require __DIR__ . '\..\..\vendor\autoload.php';

$iUcto = new \Ojasek\IuctoSdk\IUctoApi("apikey");
$result = $iUcto->customers->delete(711449);
var_dump($result);
die;