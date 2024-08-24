<?php

namespace Modules\A00Contact\Database\Seeders;

use Illuminate\Database\Seeder;

class A00ContactDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            CountrySeeder::class,
            GovernorateSeeder::class,
            CitySeeder::class,
            LocalitySeeder::class,
            StateSeeder::class,
            StreetSeeder::class,
            AddressSeeder::class,
        ]);
    }
}
