<?php

namespace Modules\B00User\Models;

use Core\Models\BaseUserModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\B00User\Database\Factories\StudentFactory;
use Modules\F00Reservation\Models\Reservation;
use Modules\H00Chat\Models\Faq;

class Student extends BaseUserModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_students";
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'avatar',
        'first_name',
        'last_name',
        'email',
        'mobile',
        'password',
        'is_active',
        'is_blocked',
        'gender',
        'email_verified_at',
        'mobile_verified_at',
        'last_login',
        'contact_info',
        'remember_token',
        'university_id',
        'college_id',
    ];


    public function questions(): HasMany
    {
        return $this->hasMany(Faq::class);
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    protected static function newFactory(): StudentFactory
    {
        return StudentFactory::new();
    }
}
