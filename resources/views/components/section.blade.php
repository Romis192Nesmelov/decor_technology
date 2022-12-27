<section {{ $attributes->class('py-5') }}>
    <div class="container">
        @if ($attributes->has('head'))
            <h2>{{ $attributes->get('head') }}</h2>
        @endif
        <div class="row {{ $attributes->has('rowClass') ? $attributes->get('rowClass') : '' }}">
            {{ $slot }}
        </div>
    </div>
</section>