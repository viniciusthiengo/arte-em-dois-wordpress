<?php
/* unserialize all saved option for second section options */
$option4 =  unserialize(get_option('sfsi_section4_options',false));
$option2 =  unserialize(get_option('sfsi_section2_options',false));

/*
 * Sanitize, escape and validate values
 */
$option2['sfsi_rss_url'] 				= 	(isset($option2['sfsi_rss_url']))
												? esc_url($option2['sfsi_rss_url'])
												: '';
$option2['sfsi_rss_icons'] 				= 	(isset($option2['sfsi_rss_icons']))
												? sanitize_text_field($option2['sfsi_rss_icons'])
												: '';
$option2['sfsi_email_url'] 				= 	(isset($option2['sfsi_email_url']))
												? esc_url($option2['sfsi_email_url'])
												: '';

$option2['sfsi_facebookPage_option']	= 	(isset($option2['sfsi_facebookPage_option']))
												? sanitize_text_field($option2['sfsi_facebookPage_option'])
												:'';
$option2['sfsi_facebookPage_url'] 		= 	(isset($option2['sfsi_facebookPage_url']))
												? esc_url($option2['sfsi_facebookPage_url'])
												: '';
$option2['sfsi_facebookLike_option']	= 	(isset($option2['sfsi_facebookLike_option']))
												? sanitize_text_field($option2['sfsi_facebookLike_option'])
												:'';
$option2['sfsi_facebookShare_option'] 	= 	(isset($option2['sfsi_facebookShare_option']))
												? sanitize_text_field($option2['sfsi_facebookShare_option'])
												:'';

$option2['sfsi_twitter_followme'] 		= 	(isset($option2['sfsi_twitter_followme']))
												? sanitize_text_field($option2['sfsi_twitter_followme'])
												: '';
$option2['sfsi_twitter_followUserName'] = 	(isset($option2['sfsi_twitter_followUserName']))
												? sanitize_text_field($option2['sfsi_twitter_followUserName'])
												: '';
$option2['sfsi_twitter_aboutPage'] 		= 	(isset($option2['sfsi_twitter_aboutPage']))
												? sanitize_text_field($option2['sfsi_twitter_aboutPage'])
												: '';
$option2['sfsi_twitter_page'] 			= 	(isset($option2['sfsi_twitter_page']))
												? sanitize_text_field($option2['sfsi_twitter_page'])
												: '';
$option2['sfsi_twitter_pageURL'] 		= 	(isset($option2['sfsi_twitter_pageURL']))
												? esc_url($option2['sfsi_twitter_pageURL'])
												: '';
$option2['sfsi_twitter_aboutPageText'] 	= 	(isset($option2['sfsi_twitter_aboutPageText']))
												? sanitize_text_field($option2['sfsi_twitter_aboutPageText'])
												: '';

$option2['sfsi_google_page'] 			= 	(isset($option2['sfsi_google_page']))
												? sanitize_text_field($option2['sfsi_google_page'])
												: '';
$option2['sfsi_google_pageURL'] 		= 	(isset($option2['sfsi_google_pageURL']))
												? esc_url($option2['sfsi_google_pageURL'])
												: '';
$option2['sfsi_googleLike_option'] 		= 	(isset($option2['sfsi_googleLike_option']))
												? sanitize_text_field($option2['sfsi_googleLike_option'])
												: '';
$option2['sfsi_googleShare_option'] 	= 	(isset($option2['sfsi_googleShare_option']))
												? sanitize_text_field($option2['sfsi_googleShare_option'])
												: '';

$option2['sfsi_youtube_pageUrl'] 		= 	(isset($option2['sfsi_youtube_pageUrl']))
												? esc_url($option2['sfsi_youtube_pageUrl'])
												: '';
$option2['sfsi_youtube_page'] 			= 	(isset($option2['sfsi_youtube_page']))
												? sanitize_text_field($option2['sfsi_youtube_page'])
												: '';
$option2['sfsi_youtube_follow'] 		= 	(isset($option2['sfsi_youtube_follow']))
												? sanitize_text_field($option2['sfsi_youtube_follow'])
												: '';
$option2['sfsi_ytube_user'] 			= 	(isset($option2['sfsi_ytube_user']))
												? sanitize_text_field($option2['sfsi_ytube_user'])
												: '';

