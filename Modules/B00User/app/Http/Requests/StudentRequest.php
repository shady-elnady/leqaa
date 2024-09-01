<?php

namespace Modules\B00User\Http\Requests;

use App\Enums\GendersEnum;
use App\Enums\TitlesEnum;
use Core\Requests\BaseApiFormRequest;
use Illuminate\Validation\Rule;
use Modules\B00User\Models\Student;

class StudentRequest extends BaseApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => ['nullable', Rule::enum(TitlesEnum::class)],
            'name' => ['string', 'unique:App\Models\User,name'],
            'avatar' => ['nullable', 'extensions:jpg,png', 'mimes:jpg,bmp,png'],
            'gender' => ['nullable', Rule::enum(GendersEnum::class)],
            'email' => ['required', 'email', Rule::unique(Student::class, 'email')->ignore($this->route()->student->id)],
            // 'email' => ['unique:App\Models\User,email'],
            'mobile' => ['string', 'unique:App\Models\User,mobile'],
            'password' => ['string', 'unique:App\Models\User,name'],
            'is_active' => ['nullable', 'boolean'],
            'is_blocked' => ['nullable', 'boolean'],
            'email_verified_at' => ['nullable', 'date'],
            'mobile_verified_at' => ['nullable', 'date'],
            'last_login' => ['nullable', 'date'],
            'contact_info' => ['nullable', 'json'],
            'birth_date' => ['nullable', 'date'],
            'university_number' => ['nullable', 'string'],
            'is_graduate' => ['boolean', 'json'],
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
