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
}
