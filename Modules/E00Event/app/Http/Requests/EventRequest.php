<?php

namespace Modules\E00Event\Http\Requests;

use App\Rules\CapitalzeCase;
use Core\Requests\BaseApiFormRequest;
// use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use App\Rules\Uppercase;
use Modules\E00Event\Enums\EventPaidStatusEnum;

class EventRequest extends BaseApiFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        // https://laravel.com/docs/11.x/validation
        return [
            // 'title' => ['required', 'string', new Uppercase],
            'title' => ['required', 'string', new CapitalzeCase],
            'hall' => 'required',
            'event_paid_status' => ['required', Rule::enum(EventPaidStatusEnum::class)],
            'university_id' => 'required',
            'college_id' => 'nullable',
            'organizer_id' => 'nullable',
            'description' => 'required',
            'Lecturer_id' => 'nullable',
            'lecturer_Financial_dues' => 'nullable',
            'lecturer_financial_system' => 'required',
            'event_type_id' => 'required',
            'category_id' => 'required',
            'image' => ['nullable', 'extensions:jpg,png'],
            // 'image' => [
            //     ...$this->isPrecognitive() ? [] : ['nullable'],
            //     'image',
            //     'mimes:jpg,png',
            //     'extensions:jpg,png',
            //     'dimensions:ratio=3/2',
            // ],
            'event_status' => 'required',
            'start_date_time' => 'nullable',
            // 'name' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255|unique:customers,email,' . $id,
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
/*

'title' => 'required|unique:posts|max:255',

$validatedData = $request->validate([
    'title' => ['required', 'unique:posts', 'max:255'],
    'body' => ['required'],
]);


'user_id' => 'exists:App\Models\User,id'

'mimetypes:video/avi,video/mpeg,video/quicktime'

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

Validator::make($request->all(), [
    'role_id' => Rule::prohibitedIf($request->user()->is_admin),
]);

Validator::make($request->all(), [
    'role_id' => Rule::prohibitedIf(fn () => $request->user()->is_admin),
]);

'rate' => ['nullable', 'decimal:2,4'],

'comment' => ['nullable', 'string'],

'timezone' => 'required|timezone:all';

'timezone' => 'required|timezone:Africa';

'timezone' => 'required|timezone:per_country,US';


'email' => 'unique:App\Models\User,email_address'



$validator = Validator::make($data, [
    'email' => 'sometimes|required|email',
]);


*/
