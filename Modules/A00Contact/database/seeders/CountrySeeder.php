<?php

namespace Modules\A00Contact\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\A00Contact\Enums\ContinentsEnum;
use Modules\A00Contact\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            [
                'continent' => ContinentsEnum::Asia->value,
                'country_code' => 'AS',
                'flag_emoji' => '',
                'tel_code' => '966',
                'mobile_number_length' => 11,
                'phone_numberlength' => 10,
                'timezone' => 'UTC+03:00',
                'currency_id' => 14,
                'language_id' => 1,
                'translations' => [
                    'ar_AS' => 'المملكه العربيه السعوديه',
                    'ar_EG' => 'المملكه العربيه السعوديه',
                    'en_US' => 'Kingdom of Saudi Arabia',
                    'fr_FR' => "Royaume d'Arabie Saoudite",
                ],
            ],
            [
                'continent' => ContinentsEnum::Africa->value,
                'country_code' => 'EG',
                'flag_emoji' => '🇪🇬',
                'tel_code' => '002',
                'mobile_number_length' => 11,
                'phone_numberlength' => 13,
                'timezone' => 'UTC+02:00',
                'currency_id' => 7,
                'language_id' => 1,
                'translations' => [
                    'ar_AS' => 'مصر',
                    'ar_EG' => 'مصر',
                    'en_US' => 'Egypt',
                    'fr_FR' => 'Egypte',
                ],
            ],
            [
                'continent' => ContinentsEnum::NorthAmerica->value,
                'country_code' => 'US',
                'flag_emoji' => 'US',
                'tel_code' => '',
                'mobile_number_length' => 11,
                'phone_numberlength' => 13,
                'timezone' => 'UTC+02:00',
                'currency_id' => 1,
                'language_id' => 2,
                'translations' => [
                    'ar_AS' => 'الولايات المتحده الامريكيه',
                    'ar_EG' => 'الولايات المتحده الامريكيه',
                    'en_US' => 'United State of America',
                    'fr_FR' => "États-Unis d'Amérique",
                ],
            ],
            [
                'continent' => ContinentsEnum::Europe->value,
                'country_code' => 'FR',
                'flag_emoji' => '🇫🇷',
                'tel_code' => '33',
                'mobile_number_length' => 11,
                'phone_numberlength' => 13,
                'timezone' => 'UTC+02:00',
                'currency_id' => 17,
                'language_id' => 3,
                'translations' => [
                    'ar_AS' => 'فرنسا',
                    'ar_EG' => 'فرنسا',
                    'en_US' => 'France',
                    'fr_FR' => 'République française',
                ],
            ],
            [
                'continent' => ContinentsEnum::Asia->value,
                'country_code' => 'AE',
                'flag_emoji' => '🇦🇪',
                'tel_code' => '971',
                'mobile_number_length' => 11,
                'phone_numberlength' => 13,
                'timezone' => 'UTC+02:00',
                'currency_id' => 16,
                'language_id' => 3,
                'translations' => [
                    'ar_AS' => 'الإمارات العربية المتحدة',
                    'ar_EG' => 'الإمارات العربية المتحدة',
                    'en_US' => 'United Arab Emirates',
                    'fr_FR' => 'Émirats Arabes Unis'
                ],
            ],
        ];
        foreach ($countries as $country) {
            Country::updateOrCreate(
                [
                    'continent' => $country['continent'],
                    'country_code' => $country['country_code'],
                    'flag_emoji' => $country['flag_emoji'],
                    'tel_code' => $country['tel_code'],
                    'mobile_number_length' => $country['mobile_number_length'],
                    'phone_numberlength' => $country['phone_numberlength'],
                    'timezone' => $country['timezone'],
                    'currency_id' => $country['currency_id'],
                    'language_id' => $country['language_id'],
                    'translations' => $country['translations'],
                ]
            );
        }
    }
}
