@extends('admin.layouts.default')

@section('page-title', __('Upload library'))

@section('page-header-buttons')
    @includeIf('admin.upload.inc.page-header-buttons')
@endsection

@section('content')
    @if (!$files->isEmpty())
        <div class="row">
            @foreach ($files as $file)
                <div class="col-6 col-md-4 col-lg-3 col-xl-auto">
                    <x-file-grid-item :file="$file" />
                </div>
            @endforeach
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            {!! $files->onEachSide(3)->links() !!}
        </div>        
    </div>
@endsection