<?php

namespace Modules\G00Notification\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\G00Notification\Enums\NotificationStatusEnum;
use Modules\G00Notification\Models\Notification;

class G00NotificationDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $notifications = [s
        //     [
        //         'device_token' => '',
        //         'title' => '',
        //         'body' => '',
        //         'data' => '',
        //         'notification_status' => NotificationStatusEnum::InitialzationReservations,
        //         'error_message' => '',
        //     ],

        // ];
        // foreach ($notifications as $notification) {
        //     Notification::updateOrCreate(
        //         [
        //             'event_id' => $notification['event_id'],
        //             'student_id' => $notification['student_id'],
        //             'notification_status' => $notification['notification_status'],
        //             'canceled_reason' => $notification['canceled_reason'],
        //             'rate' => $notification['rate'],
        //             'comment' => $notification['comment'],
        //         ]
        //     );
        // }
    }
}
