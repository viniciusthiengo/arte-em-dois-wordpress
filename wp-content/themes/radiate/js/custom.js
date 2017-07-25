/* global radiateScriptParam */
jQuery(document).ready(function() {

	if( radiateScriptParam.radiate_image_link === ''){
		var divheight = jQuery('.header-wrap').height()+'px';
		jQuery('body').css({ 'margin-top': divheight });
	}

	jQuery('.header-search-icon').click(function(){
		jQuery('#masthead .search-form').toggle('slow');
	});

	jQuery(window).bind('scroll', function() {
		header_image_effect();
	});

   // Scroll to top
   jQuery('#scroll-up').hide();
   jQuery(function () {
      jQuery(window).scroll(function () {
         if (jQuery(this).scrollTop() > 1000) {
            jQuery('#scroll-up').fadeIn();
         } else {
            jQuery('#scroll-up').fadeOut();
         }
      });
      jQuery('a#scroll-up').click(function () {
         jQuery('body,html').animate({
            scrollTop: 0
         }, 800);
         return false;
      });
   });

});


function header_image_effect() {
	var scrollPosition = jQuery(window).scrollTop();
	jQuery('#parallax-bg').css('top', (0 - (scrollPosition * 0.2)) + 'px');
}

jQuery(document).ready(function() {
    jQuery('.better-responsive-menu  #site-navigation .menu-toggle').click(function() {
      jQuery('.better-responsive-menu  #site-navigation .menu-primary-container > ul,.better-responsive-menu  #site-navigation .menu > ul').slideToggle('slow');
    });
});
