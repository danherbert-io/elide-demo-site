<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title ?? '??'}} / {{config('app.name')}}</title>
    <script src="https://cdn.jsdelivr.net/npm/htmx.org@2.0.6/dist/htmx.min.js"
            integrity="sha384-Akqfrbj/HpNVo8k11SXBb6TlBWmXXlYQrCSqEWmyKJe+hDm3Z/B2WVG4smwBkRVm"
            crossorigin="anonymous"></script>

    @vite(['resources/css/app.css'])
</head>
<body class="font-sans antialiased max-w-5xl m-auto p-4 bg-neutral-900 text-neutral-50"
      hx-headers="{{json_encode(['X-CSRF-TOKEN' => csrf_token()])}}"
>

<div class="flex flex-col gap-4">
    <div class="flex justify-between items-center">
        <div class="flex gap-4">
            <h1 class="text-2xl flex justify-start items-center">
                <img src="/art/elide-logo.svg" class="max-w-[5rem]">
            </h1>

            @htmxPartial('site-navigation')

        </div>

        <div class="flex gap-4">
            @htmxPartial('favourites-widget')
            @htmxPartial('user-profile-widget')
        </div>

    </div>

    @htmxPartial('content')

</div>

<div
    @class([
    'fixed top-[50%] bottom-4 right-4 z-10 flex flex-col justify-end items-end gap-4',
    'mask-t-from-20% mask-t-to-80%',
    'pointer-events-none'
    ])
    id="toast-notifications"
></div>

</body>
</html>
