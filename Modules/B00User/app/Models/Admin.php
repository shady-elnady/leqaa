<?php

namespace Modules\B00User\Models;

use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\B00User\Database\Factories\AdminFactory;

class Admin extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_admins";
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


    protected static function newFactory(): AdminFactory
    {
        //return AdminFactory::new();
    }
}
