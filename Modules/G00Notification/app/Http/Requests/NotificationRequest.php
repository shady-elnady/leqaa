<?php

namespace Modules\G00Notification\Http\Requests;

use Core\Requests\BaseApiFormRequest;
// use Illuminate\Foundation\Http\FormRequest;

class NotificationRequest extends BaseApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'image' => ['nullable', 'extensions:jpg,png', 'mimes:jpg,bmp,png'],
            'translations' => ['required', 'json'],
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
