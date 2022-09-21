@props([
    'value' => '',
    'max' => null,
    'name' => null
])

@php 
    $ids = Arr::wrap($value);

    $name .= '[]';    

    if (count($ids) > 0) {
        if ($max) {
            $ids = array_slice($ids, 0, $max);
        }
        $items = [];
        $data = App\Models\Upload::find($ids)->keyBy('id');
        foreach($ids as $id) {
            if(isset($data[$id])) {
                $items[] = $data[$id];
            }
        }
    }
@endphp

<div class="form-files-select" data-input-name="{{ $name }}" 
data-multiple="1" @if($max) data-max="{{ $max }}" @endif>
    <div class="-preload-notice mb-2"><i class="icon-spinner2 spinner mr-2"></i> Loading images ...</div>
    <div class="row -items">
        @foreach ($items as $item)
            @php
                $file_data_json = json_encode($item->getJSData());                
            @endphp
            <input type="hidden" name="{{ $name }}" value="{{ $item->id }}" data-file-data="{{ $file_data_json }}">
        @endforeach
    </div>
    <div class="">
        <button type="button" class="btn btn-primary add-file-item-button">Add</button>         
        @if($max)
        Max: {{ $max }}
        @endif
    </div>
</div>