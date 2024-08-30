<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Language;
use App\Models\Locale;
use App\MoonShine\Resources\CountryResource;
use App\MoonShine\Resources\EventResource;
use App\MoonShine\Resources\EventTypeResource;
use App\MoonShine\Resources\LanguageResource;
use App\MoonShine\Resources\LocaleResource;
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
use Modules\A00Contact\Models\Country;
use Modules\E00Event\Models\Event;
use Modules\E00Event\Models\EventType;
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
            ]),

            MenuGroup::make('Contact', [
                MenuItem::make('Countries', new CountryResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => Country::count()),
                MenuDivider::make(),

            ]),

            MenuGroup::make('Events', [
                MenuItem::make('Event Types', new EventTypeResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => EventType::count()),
                MenuDivider::make(),
                MenuItem::make('Events', new EventResource(), 'heroicons.outline.users')
                    ->blank(fn() => false)
                    ->badge(fn() => Event::count()),
            ]),
        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
