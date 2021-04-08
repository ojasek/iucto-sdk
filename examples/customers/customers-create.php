<?php

require __DIR__ . '\..\..\vendor\autoload.php';

$iUcto = new \Ojasek\IuctoSdk\IUctoApi("apikey");
$data = array(
    "name" => "Jan Novák",
    "name_display" => "Jan Novák ml.",
    "comid" => "00685776",
    "vatid" => "CZ00685776",
    "vat_payer" => true,
    "www" => null,
    "email" =>
        "novak.jan@iucto.cz",
    "cellphone" => null,
    "usual_maturity" => 30,
    "preferred_payment_method" => \Ojasek\IuctoSdk\Enums\PaymentMethod::CREDITCARD,
    "invoice_language" => "cs",
    "phone" => null,
    "address" => array(
        "street" => "Stodolní 123",
        "city" => "Ostrava",
        "postalcode" => "385 02",
        "country" => \Ojasek\IuctoSdk\Enums\Country::CZ)
);
$customer = new \Ojasek\IuctoSdk\Models\Customer($data);
$iUcto->customers->create($customer);