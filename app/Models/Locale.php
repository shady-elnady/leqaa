<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\A00Contact\Models\Country;
use Illuminate\Support\Str;

class Locale extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'locales';
    }

    protected $fillable = [
        'language_id',
        'country_id',
    ];

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function getLocaleCodeAttribute(): string
    {
        $language_code = Str::lower($this->language->language_iso_code);
        $country_code = Str::upper($this->country->country_code);
        return "{$language_code}_{$country_code}";
    }
}
