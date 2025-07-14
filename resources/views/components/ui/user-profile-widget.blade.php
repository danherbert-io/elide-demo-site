@php
    /** @var \App\Services\UserProfileService $userProfile */
@endphp
<div class="text-xs flex items-center justify-center">
    <button
            @class([
                'cursor-pointer px-3 py-1.5 rounded font-semibold',
                'outline outline-current/10 hover:bg-current/10',
            ])
            hx-get="{{route('user.profile-dialog')}}"
    >
        Hi, {{ucfirst($userProfile->title()?->value ?: '')}} {{$userProfile->name() ?: 'Anonymous'}}
    </button>
</div>
