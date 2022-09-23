$.fn.UITab = function (options) {
    var settings = $.extend({
        
    }, options);

    var el = this;

    el.find('.tab').click(function(){
        if ($(this).hasClass('actie')) return;

        el.find('.tab.active').removeClass('active');
        $(this).addClass('active');        

        el.find('.tab-panel.active').removeClass('active');
        let tabName = $(this).attr('data-tab');
        $('.tab-panel[data-tab="'+tabName+'"]').addClass('active');
    });
}

$('[data-toggle-active]').click(function(e){
    e.preventDefault();
    target = $(this).attr('data-toggle-active');        
    if(target) {            
        $(target).toggleClass('active');
        if ($(this).hasClass('active')) {
            $(this).trigger('active');
        } else {
            $(this).trigger('inactive');
        }
    }
});


$.fn.showModal = function () {
    $(this).addClass('active').trigger('modal-show');
}

$.fn.hideModal = function () {
    $(this).removeClass('active').trigger('modal-hide');
}

$('[data-show-modal]').click(function(e){
    e.preventDefault();
    target = $(this).attr('data-show-modal');        
    if(target) {            
        $(target).showModal();
    }
});


$('[data-hide-modal]').click(function(e){
    e.preventDefault();    
    target = $(this).attr('data-show-modal');        
    if(target) {            
        $(target).hideModal();
    } else {
        $(this).closest('.modal').hideModal();
    }
});
