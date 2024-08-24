<?php

namespace Modules\D00Organization\Models;

use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\D00Organization\Database\Factories\OrganizationFactory;
use Modules\D00Organization\Enums\OrganizationTypesEnum;
use Modules\E00Event\Models\Event;

class College extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_colleges";
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'logo',
        'university_id',
        'translations',
    ];


    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class, 'university_to');
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    // protected static function newFactory(): OrganizationFactory
    // {
    //     //return OrganizationFactory::new();
    // }
}
