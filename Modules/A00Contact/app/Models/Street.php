<?php

namespace Modules\A00Contact\Models;

use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\A00Contact\Database\Factories\StreetFactory;

class Street extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_streets";
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'state_id',
        'translations',
    ];

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    protected static function newFactory(): StreetFactory
    {
        //return StreetFactory::new();
    }
}
