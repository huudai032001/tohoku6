$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="_csrf"]').attr('content')
    }
});

$(document).ready(function(){
    $('form.data-management-index-options').find('select, [type="radio"], [type="checkbox"]').change(function(){
        $(this).closest('form').submit();
    });
    

    $('.data-table').each(function(){
        var table = $(this);
        table.find('#dataTableToggleSelectAllItems').change(function(){
            let checked = $(this).prop('checked');
            table.find('input[name="ids[]"]').prop('checked', checked);
            table.closest('form').find('[type="submit"').prop('disabled', table.find('input[name="ids[]"]:checked').length < 1);
        });
        table.find('input[name="ids[]"]').click(function(){
            table.find('#dataTableToggleSelectAllItems').prop('checked', false);
            table.closest('form').find('[type="submit"').prop('disabled', table.find('input[name="ids[]"]:checked').length < 1);
        });

    });

    $('.tags-input').tagsinput();

    $('.text-editor').summernote({
        toolbar: [
            //[groupname, [button list]]
            ['style', ['style']],
            ['height', ['height']],
            ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
            //['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
            
        ],
        spellCheck: false,
        
    });

    $('.auto-submit').change(function(){
        $(this).closest('form').submit();
    });
    
});