<?php

namespace App\Enums;

enum ExperiencesEnum: string
{
    case PROFESSIONAL = 'professional';
    case SCHOLAR = 'scholar';

    public static function values()
    {
        return array_column(self::cases(), 'value');
    }
}
