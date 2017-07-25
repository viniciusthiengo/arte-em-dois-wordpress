jQuery(document).ready(function() {		
		jQuery(".subscribe-messages1 .close_message1").click(function () {
						jQuery('.main_div1').fadeOut(500);
						jQuery('.subscribe-messages1').fadeOut(500);
						clearTimeout(timer)
					});

				var timer;
				jQuery('.subscribe-messages1').show();
				jQuery('.main_div1').show();
					timer = setTimeout(function () {
						jQuery('.main_div1').fadeOut(500);
						jQuery('.subscribe-messages1').fadeOut(500);
					}, 5000);
		
	});

jQuery(document).ready(function() {
		
		jQuery('body').on('click','.settings',function(event){
			jQuery(this).next().slideToggle();
		});
		
	});