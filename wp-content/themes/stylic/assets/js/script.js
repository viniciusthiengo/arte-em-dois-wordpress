jQuery(window).scroll(function () {
     if (jQuery(window).scrollTop() >= 100) {
         jQuery('nav.navbar').addClass('blackMenu');
     } else {
         jQuery('nav.navbar').removeClass('blackMenu');
     }
 });
 (function ($) {
     $.fn.menumaker = function (options) {
         var cssmenu = $(this),
             settings = $.extend({
                 title: "Menu",
                 format: "dropdown",
                 sticky: false
             }, options);

         return this.each(function () {
             cssmenu.prepend('<div id="menu-button">' + settings.title + '</div>');
             $(this).find("#menu-button").on('click', function () {
                 $(this).toggleClass('menu-opened');
                 var mainmenu = $(this).next('ul');
                 if (mainmenu.hasClass('open')) {
                     mainmenu.hide().removeClass('open');
                 } else {
                     mainmenu.show().addClass('open');
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
                         $(this).siblings('ul').removeClass('open').hide();
                     } else {
                         $(this).siblings('ul').addClass('open').show();
                     }
                 });
             };

             if (settings.format === 'multitoggle') multiTg();
             else cssmenu.addClass('dropdown');

             if (settings.sticky === true) cssmenu.css('position', 'fixed');

             resizeFix = function () {
                 if ($(window).width() > 767) {
                     cssmenu.find('ul').show();
                 }

                 if ($(window).width() <= 767) {
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
         $(document).ready(function () {
             $("#cssmenu").menumaker({
                 title: "",
                 format: "multitoggle"
             });

             $("#cssmenu").prepend("<div id='menu-line'></div>");

             var foundActive = false,
                 activeElement, linePosition = 0,
                 menuLine = $("#cssmenu #menu-line"),
                 lineWidth, defaultPosition, defaultWidth;

             $("#cssmenu > ul > li").each(function () {
                 if ($(this).hasClass('active')) {
                     activeElement = $(this);
                     foundActive = true;
                 }
             });

             if (foundActive === false) {
                 activeElement = $("#cssmenu > ul > li").first();
             }

             defaultWidth = lineWidth = activeElement.width();

             defaultPosition = linePosition = activeElement.position().left;

             menuLine.css("width", lineWidth);
             menuLine.css("left", linePosition);

             $("#cssmenu > ul > li").hover(function () {
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
            /** Set Position of Sub-Menu **/
            var wapoMainWindowWidth = jQuery(window).width();
            jQuery('ul.mobilemenu ul li').mouseenter(function () {
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