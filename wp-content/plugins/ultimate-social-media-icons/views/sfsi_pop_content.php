<?php 

$rss_readmore_text='Note: Also if you already offer a newsletter it makes sense to offer this option too, because it will get you more readers, as expained here.';
$ress_readmore_button='Ok, keep it active for the time being,I want to see how it works';
$rss_readmore_text2='Deactivate it';

define('rss_readmore', $rss_readmore_text);
define('ress_readmore_button', $ress_readmore_button);
define('rss_readmore_text2', $rss_readmore_text2);

$feedId 		= sanitize_text_field(get_option('sfsi_feed_id',false));
$connectToFeed 	= "http://www.specificfeeds.com/?".base64_encode("userprofile=wordpress&feed_id=".$feedId);
$connectFeedLgn	= "http://www.specificfeeds.com/?".base64_encode("userprofile=wordpress&feed_id=".$feedId."&logintype=login");
?>

<div class="pop-overlay read-overlay sfsi_feedClaimingOverlay" >
    <div class="pop_up_box sfsi_pop_up"  >
        <img src="<?php echo SFSI_PLUGURL; ?>images/newclose.png" id="close_popup" class="sfsicloseBtn" />
        <center>
            <form id="calimingOptimizationForm" method="get" action="https://www.specificfeeds.com/wpclaimfeeds/getFullAccess" target="_blank">
                <h1>Enter the email you want to use</h1>
                <div class="form-field">
                    <input type="hidden" name="feed_id" value="<?php echo $feedId; ?>" />
                    <input type="email" name="email" value="<?php echo get_option("admin_email"); ?>" placeholder="Your email" style="color: #000 !important;"/>
                </div>
                <div class="save_button">
                    <a href="javascript:;" id="sfsi_getMeFullAccess" title="Give me access">
                        Give me access!
                    </a>
                </div>
                <p>
                	This will create your FREE acccount on <a target="_blank" href="<?php echo $connectToFeed?>">SpecificFeeds</a>. We will treat your data (and your subscribers’ data!) highly confidentially, see our <a target="_blank" href="https://www.specificfeeds.com/page/privacy-policy ">Privacy Policy</a>.
              </p>
               
            </form>
        </center>    
	</div>
</div>

<div class="pop-overlay read-overlay" >
    <div class="pop_up_box sfsi_pop_up"  >
        <img src="<?php echo SFSI_PLUGURL; ?>images/close.jpg" id="close_popup" class="sfsicloseBtn" />
        <h4 id="readmore_text">Note: Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</h4>
</div>
</div>

<!-- Custom icon upload  Pop-up {Change by Monad}-->
<div class="pop-overlay upload-overlay" >
     
	<form id="customIconFrm" method="post" action="<?php echo admin_url( 'admin-ajax.php?action=UploadIcons' ); ?>" enctype="multipart/form-data" >
        <div class="pop_up_box upload_pop_up" id="tab1" style="min-height: 155px;">
            <img src="<?php echo SFSI_PLUGURL; ?>images/close.jpg" id="close_Uploadpopup" class="sfsicloseBtn" />
            <div class="sfsi_uploader">
                <div class="sfsi_popupcntnr">
                    <h3>Steps:</h3>
                    <ul class="flwstep">
                        <li>1. Click on <span> << </span> <span> Upload </span> <span> >> </span> below</li>
                        <li>2. Upload the icon into the media gallery</li>
                        <li>3. Click on  <span> << </span> <span> Insert into post </span> <span> >> </span> </li>
                    </ul>    
                    <div class="upldbtn"><input name=""  type="button" value="Upload" class="upload_butt" onclick="upload_image_icon(this)" /></div>
                </div>
            </div>
          
            <input type="hidden" name="total_cusotm_icons" value="<?php echo $count;?>" id="total_cusotm_icons" class="mediam_txt" />
            <!--<a href="javascript:;" id="close_Uploadpopup" title="Done">Done</a>-->
            <label style="color:red" class="uperror"></label>
        </div>
	
   	</form>
   
   <script type="text/javascript">
   function upload_image_icon(ref)
   {
	    formfield = jQuery(ref).attr('name');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		window.send_to_editor = function(html) {
			var url = jQuery('img',html).attr('src');
			if(url == undefined) 
			{
				var url = jQuery(html).attr('src');
			}
			tb_remove();
			sfsi_newcustomicon_upload(url);
		}
		return false;
	}
   </script>
   
