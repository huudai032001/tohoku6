function find_category(){
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
                            <div class="col-sm-6 col-lg-4">
                                <div class="post-item-5 d-flex">
                                    <div class="thumb">
                                        <div class="icon-star">
                                            <img src="upload/{{$value->image}}" alt="">
                                        </div>
                                        <a href="spot-detail/`+ data.data[i].id +`">
                                            <div class="ratio thumb-image">
                                                <img src="/uploads/`+ data.data[i].upload.file_name +`" alt="">
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
                                        <a href="spot-detail/`+ data.data[i].id +`">
                

                                            <div class="item-title">`+ data.data[i].name +` .<span class="text-latin">RISING SUN</span></div>
                                        </a>
                                        <div class="counters d-flex align-items-center justify-content-end justify-content-lg-start">
                                            <div class="comment-count">
                                                コメント
                                                <div class="count text-latin ml-10">`+ data.data[i].count_comment +`</div>
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