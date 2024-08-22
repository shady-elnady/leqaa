<?php

namespace Modules\G00Notification\Models;

use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\G00Notification\Database\Factories\NotificationFactory;
use Modules\G00Notification\Enums\NotificationStatusEnum;

class Notification extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_notifications";
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'device_token',
        'title',
        'body',
        'data',
        'notification_status',
        'error_message',
    ];


    protected $casts = [
        'notification_status' => NotificationStatusEnum::class,
    ];


    protected static function newFactory(): NotificationFactory
    {
        //return NotificationFactory::new();
    }
}
