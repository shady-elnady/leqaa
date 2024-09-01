<?php

namespace Modules\D00Organization\Models;

use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class University extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_universities";
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'logo',
        'email',
        'translations',
    ];
}
