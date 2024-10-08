<?php

namespace Modules\D00Organization\Models;

use Core\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\D00Organization\Database\Factories\OrganizationFactory;
use Modules\D00Organization\Enums\OrganizationTypesEnum;
use Modules\E00Event\Models\Event;

class Organization extends BaseModel
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "{$this->base_dir}_organizations";
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'logo',
        'affiliated_to',
        'organization_type',
    ];

    protected $casts = [
        'organization_type' => OrganizationTypesEnum::class,
    ];

    public function affiliatedTo(): BelongsTo // منتمي إلى
    {
        return $this->belongsTo(Organization::class, 'affiliated_to');
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    protected static function newFactory(): OrganizationFactory
    {
        //return OrganizationFactory::new();
    }
}
