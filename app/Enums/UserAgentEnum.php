<?php

namespace App\Enums;

use Illuminate\Support\Collection;

enum UserAgentEnum: string
{
    case Admin = 'Admin';
    case Lecturer = 'Lecturer';
    case Student = 'Student';
    case User = 'User';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function all(): Collection
    {
        return collect(UserAgentEnum::cases())->map(
            fn(UserAgentEnum $theme) => $theme->details()
        );
    }

    public function description(): string
    {
        return match ($this) {
            self::Admin => 'Admin',
            self::Lecturer => 'Lecturer',
            self::Student => 'Student',
            self::User => 'User',
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
            self::User => [
                'name'  => 'User',
                'value' => 'User',
            ],
        };
    }
}
