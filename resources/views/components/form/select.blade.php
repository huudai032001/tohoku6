@props([
    'options' => [],
    'selectedValue' => null
])
<select {{ $attributes->class([
    'is-invalid' => $errors->has($attributes->get('name'))
])->merge([
    'class' => 'form-control'    
]) }}>    

    <option value="">{{ $slot }}</option>  
    @foreach ($options as $option_value => $option_label)
        <option value="{{ $option_value }}" @if($selectedValue == $option_value) selected @endif>{{ $option_label }}</option>
    @endforeach
</select>