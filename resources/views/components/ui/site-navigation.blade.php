<nav hx-boost="true" class="flex gap-1 text-xs justify-center items-center">
    <a href="{{route('page.movies')}}" @class([
            'px-3 py-1.5 rounded font-semibold',
            'hover:bg-current/10',
            'bg-current/10' => Route::is('page.movies'),
        ])>Movies</a>

    <a href="{{route('page.favourites')}}" @class([
            'px-3 py-1.5 rounded font-semibold',
            'hover:bg-current/10',
            'bg-current/10' => Route::is('page.favourites'),
        ]) >My favourites</a>

    <a href="{{route('page.about')}}" @class([
            'px-3 py-1.5 rounded font-semibold',
            'hover:bg-current/10',
            'bg-current/10' => Route::is('page.about'),
        ])>About</a>
</nav>
