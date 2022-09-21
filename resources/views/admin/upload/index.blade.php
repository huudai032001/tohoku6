@extends('admin.layouts.default')

@section('page-title', __('File manager'))

@section('content')
    <div id="file-library">
        @include('admin.inc.file-manager')
    </div>
@endsection