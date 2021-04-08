<?php

declare(strict_types=1);

namespace Ojasek\IuctoSdk\Enums;

class Country extends Enum
{
    const CZ = "CZ";
    const AE = "AE";
    const AF = "AF";
    const AG = "AG";

    protected static $values = [
        self::CZ,
        self::AE,
        self::AF,
        self::AG
        ];

    public static function getValues()
    {
        return self::$values;
    }


}
