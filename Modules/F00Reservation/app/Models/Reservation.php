<?php

namespace Modules\F00Reservation\Models;

use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\B00User\Models\Student;
use Modules\E00Event\Models\Event;
use Modules\F00Reservation\Database\Factories\ReservationFactory;
use Modules\F00Reservation\Enums\ReservationStatusEnum;

class Reservation extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_reservations";
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'event_id',
        'student_id',
        'reservation_status',
        'canceled_reason',
        'rate',
        'comment',
    ];

    protected $casts = [
        'reservation_status' => ReservationStatusEnum::class,
    ];


    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    protected static function newFactory(): ReservationFactory
    {
        //return ReservationFactory::new();
    }
}
