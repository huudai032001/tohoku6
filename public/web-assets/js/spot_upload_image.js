var upload_img = $("#upload_img");

console.log(upload_img);
upload_img.bind("change keyup", function() {
    if( $(this).val().length == 10 )
        $("#myform").submit();
        var id_user = $("#id_center").val();
		var file = document.getElementById("upload_img").files[0];
        var data = new FormData();
        data.append('file',file);
        data.append('id_user',id_user);

        response = callAjaxFormData("/khoahoc/handle/Center_handle/upload_avatar",data);
        if(response.res == true) {
            alert("Tải ảnh lên thành công");
            $(".avatar_user").addClass('hide');

            var html = `<img
            src="/upload/image/`+ file['name'] +`"
            alt="khoahocvl123"
            class="avatar_user"
          />`;
            $('.detail').html(html);
        }
        else {
            alert("Tải ảnh lên thất bại");

        }
});