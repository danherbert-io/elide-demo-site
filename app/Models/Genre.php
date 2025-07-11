<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

/**
 * @property string $name
 * @property Collection<Movie> $movies
 */
class Genre extends Model
{
    /** @use HasFactory<\Database\Factories\GenreFactory> */
    use HasFactory;

    public function movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class);
    }
}
