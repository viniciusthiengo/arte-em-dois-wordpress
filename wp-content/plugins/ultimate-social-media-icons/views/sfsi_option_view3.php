<?php
/* unserialize all saved option for second section options */
$option3 =  unserialize(get_option('sfsi_section3_options',false));

/*
 * Sanitize, escape and validate values
 */
$option3['sfsi_actvite_theme'] 			= (isset($option3['sfsi_actvite_theme'])) ? sanitize_text_field($option3['sfsi_actvite_theme']) : '';
$option3['sfsi_mouseOver'] 				= (isset($option3['sfsi_mouseOver'])) ? sanitize_text_field($option3['sfsi_mouseOver']) : '';
$option3['sfsi_mouseOver_effect'] 		= (isset($option3['sfsi_mouseOver_effect'])) ? sanitize_text_field($option3['sfsi_mouseOver_effect']) : '';
$option3['sfsi_shuffle_icons'] 			= (isset($option3['sfsi_shuffle_icons'])) ? sanitize_text_field($option3['sfsi_shuffle_icons']) : '';
$option3['sfsi_shuffle_Firstload'] 		= (isset($option3['sfsi_shuffle_Firstload'])) ? sanitize_text_field($option3['sfsi_shuffle_Firstload']) : '';
$option3['sfsi_shuffle_interval'] 		= (isset($option3['sfsi_shuffle_interval'])) ? sanitize_text_field($option3['sfsi_shuffle_interval']) : '';
$option3['sfsi_shuffle_intervalTime'] 	= (isset($option3['sfsi_shuffle_intervalTime'])) ? intval($option3['sfsi_shuffle_intervalTime']) : '';

?>

