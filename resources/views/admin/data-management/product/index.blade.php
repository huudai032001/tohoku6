@extends('admin.data-management.base.index')

@section('index-filter')
    <div class="col-md-auto">
        <div>{{ __('common.category') }}</div>
            {!! new App\Form\Model([
                'name' => 'category',
                'data' => request()->input('category'),
                'model' => 'App\Models\ProductCategory',
                'class' => 'auto-submit'
            ]) !!}                       
    </div>    
@endsection