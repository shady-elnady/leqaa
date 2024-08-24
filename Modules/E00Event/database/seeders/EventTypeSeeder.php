<?php

namespace Modules\E00Event\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\E00Event\Models\EventType;

class EventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eventsTypes = [
            [
                'image' => '',
                'translations' => [
                    'ar_AS' => 'مناسبات',
                    'ar_EG' => 'مناسبات',
                    'en_US' => 'Occasions',
                    'fr_FR' => 'Occasions',
                ]
            ],
            [
                'image' => '',
                'translations' => [
                    'ar_AS' => 'كورسات',
                    'ar_EG' => 'كورسات',
                    'en_US' => 'Courses',
                    'fr_FR' => 'Cours',
                ]
            ],
            [
                'image' => '',
                'translations' => [
                    'ar_AS' => 'تدريب',
                    'ar_EG' => 'تدريب',
                    'en_US' => 'Traning',
                    'fr_FR' => 'Formation',
                ]
            ],
        ];
        foreach ($eventsTypes as $eventType) {
            EventType::updateOrCreate(
                [
                    'image' => $eventType['image'],
                    'translations' => $eventType['translations']
                ]
            );
        }
    }
}
