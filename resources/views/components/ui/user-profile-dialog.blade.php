@php
    $id = 'user-dialog';
@endphp

<dialog id="{{$id}}" @class([
    'm-[revert] p-4',
    'rounded outline outline-current/30 drop-shadow-xl drop-shadow-black',
])>

    @htmxPartial('user-profile-form')

    <script>
        (function () {
            const dialog = document.querySelector(`#{{$id}}`);
            dialog.showModal();

            dialog.addEventListener('close', () => {
                dialog.remove();
            })
        })();
    </script>
</dialog>

