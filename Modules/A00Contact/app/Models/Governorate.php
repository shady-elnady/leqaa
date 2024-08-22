<?php

namespace Modules\A00Contact\Models;

use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\A00Contact\Database\Factories\GovernorateFactory;

class Governorate extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_governorates";
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        "governorate_tel_code",
        "country_id",
        "translations",
    ];


    public function country(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }


    protected static function newFactory(): GovernorateFactory
    {
        //return GovernorateFactory::new();
    }
}
