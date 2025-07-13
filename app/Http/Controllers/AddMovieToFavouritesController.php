<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Services\FavouritesService;
use Illuminate\Http\Request;

class AddMovieToFavouritesController extends Controller
{
    public function __invoke(Movie $movie, FavouritesService $favourites)
    {
        $favourites->addToFavourites($movie);

        return redirect()->back()->with('status', sprintf('"%s" added to favourites', $movie->name));
    }}
