<?php

declare(strict_types=1);

namespace Ojasek\IuctoSdk\Enums;

class Language extends Enum
{
    const CS = "cs";
    const EN = "en";
    const SK = "sk";
    const DE = "de";

    protected static $values = [
        self::CS,
        self::EN,
        self::SK,
        self::DE
    ];

    public static function getValues()
    {
        return self::$values;
    }
}
