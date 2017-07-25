<?php // add new user subscription via wp mail setting ON
global $wpdb;
	$table_name = $table_name = $wpdb->prefix . "nls_subscribers";	
	$email_check =$wpdb->get_results( "SELECT * FROM $table_name WHERE id !=0" );	
	if($email_check){		
		foreach($email_check as $all_emails){
			$all_email = $all_emails->email;
			if($all_email == $email){
				$subscriber_email = $email;
				$deact_code = $all_emails->deact_code;	
				$wl_wnlsp_options = get_option('weblizar_wnlsp_options');
				$adminemail = $wl_wnlsp_options['wp_mail_email_id'];						 
				$adminName = $wl_wnlsp_options['unsubscribe_from_text']; 								
				$unsubscribe_link_text = $wl_wnlsp_options['unsubscribe_link_text'];				
				$headers[] = 'Content-type: text/html'."\r\n".'X-Mailer: PHP/' . phpversion();		
				$headers[] = "From:$adminName <$adminemail>";	
				$headers[] = "'Reply-To: '.$adminemail";
				if(!empty($wl_wnlsp_options['unsubscribe_mail_form_cc_emailid'])){
					$cc_emailid =  $wl_wnlsp_options['unsubscribe_mail_form_cc_emailid'];
					$headers[] = "Cc:$cc_emailid";		
				}if(!empty($wl_wnlsp_options['unsubscribe_mail_form_bcc_emailid'])){
					$bcc_emailid =  $wl_wnlsp_options['unsubscribe_mail_form_bcc_emailid'];
					$headers[] = "Bcc:$bcc_emailid";
				}			
				$subject = $wl_wnlsp_options['unsubscribe_mail_subject'];
				$plugin_url = get_permalink();
				$unsubscribe_link = $plugin_url.'?deact_code='.$deact_code.'&'.'email='.$subscriber_email;
				$custom_message = $wl_wnlsp_options['unsubscribe_mail_message'];
				if($wl_wnlsp_options['subscriber_form']=='on') {
					$f_name = $all_emails->f_name;
					$l_name = $all_emails->l_name;
					if ((strpos($custom_message, '{f_name}') !== false)||(strpos($custom_message, '{l_name}') !== false)){	
							$messagebody_f = str_replace('{f_name}',$f_name,$custom_message);
							$messagebody_l = str_replace('{l_name}',$l_name,$messagebody_f);					
						}else{
							$messagebody_l = 'Hello '.$f_name.' '.$l_name.'</br></br>'.$custom_message;
						}
				}else{
						$messagebody_l = $custom_message;
					}
				if (strpos($messagebody_l, '{unsubscribe}') !== false)
					{
						$message = str_replace('{unsubscribe}',$unsubscribe_link,$messagebody_l);
					}
					else{				
							$message = $messagebody_l.'<div style="text-align:center;margin-bottom:20px;"><a style="padding:10px 20px; background:#2bc8e2; color:#fff; text-decoration: none; width: 200px; font-size: 20px;" href="'.$plugin_url.'?deact_code='.$deact_code.'&'.'email='.$subscriber_email.'">'.$unsubscribe_link_text.'</a></div>';	
					}				
				$wp_mails= wp_mail( $subscriber_email, $subject, $message, $headers);
				if($wp_mails){
					
				}
			}
		}							
	}	
?>