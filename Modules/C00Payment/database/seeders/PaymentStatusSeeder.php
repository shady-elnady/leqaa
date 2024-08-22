<?php

namespace Modules\C00Payment\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\C00Payment\Models\PaymentStatus;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $paymentStatuses = [
            [
                'payment_status' => 'Paid',
                'translations' => [
                    [
                        'locale_id' => 1,
                        'title' => 'مدفوع بالكامل',
                    ],
                    [
                        'locale_id' => 2,
                        'title' => 'Completely Paid',
                    ],
                ],
            ],
            [
                'payment_status' => 'Pay later',
                'translations' => [
                    [
                        'locale_id' => 1,
                        'title' => 'مدفوع لاحقا',
                    ],
                    [
                        'locale_id' => 2,
                        'title' => 'Pay later',
                    ],
                ],
            ],
            [
                'payment_status' => 'Partially paid',
                'translations' => [
                    [
                        'locale_id' => 1,
                        'title' => 'مدفوع جزئ',
                    ],
                    [
                        'locale_id' => 2,
                        'title' => 'Partial Paid',
                    ],
                ],
            ],
        ];
        foreach ([1, 2, 3] as $branchId) {
            foreach ($paymentStatuses as $paymentStatus) {
                $paymentStatusRecord = PaymentStatus::create([
                    'branch_id' => $branchId,
                    'payment_status' => $paymentStatus['payment_status'],
                ]);
                //
                foreach ($paymentStatus['translations'] as $translation) {
                    EntityTranslation::updateOrCreate([
                        "entity_type"  => PaymentStatus::class,
                        "entity_id"  => $paymentStatusRecord->id,
                        "locale_id"  => $translation['locale_id'],
                        "field"  => 'name',
                        "title"  => $translation['title'],
                    ]);
                }
            }
        }
    }
}
