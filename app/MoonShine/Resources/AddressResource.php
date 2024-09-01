<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use App\Models\Locale;
use Modules\A00Contact\Models\Address;
use MoonShine\Fields\Json;
use MoonShine\Fields\Text;
use MoonShine\Fields\Select;
use MoonShine\ActionButtons\ActionButton;
use MoonShine\Fields\Relationships\BelongsTo;

/**
 * @extends ModelResource<Address>
 */
class AddressResource extends ModelResource
{
    protected string $model = Address::class;

    protected string $title = 'Addresses';

    /**
     * @return list<Field>
     */
    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Name')->nullable(),
            BelongsTo::make('Street', 'street', 'name', resource: new StreetResource()),
            BelongsTo::make('Locality', 'locality', 'name',  resource: new LocalityResource()),

        ];
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function formFields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Name')->nullable(),
            BelongsTo::make('Street', 'street', 'name', resource: new StreetResource()),
            BelongsTo::make('Locality', 'locality', 'name',  resource: new LocalityResource()),
            Block::make(
                'Translations',
                [
                    Json::make(null, 'translations')->keyValue(
                        keyField: Select::make('Locale', 'locale')->options(Locale::select('locale_code')->get()->mapWithKeys(function (Locale $locale) {
                            return [$locale['locale_code'] => $locale['locale_code']];
                        })->toArray()),
                        valueField: Text::make('Translation')->required(),
                    )->creatable(
                        limit: 5,
                        button: ActionButton::make('Add New Translation', '#')->success()->icon('heroicons.outline.plus')->customAttributes(['class' => 'btn-lg']),
                    )
                        ->removable(),
                ]
            ),
            Json::make('Details', 'details')->keyValue(
                keyField: Select::make('Locale', 'locale')->options(Locale::select('locale_code')->get()->mapWithKeys(function (Locale $locale) {
                    return [$locale['locale_code'] => $locale['locale_code']];
                })->toArray()),
                valueField: Text::make('Translation')->required(),
            )
                ->creatable(
                    limit: 5,
                    button: ActionButton::make('Add New Translation', '#')->success()->icon('heroicons.outline.plus')->customAttributes(['class' => 'btn-lg'])
                )
                ->removable(),
        ];
    }

    /**
     * @return list<Field>
     */
    public function detailFields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Name')->nullable(),
            BelongsTo::make('Street', 'street', 'name', resource: new StreetResource()),
            BelongsTo::make('Locality', 'locality', 'name',  resource: new LocalityResource()),
            Block::make(
                'Translations',
                [
                    Json::make('Translations', 'translations')->keyValue('Locale', 'Translation'),
                ]
            ),
            Json::make('Details', 'details')->keyValue(),
        ];
    }


    /**
     * @param Address $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
