<input {{ $attributes->class([
    'form-control',
    'is-invalid' => $errors->has($attributes->get('name'))
])->merge([
    'type' => 'text',
    'autocomplete' => 'off'
]) }}/>