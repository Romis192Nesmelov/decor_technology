@php
    $attrString = '';
    if (isset($addAttr) && is_array($addAttr)) {
        foreach ($addAttr as $attr => $val) {
            $attrString .= $attr.'='.$val.' ';
        }
    }
@endphp
<button {{ isset($disabled) && $disabled ? 'disabled' : '' }} type="{{ $type }}" {{ $attrString }} class="btn {{ isset($mainClass) ? $mainClass : 'bg-success-600' }} {{ isset($addClass) ? $addClass : '' }}">
    @if (isset($icon))
        <span class="{{ $icon }}"></span>
    @endif
    {!! $text !!}
</button>
