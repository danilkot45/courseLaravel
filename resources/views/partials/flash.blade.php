@if (Session::has('success_flash_message'))
    <div class="alert alert-success  {{ Session::has('success_flash_message_important') ? 'alert-important' : '' }}"
        style="display:block;width:20%;margin-left: 10px;">

        @if (Session::has('success_flash_message_important'))
            <button type="button" class="btn-close  me-2 mt-0" data-dismiss="alert" aria-label="Закрыть"
                style="position: absolute;top: 0px;right:0px;"></button>
        @endif

        {{ session('success_flash_message') }}
    </div>
@endif
