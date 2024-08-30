<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Language;
use App\Models\Locale;
use MoonShine\Resources\ModelResource;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Field;
use MoonShine\Fields\Json;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Select;
use MoonShine\ActionButtons\ActionButton;
use Closure;
use Illuminate\View\ComponentAttributeBag;

/**
 * @extends ModelResource<Language>
 */
class LanguageResource extends ModelResource
{
    protected string $model = Language::class;

    protected string $title = 'Languages';

    // protected string $sortColumn = 'updated_at'; // Default sort field

    // protected string $sortDirection = 'Asc'; // Default sort type

    protected int $itemsPerPage = 10; // Number of elements per page

    protected bool $stickyTable = true;

    protected bool $simplePaginate = true;

    public function trAttributes(): Closure
    {
        return function (
            Model $item,
            int $row,
            ComponentAttributeBag $attr
        ): ComponentAttributeBag {
            if ($item->id === 1 | $row === 2) {
                $attr->setAttributes([
                    'class' => 'bgc-green'
                ]);
            }

            return $attr;
        };
    }

    public function tdAttributes(): Closure
    {
        return function (
            Model $item,
            int $row,
            int $cell,
            ComponentAttributeBag $attr = null
        ): ComponentAttributeBag {
            if ($cell === 6) {
                $attr->setAttributes([
                    'class' => 'bgc-red'
                ]);
            }

            return $attr;
        };
    }

    /**
     * @return list<Field>
     */
    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Name')->nullable(),
            Text::make('Native Name', 'native_name'),
            Text::make('Language Iso Code', 'language_iso_code'),
            Switcher::make('is Bidirectional', 'is_bidirectional'),
        ];
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function formFields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Native Name', 'native_name'),
            Text::make('Language Iso Code', 'language_iso_code'),
            Switcher::make('is Bidirectional', 'is_bidirectional'),
            Json::make('Translations', 'translations')->keyValue(
                keyField: Select::make('Locale', 'locale')->options(Locale::select('locale_code')->get()->mapWithKeys(function (Locale $locale) {
                    return [$locale['locale_code'] => $locale['locale_code']];
                })->toArray()),
                valueField: Text::make('Translation')->required(),
            )->creatable(
                limit: 5,
                button: ActionButton::make('Add New Translation', '#')->success()->icon('heroicons.outline.plus')->customAttributes(['class' => 'btn-lg'])
            )->removable(),
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
            Text::make('Native Name', 'native_name'),
            Text::make('Language Iso Code', 'language_iso_code'),
            Switcher::make('is Bidirectional', 'is_bidirectional'),
            // dd($this->item->translation),
            Json::make('Translations', 'translations')->keyValue('Locale', 'Translation'),
        ];
    }


    // /**
    //  * @return list<MoonShineComponent|Field>
    //  */
    // public function fields(): array
    // {
    //     return [
    //         Block::make([
    //             ID::make()->sortable(),
    //             Text::make('Native Name', 'native_name'),
    //             Text::make('Language Iso Code', 'language_iso_code'),
    //             Switcher::make('is Bidirectional', 'is_bidirectional'),
    //             Json::make('Translations', 'translations'),
    //             // ->asRelation(new LocaleResource())
    //             // ->fields([
    //             //     Position::make(),
    //             //     BelongsTo::make('Locale', 'locale', 'locale_code')
    //             //         ->setColumn('locale_id')
    //             //         ->searchable()
    //             //         ->default(Locale::find(2))
    //             //         ->placeholder('Locale')
    //             //         ->withImage(column: 'image', disk: 'public', dir: 'countries'),
    //             //     Text::make('Translation')->required(),
    //             // ])->creatable(
    //             //     limit: 5,
    //             //     button: ActionButton::make('Add New Translation', '#')->success()->icon('heroicons.outline.plus')->customAttributes(['class' => 'btn-lg'])
    //             // )->removable(),
    //         ]),
    //     ];
    // }

    public function prepareForValidation(): void
    {
        dd(request()->translations);
        request()?->merge([
            'email' => request()
                ?->string('email')
                ->lower()
                ->value()
        ]);
    }

    /**
     * @param Language $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
