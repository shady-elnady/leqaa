<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\A00Contact\Database\Seeders\A00ContactDatabaseSeeder;
use Modules\B00User\Database\Seeders\B00UserDatabaseSeeder;
use Modules\C00Payment\Database\Seeders\C00PaymentDatabaseSeeder;
use Modules\D00Organization\Database\Seeders\D00OrganizationDatabaseSeeder;
use Modules\E00Event\Database\Seeders\E00EventDatabaseSeeder;
use Modules\F00Reservation\Database\Seeders\F00ReservationDatabaseSeeder;
use Modules\G00Notification\Database\Seeders\G00NotificationDatabaseSeeder;
use Modules\H00Chat\Database\Seeders\H00ChatDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LanguageSeeder::class,
            CurrencySeeder::class,
            CategorySeeder::class,
            // Module Contact
            A00ContactDatabaseSeeder::class,
            // Add Locales after Countries
            LocaleSeeder::class,
            // Add Settings after Locales
            SettingSeeder::class,
            // Module Organization
            D00OrganizationDatabaseSeeder::class,
            // Module User
            B00UserDatabaseSeeder::class,
            // Module Payment
            C00PaymentDatabaseSeeder::class,
            // Module Event
            E00EventDatabaseSeeder::class,
            // Module Reservation
            F00ReservationDatabaseSeeder::class,
            // Module Notification
            G00NotificationDatabaseSeeder::class,
            // Module Chat
            H00ChatDatabaseSeeder::class,
        ]);
    }
}
