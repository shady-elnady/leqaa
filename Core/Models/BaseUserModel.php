<?php

namespace Core\Models;

use App\Traits\HasTrans;
use App\Traits\HasUuid;
use Carbon\Carbon;
use Core\Traits\ModuleTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\Access\Authorizable;


class BaseUserModel extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use HasFactory, HasUuid, HasTrans, Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail;
    use ModuleTrait;

    protected string $base_dir;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->base_dir = strtolower($this->getModuleName());
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Date functions
     */
    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->format('M d, Y h:i a');
    }

    public function getFormattedLastUpdatedAttribute()
    {
        return Carbon::parse($this->last_updated)->format('M d, Y h:i a');
    }

    public function getFormattedEmailVerifiedAtAttribute()
    {
        return Carbon::parse($this->email_verified_at)->format('M d, Y h:i a');
    }

    public function getFormattedMobileVerifiedAtAttribute()
    {
        return Carbon::parse($this->mobile_verified_at)->format('M d, Y h:i a');
    }

    public function getFormattedLastLoginAttribute()
    {
        return Carbon::parse($this->last_login)->format('M d, Y h:i a');
    }
}
