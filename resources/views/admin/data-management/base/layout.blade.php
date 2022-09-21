@extends('admin.layouts.default')

@section('page-header-buttons')

    <a href="{{ route($routeBase . 'index') }}" class="btn btn-link btn-float text-body">
        <i class="icon-list text-primary"></i> <span>{{ __('List') }}</span>
    </a>
    
    @if ($controller->createAble())
        <a href="{{ route($routeBase . 'general-action', ['action' => 'create']) }}" class="btn btn-link btn-float text-body">
            <i class="icon-plus3 text-primary"></i> <span>{{ __('Create') }}</span>
        </a>
    @endif

    @foreach ($controller->moreGeneralActions() as $key => $arr)
        <a href="{{ route($routeBase . 'general-action', ['action' => $key]) }}" class="btn btn-link btn-float text-body">
            <i class="{{ $arr['icon'] }} {{ $arr['css_class'] }}"></i> <span>{{ $arr['label'] }}</span>
        </a>
    @endforeach
@endsection