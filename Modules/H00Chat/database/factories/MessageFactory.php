<?php

namespace Modules\H00Chat\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\H00Chat\Models\Message::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