<!-- Section 3 "What design & animation do you want to give your icons?" main div Start -->
<div class="tab3">
	<p>
    	A good & well-fitting design is not only nice to look at, but it increases chances that people will subscribe and/or share your site with friends:
    </p>

	<ul class="tab_3_list">
        <li>It comes across as <span>more professional</span> and gives your site <span>more “credit”</span></li>
        <li>A smart automatic animation can <span>make your visitors aware of your icons</span> in an unintrusive manner</li> 
	</ul>
    
    <p style="padding:0px;">
    	The icons have been compressed by <a href="https://goo.gl/IV5Q3z" target="_blank">Shortpixel.com</a> for faster loading of your site. Thank you Shortpixel!
    </p>	

    <div class="row">
    	<h3>Theme options</h3>
        
        <!--icon themes section start -->
        <ul class="tab_3_icns">
        	<li><input name="sfsi_actvite_theme" <?php echo ( $option3['sfsi_actvite_theme']=='default') ?  'checked="true"' : '' ;?> type="radio" value="default" class="styled"  /><label>Default</label><div class="icns_tab_3"><span class="row_1_1 rss_section"></span><span class="row_1_2 email_section"></span><span class="row_1_3 facebook_section"></span><span class="row_1_4 google_section"></span><span class="row_1_5 twitter_section"></span><span class="row_1_6 share_section"></span><span class="row_1_7 youtube_section"></span><span class="row_1_8 pinterest_section"></span><span class="row_1_9 linkedin_section"></span> <span class="row_1_10 instagram_section"></span><!--<span class="row_1_11 sf_section"></span>--></div></li>
            
            <li><input name="sfsi_actvite_theme" <?php echo ( $option3['sfsi_actvite_theme']=='flat') ?  'checked="true"' : '' ;?>  type="radio" value="flat" class="styled" /><label>Flat</label><div class="icns_tab_3"><span class="row_2_1 rss_section"></span><span class="row_2_2 email_section"></span><span class="row_2_3 facebook_section"></span><span class="row_2_4 google_section"></span><span class="row_2_5 twitter_section"></span><span class="row_2_6 share_section"></span><span class="row_2_7 youtube_section"></span><span class="row_2_8 pinterest_section"></span><span class="row_2_9 linkedin_section"></span><span class="row_2_10 instagram_section"></span><!--<span class="row_2_11 sf_section"></span>--></div></li>
            
            <li><input name="sfsi_actvite_theme" <?php echo ( $option3['sfsi_actvite_theme']=='thin') ?  'checked="true"' : '' ;?>  type="radio" value="thin" class="styled"  /><label>Thin</label><div class="icns_tab_3"><span class="row_3_1 rss_section"></span><span class="row_3_2 email_section"></span><span class="row_3_3 facebook_section"></span><span class="row_3_4 google_section"></span><span class="row_3_5 twitter_section"></span><span class="row_3_6 share_section"></span><span class="row_3_7 youtube_section"></span><span class="row_3_8 pinterest_section"></span><span class="row_3_9 linkedin_section"></span><span class="row_3_10 instagram_section"></span><!--<span class="row_3_11 sf_section"></span>--></div></li>
            
            <li><input name="sfsi_actvite_theme" <?php echo ( $option3['sfsi_actvite_theme']=='cute') ?  'checked="true"' : '' ;?> type="radio" value="cute" class="styled" /><label>Cute</label><div class="icns_tab_3"><span class="row_4_1 rss_section"></span><span class="row_4_2 email_section"></span><span class="row_4_3 facebook_section"></span><span class="row_4_4 google_section"></span><span class="row_4_5  twitter_section"></span><span class="row_4_6 share_section"></span><span class="row_4_7 youtube_section"></span><span class="row_4_8 pinterest_section"></span><span class="row_4_9 linkedin_section"></span><span class="row_4_10 instagram_section"></span><!--<span class="row_4_11 sf_section"></span>--></div></li>
                
         	<!--------------------start next four------------------------>
            <li><input name="sfsi_actvite_theme" <?php echo ( $option3['sfsi_actvite_theme']=='cubes') ?  'checked="true"' : '' ;?> type="radio" value="cubes" class="styled"  /><label>Cubes</label><div class="icns_tab_3"><span class="row_5_1 rss_section"></span><span class="row_5_2 email_section"></span><span class="row_5_3 facebook_section"></span><span class="row_5_4 google_section"></span><span class="row_5_5 twitter_section"></span><span class="row_5_6 share_section"></span><span class="row_5_7 youtube_section"></span><span class="row_5_8 pinterest_section"></span><span class="row_5_9 linkedin_section"></span><span class="row_5_10 instagram_section"></span><!--<span class="row_5_11 sf_section"></span>--></div></li>
            
            <li><input name="sfsi_actvite_theme" <?php echo ( $option3['sfsi_actvite_theme']=='chrome_blue') ?  'checked="true"' : '' ;?>  type="radio" value="chrome_blue" class="styled" /><label>Chrome Blue</label><div class="icns_tab_3"><span class="row_6_1 rss_section"></span><span class="row_6_2 email_section"></span><span class="row_6_3 facebook_section"></span><span class="row_6_4 google_section"></span><span class="row_6_5 twitter_section"></span><span class="row_6_6 share_section"></span><span class="row_6_7 youtube_section"></span><span class="row_6_8 pinterest_section"></span><span class="row_6_9 linkedin_section"></span><span class="row_6_10 instagram_section"></span><!--<span class="row_6_11 sf_section"></span>--></div></li>
            
            <li><input name="sfsi_actvite_theme" <?php echo ( $option3['sfsi_actvite_theme']=='chrome_grey') ?  'checked="true"' : '' ;?>  type="radio" value="chrome_grey" class="styled"  /><label>Chrome Grey</label><div class="icns_tab_3"><span class="row_7_1 rss_section"></span><span class="row_7_2 email_section"></span><span class="row_7_3 facebook_section"></span><span class="row_7_4 google_section"></span><span class="row_7_5 twitter_section"></span><span class="row_7_6 share_section"></span><span class="row_7_7 youtube_section"></span><span class="row_7_8 pinterest_section"></span><span class="row_7_9 linkedin_section"></span><span class="row_7_10 instagram_section"></span><!--<span class="row_7_11 sf_section"></span>--></div></li>
            
            <li><input name="sfsi_actvite_theme" <?php echo ( $option3['sfsi_actvite_theme']=='splash') ?  'checked="true"' : '' ;?> type="radio" value="splash" class="styled" /><label>Splash</label><div class="icns_tab_3"><span class="row_8_1 rss_section"></span><span class="row_8_2 email_section"></span><span class="row_8_3 facebook_section"></span><span class="row_8_4 google_section"></span><span class="row_8_5  twitter_section"></span><span class="row_8_6 share_section"></span><span class="row_8_7 youtube_section"></span><span class="row_8_8 pinterest_section"></span><span class="row_8_9 linkedin_section"></span><span class="row_8_10 instagram_section"></span><!--<span class="row_8_11 sf_section"></span>--></div></li>
            
            <!--------------------start second four------------------------>
            <li><input name="sfsi_actvite_theme" <?php echo ( $option3['sfsi_actvite_theme']=='orange') ?  'checked="true"' : '' ;?> type="radio" value="orange" class="styled"  /><label>Orange</label><div class="icns_tab_3"><span class="row_9_1 rss_section"></span><span class="row_9_2 email_section"></span><span class="row_9_3 facebook_section"></span><span class="row_9_4 google_section"></span><span class="row_9_5 twitter_section"></span><span class="row_9_6 share_section"></span><span class="row_9_7 youtube_section"></span><span class="row_9_8 pinterest_section"></span><span class="row_9_9 linkedin_section"></span><span class="row_9_10 instagram_section"></span><!--<span class="row_9_11 sf_section"></span>--></div></li>
            
            <li><input name="sfsi_actvite_theme" <?php echo ( $option3['sfsi_actvite_theme']=='crystal') ?  'checked="true"' : '' ;?>  type="radio" value="crystal" class="styled" /><label>Crystal</label><div class="icns_tab_3"><span class="row_10_1 rss_section"></span><span class="row_10_2 email_section"></span><span class="row_10_3 facebook_section"></span><span class="row_10_4 google_section"></span><span class="row_10_5 twitter_section"></span><span class="row_10_6 share_section"></span><span class="row_10_7 youtube_section"></span><span class="row_10_8 pinterest_section"></span><span class="row_10_9 linkedin_section"></span><span class="row_10_10 instagram_section"></span><!--<span class="row_10_11 sf_section"></span>--></div></li>
            
            <li><input name="sfsi_actvite_theme" <?php echo ( $option3['sfsi_actvite_theme']=='glossy') ?  'checked="true"' : '' ;?>  type="radio" value="glossy" class="styled"  /><label>Glossy</label><div class="icns_tab_3"><span class="row_11_1 rss_section"></span><span class="row_11_2 email_section"></span><span class="row_11_3 facebook_section"></span><span class="row_11_4 google_section"></span><span class="row_11_5 twitter_section"></span><span class="row_11_6 share_section"></span><span class="row_11_7 youtube_section"></span><span class="row_11_8 pinterest_section"></span><span class="row_11_9 linkedin_section"></span><span class="row_11_10 instagram_section"></span><!--<span class="row_11_11 sf_section"></span>--></div></li>
            
            <li><input name="sfsi_actvite_theme" <?php echo ( $option3['sfsi_actvite_theme']=='black') ?  'checked="true"' : '' ;?> type="radio" value="black" class="styled" /><label>Black</label><div class="icns_tab_3"><span class="row_12_1 rss_section"></span><span class="row_12_2 email_section"></span><span class="row_12_3 facebook_section"></span><span class="row_12_4 google_section"></span><span class="row_12_5  twitter_section"></span><span class="row_12_6 share_section"></span><span class="row_12_7 youtube_section"></span><span class="row_12_8 pinterest_section"></span><span class="row_12_9 linkedin_section"></span><span class="row_12_10 instagram_section"></span><!--<span class="row_12_11 sf_section"></span>--></div></li>
            
            <!--------------------start last four------------------------>
            <li><input name="sfsi_actvite_theme" <?php echo ( $option3['sfsi_actvite_theme']=='silver') ?  'checked="true"' : '' ;?> type="radio" value="silver" class="styled"  /><label>Silver</label><div class="icns_tab_3"><span class="row_13_1 rss_section"></span><span class="row_13_2 email_section"></span><span class="row_13_3 facebook_section"></span><span class="row_13_4 google_section"></span><span class="row_13_5 twitter_section"></span><span class="row_13_6 share_section"></span><span class="row_13_7 youtube_section"></span><span class="row_13_8 pinterest_section"></span><span class="row_13_9 linkedin_section"></span><span class="row_13_10 instagram_section"></span><!--<span class="row_13_11 sf_section"></span>--></div></li>
            
            <li><input name="sfsi_actvite_theme" <?php echo ( $option3['sfsi_actvite_theme']=='shaded_dark') ?  'checked="true"' : '' ;?>  type="radio" value="shaded_dark" class="styled" /><label>Shaded Dark</label><div class="icns_tab_3"><span class="row_14_1 rss_section"></span><span class="row_14_2 email_section"></span><span class="row_14_3 facebook_section"></span><span class="row_14_4 google_section"></span><span class="row_14_5 twitter_section"></span><span class="row_14_6 share_section"></span><span class="row_14_7 youtube_section"></span><span class="row_14_8 pinterest_section"></span><span class="row_14_9 linkedin_section"></span><span class="row_14_10 instagram_section"></span><!--<span class="row_14_11 sf_section"></span>--></div></li>
            
            <li><input name="sfsi_actvite_theme" <?php echo ( $option3['sfsi_actvite_theme']=='shaded_light') ?  'checked="true"' : '' ;?>  type="radio" value="shaded_light" class="styled"  /><label>Shaded Light</label><div class="icns_tab_3"><span class="row_15_1 rss_section"></span><span class="row_15_2 email_section"></span><span class="row_15_3 facebook_section"></span><span class="row_15_4 google_section"></span><span class="row_15_5 twitter_section"></span><span class="row_15_6 share_section"></span><span class="row_15_7 youtube_section"></span><span class="row_15_8 pinterest_section"></span><span class="row_15_9 linkedin_section"></span><span class="row_15_10 instagram_section"></span><!--<span class="row_15_11 sf_section"></span>--></div></li>
            
            <li><input name="sfsi_actvite_theme" <?php echo ( $option3['sfsi_actvite_theme']=='transparent') ?  'checked="true"' : '' ;?> type="radio" value="transparent" class="styled" /><label style="line-height:20px !important;margin-top:15px;  ">Transparent <br/><span style="font-size: 9px;" >(for dark backgrounds)</span></label> <div class="icns_tab_3 trans_bg" style="padding-left: 6px;"><span class="row_16_1 rss_section"></span><span class="row_16_2 email_section"></span><span class="row_16_3 facebook_section"></span><span class="row_16_4 google_section"></span><span class="row_16_5  twitter_section"></span><span class="row_16_6 share_section"></span><span class="row_16_7 youtube_section"></span><span class="row_16_8 pinterest_section"></span><span class="row_16_9 linkedin_section"></span><span class="row_16_10 instagram_section"></span><!--<span class="row_16_11 sf_section"></span>--></div></li>
            
            <!--Custom Icon Support {Monad}-->
            
            
            <li class="cstomskins_upload">
            	<input name="sfsi_actvite_theme" <?php echo ( $option3['sfsi_actvite_theme']=='custom_support') ?  'checked="true"' : '' ;?> type="radio" value="custom_support" class="styled" />
                <label style="line-height:20px !important;margin-top:15px;  ">Custom Icons <br/></label>
                <div class="icns_tab_3" style="padding-left: 6px;">
					<?php
                         if(get_option("rss_skin"))
                         {
                            $icon = get_option("rss_skin");
                            echo '<span class="row_17_1 rss_section sfsi-bgimage" style="background: url('.$icon.') no-repeat;"></span>';
                         }
						 else
                         {
                             echo '<span class="row_17_1 rss_section" style="background-position:-1px 0;"></span>';
                         }
                         
                         if(get_option("email_skin"))
                         {
                            $icon = get_option("email_skin");
                            echo '<span class="row_17_2 email_section sfsi-bgimage" style="background: url('.$icon.') no-repeat;"></span>';
                         }
						 else
                         {
                             echo '<span class="row_17_2 email_section" style="background-position:-58px 0;"></span>';
                         }
                         
                         if(get_option("facebook_skin"))
                         {
                            $icon = get_option("facebook_skin");
                            echo '<span class="row_17_3 facebook_section sfsi-bgimage" style="background: url('.$icon.') no-repeat;"></span>';
                         }
						 else
                         {
                             echo '<span class="row_17_3 facebook_section" style="background-position:-118px 0;"></span>';
                         }
                         
                         if(get_option("google_skin"))
                         {
                            $icon = get_option("google_skin");
                            echo '<span class="row_17_4 google_section sfsi-bgimage" style="background: url('.$icon.') no-repeat;"></span>';
                         }
						 else
                         {
                             echo '<span class="row_17_4 google_section" style="background-position:-176px 0;"></span>';
                         }
                         
                         if(get_option("twitter_skin"))
                         {
                            $icon = get_option("twitter_skin");
                            echo '<span class="row_17_5 twitter_section sfsi-bgimage" style="background: url('.$icon.') no-repeat;"></span>';
                         }
						 else
                         {
                             echo '<span class="row_17_5 twitter_section" style="background-position:-235px 0;"></span>';
                         }
                         
                         if(get_option("share_skin"))
                         {
                            $icon = get_option("share_skin");
                            echo '<span class="row_17_6 share_section sfsi-bgimage" style="background: url('.$icon.') no-repeat;"></span>';
                         }
						 else
                         {
                             echo '<span class="row_17_6 share_section" style="background-position:-293px 0;"></span>';
                         }
                         
                         if(get_option("youtube_skin"))
                         {
                            $icon = get_option("youtube_skin");
                            echo '<span class="row_17_7 youtube_section sfsi-bgimage" style="background: url('.$icon.') no-repeat;"></span>';
                         }
						 else
                         {
                             echo '<span class="row_17_7 youtube_section" style="background-position:-350px 0;"></span>';
                         }
                         
                         if(get_option("pintrest_skin"))
                         {
                            $icon = get_option("pintrest_skin");
                            echo '<span class="row_17_8 pinterest_section sfsi-bgimage" style="background: url('.$icon.') no-repeat;"></span>';
                         }
						 else
                         {
                             echo '<span class="row_17_8 pinterest_section" style="background-position:-409px 0;"></span>';
                         }
                         
                         if(get_option("linkedin_skin"))
                         {
                            $icon = get_option("linkedin_skin");
                            echo '<span class="row_17_9 linkedin_section sfsi-bgimage" style="background: url('.$icon.') no-repeat;"></span>';
                         }
						 else
                         {
                             echo '<span class="row_17_9 linkedin_section" style="background-position:-467px 0;"></span>';
                         }
                         
                         if(get_option("instagram_skin"))
                         {
                            $icon = get_option("instagram_skin");
                            echo '<span class="row_17_10 instagram_section sfsi-bgimage" style="background: url('.$icon.') no-repeat;"></span>';
                         }
						 else
                         {
                             echo '<span class="row_17_10 instagram_section" style="background-position:-526px 0;"></span>';
                         }
                     ?>
                </div>
           	</li>
           	<li>
			<div class="sf_si_our_prmium_plugin-add">
			    <div class="sf_si_prmium_head"><h2>New: <span>In our Premium Plugin we added:</span></h2></div>
			    <div class="sf_si_default_design">
					<ul>
                         <li>
                             <h4>A) More default design styles</h4>
                            </li>
                         <li>
                                <div class="sfsi_row_table">
                                    <div class="sfsi_first_icon_field sfsi_cool_font_weight">
                                     <h2>Cool style</h2>  
                                    </div>
                                    <div class="sfsi_second_icon_img">
                                        <img src="<?php  echo SFSI_PLUGURL; ?>images/sfsi_cool_icon_spread.png" />
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="sfsi_row_table">
                                    <div class="sfsi_first_icon_field sfsi_cool_font_weight">
                                        <h2>Waxed Wood</h2>
                                    </div>
                                    <div class="sfsi_second_icon_img">
                                        <img src="<?php  echo SFSI_PLUGURL; ?>images/sfsi_vaxwoodi_icon_spread.png" />
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="sfsi_row_table">
                                    <div class="sfsi_first_icon_field sfsi_cool_font_weight">
                                        <h2>Black Grunge</h2>
                                    </div>
                                    <div class="sfsi_second_icon_img">
                                        <img src="<?php  echo SFSI_PLUGURL; ?>images/sfsi_black_icon_spread.png" />
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="sfsi_row_table">
                                    <div class="sfsi_first_icon_more">
                                        <h2>(and many more)</h2>
                                    </div>
                                </div>
                            </li>
                         <li>
                             <h4 class="sfsi_second_themedTitle">B) Themed styles<span> (to match the content of your site)</span></h4>
                            </li>
                         <li>
                                <div class="sfsi_row_table">
                                    <div class="sfsi_first_icon_field">
                                        <h2>Lovehearts</h2>
                                        <p>(e.g. for girly sites or just sites with a heart)</p>
                                    </div>
                                    <div class="sfsi_second_icon_img">
                                        <img src="<?php  echo SFSI_PLUGURL; ?>images/sfsi_loveheart_icon_spread.png" />
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="sfsi_row_table">
                                    <div class="sfsi_first_icon_field">
                                        <h2>Computers</h2>
                                        <p>(e.g. for IT/tech sites)</p>
                                    </div>
                                    <div class="sfsi_second_icon_img">
                                        <img src="<?php  echo SFSI_PLUGURL; ?>images/sfsi_computer_icon_spread.png" />
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="sfsi_row_table">
                                    <div class="sfsi_first_icon_field">
                                        <h2>Dogs</h2>
                                        <p>(e.g. for dog/pet sites)</p>
                                    </div>
                                    <div class="sfsi_second_icon_img">
                                        <img src="<?php  echo SFSI_PLUGURL; ?>images/sfsi_dogi_icon_spread.png" />
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="sfsi_row_table">
                                    <div class="sfsi_first_icon_more">
                                        <h2>(and many more)</h2>
                                    </div>
                                </div>
                            </li>
                    </ul>
			    </div>
				<div class="sf_si_all_features_premium">
					<a  href="https://www.ultimatelysocial.com/usm-premium/?utm_source=usmi_settings_page&utm_campaign=more_icons_designs&utm_medium=banner" target="_blank">See all features Premium Plugin</a>
				</div>
		    </div>
            </li>
           	<li>
            	<p style="font-weight: bold; margin: 12px 0 0;">
                	Are you an icon designer? 
                	<a href="mailto:biz@ultimatelysocial.com" style="color:#8E81BD; text-decoration:none;">
                    	Contact us
                	</a>
                	to offer your icons here and get a free link (& traffic) back to your site!
            	</p>
            </li>
            
		</ul>
		<!--icon themes section start -->
      
		<!--icon Animation section start -->
		<div class="sub_row stand sec_new" style="margin-left: 0px;">
			<h3>Animate them</h3>
			<p class="radio_section tab_3_option">
        		<input name="sfsi_mouseOver" <?php echo ( $option3['sfsi_mouseOver']=='yes') ?  'checked="true"' : '' ;?>  type="checkbox" value="yes" class="styled"  />
            	<label>Mouse-Over effects</label>
            
                <div class="drop_lsts">
                    <select name="sfsi_mouseOver_effect"  id="sfsi_mouseOver_effect" class="styled">
                        <option value="fade_in" <?php echo ( $option3['sfsi_mouseOver_effect']=='fade_in') ? 'selected="true"' :'' ;?>>Fade In</option>
                        <option value="scale" <?php echo ( $option3['sfsi_mouseOver_effect']=='scale') ?  'selected="true"' : '' ;?>>Scale</option>
                        <option value="combo" <?php echo ( $option3['sfsi_mouseOver_effect']=='combo') ?  'selected="true"' : '' ;?>>Combo</option>
                    </select>
                </div>
            </p>
            <div class="Shuffle_auto"><p class="radio_section tab_3_option">
                <input name="sfsi_shuffle_icons" <?php echo ( $option3['sfsi_shuffle_icons']=='yes') ?  'checked="true"' : '' ;?>  type="checkbox" value="yes" class="styled"  />
                <label>Shuffle them automatically</label>
                <div class="sub_sub_box shuffle_sub"  >
                    <p class="radio_section tab_3_option">
                        <input name="sfsi_shuffle_Firstload" <?php echo ( $option3['sfsi_shuffle_Firstload']=='yes') ?  'checked="true"' : '' ;?>  type="checkbox" value="yes" class="styled"  />
                        <label>When site is first loaded</label>
                    </p>
                    <p class="radio_section tab_3_option">
                        <input name="sfsi_shuffle_interval" <?php echo ( $option3['sfsi_shuffle_interval']=='yes') ?  'checked="true"' : '' ;?>  type="checkbox" value="yes" class="styled"  />
                        <label>Every</label>
                        <input class="smal_inpt" type="text" name="sfsi_shuffle_intervalTime" value="<?php echo ( $option3['sfsi_shuffle_intervalTime']!='') ?   $option3['sfsi_shuffle_intervalTime'] : '' ;?>"><label>seconds</label>
                    </p>
                </div>
    	   	</div>
		</div>
        <!--END icon Animation section   start -->
    </div>
    
	<!-- SAVE BUTTON SECTION   --> 
	<div class="save_button tab_3_sav">
	     <img src="<?php echo SFSI_PLUGURL ?>images/ajax-loader.gif" class="loader-img" />
         <?php  $nonce = wp_create_nonce("update_step3"); ?>
	     <a href="javascript:;" id="sfsi_save3" title="Save" data-nonce="<?php echo $nonce;?>">Save</a>
	</div>
    <!-- END SAVE BUTTON SECTION   --> 
	
    <a class="sfsiColbtn closeSec" href="javascript:;">Collapse area</a>
	<label class="closeSec"></label>
	
    <!-- ERROR AND SUCCESS MESSAGE AREA-->
	<p class="red_txt errorMsg" style="display:none"> </p>
	<p class="green_txt sucMsg" style="display:none"> </p>

</div>
<!-- END Section 3 "What design & animation do you want to give your icons?" main div  -->
