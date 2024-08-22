<?php

namespace App\Enums;

use Illuminate\Support\Collection;

enum AppThemesEnum: string
{
    case Light_Theme = 'Light Theme';
    case Dark_Theme = 'Dark Theme';


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
            self::Light_Theme => 'Light Theme',
            self::Dark_Theme => 'Dark Theme',
        };
    }

    public function details(): array
    {
        return match ($this) {
            self::Light_Theme => [
                'name'  => 'Light Theme',
                'value' => 'Light_Theme',
            ],

            self::Dark_Theme => [
                'name'  => 'Dark Theme',
                'value' => 'Dark_Theme',
            ],
        };
    }
}
