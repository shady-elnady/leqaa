<?php

namespace Modules\H00Chat\Http\Requests;

use Core\Requests\BaseApiFormRequest;
use Illuminate\Validation\Rule;
use Modules\H00Chat\Enums\UserRanksEnum;

// use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends BaseApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'unique:Modules\H00Chat\Models\Room,title', 'max:255'],
            'userable' => ['nullable', 'exists:App\Models\User,id'],
            'user_rank' => ['nullable', Rule::enum(UserRanksEnum::class)],
            'is_private' => 'boolean',
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
