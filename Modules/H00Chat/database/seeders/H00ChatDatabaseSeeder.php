<?php

namespace Modules\H00Chat\Database\Seeders;

use Illuminate\Database\Seeder;

class H00ChatDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            RoomSeeder::class,
            MessageSeeder::class,
            MessageFileSeeder::class,
            FaqSeeder::class,
        ]);
    }
}
