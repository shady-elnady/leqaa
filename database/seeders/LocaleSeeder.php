<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Locale;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Modules\A00Contact\Models\Country;

class LocaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = [
            [
                'language_id' => 1,
                'country_id' => 1,
            ],
            [
                'language_id' => 1,
                'country_id' => 2,
            ],
            [
                'language_id' => 2,
                'country_id' => 3,
            ],
            [
                'language_id' => 3,
                'country_id' => 4,
            ],
        ];
        foreach ($locales as $locale) {

            // $language_code = Str::lower(Language::find($locale['language_id'])->language_iso_code);
            // $country_code = Str::upper(Country::find($locale['country_id'])->country_code);
            // $locale_code =  $language_code . '_' . $country_code;

            Locale::updateOrCreate(
                [
                    'language_id' => $locale['language_id'],
                    'country_id' => $locale['country_id'],
                    'locale_code' => (Str::lower(Language::find($locale['language_id'])->language_iso_code)) . '_' . (Str::upper(Country::find($locale['country_id'])->country_code)),
                    // 'locale_code' => $locale_code,
                ]
            );
        }
    }
}
