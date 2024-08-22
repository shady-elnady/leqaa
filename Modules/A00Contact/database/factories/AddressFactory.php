<?php

namespace Modules\A00Contact\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\A00Contact\Models\Address::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

