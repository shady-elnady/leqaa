<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ResendOTPRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        if (!$this->has('country_id')) {
            $this->merge(['country_id' => null]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'country_id' => ['required', 'exists:lkp_countries,id'],
            'phone' => ['required', 'string'],
        ];
    }

    protected function withValidator(Validator $validator)
    {
        $validator->sometimes('phone', [
            // new ValidPhoneLengthRule($this->input('country_id')),
        ], function ($input) {
            return $input->country_id !== null;
        });
    }
}
