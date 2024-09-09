<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Locale;

use MoonShine\Resources\ModelResource;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Fields\Text;
use MoonShine\Fields\Image;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Relationships\BelongsTo;

/**
 * @extends ModelResource<Locale>
 */
class LocaleResource extends ModelResource
{
    protected string $model = Locale::class;

    protected string $title = 'Locales';

    /**
     * @return list<Field>
     */
    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            Image::make('Country Flag', 'flag'),
            BelongsTo::make('Language', 'language', 'native_name', resource: new LanguageResource()),
            Text::make('Locale Code', 'locale_code'),
        ];
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function formFields(): array
    {
        return [
            ID::make()->sortable(),
            // Image::make('Flag', 'flag'),
            BelongsTo::make('Language', 'language', 'native_name', resource: new LanguageResource()),
            Text::make('Locale Code', 'locale_code'),
        ];
    }

    /**
     * @return list<Field>
     */
    public function detailFields(): array
    {
        return [
            ID::make()->sortable(),
            Image::make('Flag', 'flag'),
            BelongsTo::make('Language', 'language', 'native_name', resource: new LanguageResource()),
            Text::make('Locale Code', 'locale_code'),
        ];
    }

    /**
     * @param Locale $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
