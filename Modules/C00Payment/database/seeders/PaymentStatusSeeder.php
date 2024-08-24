<?php

namespace Modules\C00Payment\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\C00Payment\Enums\PaymentStatusEnum;
use Modules\C00Payment\Models\PaymentStatus;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentMethods = [
            [
                'payment_status' => PaymentStatusEnum::Paid->value,
                'translations' => [
                    'ar_AS' => 'مدفوع بالكامل',
                    'ar_EG' => 'مدفوع بالكامل',
                    'en_US' => 'Completely Paid',
                    'fr_FR' => 'Entièrement Payé',
                ]
            ],
            [
                'payment_status' => PaymentStatusEnum::PayLater->value,
                'translations' => [
                    'ar_AS' => 'مدفوع لاحقا',
                    'ar_EG' => 'مدفوع لاحقا',
                    'en_US' => 'Pay later',
                    'fr_FR' => 'Payer Plus Tard',
                ]
            ],
            [
                'payment_status' => PaymentStatusEnum::PartiallyPaid->value,
                'translations' => [
                    'ar_AS' => 'مدفوع جزئ',
                    'ar_EG' => 'مدفوع جزئ',
                    'en_US' => 'Partial Paid',
                    'fr_FR' => 'Partiellement Payé',
                ]
            ],
        ];
        foreach ($paymentMethods as $paymentMethod) {
            PaymentStatus::updateOrCreate(
                [
                    'payment_status' => $paymentMethod['payment_status'],
                    'translations' => $paymentMethod['translations']
                ]
            );
        }
    }
}
