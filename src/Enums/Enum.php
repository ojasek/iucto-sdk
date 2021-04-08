<?php

declare(strict_types=1);

namespace Ojasek\IuctoSdk\Enums;

abstract class Enum implements EnumInterface
{
    public static abstract function getValues();
}