$option2['sfsi_pinterest_page'] 		= 	(isset($option2['sfsi_pinterest_page']))
												? sanitize_text_field($option2['sfsi_pinterest_page'])
												: '';
$option2['sfsi_pinterest_pageUrl']		= 	(isset($option2['sfsi_pinterest_pageUrl']))
												? esc_url($option2['sfsi_pinterest_pageUrl'])
												: '';
$option2['sfsi_pinterest_pingBlog'] 	= 	(isset($option2['sfsi_pinterest_pingBlog']))
												? sanitize_text_field($option2['sfsi_pinterest_pingBlog'])
												: '';
$option2['sfsi_instagram_pageUrl']		= 	(isset($option2['sfsi_instagram_pageUrl']))
												? esc_url($option2['sfsi_instagram_pageUrl'])
												: '';

$option2['sfsi_linkedin_page'] 			= 	(isset($option2['sfsi_linkedin_page']))
												? sanitize_text_field($option2['sfsi_linkedin_page'])
												: '';
$option2['sfsi_linkedin_pageURL'] 		= 	(isset($option2['sfsi_linkedin_pageURL']))
												? esc_url($option2['sfsi_linkedin_pageURL'])
												: '';
$option2['sfsi_linkedin_follow'] 		= 	(isset($option2['sfsi_linkedin_follow']))
												? sanitize_text_field($option2['sfsi_linkedin_follow'])
												: '';
$option2['sfsi_linkedin_followCompany']	= 	(isset($option2['sfsi_linkedin_followCompany']))
												? intval($option2['sfsi_linkedin_followCompany'])
												: '';
$option2['sfsi_linkedin_SharePage'] 	= 	(isset($option2['sfsi_linkedin_SharePage']))
												? sanitize_text_field($option2['sfsi_linkedin_SharePage'])
												: '';
												
$option2['sfsi_linkedin_recommendBusines'] = 	(isset($option2['sfsi_linkedin_recommendBusines']))
												? sanitize_text_field($option2['sfsi_linkedin_recommendBusines'])
												: '';
$option2['sfsi_linkedin_recommendCompany'] = 	(isset($option2['sfsi_linkedin_recommendCompany']))
												? sanitize_text_field($option2['sfsi_linkedin_recommendCompany'])
												: '';
$option2['sfsi_linkedin_recommendProductId'] = 	(isset($option2['sfsi_linkedin_recommendProductId']))
												? intval($option2['sfsi_linkedin_recommendProductId'])
												: '';

$option4['sfsi_youtubeusernameorid'] 	= 	(isset($option2['sfsi_youtubeusernameorid']))
												? sanitize_text_field($option4['sfsi_youtubeusernameorid'])
												:'';
$option4['sfsi_ytube_chnlid'] 			= 	(isset($option2['sfsi_ytube_chnlid']))
												? strip_tags(trim($option4['sfsi_ytube_chnlid']))
												: '';

?>

