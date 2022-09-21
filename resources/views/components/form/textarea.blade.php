<textarea {{ $attributes->merge([
    'class' => 'form-control',
    'autocomplete' => 'off',
    'rows' => 4
]) }}>{{ $slot }}</textarea>