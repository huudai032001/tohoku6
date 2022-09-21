@props([
    'isChecked' => ''
])
@php
    if ($attributes->get('checked')) {
        $checked = true;
    } else {
        $checked = $isChecked && $isChecked != '0' && $isChecked != 0 && $isChecked != 'false';
    }
@endphp
<label class="checkbox-wrap">
    <input type="checkbox" {{ $attributes->merge([
        'checked' => $checked
    ]) }}> <span class="checkbox-label">{{ $slot }}</span>
</label>