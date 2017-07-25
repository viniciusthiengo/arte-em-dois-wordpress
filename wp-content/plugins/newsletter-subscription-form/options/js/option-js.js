/*Admin options pannal data value*/
function weblizar_nls_option_data_save(name) 
	{ 	//tinyMCE.triggerSave();
		var weblizar_settings_save= "#weblizar_nls_settings_save_"+name;
		var weblizar_theme_options = "#weblizar_nls_"+name;
		var weblizar_settings_save_success = ".success-msg";
		var weblizar_loding = ".msg-overlay";		
		jQuery(weblizar_loding).show();	
		jQuery(weblizar_settings_save).val("1");        
	    jQuery.ajax({
				url:'?page=nls-weblizar',
				type:'post',
				data : jQuery(weblizar_theme_options).serialize(),
				 success : function(data)
				 { 
				 	jQuery(weblizar_loding+' #loading-image').hide();
				 	jQuery(weblizar_settings_save_success).fadeIn();
					jQuery(weblizar_settings_save_success).fadeOut(1000);
					jQuery(weblizar_loding).fadeOut(2000);					
					window.location = '?page=nls-weblizar';
				 }			
		});
	}
	
/*Admin options value reset */
	function weblizar_nls_option_data_reset(name) 
	{  
		var r=confirm("Do you want reset your theme setting!")
		if (r==true)
		{		var weblizar_settings_save= "#weblizar_nls_settings_save_"+name;
				var weblizar_theme_options = "#weblizar_nls_"+name;
				var weblizar_loding = ".msg-overlay";
				var weblizar_settings_save_reset = ".reset-msg";
				jQuery(weblizar_loding).show();
				jQuery(weblizar_settings_save).val("2");
				jQuery.ajax({
				   url:'?page=nls-weblizar',
				   type:'post',
				   data : jQuery(weblizar_theme_options).serialize(),
				   success : function(data){
					jQuery(weblizar_loding+' #loading-image').hide();
					jQuery(weblizar_settings_save_reset).fadeIn();
					jQuery(weblizar_settings_save_reset).fadeOut(1000);
					jQuery(weblizar_loding).fadeOut(2000);
					window.location = '?page=nls-weblizar';
				}			
			});
		} else  {
		alert("Cancel! reset theme setting process");  }		
	}

/*Admin options value reset */
	function weblizar_nls_option_data_restored(name) 
	{  
		var r=confirm("Do you want restored all your theme setting!")
		if (r==true)
		{		var weblizar_settings_save= "#weblizar_nls_settings_save_"+name;
				var weblizar_theme_options = "#weblizar_nls_"+name;
				var weblizar_loding = ".msg-overlay";
				var weblizar_settings_save_restored = ".restored-msg";
				jQuery(weblizar_loding).show();
				jQuery(weblizar_settings_save).val("3");
				jQuery.ajax({
				   url:'?page=nls-weblizar',
				   type:'post',
				   data : jQuery(weblizar_theme_options).serialize(),
				   success : function(data){
					jQuery(weblizar_loding+' #loading-image').hide();
					jQuery(weblizar_settings_save_restored).fadeIn();
					jQuery(weblizar_settings_save_restored).fadeOut(1000);
					jQuery(weblizar_loding).fadeOut(2000);
					window.location = '?page=nls-weblizar';
				}			
			});
		} else  {
		alert("Cancel! reset theme setting process");  }		
	}
	

