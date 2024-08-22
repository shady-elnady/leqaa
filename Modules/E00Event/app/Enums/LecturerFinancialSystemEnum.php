<?php

namespace Modules\E00Event\Enums;

enum LecturerFinancialSystemEnum: string
{
    case EachStudent = 'EachStudent'; // مجاني بالكامل
    case AllEvent = 'AllEvent'; //  مدعم جزئ

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function description(): string
    {
        return match ($this) {
            self::EachStudent => 'EachStudent',
            self::AllEvent => 'AllEvent',
        };
    }
}
