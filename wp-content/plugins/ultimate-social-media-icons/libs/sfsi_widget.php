<?php 
/* create SFSI widget */
class Sfsi_Widget extends WP_Widget
{

	function __construct()
	{
		$widget_ops = array( 'classname' => 'sfsi', 'description' => __('Ultimate Social Media Icons widgets', 'Ultimate Social Media Icons ') );
        $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'sfsi-widget' );
		
		parent::__construct(
			// Base ID of your widget
			'sfsi-widget', 
	
			// Widget name will appear in UI
			__('Ultimate Social Media Icons', 'Ultimate Social Media Icons'), 
	
			// Widget description
			$widget_ops,
			
			$control_ops
		);
	}
	
	function widget( $args, $instance )
	{
		extract( $args );
		/*Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$show_info = isset( $instance['show_info'] ) ? $instance['show_info'] : false;
		global $is_floter;	      
		echo $before_widget;
		/* Display the widget title */
		if ( $title ) echo $before_title . $title . $after_title;
        ?>
            <div class="sfsi_widget" data-position="widget">   
				<div id='sfsi_wDiv'></div>
                    <?php 
						/* Link the main icons function */
               			echo sfsi_check_visiblity(0);
             		?>
	      		<div style="clear: both;"></div>
            </div>
            <?php
	      		if ( is_active_widget( false, false, $this->id_base, true ) ) { }
		echo $after_widget;
	}
	
	/*Update the widget */ 
	function update( $new_instance, $old_instance )
	{
		$instance = $old_instance;
		//Strip tags from title and name to remove HTML
		if($new_instance['showf']==0)
		{
		    $instance['showf']=1;
		}
		else
		{
		     $instance['showf']=0;
		}
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}
	
	/* Set up some default widget settings. */
	function form( $instance )
	{
		$defaults = array( 'title' =>"" );
		$instance = wp_parse_args( (array) $instance, $defaults );
		if(isset($instance['showf']) && !empty($instance['showf']))
		{
			if( $instance['showf'] == 0 && empty($instance['title']))
			{
				$instance['title']='Please follow & like us :)';
			}
			else
			{
				$instance['title'];
			}
		}
		else
		{
			$instance['title']='Please follow & like us :)';
		}
		?>
		<p>
		    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'Subscription and Social Icons'); ?></label>
		    <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		    <input type="hidden" value="<?php echo $instance['showf'] ?>" id="<?php echo $this->get_field_id( 'showf' ); ?>" name="<?php echo $this->get_field_name( 'showf' ); ?>" />
		</p>
		<p>
		     Please go to  the <a href="admin.php?page=sfsi-options">plugin page</a> to set your preferences
		</p>
	<?php
	}
}
/* END OF widget Class */
/* register widget to wordpress */
function register_sfsi_widgets()
{
    register_widget( 'sfsi_widget' );
}
add_action( 'widgets_init', 'register_sfsi_widgets' );

