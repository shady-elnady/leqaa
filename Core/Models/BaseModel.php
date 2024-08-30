<?php

namespace Core\Models;

use App\Traits\HasTrans;
use App\Traits\HasUuid;
use Carbon\Carbon;
use Core\Traits\ModuleTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class BaseModel extends Model
{
    use HasFactory, HasUuid, HasTrans;
    use ModuleTrait;
    protected string $base_dir;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->base_dir = strtolower($this->getModuleName());
    }

    protected $casts = [
        'translations' => 'array'
    ];

    /**
     * Date functions
     */
    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->format('M d, Y h:i a');
    }

    public function getFormattedUpdatedAtAttribute()
    {
        return Carbon::parse($this->updated_at)->format('M d, Y h:i a');
    }

    public function getFormattedStartDateTimeAttribute()
    {
        return Carbon::parse($this->start_date_time)->format('M d, Y h:i a');
    }

    /**
     * Localization functions
     */
    public function getNameAttribute(): ?string
    {
        return $this?->translations[App::currentLocale()] ?? null;
    }
}
