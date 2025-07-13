<div
    class="flex flex-col justify-end items-stretch rounded aspect-[6/9] relative overflow-hidden outline outline-neutral-50/20"
>
    <img
        src="{{$movie->image_url}}" class="absolute inset-0 object-cover z-1"
        onerror="this.remove()"
    >

    <div
        hx-post="{{route($isFavourite ? 'movie.remove-from-favourites': 'movie.add-to-favourites', $movie)}}"
        class="cursor-pointer z-10 absolute top-4 right-4 bg-black/80 hover:bg-black rounded outline outline-white/10 aspect-square w-10 flex justify-center items-center">
        <!-- credit: https://lucide.dev/icons/star -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            @class([
               'w-6',
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
        class="z-10 bg-black text-white p-2 gap-2 outline outline-neutral-50/20 drop-shadow-2xl drop-shadow-black/100"
    >
        <h3 class="text-xl">
            {{$movie->name}}
        </h3>
        <div class="text-sm opacity-60">
            {{$movie->genres->pluck('name')->join(', ')}}
        </div>
    </div>
</div>
