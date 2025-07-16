<?php

namespace App\View\Components\Page;

use App\Models\Movie;
use App\Services\FavouritesService;
use Closure;
use Elide\Contracts\ComponentSpecifiesSwapStrategy;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\Component;

class Movies extends Component implements ComponentSpecifiesSwapStrategy
{
    public readonly Paginator $movies;

    public readonly array $favourites;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly FavouritesService $favouritesService,
        public readonly ?string $filter = null
    ) {
        $this->favourites = $favouritesService->favourites();

        $this->movies = Movie::query()
            ->when($this->filter, function (Builder $query) {
                $query->whereLike('name', '%'.$this->filter.'%');
            })
            ->orderBy('name')
            ->simplePaginate(20)
            ->withQueryString();
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

    public function swapStrategy(): string
    {
        return 'morph';
    }
}