</div><!-- Custom icon upload  Pop-up-->


<?php 
	 $active_theme=$option3['sfsi_actvite_theme'];
     $icons_baseUrl=SFSI_PLUGURL."/images/icons_theme/".$active_theme."/";
     $visit_iconsUrl= SFSI_PLUGURL."/images/visit_icons/";
     $soicalObj=new sfsi_SocialHelper();
     $twitetr_share=($option2['sfsi_twitter_followUserName']!='') ?  "https://twitter.com/".$option2['sfsi_twitter_followUserName'] : 'http://specificfeeds.com';
     $twitter_text=($option2['sfsi_twitter_followUserName']!='') ?  $option2['sfsi_twitter_aboutPageText'] : 'Create Your Perfect Newspaper for free';
?>

<!-- Facebook  example pop up -->
<div class="fb-overlay read-overlay fbex-s2" >
    <div class="pop_up_box_ex sfsi_pop_up adPopWidth" >
        <img src="<?php echo SFSI_PLUGURL; ?>images/close.jpg" id="close_popup" class="sfsicloseBtn" />
	    <h4 id="readmore_text">Move over the Facebook-icon… </h4>
    
        <div class="adminTooltip" >
           <a href="javascript:"><img width="51" class="sfsi_wicon" src="<?php echo SFSI_PLUGURL; ?>images/facebook.png" title="facebook" alt="facebook" /></a>
           <div class="sfsi_tool_tip_2 sfsi_tool_tip_2_inr fb_tool_bdr" style="width: 59px;margin-left: -48.5px;">
               <span class="bot_arow bot_fb_arow "></span>
               <div class="sfsi_inside fbb">
                   <div class="fb_1"><img src="<?php echo $visit_iconsUrl."facebook.png"; ?>" /></div>    
                   <div class="fb_2"><img src="<?php echo $visit_iconsUrl."fblike_bck.png"; ?>" /></div>
                   <div class="fb_3"><img src="<?php echo $visit_iconsUrl."fbshare_bck.png"; ?>" /></div>
               </div>    
           </div>
   		
        </div>
    </div>
</div><!-- END Facebook  example pop up -->

<!-- adthis example pop up -->
<div class="pop-overlay read-overlay athis-s1" >
    <div class="pop_up_box sfsi_pop_up adPopWidth"  >
        <img src="<?php echo SFSI_PLUGURL; ?>images/close.jpg" id="close_popup" class="sfsicloseBtn" />
    	<h4 id="readmore_text">Move over the “+ icon” to see the sharing options</h4>
    	<div style="margin: 0px auto;">
			<script type="text/javascript">
				var addthis_config = {pubid: "YOUR-PROFILE-ID"}
			</script>
			<a href="http://www.addthis.com/bookmark.php?v=250" class="addthis_button">
            	<img width="51" class="sfsi_wicon" src="<?php echo $icons_baseUrl."/".$active_theme; ?>_share.png" title="share" alt="share" />
            </a>
    		<?php //echo sfsi_Addthis(1); ?>
    	</div>
    </div>
</div><!-- END adthis example pop up -->

<?php
	  $twit_tolCls = "100";
	  $twt_margin = "63";  
	  $icons_space = $option5['sfsi_icons_spacing'];  
	  $twitter_user = $option2['sfsi_twitter_followUserName'];
	  $twit_tolCls = round(strlen($twitter_user)*4+100+20); 
      $main_margin = round($icons_space)/2;
      $twt_margin = round($twit_tolCls/2+$main_margin+6);
