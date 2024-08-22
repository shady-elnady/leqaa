<?php

namespace App\Enums;

use Illuminate\Support\Collection;

enum GendersEnum: string
{
    case Male = 'Male';
    case FeMale = 'FeMale';


    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function all(): Collection
    {
        return collect(GendersEnum::cases())->map(
            fn(GendersEnum $theme) => $theme->details()
        );
    }

    public function description(): string
    {
        return match ($this) {
            self::Male => 'Male',
            self::FeMale => 'FeMale',
        };
    }

    public function details(): array
    {
        return match ($this) {
            self::Male => [
                'name'  => 'Male',
                'value' => 'Male',
            ],

            self::FeMale => [
                'name'  => 'FeMale',
                'value' => 'FeMale',
            ],
        };
    }
}
