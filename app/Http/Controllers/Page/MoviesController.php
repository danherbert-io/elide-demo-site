<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\View\Components\Page;
use App\View\Components\Ui\FavouritesWidget;
use App\View\Components\Ui\ToastNotification;
use Elide\Htmx;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function __invoke(Request $request)
    {
        $page = $request->integer('page');
        $filter = trim($request->string('filter')) ?: null;

        $statusUpdate = $request->session()->get('status');

        // If there's a status update, send a toast notification and an updated favourites widget.
        if ($statusUpdate) {
            Htmx::sendWithResponse([
                new ToastNotification($statusUpdate),
                FavouritesWidget::class,
            ]);
        }

        $titleParts = ['Movies'];

        if ($filter) {
            $titleParts[] = sprintf('Search: %s', $filter);
        }

        if ($page) {
            $titleParts[] = sprintf('Page: %s', $page);
        }

        return Htmx::render(
            Page\Movies::class,
            props: [
                'filter' => $filter,
            ]
        )->title(implode(' | ', $titleParts));
    }
}
