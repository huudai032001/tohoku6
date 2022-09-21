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

       <form action="" method="POST">
           @csrf

           <fieldset class="mb-3">

                @section('form-fields')
                    @include('admin.data-management.base.inc.form-fields', [
                        'form' => $form,
                        'mode' => 'edit'
                    ])
                @show

           </fieldset>

           <div class="text-right">
               <button type="submit" class="btn btn-primary">{{ __('conmon.submit') }} <i class="icon-paperplane ml-2"></i></button>
           </div>
           
       </form>
        
    </div>
</div>

{{-- @include('admin.inc.file-manager-modal') --}}
@endsection