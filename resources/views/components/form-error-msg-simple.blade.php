@if ($errors->any())
<div class="alert alert-warning alert-styled-left alert-dismissible">
    {{ __('Form submit failed') }}
    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
</div>
@endif