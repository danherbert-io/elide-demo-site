<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\View\Components\Page\Favourites;
use App\View\Components\Ui\FavouritesWidget;
use App\View\Components\Ui\ToastNotification;
use Elide\Htmx;
use Illuminate\Http\Request;

class FavouritesController extends Controller
{
    public function __invoke(Request $request)
    {
        $statusUpdate = $request->session()->get('status');

        if ($statusUpdate) {
            Htmx::usingPartials(fn() => [
                new ToastNotification($statusUpdate),
                FavouritesWidget::class,
            ]);
        }

        return Htmx::render(Favourites::class)->title('Favourites');
    }
}
