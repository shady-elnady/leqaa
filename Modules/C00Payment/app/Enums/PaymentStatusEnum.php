<?php

namespace Modules\C00Payment\Enums;

enum PaymentStatusEnum: string
{

    case Paid = 'Paid';
    case PayLater = 'Pay later';
    case PartiallyPaid = 'Partially paid';


    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function description(): string
    {
        return match ($this) {
            self::Paid => 'Paid',
            self::PayLater => 'PayLater',
            self::PartiallyPaid => 'PartiallyPaid',
        };
    }
}
