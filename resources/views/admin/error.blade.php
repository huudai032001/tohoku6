@extends('admin.layouts.default')

@section('title', 'Error')

@section('content')
    @if (!empty($errorMessages))
        <div class="alert alert-warning alert-styled-left">            
            {{ $errorMessages }}
        </div>
    @endif
@endsection
