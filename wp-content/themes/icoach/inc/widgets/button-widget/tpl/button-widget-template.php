<?php
$classes = array();
if( !empty($instance['design']['hover']) ) $classes[] = 'button-hover';
?>
<div class="button-base button-align-<?php echo esc_attr($instance['design']['align']) ?>">
	<?php
	$button_attributes = array(
		'class' => esc_attr(implode(' ', $classes))
	);
	if(!empty($instance['newWindow'])) $button_attributes['target'] = '_blank';
	if(!empty($instance['url'])) $button_attributes['href'] = esc_url($instance['url']);
	if(!empty($instance['attributes']['id'])) $button_attributes['id'] = esc_attr($instance['attributes']['id']);
	if(!empty($instance['attributes']['title'])) $button_attributes['title'] = esc_attr($instance['attributes']['title']);
	if(!empty($instance['attributes']['onclick'])) $button_attributes['onclick'] = esc_attr($instance['attributes']['onclick']);
	?>
	<a <?php foreach($button_attributes as $name => $val) echo $name . '="' . $val . '" ' ?> >
			<?php
				if( !empty($instance['buttonIcon']['icon']) ) {
					$attachment = wp_get_attachment_image_src($instance['buttonIcon']['icon']);
					if(!empty($attachment)) {
						$iconStyles[] = 'background-image: url(' . sow_esc_url($attachment[0]) . ')';
						?><div class="sow-icon-image" style="<?php echo implode('; ', $iconStyles) ?>"></div><?php
					}
				}
				else {
					$iconStyles = array();
					if(!empty($instance['buttonIcon']['iconColor'])) $iconStyles[] = 'color: '.$instance['buttonIcon']['iconColor'];
					echo siteorigin_widget_get_icon($instance['buttonIcon']['iconSelected'], $iconStyles);
				}
			?>
			<?php echo wp_kses_post($instance['text']) ?>
	</a>
</div>