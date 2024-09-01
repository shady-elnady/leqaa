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
use Modules\D00Organization\Models\Organization;
use MoonShine\Fields\Image;
use MoonShine\Fields\Json;
use MoonShine\Fields\Text;
use MoonShine\Fields\Select;
use MoonShine\ActionButtons\ActionButton;
use MoonShine\Fields\Enum;
use MoonShine\Fields\Relationships\BelongsTo;

/**
 * @extends ModelResource<Organization>
 */
class OrganizationResource extends ModelResource
{
    protected string $model = Organization::class;

    protected string $title = 'Organizations';

    /**
     * @return list<Field>
     */
    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            Image::make('logo'),
            Text::make('Name')->nullable(),
            BelongsTo::make('organization Type', 'organizationType', 'name', resource: new OrganizationTypeResource())
                ->nullable(),
            BelongsTo::make('University', 'university', 'name', resource: new UniversityResource())
                ->nullable(),
            BelongsTo::make('affiliated To', 'affiliatedTo', 'name', resource: new OrganizationResource())
                ->nullable(),
        ];
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function formFields(): array
    {
        return [
            ID::make()->sortable(),
            Image::make('logo'),
            BelongsTo::make('organization Type', 'organizationType', 'name', resource: new OrganizationTypeResource())
                ->nullable(),
            BelongsTo::make('University', 'university', 'name', resource: new UniversityResource())
                ->nullable(),
            BelongsTo::make('affiliated To', 'affiliatedTo', 'name', resource: new OrganizationResource())
                ->nullable(),
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
            Image::make('logo'),
            Text::make('Name')->nullable(),
            BelongsTo::make('organization Type', 'organizationType', 'name', resource: new OrganizationTypeResource())
                ->nullable(),
            BelongsTo::make('University', 'university', 'name', resource: new UniversityResource())
                ->nullable(),
            BelongsTo::make('affiliated To', 'affiliatedTo', 'name', resource: new OrganizationResource())
                ->nullable(),
            Block::make(
                'Translations',
                [
                    Json::make('Translations', 'translations')->keyValue('Locale', 'Translation'),
                ]
            ),
        ];
    }


    /**
     * @param Organization $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
