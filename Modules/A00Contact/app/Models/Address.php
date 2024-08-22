<?php

namespace Modules\A00Contact\Models;

use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\A00Contact\Database\Factories\AddressFactory;

class Address extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_addresses";
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'street_id',
        'locality_id',
        'details',
        'translations',
    ];

    public function street(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Street::class, 'street_id');
    }

    public function locality(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Locality::class, 'locality_id');
    }

    public function streets(): HasMany
    {
        return $this->hasMany(Street::class);
    }

    protected static function newFactory(): AddressFactory
    {
        //return AddressFactory::new();
    }
}
