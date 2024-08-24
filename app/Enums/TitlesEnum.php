<?php

namespace App\Enums;

use Illuminate\Support\Collection;

enum TitlesEnum: string
{
    case Doctor = 'Doctor';
    case Engineer = 'Engineer';
    case Professor = 'Professor';
    case Student = 'Student';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function all(): Collection
    {
        return collect(AppThemesEnum::cases())->map(
            fn(AppThemesEnum $theme) => $theme->details()
        );
    }

    public function description(): string
    {
        return match ($this) {
            self::Doctor => 'Doctor',
            self::Engineer => 'Engineer',
            self::Professor => 'Professor',
            self::Student => 'Student',
        };
    }
}
