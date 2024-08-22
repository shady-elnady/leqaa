<?php

namespace Modules\F00Reservation\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\F00Reservation\Models\Reservation::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

