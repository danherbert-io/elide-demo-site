<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Movie;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    const MOVIE_DATA_URL = 'https://raw.githubusercontent.com/theapache64/top250/master/top250_min.json';

    protected function urlExists(string $url): bool
    {
        try {
            return Http::timeout(5)->head($url)->status() !== 404;
        } catch (Exception) {
            return false;
        }
    }

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->command->info('Retrieving movies from: '.static::MOVIE_DATA_URL);
        $json = file_get_contents(static::MOVIE_DATA_URL);

        if (! $json) {
            throw new \RuntimeException('Sorry - could not load movie JSON file: '.static::MOVIE_DATA_URL);
        }

        $movies = json_decode($json, associative: true);

        foreach ($movies as $movieSpec) {

            $actors = array_map($this->resolveActor(...), $movieSpec['actors'] ?? []);
            $directors = array_map($this->resolveDirector(...), $movieSpec['directors'] ?? []);
            $genres = array_map($this->resolveGenre(...), $movieSpec['genre'] ?? []);

            Arr::forget($movieSpec, ['actors', 'directors', 'genre']);

            if (empty($movieSpec['image_url']) || ! $this->urlExists($movieSpec['image_url'])) {
                Arr::forget($movieSpec, ['image_url']);
            }

            if (empty($movieSpec['thumbnail_url']) || ! $this->urlExists($movieSpec['thumbnail_url'])) {
                Arr::forget($movieSpec, ['thumbnail_url']);
            }

            $movie = Movie::create($movieSpec);

            $movie->actors()->saveMany($actors);
            $movie->directors()->saveMany($directors);
            $movie->genres()->saveMany($genres);

            $this->command->info(sprintf(' >> Imported movie: %s (%d)', $movie->name, $movie->id));
        }
    }

    protected function resolveActor(string $name): Actor
    {
        /** @var Actor[] $cache */
        static $cache = [];

        if (array_key_exists($name, $cache)) {
            return $cache[$name];
        }

        return $cache[$name] = Actor::create(['name' => $name]);
    }

    protected function resolveDirector(string $name): Director
    {
        /** @var Director[] $cache */
        static $cache = [];

        if (array_key_exists($name, $cache)) {
            return $cache[$name];
        }

        return $cache[$name] = Director::create(['name' => $name]);
    }

    protected function resolveGenre(string $name): Genre
    {
        /** @var Genre[] $cache */
        static $cache = [];

        if (array_key_exists($name, $cache)) {
            return $cache[$name];
        }

        return $cache[$name] = Genre::create(['name' => $name]);
    }
}
