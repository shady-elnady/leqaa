<?php

namespace Modules\G00Notification\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\G00Notification\Models\Notification::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

