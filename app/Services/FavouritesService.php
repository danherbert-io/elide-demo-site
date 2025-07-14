<?php

declare(strict_types=1);


namespace App\Services;

use App\Models\Movie;

class FavouritesService
{
    /**
     * @return array<int>
     */
    public function favourites(null|array $favourites = null): array
    {
        if (!is_null($favourites)) {
            session()->put('favourites', $favourites);
        }

        return session()->get('favourites', []);
    }

    public function addToFavourites(Movie $movie): static
    {
        $favourites = array_unique([
            ...$this->favourites(),
            $movie->id,
        ]);

        $this->favourites($favourites);

        return $this;
    }

    public function removeFromFavourites(Movie $movie): static
    {
        $favourites = array_filter(
            $this->favourites(),
            fn($id) => $id !== $movie->id,
        );

        $this->favourites($favourites);

        return $this;
    }

    public function clearFavourites(): static
    {
        $this->favourites([]);

        return $this;
    }
}
