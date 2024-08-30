<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use Modules\E00Event\Models\Event;
use MoonShine\Resources\ModelResource;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use Modules\E00Event\Enums\EventPaidStatusEnum;
use Modules\E00Event\Enums\EventStatusEnum;
use MoonShine\Fields\Text;
use MoonShine\Fields\Enum;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Date;

/**
 * @extends ModelResource<Event>
 */
class EventResource extends ModelResource
{
    protected string $model = Event::class;

    protected string $title = 'Events';

    /**
     * @return list<Field>
     */
    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Title'),
            Text::make('Image'),
            Text::make('Hall'),
            BelongsTo::make('Event Type', 'eventType', 'name', resource: new EventTypeResource())
                ->placeholder('Event Type')
                ->searchable()
                ->creatable(),
            Enum::make('Event Paid Status', 'event_paid_status')->attach(EventPaidStatusEnum::class),
            Enum::make('Event Status', 'event_status')->attach(EventStatusEnum::class),
            Date::make('Start Date', 'start_date_time')->nullable()->withTime(),
        ];
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function formFields(): array
    {
        return [
            ID::make()->sortable(),
        ];
    }

    /**
     * @return list<Field>
     */
    public function detailFields(): array
    {
        return [
            ID::make()->sortable(),
        ];
    }

    /**
     * @param Event $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
