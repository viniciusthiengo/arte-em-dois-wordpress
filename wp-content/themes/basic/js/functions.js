jQuery(document).ready(function ($) {

// toTop button 
	$(window).scroll(function () {
		if ($(this).scrollTop() != 0) $('#toTop').fadeIn();
		else    $('#toTop').fadeOut();
	});
	$('#toTop').click(function () {
		$('body,html').animate({scrollTop: 0}, 500);
	});


// responsive menu 
// 	var nav = $('.topnav nav'),
// 		pull = $('#mobile-menu');
//
// 	if ( window.innerWidth < 1024) {
// 	// if ( $(document).width() < 1024) {
// 		nav.hide();
// 		pull.removeClass('mm-active');
// 	}
// 	pull.click(function() {
// 		if ( nav.is(':visible') ) {
// 			nav.hide();
// 			pull.removeClass('mm-active');
// 		} else {
// 			nav.show();
// 			pull.addClass('mm-active');
// 		}
// 		return false;
// 	});
// 	$(window).resize(function(){
// 		if ( window.innerWidth >= 1024 ) {
// 			pull.hide();
// 			nav.show();
// 		} else {
// 			pull.show().removeClass('mm-active');
// 			nav.hide();
// 		}
// 	});

	// responsive menu
	// $(function () {
		var $window = $(window),
			$nav = $('.topnav nav'),
			$button = $('#mobile-menu');

		$button.on('click', function () {
			$nav.slideToggle();
		});

		$window.on('resize', function () {
			if ($window.width() >= 1024) {
				$nav.show();
			}
		});
	// });


// social buttons
	$('.psb').click(function () {
		window.open($(this).attr("href"), 'displayWindow', 'width=700,height=400,left=200,top=100,location=no, directories=no,status=no,toolbar=no,menubar=no');
		return false;
	});

});