jQuery(document).ready(function(){
	
	
	// rate it option js
	
	jQuery( '.rating-stars' ).find( 'a' ).hover(
		function() {
			jQuery( this ).nextAll( 'a' ).children( 'span' ).removeClass( 'dashicons-star-filled' ).addClass( 'dashicons-star-empty' );
			jQuery( this ).prevAll( 'a' ).children( 'span' ).removeClass( 'dashicons-star-empty' ).addClass( 'dashicons-star-filled' );
			jQuery( this ).children( 'span' ).removeClass( 'dashicons-star-empty' ).addClass( 'dashicons-star-filled' );
		}, function() {
			var rating = $( 'input#rating' ).val();
			if ( rating ) {
				var list = $( '.rating-stars a' );
				list.children( 'span' ).removeClass( 'dashicons-star-filled' ).addClass( 'dashicons-star-empty' );
				list.slice( 0, rating ).children( 'span' ).removeClass( 'dashicons-star-empty' ).addClass( 'dashicons-star-filled' );
			}
		}
	);
	
	
	// media upload js
	var uploadID = ''; /*setup the var*/
	var get_version ='';
	jQuery('.upload_image_button').click(function() {
		uploadID = jQuery(this).prev('input'); /*grab the specific input*/
		get_version =jQuery('#get_version').val();
		
		formfield = jQuery('.upload').attr('name');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		
		window.send_to_editor = function(html)
		{	
		if (get_version => '4.5'){
			imgurl = jQuery(html).attr('src');
		}else{
			imgurl = jQuery('img',html).attr('src');
			}	
			uploadID.val(imgurl); /*assign the value to the input*/
			tb_remove();
		};		
		return false;
	});
	
	
	/* cookie js */
	
	if(getCookie('nls_currentab')!=""){
		jQuery('ul.options_tabs li a#'+getCookie('nls_currentab')).parent().addClass('currunt active');
		jQuery('ul.options_tabs li a#'+getCookie('nls_currentab')).addClass('active');
		jQuery('ul.options_tabs li:first-child').removeClass('active');
	}

	// menu click	
	jQuery('ul.options_tabs > li > a').click(function(){		
		if (jQuery(this).attr('class') != 'active')
		{ 		
			jQuery('ul.options_tabs li a').removeClass('active');
			jQuery(this).addClass('active');
			jQuery('.ui-tabs-panel').removeClass('currunt');
		  
			jQuery('ul.options_tabs li').removeClass('active');
			jQuery(this).parent().addClass('active');		
			var divid =  jQuery(this).attr("id");
			document.cookie="nls_currentabChild=;expires="+Date(jQuery.now());
			document.cookie="nls_currentab="+divid;
			var add="div#"+divid;
			var strlenght = add.length;
			
			if(strlenght<17)
			{	
				var add="div#option-ui-id-"+divid;
				var ulid ="#ui-id-"+divid;
				jQuery('ul.options_tabs li').removeClass('currunt');
				jQuery(ulid).parent().addClass('currunt');	
			}			
			jQuery('div.ui-tabs-panel').addClass('deactive');
			jQuery('div.ui-tabs-panel').removeClass('active');
			jQuery(add).removeClass('deactive');		
			jQuery(add).addClass('active');		
		}
	});	
	if(getCookie('nls_currentab')!=""){
			var divid = getCookie('nls_currentab');
			var add="div#"+divid;
			var strlenght = add.length;
			
			if(strlenght<17)
			{	
				var add="div#option-ui-id-"+divid;
				var ulid ="#ui-id-"+divid;
				jQuery('ul.options_tabs li li ').removeClass('currunt');
				jQuery(ulid).parent().addClass('currunt');	
			}			
			jQuery('div.ui-tabs-panel').addClass('deactive');
			jQuery('div.ui-tabs-panel').removeClass('active');
			jQuery(add).removeClass('deactive');		
			jQuery(add).addClass('active');	
		}		
	/* Function to get cookie */
	function getCookie(cname) {
		var name = cname + "=";
		var ca = document.cookie.split(';');
		for(var i=0; i<ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1);
			if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
		}
		return "";
	}	
	
	
		
/*Theme Activate Restored options JS */
	/*Remove any record from subscribe data table */
	jQuery('#template-selection').click(function(){
		var r=confirm("Do you want delete the record!")
		if (r==true)
		{
			var nls_hidden_box_id= "#weblizar_nls_remove_record";
			var layout_form_id = "#wl_nls_subscribe_form";				
			var weblizar_settings_removed_success = ".remove-msg";
			var weblizar_loding = ".msg-overlay";	
				jQuery(weblizar_loding).show();	
				jQuery(nls_hidden_box_id).val('1');
				jQuery.ajax({
				   url:'?page=nls-weblizar',
				   type:'post',
				   data : jQuery(layout_form_id).serialize(),
				   success : function(data){
					jQuery(weblizar_loding+' #loading-image').hide();
					jQuery(weblizar_settings_removed_success).fadeIn();
					jQuery(weblizar_settings_removed_success).fadeOut(1000);
					jQuery(weblizar_loding).fadeOut(2000);
					window.location = '?page=nls-weblizar';
					}
				});
		} else {
		alert("Cancel! delete the record process");  }	
	});

	/*Theme Activate Save options JS */
		/*Remove any record from subscribe data table */
		jQuery("#theme-activation").click(function(){
			var r=confirm("Do you want to activate this!")
			if (r==true)
			{
				var nls_hidden_box_id= "#weblizar_nls_settings_save_template_option";
				var layout_form_id = "#weblizar_nls_template_option";				
				var weblizar_settings_removed_success = ".theme-activation-msg";
				var weblizar_loding = ".msg-overlay";	
					jQuery(weblizar_loding).show();	
					jQuery(nls_hidden_box_id).val('1');
					jQuery.ajax({
					   url:'?page=nls-weblizar',
					   type:'post',
					   data : jQuery(layout_form_id).serialize(),
					   success : function(data){
						jQuery(weblizar_loding+' #loading-image').hide();
						jQuery(weblizar_settings_removed_success).fadeIn();
						jQuery(weblizar_settings_removed_success).fadeOut(1000);
						jQuery(weblizar_loding).fadeOut(2000);
						window.location = '?page=nls-weblizar';
						}
					});
			} else {
			alert("Cancel! delete the record process");  }	
		});
	
	//onclick Appearance Option settings saved js
	jQuery('#weblizar_nls_option_data_save_appearance_option').click(function(){ 
		
		var weblizar_settings_save_success = ".success-msg";
		var weblizar_loding = ".msg-overlay";		
		var nls_hidden_box_id= "#weblizar_nls_settings_save_appearance_option";
		var layout_form_id = "#weblizar_nls_appearance_option";				
		jQuery(weblizar_loding).show();
			jQuery(nls_hidden_box_id).val("1");
			jQuery.ajax({
			   url:'?page=nls-weblizar',
			   type:'post',
			   data : jQuery(layout_form_id).serialize(),
			   success: function(data) 
				{	
					jQuery(weblizar_loding+' #loading-image').hide();
					jQuery(weblizar_settings_save_success).fadeIn();
					jQuery(weblizar_settings_save_success).fadeOut(1000);
					jQuery(weblizar_loding).fadeOut(2000);	
					window.location = '?page=nls-weblizar';
					
				}
			});
	});
	


// iphone switch
    jQuery('.color').colorPicker();
    // Switch Click
		jQuery('.Switch').click(function() {
			
			// Check If Enabled (Has 'On' Class)
			if (jQuery(this).hasClass('On')){
				
				// Try To Find Checkbox Within Parent Div, And Check It
				jQuery(this).parent().find('input:checkbox').attr('checked', true);
				
				// Change Button Style - Remove On Class, Add Off Class
				jQuery(this).removeClass('On').addClass('Off');
				
			} else { // If Button Is Disabled (Has 'Off' Class)
			
				// Try To Find Checkbox Within Parent Div, And Uncheck It
				jQuery(this).parent().find('input:checkbox').attr('checked', false);
				
				// Change Button Style - Remove Off Class, Add On Class
				jQuery(this).removeClass('Off').addClass('On');
				
			}
			
		});
		
		// Loops Through Each Toggle Switch On Page
		jQuery('.Switch').each(function() {
			
			// Search of a checkbox within the parent
			if (jQuery(this).parent().find('input:checkbox').length){
				
				// This just hides all Toggle Switch Checkboxs
				// Uncomment line below to hide all checkbox's after Toggle Switch is Found
				 //$(this).parent().find('input:checkbox').hide();
				
				// For Demo, Allow showing of checkbox's with the 'show' class
				// If checkbox doesnt have the show class then hide it
				//if (!jQuery(this).parent().find('input:checkbox').hasClass("show")){ $(this).parent().find('input:checkbox').hide(); }
				// Comment / Delete out the above line when using this on a real site
				
				// Look at the checkbox's checkked state
				if (jQuery(this).parent().find('input:checkbox').is(':checked')){

					// Checkbox is not checked, Remove the 'On' Class and Add the 'Off' Class
					jQuery(this).removeClass('On').addClass('Off');
					
				} else { 
								
					// Checkbox Is Checked Remove 'Off' Class, and Add the 'On' Class
					jQuery(this).removeClass('Off').addClass('On');
					
				}
				
			}
			
		});
	
		jQuery('[data-toggle="tooltip"]').tooltip({trigger: "hover"});
		var bg= jQuery('#predefine_bg_image').val();
			jQuery('.bg-image-selection img').click(function() {
				var imgLink= jQuery(this).attr('src');
				jQuery('.bg-image-selection img').removeClass('nls_active');
				jQuery(this).addClass('nls_active');
				jQuery('#predefine_bg_image').val(imgLink);
			});		
	
// Theme Color seletion js

	var selectid;
	jQuery('#theme_color_schemes').on('change',function(){
		selectid = jQuery(this).val();
		jQuery('.custom_color-option').removeClass('active');
		jQuery('#'+selectid).addClass('active');
	});
	
	// Template Selection option js
	jQuery('.site_template').click(function() {
		var template_select;
		jQuery('.site_template').removeClass('active');
		template_select = jQuery(this).attr('id');
		jQuery(this).addClass('active');		
		jQuery('#select_template').val(template_select);		
	});
		
	// Social option js	
	jQuery('#social_icons_onoff').change(function() {
		if (this.checked) {
			jQuery('.social-option').addClass('active');
		} else {
			jQuery('.social-option').removeClass('active');
		}
	});
	
	// subscriber form option js
	jQuery('#subscriber_form').change(function() {
		if (this.checked) {
			jQuery('.subscriber-option').addClass('active');
		} else {
			jQuery('.subscriber-option').removeClass('active');
		}
	});	
	
	
	// subscriber form select option js	
	jQuery('#confirm_email_subscribe').change(function() {
		if (this.checked) {
			jQuery('.form_select-option').addClass('active');
		} else {
			jQuery('.form_select-option').removeClass('active');
		}
	});	
	
	// subscriber form mailer select option js	 
	var subscribe_select;
	jQuery('#subscribe_select').on('change',function(){
		subscribe_select = jQuery(this).val();
		jQuery('.subscribe-option').removeClass('active');
		jQuery('#'+subscribe_select).addClass('active');
	});
	
		/*Subscriber options value Removed */
	/*Mail Send to User as selected options actions */
	jQuery('#submit_subscriber').click(function(){
		var r=confirm("Are you sure to mail sent to selected subscriber?")
		if (r==true)
		{
			var slected_options= "#subscriber_users_mail_option";			
			var nls_hidden_box_id= "#weblizar_nls_submit_subscriber";
			var layout_form_id = "#weblizar_nls_subscribe_form";				
			var weblizar_settings_send_success = ".send_mail-msg";
			var weblizar_loding = ".msg-overlay";	
				jQuery(weblizar_loding).show();	
				if(jQuery(slected_options).val()=='all_users')
				{
					jQuery(nls_hidden_box_id).val('1');
				}else if(jQuery(slected_options).val()=='selected_users')
				{
					jQuery(nls_hidden_box_id).val('2');
				}else if(jQuery(slected_options).val()=='pending_users')
				{
					jQuery(nls_hidden_box_id).val('3');
				}else if(jQuery(slected_options).val()=='active_users')
				{
					jQuery(nls_hidden_box_id).val('4');
				}else if(jQuery(slected_options).val()=='already_mailed_users')
				{
					jQuery(nls_hidden_box_id).val('5');
				}
				jQuery.ajax({
					url:'?page=nls-weblizar',
					type:'post',
					data : jQuery(layout_form_id).serialize(),
					success : function(data){
						jQuery(weblizar_loding+' #loading-image').hide();
						jQuery(weblizar_settings_send_success).fadeIn();
						jQuery(weblizar_settings_send_success).fadeOut(1000);
						jQuery(weblizar_loding).fadeOut(2000);
					}
				});
		} else {
		alert("Action is cancelled.");  }	
	});
		
	/*Remove any record from subscribe data table */
	
	jQuery('#remove-sub').click(function(){
		var r=confirm("Are you sure to delete selected subscriber records?")
		if (r==true)
		{
			var nls_hidden_box_id= "#weblizar_nls_submit_subscriber";
			var layout_form_id = "#weblizar_nls_subscribe_form";				
			var weblizar_settings_removed_success = ".remove-msg";
			var weblizar_loding = ".msg-overlay";	
				jQuery(weblizar_loding).show();	
				jQuery(nls_hidden_box_id).val('6');
				jQuery.ajax({
				   url:'?page=nls-weblizar',
				   type:'post',
				   data : jQuery(layout_form_id).serialize(),
				   success : function(data){
					jQuery(weblizar_loding+' #loading-image').hide();
					jQuery(weblizar_settings_removed_success).fadeIn();
					jQuery(weblizar_settings_removed_success).fadeOut(1000);
					jQuery(weblizar_loding).fadeOut(2000);
					window.location = '?page=nls-weblizar';
					}
				});
		} else {
		alert("Action is cancelled.");  }	
	});
	
	/*Removed All Subscribed User from subscribe data table */
	jQuery('#remove-all-subs').click(function(){
		var r=confirm("Are you sure to delete all subscriber records?")
		if (r==true)
		{
			var nls_hidden_box_id= "#weblizar_nls_submit_subscriber";
			var layout_form_id = "#weblizar_nls_subscribe_form";				
			var weblizar_settings_deleted_success = ".deleted-msg";
			var weblizar_loding = ".msg-overlay";	
			jQuery(weblizar_loding).show();	
			jQuery(nls_hidden_box_id).val('7');
			jQuery.ajax({
			   url:'?page=nls-weblizar',
			   type:'post',
			   data : jQuery(layout_form_id).serialize(),
			   success : function(data){
				jQuery(weblizar_loding+' #loading-image').hide();
				jQuery(weblizar_settings_deleted_success).fadeIn();
				jQuery(weblizar_settings_deleted_success).fadeOut(1000);
				jQuery(weblizar_loding).fadeOut(2000);
				window.location = '?page=nls-weblizar';
				}
			});	
		} else {
		alert("Action is cancelled.");  }
	});	
	

	// Search Robots option js
	jQuery('#search_robots').change(function() {
		if (this.checked) {
			jQuery('.search-option').addClass('active');
		} else {
			jQuery('.search-option').removeClass('active');
		}
	});
	
	jQuery('a.back-top').click(function() {
		jQuery('html, body').animate({
			scrollTop: 100
		}, 700);
		return false;
	});
	
	// Subscriber Form DataTable option js
	jQuery('#dataTables-example').DataTable({
            responsive: true
    });	
});

/* for scroll arrow */
jQuery(window).scroll(function() {
	var amountScrolled = 300;
	if ( jQuery(window).scrollTop() > amountScrolled ) {
		jQuery('a.back-top').fadeIn('slow');
	} else {
		jQuery('a.back-top').fadeOut('slow');
	}
		
});