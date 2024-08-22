<?php

namespace App\Enums;

use Illuminate\Support\Collection;

enum FilesTypesEnum: string
{
    case DOCUMENT = 'DOCUMENT';
    case IMAGE = 'IMAGE';
    case VIDEO = 'VIDEO';
    case AUDIO = 'AUDIO';
    case LOCATION = 'LOCATION';
    case CONTACT = 'CONTACT';


    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function all(): Collection
    {
        return collect(FilesTypesEnum::cases())->map(
            fn(FilesTypesEnum $theme) => $theme->details()
        );
    }

    public function details(): array
    {
        return match ($this) {
            self::DOCUMENT => [
                'name'  => 'DOCUMENT',
                'value' => 'DOCUMENT',
            ],

            self::IMAGE => [
                'name'  => 'IMAGE',
                'value' => 'IMAGE',
            ],

            self::VIDEO => [
                'name'  => 'VIDEO',
                'value' => 'VIDEO',
            ],

            self::AUDIO => [
                'name'  => 'AUDIO',
                'value' => 'AUDIO',
            ],

            self::LOCATION => [
                'name'  => 'LOCATION',
                'value' => 'LOCATION',
            ],

            self::CONTACT => [
                'name'  => 'CONTACT',
                'value' => 'CONTACT',
            ],
        };
    }
}
