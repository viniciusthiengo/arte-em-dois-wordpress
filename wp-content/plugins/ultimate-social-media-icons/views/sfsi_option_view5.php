<?php
	/* unserialize all saved option for  section 5 options */
	$icons 		= ($option1['sfsi_custom_files']) ? unserialize($option1['sfsi_custom_files']) : array() ;
	$option3	= unserialize(get_option('sfsi_section3_options',false));
	$option5	= unserialize(get_option('sfsi_section5_options',false));
	$custom_icons_order = unserialize($option5['sfsi_CustomIcons_order']);
	$icons_order = array(
		$option5['sfsi_rssIcon_order']		=> 'rss',
		$option5['sfsi_emailIcon_order']	=> 'email',
		$option5['sfsi_facebookIcon_order']	=> 'facebook',
		$option5['sfsi_googleIcon_order']	=> 'google',
		$option5['sfsi_twitterIcon_order']	=> 'twitter',
		$option5['sfsi_shareIcon_order']	=> 'share',
		$option5['sfsi_youtubeIcon_order']	=> 'youtube',
		$option5['sfsi_pinterestIcon_order']=> 'pinterest',
		$option5['sfsi_linkedinIcon_order']	=> 'linkedin',
		$option5['sfsi_instagramIcon_order']=> 'instagram'
	) ;
	
	/*
	 * Sanitize, escape and validate values
	 */
	$option5['sfsi_icons_size'] 				= 	(isset($option5['sfsi_icons_size']))
														? intval($option5['sfsi_icons_size'])
														: '';
	$option5['sfsi_icons_spacing'] 				= 	(isset($option5['sfsi_icons_spacing']))
														? intval($option5['sfsi_icons_spacing'])
														: '';
	$option5['sfsi_icons_Alignment'] 			= 	(isset($option5['sfsi_icons_Alignment']))
														? sanitize_text_field($option5['sfsi_icons_Alignment'])
														: '';
	$option5['sfsi_icons_perRow'] 				= 	(isset($option5['sfsi_icons_perRow']))
														? intval($option5['sfsi_icons_perRow'])
														: '';
	$option5['sfsi_icons_ClickPageOpen']		= 	(isset($option5['sfsi_icons_ClickPageOpen']))
														? sanitize_text_field($option5['sfsi_icons_ClickPageOpen'])
														:'';
	$option5['sfsi_icons_float'] 				= 	(isset($option5['sfsi_icons_float']))
														? sanitize_text_field($option5['sfsi_icons_float'])
														: '';
	$option5['sfsi_disable_floaticons'] 		= 	(isset($option5['sfsi_disable_floaticons']))
														? sanitize_text_field($option5['sfsi_disable_floaticons'])
														: '';
	$option5['sfsi_icons_floatPosition'] 		= 	(isset($option5['sfsi_icons_floatPosition']))
														? sanitize_text_field($option5['sfsi_icons_floatPosition'])
														:'';
	$option5['sfsi_icons_floatMargin_top'] 		= 	(isset($option5['sfsi_icons_floatMargin_top']))
														? intval($option5['sfsi_icons_floatMargin_top'])
														: '';
	$option5['sfsi_icons_floatMargin_bottom']	= 	(isset($option5['sfsi_icons_floatMargin_bottom']))
														? intval($option5['sfsi_icons_floatMargin_bottom'])
														: '';
	$option5['sfsi_icons_floatMargin_left']		= 	(isset($option5['sfsi_icons_floatMargin_left']))
														? intval($option5['sfsi_icons_floatMargin_left'])
														: '';
	$option5['sfsi_icons_floatMargin_right']	= 	(isset($option5['sfsi_icons_floatMargin_right']))
														? intval($option5['sfsi_icons_floatMargin_right'])
														: '';
	
	$option5['sfsi_icons_stick'] 				= 	(isset($option5['sfsi_icons_stick']))
														? sanitize_text_field($option5['sfsi_icons_stick'])
														: '';
	$option5['sfsi_rss_MouseOverText'] 			= 	(isset($option5['sfsi_rss_MouseOverText']))
														? sanitize_text_field($option5['sfsi_rss_MouseOverText'])
														: '';
	$option5['sfsi_email_MouseOverText'] 		= 	(isset($option5['sfsi_email_MouseOverText']))
														? sanitize_text_field($option5['sfsi_email_MouseOverText'])
														:'';
	$option5['sfsi_twitter_MouseOverText'] 		= 	(isset($option5['sfsi_twitter_MouseOverText']))
														? sanitize_text_field($option5['sfsi_twitter_MouseOverText'])
														: '';
	$option5['sfsi_facebook_MouseOverText'] 	= 	(isset($option5['sfsi_facebook_MouseOverText']))
														? sanitize_text_field($option5['sfsi_facebook_MouseOverText'])
														: '';
	$option5['sfsi_google_MouseOverText'] 		= 	(isset($option5['sfsi_google_MouseOverText']))
														? sanitize_text_field($option5['sfsi_google_MouseOverText'])
														: '';
	$option5['sfsi_linkedIn_MouseOverText'] 	= 	(isset($option5['sfsi_linkedIn_MouseOverText']))
														? sanitize_text_field($option5['sfsi_linkedIn_MouseOverText'])
														: '';
	$option5['sfsi_pinterest_MouseOverText']	= 	(isset($option5['sfsi_pinterest_MouseOverText']))
														? sanitize_text_field($option5['sfsi_pinterest_MouseOverText'])
														: '';
	$option5['sfsi_youtube_MouseOverText'] 		= 	(isset($option5['sfsi_youtube_MouseOverText']))
														? sanitize_text_field($option5['sfsi_youtube_MouseOverText'])
														: '';
	$option5['sfsi_share_MouseOverText'] 		= 	(isset($option5['sfsi_share_MouseOverText']))
														? sanitize_text_field($option5['sfsi_share_MouseOverText'])
														: '';
	$option5['sfsi_instagram_MouseOverText']	= 	(isset($option5['sfsi_instagram_MouseOverText']))
														? sanitize_text_field($option5['sfsi_instagram_MouseOverText'])
														: '';
	
	if(is_array($custom_icons_order) ) 
	{
		foreach($custom_icons_order as $data)
		{
			$icons_order[$data['order']] = $data;
		}
	}
	ksort($icons_order);
