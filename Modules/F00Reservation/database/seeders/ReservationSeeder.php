<?php

namespace Modules\F00Reservation\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\F00Reservation\Enums\ReservationStatusEnum;
use Modules\F00Reservation\Models\Reservation;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reservations = [
            [
                'event_id' => 1,
                'student_id' => 1,
                'reservation_status' => ReservationStatusEnum::InitialzationReservations,
                'canceled_reason' => null,
                'rating' => 4,
                'comment' => 'comment',
            ],

        ];
        foreach ($reservations as $reservation) {
            Reservation::updateOrCreate(
                [
                    'event_id' => $reservation['event_id'],
                    'student_id' => $reservation['student_id'],
                    'reservation_status' => $reservation['reservation_status'],
                    'canceled_reason' => $reservation['canceled_reason'],
                    'rating' => $reservation['rating'],
                    'comment' => $reservation['comment'],
                ]
            );
        }
    }
}
