<select {{ $attributes->class([
    'is-invalid' => $errors->has($attributes->get('name'))
])->merge([
    'class' => 'form-control'    
]) }}>    
    <option value="">{{ $slot }}</option>  
    @foreach ($options as $option)
        <option value="{{ $option['id'] }}" @if($selectedValue == $option['id']) selected @endif>{{ $option['name'] }}</option>
    @endforeach
</select>