<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use MoonShine\Resources\ModelResource;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use Modules\B00User\Models\Interest;
use MoonShine\Fields\Number;
use MoonShine\Fields\Relationships\BelongsTo;

/**
 * @extends ModelResource<Interest>
 */
class InterestResource extends ModelResource
{
    protected string $model = Interest::class;

    protected string $title = 'Interests';

    /**
     * @return list<Field>
     */
    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Student', 'student', 'name', resource: new StudentResource()),
            BelongsTo::make('Category', 'category', 'name', resource: new CategoryResource()),
            Number::make('Order')
                ->hint('From 0 to 10')
                ->stars()
                ->min(1)
                ->max(10)
                ->default(1),
        ];
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function formFields(): array
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Student', 'student', 'name', resource: new StudentResource()),
            BelongsTo::make('Category', 'category', 'name', resource: new CategoryResource()),
            Number::make('Order')
                ->hint('From 0 to 10')
                ->stars()
                ->min(1)
                ->max(10)
                ->default(1),
        ];
    }

    /**
     * @return list<Field>
     */
    public function detailFields(): array
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Student', 'student', 'name', resource: new StudentResource()),
            BelongsTo::make('Category', 'category', 'name', resource: new CategoryResource()),
            Number::make('Order')
                ->hint('From 0 to 10')
                ->stars()
                ->min(1)
                ->max(10)
                ->default(1),
        ];
    }


    /**
     * @param Interest $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
