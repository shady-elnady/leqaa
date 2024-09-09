<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use Modules\E00Event\Models\Event;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Fields\Text;
use MoonShine\Fields\Number;
use MoonShine\Fields\TextArea;
use MoonShine\Fields\Date;
use MoonShine\Fields\Enum;
use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Components\MoonShineComponent;
use Modules\E00Event\Enums\EventPaidStatusEnum;
use Modules\E00Event\Enums\EventStatusEnum;
use Modules\E00Event\Enums\LecturerFinancialSystemEnum;
use MoonShine\Fields\Relationships\HasMany;
use MoonShine\ActionButtons\ActionButton;
use MoonShine\Metrics\ValueMetric;
use MoonShine\QueryTags\QueryTag;
use Illuminate\Database\Eloquent\Builder;

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
            Image::make('Image')->dir($this->title),
            Text::make('Hall'),
            BelongsTo::make('Event Type', 'eventType', 'name', resource: new EventTypeResource())
                ->placeholder('Event Type')
                ->searchable()
                ->creatable(),
            BelongsTo::make('Category', 'category', 'name', resource: new CategoryResource())
                ->placeholder('Category')
                ->searchable()
                ->creatable(),
            BelongsTo::make('Lecturer', 'lecturer', 'name', resource: new LecturerResource())
                ->placeholder('Lecturer')
                ->searchable()
                ->creatable(),
            BelongsTo::make('University', 'university', 'name', resource: new UniversityResource())
                ->placeholder('University')
                ->searchable()
                ->creatable(),
            BelongsTo::make('College', 'college', 'name', resource: new CollegeResource())
                ->placeholder('College')
                ->searchable()
                ->creatable(),
            BelongsTo::make('Organizer', 'organizer', 'name', resource: new OrganizationResource())
                ->placeholder('Organizer')
                ->searchable()
                ->creatable(),
            Number::make('Lecturer Financial Dues', 'lecturer_Financial_dues')->nullable(),
            Enum::make('Lecturer Financial System', 'lecturer_financial_system')->attach(LecturerFinancialSystemEnum::class),
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
            Text::make('Title'),
            Image::make('Image')->dir($this->title),
            Text::make('Hall'),
            BelongsTo::make('Event Type', 'eventType', 'name', resource: new EventTypeResource())
                ->placeholder('Event Type')
                ->searchable()
                ->creatable(),
            BelongsTo::make('Category', 'category', 'name', resource: new CategoryResource())
                ->placeholder('Category')
                ->searchable()
                ->creatable(),
            BelongsTo::make('Lecturer', 'lecturer', 'name', resource: new LecturerResource())
                ->placeholder('Lecturer')
                ->searchable()
                ->creatable(),
            BelongsTo::make('University', 'university', 'name', resource: new UniversityResource())
                ->placeholder('University')
                ->searchable()
                ->creatable(),
            BelongsTo::make('College', 'college', 'name', resource: new CollegeResource())
                ->placeholder('College')
                ->customAttributes([
                    'data-search-result-limit' => 5
                ])
                ->creatable(
                    button: ActionButton::make('New', '#')
                        ->success()
                        ->showInLine(),
                ),
            BelongsTo::make('Organizer', 'organizer', 'name', resource: new OrganizationResource())
                ->placeholder('Organizer')
                ->searchable()
                ->creatable(),
            TextArea::make('Description'),
            Number::make('Lecturer Financial Dues', 'lecturer_Financial_dues')->nullable(),
            Enum::make('Lecturer Financial System', 'lecturer_financial_system')->attach(LecturerFinancialSystemEnum::class),
            Enum::make('Event Paid Status', 'event_paid_status')->attach(EventPaidStatusEnum::class),
            Enum::make('Event Status', 'event_status')->attach(EventStatusEnum::class),
            Date::make('Start Date', 'start_date_time')->nullable()->withTime(),
        ];
    }

    /**
     * @return list<Field>
     */
    public function detailFields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Title'),
            Image::make('Image')->dir($this->title),
            Text::make('Hall'),
            BelongsTo::make('Event Type', 'eventType', 'name', resource: new EventTypeResource())
                ->placeholder('Event Type')
                ->searchable()
                ->creatable(),
            BelongsTo::make('Category', 'category', 'name', resource: new CategoryResource())
                ->placeholder('Category')
                ->searchable()
                ->creatable(),
            BelongsTo::make('Lecturer', 'lecturer', 'name', resource: new LecturerResource())
                ->placeholder('Lecturer')
                ->searchable()
                ->creatable(),
            BelongsTo::make('University', 'university', 'name', resource: new UniversityResource())
                ->placeholder('University')
                ->searchable()
                ->creatable(),
            BelongsTo::make('College', 'college', 'name', resource: new CollegeResource())
                ->placeholder('College')
                ->searchable()
                ->creatable(),
            BelongsTo::make('Organizer', 'organizer', 'name', resource: new OrganizationResource())
                ->placeholder('Organizer')
                ->searchable()
                ->creatable(),
            TextArea::make('Description'),
            Number::make('Lecturer Financial Dues', 'lecturer_Financial_dues')->nullable(),
            Enum::make('Lecturer Financial System', 'lecturer_financial_system')->attach(LecturerFinancialSystemEnum::class),
            Enum::make('Event Paid Status', 'event_paid_status')->attach(EventPaidStatusEnum::class),
            Enum::make('Event Status', 'event_status')->attach(EventStatusEnum::class),
            Date::make('Start Date', 'start_date_time')->nullable()->withTime(),
        ];
    }

    public function metrics(): array
    {
        return [
            ValueMetric::make('Events')
                ->value(Event::count()),
        ];
    }

    public function queryTags(): array
    {
        return [
            QueryTag::make(
                'Event Type 1', // Tag Title
                fn(Builder $query) => $query->where('event_type_id', 1) // Query builder
            ),
            QueryTag::make(
                'Event Type', // Tag Title
                fn(Builder $query) => $query->where('event_type_id', 2) // Query builder
            )
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
