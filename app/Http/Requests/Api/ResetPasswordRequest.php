<?php

namespace App\Http\Requests\Api;

use Core\Requests\BaseApiFormRequest;
// use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends BaseApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'new_password' => ['required', 'string', 'min:4', 'confirmed'],
        ];
    }
}
