<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Category;
use App\Models\Currency;
use App\Models\Language;
use App\Models\Locale;
use App\MoonShine\Resources\AddressResource;
use App\MoonShine\Resources\CategoryResource;
use App\MoonShine\Resources\CityResource;
use App\MoonShine\Resources\CollegeResource;
use App\MoonShine\Resources\CountryResource;
use App\MoonShine\Resources\CurrencyResource;
use App\MoonShine\Resources\EventPhotoResource;
use App\MoonShine\Resources\EventResource;
use App\MoonShine\Resources\EventTypeResource;
use App\MoonShine\Resources\GovernorateResource;
use App\MoonShine\Resources\InterestResource;
use App\MoonShine\Resources\LanguageResource;
use App\MoonShine\Resources\LecturerResource;
use App\MoonShine\Resources\LecturerTransactionResource;
use App\MoonShine\Resources\LocaleResource;
use App\MoonShine\Resources\LocalityResource;
use App\MoonShine\Resources\OrganizationResource;
use App\MoonShine\Resources\OrganizationTypeResource;
use App\MoonShine\Resources\PaymentMethodResource;
use App\MoonShine\Resources\PaymentStatusResource;
use App\MoonShine\Resources\ReservationResource;
use App\MoonShine\Resources\StateResource;
use App\MoonShine\Resources\StreetResource;
use App\MoonShine\Resources\StudentResource;
use App\MoonShine\Resources\StudentTransactionResource;
use App\MoonShine\Resources\TransactionResource;
use App\MoonShine\Resources\UniversityResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Pages\Page;
use Closure;
use Modules\A00Contact\Models\Address;
use Modules\A00Contact\Models\City;
use Modules\A00Contact\Models\Country;
use Modules\A00Contact\Models\Governorate;
use Modules\A00Contact\Models\Locality;
use Modules\A00Contact\Models\State;
use Modules\A00Contact\Models\Street;
use Modules\B00User\Models\Interest;
use Modules\B00User\Models\Lecturer;
use Modules\B00User\Models\Student;
use Modules\C00Payment\Models\LecturerTransaction;
use Modules\C00Payment\Models\PaymentMethod;
use Modules\C00Payment\Models\PaymentStatus;
use Modules\C00Payment\Models\StudentTransaction;
use Modules\C00Payment\Models\Transaction;
use Modules\D00Organization\Models\College;
use Modules\D00Organization\Models\Organization;
use Modules\D00Organization\Models\OrganizationType;
use Modules\D00Organization\Models\University;
use Modules\E00Event\Models\Event;
use Modules\E00Event\Models\EventPhoto;
use Modules\E00Event\Models\EventType;
use Modules\F00Reservation\Models\Reservation;
use MoonShine\Menu\MenuDivider;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            // MenuItem::make('Documentation', 'https://moonshine-laravel.com/docs')
            //     ->badge(fn() => 'Check')
            //     ->blank(),

            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.admins_title'),
                    new MoonShineUserResource()
                ),
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.role_title'),
                    new MoonShineUserRoleResource()
                ),
            ]),

            MenuGroup::make('Tools', [
                MenuItem::make('Languages', new LanguageResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => Language::count())
                // ->translatable('menu')
                ,
                MenuDivider::make(),
                MenuItem::make('Locales', new LocaleResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => Locale::count()),
                MenuDivider::make(),
                MenuItem::make('Currencies', new CurrencyResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => Currency::count()),
                MenuDivider::make(),
                MenuItem::make('Categories', new CategoryResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => Category::count()),
            ]),

            MenuGroup::make('Contact', [
                MenuItem::make('Countries', new CountryResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => Country::count()),
                MenuDivider::make(),
                MenuItem::make('Governorates', new GovernorateResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => Governorate::count()),
                MenuDivider::make(),
                MenuItem::make('Cities', new CityResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => City::count()),
                MenuDivider::make(),
                MenuItem::make('Localities', new LocalityResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => Locality::count()),
                MenuDivider::make(),
                MenuItem::make('States', new StateResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => State::count()),
                MenuDivider::make(),
                MenuItem::make('Streets', new StreetResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => Street::count()),
                MenuDivider::make(),
                MenuItem::make('Address', new AddressResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => Address::count()),
            ]),

            MenuGroup::make('Users', [
                MenuItem::make('Lecturers', new LecturerResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => Lecturer::count()),
                MenuDivider::make(),
                MenuItem::make('Students', new StudentResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => Student::count()),
                MenuDivider::make(),
                MenuItem::make('Interests', new InterestResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => Interest::count()),
            ]),

            MenuGroup::make('Payments', [
                MenuItem::make('Payment Methods', new PaymentMethodResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => PaymentMethod::count()),
                MenuDivider::make(),
                MenuItem::make('Payment Statuss', new PaymentStatusResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => PaymentStatus::count()),
                MenuDivider::make(),
                MenuItem::make('Lecturer Transactions', new LecturerTransactionResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => LecturerTransaction::count()),
                MenuDivider::make(),
                MenuItem::make('Student Transactions', new StudentTransactionResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => StudentTransaction::count()),
            ]),

            MenuGroup::make('Organizations', [
                MenuItem::make('Organization Types', new OrganizationTypeResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => OrganizationType::count()),
                MenuDivider::make(),
                MenuItem::make('Organizations', new OrganizationResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => Organization::count()),
                MenuDivider::make(),
                MenuItem::make('Universities', new UniversityResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => University::count()),
                MenuDivider::make(),
                MenuItem::make('Colleges', new CollegeResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => College::count()),
            ]),

            MenuGroup::make('Events', [
                MenuItem::make('Event Types', new EventTypeResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => EventType::count()),
                MenuDivider::make(),
                MenuItem::make('Events', new EventResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => Event::count()),
                MenuDivider::make(),
                MenuItem::make('Event Photos', new EventPhotoResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => EventPhoto::count()),
            ]),

            MenuGroup::make('Reservations', [
                MenuItem::make('Reservations', new ReservationResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => Reservation::count()),
            ]),

        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */

    protected function theme(): array
    {
        return [
            'colors' => [
                'primary' => 'rgb(120, 67, 233)',
                'secondary' => 'rgb(236, 65, 118)',
                'body' => 'rgb(27, 37, 59)',
                'dark' => [
                    'DEFAULT' => 'rgb(30, 31, 67)',
                    50 => 'rgb(83, 103, 132)',
                    100 => 'rgb(74, 90, 121)',
                    200 => 'rgb(65, 81, 114)',
                    300 => 'rgb(53, 69, 103)',
                    400 => 'rgb(48, 61, 93)',
                    500 => 'rgb(41, 53, 82)',
                    600 => 'rgb(40, 51, 78)',
                    700 => 'rgb(39, 45, 69)',
                    800 => 'rgb(27, 37, 59)',
                    900 => 'rgb(15, 23, 42)',
                ],

                'success-bg' => 'rgb(0, 170, 0)',
                'success-text' => 'rgb(255, 255, 255)',
                'warning-bg' => 'rgb(255, 220, 42)',
                'warning-text' => 'rgb(139, 116, 0)',
                'error-bg' => 'rgb(224, 45, 45)',
                'error-text' => 'rgb(255, 255, 255)',
                'info-bg' => 'rgb(0, 121, 255)',
                'info-text' => 'rgb(255, 255, 255)',
            ],
            'darkColors' => [
                'body' => 'rgb(27, 37, 59)',
                'success-bg' => 'rgb(17, 157, 17)',
                'success-text' => 'rgb(178, 255, 178)',
                'warning-bg' => 'rgb(225, 169, 0)',
                'warning-text' => 'rgb(255, 255, 199)',
                'error-bg' => 'rgb(190, 10, 10)',
                'error-text' => 'rgb(255, 197, 197)',
                'info-bg' => 'rgb(38, 93, 205)',
                'info-text' => 'rgb(179, 220, 255)',
            ]
        ];
    }
}