<!-- Section 2 "What do you want the icons to do?" main div Start -->
<div class="tab2">
      <!-- RSS ICON -->
    <div class="row bdr_top rss_section">
    <h2 class="sfsicls_rs_s">RSS</h2>
        <div class="inr_cont">
            <p>When clicked on, users can subscribe via RSS</p>
            <div class="rss_url_row">
                <h4>RSS URL</h4>
                <input name="sfsi_rss_url" id="sfsi_rss_url" class="add" type="url" value="<?php echo ($option2['sfsi_rss_url']!='') ?  $option2['sfsi_rss_url'] : '' ;?>" placeholder="E.g http://www.yoursite.com/feed"/>
                <span class="sfrsTxt" >For most blogs it’s <strong>http://blogname.com/feed</strong></span>
            </div>
        </div>    
    </div>
    <!-- END RSS ICON -->
    
    <!-- EMAIL ICON -->
    <?php
		$feedId 		= sanitize_text_field(get_option('sfsi_feed_id',false));
		$connectToFeed 	= "http://www.specificfeeds.com/?".base64_encode("userprofile=wordpress&feed_id=".$feedId);
	?>
    <div class="row email_section">
        <h2 class="sfsicls_email">Email</h2>
        <?php sfsi_curl_error_notification(); ?>
        
        <div class="inr_cont">
        <p>
         	Allows your visitors to subscribe to your site (on  <a href="http://www.specificfeeds.com/widgets/emailSubscribeEncFeed/<?php echo $feedId; ?>/<?php echo base64_encode(8); ?>" target="_new">this screen</a>) and receive new posts automatically by email.
        </p>
        <p>Please pick which icon type you want to use:</p>
           <ul class="tab_2_email_sec">
            <li>
            	<div class="sfsiicnsdvwrp">
                	<input name="sfsi_rss_icons" <?php echo ($option2['sfsi_rss_icons']=='email') ?  'checked="true"' : '' ;?> type="radio" value="email" class="styled" /><span class="email_icn"></span>
                </div>
                <label>Email icon</label>
            </li>
            <li>
            	<div class="sfsiicnsdvwrp">
                	<input name="sfsi_rss_icons" <?php echo ($option2['sfsi_rss_icons']=='subscribe') ?  'checked="true"' : '' ;?> type="radio" value="subscribe" class="styled" /><span class="subscribe_icn"></span>
                </div>
                <label>Follow icon<span class="sficndesc"> (increases sign-ups)</span></label>
            </li>
            <li>
            	<div class="sfsiicnsdvwrp">
            		<input name="sfsi_rss_icons" <?php echo ($option2['sfsi_rss_icons']=='sfsi') ?  'checked="true"' : '' ;?> type="radio" value="sfsi" class="styled"  /><span class="sf_arow"></span>
                </div>
                <label>SpecificFeeds icon<span class="sfplsdesc"> (provider of the service)</span></label>
            </li>
          </ul>
           <p>The service offers many (more) advantages: </p>
            <div class='sfsi_service_row'>
                <div class='sfsi_service_column'>
                    <ul>
                        <li><span>More people come back</span> to your site</li>
                        <li>See your<span> subscribers’ emails</span> & <span>interesting statistics</span></li>
                        <li>Automatically post on<span> Facebook & Twitter</span></li>
                    </ul>
                </div>
                <div class='sfsi_service_column'>
                    <ul>
                        <li><span>Get more traffic</span> by being listed in the SF directory</li>
                        <li><span>Get alerts</span> when people subscribe or unsubscribe</li>
                        <li><span>Tailor the sender name & subject line</span> of the emails </li>
                    </ul> 
                </div>
            </div>

            <form id="calimingOptimizationForm" method="get" action="https://www.specificfeeds.com/wpclaimfeeds/getFullAccess" target="_blank">
                <div class="sfsi_inputbtn">
                    <input type="hidden" name="feed_id" value="<?php echo sanitize_text_field(get_option('sfsi_feed_id',false)); ?>" />
                    <input type="email" name="email" value="<?php echo bloginfo('admin_email'); ?>"  />
                </div>
                <div class='sfsi_more_services_link'>
                    <a href="javascript:;" id="sfsi_getMeFullAccess" title="Give me access">
                        Click here to benefit from all advantages >
                    </a> 
                </div>
            </form>

            <p class='sfsi_email_last_paragraph'>
                This will create your FREE account on SpecificFeeds, using above email. <br>
                All data will be treated highly confidentially, see the
                <a href="https://www.specificfeeds.com/page/privacy-policy" target="_new">
                   Privacy Policy.
                </a>
            </p>


            <div class ="sfsi_new_prmium_follw">
                <p><b>New:</b> In our Premium Plugin you can now give your email icon other functions too, e.g. <b>contact you </b>(email), <b>share by email,</b> and <b>link to a certain page </b>(e.g. your contact form or newsletter sign-up site). <a href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmi_settings_page&utm_campaign=more_functions_email_icon&utm_medium=banner" target="_blank">See all features</a></p>
            </div>
        </div>
    </div>
    <!-- END EMAIL ICON -->
    
     <!-- FACEBOOK ICON -->
    <div class="row facebook_section">
    	<h2 class="sfsicls_facebook">Facebook</h2>
        <div class="inr_cont">
            <p>The facebook icon can perform several actions. Pick below which ones it should perform. If you select several options, then users can select what they want to do <a class="rit_link pop-up" href="javascript:;"  data-id="fbex-s2">(see an example)</a>.</p>
            <p>The facebook icon should allow users to...</p> 
            
            <p class="radio_section fb_url"><input name="sfsi_facebookPage_option" <?php echo ($option2['sfsi_facebookPage_option']=='yes') ?  'checked="true"' : '' ;?>  type="checkbox" value="yes" class="styled"  /><label>Visit my Facebook page at:</label><input class="add" name="sfsi_facebookPage_url" type="url" value="<?php echo ($option2['sfsi_facebookPage_url']!='') ?  $option2['sfsi_facebookPage_url'] : '' ;?>" placeholder="E.g https://www.facebook.com/your_page_name" /></p>
            
            <p class="radio_section fb_url extra_sp"><input name="sfsi_facebookLike_option" <?php echo ($option2['sfsi_facebookLike_option']=='yes') ?  'checked="true"' : '' ;?>  type="checkbox" value="yes" class="styled"  /><label>Like my blog on Facebook (+1)</label></p>
            
            <p class="radio_section fb_url extra_sp"><input name="sfsi_facebookShare_option" <?php echo ($option2['sfsi_facebookShare_option']=='yes') ?  'checked="true"' : '' ;?>  type="checkbox" value="yes" class="styled"  /><label>Share my blog with friends (on Facebook)</label></p>
            <div class="sfsi_new_prmium_follw">
                <p ><b>New:</b> In our Premium Plugin you can also allow users to follow you on Facebook <b>directly from your site</b> (without leaving your page, increasing followers). <a href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmi_settings_page&utm_campaign=direct_follow_facebook&utm_medium=banner" target="_blank">See all features</a></p>
            </div> 
        </div>
    </div>
    <!-- END FACEBOOK ICON -->
    
   	<!-- TWITTER ICON -->
    <div class="row twitter_section">
    	<h2 class="sfsicls_twt">Twitter</h2>
        <div class="inr_cont twt_tab_2">
        	<p>The Twitter icon can perform several actions. Pick below which ones it should perform. If you select several options, then users can select what they want to do <a class="rit_link pop-up" href="javascript:;"  data-id="twex-s2">(see an example)</a>.</p> 
         	<p>The Twitter icon should allow users to...</p> 
         
        	<p class="radio_section fb_url"><input name="sfsi_twitter_page" <?php echo ($option2['sfsi_twitter_page']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  /><label>Visit me on Twitter:</label><input name="sfsi_twitter_pageURL" type="url" placeholder="http://" value="<?php echo ($option2['sfsi_twitter_pageURL']!='') ?  $option2['sfsi_twitter_pageURL'] : '' ;?>" class="add" /></p>
         
         	<div class="radio_section fb_url twt_fld"><input name="sfsi_twitter_followme"  <?php echo ($option2['sfsi_twitter_followme']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  /><label>Follow me on Twitter:</label><input name="sfsi_twitter_followUserName" type="text" value="<?php echo ($option2['sfsi_twitter_followUserName']!='') ?  $option2['sfsi_twitter_followUserName'] : '' ;?>" placeholder="my_twitter_name" class="add" /></div>
         	
            <div class="radio_section fb_url twt_fld_2"><input name="sfsi_twitter_aboutPage" <?php echo ($option2['sfsi_twitter_aboutPage']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  /><label>Tweet about my page:</label><textarea name="sfsi_twitter_aboutPageText" id="sfsi_twitter_aboutPageText" type="text" class="add_txt" placeholder="Hey, check out this cool site I found: www.yourname.com #Topic via@my_twitter_name" /><?php echo ($option2['sfsi_twitter_aboutPageText']!='') ?  stripslashes($option2['sfsi_twitter_aboutPageText']) : 'Hey check out this cool site I found' ;?></textarea></div>
            <div class= "sfsi_new_prmium_follw">
				<p><b>New: </b>Tweeting becomes really fun in the Premium Plugin – you can insert tags to automatically pull the title of the story & link to the story, attach pictures & snippets to the Tweets (‘Twitter cards’) and user Url-shorteners, all leading to more Tweets and traffic for your site!. <a href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmi_settings_page&utm_campaign=better_tweets&utm_medium=banner" target="_blank">See all features</a></p>
			</div>
        </div>
    </div>
    <!-- END TWITTER ICON -->
    
    <!-- GOOGLE ICON -->
    <div class="row google_section">
    	<h2 class="sfsicls_ggle_pls">Google+</h2>
        <div class="inr_cont google_in">
        	<p>The Google+ icon can perform several actions. Pick below which ones it should perform. If you select several options, then users can select what they want to do <a class="rit_link pop-up" href="javascript:;"  data-id="googlex-s2">(see an example)</a>.</p> 
        	
            <p>The Google+ icon should allow users to...</p> 
        	
            <p class="radio_section fb_url"><input name="sfsi_google_page" <?php echo ($option2['sfsi_google_page']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  /><label>Visit my Google+ page at:</label><input name="sfsi_google_pageURL" type="url" placeholder="http://" value="<?php echo ($option2['sfsi_google_pageURL']!='') ?  $option2['sfsi_google_pageURL'] : '' ;?>" class="add" /></p>
        	
            <p class="radio_section fb_url"><input name="sfsi_googleLike_option" <?php echo ($option2['sfsi_googleLike_option']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  /><label>Like my blog on Google+ (+1)</label></p> 
        	
            <p class="radio_section fb_url"><input name="sfsi_googleShare_option" <?php echo ($option2['sfsi_googleShare_option']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  /><label>Share my blog with friends (on Google+)</label></p>
            <div class ="sfsi_new_prmium_follw" >
                <p><b>New: </b>In our Premium Plugin you can also allow users to follow you on Google+ <b>directly from your site </b>(without leaving your page, increasing followers). <a href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmi_settings_page&utm_campaign=direct_follow_google&utm_medium=banner" target="_blank">See all features</a></p>
            </div>
        </div>
    </div>
    <!-- END GOOGLE ICON -->
    
    <!-- YOUTUBE ICON -->
    <div class="row youtube_section">
    	<h2 class="sfsicls_utube">Youtube</h2>
        <div class="inr_cont utube_inn">
        	<p>The Youtube icon can perform several actions. Pick below which ones it should perform. If you select several options, then users can select what they want to do  <a class="rit_link pop-up" href="javascript:;"  data-id="ytex-s2">(see an example)</a>.</p> 
        
        	<p>The youtube icon should allow users to... </p>
        
        	<p class="radio_section fb_url"><input name="sfsi_youtube_page" <?php echo ($option2['sfsi_youtube_page']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  /><label>Visit my Youtube page at:</label><input name="sfsi_youtube_pageUrl" type="url" placeholder="http://" value="<?php echo ($option2['sfsi_youtube_pageUrl']!='') ?  $option2['sfsi_youtube_pageUrl'] : '' ;?>" class="add" /></p>
        	
            <p class="radio_section fb_url"><input name="sfsi_youtube_follow" <?php echo ($option2['sfsi_youtube_follow']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  /><label>Subscribe to me on Youtube <span>(allows people to subscribe to you directly, without leaving your blog)</span></label></p>
        
            <!--Adding Code for Channel Id and Channel Name-->
            <div class="cstmutbewpr">
                <ul class="enough_waffling">
                   <li onclick="showhideutube(this);"><input name="sfsi_youtubeusernameorid" <?php echo ($option4['sfsi_youtubeusernameorid']=='name') ?  'checked="true"' : '' ;?> type="radio" value="name" class="styled"  /><label>User Name</label></li>
                   <li onclick="showhideutube(this);"><input name="sfsi_youtubeusernameorid" <?php echo ($option4['sfsi_youtubeusernameorid']=='id') ?  'checked="true"' : '' ;?> type="radio" value="id" class="styled"  /><label>Channel Id</label></li>
                </ul>
                <div class="cstmutbtxtwpr">
                    <?php
                        $sfsi_youtubeusernameorid = $option4['sfsi_youtubeusernameorid'];
                    ?>
                    <div class="cstmutbchnlnmewpr" <?php if($sfsi_youtubeusernameorid != 'id'){echo 'style="display: block;"';}?>>
                        <p class="extra_pp"><label>UserName:</label><input name="sfsi_ytube_user" type="url" value="<?php echo (isset($option2['sfsi_ytube_user']) && $option2['sfsi_ytube_user']!='') ?  $option2['sfsi_ytube_user'] : '' ;?>" placeholder="Youtube username" class="add" /></p>
                        <div class="utbe_instruction">
                            To find your Username go to "My channel" in Youtube menu bar on the left & Select the "About" tab and take your user name from URL there (e.g. https://www.youtube.com/user/<b>Myusername</b>/about).
                        </div>
                    </div>
                    <div class="cstmutbchnlidwpr" <?php if($sfsi_youtubeusernameorid == 'id'){echo 'style="display: block;"';}?>>
                        <p class="extra_pp"><label>ChannelId:</label><input name="sfsi_ytube_chnlid" type="url" value="<?php echo (isset($option4['sfsi_ytube_chnlid']) && $option4['sfsi_ytube_chnlid']!='') ?  $option4['sfsi_ytube_chnlid'] : '' ;?>" placeholder="youtube_channel_id" class="add" /></p>
                        <div class="utbe_instruction">
                            To find your Channel name go to "My Channel" in Youtube menu bar on the left and take your channel name from there.
                        </div>
                    </div>
                </div>
           </div>
        
        </div>
    </div>
    <!-- END YOUTUBE ICON -->
    
    <!-- PINTEREST ICON -->
    <div class="row pinterest_section">
    	<h2 class="sfsicls_pinterest">Pinterest</h2>
        <div class="inr_cont">
            <p>The Pinterest icon can perform several actions. Pick below which ones it should perform. If you select several options, then users can select what they want to do   <a class="rit_link pop-up" href="javascript:;"  data-id="pinex-s2">(see an example)</a>.</p> 
            <p>The Pinterest icon should allow users to... </p> 
            <p class="radio_section fb_url"><input name="sfsi_pinterest_page" <?php echo ($option2['sfsi_pinterest_page']=='yes') ?  'checked="true"' : '' ;?>  type="checkbox" value="yes" class="styled"  /><label>Visit my Pinterest page at:</label><input name="sfsi_pinterest_pageUrl" type="url" placeholder="http://"  value="<?php echo ($option2['sfsi_pinterest_pageUrl']!='') ?  $option2['sfsi_pinterest_pageUrl'] : '' ;?>" class="add" /></p>
            <div class="pint_url">
            <p class="radio_section fb_url"><input name="sfsi_pinterest_pingBlog" <?php echo ($option2['sfsi_pinterest_pingBlog']=='yes') ?  'checked="true"' : '' ;?>  type="checkbox" value="yes" class="styled"  /><label>Pin my blog on Pinterest (+1)</label></p></div>
        </div>
    </div>
    <!-- END PINTEREST ICON -->
    
    <!-- INSTAGRAM ICON -->
    <div class="row instagram_section">
    	<h2 class="sfsicls_instagram">Instagram</h2>
        <div class="inr_cont">
            <p>When clicked on, users will get directed to your Instagram page.</p> 
            <p class="radio_section fb_url  cus_link instagram_space" ><label>URL</label><input name="sfsi_instagram_pageUrl" type="text" value="<?php echo (isset($option2['sfsi_instagram_pageUrl']) && $option2['sfsi_instagram_pageUrl']!='') ?  $option2['sfsi_instagram_pageUrl'] : '' ;?>" placeholder="http://" class="add"  /></p>        
        </div>
    </div>
    <!-- END INSTAGRAM ICON -->
    
    <!-- LINKEDIN ICON -->
    <div class="row linkedin_section">
    	<h2 class="sfsicls_linkdin">LinkedIn</h2>
        <div class="inr_cont linked_tab_2 link_in">
            <p>The LinkedIn icon can perform several actions. Pick below which ones it should perform. If you select several options, then users can select what they want to do <a class="rit_link pop-up" href="javascript:;"  data-id="linkex-s2">(see an example)</a>.</p> 
            <p>You find your ID in the link of your profile page, e.g. https://www.linkedin.com/profile/view?id=<b>8539887</b>&trk=nav_responsive_tab_profile_pic</p>
            <p>The LinkedIn icon should allow users to... </p> 
            
            <div class="radio_section fb_url link_1"><input name="sfsi_linkedin_page" <?php echo ($option2['sfsi_linkedin_page']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  /><label>Visit my Linkedin page at:</label><input name="sfsi_linkedin_pageURL" type="text" placeholder="http://" value="<?php echo ($option2['sfsi_linkedin_pageURL']!='') ?  $option2['sfsi_linkedin_pageURL'] : '' ;?>" class="add" /></div>
            <div class="radio_section fb_url link_2"><input name="sfsi_linkedin_follow" <?php echo ($option2['sfsi_linkedin_follow']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  /><label>Follow me on Linkedin: </label><input name="sfsi_linkedin_followCompany" type="text" value="<?php echo ($option2['sfsi_linkedin_followCompany']!='') ?  $option2['sfsi_linkedin_followCompany'] : '' ;?>" class="add" placeholder="Enter company ID, e.g. 123456" /></div>
            
            <div class="radio_section fb_url link_3"><input name="sfsi_linkedin_SharePage" <?php echo ($option2['sfsi_linkedin_SharePage']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  /><label>Share my page on LinkedIn</label></div>
            
            <div class="radio_section fb_url link_4"><input name="sfsi_linkedin_recommendBusines" <?php echo ($option2['sfsi_linkedin_recommendBusines']=='yes') ?  'checked="true"' : '' ;?> type="checkbox" value="yes" class="styled"  /><label class="anthr_labl">Recommend my business or product on Linkedin</label><input name="sfsi_linkedin_recommendProductId" type="text" value="<?php echo ($option2['sfsi_linkedin_recommendProductId']!='') ?  $option2['sfsi_linkedin_recommendProductId'] : '' ;?>" class="add link_dbl" placeholder="Enter Product ID, e.g. 1441" /> <input name="sfsi_linkedin_recommendCompany" type="text" value="<?php echo ($option2['sfsi_linkedin_recommendCompany']!='') ?  $option2['sfsi_linkedin_recommendCompany'] : '' ;?>" class="add" placeholder="Enter company name, e.g. Google”" /></div>
            
            <div class="lnkdin_instruction">
                To find your Product or Company ID, you can use their ID lookup tool at <a target="_blank" href="https://developer.linkedin.com/apply-getting-started#company-lookup">https://developer.linkedin.com/apply-getting-started#company-lookup</a>. You need to be logged in to Linkedin to be able to use it.
            </div>
        </div>
    </div>
    <!-- END LINKEDIN ICON -->
    
    <!-- share button -->
    <div class="row share_section">
    	<h2 class="sfsicls_share">Share</h2>
        <div class="inr_cont">
        	<p>Nothing needs to be done here – your visitors to share your site via «all the other» social media sites.  <a class="rit_link pop-up" href="javascript:;"  data-id="share-s2">(see an example).</a></p> 
        </div>
    </div>
    <!-- share end -->
    
    <!-- Custom icon section start here -->
   	<div class="custom-links custom_section">
	<?php 
	  $costom_links	=	unserialize($option2['sfsi_CustomIcon_links']);
	  $count		=	1;
	  for($i = $first_key; $i <= $endkey; $i++) :
	?> 
	<?php if(!empty( $icons[$i])) : ?>
    	<div class="row  sfsiICON_<?php echo $i; ?> cm_lnk">
       		<h2 class="custom">
            	<span class="customstep2-img">
                	<img src="<?php echo (!empty($icons[$i])) ? esc_url($icons[$i]) : SFSI_PLUGURL.'images/custom.png';?>" id="CImg_<?php echo $new_element; ?>" style="border-radius:48%"  />
                </span>
                <span class="sfsiCtxt">Custom <?php echo $count; ?></span>
            </h2>
	   		<div class="inr_cont ">
	   			<p>Where do you want this icon to link to?</p> 
	   			<p class="radio_section fb_url custom_section cus_link " >
                	<label>Link :</label>
                    <input name="sfsi_CustomIcon_links[]" type="text" value="<?php echo (isset($costom_links[$i]) && $costom_links[$i]!='') ?  esc_url($costom_links[$i]) : '' ;?>" placeholder="http://" class="add" file-id="<?php echo $i; ?>" />
                </p>
	   		</div>
       	</div>
	<?php $count++; endif; endfor; ?>
    </div>
    <!-- END Custom icon section here -->
      
    <!-- SAVE BUTTON SECTION   --> 
    <div class="save_button tab_2_sav">
        <img src="<?php echo SFSI_PLUGURL; ?>images/ajax-loader.gif" class="loader-img" />
        <?php  $nonce = wp_create_nonce("update_step2"); ?>
        <a href="javascript:;" id="sfsi_save2" title="Save" data-nonce="<?php echo $nonce;?>">Save</a>
    </div>
    <!-- END SAVE BUTTON SECTION   -->
    
    <a class="sfsiColbtn closeSec" href="javascript:;">Collapse area</a>
    <label class="closeSec"></label>
    
    <!-- ERROR AND SUCCESS MESSAGE AREA-->
    <p class="red_txt errorMsg" style="display:none"> </p>
    <p class="green_txt sucMsg" style="display:none"> </p>
    
</div><!-- END Section 2 "What do you want the icons to do?" main div -->
