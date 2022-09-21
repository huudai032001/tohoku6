@props([
    'type' => 'info'
])

@php    
    $cssClasses = [
        'success' => 'success',
        'notice' => 'info',
        'warning' => 'warning',
        'error' => 'danger'
    ];
    $cssCLass = $cssClasses[$type] ?? 'info';
@endphp

<div class="alert alert-{{ $cssCLass }} alert-styled-left alert-dismissible">
    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
    {{ $slot }}
</div>