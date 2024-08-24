<?php

namespace Modules\D00Organization\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\D00Organization\Models\College;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizations = [
            [
                'logo' => '',
                'university_id' => 1,
                'translations' => [
                    'ar_AS' => 'كليه تجاره',
                    'ar_EG' => 'كليه تجاره',
                    'en_US' => 'College of Commerce',
                    'fr_FR' => 'Collège de Commerce',
                ]
            ],

        ];

        foreach ($organizations as $organization) {
            College::updateOrCreate(
                [
                    'logo' => $organization['logo'],
                    'university_id' => $organization['university_id'],
                    'translations' => $organization['translations'],
                ]
            );
        }
    }
}
