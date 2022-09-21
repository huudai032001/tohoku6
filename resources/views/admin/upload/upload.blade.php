@extends('admin.layouts.default')

@section('page-title', __('Upload file'))

@section('page-header-buttons')
    @includeIf('admin.upload.inc.page-header-buttons')
@endsection

@section('content')
    <div class="custom-file-uploader">        
        <div class="card">
            <div class="card-body">
                <div class="upload-results" style="display:none;"></div>
                <div class="upload-progress mt-4" style="display:none;">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 0%">
                            <span></span>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="upload-state mr-4"></span>
                        <span class="mr-4">
                            Success: <span class="success">0</span>
                        </span>
                       <span class="mr-4">
                           Fail: <span class="fail">0</span>
                        </span> 
                        <span class="text-primary cursor-pointer upload-results-toggle">Show detail</span>
                    </div>
                </div>
                <div class="upload-controls mt-4">
                    <div class="idle-controls">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input name="upload_files" type="file" class="form-control h-auto" multiple accept="audio/*,video/*,image/*,media_type">
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <button class="btn btn-primary upload-control-start"><i class="icon-upload mr-2"></i> Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uploading-controls" style="display: none">
                        <div class="form-group text-center">
                            <button class="btn btn-primary upload-control-pause"><i class="icon-pause mr-2"></i> Pause</button>
                            <button class="btn btn-primary upload-control-continue"><i class="icon-play3 mr-2"></i> Continue</button>
                            <button class="btn btn-primary upload-control-stop"><i class="icon-cancel-circle2 mr-2"></i> Stop</button>
                        </div>
                    </div>
                    <div class="completed-controls" style="display: none">
                        <div class="form-group text-center">
                            <button class="btn btn-primary upload-control-reset"><i class="icon-checkmark mr-2"></i> Done</button>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
@endsection