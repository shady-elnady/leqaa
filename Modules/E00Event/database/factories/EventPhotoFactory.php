<?php

namespace Modules\E00Event\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventPhotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\E00Event\Models\EventPhoto::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

