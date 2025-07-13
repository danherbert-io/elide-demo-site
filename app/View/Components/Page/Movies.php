<?php

namespace App\View\Components\Page;

use App\Models\Movie;
use App\Services\FavouritesService;
use Closure;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Movies extends Component
{
    public readonly Paginator $movies;
    public readonly array $favourites;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly FavouritesService $favouritesService,
    ) {
        $this->favourites = $favouritesService->favourites();

        $this->movies = Movie::query()
            ->orderBy('name')
            ->simplePaginate(20);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.page.movies')->with([
            'movies' => $this->movies,
        ]);
    }

    public function isFavourite(Movie $movie): bool
    {
        return in_array($movie->id, $this->favourites);
    }
}
