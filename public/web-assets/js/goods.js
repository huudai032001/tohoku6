function fail(){
    alert("バージョンのスコアが足りない");
}

function zip_code(){
    console.log('a');
    var code = $("#zip_code").val();
    var formData = new FormData();
    formData.append('code',code)

    // console.log(code);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        url: "/find_by_zip_code",
        type: 'post',
        dataType: "json",
        async: false,
        processData: false,
        contentType: false,
        data: formData,
        success: function (data) {
            console.log(data.zip_code);
            if(data.res == true){
                $("#zip_code").val(data.zip_code.code + "," + data.zip_code.city + "," + data.zip_code.district + "," + data.zip_code.town);
            }
        }
    });
}