<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'image' => '',
                'translations' => [
                    'ar_AS' => 'مناسبات',
                    'ar_EG' => 'مناسبات',
                    'en_US' => 'Events',
                    'fr_FR' => '',
                ]
            ],
            [
                'image' => '',
                'translations' => [
                    'ar_AS' => 'كورسات',
                    'ar_EG' => 'كورسات',
                    'en_US' => 'Courses',
                    'fr_FR' => '',
                ]
            ],
            [
                'image' => '',
                'translations' => [
                    'ar_AS' => 'تدريب',
                    'ar_EG' => 'تدريب',
                    'en_US' => 'Traning',
                    'fr_FR' => '',
                ]
            ],
        ];
        foreach ($categories as $category) {
            Category::updateOrCreate(
                [
                    'image' => $category['image'],
                    'translations' => $category['translations']
                ]
            );
        }
    }
}
