<?php

namespace Modules\H00Chat\Models;

use App\Models\User;
use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Modules\H00Chat\Database\Factories\RoomFactory;
use Modules\H00Chat\Enums\UserRanksEnum;

class Room extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_rooms";
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'userable',
        'user_rank',
        'is_private',
    ];

    protected $casts = [
        'user_rank' => UserRanksEnum::class,
    ];

    /**
     * Get the parent commentable model (post or video).
     */
    public function userable(): MorphTo
    {
        return $this->morphTo();
    }

    public function scopePrivate($query)
    {
        return $query->where('is_private', 1);
    }

    public function scopePublic($query)
    {
        return $query->where('is_private', 0);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    // protected static function newFactory(): RoomFactory
    // {
    //     //return RoomFactory::new();
    // }
}
