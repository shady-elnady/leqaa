<?php

namespace Modules\A00Contact\Models;

use App\Models\Currency;
use App\Models\Language as LanguageModel;
use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Http;
use Modules\A00Contact\Enums\ContinentsEnum;

class Country extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_countries";
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'image',
        'continent',
        'country_code',
        'flag_emoji',
        'tel_code',
        'timezone',
        'currency_id',
        'language_id',
        'mobile_number_length',
        'phone_number_length',
        'translations',
    ];

    protected $casts = [
        'continent' => ContinentsEnum::class,
        'translations' => 'array',
    ];

    // https://laraveldaily.com/lesson/laravel-user-timezones/user-timezone-in-registration
    public static function guessUserTimezoneUsingAPI($ip)
    {
        $ip = Http::get('https://ipecho.net/' . $ip . '/json');
        if ($ip->json('timezone')) {
            return $ip->json('timezone');
        }
        return null;
    }

    public function currency(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function language(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(LanguageModel::class, 'language_id');
    }

    public function governorates(): HasMany
    {
        return $this->hasMany(Governorate::class);
    }

    // function getDisplayFlagEmojiiAttribute(): string
    // {
    //     return html_entity_decode('&#x1F1EA;');
    //     // return preg_replace_callback(
    //     //     '/./',
    //     //     static fn(array $m) => chr(ord($m[0]) + 0x1F1A5),
    //     //     strtoupper($this->flag_emoji)
    //     // );
    // }

    // protected static function newFactory(): CountryFactory
    // {
    //     //return CountryFactory::new();
    // }
}
