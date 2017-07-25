<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
//Default Options
function weblizar_nls_default_settings()
{
		global $current_user;
		wp_get_current_user();
		$LoggedInUserEmail1 = $current_user->user_email;
		$LoggedInUsername1 = $current_user->user_login;		
		$wl_nls_options=array(
//Template Settings Options
		'select_template' => 'select_template1',
//Skin Layout Settings
		'theme_color_schemes' => 'default_color',
		'custom_color_schemes' => '#FF2E34',
		'default_color_schemes' => '#eb5054',
		'theme_font_family' => 'Khand',
		'section_heading_size' => '30',
		'section_sub_heading_size' => '18',
		'section_description_size' => '18',
		'section_icon_size' => '30',	
		'sub_section_heading_size' => '20',
		'sub_section_sub_heading_size' => '17',
		'sub_section_description_size' => '15',
		'sub_section_icon_size' => '28',
		'social_link_size' => '14',
		
//Social Settings
		'social_icons_onoff' =>'on',
		'social_icon_1' =>'fa fa-facebook',
		'social_icon_2' =>'fa fa-google-plus',
		'social_icon_3' =>'fa fa-linkedin',
		'social_icon_4' =>'fa fa-twitter',
		'social_icon_5' =>'fa fa-instagram',
		'social_link_1' =>'#',
		'social_link_2' =>'#',
		'social_link_3' =>'#',
		'social_link_4' =>'#',
		'social_link_5' =>'#',
		'social_icolor_1' => '#3b5998',	
		'social_icolor_2' => '#c92228',
		'social_icolor_3' => '#3b5998',
		'social_icolor_4' => '#00aced',
		'social_icolor_5' => '#3f729b',		
		'social_link_tab_1' =>'off',		
		'social_link_tab_2' =>'off',		
		'social_link_tab_3' =>'off',		
		'social_link_tab_4' =>'off',		
		'social_link_tab_5' =>'off',
		'total_Social_links'=>'5',
		'social_icon_list'=>'',

//Subscriber Form Settings
		'subscriber_form' =>'on',	
		'subscriber_form_title' =>__('SUBSCRIBE TO NEWSLETTER', NLS_TEXT_DOMAIN ),
		'subscriber_form_icon' => 'fa fa-envelope-o',
		'subscriber_form_sub_title' => __("Subscribe to our mailing list to get updates to your email inbox.","weblizar"),
		'subscriber_form_message' => __("GET MONTHLY NEWSLETTER", NLS_TEXT_DOMAIN ),
		'sub_form_bg_color' =>'#333333',
		'sub_form_button_text' =>'Subscribe',		
		'sub_form_button_f_name' =>'First Name',
		'sub_form_button_l_name' =>'Last Name',
		'sub_form_subscribe_title' =>'Email',	
		'sub_form_button_ht_color' =>'#333333',
		'sub_form_button_hb_color' =>'#FFFFFF',
		'sub_form_ph_text_color' =>'',
		'user_sets' => '$user_sets_all',		
		'sub_form_subscribe_seuccess_message' =>  __( 'Thank you! We will be back with the quote.', 'RCSM_TEXT_DOMAIN' ),
		'sub_form_subscribe_invalid_message' => __('You have already subscribed.', 'RCSM_TEXT_DOMAIN' ),		
		'subscriber_msg_body' => '',
		'sub_form_subscribe_confirm_success_message' => __('Thank You!!! Subscription has been confirmed. We will notify when the site is live.', 'RCSM_TEXT_DOMAIN' ),	
		'sub_form_subscribe_already_confirm_message' =>  __('You subscription is already active. We will notify when the site is live.', 'RCSM_TEXT_DOMAIN' ),
		'sub_form_invalid_confirmation_message' => __('Error: Invalid subscription details.', 'RCSM_TEXT_DOMAIN' ),
	
//Subscriber Form Option Settings
		'subscribe_select' =>'wp_mail',
		'wp_mail_email_id' =>$LoggedInUserEmail1,
		'php_user_name' =>$LoggedInUsername1,
		'php_user_email_id' =>$LoggedInUserEmail1,
		'confirm_email_subscribe' => 'off',
		'mailchimp_api_key'=> '',
		'mailchimp_list_id'=>'',
		'madmimi_username' =>'',
		'madmimi_api_key' =>'',
		'madmimi_list_option' =>'',
		
//Subscriber List Options Setting
		'subscriber_users_mail_option' =>'all_users',
		'subscriber_mail_subject' =>'',
		'subscriber_mail_message' =>'',
		);
	return apply_filters( 'weblizar_nls_options', $wl_nls_options );
}

// Options API
function weblizar_nls_get_options() {
    // Options API Settings
    return wp_parse_args( get_option( 'weblizar_nls_options', array() ), weblizar_nls_default_settings() );    
}

//free Template Options Setting
function nls_template_setting(){ 	
	$wl_nls_options = get_option('weblizar_nls_options');	
	$wl_nls_options['select_template']= 'select_template1';	
	
update_option('weblizar_nls_options', $wl_nls_options);
}
//Skin Layout Settings
function nls_skin_layout_setting(){
	$wl_nls_options = get_option('weblizar_nls_options');
	$wl_nls_options['theme_color_schemes']= 'default_color';
	$wl_nls_options['custom_color_schemes']= '#FF2E34';
	$wl_nls_options['default_color_schemes']= '#eb5054';
	$wl_nls_options['theme_font_family']= 'Khand';
	$wl_nls_options['section_heading_size']= '30';
	$wl_nls_options['section_sub_heading_size']= '18';
	$wl_nls_options['section_description_size']= '18';
	$wl_nls_options['section_icon_size']= '30';
	$wl_nls_options['social_link_size']= '14';
	
update_option('weblizar_nls_options', $wl_nls_options);
}

