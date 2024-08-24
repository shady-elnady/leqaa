<?php

namespace App\Models;

use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Currency extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'currencies';
    }

    protected $fillable = [
        'iso_code',
        'symbol',
        'translations',
    ];
}
