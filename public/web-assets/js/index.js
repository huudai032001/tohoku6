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
            if(data.data.length > 0){
                var html = ``;
                for(var i = 0;i<data.data.length;i++){
                    html += `
                    <div class="item">
                        <div class="post-item-1">
                            <a href="event-detail.html">
                                <div class="thumb ratio thumb-hover-anim">
                                    <img src="/upload/`+ data.data[i].image +`" alt="">
                                </div>
                            </a>
                            <div class="item-content">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="flex-fill">
                                        <div class="date text-latin">`+ data.data[i].created_at +` UP!</div>
                                    </div>
                                    <div class="flex-auto ml-20">
                                        <img width="16" src="/web-assets/images/icons/heart-gray.svg" alt=""> 
                                        <span class="count text-latin">123</span>
                                    </div>
                                </div>
                                <div class="title">
                                    <a href="event-detail.html">
                                    `+ data.data[i].name +`
                                    </a>
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
            $('#dom').html(html);

            $('#dom').data('owl.carousel').destroy(); 
            $('#dom').owlCarousel({touchDrag: false, mouseDrag: false});
        },
    });
}

function test(){
    var checkbox = document.getElementsByName("category-select");
    // alert(checkbox);
    for (var i = 0; i < checkbox.length; i++){
        if (checkbox[i].checked === true){
            // alert(checkbox[i].value);
            var formData = new FormData();
            formData.append('category',checkbox[i].value);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                url: "postfindByCategory",
                type: 'post',
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
                data: formData,
                success: function (data) {
                    if(data.data.length > 0){
                        var html = ``;
                        for(var i = 0; i< data.data.length;i++){
                            html += `
                            <div class="item">
                                <div class="post-item-2">
                                    <a href="spot-detail.html">
                                        <div class="thumb ratio thumb-hover-anim">
                                            <img src="/uploads/`+ data.data[i].upload.file_name +`" alt="">
                                        </div>
                                    </a>
                                    <div class="item-content">
                                        <div class="d-none d-sm-flex justify-content-end align-items-center">
                                            <div class="comment-count">
                                                コメント
                                                <div class="count text-latin ml-10">123</div>
                                            </div>
                                            <div class="favorite-count ml-20">
                                                <img width="16" src="/web-assets/images/icons/heart-gray.svg" alt=""> 
                                                <span class="count text-latin">123</span>
                                            </div>
                                        </div>
                                        <div class="title">
                                            <a href="post-detail.html">`+ data.data[i].name +`・RISING SUN</a>
                                        </div>
                                    </div>
                                </div>
                            </div>`;

                        }
                    }
                    else {
                        var html = '';
                    }
                    $('.list-category').html(html);
        
                    $('.list-category').data('owl.carousel').destroy(); 
                    $('.list-category').owlCarousel({touchDrag: false, mouseDrag: false});
                    var owl = $("#dom");
                        owl.owlCarousel({
                        autoPlay: false,
                        dots: false,
                        nav: true,
                        margin: 20,
                        navText: ['', ''],
                        slideBy: 'page',        
                        responsive: {
                            0: {
                                items: 1,
                                autoWidth: true
                            },
                            576: {
                                items: 2,
                                autoWidth: true          
                            },
                            992: {
                                items: 3,
                                autoWidth: false
                            }
                        }
                        });
                }
            });

        }
    }
}