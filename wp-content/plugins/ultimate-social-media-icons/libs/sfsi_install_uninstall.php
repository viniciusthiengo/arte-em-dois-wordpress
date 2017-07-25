<?php
function sfsi_update_plugin()
{
    if($feed_id = get_option('sfsi_feed_id'))
    {
        if(is_numeric($feed_id))
        {
            $sfsiId = SFSI_updateFeedUrl();
            update_option('sfsi_feed_id', sanitize_text_field($sfsiId->feed_id));
            update_option('sfsi_redirect_url', esc_url($sfsiId->redirect_url));
        }
    }
    
    //Install version
    update_option("sfsi_pluginVersion", "1.75");

    if(!get_option('sfsi_serverphpVersionnotification'))
    {
        add_option("sfsi_serverphpVersionnotification", "yes");
    }
    if(!get_option('sfsi_footer_sec'))
    {
        add_option('sfsi_footer_sec','no');
    }
    /* show notification premium plugin */
    if(!get_option('show_premium_notification'))
    {
        add_option("show_premium_notification", "yes");
    }
    
    /*show notification*/
    if(!get_option('show_notification'))
    {
        add_option("show_notification", "yes");
    }
    /*show notification*/
    if(!get_option('show_new_notification'))
    {
        add_option("show_new_notification", "no");
    }
    
    /* show mobile notification */
    if(!get_option('show_mobile_notification'))
    {
        add_option("show_mobile_notification", "yes");
    }
    
    if(!get_option('sfsi_languageNotice'))
    {
        add_option("sfsi_languageNotice", "yes");
    }
    
    /* subscription form */
    $options8 = array('sfsi_form_adjustment'=>'yes',
        'sfsi_form_height'=>'180',
        'sfsi_form_width' =>'230',
        'sfsi_form_border'=>'yes',
        'sfsi_form_border_thickness'=>'1',
        'sfsi_form_border_color'=>'#b5b5b5',
        'sfsi_form_background'=>'#ffffff',
        
        'sfsi_form_heading_text'=>'Get new posts by email',
        'sfsi_form_heading_font'=>'Helvetica,Arial,sans-serif',
        'sfsi_form_heading_fontstyle'=>'bold',
        'sfsi_form_heading_fontcolor'=>'#000000',
        'sfsi_form_heading_fontsize'=>'16',
        'sfsi_form_heading_fontalign'=>'center',
        
        'sfsi_form_field_text'=>'Enter your email',
        'sfsi_form_field_font'=>'Helvetica,Arial,sans-serif',
        'sfsi_form_field_fontstyle'=>'normal',
        'sfsi_form_field_fontcolor'=>'#000000',
        'sfsi_form_field_fontsize'=>'14',
        'sfsi_form_field_fontalign'=>'center',
        
        'sfsi_form_button_text'=>'Subscribe',
        'sfsi_form_button_font'=>'Helvetica,Arial,sans-serif',
        'sfsi_form_button_fontstyle'=>'bold',
        'sfsi_form_button_fontcolor'=>'#000000',
        'sfsi_form_button_fontsize'=>'16',
        'sfsi_form_button_fontalign'=>'center',
        'sfsi_form_button_background'=>'#dedede',
    );
    add_option('sfsi_section8_options',  serialize($options8));
    
    /*Float Icon setting*/
    $option5 = unserialize(get_option('sfsi_section5_options',false));
    if(isset($option5) && !empty($option5) && !isset($option5['sfsi_icons_floatMargin_top']))
    {
        $option5['sfsi_icons_floatMargin_top'] = '';
        $option5['sfsi_icons_floatMargin_bottom'] = '';
        $option5['sfsi_icons_floatMargin_left'] = '';
        $option5['sfsi_icons_floatMargin_right'] = '';
        update_option('sfsi_section5_options', serialize($option5));
    }
    
    /*Youtube Channelid settings*/
    $option4 = unserialize(get_option('sfsi_section4_options',false));
    if(isset($option4) && !empty($option4) && !isset($option4['sfsi_youtube_channelId']))
    {
        $option4['sfsi_youtube_channelId'] = '';
        update_option('sfsi_section4_options', serialize($option4));
    }
    
    $option6=  unserialize(get_option('sfsi_section6_options',false));
    if(isset($option6) && !empty($option6))
    {
        if(!isset($option6['sfsi_rectpinit']))
        {
            $option6['sfsi_rectpinit'] = 'no';
        }
        if(!isset($option6['sfsi_rectfbshare']))
        {
            $option6['sfsi_rectfbshare'] = 'no';
        }
        update_option('sfsi_section6_options', serialize($option6));
    }
    
    /*Extra important options*/
    $sfsi_instagram_sf_count = array(
        "date" => strtotime(date("Y-m-d")),
        "sfsi_sf_count" => "",
        "sfsi_instagram_count" => ""
    );
    add_option('sfsi_instagram_sf_count',  serialize($sfsi_instagram_sf_count));
    $option4 = unserialize(get_option('sfsi_section4_options',false));
    if(isset($option4) && !empty($option4) && !isset($option4['sfsi_instagram_clientid']))
    {
        $option4['sfsi_instagram_clientid'] = '';
        $option4['sfsi_instagram_appurl']   = '';
        $option4['sfsi_instagram_token']    = '';
        update_option('sfsi_section4_options', serialize($option4));
    }
}
function sfsi_activate_plugin()
{
    add_option('sfsi_plugin_do_activation_redirect', true);
    /* check for CURL enable at server */
   curl_enable_notice();
    if(!get_option('show_new_notification'))
    {
        add_option("show_new_notification", "yes");
    }

    $options1=array('sfsi_rss_display'=>'yes',
            'sfsi_email_display'=>'yes',
            'sfsi_facebook_display'=>'yes',
            'sfsi_twitter_display'=>'yes',
            'sfsi_google_display'=>'yes',
            'sfsi_share_display'=>'no',
            'sfsi_pinterest_display'=>'no',
            'sfsi_instagram_display'=>'no',
            'sfsi_linkedin_display'=>'no',
            'sfsi_youtube_display'=>'no',  
            'sfsi_custom_display'=>'',
            'sfsi_custom_files'=>''  
    );
    add_option('sfsi_section1_options',  serialize($options1));
    
    if(get_option('sfsi_feed_id') && get_option('sfsi_redirect_url'))
    {
        $sffeeds["feed_id"] = sanitize_text_field(get_option('sfsi_feed_id'));
        $sffeeds["redirect_url"] = esc_url(get_option('sfsi_redirect_url'));
        $sffeeds = (object)$sffeeds;
    }
    else
    {
        $sffeeds = SFSI_getFeedUrl();
    }
    
    /* Links and icons  options */   
    $options2=array('sfsi_rss_url'=>sfsi_get_bloginfo('rss2_url'),
        'sfsi_rss_icons'=>'email', 
        'sfsi_email_url'=>$sffeeds->redirect_url,
        'sfsi_facebookPage_option'=>'no',
        'sfsi_facebookPage_url'=>'',
        'sfsi_facebookLike_option'=>'yes',
        'sfsi_facebookShare_option'=>'yes',
        'sfsi_twitter_followme'=>'no',
        'sfsi_twitter_followUserName'=>'',
        'sfsi_twitter_aboutPage'=>'yes',
        'sfsi_twitter_page'=>'no',
        'sfsi_twitter_pageURL'=>'',
        'sfsi_twitter_aboutPageText'=>'Hey, check out this cool site I found: www.yourname.com #Topic via@my_twitter_name',
        'sfsi_google_page'=>'no',
        'sfsi_google_pageURL'=>'',
        'sfsi_googleLike_option'=>'yes',
        'sfsi_googleShare_option'=>'yes',
        'sfsi_youtube_pageUrl'=>'',
        'sfsi_youtube_page'=>'no',
        'sfsi_youtube_follow'=>'no',
        'sfsi_pinterest_page'=>'no',
        'sfsi_pinterest_pageUrl'=>'',
        'sfsi_pinterest_pingBlog'=>'',
        'sfsi_instagram_page'=>'no',
        'sfsi_instagram_pageUrl'=>'',
        'sfsi_linkedin_page'=>'no',
        'sfsi_linkedin_pageURL'=>'',
        'sfsi_linkedin_follow'=>'no',
        'sfsi_linkedin_followCompany'=>'',
        'sfsi_linkedin_SharePage'=>'yes',
        'sfsi_linkedin_recommendBusines'=>'no',
        'sfsi_linkedin_recommendCompany'=>'',
        'sfsi_linkedin_recommendProductId'=>'',
        'sfsi_CustomIcon_links'=>''
        );
    add_option('sfsi_section2_options',  serialize($options2));
    
    /* Design and animation option  */
    $options3=array('sfsi_mouseOver'=>'no',
        'sfsi_mouseOver_effect'=>'fade_in',
        'sfsi_shuffle_icons'=>'no',
        'sfsi_shuffle_Firstload'=>'no',
        'sfsi_shuffle_interval'=>'no',
        'sfsi_shuffle_intervalTime'=>'',                              
        'sfsi_actvite_theme'=>'default' );
    add_option('sfsi_section3_options',  serialize($options3));
    
    /* display counts options */         
    $options4=array('sfsi_display_counts'=>'no',
        'sfsi_email_countsDisplay'=>'no',
        'sfsi_email_countsFrom'=>'source',
        'sfsi_email_manualCounts'=>'20',
        'sfsi_rss_countsDisplay'=>'no',
        'sfsi_rss_manualCounts'=>'20',
        'sfsi_facebook_PageLink'=>'',
        'sfsi_facebook_countsDisplay'=>'no',
        'sfsi_facebook_countsFrom'=>'manual',
        'sfsi_facebook_manualCounts'=>'20',
        'sfsi_twitter_countsDisplay'=>'no',
        'sfsi_twitter_countsFrom'=>'manual',
        'sfsi_twitter_manualCounts'=>'20',
        'sfsi_google_api_key'=>'',   
        'sfsi_google_countsDisplay'=>'no',
        'sfsi_google_countsFrom'=>'manual',
        'sfsi_google_manualCounts'=>'20',
        'sfsi_linkedIn_countsDisplay'=>'no',
        'sfsi_linkedIn_countsFrom'=>'manual',
        'sfsi_linkedIn_manualCounts'=>'20',
        'ln_api_key'=>'',
        'ln_secret_key'=>'',
        'ln_oAuth_user_token'=>'',
        'ln_company'=>'',
        'sfsi_youtubeusernameorid'=>'name',
        'sfsi_youtube_user'=>'',
        'sfsi_youtube_channelId' =>'',
        'sfsi_ytube_chnlid'=>'',
        'sfsi_youtube_countsDisplay'=>'no',
        'sfsi_youtube_countsFrom'=>'manual',
        'sfsi_youtube_manualCounts'=>'20',
        'sfsi_pinterest_countsDisplay'=>'no',
        'sfsi_pinterest_countsFrom'=>'manual',
        'sfsi_pinterest_manualCounts'=>'20',
        'sfsi_pinterest_user'=>'',
        'sfsi_pinterest_board'=>'',
    
        'sfsi_instagram_countsFrom'=>'manual',
        'sfsi_instagram_countsDisplay'=>'no',
        'sfsi_instagram_manualCounts'=>'20',

        'sfsi_instagram_User'=>'',
    
        'sfsi_shares_countsDisplay'=>'no',
        'sfsi_shares_countsFrom'=>'manual',
        'sfsi_shares_manualCounts'=>'20'
    );
    add_option('sfsi_section4_options',  serialize($options4));
    
    $options5=array('sfsi_icons_size'=>'40',
        'sfsi_icons_spacing'=>'5',
        'sfsi_icons_Alignment'=>'left',
        'sfsi_icons_perRow'=>'5',
        'sfsi_icons_ClickPageOpen'=>'yes',
        'sfsi_icons_float'=>'no',
        'sfsi_disable_floaticons'=>'no',
        'sfsi_icons_floatPosition'=>'center-right',
        'sfsi_icons_floatMargin_top'=>'',
        'sfsi_icons_floatMargin_bottom'=>'',
        'sfsi_icons_floatMargin_left'=>'',
        'sfsi_icons_floatMargin_right'=>'',
        'sfsi_icons_stick'=>'no',
        'sfsi_rssIcon_order'=>'1',
        'sfsi_emailIcon_order'=>'2',
        'sfsi_facebookIcon_order'=>'3',
        'sfsi_googleIcon_order'=>'4',
        'sfsi_twitterIcon_order'=>'5',
        'sfsi_shareIcon_order'=>'6',
        'sfsi_youtubeIcon_order'=>'7',
        'sfsi_pinterestIcon_order'=>'8',
        'sfsi_linkedinIcon_order'=>'9',
        'sfsi_instagramIcon_order'=>'10',
        'sfsi_CustomIcons_order'=>'',
        'sfsi_rss_MouseOverText'=>'RSS',
        'sfsi_email_MouseOverText'=>'Follow by Email',
        'sfsi_twitter_MouseOverText'=>'Twitter',
        'sfsi_facebook_MouseOverText'=>'Facebook',
        'sfsi_google_MouseOverText'=>'Google+',
        'sfsi_linkedIn_MouseOverText'=>'LinkedIn',
        'sfsi_pinterest_MouseOverText'=>'Pinterest',
        'sfsi_instagram_MouseOverText'=>'Instagram',
        'sfsi_youtube_MouseOverText'=>'YouTube',
        'sfsi_share_MouseOverText'=>'Share',
        'sfsi_custom_MouseOverTexts'=>'',
        );
    add_option('sfsi_section5_options',  serialize($options5));
    
    /* post options */                  
    $options6=array('sfsi_show_Onposts'=>'no',
        'sfsi_show_Onbottom'=>'no',
        'sfsi_icons_postPositon'=>'source',
        'sfsi_icons_alignment'=>'center-right',
        'sfsi_rss_countsDisplay'=>'no',
        'sfsi_textBefor_icons'=>'Please follow and like us:',
        'sfsi_icons_DisplayCounts'=>'no',
        'sfsi_rectsub'=>'yes',
        'sfsi_rectfb'=>'yes',
        'sfsi_rectgp'=>'yes',
        'sfsi_rectshr'=>'no',
        'sfsi_recttwtr'=>'yes',
        'sfsi_rectpinit'=>'yes',
        'sfsi_rectfbshare'=>'yes'
    );
    add_option('sfsi_section6_options',  serialize($options6));       
    
    /* icons pop options */
    $options7=array('sfsi_show_popup'=>'no',
        'sfsi_popup_text'=>'Enjoy this blog? Please spread the word :)',
        'sfsi_popup_background_color'=>'#eff7f7',
        'sfsi_popup_border_color'=>'#f3faf2',
        'sfsi_popup_border_thickness'=>'1',
        'sfsi_popup_border_shadow'=>'yes',
        'sfsi_popup_font'=>'Helvetica,Arial,sans-serif',
        'sfsi_popup_fontSize'=>'30',
        'sfsi_popup_fontStyle'=>'normal',
        'sfsi_popup_fontColor'=>'#000000',
        'sfsi_Show_popupOn'=>'none',
        'sfsi_Show_popupOn_PageIDs'=>'',
        'sfsi_Shown_pop'=>'ETscroll',
        'sfsi_Shown_popupOnceTime'=>'',
        'sfsi_Shown_popuplimitPerUserTime'=>'',
    );
    add_option('sfsi_section7_options',  serialize($options7));
    
    /*Some additional option added*/
    update_option('sfsi_feed_id',sanitize_text_field($sffeeds->feed_id));
    update_option('sfsi_redirect_url',esc_url($sffeeds->redirect_url));
    add_option('sfsi_installDate',date('Y-m-d h:i:s'));
    add_option('sfsi_RatingDiv','no');
    add_option('sfsi_footer_sec','no');
    update_option('sfsi_activate', 1);
    
    /*Changes in option 2*/
    $get_option2 = unserialize(get_option('sfsi_section2_options',false));
    $get_option2['sfsi_email_url'] = $sffeeds->redirect_url;
    update_option('sfsi_section2_options', serialize($get_option2));
    
    /*Activation Setup for (specificfeed)*/
    sfsi_setUpfeeds($sffeeds->feed_id);
    sfsi_updateFeedPing('N',$sffeeds->feed_id);
    
    /*Extra important options*/
    $sfsi_instagram_sf_count = array(
        "date" => strtotime(date("Y-m-d")),
        "sfsi_sf_count" => "",
        "sfsi_instagram_count" => ""
    );
    add_option('sfsi_instagram_sf_count',  serialize($sfsi_instagram_sf_count));
}
/* end function  */

