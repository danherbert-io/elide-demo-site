@php
    /** @var \Illuminate\Contracts\Pagination\Paginator $movies */
    /** @var \App\Models\Movie $movie */
@endphp
<div>

    <div class="grid grid-cols-2 gap-4 md:grid-cols-4 xl:grid-cols-5">
        @foreach($movies->items() as $movie)
            <x-ui.movie-tile :movie="$movie" :is-favourite="$isFavourite($movie)" />
        @endforeach
    </div>

    <hr>
    <div hx-boost="true">
        {{$movies->render()}}
    </div>


</div>
