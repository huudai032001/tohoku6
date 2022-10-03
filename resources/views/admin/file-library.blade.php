@extends('admin.layouts.default')

@section('title', __('common.file_library'))

@section('content')
    <div id="file-library">
        <file-manager ref="fileManager" :auto-load="true"></file-manager>
    </div>
@endsection
