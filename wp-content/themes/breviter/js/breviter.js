(function ($) {
	'use strict';

	// Template Helper Function
	$.fn.hasAttr = function(attribute) {
		var obj = this;

		if (obj.attr(attribute) !== undefined) {
			return true;
		} else {
			return false;
		}
	};

	function checkVisibility (object) {
		var el = object[0].getBoundingClientRect(),
			wHeight = $(window).height(),
			scrl =  wHeight - (el.bottom - el.height),
			condition = wHeight + el.height;

		if (scrl > 0  && scrl < condition) {
			return true;
		} else {
			return false;
		}
	};

	// Scroll Events
	var keys = {37: 1, 38: 1, 39: 1, 40: 1};
	function preventDefault(e) {
		e = e || window.event;
		if (e.preventDefault)
			e.preventDefault();
		e.returnValue = false;
	};
	function preventDefaultForScrollKeys(e) {
	    if (keys[e.keyCode]) {
	        preventDefault(e);
	        return false;
	    }
	};
	function disableScroll() {
		if (window.addEventListener) window.addEventListener('DOMMouseScroll', preventDefault, false);
		window.onwheel = preventDefault; // modern standard
		window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
		window.ontouchmove  = preventDefault; // mobile
		document.onkeydown  = preventDefaultForScrollKeys;
	};
	function enableScroll() {
		if (window.removeEventListener) window.removeEventListener('DOMMouseScroll', preventDefault, false);
		window.onmousewheel = document.onmousewheel = null;
		window.onwheel = null;
		window.ontouchmove = null;
		document.onkeydown = null;
	};

	var breviter = {
		init: function () {
			this.checkInputsForValue();
			this.nrOnlyInputs();
			this.slickInit();
			this.scrollEvent();
			this.toggles();
			this.theiaInit();
			this.googleMaps();
		},

		// Template Custom Functions
		checkInputsForValue: function () {
			$(document).on('focusout', '.check-value', function () {
				var text_val = $(this).val();
				if (text_val === "" || text_val.replace(/^\s+|\s+$/g, '') === "") {
					$(this).removeClass('has-value');
				} else {
					$(this).addClass('has-value');
				}
			});
		},

		nrOnlyInputs: function () {
			$('.nr-only').keypress(function (e) {
				if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
					return false;
				}
			});
		},

		slickInit: function () {
			$('.main-slider .slides-list').slick({
				autoplaySpeed: 3500,
				infinite: true,
				autoplay: true,
				dots: false,
				arrows: true,
				fade: true,
				speed: 900
			});

			$('.slider-post .slides-list').slick({
				autoplaySpeed: 2500,
				infinite: true,
				autoplay: true,
				dots: false,
				arrows: true,
				fade: true,
				speed: 600
			});
		},

		scrollEvent: function () {
			// Main Scroll Event
			$(window).on('scroll', function () {
				var st = $(window).scrollTop();

				// Show Visible Elements
				$('.check-screen-visibility').each(function () {
					var obj = $(this);

					if (obj.visible()) {
						setTimeout(function () {
							obj.addClass('visible');
						}, 250);
					}
				});

				// Fixed Header
				if ($('.main-header').hasClass('sticky')) {
					if (st > $('.main-header').height()) {
						$('.main-header').addClass('fixed');
						$('.content-wrapper').css('margin-top', $('.main-header .top-bar').height());
					} else {
						$('.main-header').removeClass('fixed');
						$('.content-wrapper').css('margin-top', 0);
					}
				}
			});
		},

		toggles: function () {
			// Scroll Top Btn
			$('.scroll-top-btn').on('click', function () {
				$('body, html').animate({scrollTop: 0}, 1250, 'swing');
			});

			// Search Form Toggle
			$('.search-form-toggle').on('click', function () {
				$('.main-search-form').addClass('visible');
				$('body').addClass('show-overlay');
				return false;
			});

			$('.main-search-form').on('click', function (e) {
				e.stopPropagation();
			});

			$(document).on('click', function () {
				$('.main-search-form').removeClass('visible');
				$('body').removeClass('show-overlay');
			});

			// Scroll to comments
			$('.post-comments-link').on('click', function (e) {
				e.preventDefault();

				$('html, body').animate({
					scrollTop: ($('.respond-area').eq(0).offset().top - ($('.main-header .top-bar').outerHeight() + 30))
				}, 500);
			});

			// Video Toggles
			$('.video-toggle').on('click', function () {
				$(this).hide();
				$(this).next().addClass('fade');
				$(this).next().next()[0].src += "?autoplay=1";
			});

			// Mobile Nav
			$('.mobile-nav-toggle').on('click', function () {
				$('.main-nav').addClass('visible');
				$('body').addClass('show-overlay');
				return false;
			});

			$('.main-nav').on('click', function (e) {
				if ($(window).width() < 992) {
					e.stopPropagation();
				}
			});

			$(document).on('click', function () {
				$('.main-nav').removeClass('visible');
				$('body').removeClass('show-overlay');
			});
		},

		accordionInit: function () {
			var accordion = $('.accordion-group');

			accordion.each(function () {
				var accordion = $(this).find('.accordion-box');

				accordion.each(function () {
					var obj = $(this),
						header = $(this).find('.box-header h4'),
						body = $(this).find('.box-body');

					header.on('click', function () {
						if (obj.hasClass('open')) {
							body.velocity('slideUp', {
								duration: 150,
								complete: function () {
									obj.removeClass('open');
								}
							});
						} else {
							obj.addClass('open');
							body.velocity('slideDown', {duration: 195});
						}
					});
				});
			});
		},

		theiaInit: function () {
			$('.main-sidebar-wrapper').theiaStickySidebar({
				additionalMarginBottom: 30,
				additionalMarginTop: $('.main-header .top-bar').height() + 75
			});
		},

		googleMaps: function () {
			// Describe Google Maps Init Function
			function initialize_contact_map (customOptions) {
                var mapOptions = {
                        center: new google.maps.LatLng(customOptions.map_center.lat, customOptions.map_center.lon),
                        zoom: parseInt(customOptions.zoom),
                        scrollwheel: false,
                        disableDefaultUI: true,
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        styles: [{ stylers: [{saturation: -100}]}]
                    };
                var contact_map = new google.maps.Map($('#map-canvas')[0], mapOptions),
                    marker = new google.maps.Marker({
                        map: contact_map,
                        position: new google.maps.LatLng(customOptions.marker_coord.lat, customOptions.marker_coord.lon),
                        animation: google.maps.Animation.DROP,
                        icon: customOptions.marker,
                    });
            }

            if ($('#map-canvas').length) {
            	var customOptions = $('#map-canvas').data('options');
                google.maps.event.addDomListener(window, 'load', initialize_contact_map(customOptions));
            }
		}
	};

	$(document).ready(function(){
		breviter.init();

		setTimeout(function () {
			$('body').addClass('dom-ready');

			if ($('#site-preloader').length) {
				$('#site-preloader').addClass('start-preloader');
				$('body').addClass('delayed-start');
			}
		}, 300);

		setTimeout(function () {
			$('body').removeClass('delayed-start');
		}, 3600);
	});
}(jQuery));
