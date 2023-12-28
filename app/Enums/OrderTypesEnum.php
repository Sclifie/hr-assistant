<?php

namespace App\Enums;

enum OrderTypesEnum : string implements Translatable
{
    const TRANSLATION_PREFIX = 'order';
    case HIRING = 'hiring';
    public function translation(): string
    {
        {
            return match ($this) {
                OrderTypesEnum::HIRING => trans(self::TRANSLATION_PREFIX . OrderTypesEnum::HIRING->value),
            };
        }
    }
}