?>
<!-- twiiter example pop-up -->
<div class="pop-overlay read-overlay twex-s2" >
    <div class="pop_up_box_ex sfsi_pop_up adPopWidth" >
        <img src="<?php echo SFSI_PLUGURL; ?>images/close.jpg" id="close_popup" class="sfsicloseBtn" />
    	<h4 id="readmore_text">Move over the Twiiter-icon… </h4>
    
        <div class="adminTooltip" >
        	<a href="javascript:"><img width="51" class="sfsi_wicon" src="<?php echo SFSI_PLUGURL; ?>images/twitter.png" title="Twitter" alt="Twitter" /></a>
            <div class="sfsi_tool_tip_2 sfsi_tool_tip_2_inr twt_tool_bdr" style="width: 59px;margin-left: -48.5px;">
           		<span class="bot_arow bot_twt_arow"></span>
           		<div class="sfsi_inside" >
           			<div class="twt_3"><img src="<?php echo $visit_iconsUrl."twitter.png"; ?>" /></div>
                    <div class="twt_1"><img src="<?php echo $visit_iconsUrl."twfollow_bck.png"; ?>" /></div>
           			<div class="twt_2"><img src="<?php echo $visit_iconsUrl."twtweet_bck.png"; ?>" /></div>
          		</div>    
            </div>
   		</div>
    </div>
</div><!-- END twiiter example pop-up -->

<?php 
	$google_url=($option2['sfsi_google_pageURL']!='') ?  $option2['sfsi_google_pageURL'] : 'https://plus.google.com/117732335852724933053' ;
?>
<!-- Goolge+  example pop up -->
<div class="pop-overlay read-overlay googlex-s2"  style="display: block;z-index: -1;opacity: 0;">
    <div class="pop_up_box_ex sfsi_pop_up adPopWidth" style="display: block;" >
        <img src="<?php echo SFSI_PLUGURL; ?>images/close.jpg" id="close_popup" class="sfsicloseBtn" />
    	<h4 id="readmore_text">Move over the Google+ icon… </h4>
    
        <div class="adminTooltip" >
        	<a href="javascript:"><img width="51" class="sfsi_wicon" src="<?php echo SFSI_PLUGURL; ?>images/google_plus.png" title="google+" alt="google"/></a>
            <div class="sfsi_tool_tip_2 sfsi_tool_tip_2_inr gpls_tool_bdr" style="display: block;  margin-left: -76.5px; margin-left: -55.5px;">
           		<span class="bot_arow bot_gpls_arow"></span>
           		<div class="sfsi_inside">
           			<div class="gpls_visit"><img src="<?php echo $visit_iconsUrl."google.png"; ?>" /></div>    
           			<div class="gtalk_2"><img src="<?php echo $visit_iconsUrl."gplus_like.png"; ?>" /></div>
          	 		<div class="gtalk_3"><img src="<?php echo $visit_iconsUrl."gplus_share.png"; ?>" /></div>
           		</div>    
           </div>
       </div>
    </div>
</div><!-- END Goolge+  example pop up -->

<?php 
	$youtube_url=($option2['sfsi_youtube_pageUrl']!='') ?  $option2['sfsi_youtube_pageUrl'] : 'http://www.youtube.com/user/SpecificFeeds' ;
	$youtube_user=($option4['sfsi_youtube_user']!='' && isset($option4['sfsi_youtube_user']))?  $option4['sfsi_youtube_user'] : 'SpecificFeeds' ;
