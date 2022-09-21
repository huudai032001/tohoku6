<div class="file-manager">
    <div class="-header p-1">
        <div class="action-buttons">
            <div class="btn btn-primary action-button" data-action="upload-file">
                <i class="icon-upload"></i>
                <div>Upload files</div>
            </div>
            {{-- <div class="btn action-button" data-action="move-file">
                <i class="icon-file-upload2"></i>
                <div>Move files</div>
            </div> --}}
            {{-- <div class="btn action-button" data-action="delete-file">
                <i class="icon-bin"></i>
                <div>Delete files</div>
            </div>             --}}
            {{-- <div class="btn action-button" data-action="create-folder">
                <i class="icon-folder-plus"></i>
                <div>Create folder</div>
            </div>
            <div class="btn action-button" data-action="move-folder">
                <i class="icon-folder-upload"></i>
                <div>Move Folder</div>
            </div>
            <div class="btn action-button" data-action="rename-folder">
                <i class="icon-folder-minus3"></i>
                <div>Rename Folder</div>
            </div>
            <div class="btn action-button" data-action="delete-folder">
                <i class="icon-folder-remove"></i>
                <div>Delete folder</div>
            </div>
            <div class="btn action-button" data-action="paste-folder" hidden>
                <i class="icon-folder-check"></i>
                <div>Move Folder Here</div>
            </div>
            <div class="btn action-button" data-action="cancel-moving-folder" hidden>
                <i class="icon-cancel-circle2"></i>
                <div>Cancel</div>
            </div>
            <div class="btn action-button" data-action="move-file" hidden>
                <i class="icon-file-check2"></i>
                <div>Move Files Here</div>
            </div>
            <div class="btn action-button" data-action="cancel-moving-file" hidden>
                <i class="icon-cancel-circle2"></i>
                <div>Cancel</div>
            </div> --}}

        </div>
        <div class="row justify-content-between">
            <div class="col d-none">
                <div class="breadcrumb-line breadcrumb-line-light">
                    <div class="breadcrumb">
                        <span class="breadcrumb-item">Uploads</span>
                        {{-- <span  class="breadcrumb-item">FOlder 1</span>
                        <span class="breadcrumb-item active">folder 2</span> --}}
                    </div>
                </div>
            </div>
            <div class="col-auto form-inline ml-auto">
                <div class="row">
                    <div class="col-auto">
                        <input type="search" class="form-control form-control-sm" placeholder="Search ..." disabled>
                    </div>
                    {{-- <div class="col-auto">
                        <select name="" id="" class="form-control form-control-sm" disabled>
                            <option value="">Nestest</option>
                            <option value="">Oldest</option>
                        </select>
                    </div> --}}
                    <div class="col-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-icon" disabled><i class="icon-list"></i></button>
                            <button type="button" class="btn btn-sm btn-light btn-icon"><i
                                    class="icon-grid"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="-body">

        <div class="-left p-2 d-none">
            <ul class="folder-list">
                <li><i class="icon-folder4 mr-1"></i> Folder name</li>
                <li><i class="icon-folder4 mr-1"></i> Folder name</li>
                <li><i class="icon-folder4 mr-1"></i> Folder name</li>
                <li><i class="icon-folder4 mr-1"></i> Folder name</li>
                <li><i class="icon-folder4 mr-1"></i> Folder name</li>
                <li><i class="icon-folder4 mr-1"></i> Folder name</li>
            </ul>
        </div>
        <div class="-right">
            <div class="file-items">
                <div class="row file-items-row">

                </div>
                <div class="items-loading-ui text-center">
                    <i class="icon-spinner2 spinner mr-2"></i> Loading
                </div>
            </div>
        </div>
    </div>
    <div class="-uploader" style="display: none;">
        <input name="upload_files" type="file" class="form-control h-auto" multiple
            accept="audio/*,video/*,image/*,media_type">
    </div>

    <div class="file-uploading-overlay" style="display: none;">
        <div class="file-uploading-overlay-wrap">
            <div class="file-uploading-overlay-dialog panel">
                <div class="panel-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="upload-log" style="display: none"></div>
                            <div class="upload-progress mt-2">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 0%">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <span class="mr-4">
                                        Files: <span class="total"></span>
                                    </span>
                                    <span class="mr-4">
                                        Success: <span class="success">0</span>
                                    </span>
                                    <span>
                                        Fail: <span class="fail">0</span>
                                    </span>                                    
                                </div>
                            </div>
                            <div class="upload-controls mt-1">
    
                                {{-- <div class="uploading-controls">
                                    <div class="text-center">                                       
                                        <button class="btn btn-warning upload-control-stop">
                                            <i class="icon-cancel-circle2 mr-2"></i>
                                            Cancel
                                        </button>
                                    </div>
                                </div> --}}
                                <div class="upload-control-group completed-controls" style="display: none">
                                    <div class="text-center">
                                        <button class="btn btn-primary" data-control="done">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
    
                </div>
            </div>
        </div>
    </div>

</div>