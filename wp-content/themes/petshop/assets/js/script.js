/**** Top header fixed js ****/
jQuery(window).scroll(function () {
    if (jQuery(window).scrollTop() >= 160) {
        jQuery('nav').addClass('fixed-header');
    } else {
        jQuery('nav').removeClass('fixed-header');
    }
});

function resize() {
    if (jQuery(window).width() < 767) {
        jQuery('html').addClass('MobileView');
    } else {
        jQuery('html').removeClass('MobileView');
    }

}
/**** Dogcare Custom Js ****/
/* Main-Menu Js */
/* Deafult js */
(function ($) {
    $.fn.menumaker = function (options) {
        var cssmenu = $(this),
            settings = $.extend({
                format: "dropdown",
                sticky: false
            }, options);
        return this.each(function () {
            $(this).find(".button").on('click', function () {
                $(this).toggleClass('menu-opened');
                var mainmenu = $(this).next('ul');
                if ($('body').hasClass('MenuBackground')) {
                    $('body').removeClass('MenuBackground');
                } else {
                    $('body').addClass('MenuBackground');
                }
                if (mainmenu.hasClass('open')) {
                    mainmenu.toggle().removeClass('open');
                } else {
                    mainmenu.toggle().addClass('open');
                    if (settings.format === "dropdown") {
                        mainmenu.find('ul').show();
                    }
                }
            });
            cssmenu.find('li ul').parent().addClass('has-sub');
            multiTg = function () {
                cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
                cssmenu.find('.submenu-button').on('click', function () {
                    $(this).toggleClass('submenu-opened');
                    if ($(this).siblings('ul').hasClass('open')) {
                        $(this).siblings('ul').removeClass('open').slideToggle();
                    } else {
                        $(this).siblings('ul').addClass('open').toggle();
                    }
                });
            };
            if (settings.format === 'multitoggle') multiTg();
            else cssmenu.addClass('dropdown');
            if (settings.sticky === true) cssmenu.css('position', 'fixed');
            resizeFix = function () {
                var mediasize = 700;
                if ($(window).width() > mediasize) {
                    cssmenu.find('ul').show();
                }
                if ($(window).width() <= mediasize) {
                    cssmenu.find('ul').hide().removeClass('open');
                }
            };
            resizeFix();
            return $(window).on('resize', resizeFix);
        });
    };
})(jQuery);

(function ($) {
    $(document).ready(function () {
        $("#cssmenu").menumaker({
            format: "multitoggle"
        });
        $('.our-news-list .owl-carousel').owlCarousel({
            loop: true,
            margin: 62,
            //        autoplay: true,
            //        autoplaySpeed: 1000,    
            nav: true,
            navText: false,
            navClass: ['owl-prev icon-back', 'owl-next icon-next'],
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                500: {
                    items: 2,
                    margin: 30,
                },
                650: {
                    items: 3,
                    margin: 20,
                },
                1000: {
                    items: 3,
                }
            }
        });
    });
})(jQuery);
/* Main-Menu Js End */