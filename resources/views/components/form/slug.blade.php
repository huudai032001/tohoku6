@props([
    'slugFor' => 'name'
])
<x-form.text data-slug-for="{{ $slugFor }}" name="slug" value="{{ $attributes->get('value') }}" placeholder="{{ __('Leave blank for automatic generation') }}"></x-form.text>