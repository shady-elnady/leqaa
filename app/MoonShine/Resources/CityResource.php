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
use Modules\A00Contact\Enums\ContinentsEnum;
use Modules\A00Contact\Models\City;
use MoonShine\Fields\Image;
use MoonShine\Fields\Json;
use MoonShine\Fields\Text;
use MoonShine\Fields\Select;
use MoonShine\ActionButtons\ActionButton;
use MoonShine\Fields\Enum;
use MoonShine\Fields\Relationships\BelongsTo;

/**
 * @extends ModelResource<City>
 */
class CityResource extends ModelResource
{
    protected string $model = City::class;

    protected string $title = 'Cities';

    /**
     * @return list<Field>
     */
    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Name')->nullable(),
            BelongsTo::make('Governorate', 'governorate', 'name', resource: new CurrencyResource()),
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
            BelongsTo::make('Governorate', 'governorate', 'name', resource: new CurrencyResource()),
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
            BelongsTo::make('Governorate', 'governorate', 'name', resource: new CurrencyResource()),
            Block::make(
                'Translations',
                [
                    Json::make('Translations', 'translations')->keyValue('Locale', 'Translation'),
                ]
            ),
        ];
    }


    /**
     * @param City $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