?>
<!-- You tube  example pop up -->
<div class="pop-overlay read-overlay ytex-s2" >
    <div class="pop_up_box_ex sfsi_pop_up adPopWidth" >
        <img src="<?php echo SFSI_PLUGURL; ?>images/close.jpg" id="close_popup" class="sfsicloseBtn" />
    	<h4 id="readmore_text">Move over the YouTube-icon… </h4>
    	
        <div class="adminTooltip" >
        	<a href="javascript:"><img width="51" class="sfsi_wicon" src="<?php echo SFSI_PLUGURL; ?>images/youtube.png" title="youtube" alt="youtube" /></a>
        	<div class="sfsi_tool_tip_2 sfsi_tool_tip_2_inr utube_tool_bdr"  style=" margin-left: -67px; width: 96px;" >
           		<span class="bot_arow bot_utube_arow"></span>
           		<div class="sfsi_inside">
               		<div class="utub_visit"><img src="<?php echo $visit_iconsUrl."youtube.png"; ?>" /></div>
           			<div class="utub_2"><img src="<?php echo $visit_iconsUrl."youtube_bck.png"; ?>" /></div>
                </div>    
        	</div>
   		</div>
	</div>
</div><!-- END You tube  example pop up -->
<?php 
$pin_url=($option2['sfsi_pinterest_pageUrl']!='') ?  $option2['sfsi_pinterest_pageUrl'] : 'http://pinterest.com/specificfeeds' ;
?>
<!-- Pinterest  example pop up -->
<div class="pop-overlay read-overlay pinex-s2" >
    <div class="pop_up_box_ex sfsi_pop_up adPopWidth" >
        <img src="<?php echo SFSI_PLUGURL; ?>images/close.jpg" id="close_popup" class="sfsicloseBtn" />
    	<h4 id="readmore_text">Move over the Pinterest-icon… </h4>
    
     	<div class="adminTooltip" >
        <a href="javascript:"><img width="51" class="sfsi_wicon" src="<?php echo SFSI_PLUGURL; ?>images/pinterest.png" title="pinterest" alt="pinterest" /></a>
        <div class="sfsi_tool_tip_2 sfsi_tool_tip_2_inr printst_tool_bdr"  style=" width: 73px; margin-left: -55.5px;" >
           <span class="bot_arow bot_pintst_arow"></span>
           <div class="sfsi_inside">
               <div class="prints_visit"><img src="<?php echo $visit_iconsUrl."pinterest.png"; ?>" /></div>
               <div class="prints_visit_1"><img src="<?php echo $visit_iconsUrl."pinit_bck.png"; ?>" /></div>
           </div>    
        </div>
   	</div>
  </div>
</div> <!-- END Pinterest  example pop up -->

<?php 
	$linnked_share=($option2['sfsi_linkedin_pageURL']!='') ?  $option2['sfsi_linkedin_pageURL'] : 'https://www.linkedin.com/' ;
	$linkedIncom=($option2['sfsi_linkedin_followCompany']!='') ?  $option2['sfsi_linkedin_followCompany'] : '904740' ;
	$ln_product=($option2['sfsi_linkedin_recommendProductId']!='') ?  $option2['sfsi_linkedin_recommendProductId'] : '201714' ;
?>
<!-- LinkedIn  example pop up -->
<div class="pop-overlay read-overlay linkex-s2" style="display: block;z-index: -1;opacity: 0;" >
    <div class="pop_up_box_ex sfsi_pop_up adPopWidth" >
    	<img src="<?php echo SFSI_PLUGURL; ?>images/close.jpg" id="close_popup" class="sfsicloseBtn" />
    	<h4 id="readmore_text">Move over the LinkedIn-icon… </h4>
        <div class="adminTooltip" >
        	<a href="javascript:"><img width="51" class="sfsi_wicon" src="<?php echo SFSI_PLUGURL;?>images/linked_in.png" title="LinkedIn" alt="LinkedIn"/></a>
        	<div class="sfsi_tool_tip_2 sfsi_tool_tip_2_inr linkedin_tool_bdr"  style=" width: 99px; margin-left: -68.5px;">
           		<span class="bot_arow bot_linkedin_arow"></span>
           		<div class="sfsi_inside">
           		   <div style="margin:1px 5px;" class="linkin_1"><img src="<?php echo $visit_iconsUrl."linkedIn.png"; ?>" /></div>
                   <div class="linkin_2"><img src="<?php echo $visit_iconsUrl."linkinflw_bck.png"; ?>" /></div>
                   <div class="linkin_3"><img src="<?php echo $visit_iconsUrl."lnkdin_share_bck.png"; ?>" /></div>
                   <div class="linkin_4"><img src="<?php echo $visit_iconsUrl."lnkrecmd_bck.png"; ?>" /></div>
           		</div>    
        	</div>
   		</div>
  </div>
