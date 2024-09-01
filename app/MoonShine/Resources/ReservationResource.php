<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use Modules\F00Reservation\Enums\ReservationStatusEnum;
use Modules\F00Reservation\Models\Reservation;
use MoonShine\Fields\Number;
use MoonShine\Fields\TextArea;
use MoonShine\Fields\Enum;
use MoonShine\Fields\Relationships\BelongsTo;

/**
 * @extends ModelResource<Reservation>
 */
class ReservationResource extends ModelResource
{
    protected string $model = Reservation::class;

    protected string $title = 'Reservations';

    /**
     * @return list<Field>
     */
    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            Number::make('Rating')
                ->hint('From 0 to 10')
                ->stars()
                ->min(0)
                ->max(10)
                ->default(0),
            BelongsTo::make('Event', 'event', 'title', resource: new EventResource()),
            BelongsTo::make('Student', 'student', 'name', resource: new StudentResource()),
            Enum::make('Reservation Status', 'reservation_status')
                ->attach(ReservationStatusEnum::class),
        ];
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function formFields(): array
    {
        return [
            ID::make()->sortable(),
            Number::make('Rating')
                ->hint('From 0 to 10')
                ->stars()
                ->min(0)
                ->max(10)
                ->default(0),
            TextArea::make('Comment')->nullable(),
            TextArea::make('canceled_reason', 'canceled_reason')->nullable(),
            BelongsTo::make('Event', 'event', 'title', resource: new EventResource()),
            BelongsTo::make('Student', 'student', 'name', resource: new StudentResource()),
            Enum::make('Reservation Status', 'reservation_status')
                ->attach(ReservationStatusEnum::class),
        ];
    }

    /**
     * @return list<Field>
     */
    public function detailFields(): array
    {
        return [
            ID::make()->sortable(),
            Number::make('Rating')
                ->hint('From 0 to 10')
                ->stars()
                ->min(0)
                ->max(10)
                ->default(0),
            TextArea::make('Comment')->nullable(),
            TextArea::make('Canceled Reason', 'canceled_reason')->nullable(),
            BelongsTo::make('Event', 'event', 'title', resource: new EventResource()),
            BelongsTo::make('Student', 'student', 'complete_name', resource: new StudentResource()),
            Enum::make('Reservation Status', 'reservation_status')
                ->attach(ReservationStatusEnum::class),
        ];
    }


    /**
     * @param Reservation $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
