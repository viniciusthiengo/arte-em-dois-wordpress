jQuery('.c_team_sec').each(function(k) {
    if( k % 4 == 0 ) { 
        jQuery(this).nextAll().andSelf().slice(0,4).wrapAll('<div class="swiper-slide"></div>');
    }
});

jQuery('.c_ser_sec').each(function(l) {
    if( l % 6 == 0 ) { 
        jQuery(this).nextAll().andSelf().slice(0,6).wrapAll('<div class="swiper-slide"></div>');
    }
});

jQuery(document).ready(function() {
	
	var swiper = new Swiper('.service_swiper', {
        slidesPerView:2,
		slidesPerColumn:3,
		spaceBetween: 30,
		autoplay:2500,
		loop:true,
		breakpoints: {
            1024: {
                slidesPerView: 2,
				slidesPerColumn: 2,
                spaceBetween: 10
            },
            768: {
                slidesPerView: 2,
				slidesPerColumn: 2,
                spaceBetween: 10
            },
            640: {
                slidesPerView: 2,
				slidesPerColumn: 2,
                spaceBetween: 10
            },
            480: {
                slidesPerView: 1,
				slidesPerColumn: 1,
                spaceBetween: 10
            }
        }
    });
});

jQuery(document).ready(function() {
	var swiper = new Swiper('.team_swiper', {
        slidesPerView: 2,
        slidesPerColumn: 2,
		autoplay:2500,
		loop:true,
		breakpoints: {
            1024: {
                slidesPerView: 2,
				slidesPerColumn: 2,
                spaceBetween: 10
            },
            768: {
                slidesPerView: 2,
				slidesPerColumn: 2,
                spaceBetween: 10
            },
            640: {
                slidesPerView: 2,
				slidesPerColumn: 2,
                spaceBetween: 10
            },
            480: {
                slidesPerView: 1,
				slidesPerColumn: 2,
                spaceBetween: 10
            }
        }
    });
});
  
jQuery(document).ready(function() {
 var swiper = new Swiper('.testi_swiper', {
        pagination: '.swiper-pagination1',
        paginationClickable: true,
        spaceBetween: 20,
		autoplay:3500,
        effect: 'slide',
		loop:true
    });
  });