<?php

namespace Modules\B00User\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Enums\GendersEnum;
use App\Enums\TitlesEnum;
use Illuminate\Support\Str;
use Modules\B00User\Models\Lecturer;

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
                'name' => 'Shady El Nady',
                'first_name' => 'Shady',
                'last_name' => 'El Nady',
                'email' => 'shady@lecturer.test',
                'mobile' => '01061656112',
                'is_active' => true,
                'is_blocked' => false,
                'email_verified_at' => $timeNow,
                'mobile_verified_at' => $timeNow,
                'last_login' => $timeNow,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                // 'avatar' => fake()->image(),
                'gender' => GendersEnum::Male->value,
                'contact_info' => [
                    'lat' => 4.33333,
                    'lng' => 4.33333,
                ],
            ]
        );
        // Lecturer::factory()->count(4)->create();
    }
}
