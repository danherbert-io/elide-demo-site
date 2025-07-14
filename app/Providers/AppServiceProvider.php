<?php

namespace App\Providers;

use App\Services\FavouritesService;
use App\Services\UserProfileService;
use App\View\Components\Ui\FavouritesWidget;
use App\View\Components\Ui\SiteNavigation;
use App\View\Components\Ui\UserProfileWidget;
use Elide\Enums\RequestKind;
use Elide\Htmx;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(FavouritesService::class, FavouritesService::class);
        $this->app->singleton(UserProfileService::class, UserProfileService::class);
    }

    public function boot(): void
    {
        // Include the site navigation component with AJAX and non-AJAX requests.
        Htmx::usingPartials(fn() => [
            SiteNavigation::class,
        ]);

        // Include the favourites and user profile widgets with non-AJAX requests.
        Htmx::usingPartials(fn() => [
            FavouritesWidget::class,
            UserProfileWidget::class,
        ], for: RequestKind::NON_AJAX);
    }
}
