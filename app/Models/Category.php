<?php

namespace App\Models;

use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Modules\B00User\Models\Interest;
use Modules\B00User\Models\Student;
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

    public function interests(): HasManyThrough
    {
        return $this->hasManyThrough(Student::class, Interest::class);
    }
}
