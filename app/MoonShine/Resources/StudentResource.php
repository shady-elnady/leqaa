<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Modules\B00User\Models\Student;
use App\Enums\GendersEnum;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use App\Models\Locale;
use MoonShine\Fields\Image;
use MoonShine\Fields\Json;
use MoonShine\Fields\Text;
use MoonShine\Fields\Select;
use MoonShine\Fields\Date;
use MoonShine\ActionButtons\ActionButton;
use MoonShine\Fields\Enum;
use MoonShine\Fields\Password;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Phone;
use MoonShine\Fields\Email;
use MoonShine\Fields\Relationships\HasMany;

/**
 * @extends ModelResource<Student>
 */
class StudentResource extends ModelResource
{
    protected string $model = Student::class;

    protected string $title = 'Students';


    /**
     * @return list<Field>
     */
    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            Image::make('Avatar'),
            Text::make('Title')->nullable(),
            Text::make('Name')->nullable(),
            Text::make('Complete Name')->nullable(),
            Enum::make('Gender')
                ->attach(GendersEnum::class)
                ->nullable(),
            Email::make('Email', 'email'),
            Phone::make('mobile'),
            // Password::make('Password'),
            Switcher::make('Is Active')->default(false),
            Switcher::make('Is Blocked')->default(false),
            Date::make('Email Verified At')->nullable(),
            Date::make('Mobile Verified At')->nullable(),
            Date::make('Last Login')->nullable(),
            Date::make('Birth Date')->nullable(),
            Text::make('University Number')->nullable(),
            Switcher::make('Is Graduate')->default(false),
        ];
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function formFields(): array
    {
        return [
            Image::make('Avatar')->nullable(),
            Text::make('Title')->nullable(),
            Text::make('Name')->nullable(),
            Text::make('Complete Name')->nullable(),
            Enum::make('Gender')
                ->attach(GendersEnum::class)
                ->nullable(),
            Email::make('Email', 'email'),
            Phone::make('mobile'),
            Text::make('Password'),
            Switcher::make('Is Active')->default(false),
            Switcher::make('Is Blocked')->default(false),
            Date::make('Email Verified At')->nullable(),
            Date::make('Mobile Verified At')->nullable(),
            Date::make('Last Login')->nullable(),
            Date::make('Birth Date')->nullable(),
            Text::make('University Number')->nullable(),
            Switcher::make('Is Graduate')->default(false),
            Json::make('Contact Info', 'contact_info')->keyValue(
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
            Image::make('Avatar')->nullable(),
            Text::make('Title')->nullable(),
            Text::make('Name')->nullable(),
            Text::make('Complete Name')->nullable(),
            Enum::make('Gender')
                ->attach(GendersEnum::class)
                ->nullable(),
            Email::make('Email', 'email'),
            Phone::make('mobile'),
            // Text::make('Password'),
            Switcher::make('Is Active')->default(false),
            Switcher::make('Is Blocked')->default(false),
            Date::make('Email Verified At')->nullable(),
            Date::make('Mobile Verified At')->nullable(),
            Date::make('Last Login')->nullable(),
            Date::make('Birth Date')->nullable(),
            Text::make('University Number')->nullable(),
            Switcher::make('Is Graduate')->default(false),
            Json::make('Contact Info', 'contact_info')->keyValue('Locale', 'Translation'),
            HasMany::make('Interests', 'interests', resource: new InterestResource())
        ];
    }

    /**
     * @param Student $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
