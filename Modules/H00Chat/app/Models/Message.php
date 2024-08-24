<?php

namespace Modules\H00Chat\Models;

use App\Models\User;
use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\H00Chat\Database\Factories\MessageFactory;
use Modules\H00Chat\Enums\DeleteMessagesTypesEnum;
use Modules\H00Chat\Enums\MessagesTypesEnum;

class Message extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_messages";
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'room_id',
        'message_type',
        'message',
        'lat',
        'lng',
        'is_seen',
        'delete_message_type',
    ];

    protected $casts = [
        'message_type' => MessagesTypesEnum::class,
        'delete_message_type' => DeleteMessagesTypesEnum::class,
    ];



    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function messageFiles(): HasMany
    {
        return $this->hasMany(MessageFile::class);
    }

    // protected static function newFactory(): MessageFactory
    // {
    //     //return MessageFactory::new();
    // }
}
