<?php

namespace Modules\F00Reservation\Http\Requests;

use Core\Requests\BaseApiFormRequest;
use Illuminate\Validation\Rule;
use Modules\F00Reservation\Enums\ReservationStatusEnum;

// use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends BaseApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'event_id' => ['required', 'exists:Modules\E00Event\Models\Event,id'],
            'student_id' => ['required', 'exists:Modules\B00User\Models\Student,id'],
            'reservation_status' => ['required', Rule::enum(ReservationStatusEnum::class)],
            'canceled_reason' => ['nullable', 'string'],
            'rate' => ['nullable', 'decimal:0,5'],
            'comment' => ['nullable', 'string'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
