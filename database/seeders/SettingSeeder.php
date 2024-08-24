<?php

namespace Database\Seeders;

use App\Enums\AppThemesEnum;
use App\Models\Locale as LocaleModel;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $localesIds = LocaleModel::all()->pluck('id')->toArray();
        $currenciesIds = [1, 7, 4, 5, 9, 12, 13, 14, 15];
        $themes = AppThemesEnum::getValues();

        foreach ($currenciesIds as $currencyId) {
            foreach ($localesIds as $localeId) {
                foreach ($themes as $theme) {
                    Setting::updateOrCreate(
                        [
                            'locale_id' => $localeId,
                            'currency_id' => $currencyId,
                            'theme' => $theme,
                        ]
                    );
                }
            }
        }
    }
}
