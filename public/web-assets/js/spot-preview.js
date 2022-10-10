function delete_image(){
    var check = confirm('本当にキャンセルしますか？');
    if(check == true){
        var image_id = $("#image_id").val();
        var sub_image = $("#sub_image").val();
    
        var formData = new FormData();
        formData.append('image',image_id);
        formData.append('sub_image',sub_image); 
    
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            url: "un_file",
            type: 'post',
            dataType: "json",
            async: false,
            processData: false,
            contentType: false,
            data: formData,
            success: function (data) {
                if(data.res == true){
                    window.location.href = 'list-spot'; 
                }
    
            }
        });
    }
}