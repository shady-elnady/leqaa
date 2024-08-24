<?php

namespace Modules\A00Contact\Models;

use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\A00Contact\Database\Factories\StateFactory;
use Modules\A00Contact\Enums\StateTypesEnum;

class State extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_states";
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        "postal_code",
        "state_type",
        "city_id",
        "translations",
        //   'geo_location',
    ];

    protected $casts = [
        'state_type' => StateTypesEnum::class,
        'translations' => 'array',
    ];

    public function city(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Governorate::class, 'city_id');
    }

    public function localities(): HasMany
    {
        return $this->hasMany(Locality::class);
    }

    // protected static function newFactory(): StateFactory
    // {
    //     //return StateFactory::new();
    // }
}
