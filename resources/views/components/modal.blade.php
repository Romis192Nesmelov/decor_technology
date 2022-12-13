<div class="modal fade" tabindex="-1" aria-hidden="true" id="{{ $attributes->get('id') }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $attributes->get('head') }}</h5>
                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            {{ $slot }}
        </div>
    </div>
</div>
