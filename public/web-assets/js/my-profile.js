function load_more(id){
    var count_param;
    $(".list-param-0"+id).each(function(){
        var loc = $(this);
        count_param = loc.find(".col-sm-6.col-lg-4");
        // nameContent.push(a); 

    });

    var formData = new FormData();
    formData.append('id',id);
    formData.append('count',count_param.length);

    console.log(count_param.length);

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        url: "load_param_profile",
        type: 'post',
        dataType: "json",
        async: false,
        processData: false,
        contentType: false,
        data: formData,
        success: function (data) {
            if(data.list.length > 0){
                var html = ``;
                for(var i = 0; i< data.list.length;i++){
                    html += `
                    <div class="col-sm-6 col-lg-4">
                        <div class="post-item-5 d-flex">
                            <div class="thumb">
                                <div class="icon-star">
                                    <img src="upload/{{$value->image}}" alt="">
                                </div>
                                <a href="spot-detail/`+ data.list[i].alias +`">
                                    <div class="ratio thumb-image">
                                        <img src="`+ data.arr_image[i] +`" alt="">
                                    </div>
                                </a>
                            </div>
                            <div class="item-content flex-fill d-flex flex-column justify-content-between">
                                <div class="area d-flex align-items-center">
                                    <div class="icon"></div>
                                    <div>
                                        <img src="/web-assets/images/area/akita.svg" alt="">
                                    </div>
                                </div>
                                <a href="spot-detail/`+ data.list[i].alias +`">
        

                                    <div class="item-title">`+ data.list[i].name +` .<span class="text-latin">RISING SUN</span></div>
                                </a>
                                <div class="counters d-flex align-items-center justify-content-end justify-content-lg-start">
                                    <div class="comment-count">
                                        コメント
                                        <div class="count text-latin ml-10">`+ data.list[i].count_comment +`</div>
                                    </div>
                                    <div class="favorite-count ml-20">
                                        <img src="/web-assets/images/icons/heart-gray.svg" alt=""> 
                                        <span class="count text-latin">`+ data.list[i].favorite +`</span>
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

            var load = `
            <div class="load-more-button" onclick="load_more(`+ id +`)">
                <img src="/web-assets/images/icons/reload.svg" alt="">
            </div>
            `;
         
            $('.list-param-0'+id).html(html);
            // $('.dom-load').html(load);

            // $('.post-list-sort-options a').removeClass('active');
            // $('.sort_0'+id).addClass('active');
        }
    });

}