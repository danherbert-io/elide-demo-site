@php
    /** @var \App\Services\UserProfileService $userProfile */
    /** @var \Illuminate\Support\ViewErrorBag $errors */
@endphp
<form class="flex flex-col gap-2" hx-post="{{route('user.profile-update')}}">

    <div class="flex flex-col gap-2">
        <label for="user-name" class="font-bold text-sm">Name</label>
        <input id="user-name" name="name" value="{{old('name', $userProfile->name())}}"
               placeholder="Your name"
            @class([
                'border-input file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground flex h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm',
                'focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px]',
                'aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive',
            ])
        >
        @if($errors->has('name'))
            <p class="text-red-500 text-xs font-bold">{{$errors->first('name')}}</p>
        @endif
    </div>

    <div class="flex flex-col gap-2">
        <label for="user-title" class="font-bold text-sm">Title</label>
        <input id="user-title" name="title" value="{{old('title', $userProfile->title()?->value)}}"
               placeholder="Your title"
            @class([
                'border-input file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground flex h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm',
                'focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px]',
                'aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive',
            ])
        >
        <p class="text-muted text-xs">
            Accepted values are: {{collect(\App\Enums\UserTitle::cases())->map(fn($case) => $case->value)->join(', ')}}
        </p>
        @if($errors->has('title'))
            <p class="text-red-500 text-xs font-bold">{{$errors->first('title')}}</p>
        @endif
    </div>

    <button type="submit" class="text-xs px-2 py-1 cursor-pointer bg-green-800 text-white rounded ml-auto">Save</button>

</form>
