<nav hx-boost="true">
    <ul>
        <li @if(Route::is('page.movies')) class="font-bold" @endif><a href="{{route('page.movies')}}">Movies</a></li>
        <li @if(Route::is('page.about')) class="font-bold" @endif><a href="{{route('page.about')}}">About</a></li>
        <li @if(Route::is('page.favourites')) class="font-bold" @endif><a href="{{route('page.favourites')}}">Favourites</a></li>
    </ul>
</nav>
