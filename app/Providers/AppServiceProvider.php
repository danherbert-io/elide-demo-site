<?php

namespace App\Providers;

use App\Services\FavouritesService;
use App\View\Components\Ui\FavouritesWidget;
use App\View\Components\Ui\SiteNavigation;
use Elide\Enums\RequestKind;
use Elide\Htmx;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(FavouritesService::class, FavouritesService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Htmx::usingPartials(fn() => [
            SiteNavigation::class,
        ]);

        Htmx::usingPartials(fn() => [
            FavouritesWidget::class,
        ], for: RequestKind::NON_AJAX);
    }
}
