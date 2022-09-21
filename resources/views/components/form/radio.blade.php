@props([
    'options' => [],
    'checkedValue' => '',
])
@foreach ($options as $option_value => $option_label )
    <label class="radio-wrap mr-4">
        <input type="radio" {{ $attributes->except(['value']) }} value="{{ $option_value }}"
        @if($checkedValue && $checkedValue == $option_value ) checked @endif> 
        <span class="radio-label">{{ $option_label }}</span>
    </label>
@endforeach