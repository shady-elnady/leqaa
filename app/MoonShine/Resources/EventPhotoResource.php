<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use Modules\E00Event\Models\EventPhoto;
use MoonShine\Fields\Image;
use MoonShine\Fields\Text;
use MoonShine\Fields\Number;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Traits\Resource\ResourceWithParent;

/**
 * @extends ModelResource<EventPhoto>
 */
class EventPhotoResource extends ModelResource
{
    use ResourceWithParent;

    protected string $model = EventPhoto::class;

    protected string $title = 'Event Photos';

    protected function getParentResourceClassName(): string
    {
        return EventResource::class;
    }

    protected function getParentRelationName(): string
    {
        return 'event';
    }

    /**
     * @return list<Field>
     */
    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            Image::make('Image')->dir($this->title),
            Text::make('Event name', 'event_title')->nullable(),
            BelongsTo::make('Event', 'event', 'title', resource: new EventResource()),
            Number::make('Order')->default(1),
        ];
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function formFields(): array
    {
        return [
            ID::make()->sortable(),
            Image::make('Image')->dir($this->title),
            BelongsTo::make('Event', 'event', 'title', resource: new EventResource()),
            Number::make('Order')->default(1),
        ];
    }

    /**
     * @return list<Field>
     */
    public function detailFields(): array
    {
        return [
            ID::make()->sortable(),
            Image::make('Image')->dir($this->title),
            Text::make('Event name', 'event_title')->nullable(),
            BelongsTo::make('Event', 'event', 'title', resource: new EventResource()),
            Number::make('Order')->default(1),
        ];
    }


    /**
     * @param EventPhoto $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
