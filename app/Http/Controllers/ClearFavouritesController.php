<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Services\FavouritesService;
use Illuminate\Http\Request;

class ClearFavouritesController extends Controller
{
    public function __invoke(FavouritesService $favourites)
    {
        $favourites->clearFavourites();
        return redirect()->back();
    }
}
