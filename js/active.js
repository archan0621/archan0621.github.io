(function ($) {
    'use strict';

    // Testimonials Slides Active Code
    if ($.fn.owlCarousel) {
        $(".testimonials-slides").owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            smartSpeed: 1500,
            margin: 5,
            nav: true,
            navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>']
        })
    }
    
    // Search Btn Active Code
    $('#search-btn, #closeBtn').on('click', function () {
        $('body').toggleClass('search-form-on');
    });

    // Progress Bar Active Code
    if ($.fn.barfiller) {
        $('#bar1').barfiller({
            tooltip: true,
            duration: 1000,
            animateOnResize: true
        });
        $('#bar2').barfiller({
            tooltip: true,
            duration: 1000,
            animateOnResize: true
        });
        $('#bar3').barfiller({
            tooltip: true,
            duration: 1000,
            animateOnResize: true
        });
        $('#bar4').barfiller({
            tooltip: true,
            duration: 1000,
            animateOnResize: true
        });
    }

    // ScrollUp Active Code
    if ($.fn.scrollUp) {
        $.scrollUp({
            scrollSpeed: 1500,
            scrollText: '<i class="fa fa-angle-up" aria-hidden="true"></i>'
        });
    }

    // Sticky Active Code
    if ($.fn.sticky) {
        $("#header").sticky({
            topSpacing: 0
        });
    }

    // Video Active Code
    if ($.fn.magnificPopup) {
        $('.video--play--btn').magnificPopup({
            disableOn: 0,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: true,
            fixedContentPos: false
        });
    }

    // PreventDefault a Click
    $("a[href='#']").on('click', function ($) {
        $.preventDefault();
    });

    // wow Active Code
    if ($.fn.init) {
        new WOW().init();
    }

    // matchHeight Active Code
    if ($.fn.matchHeight) {
        $('.item').matchHeight();
    }

    var $window = $(window);

    // Preloader active code
    $window.on('load', function () {
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    });

})(jQuery);