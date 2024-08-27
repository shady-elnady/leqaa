<?php

namespace Modules\E00Event\Http\Requests;

use Core\Requests\BaseApiFormRequest;

// use Illuminate\Foundation\Http\FormRequest;

class EventPhotoRequest extends BaseApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'event_id' => ['required', 'exists:Modules\E00Event\Models\Event,id'],
            'image' => ['nullable', 'extensions:jpg,png', 'mimes:jpg,bmp,png'],
            'order' => ['nullable', 'integer|size:50'],
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
