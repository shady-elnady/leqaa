<?php

namespace App\Models;

use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\E00Event\Models\Event;

class Category extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'categories';
    }

    protected $fillable = [
        'translations',
        'image',
    ];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
