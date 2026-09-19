<?php

namespace App\Enums;

enum CategoriesEnum: string
{
    case FRONT = 'front';
    case BACK = 'back';
    case TOOL = 'tool';

    public static function values()
    {
        return array_column(self::cases(), 'value');
    }
}
