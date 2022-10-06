(function($){
    $('[data-toggle="nav-bar-panel"]').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        $('.nav-bar-panel').toggleClass('active');
    });

    $('.section-home-top .posts-panel').UITab();

    $('.calendar-posts .post-slider').owlCarousel({        
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

    $('.spot-posts .post-slider').owlCarousel({        
        autoPlay: false,
        dots: false,
        nav: true,
        margin: 20,
        navText: ['', ''],
        slideBy: 'page',
        autoWidth: true

    });

    $('.section-tohoku-media .slider').owlCarousel({        
        autoPlay: false,
        dots: false,
        nav: false,
        margin: 16,
        navText: ['', ''],
        slideBy: 'page',
        autoWidth: true,
        responsive: {

            992: {
                dots:  true,
                dotsEach: 2
            },
            1600: {
                dots:  true,
                dotsEach: 3,
                margin: 28,
            }
        }
    });

    $('.section-pickup .slider').owlCarousel({        
        autoPlay: false,
        dots: false,
        nav: false,
        margin: 16,
        navText: ['', ''],
        slideBy: 'page',
        autoWidth: true,
        responsive: {

            992: {
                dots:  true,
                dotsEach: 2
            },
            1600: {
                dots:  true,
                dotsEach: 3,
                margin: 28,
            }
        }
    });

    $('.ui-tabable').UITab();

    $('.modal .modal_backdrop, .modal .modal_close').click(function(){    
        $(this).closest('.modal').hideModal();        
    });

    $('.toggle-select-panel .backdrop, .toggle-select-panel .button-close').click(function(){
        $(this).closest('.toggle-select-panel').removeClass('active');
    });

    $('.area-select').click(function(){
        $('.area-select-panel').addClass('active');
    });

    $('.category-select').click(function(){
        $('.category-select-panel').addClass('active');
    });

    $('.section-spot-detail .spot-images .slider').owlCarousel({        
        autoPlay: false,
        dots: false,
        nav: false,
        margin: 16,
        navText: ['', ''],
        slideBy: 'page',
        autoWidth: true        
    });

    $('#modal-spot-actions [data-to-report-spot]').click(function(e){
        e.preventDefault();
        $('#modal-spot-actions').hideModal();
        $('#modal-report').showModal();
    });

    $('#modal-review-actions [data-to-report-review]').click(function(e){
        e.preventDefault();
        $('#modal-review-actions').hideModal();
        $('#modal-report').showModal();
    });

    $('.section-post-reviews .toggle-button').click(function(){
        $('.section-post-reviews .toggle-content').slideToggle();
    });

    $('#modal-report .button-form-submit').click(async function(){

        $('#modal-report').hideModal();

        $('#ajax-loading-overlay .loading-icon').show();
        $('#ajax-loading-overlay .result-message').html('').hide();
        $('#ajax-loading-overlay').show();
        // fake ajax call
        $('#ajax-loading-overlay').addClass('is-loading');
        await new Promise(r => setTimeout(r, 2000));

        // show ajax result
        $('#ajax-loading-overlay .loading-icon').hide();
        $('#ajax-loading-overlay .result-message').html('事務局への報告を送信しました').show();
        $('#ajax-loading-overlay').removeClass('is-loading');
    });    

    $('.ajax-loading-overlay').click(function(){
        if ($(this).hasClass('is-loading')) {
            return;
        }
        $(this).fadeOut();
    });

    $('#modal-review-actions [data-to-delete-review]').click(async function(e){
        e.preventDefault();
        $('#modal-review-actions').hideModal();
        
        $('#ajax-loading-overlay .loading-icon').show();
        $('#ajax-loading-overlay .result-message').html('').hide();
        $('#ajax-loading-overlay').show();
        // fake ajax call
        $('#ajax-loading-overlay').addClass('is-loading');
        await new Promise(r => setTimeout(r, 2000));

        // show ajax result
        $('#ajax-loading-overlay .loading-icon').hide();
        $('#ajax-loading-overlay .result-message').html('口コミを削除しました').show();
        $('#ajax-loading-overlay').removeClass('is-loading');
        
    });

    $('.custom-input-image').each(function(){
        let el = $(this);
        let input = el.find('input').first();
        let previewImage = el.find('.preview-image img').first();
        
    });
    

    $('.section-event-detail .event-images .slider').owlCarousel({        
        autoPlay: false,
        dots: false,
        nav: false,
        margin: 16,
        navText: ['', ''],
        slideBy: 'page',
        autoWidth: true        
    });

    $('.feature-detail .image-gallery').lightSlider({
      gallery:true,
      item:1,
      thumbItem:5,
      thumbMargin:10,
      slideMargin:20,
      galleryMargin: 15,
      controls: false,
    });  

    $('.feature-detail .image-carousel .slider').owlCarousel({        
        autoPlay: false,
        dots: false,
        nav: false,
        margin: 16,
        navText: ['', ''],
        slideBy: 'page',
        autoWidth: true        
    });

    $('.good-detail .good-images .slider').lightSlider({
      gallery:true,
      item:1,
      thumbItem:5,
      thumbMargin:10,
      slideMargin:20,
      galleryMargin: 15,
      controls: false,
    });  

    $('.password-showing-toggle').click(function(){
        $(this).parent().find('input').attr('type', function(index, attr){
            return attr == 'password' ? 'text' : 'password';
        });
    });

})(jQuery);

function cancel(){
    $check = confirm("本当にキャンセルしますか？");
    if($check == true){
        window.location.href = "/my-profile";
    }
}