<?php

namespace Core\Requests;

use Core\Traits\ModuleTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Http\FormRequest;

class BaseFormRequest extends FormRequest
{
    use HasFactory;
    use ModuleTrait;
    protected string $base_dir;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->base_dir = strtolower($this->getModuleName());
    }
}
