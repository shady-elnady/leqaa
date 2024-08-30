<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use Modules\A00Contact\Models\Country;
use MoonShine\Resources\ModelResource;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use App\Models\Locale;
use Modules\A00Contact\Enums\ContinentsEnum;
use MoonShine\Fields\Image;
use MoonShine\Fields\Json;
use MoonShine\Fields\Text;
use MoonShine\Fields\Select;
use MoonShine\ActionButtons\ActionButton;
use MoonShine\Fields\Enum;
use MoonShine\Fields\Relationships\BelongsTo;

/**
 * @extends ModelResource<Country>
 */
class CountryResource extends ModelResource
{
    protected string $model = Country::class;

    protected string $title = 'Countries';

    /**
     * @return list<Field>
     */
    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            Image::make('Image'),
            Text::make('Name')->nullable(),
            Text::make('Country Code'),
            Text::make('Tel Code'),
            Text::make('Mobile Number Length'),
            Text::make('Phone Number Length'),
            Text::make('Timezone'),
            BelongsTo::make('Currency', 'currency', resource: new CurrencyResource()),
            BelongsTo::make('Language', 'language', resource: new LanguageResource()),
            Enum::make('Continent')
                ->attach(ContinentsEnum::class),
        ];
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function formFields(): array
    {
        return [
            ID::make()->sortable(),
            Image::make('Image'),
            Text::make('Country Code'),
            Text::make('Tel Code'),
            Text::make('Mobile Number Length'),
            Text::make('Phone Number Length'),
            Text::make('Timezone'),
            BelongsTo::make('Currency', 'currency', resource: new CurrencyResource()),
            BelongsTo::make('Language', 'language', resource: new LanguageResource()),
            Enum::make('Continent')
                ->attach(ContinentsEnum::class),
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
            Image::make('Image'),
            Text::make('Name')->nullable(),
            Text::make('Country Code'),
            Text::make('Tel Code'),
            Text::make('Mobile Number Length'),
            Text::make('Phone Number Length'),
            Text::make('Timezone'),
            BelongsTo::make('Currency', 'currency', resource: new CurrencyResource()),
            BelongsTo::make('Language', 'language', resource: new LanguageResource()),
            Enum::make('Continent')
                ->attach(ContinentsEnum::class),
            Json::make('Translations', 'translations')->keyValue('Locale', 'Translation'),
        ];
    }

    /**
     * @param Country $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
