<?php

use App\Models\Actor;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('desc')->nullable();
            $table->string('name');
            $table->string('image_url')->nullable();
            $table->string('thumb_url')->nullable();
            $table->string('imdb_url')->nullable();
            $table->decimal('rating');
            $table->unsignedSmallInteger('year');
        });

        Schema::create('actor_movie', function (Blueprint $table) {
            $table->foreignIdFor(Movie::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Actor::class)->constrained()->onDelete('cascade');
            $table->primary(['movie_id', 'actor_id']);
        });

        Schema::create('director_movie', function (Blueprint $table) {
            $table->foreignIdFor(Movie::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Director::class)->constrained()->onDelete('cascade');
            $table->primary(['movie_id', 'director_id']);
        });

        Schema::create('genre_movie', function (Blueprint $table) {
            $table->foreignIdFor(Movie::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Genre::class)->constrained()->onDelete('cascade');
            $table->primary(['movie_id', 'genre_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genre_movie');
        Schema::dropIfExists('director_movie');
        Schema::dropIfExists('actor_movie');
        Schema::dropIfExists('movies');
    }
};
