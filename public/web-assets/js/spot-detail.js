// const { create } = require("lodash");

$(document).on("click", ".toggle-action-button", function () {
    var com_id = $(this).data('id');
    var user_com = $(this).data('user_id');

    var user = $("#user").val();
    // console.log(user_com);
    if(user != user_com){
        $(".delete_com").addClass('hide');
    }else {
        $(".modal_comment #id_comment").val( com_id );
    }
});

$(document).on("click", ".action-button", function () {
    var com_id = $(this).data('id');
    $(".modal_comment #id_posts").val( com_id );

});

function delete_comment(){
    $id_com = $("#id_comment").val();
    // console.log($id_com);
    var formData = new FormData();
    formData.append('id',$id_com);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        url: "/delete-comment",
        type: 'post',
        dataType: "json",
        async: false,
        processData: false,
        contentType: false,
        data: formData,
        success: function (data) {
            // console.log(data);
            if(data.res == true){
                window.location.reload();

            }else {
                alert('このコメントは削除できません');
            }
        }
    });
}

function favorite(){
    $id_posts = $("#posts_id").val();
    $type_posts = 1;
    $user_id = $("#user_id").val();

    var formData = new FormData();
    formData.append('id_posts',$id_posts);
    formData.append('type_posts',$type_posts);
    formData.append('user_id',$user_id);

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        url: "/favourite",
        type: 'post',
        dataType: "json",
        async: false,
        processData: false,
        contentType: false,
        data: formData,
        success: function (data) {
            if(data.res == true){
                alert('お気に入りのドロップ成功');
                $(".count-number").html(data.count);
            }
            else {
                alert('あなたはすでにこの投稿を気に入っています');
            }
        }
    });
}
function all_comment(id){
    var formData = new FormData();
    formData.append('id',id);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        url: "/all-comment",
        type: 'post',
        dataType: "json",
        async: false,
        processData: false,
        contentType: false,
        data: formData,
        success: function (data) {
            let = str = Date();
            let time = Date.parse(str);

            var html = ``;
            for(var i= 0;i< data.length;i++){
                var created_at = Date.parse(data[i].created_at);
                html += `
                <div class="col-12">
                    <div class="review-item">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="avatar">
                                    <img src="/web-assets/images/profile.svg" alt="">
                                </div>
                                <div class="user-name">
                                    `+ data[i].name_user +`
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="review-time">{{$hours}}:{{$mins}}日前</div>
                                <div class="toggle-action-button d-flex align-items-center" data-show-modal="#modal-review-actions" data-id="`+ data[i].id +`" onclick="showModal()">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="review-content">
                        `+ data[i].content +`
                        </div>
                    </div>
                </div>
                `;
            }
            $('#list_comment').html(html);
            // $('.review-item').load();

           
        }
    });
}

function showModal(){

    $('#modal-review-actions').addClass('active');
}

function report(){
    var id_com = $("#id_comment").val();
    var report = $("#report").val();
    var formData = new FormData();
    formData.append('report', report);
    formData.append('id_com', id_com);

    var check = false;
    if(report.length > 0){

    }else{
        document.getElementById("error_report_comment").innerHTML = "必須項目です";
        check = true;
    }

    if(check){
        return false;
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        url: "/report-comment",
        type: 'post',
        dataType: "json",
        async: false,
        processData: false,
        contentType: false,
        data: formData,
        success: function (data) {
            if(data.res == true){
                $('#modal-report').hideModal();

                $('#ajax-loading-overlay .loading-icon').show();
                $('#ajax-loading-overlay .result-message').html('').hide();
                $('#ajax-loading-overlay').show();

                $('#ajax-loading-overlay').addClass('is-loading');

                $('#ajax-loading-overlay .loading-icon').hide();
                $('#ajax-loading-overlay .result-message').html('事務局への報告を送信しました').show();
                $('#ajax-loading-overlay').removeClass('is-loading');
            }
        }
    });
}


function report_two(){
    var id_com = $("#id_posts").val();
    var report = $("#report_two").val();
    var formData = new FormData();
    formData.append('report', report);
    formData.append('id_com', id_com);

    var check = false;
    if(report.length > 0){

    }else{
        document.getElementById("error_report_spot").innerHTML = "必須項目です";
        check = true;
    }

    if(check){
        return false;
    }
    async function doAjax() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/report-spot",
            type: 'post',
            dataType: "json",
            async: false,
            processData: false,
            contentType: false,
            data: formData,
            success: function (data) {
                if(data.res == true){
                    alert("フィードバックを送信しました");
                }
            }
        });
    }
}