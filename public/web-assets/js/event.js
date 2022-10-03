function find_by_day(year,month,day){
    let formData = new FormData();
    formData.append('year',year);
    formData.append('month',month);
    formData.append('day',day);

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        url: "/",
        type: 'post',
        dataType: "json",
        async: false,
        processData: false,
        contentType: false,
        data: formData,
        success: function (data) {
            console.log(data);
            if(data.data.length > 0){
                var html = ``;
                for(var i = 0;i<data.data.length;i++){
                    html += `
                    <div class="col-md-6 col-lg-4">
                        <div class="post-item-9">
                            <div class="thumb">
                                <div class="icon-star">
                                    <img src="/web-assets/images/icons/star-yellow.svg" alt="">
                                </div>
                                <a href="{{route('event_detail',`+ data.data[i].id +`)}}">
                                    <div class="ratio thumb-image thumb-hover-anim">
                                        <img src="/web-assets/images/demo/1.png" alt="">
                                    </div>
                                </a>
                            </div>
                            <div class="item-content">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="date">
                                        `+ data.data[i].created_at +`<span class="day-of-week">[sun]</span>
                                    </div>
                                    <div class="area d-flex align-items-center">
                                        <div class="icon"></div>
                                        <div>
                                            <img src="/web-assets/images/area/akita.svg" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="line"></div>
                                <div class="item-title">
                                    <a href="{{route('event_detail',`+ data.data[i].id +`}}">
                                    `+ data.data[i].name +`
                                    </a>
                                </div>
                                <div class="item-desc">`+ data.data[i].location +`</div>
                                <div class="counters d-flex align-items-center justify-content-between"> 
                                    <div class="tags d-flex align-items-center">
                                        <span class="tag">花火</span>
                                        <span class="tag">夏祭り</span>
                                    </div>
                                    <div class="favorite-count ml-20">
                                        <img src="/web-assets/images/icons/heart-gray.svg" alt=""> 
                                        <span class="count text-latin">`+ data.data[i].favorite +`</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                }

            }
            else {
                var html = '';
            }
            $('.post-row').html(html);

            $('.post-row').data('owl.carousel').destroy(); 
            $('.post-row').owlCarousel({touchDrag: false, mouseDrag: false});
        },
    });
}

function favorite(){
    $id_posts = $("#posts_id").val();
    $type_posts = 2;
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