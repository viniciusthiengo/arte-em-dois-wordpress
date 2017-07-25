<style>
<?php if($wl_nls_options['theme_color_schemes']=='custom_colors') { ?>
.newsletter-api-form-theme2{
	border: solid 2px  <?php echo $wl_nls_options['custom_color_schemes']?>!important;
	padding: 10px;
}
.newsletter-api-form-theme2 .newsletter_form2_social-icons {
	background-color: <?php echo $wl_nls_options['custom_color_schemes']?>!important;
}
.newsletter-api-form-theme2 .btn {
	background-color: <?php echo $wl_nls_options['custom_color_schemes']?>!important;
	color: #fff;
}
.newsletter-api-form-theme2 .btn:hover {
	background-color: <?php echo $wl_nls_options['custom_color_schemes']?>!important;
	color: #fff;
}
.newsletter-api-form-theme2 .form-control {
	border-color: <?php echo $wl_nls_options['custom_color_schemes'] ?>!important;
}
.newsletter-api-form-theme2 footer {
	border-color: <?php echo $wl_nls_options['default_color_schemes']?>!important;
	color: #fff;
}
<?php } else { ?>
.newsletter-api-form-theme2{
	border: solid 2px  <?php echo $wl_nls_options['default_color_schemes']?>!important;
	padding: 10px;
}

.newsletter-api-form-theme2 .newsletter_form2_social-icons {
	background-color: <?php echo $wl_nls_options['default_color_schemes']?>!important;
	color: #555;
}
.newsletter-api-form-theme2 .btn {
	background-color: <?php echo $wl_nls_options['default_color_schemes']?>!important;
	color: #fff;
}
.newsletter-api-form-theme2 footer {
	border-color: <?php echo $wl_nls_options['default_color_schemes']?>!important;
	color: #fff;
}
.newsletter-api-form-theme2 .btn:hover {
	background-color: <?php echo $wl_nls_options['default_color_schemes']?>!important;
	color: #fff;
}
.newsletter-api-form-theme2 .form-control {
	border-color: <?php echo $wl_nls_options['default_color_schemes'] ?>!important;
}
<?php } ?>
.newsletter-api-form-theme2 .form-control::-webkit-input-placeholder{
  font-family: <?php echo $wl_nls_options['theme_font_family']; ?>!important;
}
.newsletter-api-form-theme2 .form-control:-ms-input-placeholder {
  font-family: <?php echo $wl_nls_options['theme_font_family']; ?>!important;
}
.newsletter-api-form-theme2 .form-control:-moz-placeholder {
  font-family: <?php echo $wl_nls_options['theme_font_family']; ?>!important;
}
.newsletter-api-form-theme2 .form-control::-moz-placeholder {
  font-family: <?php echo $wl_nls_options['theme_font_family']; ?>!important;
}
.newsletter-api-form-theme2 .btn {
	font-family : <?php echo $wl_nls_options['theme_font_family']; ?>!important;
}
.newsletter-api-form-theme2 .form-control {
	font-family : <?php echo $wl_nls_options['theme_font_family']; ?>!important;
}
.newsletter-api-form-theme2 .form-control {
	font-family : <?php echo $wl_nls_options['theme_font_family']; ?>!important;
}
.newsletter-api-form-theme2 .newsletter_form2_social-icons .newsletter_form2_icon{ 
	font-size:<?php echo $wl_nls_options['link_size']?>px!important;
}
.newsletter-api-form-theme2 input[type='text'],.newsletter-api-form-theme2 input[type='email']{
	font-family : <?php echo $wl_nls_options['theme_font_family']; ?>!important;
}
.newsletter-api-form-theme2 .btn:hover { 
background-color:<?php echo $wl_nls_options['sub_form_button_hb_color']?>!important;
color:<?php echo $wl_nls_options['sub_form_button_ht_color']?>!important;
}
.newsletter-api-form-theme2 .newsletter_form2_section-heading{
	font-family : <?php echo $wl_nls_options['theme_font_family']; ?>!important;
	font-size:<?php echo $wl_nls_options['section_heading_size']; ?>px;
	color: #555 !important;
}
.newsletter-api-form-theme2 .newsletter_form2_section-sub_heading{
	font-family : <?php echo $wl_nls_options['theme_font_family']; ?>!important;
	font-size:<?php echo $wl_nls_options['section_sub_heading_size']; ?>px;
	color: #555 !important;
}
.newsletter-api-form-theme2 .newsletter_form2_section-description{
	font-family : <?php echo $wl_nls_options['theme_font_family']; ?>!important;
	font-size:<?php echo $wl_nls_options['section_description_size']; ?>px;
	color: #555 !important;
}
.newsletter-api-form-theme2 .newsletter_form2_section-icon .newsletter_form2_icon{
	font-size:<?php echo $wl_nls_options['section_icon_size']; ?>px ;
	color: #555;
}
</style>