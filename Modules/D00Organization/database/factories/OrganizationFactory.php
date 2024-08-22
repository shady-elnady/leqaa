<?php

namespace Modules\D00Organization\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrganizationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\D00Organization\Models\Organization::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

