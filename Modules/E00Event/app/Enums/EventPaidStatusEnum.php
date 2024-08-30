<?php

namespace Modules\E00Event\Enums;

enum EventPaidStatusEnum: string
{
    case CompletelyFree = 'CompletelyFree'; // مجاني بالكامل
    case PartiallyPaid = 'PartiallyPaid'; //  مدعم جزئ
    case CompletelyPaid = 'CompletelyPaid'; // مدفوع بالكامل

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function description(): string
    {
        return match ($this) {
            self::CompletelyFree => 'CompletelyFree',
            self::PartiallyPaid => 'PartiallyPaid',
            self::CompletelyPaid => 'CompletelyPaid',
        };
    }

    public function toString(): ?string
    {
        return match ($this) {
            self::CompletelyFree => 'CompletelyFree',
            self::PartiallyPaid => 'PartiallyPaid',
            self::CompletelyPaid => 'CompletelyPaid',
        };
    }

    public function getColor(): ?string
    {
        return match ($this) {
            self::CompletelyFree => 'info',
            self::PartiallyPaid => 'gray',
            self::CompletelyPaid => 'success',
        };
    }
}


/*
    Available colors:
        primary
        secondary
        success
        warning
        error
        info
        purple
        pink
        blue
        green
        yellow
        red
        gray
*/
