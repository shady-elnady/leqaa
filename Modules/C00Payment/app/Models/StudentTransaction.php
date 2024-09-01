<?php

namespace Modules\C00Payment\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Core\Models\BaseModel;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\B00User\Models\Student;
use Modules\C00Payment\Enums\FinancialMovementTypesEnum;
use Modules\F00Reservation\Models\Reservation;

class StudentTransaction extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_student_transactions";
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'student_id',
        'reservation_id',
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

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function reservation(): BelongsTo
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
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
