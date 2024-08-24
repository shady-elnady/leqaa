<?php

namespace Modules\E00Event\Database\Seeders;

use Illuminate\Database\Seeder;

class E00EventDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            EventTypeSeeder::class,
            EventSeeder::class,
            EventPhotoSeeder::class,
        ]);
    }
}
