<?php

namespace App\Enum;
 
enum InvoiceTypeEnum : int
{
    case  RESTRICTED      = 1;
    case  PAID            = 2;
 
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    // A utility method to get the enum values for Blade views
    public static function names(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }
}