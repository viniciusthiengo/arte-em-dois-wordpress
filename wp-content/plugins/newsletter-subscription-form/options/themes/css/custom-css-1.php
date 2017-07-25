<style>

.newsletter-api-form-theme1 .newsletter_form1 {
	background-color: <?php echo $wl_nls_options['sub_form_bg_color'] ?>!important;
}

<?php if($wl_nls_options['theme_color_schemes']=='custom_colors') { ?>
.newsletter-api-form-theme1 .newsletter_form1_social-icons {
	background-color: <?php echo $wl_nls_options['custom_color_schemes']?>!important;
	float: left;
	width: 100%;
	margin: 10px auto;
}
.newsletter-api-form-theme1 .subscriber_submit {
	background-color: <?php echo $wl_nls_options['custom_color_schemes']?>!important;
	color: #fff;
}
.newsletter-api-form-theme1 .subscriber_submit:hover {
	background-color: <?php echo $wl_nls_options['custom_color_schemes']?>!important;
	color: #fff;
}
.newsletter-api-form-theme1 .newsletter_form1 .form-control {
	border-color: <?php echo $wl_nls_options['custom_color_schemes'] ?>!important;
}
<?php } else { ?>
.newsletter-api-form-theme1 .newsletter_form1_social-icons {
	background-color: <?php echo $wl_nls_options['default_color_schemes']?>!important;
	float: left;
	width: 100%;
	margin: 10px auto;
}
.newsletter-api-form-theme1 .subscriber_submit {
	background-color: <?php echo $wl_nls_options['default_color_schemes']?>!important;
	color: #fff;
	}
.newsletter-api-form-theme1 .subscriber_submit:hover {
	background-color: <?php echo $wl_nls_options['default_color_schemes']?>!important;
	color: #fff;
	}
.newsletter-api-form-theme1 .newsletter_form1 .form-control {
	border-color: <?php echo $wl_nls_options['default_color_schemes'] ?>!important;
}
<?php } ?>


.newsletter-api-form-theme1 .newsletter_form1 .form-control::-webkit-input-placeholder {
  font-family: <?php echo $wl_nls_options['theme_font_family']; ?>!important;
}

.newsletter-api-form-theme1 .newsletter_form1 .form-control:-ms-input-placeholder {
  font-family: <?php echo $wl_nls_options['theme_font_family']; ?>!important;
}

.newsletter-api-form-theme1 .newsletter_form1 .form-control:-moz-placeholder {
  font-family: <?php echo $wl_nls_options['theme_font_family']; ?>!important;
}

.newsletter-api-form-theme1 .newsletter_form1 .form-control::-moz-placeholder {
  font-family: <?php echo $wl_nls_options['theme_font_family']; ?>!important;
}
.newsletter-api-form-theme1 .newsletter_form1 .btn {
	font-family : <?php echo $wl_nls_options['theme_font_family']; ?>!important;
}
.newsletter-api-form-theme1 .newsletter_form1 .form-control {
	font-family : <?php echo $wl_nls_options['theme_font_family']; ?>!important;
}

.newsletter-api-form-theme1 .newsletter_form1 .form-control {
	font-family : <?php echo $wl_nls_options['theme_font_family']; ?>!important;
}

.newsletter-api-form-theme1 .newsletter_form1_social-icons .newsletter_form1_icon{ 
	font-size:<?php echo $wl_nls_options['link_size']?>px!important;
}
.newsletter-api-form-theme1 .newsletter_form1 .subscriber_submit:hover { 
background-color:<?php echo $wl_nls_options['sub_form_button_hb_color']?>!important;
color:<?php echo $wl_nls_options['sub_form_button_ht_color']?>!important;
}
.newsletter-api-form-theme1 .newsletter_form1_section-heading{
	font-family : <?php echo $wl_nls_options['theme_font_family']; ?>!important;
	font-size:<?php echo $wl_nls_options['section_heading_size']; ?>px;
}
.newsletter-api-form-theme1 .newsletter_form1_section-sub_heading{
	font-family : <?php echo $wl_nls_options['theme_font_family']; ?>!important;
	font-size:<?php echo $wl_nls_options['section_sub_heading_size']; ?>px;
}
.newsletter-api-form-theme1 .newsletter_form1_section-description{
	font-family : <?php echo $wl_nls_options['theme_font_family']; ?>!important;
	font-size:<?php echo $wl_nls_options['section_description_size']; ?>px;
}
.newsletter-api-form-theme1 .newsletter_form1_section-icon .newsletter_form1_icon{
	font-size:<?php echo $wl_nls_options['section_icon_size']; ?>px ;
}
.newsletter-api-form-theme1 input[type='text'],.newsletter-api-form-theme1 input[type='email']{
	font-family : <?php echo $wl_nls_options['theme_font_family']; ?>!important;
	    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
}
.newsletter-api-form-theme1 .subscriber_submit{
	width: 40%;
}
.widget_nlf_form_widget .newsletter-api-form-theme1 .subscriber_submit{
	width: 80%;
}
</style>