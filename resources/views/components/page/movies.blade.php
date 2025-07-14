@php
    /** @var \Illuminate\Contracts\Pagination\Paginator $movies */
    /** @var \App\Models\Movie $movie */
@endphp
<div class="flex flex-col gap-4">

    <h2 class="text-3xl font-bold text-shadow-2xs">Movies</h2>

    <input name="filter"
           id="movies-filter"
           type="search"
           autocomplete="off"
           value="{{request('filter')}}"
           placeholder="Search..."
           hx-trigger="input delay:500ms"
           hx-get="{{route('page.movies')}}"
           hx-replace-url="true""
        @class([
            'border-input file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground flex h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm',
            'focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px]',
            'aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive',
        ])
    >

    <div class="w-full grid grid-cols-2 gap-4 md:grid-cols-4 xl:grid-cols-5">
        @foreach($movies->items() as $index => $movie)
            <x-ui.movie-tile :movie="$movie" :is-favourite="$isFavourite($movie)"
                             style="--animation-delay-scale: {{$index}}"/>
        @endforeach
    </div>

    <div hx-boost="true">
        {{$movies->render()}}
    </div>


</div>
