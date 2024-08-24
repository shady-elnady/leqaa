<?php

namespace Modules\C00Payment\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\C00Payment\Enums\PaymentMethodsEnum;
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
                'payment_method' => PaymentMethodsEnum::Monetary->value,
                'translations' => [
                    'ar_AS' => 'نقدى',
                    'ar_EG' => 'نقدى',
                    'en_US' => 'Monetary',
                    'fr_FR' => 'Monétaire',
                ]
            ],
            [
                'payment_method' => PaymentMethodsEnum::CreditCard->value,
                'translations' => [
                    'ar_AS' => 'بطاقه الائتمان',
                    'ar_EG' => 'بطاقه الائتمان',
                    'en_US' => 'Credit Card',
                    'fr_FR' => 'Carte de Crédit',
                ]
            ],
            [
                'payment_method' => PaymentMethodsEnum::BankTransfer->value,
                'translations' => [
                    'ar_AS' => 'تحويل مصرفى',
                    'ar_EG' => 'تحويل مصرفى',
                    'en_US' => 'Bank Transfer',
                    'fr_FR' => 'Virement Bancaire',
                ]
            ],
            [
                'payment_method' => PaymentMethodsEnum::Check->value,
                'translations' => [
                    'ar_AS' => 'شيك',
                    'ar_EG' => 'شيك',
                    'en_US' => 'Check',
                    'fr_FR' => 'Vérifier',
                ]
            ],
            [
                'payment_method' => PaymentMethodsEnum::MoneyTransfer->value,
                'translations' => [
                    'ar_AS' => 'نقل اموال',
                    'ar_EG' => 'نقل اموال',
                    'en_US' => 'Money Transfer',
                    'fr_FR' => "Transfert d'Argent",
                ]
            ],

        ];
        foreach ($paymentMethods as $paymentMethod) {
            PaymentMethod::updateOrCreate(
                [
                    'payment_method' => $paymentMethod['payment_method'],
                    'translations' => $paymentMethod['translations']
                ]
            );
        }
    }
}
