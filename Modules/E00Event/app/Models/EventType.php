<?php

namespace Modules\E00Event\Models;

use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\E00Event\Database\Factories\EventTypeFactory;

class EventType extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_event_types";
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'translations',
    ];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    protected static function newFactory(): EventTypeFactory
    {
        //return EventTypeFactory::new();
    }
}
