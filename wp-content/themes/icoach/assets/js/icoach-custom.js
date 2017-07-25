//--------------- Bootstrap Carousel --------------------//
function hasScrolled() {
    var $myCarousel = jQuery('#myCarousel');

    // Initialize carousel
    $myCarousel.carousel();
    ({
        interval: 1000
    })
    /* Demo Scripts for Bootstrap Carousel and Animate.css article on SitePoint by Maria Antonietta Perna */
    function doAnimations(elems) {
        var animEndEv = 'webkitAnimationEnd animationend';

        elems.each(function () {
            var $this = $(this),
                $animationType = $this.data('animation');

            // Add animate.css classes to
            // the elements to be animated
            // Remove animate.css classes
            // once the animation event has ended
            $this.addClass($animationType).one(animEndEv, function () {
                $this.removeClass($animationType);
            });
        });
    }

    // Select the elements to be animated
    // in the first slide on page load
    var $firstAnimatingElems = $myCarousel.find('.item:first')
        .find('[class ^= "animated"]');

    // Apply the animation using our function
    doAnimations($firstAnimatingElems);

    // Pause the carousel
    $myCarousel.carousel('pause');

    // Attach our doAnimations() function to the
    // carousel's slide.bs.carousel event
    $myCarousel.on('slide.bs.carousel', function (e) {
        // Select the elements to be animated inside the active slide
        var $animatingElems = $(e.relatedTarget)
            .find("[class ^= 'animated']");
        doAnimations($animatingElems);
    });}
    // End Bootstrap Carousel //
