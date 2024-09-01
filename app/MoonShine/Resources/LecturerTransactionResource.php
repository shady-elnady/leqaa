<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use Modules\C00Payment\Models\LecturerTransaction;
use MoonShine\Resources\ModelResource;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Fields\Text;
use MoonShine\Fields\Number;
use MoonShine\Fields\Date;
use MoonShine\Fields\TextArea;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<LecturerTransaction>
 */
class LecturerTransactionResource extends ModelResource
{
    protected string $model = LecturerTransaction::class;

    protected string $title = 'LecturerTransactions';

    /**
     * @return list<Field>
     */
    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Lecturer', 'lecturer', 'name', resource: new LecturerResource()),
            BelongsTo::make('Event', 'event', 'title', resource: new EventResource()),
            BelongsTo::make('Payment Status', 'paymentStatus', 'name', resource: new PaymentStatusResource()),
            BelongsTo::make('Payment Method', 'paymentMethod', 'name', resource: new PaymentMethodResource()),
            BelongsTo::make('Currency', 'currency', 'name', resource: new CurrencyResource()),
            Number::make('Amount'),
            Number::make('Required Amount', 'total_required_amount'),
            Number::make('Remaining Amount')->default(0),
            Number::make('Notified Days', 'notified_days')->nullable(),
            Text::make('Reference Number')->nullable(),
            Date::make('Due Date')->nullable(),
            Date::make('bank_deposit_date', 'bank_deposit_date')->nullable(),
            Text::make('Bank Name', 'bank_name')->nullable(),
            TextArea::make('Comments')->nullable(),
        ];
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function formFields(): array
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Lecturer', 'lecturer', 'name', resource: new LecturerResource()),
            BelongsTo::make('Event', 'event', 'title', resource: new EventResource()),
            BelongsTo::make('Payment Status', 'paymentStatus', 'name', resource: new PaymentStatusResource()),
            BelongsTo::make('Payment Method', 'paymentMethod', 'name', resource: new PaymentMethodResource()),
            BelongsTo::make('Currency', 'currency', 'name', resource: new CurrencyResource()),
            Number::make('Amount'),
            Number::make('Required Amount', 'total_required_amount'),
            Number::make('Remaining Amount')->default(0),
            Number::make('Notified Days', 'notified_days')->nullable(),
            Text::make('Reference Number')->nullable(),
            Date::make('Due Date')->nullable(),
            Date::make('bank_deposit_date', 'bank_deposit_date')->nullable(),
            Text::make('Bank Name', 'bank_name')->nullable(),
            TextArea::make('Comments')->nullable(),
        ];
    }

    /**
     * @return list<Field>
     */
    public function detailFields(): array
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Lecturer', 'lecturer', 'name', resource: new LecturerResource()),
            BelongsTo::make('Event', 'event', 'title', resource: new EventResource()),
            BelongsTo::make('Payment Status', 'paymentStatus', 'name', resource: new PaymentStatusResource()),
            BelongsTo::make('Payment Method', 'paymentMethod', 'name', resource: new PaymentMethodResource()),
            BelongsTo::make('Currency', 'currency', 'name', resource: new CurrencyResource()),
            Number::make('Amount'),
            Number::make('Required Amount', 'total_required_amount'),
            Number::make('Remaining Amount')->default(0),
            Number::make('Notified Days', 'notified_days')->nullable(),
            Text::make('Reference Number')->nullable(),
            Date::make('Due Date')->nullable(),
            Date::make('bank_deposit_date', 'bank_deposit_date')->nullable(),
            Text::make('Bank Name', 'bank_name')->nullable(),
            TextArea::make('Comments')->nullable(),
        ];
    }

    /**
     * @param LecturerTransaction $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
