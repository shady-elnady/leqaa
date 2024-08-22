<?php

namespace Modules\D00Organization\Enums;

enum OrganizationTypesEnum: string
{
    case Family = 'Family';
    case University = 'University';




    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function description(): string
    {
        return match ($this) {
            self::Family => 'Family',
            self::University => 'University',
        };
    }
}
