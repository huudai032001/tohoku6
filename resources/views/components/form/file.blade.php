@props([
    'value' => '',
    'name' => null,
])

@php    
    $item = App\Models\Upload::find($value);    
@endphp

<div class="form-files-select" data-input-name="{{ $name }}" data-max="1">
    <div class="-preload-notice mb-2"><i class="icon-spinner2 spinner mr-2"></i> Loading images ...</div>
    <div class="row -items">
        @if ($item)
            @php
                $file_data_json = json_encode($item->getJSData());                
            @endphp
            <input type="hidden" name="{{ $name }}" value="{{ $item->id }}" data-file-data="{{ $file_data_json }}">
        @endif
    </div>
    <div class="">
        <button type="button" class="btn btn-primary add-file-item-button">Add</button>         
        Max: 1
    </div>
</div>