<?php
/* add fb like add this and google share to end of every post */

function sfsi_social_buttons_below($content)
{
  	global $post;
  	$sfsi_section6=  unserialize(get_option('sfsi_section6_options',false));
  	//checking for standard icons
	if(!isset($sfsi_section6['sfsi_rectsub']))
	{
		$sfsi_section6['sfsi_rectsub'] = 'no';
	}
	if(!isset($sfsi_section6['sfsi_rectfb']))
	{
		$sfsi_section6['sfsi_rectfb'] = 'yes';
	}
	if(!isset($sfsi_section6['sfsi_rectgp']))
	{
		$sfsi_section6['sfsi_rectgp'] = 'yes';
	}
	if(!isset($sfsi_section6['sfsi_rectshr']))
	{
		$sfsi_section6['sfsi_rectshr'] = 'yes';
	}
	if(!isset($sfsi_section6['sfsi_recttwtr']))
	{
		$sfsi_section6['sfsi_recttwtr'] = 'no';
	}
	if(!isset($sfsi_section6['sfsi_rectpinit']))
	{
		$sfsi_section6['sfsi_rectpinit'] = 'no';
	}
	if(!isset($sfsi_section6['sfsi_rectfbshare']))
	{
		$sfsi_section6['sfsi_rectfbshare'] = 'no';
	}
	//checking for standard icons
        
  /* check if option activated in admin or not */ 
  if($sfsi_section6['sfsi_show_Onposts']=="yes")
  {
		$permalink = get_permalink($post->ID);
        $title = get_the_title();
		$sfsiLikeWith="45px;";
        /* check for counter display */
        if($sfsi_section6['sfsi_icons_DisplayCounts']=="yes")
        {
            $show_count=1;
	    	$sfsiLikeWith="125px;";
	    }   
        else
        {
            $show_count=0;
        } 
        $txt	= (isset($sfsi_section6['sfsi_textBefor_icons']))? $sfsi_section6['sfsi_textBefor_icons'] : "Please follow and like us:" ;
        $float	= $sfsi_section6['sfsi_icons_alignment'];
		if($sfsi_section6['sfsi_rectsub'] == 'yes' || $sfsi_section6['sfsi_rectfb'] == 'yes' || $sfsi_section6['sfsi_rectgp'] == 'yes' || $sfsi_section6['sfsi_rectshr'] == 'yes' || $sfsi_section6['sfsi_recttwtr'] == 'yes' || $sfsi_section6['sfsi_rectpinit'] == 'yes' || $sfsi_section6['sfsi_rectfbshare'] == 'yes')
		{
        	$icons="<div class='sfsi_Sicons' style='width: 100%; display: inline-block; vertical-align: middle; text-align:".$float."'><div style='margin:0px 8px 0px 0px; line-height: 24px'><span>".$txt."</span></div>";
		}
		//adding wrapper div
		$icons.="<div class='sfsi_socialwpr'>";
			if($sfsi_section6['sfsi_rectsub'] == 'yes')
			{
				if($show_count){$sfsiLikeWithsub = "93px";}else{$sfsiLikeWithsub = "64px";}
				if(!isset($sfsiLikeWithsub)){$sfsiLikeWithsub = $sfsiLikeWith;}
				$icons.="<div class='sf_subscrbe' style='text-align:left;float:left;width:".$sfsiLikeWithsub."'>".sfsi_Subscribelike($permalink,$show_count)."</div>";
			}
			if($sfsi_section6['sfsi_rectfb'] == 'yes' || $sfsi_section6['sfsi_rectfbshare'] == 'yes')
			{
				if($sfsi_section6['sfsi_rectfb'] == 'yes')
				{
					if($show_count){$sfsiLikeWithfb = "80px";}else{$sfsiLikeWithfb = "52px";}
				}
				if($sfsi_section6['sfsi_rectfbshare'] == 'yes')
				{
					if($show_count){$sfsiLikeWithfb = "88px";}else{$sfsiLikeWithfb = "60px";}
				}
				if($sfsi_section6['sfsi_rectfb'] == 'yes' && $sfsi_section6['sfsi_rectfbshare'] == 'yes')
				{
					if($show_count){$sfsiLikeWithfb = "125px";}else{$sfsiLikeWithfb = "98px";}
				}
				$icons.="<div class='sf_fb' style='text-align:left;width:".$sfsiLikeWithfb."'>".sfsi_FBlike($permalink,$show_count)."</div>";
			}
			if($sfsi_section6['sfsi_recttwtr'] == 'yes')
			{
				if($show_count){$sfsiLikeWithtwtr = "62px";}else{$sfsiLikeWithtwtr = "62px";}
				if(!isset($sfsiLikeWithtwtr)){$sfsiLikeWithtwtr = $sfsiLikeWith;}
				$icons.="<div class='sf_twiter' style='text-align:left;float:left;width:auto'>".sfsi_twitterlike($permalink,$show_count)."</div>";
			}
			
			if($sfsi_section6['sfsi_rectpinit'] == 'yes')
			{
				$sfsi_pinwidth = "47px";
				if($show_count){$sfsi_pinwidth = "100px";}else{$sfsi_pinwidth = "47px";}
				$icons.="<div class='sf_pinit' style='text-align:left;float:left;line-height: 20px;width:".$sfsi_pinwidth."'>".sfsi_pinterest($permalink,$show_count)."</div>";
			}
			
			if($sfsi_section6['sfsi_rectgp'] == 'yes')
			{
				$icons.="<div class='sf_google' style='text-align:left;float:left;max-width:62px;min-width:35px;'>".sfsi_googlePlus($permalink,$show_count)."</div>";
			}
			if($sfsi_section6['sfsi_rectshr'] == 'yes')
			{
				$icons.="<div class='sf_addthis'>".sfsi_Addthis($show_count, $permalink, $title)."</div>";
			}
		$icons.="</div>";
		//closing wrapper div
	$icons.="</div>";
    if(!is_feed() && !is_home() && !is_page()) {
		$content =   $content .$icons;
	}
  }   
	return $content;
}

