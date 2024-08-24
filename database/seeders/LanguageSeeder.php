<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Language as LanguageModel;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            [
                'native_name' => 'العربيه',
                'language_iso_code' => 'ar',
                'is_bidirectional' => true,
                'translations' => [
                    'ar_AS' => 'العربيه',
                    'ar_EG' => 'العربيه',
                    'en_US' => 'Arabic',
                    'fr_FR' => 'Arabe',
                ]
            ],
            [
                'native_name' => 'English',
                'language_iso_code' => 'en',
                'is_bidirectional' => false,
                'translations' => [
                    'ar_AS' => 'الانجليزيه',
                    'ar_EG' => 'الانجليزيه',
                    'en_US' => 'English',
                    'fr_FR' => 'Anglais',
                ]
            ],
            [
                'native_name' => 'Française',
                'language_iso_code' => 'fr',
                'is_bidirectional' => false,
                'translations' => [
                    'ar_AS' => 'الفرنسيه',
                    'ar_EG' => 'الفرنسيه',
                    'en_US' => 'French',
                    'fr_FR' => 'Français',
                ]
            ],
        ];
        foreach ($languages as $language) {
            LanguageModel::updateOrCreate(
                [
                    'native_name' => $language['native_name'],
                    'language_iso_code' => $language['language_iso_code'],
                    'is_bidirectional' => $language['is_bidirectional'],
                    'translations' => $language['translations']
                ]
            );
        }
    }
}
