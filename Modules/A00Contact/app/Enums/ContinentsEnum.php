<?php

namespace Modules\A00Contact\Enums;

enum ContinentsEnum: string
{
    case Africa = 'Africa';
    case Asia = 'Asia';
    case Europe = 'Europe';
    case NorthAmerica = 'NorthAmerica';
    case Oceanias = 'Oceanias';
    case SouthAmerica = 'SouthAmerica';
    case Antarctica = 'Antarctica';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function description(): string
    {
        return match ($this) {
            self::Africa => 'Africa',
            self::Asia => 'Asia',
            self::Europe => 'Europe',
            self::NorthAmerica => 'NorthAmerica',
            self::Oceanias => 'Oceanias',
            self::SouthAmerica => 'SouthAmerica',
        };
    }
}
