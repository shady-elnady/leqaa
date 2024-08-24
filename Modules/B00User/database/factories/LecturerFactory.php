<?php

namespace Modules\B00User\Database\Factories;

use App\Enums\GendersEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LecturerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\B00User\Models\Lecturer::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'mobile' => fake()->phoneNumber(),
            'is_active' => true,
            'is_blocked' => false,
            'email_verified_at' => now(),
            'mobile_verified_at' => now(),
            'last_login' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'avatar' => fake()->image(),
            'gender' => GendersEnum::Male->value,
            'contact_info' => [
                'lat' => 4.33333,
                'lng' => 4.33333,
            ],
        ];
    }
}
