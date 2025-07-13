<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Services\FavouritesService;

class RemoveMovieFromFavouritesController extends Controller
{
    public function __invoke(Movie $movie, FavouritesService $favourites)
    {
        $favourites->removeFromFavourites($movie);

        return redirect()->back()->with('status', sprintf('"%s" removed from favourites', $movie->name));
    }
}
