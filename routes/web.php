<?php

use App\Http\Controllers\AddMovieToFavouritesController;
use App\Http\Controllers\ClearFavouritesController;
use App\Http\Controllers\Page\AboutController;
use App\Http\Controllers\Page\FavouritesController;
use App\Http\Controllers\Page\MoviesController;
use App\Http\Controllers\RemoveMovieFromFavouritesController;
use Illuminate\Support\Facades\Route;

Route::get('/', MoviesController::class)->name('page.movies');
Route::get('about', AboutController::class)->name('page.about');
Route::get('favourites', FavouritesController::class)->name('page.favourites');

Route::group([
    'prefix' => 'movie/{movie:id}',
], function () {
    Route::post('add-to-favourites', AddMovieToFavouritesController::class)->name('movie.add-to-favourites');
    Route::post('remove-from-favourites',
        RemoveMovieFromFavouritesController::class)->name('movie.remove-from-favourites');
});

Route::post('clear-favourites', ClearFavouritesController::class)->name('clear-favourites');

