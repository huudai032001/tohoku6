var upload_img = $("#upload_img");
var sub_image_01 = $("#sub_image_01");
var sub_image_02 = $("#sub_image_02");
var sub_image_03 = $("#sub_image_03");
upload_img.bind("change keyup", function() {
    if( $(this).val().length == 10 )
        $("#myform").submit();
		var file = document.getElementById("upload_img").files[0];
    
        // console.log(file);
        let formData = new FormData();
        formData.append('file',file);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            url: "upload_img",
            type: 'post',
            dataType: "json",
            async: false,
            processData: false,
            contentType: false,
            data: formData,
            success: function (response) {
                result = response;
            },
        });
        document.getElementById("myImg").src = "/upload/"+ file['name'];
        
});


//sub Image
sub_image_01.bind("change", function() {
		var file_01 = document.getElementById("sub_image_01").files[0];
        console.log(file_01);

        let formData = new FormData();
        formData.append('file',file_01);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            url: "upload_img",
            type: 'post',
            dataType: "json",
            async: false,
            processData: false,
            contentType: false,
            data: formData,
            success: function (response) {
                result = response;
            },
        });
        document.getElementById("myImg01").src = "/upload/"+ file_01['name'];
});

sub_image_02.bind("change keyup", function() {
//     if( $(this).val().length == 10 )
//         $("#myform").submit();
		var file = document.getElementById("sub_image_02").files[0];
        let formData = new FormData();
        formData.append('file',file);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            url: "upload_img",
            type: 'post',
            dataType: "json",
            async: false,
            processData: false,
            contentType: false,
            data: formData,
            success: function (response) {
                result = response;
            },
        });
        document.getElementById("myImg02").src = "/upload/"+ file['name'];
});

sub_image_03.bind("change keyup", function() {
//     if( $(this).val().length == 10 )
//         $("#myform").submit();
		var file = document.getElementById("sub_image_03").files[0];
        let formData = new FormData();
        formData.append('file',file);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            url: "upload_img",
            type: 'post',
            dataType: "json",
            async: false,
            processData: false,
            contentType: false,
            data: formData,
            success: function (response) {
                result = response;
            },
        });
        document.getElementById("myImg03").src = "/upload/"+ file['name'];
});

$("#form-button").click(function(){
    var upload_img = $("#upload_img");
    var sub_image_01 = $("#sub_image_01");
    var sub_image_02 = $("#sub_image_02");
    var sub_image_03 = $("#sub_image_03");
    var check = true;

    if(check){
        return false;
    }
})