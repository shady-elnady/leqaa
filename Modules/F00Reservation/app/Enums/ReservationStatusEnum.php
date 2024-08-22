<?php

namespace Modules\F00Reservation\Enums;

enum ReservationStatusEnum: string
{
    case InitialzationReservations = 'InitialzationReservations';
    case CanceledReservation = 'CanceledReservation';
    case CompletedReservation = 'CompletedReservation';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function description(): string
    {
        return match ($this) {
            self::InitialzationReservations => 'InitialzationReservations',
            self::CanceledReservation => 'CanceledReservation',
            self::CompletedReservation => 'CompletedReservation',
        };
    }
}
