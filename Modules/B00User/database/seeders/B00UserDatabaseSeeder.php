<?php

namespace Modules\B00User\Database\Seeders;

use Illuminate\Database\Seeder;

class B00UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            LecturerSeeder::class,
            StudentSeeder::class,
            InterestSeeder::class,
        ]);
    }
}