/* deactivate plugin */
function sfsi_deactivate_plugin()
{
     global $wpdb;
     sfsi_updateFeedPing('Y',sanitize_text_field(get_option('sfsi_feed_id')));
}
/* end function  */

function sfsi_updateFeedPing($status,$feed_id)
{
    $curl = curl_init();  
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://www.specificfeeds.com/wordpress/pingfeed',
        CURLOPT_USERAGENT => 'sf rss request',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => array(
            'feed_id' => $feed_id,
            'status' => $status
        )
    ));
     // Send the request & save response to $resp
    $resp = curl_exec($curl);
    $resp=json_decode($resp);
    curl_close($curl);
}
/* unistall plugin function */
function sfsi_Unistall_plugin()
{   
    global $wpdb;
    /* Delete option for which icons to display */
    delete_option('sfsi_section1_options');
    delete_option('sfsi_section2_options');
    delete_option('sfsi_section3_options');
    delete_option('sfsi_section4_options');
    delete_option('sfsi_section5_options');
    delete_option('sfsi_section6_options');
    delete_option('sfsi_section7_options');
    delete_option('sfsi_section8_options');
    delete_option('sfsi_feed_id');
    delete_option('sfsi_redirect_url');
    delete_option('sfsi_footer_sec');
    delete_option('sfsi_activate');
    delete_option("sfsi_pluginVersion");
    delete_option('sfsi_verificatiom_code');
    delete_option("sfsi_curlErrorNotices");
    delete_option("sfsi_curlErrorMessage");
	delete_option("sfsi_RatingDiv");
	delete_option("sfsi_languageNotice");
	delete_option("sfsi_instagram_sf_count");
	delete_option("sfsi_installDate");
	
	delete_option("adding_tags");
	delete_option("show_notification_plugin");
	delete_option("show_premium_notification");
	delete_option("show_mobile_notification");
	delete_option("show_notification");
	delete_option("show_new_notification");
    delete_option('sfsi_serverphpVersionnotification');

    delete_option('widget_sfsi_widget');
    delete_option('widget_subscriber_widget');

    delete_option('fs_active_plugins');
    delete_option('fs_accounts');
    delete_option('fs_api_cache');
    delete_option('fs_debug_mode');        
}
/* end function */

