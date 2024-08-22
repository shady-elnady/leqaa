<?php

namespace Modules\A00Contact\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\A00Contact\Models\Country::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

