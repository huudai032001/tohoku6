@props([
    //'modelClass',
    'selectedTags' => null,
    'name' => ''
])
@php
    if ($selectedTags instanceof \Illuminate\Database\Eloquent\Collection) {
        $selectedTags = implode(',', $selectedTags->pluck('name')->toArray());
    }
@endphp
<input name="{{ $name }}" type="text" class="form-control tags-input" value="{{ $selectedTags }}" placeholder="Press Enter or Commas" data-fouc>