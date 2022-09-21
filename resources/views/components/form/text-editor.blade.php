@props([
    
])
<textarea {{ $attributes->class([
    'form-control',
    'text-editor',
    'is-invalid' => $errors->has($attributes->get('name')),    
])->merge([
    'autocomplete' => 'off'
]) }}
>{{ $slot }}</textarea>