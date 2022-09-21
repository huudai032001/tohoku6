@extends('web.layouts.default')

@section('body')
    @include('web.inc.header')
    
    @yield('main')

    @include('web.inc.footer')
@endsection