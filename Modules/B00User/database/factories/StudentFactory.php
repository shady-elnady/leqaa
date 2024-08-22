<?php

namespace Modules\B00User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\B00User\Models\Student::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
