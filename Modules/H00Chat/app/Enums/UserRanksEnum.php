<?php

namespace Modules\H00Chat\Enums;

enum UserRanksEnum: string
{
    case Creator = 'Creator';
    case Receiver = 'Receiver';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function description(): string
    {
        return match ($this) {
            self::Creator => 'Creator',
            self::Receiver => 'Receiver',
        };
    }
}
