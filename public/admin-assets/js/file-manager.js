function FileManager (el, options = {}) {

    if (el.length < 1) return;

    var fileItemPrototype;
    var movingFolder;
    var movingFiles = [];
    var loaded = false;
    var state;
    var selected_ids = [];
    var has_more_items = false;
    var nextPaginateCursor;
    var UI = {};
    var default_settings = {
        mode: ''
    };    

    var itemGetter;

    var settings = Object.assign(default_settings, options);

    function initUI () {
        UI.root = el;
        UI.itemLoading = el.find('.items-loading-ui');        
    }

    function initFileItemPrototype () {
        var template = $('#js-clone-templates [data-name="file-manager-file-item-grid-style"]').html();
        var prototype = $(template);
        prototype.find('.item-body').click(function(){  
            let item = $(this).closest('.file-item')            
            item.toggleClass('item-selected')
            item.find('.item-body .item-check-sign').toggleClass('icon-checkbox-unchecked icon-checkbox-checked');
        });
        fileItemPrototype = prototype;
    }

    const createFileItem = function  (file_data) {       
        item = fileItemPrototype.clone(true, true);
        
        item.attr('data-id', file_data.id);        
        item.find('.file-name').html(file_data.name);
        
        item.find('.file-item-info').append('<span class="font-size-sm text-muted info-size">' + file_data.size +'</span>');
        item.find('.file-item-info').append('<span class="font-size-sm text-muted info-file-extension">' + file_data.type + '</span>');
        

        if (file_data.is_image) {
            item.find('.file-item-image').attr('src', file_data.thumbnail);
            if (file_data.fields.width && file_data.fields.height) {
                item.find('.file-item-info').append('<span class="font-size-sm text-muted">' + file_data.fields.width + 'x' + file_data.fields.height +'</span>');
            }
        }
        item.data('file_data', file_data);
        
        return item;
    }

    // function createTest () {
    //     for (let index = 0; index < 10; index++) {
    //         createFileItem({
    //             id:  0,
    //             name: 'test name',
    //         });
    //     }
    // }

    function setColumnsNumber() {
        if (el.find('.file-items').is(":hidden")) return;
        let containerWidth = el.find('.file-items').first().innerWidth();
        let cols = Math.floor(containerWidth / 200);
        if (cols >= 1) {
            el.css('--file-grid-columns', cols);
        } else {
            el.css('--file-grid-columns', '200px');
        }
    }

    function autoSetColumnsNumber () {
        $(window).resize(function(){
            setColumnsNumber();
        });
    }    


    async function start_uploading_queue(files) {
        let queue_results = {
            success: 0,
            fail: 0
        }
        
        let uploading_panel = el.find('.file-uploading-overlay');
        let upload_progress_ui = uploading_panel.find('.upload-progress');
        let upload_log_ui = uploading_panel.find('.upload-log');
        let upload_controls = uploading_panel.find('.upload-controls');
        
        upload_progress_ui.find('.progress-bar').css('width', '1%');
        upload_progress_ui.find('.progress-bar span').html('');
        upload_progress_ui.find('.progress-bar').removeClass(['bg-success', 'bg-danger', 'bg-warning']);
        upload_progress_ui.find('.progress-bar').addClass(['bg-primary', 'progress-bar-animated', 'progress-bar-striped']);
        upload_progress_ui.find('.success').html('0');
        upload_progress_ui.find('.fail').html('0');
        upload_log_ui.hide().html('');
        upload_controls.find('.upload-control-group').hide();
       
        el.find('.file-uploading-overlay').show();
        
        state = 'uploading';
        for (let i = 0; i < files.length; i++) {
            let current_file_num = i + 1;
            let total_files_num = files.length;

            const file = files[i];

            // upload_progress_ui.find('.state').html('Uploading' + ' ' + current_file_num.toString() + '/' + total_files_num.toString());
            upload_progress_ui.find('.total').html(total_files_num.toString() );               

            result = await upload_file(file);

            let percent = (Math.round((current_file_num) * 100 / total_files_num)).toString() + '%';
            if(percent < 1) percent = 1;
            upload_progress_ui.find('.progress-bar').css('width', percent);
            upload_progress_ui.find('.progress-bar span').html(percent);

           
            if (result.success) {
                queue_results.success += 1;
                upload_progress_ui.find('.success').html(queue_results.success.toString());
                //upload_log_ui.append('<div>' + file.name + ' : <span class="text-success">Success</span></div>');
            } else {
                queue_results.fail += 1;
                upload_progress_ui.find('.fail').html(queue_results.fail.toString());
                upload_progress_ui.find('.progress-bar').removeClass('bg-primary');
                if (result.fatal_error) {
                    upload_progress_ui.find('.progress-bar').addClass('bg-danger');                    
                } else {
                    upload_progress_ui.find('.progress-bar').addClass('bg-warning');
                }
                let error_msg = 'Error';
                if (result.error_msg) {
                    error_msg += ': ' + result.error_msg;
                }
                upload_log_ui.show().append('<div class="text-danger">' + file.name + ' - ' + error_msg + '</div>');
            }
            upload_log_ui.scrollTop(upload_log_ui.prop('scrollHeight'));

            if (result.fatal_error) {
                upload_log_ui.show().append('<div class="text-info">Uploading has stopped due to system error</div>');
                break;
            }
        }        
        
        upload_progress_ui.find('.progress-bar').removeClass(['progress-bar-animated', 'progress-bar-striped']);
        
        if (queue_results.fail > 0) {
            upload_controls.find('.completed-controls').show();
        } else {
            await new Promise(r => setTimeout(r, 800));
            finish_uploading();
        }
    }

    async function upload_file (file) {
        let result = {
            success: false,
            error_msg: '',
            fatal_error: false
        }
        //await new Promise(r => setTimeout(r, 1000)); 
        var formData = new FormData();
        formData.append("upload_file", file);
        
        try {
            await $.ajax({
                url: '/admin/upload/ajaxUpload',
                method: 'post',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    result = Object.assign(result, response);
                    //console.log(response)
                    file_item = createFileItem(response.file_data);
                    el.find('.file-items-row').prepend(file_item)
                },
                error: function () {
                    result = {
                        success: false,
                        error_msg: 'Unknown error',
                        fatal_error: true
                    }
                }
            });        
        } catch (error) {
            //console.error(error)
            result = {
                success: false,
                //error_msg: 'error: ' + error.responseJSON.message,
                error_msg: 'System error:',
                fatal_error: true
            }
        }

        return result;
    }

    function finish_uploading () {
        UI.root.find('.file-uploading-overlay').fadeOut();
        state = 'idle';
    }

    function initActions () {
        // Upload 
        UI.root.find('[data-action="upload-file"]').click(function(){
            if (state != 'idle') return;            
            UI.root.find('.-uploader input[name="upload_files"]').trigger('click');
        });

        UI.root.find('.-uploader input[name="upload_files"]').change(function () {  
            let files = $(this).prop('files');          
            if (state != 'idle' || files.length < 1) {
                return;
            }            
            start_uploading_queue(files);
        });

        if (settings.mode == 'modal') {
            UI.root.find('.file-manager-add-selected-item-button').click(function () {
                if (!itemGetter) return;
                if (UI.root.find('.file-item.item-selected').length < 1) return;
                let data = [];
                UI.root.find('.file-item.item-selected').each(function(){                   
                    let x = $(this).data('file_data');
                    if(x) {
                        data.push(x);
                        $(this).removeClass('item-selected')
                        $(this).find('.item-check-sign').removeClass('icon-checkbox-checked').addClass('icon-checkbox-unchecked');
                    }     
                });
                itemGetter(data);                
                setItemGetter(null);
                UI.root.modal('hide')
            });
        }
    }

    function onAddSelectedItems () {

    }

    function initUploadControls () {
        let uploading_panel = el.find('.file-uploading-overlay');
        let upload_controls = uploading_panel.find('.upload-controls');

        upload_controls.find('[data-control="done"]').click(function(){
            finish_uploading();
        });
    }

    async function fetchItems () {    
        UI.itemLoading.addClass('active');    
        await $.ajax({
            url: '/admin/upload/get-file-manager-items',
            method: 'get',
            data: {
                cursor: nextPaginateCursor
            },
            success: function (response) {
                //console.log(response)
                if (response.items.length > 0) {
                    let items = response.items;                    
                    has_more_items = response.has_more;
                    nextPaginateCursor = has_more_items ? response.next_cursor : '';
                    for (let i = 0; i < items.length; i++) {
                        const item = items[i];
                        //console.log(item)
                        file_item = createFileItem(item);
                        el.find('.file-items-row').append(file_item)
                    }
                }
            }
        });
        UI.itemLoading.removeClass('active');
    }

    function initLoadMoreOnScroll() {                  
        switch (settings.mode) {
            case 'modal':                
                UI.root.find('.-body .-right').scroll(function () {
                    if (state != 'idle' || !has_more_items) return;
                    if (UI.itemLoading.offset().top < $('#file-manager-modal .modal-footer').first().offset().top) {
                        loadMore();
                    }
                });
                
                break;

            default:
                $('.content-wrapper > .content-inner').scroll(function(){                    
                    if (state != 'idle' || !has_more_items) return;
                    if (UI.itemLoading.offset().top < $(window).height()) {
                        loadMore();
                    } 
                });
                break;
        }
    }

    function setItemGetter (callback) {
        itemGetter = callback;
    }

    async function loadMore() {
        //console.log('loading more')
        state = 'loading_more';        
        await fetchItems();
        state = 'idle';        
    }

    const init = async function () {
        if (loaded) {
            return;
        }        
        initUI();
        setColumnsNumber();
        autoSetColumnsNumber();
        initFileItemPrototype();
        initActions();
        initUploadControls();
        initLoadMoreOnScroll();
        loaded = true;

        await fetchItems();
        state = 'idle';
    }

    var fileManager = {
        init: init,
        setItemGetter: setItemGetter
        //createTest: createTest        
    };    

    return fileManager;
};

