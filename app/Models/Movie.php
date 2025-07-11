<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

/**
 * @property string $name
 * @property null|string $desc
 * @property null|string $image_url
 * @property null|string $thumb_url
 * @property null|string $imdb_url
 * @property float $rating
 * @property int $year
 * @property Collection<Actor> $actors
 * @property Collection<Director> $directors
 * @property Collection<Genre> $genres
 */
class Movie extends Model
{
    /** @use HasFactory<\Database\Factories\MovieFactory> */
    use HasFactory;

    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class);
    }

    public function directors(): BelongsToMany
    {
        return $this->belongsToMany(Director::class);
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }
}
