@php
    $groups = request()->session()->get('flash-msg');
@endphp

@if (!empty($groups))
    @foreach ($groups as $msg)
        @php
            $type = $msg['type'];
            $content = $msg['content'];
            $cssClasses = [
                'success' => 'success',
                'notice' => 'info',
                'warning' => 'warning',
                'error' => 'danger'
            ];
            $cssClass = $cssClasses[$type] ?? 'info';
        @endphp

        <div class="alert alert-{{ $cssClass }} alert-styled-left alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
            @if (is_array($content))
            <ul class="m-0 pl-3">
                @foreach ($content as $item)
                <li>{{ $item }}</li>
                @endforeach
            </ul>
            @else
            {{ $content }}
            @endif
        </div>
    @endforeach
@endif