function FormFileSelect (el) {

    var UI = {
        root: el
    }
    UI.loading = UI.root.find('.-preload-notice');
    UI.addItemButton = UI.root.find('.add-file-item-button');

    var template = $('#js-clone-templates [data-name="form-input-file-item"]').html();
    var prototype = $(template);
    prototype.find('.item-remove-button').click(function () {
        let item = $(this).closest('.file-item')
        item.fadeOut(400, function () {
            item.remove()
        })
    });
    fileItemPrototype = prototype;

    var input_name = UI.root.attr('data-input-name')    
    var multiple = UI.root.attr('data-multiple') ? true : false;
    var max;
    if (multiple) {
        max = UI.root.attr('data-max') ? parseInt(UI.root.attr('data-max')) : null;        
    } else {
        max = 1;
    }
    
    function makeItem(file_data) {
        //console.log(file_data);
        item = fileItemPrototype.clone(true, true);
        
        item.attr('data-id', file_data.id);
        item.find('.file-name').html(file_data.name);        

        item.find('.file-item-info').append('<span class="font-size-sm text-muted info-size">' + file_data.size + '</span>');
        item.find('.file-item-info').append('<span class="font-size-sm text-muted info-file-extension">' + file_data.type + '</span>');


        if (file_data.is_image) {
            item.find('.file-item-image').attr('src', file_data.thumbnail);
            if (file_data.fields.width && file_data.fields.height) {
                item.find('.file-item-info').append('<span class="font-size-sm text-muted">' + file_data.fields.width + 'x' + file_data.fields.height + '</span>');
            }
        }
        return item;
    }

    function remainingSlot () {
        let current_count = UI.root.find('.-items .file-item').length;
        return max - current_count;        
    }
    function isFull() {
        if (multiple) {
            if (max) {
                return remainingSlot() < 1;                              
            }
            return false;
        } else {
            return  UI.root.find('.-items .file-item').length >= 1;            
        }
    }

    function getItemFromFileManager(data) {
        //console.log(data)
        console.log(max);
        if(data.length > 0) {
            if(multiple) {
                if(max) {
                    let remaning = remainingSlot();
                    if (remaning < 1) return;
                    if (data.length > remaning) {
                        data = data.slice(0, remaning);
                    }
                }
            } else {
                if (isFull()) return;
            }
            
            data.forEach(function(file_data){
                //console.log(file_data)
                let item = makeItem(file_data);    
                item.prepend('<input type="hidden" name="' + input_name +'" value="' + file_data.id +'" >')         
                UI.root.find('.-items').append(item);               
            })
        }
    }


    UI.root.find('.-items input').each(function () {
        let file_data = $(this).attr('data-file-data');
        if (!file_data) return;
        file_data = JSON.parse(file_data);
        let item = makeItem(file_data);
        $(this).after(item);
        $(this).prependTo(item);
    });

    UI.loading.hide();
    if(multiple){
        UI.root.find('.-items').sortable({
            cursor: "move",
            cancel: '.card-img-actions, .item-remove-button'
        });
    }
    return {
        UI: UI,
        getItemFromFileManager: getItemFromFileManager,
        isFull: isFull
    }
}


$(document).ready(function(){ 
    
    var upload_library;
    var file_manager_modal;

    $('.form-files-select').each(function () {
        let c = FormFileSelect($(this));
        c.UI.addItemButton.click(function(){            
            if(file_manager_modal) {
                if (c.isFull()) return; 
                $('#file-manager-modal').modal('show');
                file_manager_modal.setItemGetter(c.getItemFromFileManager);
            }
        });
    });

    if ($('#file-library').length == 1) {
        upload_library = new FileManager($('#file-library'));
        upload_library.init();
    }   
    

    if ($('#file-manager-modal').length == 1) {        
        var loaded = false;
        file_manager_modal = FileManager($('#file-manager-modal'), {
            mode: 'modal'
        });
        $('#file-manager-modal').on('shown.bs.modal', function () {
            if (!loaded) {
                file_manager_modal.init();
                loaded = true;
            }
        });
        $('#file-manager-modal').on('hide.bs.modal', function () {
            file_manager_modal.setItemGetter(null);
        });     

    }    
    
});
