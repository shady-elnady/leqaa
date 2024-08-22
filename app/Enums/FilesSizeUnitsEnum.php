<?php

namespace App\Enums;

use Illuminate\Support\Collection;

enum FilesSizeUnitsEnum: string
{
    case B = 'B';
    case KB = 'KB';
    case MB = 'MB';
    case GB = 'GB';


    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function all(): Collection
    {
        return collect(FilesSizeUnitsEnum::cases())->map(
            fn(FilesSizeUnitsEnum $theme) => $theme->details()
        );
    }

    public function description(): string
    {
        return match ($this) {
            self::B => 'Byte',
            self::KB => 'Kelo Byte',
            self::MB => 'Miga Byte',
            self::GB => 'Giga Byte',
        };
    }

    public function details(): array
    {
        return match ($this) {
            self::B => [
                'name'  => 'B',
                'value' => 'B',
                'description' => 'Byte',
            ],

            self::KB => [
                'name'  => 'KB',
                'value' => 'KB',
                'description' => 'Kelo Byte',
            ],

            self::MB => [
                'name'  => 'MB',
                'value' => 'MB',
                'description' => 'Miga Byte',
            ],

            self::GB => [
                'name'  => 'GB',
                'value' => 'GB',
                'description' => 'Giga Byte',
            ],
        };
    }
}