?>

<!-- Section 5 "Any other wishes for your main icons?" main div Start -->
<div class="tab5">
	<h4>Order of your icons</h4>
    <!-- icon drag drop  section start here -->	
    <ul class="share_icon_order" >
            <?php 
	 	$ctn = 0;
	 	foreach($icons_order as $index=>$icn) :
          
		  switch ($icn) : 
          case 'rss' :?>
            	 <li class="rss_section" data-index="<?php echo $index; ?>" id="sfsi_rssIcon_order">
                	<a href="#" title="RSS"><img src="<?php echo SFSI_PLUGURL; ?>images/rss.png" alt="RSS" /></a>
                 </li>
          <?php break; ?>
          
		  <?php case 'email' :?>
          		<li class="email_section " data-index="<?php echo $index; ?>" id="sfsi_emailIcon_order">
                	<a href="#" title="Email"><img src="<?php echo SFSI_PLUGURL; ?>images/<?php echo $email_image; ?>" alt="Email" class="icon_img" /></a>
                </li>
          <?php break; ?>
          
		  <?php case 'facebook' :?>
          		<li class="facebook_section " data-index="<?php echo $index; ?>" id="sfsi_facebookIcon_order">
                	<a href="#" title="Facebook"><img src="<?php echo SFSI_PLUGURL; ?>images/facebook.png" alt="Facebook" /></a>
                </li>
          <?php break; ?>
          
          <?php case 'google' :?>
          		<li class="google_section " data-index="<?php echo $index; ?>" id="sfsi_googleIcon_order">
                	<a href="#" title="Google Plus" ><img src="<?php echo SFSI_PLUGURL; ?>images/google_plus.png" alt="Google Plus" /></a>
                </li>
          <?php break; ?>
          
          <?php case 'twitter' :?>
          		<li class="twitter_section " data-index="<?php echo $index; ?>" id="sfsi_twitterIcon_order">
                	<a href="#" title="Twitter" ><img src="<?php echo SFSI_PLUGURL; ?>images/twitter.png" alt="Twitter" /></a>
                </li>
          <?php break; ?>
          
          <?php case 'share' : ?>
          		<li class="share_section " data-index="<?php echo $index; ?>"  id="sfsi_shareIcon_order">
                	<a href="#" title="Share" ><img src="<?php echo SFSI_PLUGURL; ?>images/share.png" alt="Share" /></a>
                </li>
          <?php break; ?>
          
          <?php case 'youtube' :?>
          		<li class="youtube_section " data-index="<?php echo $index; ?>" id="sfsi_youtubeIcon_order">
                	<a href="#" title="YouTube" ><img src="<?php echo SFSI_PLUGURL; ?>images/youtube.png" alt="YouTube" /></a>
                </li>
          <?php break; ?>
          
          <?php case 'pinterest' :?>
          		<li class="pinterest_section " data-index="<?php echo $index; ?>" id="sfsi_pinterestIcon_order">
                	<a href="#" title="Pinterest" ><img src="<?php echo SFSI_PLUGURL; ?>images/pinterest.png" alt="Pinterest" /></a>
                </li>
          <?php break; ?>
                
          <?php case 'linkedin' :?>
          		<li class="linkedin_section " data-index="<?php echo $index; ?>" id="sfsi_linkedinIcon_order">
                	<a href="#" title="Linked In" ><img src="<?php echo SFSI_PLUGURL; ?>images/linked_in.png" alt="Linked In" /></a>
                </li>
          <?php break; ?>
          
          <?php case 'instagram' :?>
          		<li class="instagram_section " data-index="<?php echo $index; ?>" id="sfsi_instagramIcon_order">
                	<a href="#" title="Instagram" ><img src="<?php echo SFSI_PLUGURL; ?>images/instagram.png" alt="Instagram" /></a>
                </li>
          <?php break; ?>
          
          <?php default   :?>
          		<?php if(isset($icons[$icn['ele']]) && !empty($icons[$icn['ele']]) && filter_var($icons[$icn['ele']], FILTER_VALIDATE_URL) ): ?>
          		<li class="custom_iconOrder sfsiICON_<?php echo $icn['ele']; ?>" data-index="<?php echo $index; ?>" element-id="<?php echo $icn['ele']; ?>" >
                	<a href="#" title="Custom Icon" ><img src="<?php echo $icons[$icn['ele']]; ?>" alt="Linked In" class="sfcm" /></a>
                </li> 
                <?php endif; ?>
          <?php break; ?>
         <?php  endswitch; ?>   
    <?php endforeach; ?> 
     
    </ul> <!-- END icon drag drop section start here -->
    
        <span class="drag_drp">(Drag &amp; Drop)</span>
     <!-- icon's size and spacing section start here -->	
    <div class="row">
	<h4>Size &amp; spacing of your icons</h4>
	<div class="icons_size"><span>Size:</span><input name="sfsi_icons_size" value="<?php echo ($option5['sfsi_icons_size']!='') ?  $option5['sfsi_icons_size'] : '' ;?>" type="text" /><ins>pixels wide &amp; tall</ins> <span class="last">Spacing between icons:</span><input name="sfsi_icons_spacing" type="text" value="<?php echo ($option5['sfsi_icons_spacing']!='') ?  $option5['sfsi_icons_spacing'] : '' ;?>" /><ins>Pixels</ins></div>
    <div class="icons_prem_disc">
        <p class="sfsi_prem_plu_desc"><b>New: </b>The Premium Plugin also allows you to define the vertical distance between the icons (and set this differently for mobile vs. desktop): <a href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmi_settings_page&utm_campaign=more_spacings&utm_medium=banner" target="_blank">Check it out</a></p>
    </div>
    </div>
    
    <div class="row">
	<h4>Alignments</h4>
	<div class="icons_size">
		<div style="width: 210px;float: left;position: relative;">
			<span>Alignment of icons:</span>
			<ins class="sfsi_icons_other_allign" style="position: absolute;bottom: -22px;left: 0;width: 200px;color: rgb(128,136,145);">
				(with respect to each other)
			</ins>
		</div>
		<div class="field">
			<select name="sfsi_icons_Alignment" id="sfsi_icons_Alignment" class="styled">
				<option value="center" <?php echo ($option5['sfsi_icons_Alignment']=='center') ?  'selected="selected"' : '' ;?>>Centered</option>
				<option value="right" <?php echo ($option5['sfsi_icons_Alignment']=='right') ?  'selected="selected"' : '' ;?>>Right</option>
				<option value="left" <?php echo ($option5['sfsi_icons_Alignment']=='left') ?  'selected="selected"' : '' ;?>>Left</option>
			</select>
		</div>
		<span>Icons per row:</span>
		<input name="sfsi_icons_perRow" type="text" value="<?php echo ($option5['sfsi_icons_perRow']!='') ?  $option5['sfsi_icons_perRow'] : '' ;?>" />
		<ins class="leave_empty">Leave empty if you dont want to <br /> define this</ins>
	</div>

    <div class= "sfsi_new_prmium_follw" style="margin-top: 38px;">
		<p><b>New: </b>The Premium Plugin gives several more alignment options: <br>- &nbsp;&nbsp; Show icons vertically<br>- &nbsp;&nbsp; Align icons within a widget (left, right, centered)<br>- &nbsp;&nbsp; Align icons within the «container» where you place them via shortcode (left, right, centered) <br><a href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmi_settings_page&utm_campaign=more_alignment_options&utm_medium=banner" target="_blank">See all features</a></p>
	</div>
    </div>
    
    <div class="row new_wind">
	<h4>New window</h4>
	<div class="row_onl"><p>If user clicks on your icons, do you want to open the page in a new window?</p>
	<ul class="enough_waffling">
	    <li><input name="sfsi_icons_ClickPageOpen" <?php echo ($option5['sfsi_icons_ClickPageOpen']=='yes') ?  'checked="true"' : '' ;?> type="radio" value="yes" class="styled"  /><label>Yes</label></li>
	<li><input name="sfsi_icons_ClickPageOpen" <?php echo ($option5['sfsi_icons_ClickPageOpen']=='no') ?  'checked="true"' : '' ;?> type="radio" value="no" class="styled" /><label>No</label></li>
      </ul></div>
    </div>
   <!-- END icon's size and spacing section -->
   
     <!-- icon's floating and stick section start here -->	
    <div class="row sticking">
	<h4>Sticking &amp; floating</h4>
	<div class="space">
	<p class="list">Make icons float?</p>	
	<ul class="enough_waffling">
	    <li><input name="sfsi_icons_float" <?php echo ($option5['sfsi_icons_float']=='yes') ?  'checked="true"' : '' ;?>  type="radio" value="yes" class="styled"  /><label>Yes</label></li>
	    <li><input name="sfsi_icons_float" <?php echo ($option5['sfsi_icons_float']=='no') ?  'checked="true"' : '' ;?>  type="radio" value="no" class="styled" /><label>No</label></li>
	</ul>
      </div>
      <div class="clear float_options" <?php if($option5['sfsi_icons_stick']=='yes' || $option5['sfsi_icons_float']=='no') :?> style="display:none" <?php endif;?>>
	<div style="width: 100%; float: left;">
        <div class="float">Where shall they float?</div>
        <div class="field " >
            <select name="sfsi_icons_floatPosition" id="sfsi_icons_floatPosition" class="styled">
            <option value="top-left" <?php echo ($option5['sfsi_icons_floatPosition']=='top-left') ?  'selected="selected"' : '' ;?> >Top - Left</option>
            <option value="top-right" <?php echo ($option5['sfsi_icons_floatPosition']=='top-right') ?  'selected="selected"' : '' ;?> >Top - Right</option>
            <option value="center-left" <?php echo ($option5['sfsi_icons_floatPosition']=='center-left') ?  'selected="selected"' : '' ;?> >Center - Left</option>
            <option value="center-right" <?php echo ($option5['sfsi_icons_floatPosition']=='center-right') ?  'selected="selected"' : '' ;?> >Center - Right</option>
            <option value="bottom-left" <?php echo ($option5['sfsi_icons_floatPosition']=='bottom-left') ?  'selected="selected"' : '' ;?> >Bottom - Left</option>
            <option value="bottom-right" <?php echo ($option5['sfsi_icons_floatPosition']=='bottom-right') ?  'selected="selected"' : '' ;?> >Bottom - Right</option>
            </select>
        </div>
    </div>
    <div style="width: 88%; float: left; margin:25px 0 0 187px">
    	<h4>Margin From :</h4>
        <ul class="sfsi_floaticon_margin_sec">
        	<li>
            	<label>Top :</label>
                <input name="sfsi_icons_floatMargin_top" type="text" value="<?php echo ($option5['sfsi_icons_floatMargin_top']!='') ?  $option5['sfsi_icons_floatMargin_top'] : '' ;?>" /><ins>Pixels</ins>
            </li>
            <li>
            	<label>Bottom :</label>
                <input name="sfsi_icons_floatMargin_bottom" type="text" value="<?php echo ($option5['sfsi_icons_floatMargin_bottom'] != '') ?  $option5['sfsi_icons_floatMargin_bottom'] : '' ;?>" /><ins>Pixels</ins>
            </li>
            <li>
            	<label>Left :</label>
                <input name="sfsi_icons_floatMargin_left" type="text" value="<?php echo ($option5['sfsi_icons_floatMargin_left']!='') ?  $option5['sfsi_icons_floatMargin_left'] : '' ;?>" /><ins>Pixels</ins>
            </li>
            <li>
            	<label>Right :</label>
                <input name="sfsi_icons_floatMargin_right" type="text" value="<?php echo ($option5['sfsi_icons_floatMargin_right']!='') ?  $option5['sfsi_icons_floatMargin_right'] : '' ;?>" /><ins>Pixels</ins>
            </li>
        </ul>
    </div>
  
  </div> 
  
  <div class="space">
    <p class="list">Make icons stick?</p>	
    <ul class="enough_waffling">
  	<li><input name="sfsi_icons_stick" <?php echo ($option5['sfsi_icons_stick']=='yes') ?  'checked="true"' : '' ;?> type="radio" value="yes" class="styled"  /><label>Yes</label></li>
	<li><input name="sfsi_icons_stick" <?php echo ($option5['sfsi_icons_stick']=='no') ?  'checked="true"' : '' ;?>  type="radio" value="no" class="styled" /><label>No</label></li>
  </ul>

  </div>
  <!--disable float icons-->
  <div class="space disblfltonmbl">
    <p class="list">Disable float icons on mobile devices</p>	
    <ul class="enough_waffling">
    <li><input name="sfsi_disable_floaticons" <?php echo ($option5['sfsi_disable_floaticons']=='yes') ?  'checked="true"' : '' ;?> type="radio" value="yes" class="styled"  /><label>Yes</label></li>
	<li><input name="sfsi_disable_floaticons" <?php echo ($option5['sfsi_disable_floaticons']=='no') ?  'checked="true"' : '' ;?>  type="radio" value="no" class="styled" /><label>No</label></li>
  </ul>
  </div>
  <!--disable float icons-->