</div> <!-- END LinkedIn  example pop up -->

<!-- ADDTHIS ICON POP-UP -->
<div class="pop-overlay read-overlay share-s2" >
    <div class="pop_up_box sfsi_pop_up adPopWidth" >
        <img src="<?php echo SFSI_PLUGURL; ?>images/close.jpg" id="close_popup" class="sfsicloseBtn" />
    	<h4 id="readmore_text">Move over the “+ icon” to see the sharing options</h4>
 	    <div style="float: right;opacity: 1;position: relative;right: 215px;top: 10px;width: 52px; text-align: center;" ><a alt="share"  href="http://www.addthis.com/bookmark.php?v=250"  effect="" class="addthis_button"><img width="51" class="sfsi_wicon" src="<?php echo SFSI_PLUGURL; ?>images/share.png" title="share" alt="share" /></a>
    </div>
  </div>
</div><!-- END ADDTHIS ICON POP-UP -->



<!-- email deactivate pop-ups -->

<div class="pop-overlay read-overlay demail-1" >
    <div class="pop_up_box sfsi_pop_up " >
       <h4>Note: Also if you already offer a newsletter it makes sense to offer this option too, because it will get you <span class="mediam_txt">more readers</span>, as explained <a href="http://www.specificfeeds.com/rss" target="_new" style="color:#5A6570;display: inline;text-decoration:underline">here</a>. </h4>
       <div class="button"><a href="javascript:;" class="hideemailpop" title="Ok, keep it active for the time being,I want to see how it works">Ok, keep it active for the time being, <br />
I want to see how it works</a></div>
       <a href="javascript:;" id="deac_email2" title="Deactivate it">Deactivate it</a>
  </div>
</div>

<div class="pop-overlay read-overlay demail-2" >
    <div class="pop_up_box sfsi_pop_up " >
       <h4 class="activate">Ok, fine, however for using this plugin for FREE, please support us by activating a link back to our site:</h4>
       <?php $nonce = wp_create_nonce("active_footer");?>
	<div class="button"><a href="javascript:;" class="activate_footer activate" title="Ok, activate link" data-nonce="<?php echo $nonce;?>">Ok, activate link</a></div>
<a href="javascript:;" id="deac_email3" title="Don’t activate link">Don’t activate link</a>
  </div>
</div>

<div class="pop-overlay read-overlay demail-3" >
    <div class="pop_up_box sfsi_pop_up " >
       <h4>You’re a toughie. Last try: As a minimum, could you please review this plugin (with 5 stars)? It only takes a minute. Thank you! </h4>
	<div class="button"><a href="https://wordpress.org/support/plugin/ultimate-social-media-icons/reviews/" target="_new" class="hidePop activate" title="Ok, Review it" >Ok, Review it</a></div>
        <a href="javascript:;" class="hidePop" title="Don’t review and exit">Don’t review and exit</a>
  </div>
</div> <!-- END email deactivate pop-ups -->

