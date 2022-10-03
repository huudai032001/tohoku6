<div id="file-manager-modal" class="file-manager-modal modal fade" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('common.file_library') }}</h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body">
                <file-manager ref="fileManager" @@selected-files-change="onSelectedFilesChange"></file-manager>
            </div>

            <div class="modal-footer ">
                
                <div class="">
                    <button type="button" class="btn btn-primary" data-action="add-selected-items" style="display: none;">
                        {{ __('common.add_selected_items') }}
                    </button>
                    <button type="button" class="btn btn-link" data-dismiss="modal">{{ __('common.close') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
