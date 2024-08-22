<?php

namespace App\Enums;

use Illuminate\Support\Collection;

enum UsersTypesEnum: string
{
    case Admin = 'Admin';
    case Lecturer = 'Lecturer';
    case Student = 'Student';


    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function all(): Collection
    {
        return collect(UsersTypesEnum::cases())->map(
            fn(UsersTypesEnum $theme) => $theme->details()
        );
    }

    public function description(): string
    {
        return match ($this) {
            self::Admin => 'Admin',
            self::Lecturer => 'Lecturer',
            self::Student => 'Student',
        };
    }

    public function details(): array
    {
        return match ($this) {
            self::Admin => [
                'name'  => 'Admin',
                'value' => 'Admin',
            ],

            self::Lecturer => [
                'name'  => 'Lecturer',
                'value' => 'Lecturer',
            ],

            self::Student => [
                'name'  => 'Student',
                'value' => 'Student',
            ],
        };
    }
}
