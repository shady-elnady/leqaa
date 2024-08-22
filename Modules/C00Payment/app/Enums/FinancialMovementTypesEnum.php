<?php

namespace Modules\C00Payment\Enums;

enum FinancialMovementTypesEnum: string
{
    case Payments = 'Payments';
    case Village = 'Village';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function description(): string
    {
        return match ($this) {
            self::Payments => 'Payments',
            self::Village => 'Village',
        };
    }
}
