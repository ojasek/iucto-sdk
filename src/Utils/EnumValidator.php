<?php

declare(strict_types=1);

namespace Ojasek\IuctoSdk\Utils;

use Ojasek\IuctoSdk\Enums\Enum;

class EnumValidator
{
    public static function isValidValue($enumClass, $value)
    {
        $enumInstance = new $enumClass();
        if($enumInstance instanceof Enum) {
            if(in_array($value, $enumInstance::getValues())) {
                return true;
            }
            return false;
        }else{
            throw new \InvalidArgumentException("Not valid enum class.");
        }
    }
}
