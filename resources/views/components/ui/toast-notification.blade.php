@php
$id = 'toast-'.Str::uuid();
@endphp
<div id="{{$id}}" class="border-2 border-amber-500 p-4">
    {{$message}}
</div>
<script>
    window.setTimeout(() => {
        document.querySelector('#{{$id}}').remove();
    }, 3000);
</script>
