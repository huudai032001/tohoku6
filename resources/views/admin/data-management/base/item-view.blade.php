@extends('admin.data-management.base.layout')

@if ($dataItem->id)
    @section('page-header-buttons')
        @include('admin.data-management.base.inc.item-page-header-buttons')
        @parent
    @endsection
@endif

@section('content')

<div class="card">

    <div class="card-body">

        <fieldset class="mb-3">

             @section('form-fields')
                 @include('admin.data-management.base.inc.form-fields', [
                     'form' => $form,
                     'mode' => 'view'
                 ])
             @show

        </fieldset>
      
    </div>
</div>

@endsection