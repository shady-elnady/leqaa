<?php

namespace App\Http\Requests\Api;

use App\Enums\UserTypesEnum;
use App\Rules\ValidPhoneLengthRule;
use Illuminate\Foundation\Http\FormRequest;

class verifyOTPRequest extends FormRequest
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
            'country_id' => ['required', 'exists:lkp_countries,id'],
            'phone' => [
                'required',
                'string',
                // new ValidPhoneLengthRule($this->input('country_id')),
            ]
        ];
    }
}
