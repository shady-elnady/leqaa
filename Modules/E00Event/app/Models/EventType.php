<?php

namespace Modules\E00Event\Models;

use App\Models\Locale;
use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'image',
        'translations',
    ];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function locale(): BelongsTo
    {
        return $this->belongsTo(Locale::class);
    }
}
