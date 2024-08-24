<?php

namespace Modules\H00Chat\Models;

use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\B00User\Models\Lecturer;
use Modules\B00User\Models\Student;
use Modules\H00Chat\Database\Factories\FaqFactory;

class Faq extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_faqs";
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'questioner_id',
        'respondent_id',
        'question',
        'answer',
    ];

    public function questioner(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'questioner_id');
    }

    public function respondent(): BelongsTo
    {
        return $this->belongsTo(Lecturer::class, 'respondent_id');
    }

    // protected static function newFactory(): FaqFactory
    // {
    //     //return FaqFactory::new();
    // }
}
