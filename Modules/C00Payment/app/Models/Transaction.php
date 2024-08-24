<?php

namespace Modules\C00Payment\Models;

use App\Models\Currency;
use App\Models\User;
use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\C00Payment\Database\Factories\TransactionFactory;
use Modules\C00Payment\Enums\FinancialMovementTypesEnum;

class Transaction extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_transactions";
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'payment_status_id',
        'amount',
        'total_required_amount',
        'payment_method_id',
        'remaining_amount',
        'due_date',
        'notified_days',
        'reference_number',
        'bank_deposit_date',
        'bank_name',
        'comments',
        'financial_transaction_type',
        'currency_id',
    ];

    protected $casts = [
        'financial_transaction_type' => FinancialMovementTypesEnum::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function paymentStatus(): BelongsTo
    {
        return $this->belongsTo(PaymentStatus::class, 'payment_status_id');
    }

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    // public function transactions(): HasMany
    // {
    //     return $this->hasMany(Transaction::class);
    // }

    // protected static function newFactory(): TransactionFactory
    // {
    //     //return TransactionFactory::new();
    // }
}
