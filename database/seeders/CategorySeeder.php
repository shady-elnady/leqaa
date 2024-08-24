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
                    'ar_AS' => 'الطب',
                    'ar_EG' => 'الطب',
                    'en_US' => 'Medicine',
                    'fr_FR' => 'Médecine',
                ]
            ],
            [
                'image' => '',
                'translations' => [
                    'ar_AS' => 'العلوم',
                    'ar_EG' => 'العلوم',
                    'en_US' => 'Science',
                    'fr_FR' => 'les Sciences',
                ]
            ],
            [
                'image' => '',
                'translations' => [
                    'ar_AS' => 'الهندسه',
                    'ar_EG' => 'الهندسه',
                    'en_US' => 'Engineering',
                    'fr_FR' => 'Ingénierie',
                ]
            ],
            [
                'image' => '',
                'translations' => [
                    'ar_AS' => 'الثقافه والفنون',
                    'ar_EG' => 'الثقافه والفنون',
                    'en_US' => 'Culture & Arts',
                    'fr_FR' => 'Culture et Arts',
                ]
            ],
            [
                'image' => '',
                'translations' => [
                    'ar_AS' => 'التكنولوجيا',
                    'ar_EG' => 'التكنولوجيا',
                    'en_US' => 'Technology',
                    'fr_FR' => 'Technologie',
                ]
            ],
            [
                'image' => '',
                'translations' => [
                    'ar_AS' => 'الزراعه',
                    'ar_EG' => 'الزراعه',
                    'en_US' => 'Agriculture',
                    'fr_FR' => 'Agriculture',
                ]
            ],
            [
                'image' => '',
                'translations' => [
                    'ar_AS' => 'الرياضه',
                    'ar_EG' => 'الرياضه',
                    'en_US' => 'Sports',
                    'fr_FR' => 'Sportif',
                ]
            ],
            [
                'image' => '',
                'translations' => [
                    'ar_AS' => 'القانون',
                    'ar_EG' => 'القانون',
                    'en_US' => 'Law',
                    'fr_FR' => 'la Loi',
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
