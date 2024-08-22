<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Core\Models\BaseModel;

class Setting extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'settings';
    }

    protected $fillable = [
        'locale_id',
        'currency_id',
        'theme',
    ];

    public function locale(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Locale::class, 'locale_id');
    }

    public function currency(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }
}
