<?php

namespace Modules\C00Payment\Enums;

enum PaymentMethodsEnum: string
{
    case Monetary = 'Monetary';
    case CreditCard = 'CreditCard';
    case BankTransfer = 'BankTransfer';
    case Check = 'Check';
    case MoneyTransfer = 'MoneyTransfer';
    case MobileCach = 'MobileCach';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function description(): string
    {
        return match ($this) {
            self::Monetary => 'Monetary',
            self::CreditCard => 'CreditCard',
            self::BankTransfer => 'BankTransfer',
            self::Check => 'Check',
            self::MoneyTransfer => 'MoneyTransfer',
            self::MobileCach => 'MobileCach',
        };
    }
}