/* check the icons visiblity  */
function sfsi_check_visiblity($isFloter=0)
{
  	global $wpdb;
    /* Access the saved settings in database  */
    $sfsi_section1_options =  unserialize(get_option('sfsi_section1_options',false));
    $sfsi_section3 =  unserialize(get_option('sfsi_section3_options',false));
    $sfsi_section5 =  unserialize(get_option('sfsi_section5_options',false));
       
    /* calculate the width and icons display alignments */
    $icons_space = $sfsi_section5['sfsi_icons_spacing'];
    $icons_size = $sfsi_section5['sfsi_icons_size'];
    $icons_per_row = ($sfsi_section5['sfsi_icons_perRow'])? $sfsi_section5['sfsi_icons_perRow'] : '';
    
    $icons_alignment = $sfsi_section5['sfsi_icons_Alignment'];
    $position = 'position:absolute;';
    $position1 = 'position:absolute;';
    $jquery='<script>';
	
	$jquery .= 'jQuery(".sfsi_widget").each(function( index ) {
					if(jQuery(this).attr("data-position") == "widget")
					{
						var wdgt_hght = jQuery(this).children(".norm_row.sfsi_wDiv").height();
						var title_hght = jQuery(this).parent(".widget.sfsi").children(".widget-title").height();
						var totl_hght = parseInt( title_hght ) + parseInt( wdgt_hght );
						jQuery(this).parent(".widget.sfsi").css("min-height", totl_hght+"px");
					}
				});';
    
	/* check if icons shuffling is activated in admin or not */
    if($sfsi_section5['sfsi_icons_stick']=="yes")
	{
	    if(is_admin_bar_showing())
		{
		    $Ictop = "30px";
	    }
	    else
		{
			$Ictop = "0";
	    }
             
		 $jquery.='var s = jQuery(".sfsi_widget");
					var pos = s.position();            
					jQuery(window).scroll(function(){      
					sfsi_stick_widget("'.$Ictop.'");
		 }); ';
    }
	
    /* check if icons floating  is activated in admin */
    if($sfsi_section5['sfsi_icons_float']=="yes")
	{
         $top = "15";
         switch($sfsi_section5['sfsi_icons_floatPosition'])
         {
             case "top-left" : if(is_admin_bar_showing()) :  $position.="position:absolute;left:30px;top:35px;"; $top="35"; else : $position.="position:absolute;left:10px;top:2%"; $top="10"; endif;                                                
             break;
             case "top-right" : if(is_admin_bar_showing()) :  $position.="position:absolute;right:30px;top:35px;"; $top="35"; else : $position.="position:absolute;right:10px;top:2%"; $top="10"; endif;                       
             break;
             case "center-right" : $position.="position:absolute;right:30px;top:50%"; $top="center"; 
             break;
             case "center-left" : $position.="position:absolute;left:30px;top:50%"; $top="center";  
             break;
             case "bottom-right" : $position.="position:absolute;right:30px;bottom:0px"; $top="bottom"; 
             break;
             case "bottom-left" : $position.="position:absolute;left:30px;bottom:0px"; $top="bottom"; 
             break;
         }
        //$jquery.="jQuery( document ).ready(function( $ ) { sfsi_float_widget('".$top."')});";
		if($sfsi_section5['sfsi_icons_floatPosition'] == 'center-right' || $sfsi_section5['sfsi_icons_floatPosition'] == 'center-left')
		 {
        	$jquery.="jQuery( document ).ready(function( $ )
					  {
						var topalign = ( jQuery(window).height() - jQuery('#sfsi_floater').height() ) / 2;
						jQuery('#sfsi_floater').css('top',topalign);
					  	sfsi_float_widget('".$top."');
					  });";
		 }
		 else
		 {
			$jquery.="jQuery( document ).ready(function( $ ) { sfsi_float_widget('".$top."')});"; 
		 }	
    }
	  
    $extra=0;
    if($sfsi_section3['sfsi_shuffle_icons']=="yes")
    {
       if($sfsi_section3['sfsi_shuffle_Firstload']=="yes" && $sfsi_section3['sfsi_shuffle_interval']=="yes")
	   {
	     	$shuffle_time=(isset($sfsi_section3['sfsi_shuffle_intervalTime'])) ? $sfsi_section3['sfsi_shuffle_intervalTime'] : 3;
			$shuffle_time=$shuffle_time*1000;
			$jquery.="jQuery( document ).ready(function( $ ) {  jQuery('.sfsi_wDiv').each(function(){ new window.Manipulator( jQuery(this)); });  setTimeout(function(){  jQuery('#sfsi_wDiv').each(function(){ jQuery(this).click(); })},2000);  setInterval(function(){  jQuery('#sfsi_wDiv').each(function(){ jQuery(this).click(); })},".$shuffle_time."); });";
       }
	   else if($sfsi_section3['sfsi_shuffle_Firstload']=="no" && $sfsi_section3['sfsi_shuffle_interval']=="yes")
       {   
		   $shuffle_time=(isset($sfsi_section3['sfsi_shuffle_intervalTime'])) ? $sfsi_section3['sfsi_shuffle_intervalTime'] : 3;
		   $shuffle_time=$shuffle_time*1000; 
		   $jquery.="jQuery( document ).ready(function( $ ) {  jQuery('.sfsi_wDiv').each(function(){ new window.Manipulator( jQuery(this)); });  setInterval(function(){  jQuery('#sfsi_wDiv').each(function(){ jQuery(this).click(); })},".$shuffle_time."); });";
        }
        else
        {
            $jquery.="jQuery( document ).ready(function( $ ) {  jQuery('.sfsi_wDiv').each(function(){ new window.Manipulator( jQuery(this)); });  setTimeout(function(){  jQuery('#sfsi_wDiv').each(function(){ jQuery(this).click(); })},2000); });";
        }    
    }
	    
   /* magnage the icons in saved order in admin */ 
   $custom_icons_order = unserialize($sfsi_section5['sfsi_CustomIcons_order']);
   $icons = unserialize($sfsi_section1_options['sfsi_custom_files']);
   $icons_order = array(
   					 '0' => '',
					 $sfsi_section5['sfsi_rssIcon_order']=>'rss',
                     $sfsi_section5['sfsi_emailIcon_order']=>'email',
                     $sfsi_section5['sfsi_facebookIcon_order']=>'facebook',
                     $sfsi_section5['sfsi_googleIcon_order']=>'google',
                     $sfsi_section5['sfsi_twitterIcon_order']=>'twitter',
                     $sfsi_section5['sfsi_shareIcon_order']=>'share',
                     $sfsi_section5['sfsi_youtubeIcon_order']=>'youtube',
                     $sfsi_section5['sfsi_pinterestIcon_order']=>'pinterest',
                     $sfsi_section5['sfsi_linkedinIcon_order']=>'linkedin',
		     		 $sfsi_section5['sfsi_instagramIcon_order']=>'instagram',) ;
   if(is_array($custom_icons_order) ) 
   {
		foreach($custom_icons_order as $data)
		{
		   $icons_order[$data['order']] = $data;
		}
   }
   ksort($icons_order);
   
   /* calculate the total width of widget according to icons  */
   if(!empty($icons_per_row))
   {
		$width = ((int)$icons_space+(int)$icons_size)*(int)$icons_per_row;
		$main_width = $width=$width+$extra;
		$main_width = $main_width."px";
   }
   else
   {
		$main_width = "35%";
   }
	
    /* built the main widget div */
    $icons_main = '<div class="norm_row sfsi_wDiv"  style="width:'.$main_width.';text-align:'.$icons_alignment.';'.$position1.'">';
    $icons = "";
    /* loop through icons and bulit the icons with all settings applied in admin */
	foreach($icons_order  as $index => $icn) :
	if(is_array($icn)) { $icon_arry=$icn; $icn="custom" ; } 
    switch ($icn) :     
    case 'rss' :  if($sfsi_section1_options['sfsi_rss_display']=='yes')  $icons.= sfsi_prepairIcons('rss');  
    break;
    case 'email' :   if($sfsi_section1_options['sfsi_email_display']=='yes')   $icons.= sfsi_prepairIcons('email'); 
    break;
    case 'facebook' :  if($sfsi_section1_options['sfsi_facebook_display']=='yes') $icons.= sfsi_prepairIcons('facebook');
    break;
    case 'google' :  if($sfsi_section1_options['sfsi_google_display']=='yes')    $icons.= sfsi_prepairIcons('google'); ;
    break;
    case 'twitter' :  if($sfsi_section1_options['sfsi_twitter_display']=='yes')    $icons.= sfsi_prepairIcons('twitter'); 
    break;
    case 'share' :  if($sfsi_section1_options['sfsi_share_display']=='yes')    $icons.= sfsi_prepairIcons('share');    break;
    case 'youtube' :  if($sfsi_section1_options['sfsi_youtube_display']=='yes')     $icons.= sfsi_prepairIcons('youtube'); 
    break;
    case 'pinterest' :   if($sfsi_section1_options['sfsi_pinterest_display']=='yes')     $icons.= sfsi_prepairIcons('pinterest');
    break;
    case 'linkedin' :  if($sfsi_section1_options['sfsi_linkedin_display']=='yes')    $icons.= sfsi_prepairIcons('linkedin'); 
    break;
    case 'instagram' :  if($sfsi_section1_options['sfsi_instagram_display']=='yes')    $icons.= sfsi_prepairIcons('instagram'); 
    break;	  
    case 'custom' : $icons.= sfsi_prepairIcons($icon_arry['ele']); 
    break;    
    endswitch;
    endforeach;  
   
    $jquery.="</script>";
    $icons.='</div >';
    $margin=$width+11;
    $icons_main.=$icons.'<div id="sfsi_holder" class="sfsi_holders" style="position: relative; float: left;width:100%;z-index:-1;"></div >'.$jquery;
    /* if floating of icons is active create a floater div */
    $icons_float='';
    if($sfsi_section5['sfsi_icons_float']=="yes" && $isFloter==1)
    {
		if($sfsi_section5['sfsi_icons_floatPosition'] == "top-left")
		{
			$styleMargin = "margin-top:".$sfsi_section5['sfsi_icons_floatMargin_top']."px;margin-left:".$sfsi_section5['sfsi_icons_floatMargin_left']."px;";
		}
		elseif($sfsi_section5['sfsi_icons_floatPosition'] == "top-right")
		{
			$styleMargin = "margin-top:".$sfsi_section5['sfsi_icons_floatMargin_top']."px;margin-right:".$sfsi_section5['sfsi_icons_floatMargin_right']."px;";
		}
		elseif($sfsi_section5['sfsi_icons_floatPosition'] == "center-left")
		{
			$styleMargin = "margin-left:".$sfsi_section5['sfsi_icons_floatMargin_left']."px;";
		}
		elseif($sfsi_section5['sfsi_icons_floatPosition'] == "center-right")
		{
			$styleMargin = "margin-right:".$sfsi_section5['sfsi_icons_floatMargin_right']."px;";
		}
		elseif($sfsi_section5['sfsi_icons_floatPosition'] == "bottom-left")
		{
			$styleMargin = "margin-bottom:".$sfsi_section5['sfsi_icons_floatMargin_bottom']."px;margin-left:".$sfsi_section5['sfsi_icons_floatMargin_left']."px;";
		}
		elseif($sfsi_section5['sfsi_icons_floatPosition'] == "bottom-right")
		{
			$styleMargin = "margin-bottom:".$sfsi_section5['sfsi_icons_floatMargin_bottom']."px;margin-right:".$sfsi_section5['sfsi_icons_floatMargin_right']."px;";
		}
		
		$icons_float = '<style type="text/css">#sfsi_floater { '.$styleMargin.' }</style>';
		$icons_float .= '<div class="norm_row sfsi_wDiv" id="sfsi_floater"  style="z-index: 9999;width:'.$width.'px;text-align:'.$icons_alignment.';'.$position.'">';
		$icons_float .= $icons;
		$icons_float .= "<input type='hidden' id='sfsi_floater_sec' value='".$sfsi_section5['sfsi_icons_floatPosition']."' />";
		$icons_float.="</div>".$jquery;
		return $icons_float; exit;
    }
    $icons_data=$icons_main.$icons_float;
    return $icons_data;
}

