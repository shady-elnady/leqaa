<?php

namespace Core\Models;

use App\Traits\HasTrans;
use App\Traits\HasUuid;
use Carbon\Carbon;
use Core\Traits\ModuleTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public static function booted()
    {
        static::addGlobalScope('translations', function (Builder $builder) {
            if (
                in_array(
                    'translations',
                    array_merge(
                        $builder->getModel()->getFillable(),
                    )
                )
            ) {
                $builder->getModel()->translations[app()->getLocale()];
            }
            // if (method_exists($builder->getModel(), 'translations')) {
            //     // $builder->with(['translations' => function ($query) {
            //     //     return $query->whereHas('locale', function ($q) {
            //     //         // dd(app()->getLocale());
            //     //         $q->where('language_code', app()->getLocale());
            //     //     });
            //     // }]);
            // }
        });
    }

    /**
     * Date functions
     */
    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->format('M d, Y h:i a');
    }

    public function getFormattedLastUpdatedAttribute()
    {
        return Carbon::parse($this->last_updated)->format('M d, Y h:i a');
    }

    public function getFormattedStartDateTimeAttribute()
    {
        return Carbon::parse($this->start_date_time)->format('M d, Y h:i a');
    }

    /**
     * Localization functions
     */
    public function name($locleCode)
    {
        if ($this->translations) {
            $this->translations[$locleCode];
        }
        return null;
    }
}
