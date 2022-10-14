@extends('admin.data-management.base.layout')

@if ($dataItem->id)
    @section('page-header-buttons')
        @include('admin.data-management.base.inc.item-page-header-buttons')
        @parent
    @endsection
@endif

@section('content')

<div class="card">
    <form action="" method="POST" class="vue-form">
        @csrf
        <div class="card-body">
           <fieldset class="mb-3">

                @section('form-fields')
                    @include('admin.data-management.base.inc.form-fields', [
                        'form' => $form,
                        'mode' => 'edit'
                    ])
                @show

           </fieldset>
           
        </div>
        <div class="card-footer bg-white">
            <button-submit class="btn btn-success"><i class="icon-floppy-disk mr-2"></i> {{ __('common.save') }}</button-submit>
        </div>
    </form>
</div>

{{-- @include('admin.inc.file-manager-modal') --}}
@endsection