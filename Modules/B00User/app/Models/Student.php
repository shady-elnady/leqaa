<?php

namespace Modules\B00User\Models;

use App\Models\Category;
use Core\Models\BaseUserModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Modules\B00User\Database\Factories\StudentFactory;
use Modules\C00Payment\Models\StudentTransaction;
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
        'birth_date',
        'university_number',
        'is_graduate',
    ];


    public function questions(): HasMany
    {
        return $this->hasMany(Faq::class);
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function interests(): HasManyThrough
    {
        return $this->hasManyThrough(Category::class, Interest::class);
    }

    protected static function newFactory(): StudentFactory
    {
        return StudentFactory::new();
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(StudentTransaction::class);
    }
}