/* Start Menu */
(function ($) {
    $.fn.menumaker = function (options) {
        var cssmenu = jQuery(this),
            settings = jQuery.extend({
                title: "",
                format: "dropdown",
                sticky: false
            }, options);
        return this.each(function () {
            cssmenu.prepend('<div id="menu-button">' + settings.title + '</div>');
            jQuery(this).find("#menu-button").on('click', function () {
                jQuery(this).toggleClass('menu-opened');
                var mainmenu = jQuery(this).next('ul');
                if (mainmenu.hasClass('open')) {
                    mainmenu.removeClass('open');
                } else {
                    mainmenu.show().addClass('open');
                    if (settings.format === "dropdown") {
                        mainmenu.find('ul');
                    }
                }
            });
            cssmenu.find('li ul').parent().addClass('has-sub');
            multiTg = function () {
                cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
                cssmenu.find('.submenu-button').on('click', function () {
                    jQuery(this).toggleClass('submenu-opened');
                    if (jQuery(this).siblings('ul').hasClass('open')) {
                        jQuery(this).siblings('ul').removeClass('open').hide();
                    } else {
                        jQuery(this).siblings('ul').addClass('open').show();
                    }
                });
            };
            if (settings.format === 'multitoggle') multiTg();
            else cssmenu.addClass('dropdown');
            if (settings.sticky === true) cssmenu.css('position', 'fixed');
            if (settings.sticky === true) cssmenu.css('position', 'fixed');
            if (settings.sticky === true) cssmenu.css('position', 'fixed');
            if (settings.sticky === true) cssmenu.css('position', 'fixed');
            resizeFix = function () {
                if (jQuery(window).width() > 767) {
                    cssmenu.find('ul');
                }
                if (jQuery(window).width() <= 767) {
                }
            };
            resizeFix();
            return jQuery(window).on('resize', resizeFix);
        });
    };
})(jQuery);
(function ($) {
    jQuery(document).ready(function () {
        jQuery(document).ready(function () {
            jQuery("#cssmenu").menumaker({
                title: "",
                format: "multitoggle"
            });
            var foundActive = false,
                activeElement, linePosition = 0,
                width = 0,
                menuLine = jQuery("#cssmenu #menu-line"),
                lineWidth, defaultPosition, defaultWidth;
            jQuery("#cssmenu > ul > li").each(function () {
                if (jQuery(this).hasClass('current-menu-item')) {
                    activeElement = jQuery(this);
                    foundActive = true;
                }
            });
            if (foundActive != true) {
                activeElement = jQuery("#cssmenu > ul > li").first();
            }
            if (foundActive == true) {
                jQuery(".offside").append("<div id='menu-line'></div>");
            }
            defaultWidth = lineWidth = activeElement.width();
            defaultPosition = linePosition = activeElement.position();
            menuLine.css("width", lineWidth);
            menuLine.css("left", linePosition);
            jQuery("#cssmenu > ul > li").hover(function () {
                    activeElement = $(this);
                    lineWidth = activeElement.width();
                    linePosition = activeElement.position().left;
                    menuLine.css("width", lineWidth);
                    menuLine.css("left", linePosition);
                },
                function () {
                    menuLine.css("left", defaultPosition);
                    menuLine.css("width", defaultWidth);
                });
        });
        /* Set Position of Sub-Menu */
        var wapoMainWindowWidth = jQuery(window).width();
        jQuery('#cssmenu ul ul li').mouseenter(function () {
            var subMenuExist = jQuery(this).find('.sub-menu').length;
            if (subMenuExist > 0) {
                var subMenuWidth = jQuery(this).find('.sub-menu').width();
                var subMenuOffset = jQuery(this).find('.sub-menu').parent().offset().left + subMenuWidth;
                if ((subMenuWidth + subMenuOffset) > wapoMainWindowWidth) {
                    jQuery(this).find('.sub-menu').removeClass('submenu-left');
                    jQuery(this).find('.sub-menu').addClass('submenu-right');
                } else {
                    jQuery(this).find('.sub-menu').removeClass('submenu-right');
                    jQuery(this).find('.sub-menu').addClass('submenu-left');
                }
            }
        });
    });
})(jQuery);
jQuery(window).scroll(function () {
    if (jQuery(window).scrollTop() > 150) {
        jQuery('div#icoach_navigation').addClass('fixed-header');
    } else {
        jQuery('div#icoach_navigation').removeClass('fixed-header');
    }
});
/*Services-tab-left Menu start*/
function resize() {
    if (jQuery(window).width() < 992) {
        jQuery('.services-tab-collapse').addClass('navbar-collapse collapse');
    } else {
        jQuery('.services-tab-collapse').removeClass('navbar-collapse collapse');
    }
}

jQuery(document).ready(function () {
    jQuery(window).resize(resize);
    resize();
});
/*Services-tab-left Menu end*/
jQuery(document).ready(function () {
    /*carousel start
     *carousel end
     *Nav Active start*/
    jQuery('#cssmenu ul li a').click(function (e) {
        jQuery('#cssmenu ul li a').removeClass('active');
        jQuery(this).addClass('active');
    });
    /*Nav Active end*/

    /*Services tab start*/
    jQuery("#services-tabs a").click(function (e) {
        e.preventDefault();
        jQuery(this).tab('show');
    });
    jQuery("#services-tabs a").click(function (e) {
        e.preventDefault();
        jQuery(this).tab('show');
    });
    /*Services tab end*/
    /*Services-tab-left Menu start*/
    jQuery(".services-tabs-left li a").click(function () {
        jQuery(".selected-option").text(jQuery(this).text());
    });
    /*Services-tab-left Menu end*/
});
jQuery(window).load(function(){
    jQuery('.preloader').delay(400).fadeOut(500);
});

//one page smooth scrolling
jQuery(function() {
  jQuery('a[href*="#"]:not([href="#"])').click(function(event) {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = jQuery(this.hash);
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        jQuery('html, body').animate({
          scrollTop: target.offset().top - 110
        }, 1000);
        jQuery('.offside').removeClass('open');
        jQuery('#menu-button').removeClass('menu-opened');
        event.preventDefault();
      }
    }
  });
});