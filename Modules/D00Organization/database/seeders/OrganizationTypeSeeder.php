<?php

namespace Modules\D00Organization\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\D00Organization\Models\OrganizationType;

class OrganizationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizationsTypes = [
            [
                'translations' => [
                    'ar_AS' => 'اسره ',
                    'ar_EG' => 'اسره',
                    'en_US' => 'Family',
                    'fr_FR' => 'Famille',
                ]
            ],
        ];

        foreach ($organizationsTypes as $organizationsType) {
            OrganizationType::updateOrCreate(
                [
                    'translations' => $organizationsType['translations'],
                ]
            );
        }
    }
}
