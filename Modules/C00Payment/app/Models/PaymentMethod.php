<?php

namespace Modules\C00Payment\Models;

use App\Traits\HasTrans;
use App\Traits\HasUuid;
use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\C00Payment\Enums\PaymentMethodsEnum;

class PaymentMethod extends BaseModel
{

    use HasFactory, HasUuid, HasTrans;

    protected $fillable = [
        'payment_method',
        'translations',
    ];

    protected $casts = [
        'payment_method' => PaymentMethodsEnum::class,
        'translations' => 'array',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_payment_methods";
    }
}
