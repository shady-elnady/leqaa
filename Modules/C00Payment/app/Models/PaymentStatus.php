<?php

namespace Modules\C00Payment\Models;

use App\Traits\HasTrans;
use App\Traits\HasUuid;
use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\C00Payment\Enums\PaymentStatusEnum;
use Modules\s01Warehousing\Database\Factories\PaymentStatusFactory;

class PaymentStatus extends BaseModel
{
    use HasFactory, HasUuid, HasTrans;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'payment_status',
        'translations',

    ];

    protected $casts = [
        'payment_status' => PaymentStatusEnum::class,
        'translations' => 'array',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_payment_statuses";
    }

    /**
     * hasMany
     */

    /**
     * Attributes
     *
     */
}
