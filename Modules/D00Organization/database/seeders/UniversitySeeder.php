<?php

namespace Modules\D00Organization\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\D00Organization\Models\University;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizations = [
            [
                'logo' => '',
                'translations' => [
                    'ar_AS' => 'جامعه المنصوره',
                    'ar_EG' => 'جامعه المنصوره',
                    'en_US' => 'Mansoura University',
                    'fr_FR' => 'Université de Mansourah',
                ]
            ],
        ];
        foreach ($organizations as $organization) {
            University::updateOrCreate(
                [
                    'logo' => $organization['logo'],
                    'translations' => $organization['translations'],
                ]
            );
        }
    }
}
