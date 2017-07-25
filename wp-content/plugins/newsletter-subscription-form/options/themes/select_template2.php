<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
	$wl_nls_options = get_option('weblizar_nls_options');
?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<link rel="stylesheet" href="<?php echo plugin_dir_url( __FILE__ ).'../css/font-awesome.min.css'; ?>" />
	<link rel="stylesheet" href="<?php echo plugin_dir_url( __FILE__ ).'css/style-2.css'?>" type="text/css" />
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=<?php echo $wl_nls_options['theme_font_family']; ?>">
<?php require_once( 'css/custom-css-2.php'); ?>	
<?php 
require_once('form-include/subscriber-from-settings.php');
$r_code	= rand(0,1000);
//$widget_nlf_form = $widget_nlf_form_widget['4']['subscribe_select'];
?>
<div id="newsletter_form2" class="newsletter-api-form-theme2">
<div class="newsletter_form2_com_news">	
	<section class="row space newsletter_form2_c_get">
			<h2 class="newsletter_form2_section-heading wow flipInX"><?php echo $wl_nls_options['subscriber_form_title'];?></h2>			
			<?php if ($wl_nls_options['subscriber_form_icon'] == null) { ?><span class="newsletter_form2_section-icon wow rubberBand"> <span class="<?php echo $wl_nls_options['subscriber_form_icon'];?> newsletter_form2_icon"></span> </span>
			<?php } else { ?>
			<span class="newsletter_form2_section-icon wow rubberBand">..........   <span class="<?php echo $wl_nls_options['subscriber_form_icon'];?> newsletter_form2_icon"></span>   ..........</span>
			<?php } ?>
			<h3 class="newsletter_form2_section-sub_heading" data-sr="enter top"><?php echo $wl_nls_options['subscriber_form_sub_title'];?></h3>
			<p class="newsletter_form2_section-description">
			<?php print(nls_truncateString($wl_nls_options['subscriber_form_message'], 300, true));?>
	</section>
	<section class="row space newsletter_form2_c_get_detail">
		<?php if ($wl_nls_options['subscribe_select']=='wp_mail'){ ?>
				<script>
					function validateForm21_<?php echo $r_code;?>() {
						var x = document.forms["subscriber-form_<?php echo $r_code;?>"]["subscribe_email"].value;
						var atpos = x.indexOf("@");
						var dotpos = x.lastIndexOf(".");
						var error_msg = ".sub_error_msg_<?php echo $r_code;?>";
						if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
							jQuery(error_msg).show();
							jQuery(error_msg).fadeOut(3000);
							return false;
						}
					}
				</script>
				<div id="error_email2" class="validation_error error_email"></div>
				<form method="post" action="" onsubmit="return validateForm21_<?php echo $r_code;?>()" class="subscriber-form" name="subscriber-form_<?php echo $r_code;?>">
					<div class="form-group" data-sr="enter bottom over 1s and move 110px wait 0.5s">	
						<?php if($wl_nls_options['subscriber_form']=='on') { ?>
						<div class="col-md-12 form-group">
							<input type="text" name="f_name"  class="form-control wow slideInUp" placeholder="<?php if ($wl_nls_options['sub_form_button_f_name']){ echo $wl_nls_options['sub_form_button_f_name'];} else {echo "Enter First Name";}?>" required='required'>
						</div>
						<div class="col-md-12 form-group">
							<input type="text" name="l_name"  class="form-control wow slideInUp " placeholder="<?php if ($wl_nls_options['sub_form_button_l_name']){ echo $wl_nls_options['sub_form_button_l_name'];}else {echo "Enter Last Name";}?>" required='required'>
						</div>
						<?php } ?>
						<div class="col-md-12 form-group">
							<input type="email" name="subscribe_email" id="edmm-sub-email2" class="form-control wow slideInUp subscribe-input-layout1 s2email" placeholder="<?php echo $wl_nls_options['sub_form_subscribe_title'];?>">						
							<span class="sub_error_msg_<?php echo $r_code;?>" style="display:none; color:red;"><span style="color:red; font-size: 14px;"></br>*</span><?php _e("Invalid email address.","weblizar"); ?></span>
						</div>
						<?php /**
								* Creating a nonce field
								**/
									 wp_nonce_field( 'subscriber-nonce', 'subscriber_nonce_field' ); ?>
						
						<div class="col-md-12">					
							<button name="submit_subscriber" class="btn wow slideInUp subscriber_submit sub-submit" type="submit"><?php echo $wl_nls_options['sub_form_button_text'];?></button>
						</div>
					</div>
				</form>
				<div class="newsletter_form2_subscribe-message1">	
					<?php
					// Session messages	
					if(isset($_SESSION['mail_sent'])){
			echo '<div style="position:fixed;z-index:99999;background-color:rgba(0,0,0,0.6);top:0;bottom:0;   left:0;right:0;display:none;" class="main_div"><p style="border:#fff solid 2px;border-radius:15px; box-shadow: 1px 1px 10px #fff;  color:#fff; left:40%; position: absolute;top: 40%;background:#000;padding:40px;font-size:20px;
display:none;" class="subscribe-messages">'.$_SESSION['mail_sent'].'</p></div>';
			unset($_SESSION['mail_sent']);
		}
		if(isset($_SESSION['mail_sent_msg'])){
			echo '<div style="position:fixed;z-index:99999;background-color:rgba(0,0,0,0.6);top:0;bottom:0;   left:0;right:0;display:none;" class="main_div"><p style="border:#fff solid 2px;border-radius:15px; box-shadow: 1px 1px 10px #fff;  color:#fff; left:40%; position: absolute;top: 40%;background:#000;padding:40px;font-size:20px;
display:none;" class="subscribe-messages">'.$_SESSION['mail_sent_msg'].'</p></div>';
			unset($_SESSION['mail_sent_msg']);
		}
		if(isset($_SESSION['subscribe_msg'])){
			echo '<div style="position:fixed;z-index:99999;background-color:rgba(0,0,0,0.6);top:0;bottom:0;   left:0;right:0;display:none;" class="main_div"><p style="border:#fff solid 2px;border-radius:15px; box-shadow: 1px 1px 10px #fff;  color:#fff; left:40%; position: absolute;top: 40%;background:#000;padding:40px;font-size:20px;
display:none;" class="subscribe-messages">'.$_SESSION['subscribe_msg'].'</p></div>';
			unset($_SESSION['subscribe_msg']);
		}		
					// subscription activate logic
					if(isset($_GET['act_code']) && $_GET['email']){
						$act_code = $_GET['act_code'];
						$email = $_GET['email'];
						//search & match the email & activation code
						global $wpdb;
						$table_name = $wpdb->prefix . 'nls_subscribers';
						$user_search_result = $wpdb->get_row("SELECT * FROM `$table_name` WHERE `email` LIKE '$email' AND `act_code` LIKE '$act_code'");
						if(count($user_search_result)) {
							// check user is already subscribed	
							if($user_search_result->flag == 1) {
									echo "<h4 class='alert alert-info'>".$wl_nls_options['sub_form_subscribe_already_confirm_message']."</h4>";
							} else {
								// update user subscription active
								if($wpdb->query("UPDATE `$table_name` SET `flag` = '1' WHERE `email` = '$email'")) {
									echo "<h4 class='alert alert-info'>".$wl_nls_options['sub_form_subscribe_confirm_success_message']."</h4>";
								}
							}
						} else {
							echo "<h4 class='alert alert-info'>".$wl_nls_options['sub_form_invalid_confirmation_message']."</h4>";
						}						
					} ?>				
				</div> 
			<script>
			jQuery('.newsletter_form2_subscribe-message1 .subscribe-messages').show();
			jQuery('.newsletter_form2_subscribe-message1 .main_div').show();
			jQuery('.newsletter_form2_subscribe-message1 .main_div').fadeOut(4000);
			jQuery('.newsletter_form2_subscribe-message1 .subscribe-messages').fadeOut(3000);
			</script>
				<?php } ?>
			
			<?php if($wl_nls_options['subscribe_select']=='madmimi' || $wl_nls_options['subscribe_select']=='mailchimp') { ?>
			<script>
				function validateForm22_<?php echo $r_code;?>() {
					var x = document.forms["php_subscriber-form_<?php echo $r_code;?>"]["subscribe_email"].value;
					var atpos = x.indexOf("@");
					var dotpos = x.lastIndexOf(".");
					var error_msg = ".sub1_error_msg_<?php echo $r_code;?>";
					if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
						jQuery(error_msg).show();
						jQuery(error_msg).fadeOut(3000);
						return false;
					}
				}
			</script>
		<div id="error_email2" class="validation_error error_email"></div>			
			<form method="post" action="" onsubmit="return validateForm22_<?php echo $r_code;?>()" class="php_subscriber-form" name="php_subscriber-form_<?php echo $r_code;?>">
				<div class="form-group" data-sr="enter bottom over 1s and move 110px wait 0.5s">					
					<?php if($wl_nls_options['subscriber_form']=='on') { ?>
					<div class="col-md-12 form-group">
						<input type="text" name="f_name"  class="form-control wow slideInUp" placeholder="<?php if ($wl_nls_options['sub_form_button_f_name']){ echo $wl_nls_options['sub_form_button_f_name'];} else {echo "Enter First Name";}?>" required='required'>
					</div>
					<div class="col-md-12 form-group">
						<input type="text" name="l_name"  class="form-control wow slideInUp " placeholder="<?php if ($wl_nls_options['sub_form_button_l_name']){ echo $wl_nls_options['sub_form_button_l_name'];}else {echo "Enter Last Name";}?>" required='required'>
					</div>
					<?php } ?>
					<div class="col-md-12 form-group">
						<input type="email" name="subscribe_email" id="edmm-sub-email2" class="form-control wow slideInUp subscribe-input-layout1 s2email" placeholder="<?php echo $wl_nls_options['sub_form_subscribe_title'];?>">
						<span class="sub1_error_msg_<?php echo $r_code;?>" style="display:none; color:red;"><span style="color:red; font-size: 14px;"></br>*</span><?php _e("Invalid email address.","weblizar"); ?></span>
					</div>
					<div class="col-md-12">					
						<button name="php_submit_subscriber" class="btn wow slideInUp subscriber_submit sub-submit" type="submit"><?php echo $wl_nls_options['sub_form_button_text'];?></button>
					</div>	
				</div>
			</form>
			<div class="newsletter_form2_subscribe-message2">	
			<?php
			// Session messages	
			if(isset($_SESSION['mail_sent'])){
			echo '<div style="position:fixed;z-index:99999;background-color:rgba(0,0,0,0.6);top:0;bottom:0;   left:0;right:0;display:none;" class="main_div"><p style="border:#fff solid 2px; border-radius:15px; box-shadow: 1px 1px 10px #fff; color:#fff; left: 40%;position: absolute;top: 40%;background:#000;padding:40px;font-size:20px;
display:none;" class="subscribe-messages">'.$_SESSION['mail_sent'].'</p></div>';
			unset($_SESSION['mail_sent']);
		}
		if(isset($_SESSION['mail_sent_msg'])){
			echo '<div style="position:fixed;z-index:99999;background-color:rgba(0,0,0,0.6);top:0;bottom:0;   left:0;right:0;display:none;" class="main_div"><p style="border:#fff solid 2px; border-radius:15px; box-shadow: 1px 1px 10px #fff; color:#fff; left: 40%;position: absolute;top: 40%;background:#000;padding:40px;font-size:20px;
display:none;" class="subscribe-messages">'.$_SESSION['mail_sent_msg'].'</p></div>';
			unset($_SESSION['mail_sent_msg']);
		}
		if(isset($_SESSION['subscribe_msg'])){
			echo '<div style="position:fixed;z-index:99999;background-color:rgba(0,0,0,0.6);top:0;bottom:0;   left:0;right:0;display:none;" class="main_div"><p style="border:#fff solid 2px;border-radius:15px; box-shadow: 1px 1px 10px #fff; color:#fff; left: 40%;position: absolute;top: 40%;background:#000;padding:40px;font-size:20px;
display:none;" class="subscribe-messages">'.$_SESSION['subscribe_msg'].'</p></div>';
			unset($_SESSION['subscribe_msg']);
		}		
			// subscription activate logic
			if(isset($_GET['act_code']) && $_GET['email']){
				$act_code = $_GET['act_code'];
				$email = $_GET['email'];
				//search & match the email & activation code
				global $wpdb;
				$table_name = $wpdb->prefix . 'nls_subscribers';
				$user_search_result = $wpdb->get_row("SELECT * FROM `$table_name` WHERE `email` LIKE '$email' AND `act_code` LIKE '$act_code'");
				if(count($user_search_result)) {
					// check user is already subscribed	
					if($user_search_result->flag == 1) {
							echo "<h4 class='alert alert-info'>".$wl_nls_options['sub_form_subscribe_already_confirm_message']."</h4>";
					} else {
						// update user subscription active
						if($wpdb->query("UPDATE `$table_name` SET `flag` = '1' WHERE `email` = '$email'")) {
							echo "<h4 class='alert alert-info'>".$wl_nls_options['sub_form_subscribe_confirm_success_message']."</h4>";
						}
					}
				} else {
					echo "<h4 class='alert alert-info'>".$wl_nls_options['sub_form_invalid_confirmation_message']."</h4>";
				}						
			} ?>				
		</div>   
			<script>
			jQuery('.newsletter_form2_subscribe-message2 .subscribe-messages').show();
			jQuery('.newsletter_form2_subscribe-message2 .main_div').show();
			jQuery('.newsletter_form2_subscribe-message2 .main_div').fadeOut(4000);
			jQuery('.newsletter_form2_subscribe-message2 .subscribe-messages').fadeOut(3000);
			</script>
		<?php } ?>	
	</section>
</div>
	<!-- Footer -->
	<footer>
		<div class="col-md-12 col-sm-12 newsletter_form2_footer_social">
			<?php if($wl_nls_options['social_icons_onoff']=='on'){	?>
					<ul class="newsletter_form2_social animated fadeInDownBig">
						<?php for($i=1; $i<=$wl_nls_options['total_Social_links']; $i++){
								if($wl_nls_options['social_icon_'.$i]!=''){
									$social_class = $wl_nls_options['social_icon_'.$i];
									$social_class = str_replace("fa fa-","",$social_class);
									$social_color = $wl_nls_options['social_icolor_'.$i];
							?>
							<li class="newsletter_form2_social <?php echo $social_class; ?>"><a target="<?php if($wl_nls_options['social_link_tab_'.$i]=='on') echo '_blank'; ?>" href="<?php echo $wl_nls_options['social_link_'.$i]; ?> <?php echo $wl_nls_options['social_link_'.$i]; ?>"><i style="color:<?php echo $social_color;?>!important;"  class="<?php echo $wl_nls_options['social_icon_'.$i]; ?> newsletter_form2_icon"></i></a></li>
								<?php }
							} ?>
					</ul>
				<?php } ?>
		</div>
	</footer>
	<!-- Fooetr -->
</div>