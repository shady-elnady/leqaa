<?php

namespace Modules\A00Contact\Models;

use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\A00Contact\Database\Factories\LocalityFactory;

class Locality extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_localities";
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'state_id',
        'translations',
        //   'geo_location',
    ];


    public function state(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function streets(): HasMany
    {
        return $this->hasMany(Street::class);
    }


    protected static function newFactory(): LocalityFactory
    {
        //return LocalityFactory::new();
    }
}
