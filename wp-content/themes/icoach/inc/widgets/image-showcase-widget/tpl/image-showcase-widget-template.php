<?php $numberOfImages = 0;
$index = sprintf("%06d", mt_rand(1, 999999));
    if ( ! empty( $instance['showcase'] ) ) :
        foreach( $instance['showcase'] as $i => $repeater_item ) :
            $numberOfImages ++;
        endforeach;
    endif;
    $height = $instance['height']/$numberOfImages;
?>
<?php if ( ! empty( $instance['showcase'] ) ) :
    foreach( $instance['showcase'] as $i => $repeater_item ) : ?>
    <div class="no-padding about-box">
        <div class="about-personal" style="background: url(<?php echo wp_get_attachment_url($repeater_item['image']); ?>) center center/cover no-repeat scroll transparent;height: <?php echo esc_attr($height) ?>px">
        </div>
        <a <?php if($repeater_item['popup'] == 1){
            echo 'data-toggle="modal" data-target="#'.$index.'"';
        } else {
            echo 'href="'.sow_esc_url($repeater_item['buttonLink']).'"';
        } ?> href="<?php echo sow_esc_url($repeater_item['buttonLink']); ?>" class="btn-iprimary <?php echo esc_attr($repeater_item['buttonType']); echo ' '.esc_attr($repeater_item['button']); ?>"><?php echo esc_html($repeater_item['buttonText']); ?></a>
    </div>
    <div class="modal fade" id="<?php echo esc_attr($index); ?>" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <img src="<?php echo wp_get_attachment_url($repeater_item['image']); ?>" class="img-responsive">
            </div>
          </div>
        </div>
    </div>
<?php $index++; endforeach; endif; ?>