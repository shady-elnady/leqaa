<?php

namespace Modules\E00Event\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\E00Event\Enums\EventStatusEnum;
use Modules\E00Event\Models\Event;
use Modules\E00Event\Enums\EventPaidStatusEnum;
use Modules\E00Event\Enums\LecturerFinancialSystemEnum;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eventsTypes = [
            [
                'title' => 'ملتقى التوظيف',
                'hall' => '',
                'event_paid_status' => EventPaidStatusEnum::CompletelyFree->value,
                'university_id' => 1,
                'college_id' => 1,
                'organizer_id' => 1,
                'description' => 'تنظم جامعة المنصورة ملتقى التوظيف السنوي، وهو فعالية تهدف إلى تعزيز فرص العمل للخريجين وتهيئتهم لسوق العمل. يقام الملتقى تحت رعاية رئيس الجامعة د. شريف يوسف خاطر، ويشمل مشاركة العديد من الشركات والمؤسسات من مختلف القطاعات.الملتقى يوفر منصة للخريجين للتفاعل مع أصحاب العمل، والاستفادة من ورش العمل والجلسات النقاشية التي تركز على تنمية المهارات المهنية والشخصية، مما يعزز من فرص التوظيف الفعلية للخريجين.كما يتضمن الملتقى جلسات حول استراتيجيات التوظيف ورؤية مصر 2030، حيث يتم تناول موضوعات مثل المشروعات القومية ومدن الجيل الرابع، وريادة الأعمال، والدور المجتمعي لمؤسسات العمل  ويشمل مشاركة العديد من الشركات والمؤسسات من مختلف القطاعات',
                'Lecturer_id' => 1,
                'lecturer_Financial_dues' => 0,
                'lecturer_financial_system' => LecturerFinancialSystemEnum::AllEvent->value,
                'event_type_id' => 1,
                'category_id' => 1,
                'image' => '',
                'event_status' => EventStatusEnum::Initialzated->value,
                'start_date_time' => now(),
            ],
        ];
        foreach ($eventsTypes as $eventType) {
            Event::updateOrCreate(
                [
                    'title' => $eventType['title'],
                    'hall' => $eventType['hall'],
                    'event_paid_status' => $eventType['event_paid_status'],
                    'university_id' => $eventType['university_id'],
                    'college_id' => $eventType['college_id'],
                    'organizer_id' => $eventType['organizer_id'],
                    'description' => $eventType['description'],
                    'Lecturer_id' => $eventType['Lecturer_id'],
                    'lecturer_Financial_dues' => $eventType['lecturer_Financial_dues'],
                    'lecturer_financial_system' => $eventType['lecturer_financial_system'],
                    'event_type_id' => $eventType['event_type_id'],
                    'category_id' => $eventType['category_id'],
                    'image' => $eventType['image'],
                    'event_status' => $eventType['event_status'],
                    'start_date_time' => $eventType['start_date_time'],
                ]
            );
        }
    }
}
