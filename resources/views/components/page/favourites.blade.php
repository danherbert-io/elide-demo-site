<div class="flex flex-col gap-4 items-start justify-start">
    <button
        class="bg-red-500 text-white px-2 py-1 rounded cursor-pointer"
        hx-post="{{route('clear-favourites')}}"
    >Clear favourites</button>

    <div class="grid grid-cols-2 gap-4 md:grid-cols-4 xl:grid-cols-5">
        @foreach ($favourites as $favourite)
            <x-ui.movie-tile :movie="$favourite" is-favourite/>
        @endforeach
    </div>
</div>
