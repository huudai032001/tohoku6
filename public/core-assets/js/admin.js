$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="_csrf"]').attr('content')
    }
});

$(document).ready(function () {
    $('form.data-management-index-options').find('select, [type="radio"], [type="checkbox"]').change(function () {
        $(this).closest('form').submit();
    });


    $('.data-table').each(function () {
        var table = $(this);
        table.find('#dataTableToggleSelectAllItems').change(function () {
            let checked = $(this).prop('checked');
            table.find('input[name="ids[]"]').prop('checked', checked);
            table.closest('form').find('[type="submit"').prop('disabled', table.find('input[name="ids[]"]:checked').length < 1);
        });
        table.find('input[name="ids[]"]').click(function () {
            table.find('#dataTableToggleSelectAllItems').prop('checked', false);
            table.closest('form').find('[type="submit"').prop('disabled', table.find('input[name="ids[]"]:checked').length < 1);
        });

    });

    $('.tags-input').tagsinput();

   

    // $('.text-editor').summernote({
    //     toolbar: [
    //         //[groupname, [button list]]
    //         ['style', ['style']],
    //         ['height', ['height']],
    //         ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
    //         //['fontname', ['fontname']],
    //         ['color', ['color']],
    //         ['para', ['ul', 'ol', 'paragraph']],
    //         ['table', ['table']],
    //         ['insert', ['link', 'picture', 'video']],
    //         ['view', ['fullscreen', 'codeview', 'help']],

    //     ],
    //     spellCheck: false,        
    // });

    // const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
    // const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;


    // tinymce.init({
    //     selector: '.text-editor',
    //     plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap emoticons',
    //     editimage_cors_hosts: ['picsum.photos'],
    //     menubar: 'edit insert format tools table help',
    //     toolbar: 'undo redo | bold italic underline strikethrough | forecolor backcolor | fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | pagebreak | charmap emoticons  | insertfile image media link anchor codesample | ltr rtl',
    //     toolbar_sticky: true,
    //     toolbar_sticky_offset: isSmallScreen ? 102 : 108,
    //     autosave_ask_before_unload: true,
    //     autosave_interval: '30s',
    //     autosave_prefix: '{path}{query}-{id}-',
    //     autosave_restore_when_empty: false,
    //     autosave_retention: '2m',
    //     image_advtab: true,
        
    //     importcss_append: true,
        
    //     template_cdate_format: '[Date Created (CDATE): %Y/%m/%d : %H:%M:%S]',
    //     template_mdate_format: '[Date Modified (MDATE): %Y/%m/%d : %H:%M:%S]',
    //     height: 600,
    //     image_caption: true,
    //     quickbars_selection_toolbar: '',
    //     noneditable_class: 'mceNonEditable',
    //     toolbar_mode: 'sliding',
    //     contextmenu: 'link image table',
    //     skin: useDarkMode ? 'oxide-dark' : 'oxide',
    //     content_css: useDarkMode ? 'dark' : 'default',
    //     content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:100%; }',
    //     font_size_formats: '50% 60% 70% 80% 90% 100% 110% 120% 130% 140% 150% 160% 170% 180% 190% 200% 220% 240% 260% 280% 320% 360% 420% 480%',
    //     branding: false, // remove tiny copyright logo
    //     promotion: false, // remove upgrade promotion,
    //     language: document.documentElement.lang
    // });

    $('.auto-submit').change(function () {
        $(this).closest('form').submit();
    });

});