<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title ?? '??'}} / {{config('app.name')}}</title>
    <script src="https://cdn.jsdelivr.net/npm/htmx.org@2.0.6/dist/htmx.min.js"
            integrity="sha384-Akqfrbj/HpNVo8k11SXBb6TlBWmXXlYQrCSqEWmyKJe+hDm3Z/B2WVG4smwBkRVm"
            crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="max-w-5xl m-auto p-4 bg-neutral-900 text-neutral-50"
      hx-headers="{{json_encode(['X-CSRF-TOKEN' => csrf_token()])}}"
>
<h1 class="text-2xl">APP - ELIDE &mdash; {{$title ?? '??'}}</h1>

<div class="flex flex-col gap-4">
    <div class="flex justify-between items-center">
        @htmxPartial('site-navigation')
        @htmxPartial('favourites-widget')
    </div>
    <hr class="my-4">

    <hr class="my-4">


    @htmxPartial('content')


</div>

<div @class([
        'fixed bottom-4 right-4',
    ]) id="toast-notifications">
</div>

</body>
</html>
