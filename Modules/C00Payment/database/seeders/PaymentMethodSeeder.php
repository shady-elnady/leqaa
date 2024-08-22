<?php

namespace Modules\C00Payment\Database\Seeders;

use App\Models\EntityTranslation;
use Illuminate\Database\Seeder;
use Modules\C00Payment\Models\PaymentMethod;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentMethods = [
            [
                'payment_method' => 'Monetary',
                'translations' => [
                    [
                        'locale_id' => 1,
                        'title' => 'نقدى',
                    ],
                    [
                        'locale_id' => 2,
                        'title' => 'Cash',
                    ],
                ],
            ],
            [
                'payment_method' => 'Credit Card',
                'translations' => [
                    [
                        'locale_id' => 1,
                        'title' => 'بطاقه الائتمان',
                    ],
                    [
                        'locale_id' => 2,
                        'title' => 'Credit Card',
                    ],
                ],
            ],
            [
                'payment_method' => 'Bank Transfer',
                'translations' => [
                    [
                        'locale_id' => 1,
                        'title' => 'تحويل مصرفى',
                    ],
                    [
                        'locale_id' => 2,
                        'title' => 'Bank Transfer',
                    ],
                ],
            ],
            [
                'payment_method' => 'Check',
                'translations' => [
                    [
                        'locale_id' => 1,
                        'title' => 'شيك',
                    ],
                    [
                        'locale_id' => 2,
                        'title' => 'Check',
                    ],
                ],
            ],
            [
                'payment_method' => 'Money Transfer',
                'translations' => [
                    [
                        'locale_id' => 1,
                        'title' => 'نقل اموال',
                    ],
                    [
                        'locale_id' => 2,
                        'title' => 'Money Transfer',
                    ],
                ],
            ],
        ];
        foreach ([1, 2, 3] as $branchId) {
            foreach ($paymentMethods as $paymentMethod) {
                $paymentMethodRecord = PaymentMethod::create([
                    'branch_id' => $branchId,
                    'payment_method' => $paymentMethod['payment_method'],
                ]);
                //
                foreach ($paymentMethod['translations'] as $translation) {
                    EntityTranslation::updateOrCreate([
                        "entity_type"  => 'Modules\S05Transaction\Models\PaymentMethod',
                        "entity_id"  => $paymentMethodRecord->id,
                        "locale_id"  => $translation['locale_id'],
                        "field"  => 'name',
                        "title"  => $translation['title'],
                    ]);
                }
            }
        }
    }
}