//Social Options Setting
function nls_social_setting(){
	$wl_nls_options = get_option('weblizar_nls_options');
	$wl_nls_options['social_icons_bottom_onoff']= 'on';
	$wl_nls_options['social_icon_1']= 'fa fa-facebook';	
	$wl_nls_options['social_icon_2']= 'fa fa-google-plus';
	$wl_nls_options['social_icon_3']= 'fa fa-linkedin';
	$wl_nls_options['social_icon_4']= 'fa fa-twitter';
	$wl_nls_options['social_icon_5']= 'fa fa-instagram';
	$wl_nls_options['social_icolor_1']= '#3b5998';	
	$wl_nls_options['social_icolor_2']= '#c92228';
	$wl_nls_options['social_icolor_3']= '#3b5998';
	$wl_nls_options['social_icolor_4']= '#00aced';	
	$wl_nls_options['social_icolor_5']= '#3f729b';
	$wl_nls_options['social_link_tab_1']= 'off';
	$wl_nls_options['social_link_tab_2']= 'off';
	$wl_nls_options['social_link_tab_3']= 'off';
	$wl_nls_options['social_link_tab_4']= 'off';
	$wl_nls_options['social_link_tab_5']= 'off';
	$wl_nls_options['social_link_1']= '#';
	$wl_nls_options['social_link_2']= '#';
	$wl_nls_options['social_link_3']= '#';
	$wl_nls_options['social_link_4']= '#';
	$wl_nls_options['social_link_5']= '#';
	$wl_nls_options['social_icons_onoff']= 'on';
	$wl_nls_options['total_Social_links']='5';	
	$wl_nls_options['social_icon_list']='';

update_option('weblizar_nls_options', $wl_nls_options);
}
//Subscriber Form Options Setting
function nls_subscriber_form_setting(){	
	$wl_nls_options = get_option('weblizar_nls_options');
	$wl_nls_options['subscriber_form']= 'on';
	$wl_nls_options['subscriber_form_title']=__('SUBSCRIBE TO NEWSLETTER', NLS_TEXT_DOMAIN );
	$wl_nls_options['subscriber_form_icon']= 'fa fa-envelope-o';
	$wl_nls_options['subscriber_form_sub_title']= __('Subscribe to our mailing list to get updates to your email inbox.', NLS_TEXT_DOMAIN );
	$wl_nls_options['subscriber_form_message']= __("GET MONTHLY NEWSLETTER", NLS_TEXT_DOMAIN ); 
	$wl_nls_options['sub_form_button_ht_color']= '#333333';
	$wl_nls_options['sub_form_button_hb_color']= '#FFFFFF';
	$wl_nls_options['sub_form_button_f_name']= 'First Name';
	$wl_nls_options['sub_form_button_l_name']= 'Last Name';
	$wl_nls_options['sub_form_button_text']= 'Subscribe';
	$wl_nls_options['sub_form_subscribe_title']= 'Email';
	$wl_nls_options['sub_form_subscribe_seuccess_message']=  __( 'Thank you! We will be back with the quote.', 'RCSM_TEXT_DOMAIN' );
	$wl_nls_options['sub_form_subscribe_invalid_message']= __('You have already subscribed.', 'RCSM_TEXT_DOMAIN' );		
	$wl_nls_options['subscriber_msg_body']= '';
	$wl_nls_options['sub_form_subscribe_confirm_success_message']= __('Thank You!!! Subscription has been confirmed. We will notify when the site is live.', 'RCSM_TEXT_DOMAIN' );		
	$wl_nls_options['sub_form_subscribe_already_confirm_message']=  __('You subscription is already active. We will notify when the site is live.', 'RCSM_TEXT_DOMAIN' );
	$wl_nls_options['sub_form_invalid_confirmation_message']= __('Error: Invalid subscription details.', 'RCSM_TEXT_DOMAIN' );
	
update_option('weblizar_nls_options', $wl_nls_options);
}	
//Subscriber Form Provider Options Setting
function nls_subscriber_provider_setting(){	
	global $current_user;
		wp_get_current_user();
		$LoggedInUserEmail1 = $current_user->user_email;
		$LoggedInUsername1 = $current_user->user_login;
	$wl_nls_options = get_option('weblizar_nls_options');		
	$wl_nls_options['subscribe_select']= 'wp_mail';
	$wl_nls_options['wp_mail_email_id']= $LoggedInUserEmail1;
	$wl_nls_options['php_user_name']=$LoggedInUsername1;		
	$wl_nls_options['php_user_email_id']= $LoggedInUserEmail1;
	$wl_nls_options['confirm_email_subscribe']= 'off';
	$wl_nls_options['mailchimp_api_key'] = '';
	$wl_nls_options['mailchimp_list_id'] = '';
	$wl_nls_options['madmimi_username'] = '';
	$wl_nls_options['madmimi_api_key'] = '';
	$wl_nls_options['madmimi_list_option'] = '';
update_option('weblizar_nls_options', $wl_nls_options);
}
//Subscriber List Options Setting
function nls_subscriber_list_setting(){	
	$wl_nls_options = get_option('weblizar_nls_options');	
	$wl_nls_options['user_sets']= '$user_sets_all';
	$wl_rcsm_options['subscriber_users_mail_option']= 'all_users';
	$wl_rcsm_options['subscriber_mail_subject']= '';
	$wl_rcsm_options['subscriber_mail_message']= '';
	
update_option('weblizar_nls_options', $wl_nls_options);
}