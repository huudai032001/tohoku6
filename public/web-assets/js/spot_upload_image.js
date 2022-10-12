var upload_img = $("#upload_img");
var sub_image_01 = $("#sub_image_01");
var sub_image_02 = $("#sub_image_02");
var sub_image_03 = $("#sub_image_03");
var upload_avatar = $("#upload_avatar");

upload_img.bind("change keyup", function() {
    if( $(this).val().length == 10 )
        $("#myform").submit();
		var file = document.getElementById("upload_img").files[0];
    
        console.log(file);
        // return false
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
        document.getElementById("myImg").src = "/uploads/"+ file['name'];
        
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
            url: "/upload_img",
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
        document.getElementById("myImg01").src = "/uploads/"+ file_01['name'];
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
            url: "/upload_img",
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
        document.getElementById("myImg02").src = "/uploads/"+ file['name'];
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
            url: "/upload_img",
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
        document.getElementById("myImg03").src = "/uploads/"+ file['name'];
});


upload_avatar.bind("change keyup", function() {
    //     if( $(this).val().length == 10 )
    //         $("#myform").submit();
            var file = document.getElementById("upload_avatar").files[0];
            let formData = new FormData();
            formData.append('file',file);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                url: "/upload_img",
                type: 'post',
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
                data: formData,
                success: function (response) {
                    // result = response;
                    console.log(response);
                },
            });
            document.getElementById("file_upload").src = "/uploads/"+ file['name'];
    });