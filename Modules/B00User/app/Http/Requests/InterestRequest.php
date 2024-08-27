<?php

namespace Modules\B00User\Http\Requests;

use Core\Requests\BaseApiFormRequest;
use Illuminate\Validation\Rule;

// use Illuminate\Foundation\Http\FormRequest;

class InterestRequest extends BaseApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'student_id' => ['required', 'exists:Modules\B00User\Models\Student,id'],
            'category_id' => ['required', 'exists:App\Models\Category,id'],
            'order' => ['nullable', 'integer'],
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
