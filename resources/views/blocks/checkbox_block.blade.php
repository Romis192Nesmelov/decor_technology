<div class="form-check {{ isset($addClass) ? $addClass : '' }}">
    <input class="form-check-input" type="checkbox" {{ isset($checked) && $checked ? 'checked=checked' : '' }} name="{{ $name }}" value="" id="{{ $id }}">
    @if (isset($label) && $label)
        <label class="form-check-label" for="{{ $id }}">{{ $label }}</label>
    @endif
</div>