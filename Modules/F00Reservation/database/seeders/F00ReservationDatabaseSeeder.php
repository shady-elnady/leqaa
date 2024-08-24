<?php

namespace Modules\F00Reservation\Database\Seeders;

use Illuminate\Database\Seeder;

class F00ReservationDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            ReservationSeeder::class,
        ]);
    }
}
