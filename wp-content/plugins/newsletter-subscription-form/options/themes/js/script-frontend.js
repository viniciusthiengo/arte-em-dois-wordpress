jQuery(document).ready(function($){

$('.contact_pop_trigger').click(function(){
    $('.contact-pop-main').fadeIn(500);
    });

 $('.contact-close').click(function(){
    //alert('clicked');
    $('.contact-pop-main').fadeOut(500);
    $('.contact-success-message').hide();
 });
 
 $('.sub-submit1').click(function(e){
    var sEmail = $('.email1').val();
    //var s2Email = $('.s2email').val();
    
     if(sEmail =="" ){
		$('#error_email').html('Please enter your email address.').show();
		$('.email1').focus();
		return false;
	}
    
    if(!validateEmail(sEmail)){
		$('#error_email').html('Please enter valid email address.').show();
		$('.email1').focus();
		return false;
	}
    
    });
    
    $('.sub-submit').click(function(e){
   
    var s2Email = $('.s2email').val();
    
    if(s2Email ==""){
		$('#error_email2').html('Please enter your email address.').show();
		$('.s2email').focus();
		return false;
	}
   
    if(!validateEmail(s2Email)){
		$('#error_email2').html('Please enter valid email address.').show();
		$('.s2email').focus();
		return false;
	}
    });
    
    $('.subscribe-input-layout1').keyup(function(){
       
       var id_subscribe_field = $(this).attr('id');
       if(id_subscribe_field == 'edmm-sub-email1'){
            $('#error_email').html(''); 
       }
       if(id_subscribe_field == 'edmm-sub-email2'){
         $('#error_email2').html(''); 
        
       } 
    });
    
   /* $('.submit_contact').click(function(e){
        
        var cname = $('.contact_name_field').val();
        var cEmail = $('.contact_email_field').val();
        var cMsg = $('.contact_msg_field').val();
        
        if(cname ==""){
		$('#error_contact_name').html('Please enter your name.');
		$('.contact_name_field').focus();
		return false;
	   }
        
        if(cEmail ==""){
		$('#error_contact_email').html('Please enter your email address.');
		$('.contact_email_field').focus();
		return false;
	    }
         if(!validateEmail(cEmail)){
		$('#error_contact_email').html('Please enter valid email address.');
		$('.contact_email_field').focus();
		return false;
	}
        
        
       
       if(cMsg ==""){
		$('#error_contact_msg').html('Please enter your message.');
		$('.contact_msg_field').focus();
		return false;
	   }
        
        
    }); */
    
//$(".example").TimeCircles(); 
/*var day = $('input.day_val').val();
var year = $('input.year_val').val();
var month = $('input.month_val').val();
*/

//Ajax contact

$('.submit_contact').click(function(e){
        
        var cname = $('.contact_name_field').val();
        var cEmail = $('.contact_email_field').val();
        var cMsg = $('.contact_msg_field').val();
        var admin_mail =$('.edmm-data').attr('admin-email');
        
        if(cname ==""){
		$('#error_contact_name').html('Please enter your name.');
		$('.contact_name_field').focus();
        $('.contact-success-message').hide();
		return false;
	   }
        
        else if(cEmail ==""){
		$('#error_contact_email').html('Please enter your email address.');
		$('.contact_email_field').focus();
		return false;
	    }
        else if(!validateEmail(cEmail)){
		$('#error_contact_email').html('Please enter valid email address.');
		$('.contact_email_field').focus();
		return false;
	    }
        else if(cMsg ==""){
		$('#error_contact_msg').html('Please enter your message.');
		$('.contact_msg_field').focus();
		return false;
	   }
       else{
         var success = $('#edn-msg').data('success');
                    
                   
                    var url = $('.edmm-data').data('url');
                    //var ajaxurl = $('#edn-ajax-url').data('url');
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: {
                            name: cname,
                            email:cEmail,
                            msg:$('.contact_msg_field').val(),
                            action:'edn_coming_soon_ajax_action',
                            _wpnonce:$('#edn-ajax-nonce').val()
                        },
                        beforeSend: function() {
                            $('#edmm-loading').show('slow');
                        },
                        complete: function() {
                            $('#edmm-loading').hide('slow');
                        },
                        success: function( resp ) {
                            //alert(resp);
                            if(resp == 1){
                            $('.empty-common-contact').val('');
                            $('.contact-success-message').html('Success! Thank you for contacting us').show();
                            }else{
                            $('.contact-success-message').html('Sorry!! Please try again Later').show();
                            }
                        }
                    });
       }
   });
   
 $('.empty-common-contact').keyup(function(){
    
    var id_of_element = $(this).attr('id');
    if(id_of_element == 'edmm-contact-name'){
      $('#error_contact_name').html('');  
    }
    if(id_of_element == 'edmm-contact-email'){
        $('#error_contact_email').html(''); 
    }
    if(id_of_element == 'edmm-contact-msg'){
       $('#error_contact_msg').html('');  
    }
    
    
 });      

var date = $('input.date_val').val();
if(!date==''){ 
    var split_val_array = date.split('-');
    var year = split_val_array[0];
    var month = split_val_array[1];
    var day = split_val_array[2];

var hour = $('input.hour_val').val();
var min = $('input.minute_val').val();
var sec = $('input.second_val').val();
 
//alert(month);
 $('.countdown').downCount({
  date: month+'/'+day+'/'+year+' 12:00:00'
});

 $('.countdown2').downCount({
  date: month+'/'+day+'/'+year+' '+hour+':'+min+':'+sec
}); 

}

});

// Function that validates email address through a regular expression.
function validateEmail(sEmail) {
    var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }
}