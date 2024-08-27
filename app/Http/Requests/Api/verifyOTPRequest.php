<?php

namespace App\Http\Requests\Api;

use App\Enums\UserTypesEnum;
use App\Rules\ValidPhoneLengthRule;
use Core\Requests\BaseApiFormRequest;
// use Illuminate\Foundation\Http\FormRequest;

class VerifyOTPRequest extends BaseApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'digits:4'],
            'account_type' => ['required', 'in:' . implode(',', UserTypesEnum::getValues())],
            'mobile' => [
                'required',
                'string',
                // new ValidPhoneLengthRule($this->input('country_id')),
            ]
        ];
    }
}
