@extends('admin.data-management.base.index')

@section('index-filter')
    @if (request()->input('parent') && ($parent = $modelClass::find(request()->input('parent')))) 
        <div class="col-auto align-self-end">
            <a class="btn btn-secondary" href="{{ request()->fullUrlWithQuery(['parent' => $parent->parent_id])}}"><i class="icon-arrow-left7"></i> {{ $parent->getName() }}</a>
        </div>
    @endif
@endsection