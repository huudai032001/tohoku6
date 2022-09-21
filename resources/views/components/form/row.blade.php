@props([
    'label' => '', 
    'requiredSign' => false,
    'name' => ''
])

<div class="form-group row">
    <div class="col-form-label col-lg-2">
        {{ $label }}        
        @if ($requiredSign)
            <span class="text-danger">*</span>
        @endif
    </div>
    <div class="col-lg-10">
        {{ $slot }}
        {{-- @error($name)
        <div class="invalid-feedback">
            @foreach ($errors->get($name) as $error)
            <div>{{ $error }}</div>
            @endforeach
        </div>
        @enderror --}}
    </div>
</div>

