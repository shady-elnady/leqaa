<?php

namespace Core\Requests;

use Core\Traits\ModuleTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class BaseApiFormRequest extends FormRequest
{
    use HasFactory;
    use ModuleTrait;
    protected string $base_dir;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->base_dir = strtolower($this->getModuleName());
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(
            [
                'success'   => false,
                'message'   => 'Data Validation errors',
                'errors'      => $validator->errors()
            ],
            422,
        ));
    }
}
