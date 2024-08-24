<?php

namespace Modules\B00User\Database\Seeders;

use App\Enums\GendersEnum;
use Illuminate\Database\Seeder;
use Modules\B00User\Models\Admin;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timeNow = now();
        Admin::create(
            [
                'name' => 'Admin 1 Name',
                'complete_name' => 'Admin 1 Complete Name',
                'email' => 'admin1@test.com',
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
                'birth_date' => now(),
                'university_number' => '1111111111',
                'is_graduate' => true,
            ]
        );
        // Admin::factory()->count(4)->create();
    }
}
