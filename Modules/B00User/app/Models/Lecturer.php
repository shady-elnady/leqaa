<?php

namespace Modules\B00User\Models;

use Core\Models\BaseUserModel;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\B00User\Database\Factories\LecturerFactory;
use Modules\C00Payment\Models\LecturerTransaction;
use Modules\E00Event\Models\Event;
use Modules\H00Chat\Models\Faq;

class Lecturer extends BaseUserModel
{
    // use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_lecturers";
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Faq::class);
    }

    protected static function newFactory(): LecturerFactory
    {
        return LecturerFactory::new();
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(LecturerTransaction::class);
    }
}
