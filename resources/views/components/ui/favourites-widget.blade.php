<a href="{{route('page.favourites')}}"
   class="aspect-square w-10 flex justify-center items-center relative"
>

    @if($total > 0)
        <span class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 rounded-full aspect-square bg-red-500 text-white font-bold w-5 text-xs flex items-center justify-center">
            {{$total}}
        </span>
    @endif

    <!-- credit: https://lucide.dev/icons/star -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        @class([
           'w-6',
           'stroke-amber-500',
           'fill-none' => !$total,
           'fill-amber-500' => $total,
        ])
    >
        <path
            d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/>
    </svg>
</a>
