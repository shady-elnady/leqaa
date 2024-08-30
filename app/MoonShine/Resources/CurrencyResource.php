<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Currency;
use App\Models\Locale;
use MoonShine\Resources\ModelResource;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Fields\Text;
use MoonShine\Fields\Json;
use MoonShine\Fields\Select;
use MoonShine\ActionButtons\ActionButton;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Currency>
 */
class CurrencyResource extends ModelResource
{
    protected string $model = Currency::class;

    protected string $title = 'Currencies';

    /**
     * @return list<Field>
     */
    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Name')->nullable(),
            Text::make('iso_code')->unique(),
            Text::make('symbol')->nullable(),
        ];
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function formFields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('iso_code')->unique(),
            Text::make('symbol')->nullable(),
            Json::make('Translations', 'translations')->keyValue(
                keyField: Select::make('Locale', 'locale')->options(Locale::select('locale_code')->get()->mapWithKeys(function (Locale $locale) {
                    return [$locale->locale_language_name => $locale['locale_code']];
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
            Text::make('iso_code')->unique(),
            Text::make('symbol')->nullable(),
            Json::make('Translations', 'translations')->keyValue('Locale', 'Translation'),
        ];
    }

    /**
     * @param Currency $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
