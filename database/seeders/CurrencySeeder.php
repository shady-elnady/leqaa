<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = [
            [
                'iso_code' => 'USD',
                'symbol' => '💲',
                'translations' => [
                    'ar_AS' => 'دولار',
                    'ar_EG' => 'دولار',
                    'en_US' => 'Dollar',
                    'fr_FR' => 'Dollar'
                ],
            ],
            [
                'iso_code' => 'INR',
                'symbol' => '₹',
                'translations' => [
                    'ar_AS' => 'روبيه',
                    'ar_EG' => 'روبيه',
                    'en_US' => "Rupee's India",
                    'fr_FR' => 'La Roupie indienne'
                ],
            ],
            [
                'iso_code' => 'TWD',
                'symbol' => '🇹🇼',
                'translations' => [
                    'ar_AS' => 'دولار تايونى',
                    'ar_EG' => 'دولار تايونى',
                    'en_US' => "Dollar's Taiwan",
                    'fr_FR' => 'Dollar de Taïwan',
                ],
            ],
            [
                'iso_code' => 'EUR',
                'symbol' => '💶 €',
                'translations' => [
                    'ar_AS' => 'يورو',
                    'ar_EG' => 'يورو',
                    'en_US' => 'Euro',
                    'fr_FR' => 'Euro'
                ],
            ],
            [
                'iso_code' => 'JPY',
                'symbol' => '💴.',
                'translations' => [
                    'en_US' => 'Yen',
                    'ar_AS' => 'ين',
                    'ar_EG' => 'ين',
                    'fr_FR' => 'Yen',
                ],
            ],
            [
                'iso_code' => 'TRY',
                'symbol' => '₺',
                'translations' => [
                    'en_US' => "Lira's Turkey",
                    'ar_AS' => 'ليرا تركيه',
                    'ar_EG' => 'ليرا تركيه',
                    'fr_FR' => 'La Turquie de Lira',
                ],
            ],
            [
                'iso_code' => 'EGP',
                'symbol' => '💷',
                'translations' => [
                    'ar_AS' => 'جنيه مصرى',
                    'ar_EG' => 'جنيه مصرى',
                    'en_US' => 'Egyptian pound',
                    'fr_FR' => 'Livre égyptienne'
                ],
            ],
            [
                'iso_code' => 'JOD',
                'symbol' => 'JOD',
                'translations' => [
                    'ar_AS' => 'دينار أردنى',
                    'ar_EG' => 'دينار أردنى',
                    'en_US' => "Dinar's Jordan",
                    'fr_FR' => 'La Jordanie de Dinar'
                ],
            ],
            [
                'iso_code' => 'KWD',
                'symbol' => '🇰🇼.',
                'translations' => [
                    'ar_AS' => 'دينار كويتى',
                    'ar_EG' => 'دينار كويتى',
                    'en_US' => "Dinar's Kuwait",
                    'fr_FR' => 'Dinar Koweït'
                ],
            ],
            [
                'iso_code' => 'LYD',
                'symbol' => 'LD',
                'translations' => [
                    'ar_AS' => 'دينار ليبى',
                    'ar_EG' => 'دينار ليبى',
                    'en_US' => "Dinar's Libya",
                    'fr_FR' => 'Dinar Libye'
                ],
            ],
            [
                'iso_code' => 'TND',
                'symbol' => 'DT',
                'translations' => [
                    'ar_AS' => 'دينار تونسى',
                    'ar_EG' => 'دينار تونسى',
                    'en_US' => "Dinar's Tunisia",
                    'fr_FR' => 'Dinars tunisiens'
                ],
            ],
            [
                'iso_code' => 'IQD',
                'symbol' => '🇮🇶',
                'translations' => [
                    'ar_AS' => 'دينار عراقى',
                    'ar_EG' => 'دينار عراقى',
                    'en_US' => "Dinar's Iraq",
                    'fr_FR' => 'Dinars Irak'
                ],
            ],
            [
                'iso_code' => 'QAR',
                'symbol' => '🇶🇦',
                'translations' => [
                    'ar_AS' => 'ريال قطرى',
                    'ar_EG' => 'ريال قطرى',
                    'en_US' => "Riyal's Qatar",
                    'fr_FR' => 'Riyals du Qatar'
                ],
            ],
            [
                'iso_code' => 'SAR',
                'symbol' => '🇸🇦',
                'translations' => [
                    'ar_AS' => 'ريال سعودى',
                    'ar_EG' => 'ريال سعودى',
                    'en_US' => "Riyal's Saudi Arabia",
                    'fr_FR' => 'Riyals Saoudiens'
                ],
            ],
            [
                'iso_code' => 'OMR',
                'symbol' => '🏳️‍🌈',
                'translations' => [
                    'ar_AS' => 'ريال عمانى',
                    'ar_EG' => 'ريال عمانى',
                    'en_US' => "Riyal's Oman",
                    'fr_FR' => "Riyals d'Oman"
                ],
            ],
            [
                'iso_code' => 'AED',
                'symbol' => '🇦🇪',
                'translations' => [
                    'ar_AS' => 'درهم إمارتى',
                    'ar_EG' => 'درهم إمارتى',
                    'en_US' => 'Dirham',
                    'fr_FR' => 'Dirham'
                ],
            ],
            [
                'iso_code' => 'F',
                'symbol' => '₣',
                'translations' => [
                    'ar_AS' => 'فرانك',
                    'ar_EG' => 'فرانك',
                    'en_US' => 'French Franc',
                    'fr_FR' => 'Franc'
                ],
            ]
        ];

        foreach ($currencies as $currency) {
            Currency::updateOrCreate([
                'iso_code' => $currency['iso_code'],
                'symbol' => $currency['symbol'],
                'translations' => $currency['translations'],
            ]);
        };
    }
}
