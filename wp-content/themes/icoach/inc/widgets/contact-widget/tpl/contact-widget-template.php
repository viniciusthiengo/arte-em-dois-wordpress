<div class="contact-me slideInLeft animated <?php echo esc_attr($instance['contactFormStyle']); ?>">
    <?php echo do_shortcode($instance['contactForm']);
    wp_reset_postdata(); ?>
</div>