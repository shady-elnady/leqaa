<?php

namespace Modules\H00Chat\Models;

use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\H00Chat\Database\Factories\MessageFileFactory;

class MessageFile extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_message_files";
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'message_id',
        'file_name',
        'file_path',
        'file_size',
        'file_size_unit',
        'file_extension',
        'mime_type',
    ];


    public function message(): BelongsTo
    {
        return $this->belongsTo(Message::class, 'message_id');
    }

    // public function messages(): HasMany
    // {
    //     return $this->hasMany(Message::class);
    // }

    // protected static function newFactory(): MessageFileFactory
    // {
    //     //return MessageFileFactory::new();
    // }
}
