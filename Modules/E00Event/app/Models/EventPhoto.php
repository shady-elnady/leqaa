<?php

namespace Modules\E00Event\Models;

use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\E00Event\Database\Factories\EventPhotoFactory;

class EventPhoto extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_event_photos";
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'event_id',
        'image',
        'order',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    // protected static function newFactory(): EventPhotoFactory
    // {
    //     //return EventPhotoFactory::new();
    // }
}
