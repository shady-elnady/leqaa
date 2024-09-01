<?php

namespace Modules\C00Payment\Models;

use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\B00User\Models\Lecturer;
use Modules\C00Payment\Enums\FinancialMovementTypesEnum;
use Modules\E00Event\Models\Event;

class LecturerTransaction extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_lecturer_transactions";
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'lecturer_id',
        'event_id',
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

    public function lecturer(): BelongsTo
    {
        return $this->belongsTo(Lecturer::class, 'lecturer_id');
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id');
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
}