</div><!-- END icon's floating and stick section -->
 
 <!-- mouse over text section start here -->
 <div class="row mouse_txt">
    <h4>Mouseover text</h4>
	<p>
    	If you’ve given your icon only one function (i.e. no pop-up where user can perform different actions) then you can define 
here what text will be displayed if a user moves his mouse over the icon:
	</p>
	<div class="space">
		<div class="clear"></div>
		<div class="mouseover_field rss_section">
			<label>RSS:</label><input name="sfsi_rss_MouseOverText" value="<?php echo ($option5['sfsi_rss_MouseOverText']!='') ?  $option5['sfsi_rss_MouseOverText'] : '' ;?>" type="text" />
		</div>
		<div class="mouseover_field email_section">
			<label>Email:</label><input name="sfsi_email_MouseOverText" value="<?php echo ($option5['sfsi_email_MouseOverText']!='') ?  $option5['sfsi_email_MouseOverText'] : '' ;?>" type="text" />
		</div>
		
		<div class="clear">
		<div class="mouseover_field twitter_section">
			<label>Twitter:</label>
			<input name="sfsi_twitter_MouseOverText" value="<?php echo ($option5['sfsi_twitter_MouseOverText']!='') ?  $option5['sfsi_twitter_MouseOverText'] : '' ;?>" type="text" />
		</div>
		<div class="mouseover_field facebook_section">
			<label>Facebook:</label>
			<input name="sfsi_facebook_MouseOverText" value="<?php echo ($option5['sfsi_facebook_MouseOverText']!='') ?  $option5['sfsi_facebook_MouseOverText'] : '' ;?>" type="text" />
		</div>
		</div>
		<div class="clear">
		<div class="mouseover_field google_section">
			<label>Google:</label>
			<input name="sfsi_google_MouseOverText" value="<?php echo ($option5['sfsi_google_MouseOverText']!='') ?  $option5['sfsi_google_MouseOverText'] : '' ;?>"  type="text" />
		</div>
		<div class="mouseover_field linkedin_section">
			<label>LinkedIn:</label>
			<input name="sfsi_linkedIn_MouseOverText" value="<?php echo ($option5['sfsi_linkedIn_MouseOverText']!='') ?  $option5['sfsi_linkedIn_MouseOverText'] : '' ;?>"  type="text" />
		</div>
		</div>
		<div class="clear">
		<div class="mouseover_field pinterest_section">
			<label>Pinterest:</label>
			<input name="sfsi_pinterest_MouseOverText" value="<?php echo ($option5['sfsi_pinterest_MouseOverText']!='') ?  $option5['sfsi_pinterest_MouseOverText'] : '' ;?>" type="text" />
		</div>
		<div class="mouseover_field youtube_section">
			<label>Youtube:</label>
			<input name="sfsi_youtube_MouseOverText" value="<?php echo ($option5['sfsi_youtube_MouseOverText']!='') ?  $option5['sfsi_youtube_MouseOverText'] : '' ;?>" type="text" />
		</div>
		</div>
		<div class="clear">
		    <div class="mouseover_field instagram_section">
			<label>Instagram:</label>
			<input name="sfsi_instagram_MouseOverText" value="<?php echo ($option5['sfsi_instagram_MouseOverText']!='') ?  $option5['sfsi_instagram_MouseOverText'] : '' ;?>" type="text" />
		    </div>
		</div>
		<!--<div class="clear">
		<div class="mouseover_field share_section">
			<label>Share:</label>
			<input name="sfsi_share_MouseOverText" value="<?php //echo ($option5['sfsi_share_MouseOverText']!='') ?  $option5['sfsi_share_MouseOverText'] : '' ;?>" type="text" />
		</div>
		</div> -->
        <div class="clear"> </div>  
		<div class="custom_m">
        	<?php 
                $sfsiMouseOverTexts =  unserialize($option5['sfsi_custom_MouseOverTexts']);
                $count = 1; for($i=$first_key; $i <= $endkey; $i++) :
            ?>
            <?php if(!empty( $icons[$i])) : ?>
                
                <div class="mouseover_field custom_section sfsiICON_<?php echo $i; ?>">
                    <label>Custom <?php echo $count; ?>:</label>
                    <input name="sfsi_custom_MouseOverTexts[]" value="<?php echo (isset($sfsiMouseOverTexts[$i]) && $sfsiMouseOverTexts[$i]!='') ?sanitize_text_field($sfsiMouseOverTexts[$i]) : '' ;?>" type="text" file-id="<?php echo $i; ?>" />
                </div>
                  
                <?php if($count%2==0): ?>
                
                <div class="clear"> </div>  
            <?php endif; ?>
            <?php $count++; endif; endfor; ?>
		</div>
		
	</div>

	</div>
	<!-- END mouse over text section -->

    <!-- SAVE BUTTON SECTION   --> 
    <div class="save_button">
         <img src="<?php echo SFSI_PLUGURL ?>images/ajax-loader.gif" class="loader-img" />
         <?php  $nonce = wp_create_nonce("update_step5"); ?>
         <a href="javascript:;" id="sfsi_save5" title="Save" data-nonce="<?php echo $nonce;?>">Save</a>
    </div>
    <!-- END SAVE BUTTON SECTION   -->
    
    <a class="sfsiColbtn closeSec" href="javascript:;" >Collapse area</a>
    <label class="closeSec"></label>
        
    <!-- ERROR AND SUCCESS MESSAGE AREA-->
    <p class="red_txt errorMsg" style="display:none"> </p>
    <p class="green_txt sucMsg" style="display:none"> </p>
    <div class="clear"></div>
    
</div>
<!-- END Section 5 "Any other wishes for your main icons?"-->
