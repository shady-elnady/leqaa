<?php

namespace Modules\E00Event\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\E00Event\Models\Event::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

