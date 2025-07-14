<?php

namespace App\View\Components\Page;

use App\Models\Movie;
use App\Services\FavouritesService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Favourites extends Component
{
    public readonly Collection $favourites;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly FavouritesService $favouritesService,
    ) {
        $this->favourites = Movie::query()
            ->whereIn('id', $this->favouritesService->favourites())
            ->orderBy('name')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.page.favourites');
    }
}
