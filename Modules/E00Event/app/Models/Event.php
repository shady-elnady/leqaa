<?php

namespace Modules\E00Event\Models;

use App\Models\Category;
use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\B00User\Models\Lecturer;
use Modules\D00Organization\Models\Organization;
use Modules\E00Event\Enums\EventPaidStatusEnum;
use Modules\E00Event\Enums\EventStatusEnum;
use Modules\E00Event\Enums\LecturerFinancialSystemEnum;

class Event extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_events";
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'hall',
        'event_paid_status',
        'university_id',
        'college_id',
        'organizer_id',
        'description',
        'Lecturer_id',
        'lecturer_Financial_dues',
        'lecturer_financial_system',
        'event_type_id',
        'category_id',
        'image',
        'event_status',
        'start_date_time',
    ];

    protected $casts = [
        'event_paid_status' => EventPaidStatusEnum::class,
        'lecturer_financial_system' => LecturerFinancialSystemEnum::class,
        'event_status' => EventStatusEnum::class,
    ];

    public function organizer(): BelongsTo
    {
        return $this->belongsTo(Organization::class, 'organizer_id');
    }

    public function Lecturer(): BelongsTo
    {
        return $this->belongsTo(Lecturer::class, 'Lecturer_id');
    }

    public function eventType(): BelongsTo
    {
        return $this->belongsTo(EventType::class, 'event_type_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function eventPhotos(): HasMany
    {
        return $this->hasMany(EventPhoto::class);
    }

    // public function reservations(): HasMany
    // {
    //     return $this->hasMany(Reservation::class);
    // }

    // protected static function newFactory(): EventFactory
    // {
    //     //return EventFactory::new();
    // }
}
