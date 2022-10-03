@if ($errors->any())
    <div class="alert alert-warning alert-styled-left alert-dismissible">
        {{ __('message.form_validation_failed') }}
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
    </div>
@endif

@foreach ($form->getGroups() as $formGroup)

    <div class="crud-form-group row" data-mode="{{ $mode }}">
        <div class="col-md-2 mb-1 mb-md-0">
            {{ $formGroup->label }}
            @if (($mode == 'edit') && $formGroup->required)
            <span class="text-danger">*</span>
            @endif
        </div>
        <div class="col-md-10">
            <div class="form-control-wrap">
                {!! $formGroup->{($mode ?: 'edit') . 'Mode'}() !!}
            </div>
            @if ($mode == 'edit')
                {!! $formGroup->errorMsg($errors) !!}
            @endif
        </div>
    </div>    

@endforeach