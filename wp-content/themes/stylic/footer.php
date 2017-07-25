<?php

/*
 * footer file
 */ ?>
<footer>
    <div class="container-fluid footer_bg">
        <div class="row">
            <div class="footer-menu">
                <ul>
                    <?php if (has_nav_menu('footer')) {
                        $stylic_defaults = array(
                        'theme_location' => 'footer',
                        'depth' => 1);
                        wp_nav_menu($stylic_defaults);                                        
                    } ?>
                </ul>
            </div>
            <div class="footer-social-icon">
                <ul>
                    <?php if(get_theme_mod('stylic_social_icon_one') != '' && get_theme_mod('stylic_social_link_one') != '') : ?>
                        <li><a href="<?php echo esc_url(get_theme_mod('stylic_social_link_one')); ?>"><i class="fa <?php echo esc_attr(get_theme_mod('stylic_social_icon_one')); ?>" aria-hidden="true"></i></a></li>
                    <?php endif;
                    if(get_theme_mod('stylic_social_icon_two') != '' && get_theme_mod('stylic_social_link_two') != '') : ?>
                        <li><a href="<?php echo esc_url(get_theme_mod('stylic_social_link_two')); ?>"><i class="fa <?php echo esc_attr(get_theme_mod('stylic_social_icon_two')); ?>" aria-hidden="true"></i></a></li>
                    <?php endif;
                    if(get_theme_mod('stylic_social_icon_three') != '' && get_theme_mod('stylic_social_link_three') != '') : ?>
                        <li><a href="<?php echo esc_url(get_theme_mod('stylic_social_link_three')); ?>"><i class="fa <?php echo esc_attr(get_theme_mod('stylic_social_icon_three')); ?>" aria-hidden="true"></i></a></li>
                    <?php endif;
                    if(get_theme_mod('stylic_social_icon_four') != '' && get_theme_mod('stylic_social_link_four') != '') : ?>
                        <li><a href="<?php echo esc_url(get_theme_mod('stylic_social_link_four')); ?>"><i class="fa <?php echo esc_attr(get_theme_mod('stylic_social_icon_four')); ?>" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <?php $stylic_author_url = 'https://indigothemes.com/products/stylic-wordpress-theme/'; ?>
            <div class="footer-copyright">
                <p><?php esc_html_e( 'Powered by ', 'stylic' ); ?><a href="<?php echo esc_url( $stylic_author_url ); ?>" target="_blank"><?php esc_html_e('Stylic WordPress Theme','stylic'); ?></a></p>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>