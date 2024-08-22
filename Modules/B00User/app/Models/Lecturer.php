<?php

namespace Modules\B00User\Models;

use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\B00User\Database\Factories\LecturerFactory;
use Modules\E00Event\Models\Event;
use Modules\H00Chat\Models\Faq;

class Lecturer extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_lecturers";
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'mobile',
        'password',
        'avatar',
        'is_active',
        'is_blocked',
        'gender',
        'email_verified_at',
        'mobile_verified_at',
        'last_login',
        'contact_info',
        'remember_token',
    ];

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
        //return LecturerFactory::new();
    }
}
