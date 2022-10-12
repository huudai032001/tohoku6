function delete_image(){
    var check = confirm('本当にキャンセルしますか？');
    if(check == true){
        var image_id = $("#image_id").val();
        var sub_image = $("#sub_image").val();
    
        var formData = new FormData();
        formData.append('image',image_id);
        formData.append('sub_image',sub_image); 
    
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            url: "/un_file",
            type: 'post',
            dataType: "json",
            async: false,
            processData: false,
            contentType: false,
            data: formData,
            success: function (data) {
                if(data.res == true){
                    window.location.href = '/list-spot'; 
                }
    
            }
        });
    }
}

$('.slider').owlCarousel({        
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
// $('.post-slider').owlCarousel({        
//     autoPlay: false,
//     dots: false,
//     nav: true,
//     margin: 20,
//     navText: ['', ''],
//     slideBy: 'page',
//     autoWidth: true

// });
// $('.slider').owlCarousel({        
//     autoPlay: false,
//     dots: false,
//     nav: false,
//     margin: 16,
//     navText: ['', ''],
//     slideBy: 'page',
//     autoWidth: true,
//     responsive: {

//         992: {
//             dots:  true,
//             dotsEach: 2
//         },
//         1600: {
//             dots:  true,
//             dotsEach: 3,
//             margin: 28,
//         }
//     }
// });