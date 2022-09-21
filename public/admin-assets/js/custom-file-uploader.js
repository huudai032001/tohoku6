$('.custom-file-uploader').each(function(){   

    var uploader = $(this);    

    var state;
    var upload_results = uploader.find('.upload-results');
    var upload_progress = uploader.find('.upload-progress');    
    var file_input = uploader.find('input[name="upload_files');
    var start_upload_btn = uploader.find('.upload-control-start');
    var pause_upload_btn = uploader.find('.upload-control-pause');
    var continue_upload_btn = uploader.find('.upload-control-continue');
    var stop_upload_btn = uploader.find('.upload-control-stop');
    var files = [];
    var total;
    var current;
    var success;
    var fail;
    var error;

    $(this).te = function () {
        alert('55');
    }

    function init () {
        state = 'idle';
        current = 0;
        total = 0;
        success = 0;
        fail = 0;
        error = false;
        upload_progress.hide();
        upload_progress.find('.progress-bar').css('width', '0%');
        upload_progress.find('.progress-bar span').html('');
        upload_progress.find('.progress-bar').removeClass(['bg-success', 'bg-danger', 'bg-warning']);
        upload_progress.find('.progress-bar').addClass(['bg-primary', 'progress-bar-animated', 'progress-bar-striped']);
        upload_progress.find('.success').html('0');
        upload_progress.find('.fail').html('0');
        uploader.find('.upload-controls .idle-controls').fadeIn();
        uploader.find('.upload-controls .uploading-controls').hide();
        uploader.find('.upload-controls .completed-controls').hide();
        upload_results.html('');
        file_input.val(null);
    }

    async function process_queue() {
        if (current < 1) {
            current = 1;
        }
        
        uploader.find('.upload-progress .upload-state').html('Uploading (' + current.toString() + '/' + total.toString() + ')');
        let percent = (Math.round((current - 1) * 100 / total)).toString() + '%';
        upload_progress.find('.progress-bar').css('width', percent);
        upload_progress.find('.progress-bar span').html(percent);

        var formData = new FormData();
        formData.append("upload_file", files[current - 1]);
        $.ajax({
            url: '/admin/upload/ajaxUpload',
            method: 'post',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) { 
                console.log(response)
                onUploadResponse(response);
                
            },
            error: function () {
                onUploadError();                
            },
            complete: function () {
                upload_results.scrollTop(upload_results.prop('scrollHeight'));
            }
        });

    }

    function onUploadResponse(response) {
        if (response.fatal_error) {            
            onUploadError(response.error_msg);  
            return;          
        }
        if (response.file_upload_sucess) {
            success += 1;
            upload_progress.find('.success').html(success.toString());
            upload_results.append('<div class="">Success: ' + files[current - 1].name + '</div>');
        } else {
            fail += 1;
            upload_progress.find('.fail').html(fail.toString());
            let log = 'Fail: ' + files[current - 1].name;
            if (response.file_upload_error_msg) {
                log += ' - ' + response.file_upload_error_msg;
            }
            upload_results.append('<div class="text-danger">' + log + '</div>');
        } 
        
        if (current < total) {
            current += 1;
            process_queue();
        } else {
            UploadComplete();
        }
    }

    function onUploadError (msg = '') {
        if(msg){
            upload_results.append('<div class="text-danger">System error: ' + msg +'</div>');
        }        
        error =  true;
        UploadComplete();
    }

    function UploadComplete() {
        let c = fail > 0 ? 'bg-warning' : 'bg-success';
        if (error) {
            c = 'bg-danger';
        }
        upload_progress.find('.progress-bar').css('width', '100%');
        upload_progress.find('.progress-bar span').html('Complete');
        upload_progress.find('.progress-bar').removeClass(['bg-primary', 'progress-bar-animated', 'progress-bar-striped']); upload_progress.find('.progress-bar').addClass(c);
        if (error) {
            uploader.find('.upload-progress .upload-state').html('Upload stopped due to system error.');
        } else {
            uploader.find('.upload-progress .upload-state').html('Upload Complete.');
        }
        uploader.find('.upload-controls .completed-controls').fadeIn();
        state = 'completed';
    }

    start_upload_btn.click(function(){
        if (state != 'idle') return;

        files = file_input.prop('files');
        if (files.length < 1) return;
        
        total = files.length;
        state = 'uploading';
        
        uploader.find('.upload-controls .idle-controls').hide();
        uploader.find('.uploading-progress').fadeIn();
        //uploader.find('.uploading-controls').fadeIn();
        upload_progress.fadeIn();
        process_queue();
    });

    uploader.find('.upload-control-reset').click(function(){
        init();
    });

    $('.upload-progress .upload-results-toggle').click(function(){
        if (upload_results.hasClass('show')) {
            $(this).html('Show detail');
            upload_results.removeClass('show');
            upload_results.slideUp();
        } else {
            $(this).html('Hide detail');
            upload_results.addClass('show');
            upload_results.slideDown();
        }
    })

    init();
});