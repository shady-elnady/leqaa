<?php

namespace Modules\B00User\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Enums\GendersEnum;
use App\Enums\TitlesEnum;
use Illuminate\Support\Str;
use Modules\B00User\Models\Lecturer;
use Illuminate\Support\Facades\Hash;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timeNow = now();
        Lecturer::create(
            [
                'title' => TitlesEnum::Doctor->value,
                'name' => 'أحمد محمود',
                'email' => 'ahmed@lecturer.com',
                'mobile' => '01011111111',
                'is_active' => true,
                'is_blocked' => false,
                'email_verified_at' => $timeNow,
                'mobile_verified_at' => $timeNow,
                'last_login' => $timeNow,
                // 'password' => Hash::make('password'),
                'password' => '$2y$12$8lWQyVfYfRjSAsnXJKgSxu5pW.x8Pdx6ePnWu.eaMchzV4EsR57uK',
                'remember_token' => Str::random(10),
                // 'avatar' => fake()->image(),
                'gender' => GendersEnum::Male->value,
                'contact_info' => [
                    'lat' => 4.33333,
                    'lng' => 4.33333,
                ],
                'birth_date' => now(),
                'university_number' => '1111111111',
                'is_graduate' => true,
            ]
        );
        // Lecturer::factory()->count(4)->create();
    }
}
