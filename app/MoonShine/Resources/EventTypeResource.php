<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Locale;
use Illuminate\Database\Eloquent\Model;
use Modules\E00Event\Models\EventType;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Image;
use MoonShine\Fields\Json;
use MoonShine\Fields\Text;
use MoonShine\Fields\Select;
use MoonShine\ActionButtons\ActionButton;

/**
 * @extends ModelResource<EventType>
 */
class EventTypeResource extends ModelResource
{
    protected string $model = EventType::class;

    protected string $title = 'Event Types';

    /**
     * @return list<Field>
     */
    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Name')->nullable(),
            Image::make('Image')->dir($this->title),
            Text::make('Name'),
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
            Text::make('name')->nullable(),
            Image::make('Image')->dir($this->title),
            Block::make(
                'Translations',
                [
                    Json::make('Translations', 'translations')->keyValue('Locale', 'Translation'),
                ]
            ),
        ];
    }

    // public function prepareForValidation(): void
    // {
    //     dd(gettype(request()->translations));
    //     request()?->merge([
    //         'email' => request()
    //             ?->string('email')
    //             ->lower()
    //             ->value()
    //     ]);
    // }

    /**
     * @param EventType $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
