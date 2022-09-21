<div>Sort</div>   
<select name="sort" class="form-control auto-submit">
    <option value="">{{ __('common.default') }}</option>
    @foreach ($options as $key => $label)
        <option value="{{ $key }}" @selected(request()->input('sort') == $key)>{{ $label }}</option>
    @endforeach
</select>