/*subscribe like*/
function sfsi_Subscribelike($permalink, $show_count)
{
	global $socialObj;
	$socialObj = new sfsi_SocialHelper();
	
	$sfsi_section2_options=  unserialize(get_option('sfsi_section2_options',false));
	$sfsi_section4_options = unserialize(get_option('sfsi_section4_options',false));
	$sfsi_section6_options=  unserialize(get_option('sfsi_section6_options',false));
	$url = (isset($sfsi_section2_options['sfsi_email_url'])) ? $sfsi_section2_options['sfsi_email_url'] : 'javascript:void(0);';
	
	if($sfsi_section4_options['sfsi_email_countsFrom']=="source" )
	{
		$feed_id = sanitize_text_field(get_option('sfsi_feed_id',false));
		$feed_data = $socialObj->SFSI_getFeedSubscriber($feed_id);
		$counts= $socialObj->format_num($feed_data);
        if(empty($scounts['email_count']))
        {
          $counts=(string) "0";
        }
   }
   else
   {
		$counts=$sfsi_section4_options['sfsi_email_manualCounts'];
   } 
	 
   if($sfsi_section6_options['sfsi_icons_DisplayCounts']=="yes")
   {
	 	$icon = '<a href="'.$url.'" target="_blank"><img src="'.SFSI_PLUGURL.'images/follow_subscribe.png" /></a><span class="bot_no">'.$counts.'</span>';
   }
   else
   {
	   $icon = '<a href="'.$url.'" target="_blank"><img src="'.SFSI_PLUGURL.'images/follow_subscribe.png" /></a>';
   }
   return $icon;
}
/*subscribe like*/
/*twitter like*/
function sfsi_twitterlike($permalink, $show_count)
{
	global $socialObj;
	$socialObj = new sfsi_SocialHelper();
	$twitter_text = '';
	if(!empty($permalink))
	{
		$postid = url_to_postid( $permalink );
	}
	if(!empty($postid))
	{
		$twitter_text = get_the_title($postid);
	}
	return $socialObj->sfsi_twitterSharewithcount($permalink,$twitter_text, $show_count);
}
/*twitter like*/
/* create google+ button */
function sfsi_googlePlus($permalink,$show_count)
{
	$google_html = '<div class="g-plusone" data-href="' . $permalink . '" ';
	if($show_count) {
			$google_html .= 'data-size="large" ';
	} else {
			$google_html .= 'data-size="large" data-annotation="none" ';
	}
	$google_html .= '></div>';
	return $google_html;
}

