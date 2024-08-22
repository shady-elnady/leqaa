<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\A00Contact\Models\Country;

class Language extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'languages';
    }

    protected $fillable = [
        'native_name',
        'language_iso_code',
        'is_bidirectional',
    ];

    /**
     * has Many Relations Ship
     */
    public function countries(): HasMany
    {
        return $this->hasMany(Country::class);
    }
}
