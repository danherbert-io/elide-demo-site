<div
    {{$attributes->class([
    'flex flex-col justify-end items-stretch',
    'rounded aspect-[6/9] relative overflow-hidden outline outline-black/50',
    ])}}
>
    @if($movie->thumb_url)
    <img
            src="{{$movie->thumb_url}}" class="absolute inset-0 object-cover z-1 w-full h-full"
            onerror="this.remove()"
    >
    @else
        <div class="absolute inset-0 object-cover z-1 flex justify-center items-center text-xs user-select-none pointer-events-none">(no image)</div>
    @endif

    <div
            hx-post="{{route($isFavourite ? 'movie.remove-from-favourites': 'movie.add-to-favourites', $movie)}}"
            class="cursor-pointer z-10 absolute top-2 right-2 bg-black/80 hover:bg-black rounded outline outline-black/80  aspect-square w-6 flex justify-center items-center">
        <!-- credit: https://lucide.dev/icons/star -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                @class([
                   'w-4',
                   'stroke-amber-500',
                   'fill-none' => !$isFavourite,
                   'fill-amber-500' => $isFavourite,
                ])
        >
            <path
                    d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/>
        </svg>
    </div>

    <div
            class="z-10 text-white p-2 gap-2 drop-shadow drop-shadow-black bg-linear-to-t from-black to-transparent"
            style="--tw-drop-shadow-size: drop-shadow(0 -10px 20px var(--tw-drop-shadow-color))"
    >
        <h3 class="text-xl text-shadow-md text-shadow-black">
            {{$movie->name}}
        </h3>
        <div class="text-sm text-shadow-sm text-shadow-black">
            {{$movie->genres->pluck('name')->join(', ')}}
        </div>
    </div>
</div>
