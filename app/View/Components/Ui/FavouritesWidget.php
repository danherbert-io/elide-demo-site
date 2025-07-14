<?php

namespace App\View\Components\Ui;

use App\Services\FavouritesService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FavouritesWidget extends Component
{
    public readonly int $total;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly FavouritesService $favourites,
    ) {
        $this->total = count($this->favourites->favourites());
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.favourites-widget');
    }
}
