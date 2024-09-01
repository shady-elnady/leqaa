<?php

namespace Modules\C00Payment\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentTransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\C00Payment\Models\StudentTransaction::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

