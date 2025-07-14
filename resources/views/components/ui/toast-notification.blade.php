@php
$id = 'toast-'.Str::uuid();
$lifespan = 3000;
@endphp
<div id="{{$id}}" @class([
    'toast-fade-in-and-out',
    'px-3 py-2',
    'rounded outline outline-amber-500 bg-amber-500/80 backdrop-blur-lg',
    'text-sm text-shadow-xs text-shadow-black/80 font-bold',
]) style="--tost-lifespan: {{$lifespan}}ms">
    {{$message}}
</div>
<script>
    window.setTimeout(() => {
        document.querySelector('#{{$id}}').remove();
    }, @json($lifespan));
</script>