/* make all icons with saved settings in admin */
function sfsi_prepairIcons($icon_name,$is_front=0)
{  
    global $wpdb; global $socialObj;
    $mouse_hover_effect = ''; 
    $active_theme = 'official';
    $sfsi_shuffle_Firstload = 'no';
    $sfsi_display_counts = "no";
    $icon = '';
    $url = '';
    $alt_text = '';
    $new_window = '';
    $class = '';
	
	/* access  all saved settings in admin */
    $sfsi_section1_options =  unserialize(get_option('sfsi_section1_options',false));
    $sfsi_section2_options =  unserialize(get_option('sfsi_section2_options',false));
    $sfsi_section3_options =  unserialize(get_option('sfsi_section3_options',false));
    $sfsi_section4_options =  unserialize(get_option('sfsi_section4_options',false));
    $sfsi_section5_options =  unserialize(get_option('sfsi_section5_options',false));
    $sfsi_section6_options =  unserialize(get_option('sfsi_section6_options',false));
    $sfsi_section7_options =  unserialize(get_option('sfsi_section7_options',false));

	/* get active theme */
    $border_radius='';
    $active_theme = $sfsi_section3_options['sfsi_actvite_theme'];
    
    /* shuffle effect */   
    if($sfsi_section3_options['sfsi_shuffle_icons']=='yes')
	{
	    $sfsi_shuffle_Firstload=$sfsi_section3_options["sfsi_shuffle_Firstload"];
        if($sfsi_section3_options["sfsi_shuffle_interval"]=="yes")
		{
            $sfsi_shuffle_interval = $sfsi_section3_options["sfsi_shuffle_intervalTime"];
        }
    }
    
	/* define the main url for icon access */ 
    $icons_baseUrl = SFSI_PLUGURL."images/icons_theme/".$active_theme."/";
    $visit_iconsUrl = SFSI_PLUGURL."images/visit_icons/";   
    $hoverSHow = 0;
   
   /* check is icon is a custom icon or default icon */  
   if(is_numeric($icon_name)) { $icon_n=$icon_name; $icon_name="custom" ; } 
    $counts = '';
    $twit_tolCls = "";
    $twt_margin = "";
    $icons_space = $sfsi_section5_options['sfsi_icons_spacing'];
    $padding_top = '';
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https" : "http";
	$current_url = $scheme.'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	$url = "#";
    $cmcls = '';
    $toolClass = '';
    
	switch($icon_name)
    {
        case "rss" :
			 $socialObj = new sfsi_SocialHelper(); /* global object to access 3rd party icon's actions */	
		     $url = ($sfsi_section2_options['sfsi_rss_url'])? $sfsi_section2_options['sfsi_rss_url'] : 'javascript:void(0);';
             $toolClass = "rss_tool_bdr";
		     $hoverdiv = '';
		     $arrow_class = "bot_rss_arow";
		     
			 /* fecth no of counts if active in admin section */
			 if($sfsi_section4_options['sfsi_rss_countsDisplay']=="yes" && $sfsi_section4_options['sfsi_display_counts']=="yes")
			 {
				 $counts=$socialObj->format_num($sfsi_section4_options['sfsi_rss_manualCounts']);
			 }
			 
			 if(!empty($sfsi_section5_options['sfsi_rss_MouseOverText'])) 
			 {	
			 	$alt_text = $sfsi_section5_options['sfsi_rss_MouseOverText'];
			 }
			 else
			 {
				 $alt_text = 'RSS';
			 }
			 
			 //Custom Skin Support {Monad}	 
			 if($active_theme == 'custom_support')
			 {
				 if(get_option("rss_skin"))
				 {
					$icon = get_option("rss_skin");
				 }
				 else
				 {
					$active_theme = 'default';
					$icons_baseUrl = SFSI_PLUGURL."images/icons_theme/default/";
					$icon=$icons_baseUrl.$active_theme."_rss.png"; 
				 }
			 }
			 else
			 {
				$icon=$icons_baseUrl.$active_theme."_rss.png";
			 }		 
        break;
        
		case "email" :
			   $socialObj = new sfsi_SocialHelper();  /* global object to access 3rd party icon's actions */	
		       $hoverdiv = '';
			   $sfsi_section2_options['sfsi_email_url'];
			   $url = (isset($sfsi_section2_options['sfsi_email_url'])) ? $sfsi_section2_options['sfsi_email_url'] : 'javascript:void(0);';
			   $toolClass = "email_tool_bdr";
		       $arrow_class = "bot_eamil_arow";
		       
			   /* fecth no of counts if active in admin section */
		       if(
			   		$sfsi_section4_options['sfsi_email_countsDisplay']=="yes" &&
					$sfsi_section4_options['sfsi_display_counts']=="yes"
			   )
			   {
				 if($sfsi_section4_options['sfsi_email_countsFrom']=="manual")
				 {    
				 	$counts=$socialObj->format_num($sfsi_section4_options['sfsi_email_manualCounts']);
			   	 }
				 else
				 {
					$counts = $socialObj->SFSI_getFeedSubscriber(sanitize_text_field(get_option('sfsi_feed_id',false)));
				 }  
			   }
			   
			   if(!empty($sfsi_section5_options['sfsi_email_MouseOverText']))
			   { 
               		$alt_text = $sfsi_section5_options['sfsi_email_MouseOverText'];
			   }
			   else
			   {
				   $alt_text = 'EMAIL';
			   }
					  
			//Custom Skin Support {Monad}	 
			if($active_theme == 'custom_support')
			{
				 if(get_option("email_skin"))
				 {
					$icon = get_option("email_skin");
				 }
				 else
				 {
					$active_theme = 'default';
					$icons_baseUrl = SFSI_PLUGURL."images/icons_theme/default/";
					//$icon=($sfsi_section2_options['sfsi_rss_icons']=="sfsi") ? $icons_baseUrl.$active_theme."_sf.png" : $icons_baseUrl.$active_theme."_email.png"; 
					if($sfsi_section2_options['sfsi_rss_icons']=="sfsi")
					{
						$icon = $icons_baseUrl.$active_theme."_sf.png";					
					}
					elseif($sfsi_section2_options['sfsi_rss_icons']=="email")
					{
						$icon = $icons_baseUrl.$active_theme."_email.png";
					}
					else
					{
						$icon = $icons_baseUrl.$active_theme."_subscribe.png";
					}
				 }
			}
			else
			{
				//$icon=($sfsi_section2_options['sfsi_rss_icons']=="sfsi") ? $icons_baseUrl.$active_theme."_sf.png" : $icons_baseUrl.$active_theme."_email.png";
				if($sfsi_section2_options['sfsi_rss_icons']=="sfsi")
				{
					$icon = $icons_baseUrl.$active_theme."_sf.png";					
				}
				elseif($sfsi_section2_options['sfsi_rss_icons']=="email")
				{
					$icon = $icons_baseUrl.$active_theme."_email.png";
				}
				else
				{
					$icon = $icons_baseUrl.$active_theme."_subscribe.png";
				}
			}
        break;
        
		case "facebook" :
			$socialObj = new sfsi_SocialHelper();
			$width = 62;
		    $totwith = $width+28+$icons_space;
		    $twt_margin = $totwith/2;
		    $toolClass = "fb_tool_bdr";
		    $arrow_class = "bot_fb_arow";
		    
			/* check for the over section */
			if(!empty($sfsi_section5_options['sfsi_facebook_MouseOverText']))
			{
				$alt_text = $sfsi_section5_options['sfsi_facebook_MouseOverText'];
			}
			else
			{
				$alt_text = "FACEBOOK";
			}
			
			$visit_icon = $visit_iconsUrl."facebook.png";
		    $url = ($sfsi_section2_options['sfsi_facebookPage_url']) ? $sfsi_section2_options['sfsi_facebookPage_url']:'javascript:void(0);';
                    
			if(
				$sfsi_section2_options['sfsi_facebookLike_option']=="yes" ||
				$sfsi_section2_options['sfsi_facebookShare_option']=="yes"
			)
			{
				 $url=($sfsi_section2_options['sfsi_facebookPage_url']) ? $sfsi_section2_options['sfsi_facebookPage_url']:'javascript:void(0);';
				 $hoverSHow=1;
				 $hoverdiv='';
				 if($sfsi_section2_options['sfsi_facebookPage_option']=="yes")
				 {
					 $hoverdiv.="<div  class='icon1'><a href='".$url."' ".sfsi_checkNewWindow($url)."><img alt='".$alt_text."' title='".$alt_text."' src='".$visit_icon."'  /></a></div>";
				 }  
				 if($sfsi_section2_options['sfsi_facebookLike_option']=="yes")
				 {
					 $hoverdiv.="<div  class='icon2'>".$socialObj->sfsi_FBlike($current_url)."</div>";
				 }    
				 if($sfsi_section2_options['sfsi_facebookShare_option']=="yes")
				 {
					 $hoverdiv.="<div  class='icon3'>".$socialObj->sfsiFB_Share($current_url)."</div>";
				 } 
				 
			 }
			 
			 /* fecth no of counts if active in admin section */
			 if(
			 	$sfsi_section4_options['sfsi_facebook_countsDisplay']=="yes" &&
				$sfsi_section4_options['sfsi_display_counts']=="yes"
			 )
			 {
				 if($sfsi_section4_options['sfsi_facebook_countsFrom']=="manual")
				 {    
				 	$counts=$socialObj->format_num($sfsi_section4_options['sfsi_facebook_manualCounts']);
				 }
				 else if($sfsi_section4_options['sfsi_facebook_countsFrom']=="likes")
				 {
					 $fb_data=$socialObj->sfsi_get_fb($current_url);   
					 $counts=$socialObj->format_num($fb_data['like_count']);
					 if(empty($counts))
					 {
					   $counts=(string) "0";
					 }
				 }
				 else if($sfsi_section4_options['sfsi_facebook_countsFrom']=="followers")
				 {
					 $fb_data=$socialObj->sfsi_get_fb($current_url);
					 $counts=$socialObj->format_num($fb_data['share_count']);
					
				 }
				 else if($sfsi_section4_options['sfsi_facebook_countsFrom']=="mypage")
				 {
					 $current_url = $sfsi_section4_options['sfsi_facebook_mypageCounts'];
					 $fb_data=$socialObj->sfsi_get_fb_pagelike($current_url);
					 $counts=$socialObj->format_num($fb_data);
				}
			} 
			
			//Custom Skin Support {Monad}	 
			if($active_theme == 'custom_support')
			{
				 if(get_option("facebook_skin"))
				 {
					$icon = get_option("facebook_skin");
				 }
				 else
				 {
					$active_theme = 'default';
					$icons_baseUrl = SFSI_PLUGURL."images/icons_theme/default/";
					$icon=$icons_baseUrl.$active_theme."_facebook.png";
				 }
			}
			else
			{
				$icon=$icons_baseUrl.$active_theme."_facebook.png";
			}		 
        break;
		
        case "google" :                    
				$toolClass = "gpls_tool_bdr";
				$arrow_class = "bot_gpls_arow";
				$socialObj = new sfsi_SocialHelper();
				$width = 76;
				$totwith = $width+28+$icons_space;
				$twt_margin = $totwith/2;
				
				if(!empty($sfsi_section5_options['sfsi_google_MouseOverText']))
				{
					$alt_text = $sfsi_section5_options['sfsi_google_MouseOverText'];
				}
				else
				{
					$alt_text = "GOOGLE";
				}
				
				$visit_icon = $visit_iconsUrl."google.png";
				$url = ($sfsi_section2_options['sfsi_google_pageURL'])?$sfsi_section2_options['sfsi_google_pageURL'] : 'javascript:void(0);';
				
				/* check for icons to display */     
				if(
					$sfsi_section2_options['sfsi_googleLike_option']=="yes" ||
					$sfsi_section2_options['sfsi_googleShare_option']=="yes"
				)
				{
					 $hoverSHow=1;
					 $hoverdiv='';
					 if($sfsi_section2_options['sfsi_google_page']=="yes")
					 {
						  $hoverdiv.="<div  class='icon1'><a href='".$url."' ".sfsi_checkNewWindow($url)."><img alt='".$alt_text."' title='".$alt_text."' src='".$visit_icon."'  /></a></div>";  
					 } 
					 if($sfsi_section2_options['sfsi_googleLike_option']=="yes")
					 {
						 $hoverdiv.="<div  class='icon2'>".$socialObj->sfsi_Googlelike($current_url)."</div>";  
					 }    
					 if($sfsi_section2_options['sfsi_googleShare_option']=="yes")
					 {
						 $hoverdiv.="<div  class='icon3'>".$socialObj->sfsi_GoogleShare($current_url)."</div>"; 
					 }                          
				 }

				/* fecth no of counts if active in admin section */
				if(
					$sfsi_section4_options['sfsi_google_countsDisplay']=="yes" &&
					$sfsi_section4_options['sfsi_display_counts']=="yes"
				)
				{
					 if($sfsi_section4_options['sfsi_google_countsFrom']=="manual")
					 {    
					 	$counts = $socialObj->format_num($sfsi_section4_options['sfsi_google_manualCounts']);
					 }
					 else if($sfsi_section4_options['sfsi_google_countsFrom']=="likes")
					 {
						$api_key = $sfsi_section4_options['sfsi_google_api_key'];
						$followers = $socialObj->sfsi_getPlus1($current_url);
						$counts = $socialObj->format_num($followers);
						if(empty($counts))
						{
							$counts = (string) "0";
						}
					 }
					 else if($sfsi_section4_options['sfsi_google_countsFrom']=="follower")
					 {
						$api_key = $sfsi_section4_options['sfsi_google_api_key'];
						$followers = $socialObj->sfsi_get_google($url,$api_key);
						$counts = $followers;
						if(empty($counts))
						{
							$counts = (string) "0";
						}
					 }   
				} 
				
				//Custom Skin Support {Monad}	 
				if($active_theme == 'custom_support')
				{
					 if(get_option("google_skin"))
					 {
						$icon = get_option("google_skin");
					 }
					 else
					 {
						$active_theme = 'default';
						$icons_baseUrl = SFSI_PLUGURL."images/icons_theme/default/";
						$icon=$icons_baseUrl.$active_theme."_google.png";
					 }
				}
				else
				{
					$icon=$icons_baseUrl.$active_theme."_google.png";
				}		 
        break;
        
		case "twitter" :
				$toolClass = "twt_tool_bdr";
				$arrow_class = "bot_twt_arow";
				$socialObj = new sfsi_SocialHelper();
				$url = ($sfsi_section2_options['sfsi_twitter_pageURL'])?$sfsi_section2_options['sfsi_twitter_pageURL'] : 'javascript:void(0);';
				$twitter_user = $sfsi_section2_options['sfsi_twitter_followUserName'];
				$twitter_text = $sfsi_section2_options['sfsi_twitter_aboutPageText'];
				$visit_icon = $visit_iconsUrl."twitter.png";
				$width = 59;
				$totwith = $width+28+$icons_space;
				$twt_margin = $totwith/2;
             	/* check for icons to display */
		     	$hoverdiv='';
			    
				 if(
				 	$sfsi_section2_options['sfsi_twitter_followme']=="yes" ||
					$sfsi_section2_options['sfsi_twitter_aboutPage']=="yes"
				 )
				 {
					 $hoverSHow=1;
					 //Visit twitter page {Monad}	 
					 if($sfsi_section2_options['sfsi_twitter_page']=="yes")
					 {
						  $hoverdiv.="<div  class='cstmicon1'><a href='".$url."' ".sfsi_checkNewWindow($url)."><img alt='Visit Us' title='Visit Us' src='".$visit_icon."'  /></a></div>";  
					 }
					 if($sfsi_section2_options['sfsi_twitter_followme']=="yes" && !empty($twitter_user))
					 {
						 $hoverdiv.="<div  class='icon1'>".$socialObj->sfsi_twitterFollow($twitter_user)."</div>";
					 }    
					 if($sfsi_section2_options['sfsi_twitter_aboutPage']=="yes")
					 {
						 $hoverdiv.="<div  class='icon2'>".$socialObj->sfsi_twitterShare($current_url,$twitter_text)."</div>";
					 } 
					 
				 }
		      	 
				 /* fecth no of counts if active in admin section */
				 if(
				 	$sfsi_section4_options['sfsi_twitter_countsDisplay']=="yes" &&
					$sfsi_section4_options['sfsi_display_counts']=="yes"
				 )
				 {
					 if($sfsi_section4_options['sfsi_twitter_countsFrom']=="manual")
					 {    
					 	$counts = $socialObj->format_num($sfsi_section4_options['sfsi_twitter_manualCounts']);
					 }
					 else if($sfsi_section4_options['sfsi_twitter_countsFrom']=="source")
					 {
						$tw_settings = array('tw_consumer_key'=>$sfsi_section4_options['tw_consumer_key'],
										   'tw_consumer_secret'=> $sfsi_section4_options['tw_consumer_secret'],
										   'tw_oauth_access_token'=> $sfsi_section4_options['tw_oauth_access_token'],
										   'tw_oauth_access_token_secret'=> $sfsi_section4_options['tw_oauth_access_token_secret']);
						$followers = $socialObj->sfsi_get_tweets($twitter_user,$tw_settings);
						$counts = $socialObj->format_num($followers);
						if(empty($counts))
						{
						   $counts=(string) "0";
						}
					 }
				 } 
                 
				 //Giving alternative text to image 	 
				 if(!empty($sfsi_section5_options['sfsi_twitter_MouseOverText']))
				 {
				 	$alt_text = $sfsi_section5_options['sfsi_twitter_MouseOverText'];
				 }
				 else
				 {
					 $alt_text = "TWITTER"; 
				 }
				 
				//Custom Skin Support {Monad}	 
				if($active_theme == 'custom_support')
				{
					 if(get_option("twitter_skin"))
					 {
						$icon = get_option("twitter_skin");
					 }
					 else
					 {
						$active_theme = 'default';
						$icons_baseUrl = SFSI_PLUGURL."images/icons_theme/default/";
						$icon=$icons_baseUrl.$active_theme."_twitter.png";
					 }
				}
				else
				{
					$icon=$icons_baseUrl.$active_theme."_twitter.png";
				}
        break;
        
		case "share" :
				$socialObj = new sfsi_SocialHelper();
				$url = "http://www.addthis.com/bookmark.php?v=250";
				$class = "addthis_button";
				
				/*fecth no of counts if active in admin section */
		      	if($sfsi_section4_options['sfsi_shares_countsDisplay']=="yes" && $sfsi_section4_options['sfsi_display_counts']=="yes")
                {
					  if($sfsi_section4_options['sfsi_shares_countsFrom']=="manual")
					  {    
						 $counts = $socialObj->format_num($sfsi_section4_options['sfsi_shares_manualCounts']);
					  }
					  else if($sfsi_section4_options['sfsi_shares_countsFrom']=="shares")
					  {
						 $shares=$socialObj->sfsi_get_atthis();
						 $counts=$socialObj->format_num($shares);
						 if(empty($counts))
						 {
							$counts=(string) "0";
						 }
					   } 
                 }  
                 
				 //Giving alternative text to image
				 if(!empty($sfsi_section5_options['sfsi_share_MouseOverText']))
				 {	
				 	$alt_text = $sfsi_section5_options['sfsi_share_MouseOverText'];
				 }
				 else
				 {
					 $alt_text = "SHARE";
				 }
				 
				//Custom Skin Support {Monad}	 
				if($active_theme == 'custom_support')
				{
					 if(get_option("share_skin"))
					 {
						$icon = get_option("share_skin");
					 }
					 else
					 {
						$active_theme = 'default';
						$icons_baseUrl = SFSI_PLUGURL."images/icons_theme/default/";
						$icon=$icons_baseUrl.$active_theme."_share.png";
					 }
				}
				else
				{
					$icon=$icons_baseUrl.$active_theme."_share.png";
				}	  
		break;
        
		case "youtube" :
				$socialObj = new sfsi_SocialHelper();
				$toolClass = "utube_tool_bdr";
				$arrow_class = "bot_utube_arow";
				$socialObj = new sfsi_SocialHelper();
				$width = 96;
				$totwith = $width+28+$icons_space;
				$twt_margin = $totwith/2;
				$youtube_user = (isset($sfsi_section4_options['sfsi_youtube_user']) && !empty($sfsi_section4_options['sfsi_youtube_user'])) ? $sfsi_section4_options['sfsi_youtube_user'] : 'SpecificFeeds';
				$visit_icon = $visit_iconsUrl."youtube.png";
				$url = ($sfsi_section2_options['sfsi_youtube_pageUrl'])? $sfsi_section2_options['sfsi_youtube_pageUrl'] : 'javascript:void(0);';
				
				//Giving alternative text to image
				if(!empty($sfsi_section5_options['sfsi_youtube_MouseOverText']))
				{	
				 	$alt_text = $sfsi_section5_options['sfsi_youtube_MouseOverText'];
				}
				else
				{
					 $alt_text = "YOUTUBE";
				}
				 
				/* check for icons to display */
				$hoverdiv="";
				if($sfsi_section2_options['sfsi_youtube_follow']=="yes" )
				{
					$hoverSHow=1;
					if($sfsi_section2_options['sfsi_youtube_page']=="yes")
					{ 
						  $hoverdiv.="<div  class='icon1'><a href='".$url."'  ".sfsi_checkNewWindow($url)."><img alt='".$alt_text."' title='".$alt_text."' src='".$visit_icon."'  /></a></div>";  
					} 
					if($sfsi_section2_options['sfsi_youtube_follow']=="yes")
					{
						 $hoverdiv.="<div  class='icon2'>".$socialObj->sfsi_YouTubeSub($youtube_user)."</div>";
					}    
				 }
                 
				 /* fecth no of counts if active in admin section */  
                 if(
				 	$sfsi_section4_options['sfsi_youtube_countsDisplay']=="yes" &&
					$sfsi_section4_options['sfsi_display_counts']=="yes"
				 )
                 {
                      if($sfsi_section4_options['sfsi_youtube_countsFrom']=="manual")
                      {    
                         $counts = $socialObj->format_num($sfsi_section4_options['sfsi_youtube_manualCounts']);
                      }
                      else if($sfsi_section4_options['sfsi_youtube_countsFrom']=="subscriber")
                      {
                             $followers = $socialObj->sfsi_get_youtube($youtube_user);
                             $counts = $socialObj->format_num($followers);
                             if(empty($counts))
							 {
							   $counts = (string) "0";
							 }
                       }
                  }
			
				//Custom Skin Support {Monad}	 
				if($active_theme == 'custom_support')
				{
					 if(get_option("youtube_skin"))
					 {
						$icon = get_option("youtube_skin");
					 }
					 else
					 {
						$active_theme = 'default';
						$icons_baseUrl = SFSI_PLUGURL."images/icons_theme/default/";
						$icon=$icons_baseUrl.$active_theme."_youtube.png";
					 }
				}
				else
				{
					$icon=$icons_baseUrl.$active_theme."_youtube.png";
				}	  
       break;
       
	   case "pinterest" :
				$width = 73;
				$totwith = $width+28+$icons_space;
				$twt_margin = $totwith/2;
				$socialObj = new sfsi_SocialHelper();			 
				$toolClass = "printst_tool_bdr";
				$arrow_class = "bot_pintst_arow";
				
				$pinterest_user 	= 	(isset($sfsi_section4_options['sfsi_pinterest_user']))
											? $sfsi_section4_options['sfsi_pinterest_user'] : '';
				$pinterest_board 	= 	(isset($sfsi_section4_options['sfsi_pinterest_board']))
											? $sfsi_section4_options['sfsi_pinterest_board'] : '';
											
				$visit_icon = $visit_iconsUrl."pinterest.png";
		        $url = (isset($sfsi_section2_options['sfsi_pinterest_pageUrl'])) ? $sfsi_section2_options['sfsi_pinterest_pageUrl'] : 'javascript:void(0);';
                
				//Giving alternative text to image
				if(!empty($sfsi_section5_options['sfsi_pinterest_MouseOverText']))
				{	
				 	$alt_text = $sfsi_section5_options['sfsi_pinterest_MouseOverText'];
				}
				else
				{
					 $alt_text = "PINTEREST";
				}
				
				/* check for icons to display */  
                $hoverdiv="";
			    if($sfsi_section2_options['sfsi_pinterest_pingBlog']=="yes" )  
			    {
					$hoverSHow=1;
				 	if($sfsi_section2_options['sfsi_pinterest_page']=="yes")
					{
						  $hoverdiv.="<div  class='icon1'><a href='".$url."' ".sfsi_checkNewWindow($url)."><img alt='".$alt_text."' title='".$alt_text."' src='".$visit_icon."'  /></a></div>";
					} 
					if($sfsi_section2_options['sfsi_pinterest_pingBlog']=="yes")
					{
						 if($sfsi_section2_options['sfsi_pinterest_pingBlog']=="yes")
						 {
							 $hoverdiv.="<div  class='icon2'>".$socialObj->sfsi_PinIt($current_url)."</div>";
						 }    
					}
			   } 
               
			   /* fecth no of counts if active in admin section */   
		   	   if(
			   		$sfsi_section4_options['sfsi_pinterest_countsDisplay'] == "yes" &&
					$sfsi_section4_options['sfsi_display_counts']=="yes"
			   )
               {
					 if($sfsi_section4_options['sfsi_pinterest_countsFrom']=="manual")
					 {    
						$counts = $socialObj->format_num($sfsi_section4_options['sfsi_pinterest_manualCounts']);
					 }
					 else if($sfsi_section4_options['sfsi_pinterest_countsFrom']=="pins")
					 {
						$pins = $socialObj->sfsi_get_pinterest($current_url);
						$counts = $pins;
						if(empty($counts))
						{
						   $counts=(string) "0";
						}
					 }
                }
				
				//Custom Skin Support {Monad}	 
				if($active_theme == 'custom_support')
				{
					 if(get_option("pintrest_skin"))
					 {
						$icon = get_option("pintrest_skin");
					 }
					 else
					 {
						$active_theme = 'default';
						$icons_baseUrl = SFSI_PLUGURL."images/icons_theme/default/";
						$icon = $icons_baseUrl.$active_theme."_pinterest.png";
					 }
				}
				else
				{
					$icon=$icons_baseUrl.$active_theme."_pinterest.png";
				}	                
        break;
		
		case "instagram" :		 
				$toolClass = "instagram_tool_bdr";
				$arrow_class = "bot_pintst_arow";
				$socialObj = new sfsi_SocialHelper();
				$url = (isset($sfsi_section2_options['sfsi_instagram_pageUrl'])) ? $sfsi_section2_options['sfsi_instagram_pageUrl'] : 'javascript:void(0);';
				$instagram_user_name = $sfsi_section4_options['sfsi_instagram_User'];
				
				//Giving alternative text to image
				if(!empty($sfsi_section5_options['sfsi_instagram_MouseOverText']))
				{	
				 	$alt_text = $sfsi_section5_options['sfsi_instagram_MouseOverText'];
				}
				else
				{
					 $alt_text = "INSTAGRAM";
				}
				     
		     	$hoverdiv="";
                /* fecth no of counts if active in admin section */ 
				if(
					$sfsi_section4_options['sfsi_instagram_countsDisplay']=="yes" &&
					$sfsi_section4_options['sfsi_display_counts']=="yes"
				)
				{
					if($sfsi_section4_options['sfsi_instagram_countsFrom']=="manual")
					{    
						$counts = $socialObj->format_num($sfsi_section4_options['sfsi_instagram_manualCounts']);
					}
					else if($sfsi_section4_options['sfsi_instagram_countsFrom']=="followers")
					{
						$counts = $socialObj->sfsi_get_instagramFollowers($instagram_user_name);
						if(empty($counts))
						{
						   $counts=(string) "0";
						}
					 }      
				 }
				 
            	//Custom Skin Support {Monad}	 
				if($active_theme == 'custom_support')
				{
					 if(get_option("instagram_skin"))
					 {
						$icon = get_option("instagram_skin");
					 }
					 else
					 {
						$active_theme = 'default';
						$icons_baseUrl = SFSI_PLUGURL."images/icons_theme/default/";
						$icon=$icons_baseUrl.$active_theme."_instagram.png";
					 }
				}
				else
				{
					$icon=$icons_baseUrl.$active_theme."_instagram.png";
				}
        break;
        
		case "linkedin" :
				$width = 66;
				$socialObj = new sfsi_SocialHelper();		
				$toolClass = "linkedin_tool_bdr";
				$arrow_class = "bot_linkedin_arow";                
				$linkedIn_compayId = $sfsi_section2_options['sfsi_linkedin_followCompany'];
				$linkedIn_compay = $sfsi_section2_options['sfsi_linkedin_followCompany']; 
				$linkedIn_ProductId = $sfsi_section2_options['sfsi_linkedin_recommendProductId'];
				$visit_icon = $visit_iconsUrl."linkedIn.png";
				
				/*check for icons to display */     
				$url=($sfsi_section2_options['sfsi_linkedin_pageURL'])? $sfsi_section2_options['sfsi_linkedin_pageURL'] : 'javascript:void(0);';         
		     	
				if(
					$sfsi_section2_options['sfsi_linkedin_follow']=="yes" ||
					$sfsi_section2_options['sfsi_linkedin_SharePage']=="yes" ||
					$sfsi_section2_options['sfsi_linkedin_recommendBusines']=="yes"
				)
                {
			 		 $hoverSHow=1;
					 $hoverdiv='';
					 if($sfsi_section2_options['sfsi_linkedin_page']=="yes")
					 {
						  $hoverdiv.="<div  class='icon4'><a href='".$url."' ".sfsi_checkNewWindow($url)."><img alt='".$alt_text."' title='".$alt_text."' src='".$visit_icon."'  /></a></div>";  
					 } 
					 if($sfsi_section2_options['sfsi_linkedin_follow']=="yes")
					 {
						 $hoverdiv.="<div  class='icon1'>".$socialObj->sfsi_LinkedInFollow($linkedIn_compayId)."</div>";  
					 }    
					 if($sfsi_section2_options['sfsi_linkedin_SharePage']=="yes")
					 {
						 $hoverdiv.="<div  class='icon2'>".$socialObj->sfsi_LinkedInShare()."</div>";  
					 }
					 if($sfsi_section2_options['sfsi_linkedin_recommendBusines']=="yes")
					 {
						 $hoverdiv.="<div  class='icon3'>".$socialObj->sfsi_LinkedInRecommend($linkedIn_compay,$linkedIn_ProductId)."</div>";  
						 $width=99;
					 }
                 }
				  
                 /* fecth no of counts if active in admin section */   
				 if(
				 	$sfsi_section4_options['sfsi_linkedIn_countsDisplay']=="yes" &&
					$sfsi_section4_options['sfsi_display_counts']=="yes"
				 )
				 {
					 if($sfsi_section4_options['sfsi_linkedIn_countsFrom']=="manual")
					 {    
					 	$counts = $socialObj->format_num($sfsi_section4_options['sfsi_linkedIn_manualCounts']);
					 }
					 else if($sfsi_section4_options['sfsi_linkedIn_countsFrom']=="follower")
					 {
						 $linkedIn_compay = $sfsi_section4_options['ln_company'];
						 $ln_settings = array('ln_api_key'=>$sfsi_section4_options['ln_api_key'],
										  'ln_secret_key'=>$sfsi_section4_options['ln_secret_key'],
										  'ln_oAuth_user_token'=>$sfsi_section4_options['ln_oAuth_user_token']);
										  
						 $followers=$socialObj->sfsi_getlinkedin_follower($linkedIn_compay,$ln_settings);
						 (int) $followers;
			 			 $counts=$socialObj->format_num($followers);
						 if(empty($counts))
			 			 {
			  	 			$counts = (string) "0";
			 			 }
					 }
				 } 
		     	 $totwith = $width+28+$icons_space;
		     	 $twt_margin = $totwith/2;
                 
			    //Giving alternative text to image
				if(!empty($sfsi_section5_options['sfsi_linkedIn_MouseOverText']))
				{	
				 	$alt_text = $sfsi_section5_options['sfsi_linkedIn_MouseOverText'];
				}
				else
				{
					 $alt_text = "LINKEDIN";
				}
			    
				//Custom Skin Support {Monad}	  
				if($active_theme == 'custom_support')
				{
					 if(get_option("linkedin_skin"))
					 {
						$icon = get_option("linkedin_skin");
					 }
					 else
					 {
						$active_theme = 'default';
						$icons_baseUrl = SFSI_PLUGURL."images/icons_theme/default/";
						$icon=$icons_baseUrl.$active_theme."_linkedin.png";
					 }
				}
				else
				{
					$icon=$icons_baseUrl.$active_theme."_linkedin.png";
				}	 
           break;   
           
		   default:
		      	$border_radius = "";
		     	//$border_radius =" border-radius:48%;";
		      	$cmcls = "cmcls";      
		      	$padding_top = "";	
				if($active_theme=="badge")
				{
					//$border_radius="border-radius: 18%;";
				}
				if($active_theme=="cute")
				{
					//$border_radius="border-radius: 38%;";
				}
				
				$custom_icon_urls = unserialize($sfsi_section2_options['sfsi_CustomIcon_links']);
				$url = (isset($custom_icon_urls[$icon_n]) && !empty($custom_icon_urls[$icon_n])) ? $custom_icon_urls[$icon_n]:'javascript:void(0);'; 
				$toolClass = "custom_lkn";
				$arrow_class = "";
				$custom_icons_hoverTxt = unserialize($sfsi_section5_options['sfsi_custom_MouseOverTexts']);
				$icons = unserialize($sfsi_section1_options['sfsi_custom_files']);
				$icon = $icons[$icon_n]; 
				
				//Giving alternative text to image
				if(!empty($custom_icons_hoverTxt[$icon_n]))
				{	
				 	$alt_text = $custom_icons_hoverTxt[$icon_n];
				}
				else
				{
					 $alt_text = "SOCIALICON";
				}
            break;    
    }
    $icons="";
    
	/* apply size of icon */
    if($is_front==0)
    {
    	$icons_size = $sfsi_section5_options['sfsi_icons_size'];
		$itemselector = "sfsi_wicons shuffeldiv";
		$innrselector = "inerCnt";
    }
    else
    {
	  	$icons_size = 51;
		$itemselector = "sfsi_wicons";
		$innrselector = "inerCnt";
    }
	
    /* spacing and no of icons per row */
    $icons_space = '';
    $icons_space = $sfsi_section5_options['sfsi_icons_spacing'];
    $icon_width = (int)$icons_size;
    /* check for mouse hover effect */
    $icon_opacity="1";
    
	if($sfsi_section3_options['sfsi_mouseOver']=='yes')
    {
		 $mouse_hover_effect=$sfsi_section3_options["sfsi_mouseOver_effect"];
		 if($mouse_hover_effect=="fade_in" || $mouse_hover_effect=="combo")
		 {    
			$icon_opacity="0.6";
		 }
    }
    
	$toolT_cls='';
    if((int) $icon_width <=49 && (int) $icon_width >=30)
	{
		$bt_class="";
	  	$toolT_cls="sfsiTlleft";
    }
	else if((int) $icon_width <=20)
    {
 	  $bt_class="sfsiSmBtn";
	  $toolT_cls="sfsiTlleft";
    }
	else
    {
      $bt_class="";
	  $toolT_cls="sfsiTlleft";
    }
	
	if($toolClass=="rss_tool_bdr" || $toolClass=='email_tool_bdr' || $toolClass=="custom_lkn" ||   $toolClass=="instagram_tool_bdr" )
    {
    	$new_window = sfsi_checkNewWindow();
     	$url = $url;
    }
    else if($hoverSHow)
    {
		if(!wp_is_mobile())
		{
			$new_window = sfsi_checkNewWindow();
			$url = $url;
		}
		else
		{
			$new_window = '';
			$url = "javascript:void(0)";
		}
	}
	 else
    {
	 	$new_window = sfsi_checkNewWindow();
	 	$url = $url;
    }
	    
	$margin_bot="5px;";
    if($sfsi_section4_options['sfsi_display_counts']=="yes")
	{
		$margin_bot = "30px;";
    }
    
	
    if(isset($icon) && !empty($icon) && filter_var($icon, FILTER_VALIDATE_URL))
	{
		$icons.= "<div style='width:".$icon_width."px; height:".$icon_width."px;margin-left:".$icons_space."px;margin-bottom:".$margin_bot."' class='".$itemselector." ".$cmcls."'>";
			
			$icons.= "<div class='".$innrselector."'>";
				
				$icons.= "<a class='".$class." sficn' effect='".$mouse_hover_effect."' $new_window  href='".$url."' id='sfsiid_".$icon_name."' alt='".$alt_text."' style='opacity:".$icon_opacity."' >";     
					$icons.= "<img alt='".$alt_text."' title='".$alt_text."' src='".$icon."' width='".$icons_size."' height='".$icons_size."' style='".$border_radius.$padding_top."' class='sfcm sfsi_wicon' effect='".$mouse_hover_effect."'   />"; 
				$icons.= '</a>';
	   
	   if(isset($counts) &&  $counts!='')
	   {
			$icons.= '<span class="bot_no '.$bt_class.'">'.$counts.'</span>';  
	   }
		 
	   if($hoverSHow && !empty($hoverdiv))
	   {	
			$icons.= '<div class="sfsi_tool_tip_2 '.$toolClass.' '.$toolT_cls.'" style="width:'.$width.'px ;opacity:0;z-index:-1;margin-left:-'.$twt_margin.'px;" id="sfsiid_'.$icon_name.'">';
			$icons.= '<span class="bot_arow '.$arrow_class.'"></span>';
			$icons.= '<div class="sfsi_inside">'.$hoverdiv."</div>";
			$icons.= "</div>";
	   }
	   $icons.="</div>";
	   $icons.="</div>";
	}
   return  $icons;       
}

/* make url for new window */
function sfsi_checkNewWindow()
{	
	global $wpdb;
	$sfsi_section5_options=  unserialize(get_option('sfsi_section5_options',false));
	if($sfsi_section5_options['sfsi_icons_ClickPageOpen']=="yes")
	{
	   return  $new_window="target='_blank'";
	}
	else
	{
	    return ''; 
	}
}
?>