<!--Custom Skin popup {Monad}-->
<div class="pop-overlay cstmskins-overlay" >
    <div class="cstmskin_popup" >
        <img src="<?php echo SFSI_PLUGURL; ?>images/close.jpg" id="custmskin_clspop" class="sfsicloseBtn" />
        
        <div class="cstomskins_wrpr">
            <h3>Upload custom icons</h3>
            <div class="custskinmsg">
                Here you can upload custom icons which perform the same actions as the standard icons.
                
                <ul>
                    <li>1. Click on <span> << </span> <span> Upload </span> <span> >> </span> below</li>
                    <li>2. Upload the icon into the media gallery</li>
                    <li>3. Click on  <span> << </span> <span> Insert into post </span> <span> >> </span> </li>
                </ul>
            </div>
            
            <ul class="cstmskin_iconlist">
            	<li>
                	<div class="cstm_icnname">RSS</div>
                    <div class="cstmskins_btn">
                    	<?php
							$nonce = wp_create_nonce("deleteCustomSkin");
							if(get_option("rss_skin"))
							{
								$rss_skin = get_option("rss_skin");
								echo "<img src='".$rss_skin."' width='30px' height='30px' class='imgskin'>";
								echo '<a href="javascript:" onclick="upload_image(this);" title="rss_skin" class="cstmskin_btn">Update</a>';
								echo '<a href="javascript:" onclick="deleteskin_icon(this);" title="rss_skin" data-nonce="'.$nonce.'" class="cstmskin_btn">Delete</a>';
							}
							else
							{
								echo "<img src='' width='30px' height='30px' class='imgskin skswrpr'>";
								echo '<a href="javascript:" onclick="upload_image(this);" title="rss_skin" class="cstmskin_btn">Upload</a>';
								echo '<a href="javascript:" onclick="deleteskin_icon(this);" title="rss_skin" data-nonce="'.$nonce.'" class="cstmskin_btn dlt_btn">Delete</a>';
							}
						?>
                    </div>
                </li>
                <li>
                	<div class="cstm_icnname">Email</div>
                    <div class="cstmskins_btn">
                    	<?php 
							if(get_option("email_skin"))
							{
								$email_skin = get_option("email_skin");
								echo "<img src='".$email_skin."' width='30px' height='30px' class='imgskin'>";
								echo '<a href="javascript:" onclick="upload_image(this);" title="email_skin" class="cstmskin_btn">Update</a>';
								echo '<a href="javascript:" onclick="deleteskin_icon(this);" title="email_skin" data-nonce="'.$nonce.'" class="cstmskin_btn">Delete</a>';
							}
							else
							{
								echo "<img src='' width='30px' height='30px' class='imgskin skswrpr'>";
								echo '<a href="javascript:" onclick="upload_image(this);" title="email_skin" class="cstmskin_btn">Upload</a>';
								echo '<a href="javascript:" onclick="deleteskin_icon(this);" title="email_skin" data-nonce="'.$nonce.'" class="cstmskin_btn dlt_btn">Delete</a>';
							}
						?>
                    </div>
                </li>
                <li>
                	<div class="cstm_icnname">Facebook</div>
                    <div class="cstmskins_btn">
                    	<?php 
							if(get_option("facebook_skin"))
							{
								$facebook_skin = get_option("facebook_skin");
								echo "<img src='".$facebook_skin."' width='30px' height='30px'  class='imgskin'>";
								echo '<a href="javascript:" onclick="upload_image(this);" title="facebook_skin" class="cstmskin_btn">Update</a>';
								echo '<a href="javascript:" onclick="deleteskin_icon(this);" title="facebook_skin" data-nonce="'.$nonce.'" class="cstmskin_btn">Delete</a>';
							}
							else
							{
								echo "<img src='' width='30px' height='30px' class='imgskin skswrpr'>";
								echo '<a href="javascript:" onclick="upload_image(this);" title="facebook_skin" class="cstmskin_btn">Upload</a>';
								echo '<a href="javascript:" onclick="deleteskin_icon(this);" title="facebook_skin" data-nonce="'.$nonce.'" class="cstmskin_btn dlt_btn">Delete</a>';
							}
						?>
                    </div>
                </li>
                <li>
                	<div class="cstm_icnname">Twitter</div>
                    <div class="cstmskins_btn">
                    	<?php 
							if(get_option("twitter_skin"))
							{
								$twitter_skin = get_option("twitter_skin");
								echo "<img src='".$twitter_skin."' width='30px' height='30px' class='imgskin'>";
								echo '<a href="javascript:" onclick="upload_image(this);" title="twitter_skin" class="cstmskin_btn">Update</a>';
								echo '<a href="javascript:" onclick="deleteskin_icon(this);" title="twitter_skin" data-nonce="'.$nonce.'" class="cstmskin_btn">Delete</a>';
							}
							else
							{
								echo "<img src='' width='30px' height='30px' class='imgskin skswrpr'>";
								echo '<a href="javascript:" onclick="upload_image(this);" title="twitter_skin" class="cstmskin_btn">Upload</a>';
								echo '<a href="javascript:" onclick="deleteskin_icon(this);" title="twitter_skin" data-nonce="'.$nonce.'" class="cstmskin_btn dlt_btn">Delete</a>';
							}
						?>
                    </div>
                </li>
                <li>
                	<div class="cstm_icnname">Google+</div>
                    <div class="cstmskins_btn">
                    	<?php 
							if(get_option("google_skin"))
							{
								$google_skin = get_option("google_skin");
								echo "<img src='".$google_skin."' width='30px' height='30px'  class='imgskin'>";
								echo '<a href="javascript:" onclick="upload_image(this);" title="google_skin" class="cstmskin_btn">Update</a>';
								echo '<a href="javascript:" onclick="deleteskin_icon(this);" title="google_skin" data-nonce="'.$nonce.'" class="cstmskin_btn">Delete</a>';
							}
							else
							{
								echo "<img src='' width='30px' height='30px' class='imgskin skswrpr'>";
								echo '<a href="javascript:" onclick="upload_image(this);" title="google_skin" class="cstmskin_btn">Upload</a>';
								echo '<a href="javascript:" onclick="deleteskin_icon(this);" title="google_skin" data-nonce="'.$nonce.'" class="cstmskin_btn dlt_btn">Delete</a>';
							}
						?>
                    </div>
				</li>
                <li>
                	<div class="cstm_icnname">Share</div>
                    <div class="cstmskins_btn">
                    	<?php 
							if(get_option("share_skin"))
							{
								$share_skin = get_option("share_skin");
								echo "<img src='".$share_skin."' width='30px' height='30px' class='imgskin'>";
								echo '<a href="javascript:" onclick="upload_image(this);" title="share_skin" class="cstmskin_btn">Update</a>';
								echo '<a href="javascript:" onclick="deleteskin_icon(this);" title="share_skin" data-nonce="'.$nonce.'" class="cstmskin_btn">Delete</a>';
							}
							else
							{
								echo "<img src='' width='30px' height='30px' class='imgskin skswrpr'>";
								echo '<a href="javascript:" onclick="upload_image(this);" title="share_skin" class="cstmskin_btn">Upload</a>';
								echo '<a href="javascript:" onclick="deleteskin_icon(this);" title="share_skin" data-nonce="'.$nonce.'" class="cstmskin_btn dlt_btn">Delete</a>';
							}
						?>
                    </div>
                </li>
                <li>
                	<div class="cstm_icnname">Youtube</div>
                    <div class="cstmskins_btn">
                    	<?php 
							if(get_option("youtube_skin"))
							{
								$youtube_skin = get_option("youtube_skin");
								echo "<img src='".$youtube_skin."' width='30px' height='30px'  class='imgskin'>";
								echo '<a href="javascript:" onclick="upload_image(this);" title="youtube_skin" class="cstmskin_btn">Update</a>';
								echo '<a href="javascript:" onclick="deleteskin_icon(this);" title="youtube_skin" data-nonce="'.$nonce.'" class="cstmskin_btn">Delete</a>';
							}
							else
							{
								echo "<img src='' width='30px' height='30px' class='imgskin skswrpr'>";
								echo '<a href="javascript:" onclick="upload_image(this);" title="youtube_skin" class="cstmskin_btn">Upload</a>';
								echo '<a href="javascript:" onclick="deleteskin_icon(this);" title="youtube_skin" data-nonce="'.$nonce.'" class="cstmskin_btn dlt_btn">Delete</a>';
							}
						?>
                    </div>
                </li>
                <li>
                	<div class="cstm_icnname">Linkedin</div>
                    <div class="cstmskins_btn">
                    	<?php 
							if(get_option("linkedin_skin"))
							{
								$linkedin_skin = get_option("linkedin_skin");
								echo "<img src='".$linkedin_skin."' width='30px' height='30px'  class='imgskin'>";
								echo '<a href="javascript:" onclick="upload_image(this);" title="linkedin_skin" class="cstmskin_btn">Update</a>';
								echo '<a href="javascript:" onclick="deleteskin_icon(this);" title="linkedin_skin" data-nonce="'.$nonce.'" class="cstmskin_btn">Delete</a>';
							}
							else
							{
								echo "<img src='' width='30px' height='30px' class='imgskin skswrpr'>";
								echo '<a href="javascript:" onclick="upload_image(this);" title="linkedin_skin" class="cstmskin_btn">Upload</a>';	
								echo '<a href="javascript:" onclick="deleteskin_icon(this);" title="linkedin_skin" data-nonce="'.$nonce.'" class="cstmskin_btn dlt_btn">Delete</a>';
							}
						?>
                    </div>
                </li>
                <li>
                	<div class="cstm_icnname">Pinterest</div>
                    <div class="cstmskins_btn">
                    	<?php 
							if(get_option("pintrest_skin"))
							{
								$pintrest_skin = get_option("pintrest_skin");
								echo "<img src='".$pintrest_skin."' width='30px' height='30px' class='imgskin'>";
								echo '<a href="javascript:" onclick="upload_image(this);" title="pintrest_skin" class="cstmskin_btn">Update</a>';
								echo '<a href="javascript:" onclick="deleteskin_icon(this);" title="pintrest_skin" data-nonce="'.$nonce.'" class="cstmskin_btn">Delete</a>';
							}
							else
							{
								echo "<img src='' width='30px' height='30px' class='imgskin skswrpr'>";
								echo '<a href="javascript:" onclick="upload_image(this);" title="pintrest_skin" class="cstmskin_btn">Upload</a>';
								echo '<a href="javascript:" onclick="deleteskin_icon(this);" title="pintrest_skin" data-nonce="'.$nonce.'" class="cstmskin_btn dlt_btn">Delete</a>';
							}
						?>
                    </div>
                </li>
                <li>
                	<div class="cstm_icnname">Instagram</div>
                    <div class="cstmskins_btn">
                    	<?php 
							if(get_option("instagram_skin"))
							{
								$instagram_skin = get_option("instagram_skin");
								echo "<img src='".$instagram_skin."' width='30px' height='30px' class='imgskin'>";
								echo '<a href="javascript:" onclick="upload_image(this);" title="instagram_skin" class="cstmskin_btn">Update</a>';
								echo '<a href="javascript:" onclick="deleteskin_icon(this);" title="instagram_skin" data-nonce="'.$nonce.'" class="cstmskin_btn">Delete</a>';
							}
							else
							{
								echo "<img src='' width='30px' height='30px' class='imgskin skswrpr'>";
								echo '<a href="javascript:" onclick="upload_image(this);" title="instagram_skin" class="cstmskin_btn">Upload</a>';
								echo '<a href="javascript:" onclick="deleteskin_icon(this);" title="instagram_skin" data-nonce="'.$nonce.'" class="cstmskin_btn dlt_btn">Delete</a>';		
							}
						?>
                    </div>
                </li>
                
            </ul>
            <div class="cstmskins_sbmt">
            	<a href="javascript:" class="done_btn" onclick="SFSI_done();">I'm done!</a> 
            </div>
           
        </div>
    	<script type="text/javascript">
		   function upload_image(ref)
		   {
				var title = jQuery(ref).attr('title');
				tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
				window.send_to_editor = function(html) {
					var url = jQuery('img',html).attr('src');
					if(url == undefined) 
					{
						var url = jQuery(html).attr('src');
					}
					sfsi_customskin_upload(title+'='+url, ref);
					tb_remove();
				}
				return false;
			}
		 </script>
    </div>    
</div>        
