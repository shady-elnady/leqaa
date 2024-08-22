<?php

namespace Modules\E00Event\Enums;

enum EventStatusEnum: string
{
    case Initialzated = 'Initialzated'; // مجاني بالكامل
    case Start = 'Start'; //  مدعم جزئ
    case Runing = 'Runing'; //  مدعم جزئ
    case Canceled = 'Canceled'; //  مدعم جزئ
    case Completed = 'Completed'; //  مدعم جزئ

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function description(): string
    {
        return match ($this) {
            self::Initialzated => 'Initialzated',
            self::Start => 'Start',
            self::Runing => 'Runing',
            self::Canceled => 'Canceled',
            self::Completed => 'Completed',
        };
    }
}