/* check CUrl */
function curl_enable_notice()
{
    if(!function_exists('curl_init')) {
    echo '<div class="error"><p> Error: It seems that CURL is disabled on your server. Please contact your server administrator to install / enable CURL.</p></div>'; die;
    }
}
    
/* add admin menus */
function sfsi_admin_menu()
{
    add_menu_page('Ultimate Social Media Icons', 'Ultimate Social Media Icons', 'administrator','sfsi-options','sfsi_options_page',plugins_url( 'images/logo.png' , dirname(__FILE__) ));
    //add_submenu_page('sfsi-options', 'Subscription Options', 'Settings','administrator', 'sfsi-options', 'sfsi_options_page');
    //add_submenu_page('sfsi-options', 'Specific About Us', 'About','administrator', 'sfsi-about', 'sfsi_about_page');
}
function sfsi_options_page(){ include SFSI_DOCROOT . '/views/sfsi_options_view.php';    } /* end function  */
function sfsi_about_page(){ include SFSI_DOCROOT . '/views/sfsi_aboutus.php';   } /* end function  */
if ( is_admin() ){
    add_action('admin_menu', 'sfsi_admin_menu');
}
/* fetch rss url from specificfeeds */ 
function SFSI_getFeedUrl()
{
    $curl = curl_init();  
     
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://www.specificfeeds.com/wordpress/plugin_setup',
        CURLOPT_USERAGENT => 'sf rss request',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => array(
            'web_url'   => get_bloginfo('url'),
            'feed_url'  => sfsi_get_bloginfo('rss2_url'),
            'email'     => '',
            'subscriber_type' => 'OWP'
        )
    ));
    // Send the request & save response to $resp
    $resp = curl_exec($curl);
    if(curl_errno($curl))
    {
        update_option("sfsi_curlErrorNotices", "yes");
        update_option("sfsi_curlErrorMessage", curl_errno($curl));
    }
    $resp = json_decode($resp);
    curl_close($curl);
    
    $feed_url = stripslashes_deep($resp->redirect_url);
    return $resp;exit;
}
/* fetch rss url from specificfeeds on */ 
function SFSI_updateFeedUrl()
{
    $curl = curl_init();  
     
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://www.specificfeeds.com/wordpress/updateFeedPlugin',
        CURLOPT_USERAGENT => 'sf rss request',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => array(
            'feed_id'   => sanitize_text_field(get_option('sfsi_feed_id')),
            'web_url'   => get_bloginfo('url'),
            'feed_url'  => sfsi_get_bloginfo('rss2_url'),
            'email'     => ''
        )
    ));
    // Send the request & save response to $resp
    $resp = curl_exec($curl);
    $resp = json_decode($resp);
    curl_close($curl);
    
    $feed_url = stripslashes_deep($resp->redirect_url);
    return $resp;exit;
}
/* add sf tags */
function sfsi_setUpfeeds($feed_id)
{
    $curl = curl_init();  
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://www.specificfeeds.com/rssegtcrons/download_rssmorefeed_data_single/'.$feed_id."/Y",
        CURLOPT_USERAGENT => 'sf rss request',
        CURLOPT_POST => 0      
    ));
    $resp = curl_exec($curl);
    curl_close($curl);  
}
/* admin notice if wp_head is missing in active theme */
function sfsi_check_wp_head() {
    
    $template_directory = get_template_directory();
    $header = $template_directory . '/header.php';
    
    if (is_file($header)) {
        
        $search_header = "wp_head";
        $file_lines = @file($header);
        $foind_header=0;
        foreach ($file_lines as $line)
        {
            $searchCount = substr_count($line, $search_header);
            if ($searchCount > 0)
            {
                return true;
            }
        }
        
        $path=pathinfo($_SERVER['REQUEST_URI']);
        if($path['basename']=="themes.php" || $path['basename']=="theme-editor.php" || $path['basename']=="admin.php?page=sfsi-options")
        {
            $currentTheme = wp_get_theme();
                        
            if(isset($currentTheme) && !empty($currentTheme) && $currentTheme->get( 'Name' ) != "Customizr"){
                echo "<div class=\"error\" >" . "<p> Error : Please fix your theme to make plugins work correctly: Go to the <a href=\"theme-editor.php\">Theme Editor</a> and insert <code>&lt;?php wp_head(); ?&gt;</code> just before the <code>&lt;/head&gt;</code> line of your theme's <code>header.php</code> file." . "</p></div>";
            }
        }  
    }
}
/* admin notice if wp_footer is missing in active theme */
function sfsi_check_wp_footer() {
    $template_directory = get_template_directory();
    $footer = $template_directory . '/footer.php';
 
    if (is_file($footer)) {
        $search_string = "wp_footer";
        $file_lines = @file($footer);
        
        foreach ($file_lines as $line) {
            $searchCount = substr_count($line, $search_string);
            if ($searchCount > 0) {
                return true;
            }
        }
        $path=pathinfo($_SERVER['REQUEST_URI']);
        
        if($path['basename']=="themes.php" || $path['basename']=="theme-editor.php" || $path['basename']=="admin.php?page=sfsi-options")
        {
        echo "<div class=\"error\" >" . "<p>Error : Please fix your theme to make plugins work correctly: Go to the <a href=\"theme-editor.php\">Theme Editor</a> and insert <code>&lt;?php wp_footer(); ?&gt;</code> as the first line of your theme's <code>footer.php</code> file. " . "</p></div>";
        }       
    }
}
/* admin notice for first time installation */
function sfsi_activation_msg()
{
      global $wp_version;
     
    if(get_option('sfsi_activate',false)==1)
     {
    echo "<div class=\"updated\" >" . "<p>Thank you for installing the <b>Ultimate Social Media Icons</b> Plugin. Please go to the <a href=\"admin.php?page=sfsi-options\">plugin's settings page </a> to configure it. </p></div>"; update_option('sfsi_activate',0);
     }
     $path=pathinfo($_SERVER['REQUEST_URI']);
     update_option('sfsi_activate',0);      
     if($wp_version<3.5 &&  $path['basename']=="admin.php?page=sfsi-options")
     {
    echo "<div class=\"update-nag\" >" . "<p ><b>You're using an old Wordpress version, which may cause several of your plugins to not work correctly. Please upgrade</b></p></div>"; 
     }
}
/* admin notice for first time installation */
function sfsi_rating_msg()
{
    global $wp_version;
    $install_date = get_option('sfsi_installDate');
    $display_date = date('Y-m-d h:i:s');
    $datetime1 = new DateTime($install_date);
    $datetime2 = new DateTime($display_date);
    $diff_inrval = round(($datetime2->format('U') - $datetime1->format('U')) / (60*60*24));
    if($diff_inrval >= 30 && get_option('sfsi_RatingDiv')=="no")
    {
     echo '<div class="sfwp_fivestar notice notice-success is-dismissible">
                <p>We noticed you\'ve been using the Ultimate Social Icons Plugin for more than 30 days. If you\'re happy with it, could you please do us a BIG favor and give it a 5-star rating on Wordpress?</p>
                <ul>
                    <li><a href="https://wordpress.org/support/plugin/ultimate-social-media-icons/reviews/" target="_new" title="Ok, you deserved it">Ok, you deserved it</a></li>
                    <li><a href="javascript:void(0);" class="sfsiHideRating" title="I already did">I already did</a></li>
                    <li><a href="javascript:void(0);" class="sfsiHideRating" title="No, not good enough">No, not good enough</a></li>
                </ul>
            </div>
    <script>
    jQuery( document ).ready(function( $ ) {
        jQuery(\'.sfsiHideRating\').click(function(){
            var data={\'action\':\'sfsi_hideRating\'}
            jQuery.ajax({
                url: "'.admin_url( 'admin-ajax.php' ).'",
                type: "post",
                data: data,
                dataType: "json",
                async: !0,
                success: function(e)
                {
                    if (e=="success") {
                       jQuery(\'.sfwp_fivestar\').slideUp(\'slow\');
                    }
                }
             });
        })
    });
    </script>
    ';
   }
}
add_action('wp_ajax_sfsi_hideRating','sfsi_HideRatingDiv', 0);
function sfsi_HideRatingDiv()
{
    update_option('sfsi_RatingDiv','yes');
    echo  json_encode(array("success")); exit;
}
/* add all admin message */
add_action('admin_notices', 'sfsi_activation_msg');
add_action('admin_notices', 'sfsi_rating_msg');
add_action('admin_notices', 'sfsi_check_wp_head');
add_action('admin_notices', 'sfsi_check_wp_footer');
function sfsi_pingVendor( $post_id )
{
    global $wp,$wpdb;
    // If this is just a revision, don't send the email.
    if ( wp_is_post_revision( $post_id ) )
        return;
    $post_data=get_post($post_id,ARRAY_A);
    if($post_data['post_status']=='publish' && $post_data['post_type']=='post') : 
     $categories = wp_get_post_categories($post_data['ID']);
     $cats='';
     $total=count($categories);
     $count=1;
     foreach($categories as $c)
     {  
        $cat_data = get_category( $c );
        if($count==$total)
        {
            $cats.=$cat_data->name;
        }
        else
        {
          $cats.=$cat_data->name.',';   
        }
        $count++;   
     }
    $postto_array = array(
        'feed_id'   => sanitize_text_field(get_option('sfsi_feed_id')),
        'title'     => $post_data['post_title'],
        'description'=> $post_data['post_content'],
        'link'      => $post_data['guid'],
        'author'    => get_the_author_meta('user_login', $post_data['post_author']),
        'category'  => $cats,
        'pubDate'   => $post_data['post_modified'],
        'rssurl'    => sfsi_get_bloginfo('rss2_url')
    );
    $curl = curl_init();  
     
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://www.specificfeeds.com/wordpress/addpostdata ',
        CURLOPT_USERAGENT => 'sf rss request',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => $postto_array
    ));
    // Send the request & save response to $resp
    $resp = curl_exec($curl);
    $resp=json_decode($resp);
    curl_close($curl);
      
       return true;
    endif;
}
add_action( 'save_post', 'sfsi_pingVendor' );   
?>
