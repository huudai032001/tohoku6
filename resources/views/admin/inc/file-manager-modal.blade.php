<div id="file-manager-modal" class="modal fade" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">File library</h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body">
                @include('admin.inc.file-manager')
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary file-manager-add-selected-item-button">Add selected
                    items</button>
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>