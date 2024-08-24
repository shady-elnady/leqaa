<?php

namespace Modules\D00Organization\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\D00Organization\Models\Organization;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizations = [
            [
                'logo' => '',
                'organization_type_id' => 1,
                'university_id' => 1,
                'affiliated_to' => null,
                'translations' => [
                    'ar_AS' => 'اسره الثقافه',
                    'ar_EG' => 'اسره الثقافه',
                    'en_US' => 'Family of Culture',
                    'fr_FR' => 'Famille culturelle',
                ]
            ],
            [
                'logo' => '',
                'organization_type_id' => 1,
                'university_id' => 1,
                'affiliated_to' => null,
                'translations' => [
                    'ar_AS' => 'أسره النور',
                    'ar_EG' => 'أسره النور',
                    'en_US' => 'The light family',
                    'fr_FR' => "La lumière l'a capturé",
                ]
            ],
        ];

        foreach ($organizations as $organization) {
            Organization::updateOrCreate(
                [
                    'logo' => $organization['logo'],
                    'organization_type_id' => $organization['organization_type_id'],
                    'university_id' => $organization['university_id'],
                    'affiliated_to' => $organization['affiliated_to'],
                    'translations' => $organization['translations'],
                ]
            );
        }
    }
}
