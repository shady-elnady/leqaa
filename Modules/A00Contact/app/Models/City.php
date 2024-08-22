<?php

namespace Modules\A00Contact\Models;

use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\A00Contact\Database\Factories\CityFactory;

class City extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_cities";
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        "governorate_id",
        "translations",
    ];

    public function governorate(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Governorate::class, 'governorate_id');
    }

    public function states(): HasMany
    {
        return $this->hasMany(State::class);
    }

    protected static function newFactory(): CityFactory
    {
        //return CitiyFactory::new();
    }
}
