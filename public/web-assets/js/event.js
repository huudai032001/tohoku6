function find_by_day(year,month,day){
    var url = $('#base_url_current').val();

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

            if(data.list_event.length > 0){
                var u = 0;
                for(var i = 0;i<data.list_event.length;i++){
                    var html = `
                    <div class="col-md-6 col-lg-4">
                        <div class="post-item-9">
                            <div class="thumb">
                                <div class="icon-star">
                                    <img src="/web-assets/images/icons/star-yellow.svg" alt="">
                                </div>
                                <a href="event-detail/`+ data.list_event[i].id +`">
                                    <div class="ratio thumb-image thumb-hover-anim">
                                        <img src="`+ data.arr_image[i] +`" alt="">
                                    </div>
                                </a>
                            </div>
                            <div class="item-content">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="date">
                                        `+ data.list_event[i].created_at +`<span class="day-of-week">[sun]</span>
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
                                    <a href="event-detail/`+ data.list_event[i].id +`">
                                    `+ data.list_event[i].name +`
                                    </a>
                                </div>
                                <div class="item-desc">`+ data.list_event[i].location +`</div>
                                <div class="counters d-flex align-items-center justify-content-between"> 
                                    <div class="tags d-flex align-items-center">`;
                                    // for(var s = 0;s < data.arr_category.length;s++){
                                        for(var u = 0;u < data.arr_category[i].length;u++){
                                            html +=`<span class="tag">`+ data.arr_category[i][u].name +`</span>`;
                                        }
                                    // }
                                        
                                    html +=`</div>
                                    <div class="favorite-count ml-20">
                                        <img src="/web-assets/images/icons/heart-gray.svg" alt=""> 
                                        <span class="count text-latin">`+ data.list_event[i].favorite +`</span>
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

            var dom_sort = `
                <input type="hidden" value="`+ year +`" name="year">
                <input type="hidden" value="`+ month +`" name="month">
                <input type="hidden" value="`+ day +`" name="day">
                    <ul class="area-selection-list">
                        <li>
                            <label class="custom-radio-2">
                                <input type="radio" name="area-select" value="Akita"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">Akita
                            </label>
                        </li>
                        <li>
                            <label class="custom-radio-2">
                                <input type="radio" name="area-select" value="Aomori"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">Aomori
                            </label>
                        </li>
                        <li>
                            <label class="custom-radio-2">
                                <input type="radio" name="area-select" checked value="Fukushima"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">Fukushima
                            </label>
                        </li>
                        <li>
                            <label class="custom-radio-2">
                                <input type="radio" name="area-select" value="Iwate"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">Iwate
                            </label>
                        </li>
                        <li>
                            <label class="custom-radio-2">
                                <input type="radio" name="area-select" value="Miyagi"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">Miyagi
                            </label>
                        </li>
                        <li>
                            <label class="custom-radio-2">
                                <input type="radio" name="area-select" value="Yamagata"> <span class="checkmark"></span> <img src="/web-assets/images/area/akita.svg" alt="">Yamagata
                            </label>
                        </li>
                    </ul>
            `;
            $(".current-page-num").html(1);
            $(".total-page-num").html(data.total_page);

            document.getElementById("prev").href = url + "?year="+ year +"&month="+ month +"&day="+ day +"&page=1";
            if(data.total_page ==1){
                document.getElementById("next").href = url + "?year="+ year +"&month="+ month +"&day="+ day +"&page=1";
            }
            else {
                document.getElementById("next").href = url + "?year="+ year +"&month="+ month +"&day="+ day +"&page=2";
            }
            console.log(html);
            $('.post-row').html(html);
            $('.dom-location').html(dom_sort);
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

function find_by_location(){
    // console.log(1);

    $('#area-select');
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