/* create pinit button */
function sfsi_pinterest($permalink,$show_count)
{
	$pinit_html = '<a href="https://www.pinterest.com/pin/create/button/?url=&media=&description=" data-pin-do="buttonPin" data-pin-save="true"';
	if($show_count)
	{
		$pinit_html .= 'data-pin-count="beside"';
	}
	else
	{
		$pinit_html .= 'data-pin-count="none"';
	}
	$pinit_html .= '></a>';
	
	return $pinit_html;
}

/* create fb like button */
function sfsi_FBlike($permalink,$show_count)
{
	$send = 'false';
	$width = 180;
	$fb_like_html = '';
	/*$fb_like_html = '<fb:like href="'.$permalink.'" width="'.$width.'" send="'.$send.'" showfaces="false" ';
	if($show_count==1) { 
			$fb_like_html .= 'layout="button_count"';
	} else {
			$fb_like_html .= 'layout="button"';
	}
	$fb_like_html .= ' action="like"></fb:like>';*/
	/*
	$fb_like_html .= '<div class="fb-like" data-href="'.$permalink.'" width="'.$width.'" send="'.$send.'" ';
	$fb_like_html .= ($show_count==1) ?  ' data-layout="button_count"' : ' data-layout="button"';
	$fb_like_html .= ' data-action="like" data-show-faces="false" data-share="true"></div>';*/
	$option6 =  unserialize(get_option('sfsi_section6_options',false));
	if($option6['sfsi_rectfbshare'] == 'yes' && $option6['sfsi_rectfb'] == 'yes')
	{
		$fb_like_html .='<div class="fb-like" href="'.$permalink.'" width="'.$width.'" send="'.$send.'" showfaces="false"  action="like" data-share="true"';
	}
	else if($option6['sfsi_rectfb'] == 'no' && $option6['sfsi_rectfbshare'] == 'yes')
	{
		$fb_like_html .= '<div class="fb-share-button" href="'.$permalink.'" width="'.$width.'" send="'.$send.'" ';
	}
	else
	{
		$fb_like_html .= '<div class="fb-like" href="'.$permalink.'" width="'.$width.'" send="'.$send.'" showfaces="false"  action="like" data-share="false" ';
	}
	if($show_count==1)
	{ 
		$fb_like_html .= 'data-layout="button_count"';
	}
	else
	{
		$fb_like_html .= 'data-layout="button"';
	}
	$fb_like_html .= ' ></div>';
	return $fb_like_html;
}
/* create add this  button */
function sfsi_Addthis($show_count, $permalink, $post_title)
{
   
   $atiocn =' <script type="text/javascript">
			var addthis_config = {
				 url: "'.$permalink.'",
				 title: "'.$post_title.'"
			}
			</script>';

   if($show_count==1)
   {
       $atiocn.=' <div class="addthis_toolbox" addthis:url="'.$permalink.'" addthis:title="'.$post_title.'">
              <a class="addthis_counter addthis_pill_style share_showhide"></a>
	   </div>';
	    return $atiocn;
   }
   else
   {
	$atiocn.='<div class="addthis_toolbox addthis_default_style addthis_20x20_style" addthis:url="'.$permalink.'" addthis:title="'.$post_title.'"><a class="addthis_button_compact " href="#">  <img src="'.SFSI_PLUGURL.'images/sharebtn.png"  border="0" alt="Share" /></a></div>';
      return $atiocn; 
    }
}
	
