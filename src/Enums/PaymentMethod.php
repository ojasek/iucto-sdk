<?php

declare(strict_types=1);

namespace Ojasek\IuctoSdk\Enums;

class PaymentMethod extends Enum
{
    const TRANSFER = "transfer";
    const CASH = "cash";
    const PROFORMA = "proforma";
    const CHECK = "check";
    const CREDITCARD = "creditcard";

    public static $values = [
        self::TRANSFER,
        self::CASH,
        self::PROFORMA,
        self::CHECK,
        self::CREDITCARD
    ];

    public static function getValues()
    {
        return self::$values;
    }
}
