(function(){
                        
    const monthNames = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
    ];
    const dayOfWeek = [
        '日',
        '月',
        '火',
        '水',
        '木',
        '金',
        '土'                            
    ];

    function getDaysInMonth(year, month) {
      return new Date(year, month , 0).getDate(); // last day of previous month
    }

    function getDayOfWeek (date) {
        return dayOfWeek[date.getDay()]
    }                        

    let currentDate = new Date();
    let currentDay = currentDate.getDate();
    let currentMonth = currentDate.getMonth() + 1; // months are 0-based
    let currentYear = currentDate.getFullYear();

    let monthSelector = $('.calendar-month-select');
    let daySelector = $('.calendar-day-select');

    let daySlider = null;

    let isFirstLoad = true;

    function updateHtml(){
        monthSelector.find('.year-num').html(currentYear.toString());
        monthSelector.find('.month-num').html(currentMonth.toString());
        let monthName = monthNames[currentMonth - 1];
        monthSelector.find('.month-name').html(monthName.toString()) ;

        let slider = daySelector.find('.slider');
        slider.html('');

        if (daySlider) {
            daySlider.trigger('destroy.owl.carousel');                                
        }

        let activeDay = 1
        if (isFirstLoad) {
            activeDay = currentDay;
        }

        for( let i = 1; i <= getDaysInMonth(currentYear, currentMonth); i++) {            
            let item = $(`
                <div class="day-item" onclick="find_by_day(`+currentYear.toString()+`,`+currentMonth.toString()+`,`+i.toString()+`)">
                    <div class="day-num"></div>
                    <div class="day-of-week"></div>
                </div>
            `);
            
            item.find('.day-num').html(i.toString());
            let d = new Date(currentYear, currentMonth - 1, i);
            item.find('.day-of-week').html(getDayOfWeek(d));

            if (i == activeDay) {
                item.addClass('active');
            }

            item.click(function(){
                daySelector.find('.day-item.active').removeClass('active');
                item.addClass('active');
            })

            slider.append(item);
        }

        daySlider = $('.calendar-day-select .slider').owlCarousel({
            autoWidth: true,
            autoPlay: false,
            dots: false,
            nav: false,
            margin: 20,
            navText: ['', ''],
            slideBy: 10,
            responsive: {
                768: {
                    nav: true
                }
            }
        });
        
        if (isFirstLoad) {
            daySlider.trigger('to.owl.carousel', [currentDay - 1]);
        }
        
        isFirstLoad = false;
    }

    monthSelector.find('.arrow-left').click(function(){
        if (currentMonth > 1) {
            currentMonth -= 1;
        } else {
            currentMonth = 12;
            currentYear -= 1;
        }                            
        updateHtml();
        
    });

    monthSelector.find('.arrow-right').click(function(){
        if (currentMonth < 12) {
            currentMonth += 1;
        } else {
            currentMonth = 1;
            currentYear += 1;
        }                            
        updateHtml();
        
    });

    updateHtml();

    

})();