/* add all external javascript to wp_footer */        
function sfsi_footer_script()
{
	$sfsi_section1=  unserialize(get_option('sfsi_section1_options',false));
	$sfsi_section6=  unserialize(get_option('sfsi_section6_options',false));
	if(!isset($sfsi_section6['sfsi_rectsub']))
	{
		$sfsi_section6['sfsi_rectsub'] = 'no';
	}
	if(!isset($sfsi_section6['sfsi_rectfb']))
	{
		$sfsi_section6['sfsi_rectfb'] = 'yes';
	}
	if(!isset($sfsi_section6['sfsi_rectgp']))
	{
		$sfsi_section6['sfsi_rectgp'] = 'yes';
	}
	if(!isset($sfsi_section6['sfsi_rectshr']))
	{
		$sfsi_section6['sfsi_rectshr'] = 'yes';
	}
	if(!isset($sfsi_section6['sfsi_recttwtr']))
	{
		$sfsi_section6['sfsi_recttwtr'] = 'no';
	}
	if(!isset($sfsi_section6['sfsi_rectpinit']))
	{
		$sfsi_section6['sfsi_rectpinit'] = 'no';
	}
	if(!isset($sfsi_section6['sfsi_rectfbshare']))
	{
		$sfsi_section6['sfsi_rectfbshare'] = 'no';
	}
	
	if($sfsi_section1['sfsi_facebook_display']=="yes" || ($sfsi_section6['sfsi_rectfb'] == "yes" && $sfsi_section6['sfsi_show_Onposts'] == "yes") || ($sfsi_section6['sfsi_rectfbshare'] == "yes" && $sfsi_section6['sfsi_show_Onposts'] == "yes"))
	{
		?>
        <!--facebook like and share js -->
        <div id="fb-root"></div>
		<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
		  	if (d.getElementById(id)) return;
		  	js = d.createElement(s); js.id = id;
		  	js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
		  	fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<!--<div id="fb-root"></div>
        <script>
        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1425108201100352&version=v2.0";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>-->
 	<?php
	}
	if(
		$sfsi_section1['sfsi_google_display']=="yes" ||
		$sfsi_section1['sfsi_youtube_display']=="yes" ||
		($sfsi_section6['sfsi_rectgp'] == "yes" && $sfsi_section6['sfsi_show_Onposts'] == "yes")
	)
	{ ?>
         <!--google share and  like and e js -->
        <script type="text/javascript">
            window.___gcfg = {
              lang: 'en-US'
            };
            (function() {
                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                po.src = 'https://apis.google.com/js/plusone.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
            })();
        </script>
		
		<!-- google share -->
        <script type="text/javascript">
          (function() {
            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
            po.src = 'https://apis.google.com/js/platform.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
          })();
        </script>
	<?php
	}
	if($sfsi_section1['sfsi_linkedin_display']=="yes")
	{ ?>	
       <!-- linkedIn share and  follow js -->
        <script src="//platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>
	<?php
	}
	if($sfsi_section1['sfsi_share_display']=="yes" || $sfsi_section6['sfsi_show_Onposts']=="yes" || $sfsi_section6['sfsi_rectshr'] == "yes")
	{ ?>
	 	<!-- Addthis js -->
        <script type="text/javascript" src="https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-558ac14e7f79bff7"></script>
        <script type="text/javascript">
       		var addthis_config = {  ui_click: true  };
       	</script>
	<?php
	}
	if($sfsi_section1['sfsi_pinterest_display']=="yes" || ($sfsi_section6['sfsi_rectpinit'] == "yes" && $sfsi_section6['sfsi_show_Onposts'] == "yes"))
	{?>
		<!--pinit js -->
		<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
	<?php
	}
	if($sfsi_section1['sfsi_twitter_display']=="yes" || $sfsi_section6['sfsi_recttwtr'] == "yes")
	{?>
		<!-- twitter JS End -->
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>	
	<?php
	}
	
	/* activate footer credit link */
	if(get_option('sfsi_footer_sec')=="yes")
	{
		if(!is_admin())
		{
			$footer_link='<div class="sfsi_footerLnk" style="margin: 0 auto;z-index:1000; absolute; text-align: center;"><a href="https://www.ultimatelysocial.com/?utm_source=usmi_settings_page&utm_campaign=credit_link_to_homepage&utm_medium=banner" target="_new">Social media & sharing icons</a> powered by UltimatelySocial';
			$footer_link.="</div>";
			echo $footer_link;
		}
	}    
        
}
/* filter the content of post */
add_filter('the_content', 'sfsi_social_buttons_below');

/* update footer for frontend and admin both */ 
if(!is_admin())
{  
   global $post;
   add_action( 'wp_footer', 'sfsi_footer_script' );	
   add_action('wp_footer','sfsi_check_PopUp');
   add_action('wp_footer','sfsi_frontFloter');	 	     
}
			 				    
if(is_admin())
{
	add_action('in_admin_footer', 'sfsi_footer_script');	
}
/* ping to vendor site on updation of new post */ 
?>
