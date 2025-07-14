<?php

namespace App\Http\Controllers;

use App\Services\FavouritesService;

class ClearFavouritesController extends Controller
{
    public function __invoke(FavouritesService $favourites)
    {
        $favourites->clearFavourites();

        return redirect()->back()->with('status', 'All favourites cleared!');
    }
}
