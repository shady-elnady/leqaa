<?php

namespace Modules\B00User\Models;

use App\Models\Category;
use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Interest extends BaseModel
{

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_interests";
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'student_id',
        'category_id',
        'order',
    ];


    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
