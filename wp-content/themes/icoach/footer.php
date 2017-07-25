<?php
/*
 * iCoach default footer file
 */
?>
<footer>
    <div class="footer-wrap">
        <div class="icoach-section">
            <div class="footer-logo fadeIn animated">
                <?php
                    $icoach_dark_logo=get_theme_mod('icoach_dark_logo');
                    $icoach_dark_logo=wp_get_attachment_url($icoach_dark_logo);
                ?>
                <?php if($icoach_dark_logo != '' && !empty($icoach_dark_logo)): ?>
                    <img class="img-responsive" src="<?php echo esc_url($icoach_dark_logo); ?>" alt="<?php esc_attr_e('Logo','icoach');?>">
                <?php endif; ?>      
            </div>
            <div class="footer-nav fadeIn animated">
                <?php if (has_nav_menu('footer')) {
                        $icoach_defaults = array(
                        'theme_location' => 'footer',);
                        wp_nav_menu($icoach_defaults);                                        
                    } ?>
            </div>
            <?php $icoach_social_icon_one = get_theme_mod('icoach_social_icon_one');
                $icoach_social_link_one = get_theme_mod('icoach_social_link_one');
                $icoach_social_icon_two = get_theme_mod('icoach_social_icon_two');
                $icoach_social_link_two = get_theme_mod('icoach_social_link_two');
                $icoach_social_icon_three = get_theme_mod('icoach_social_icon_three');
                $icoach_social_link_three = get_theme_mod('icoach_social_link_three');
                $icoach_social_icon_four = get_theme_mod('icoach_social_icon_four');
                $icoach_social_link_four = get_theme_mod('icoach_social_link_four');
                if($icoach_social_icon_one != '' || $icoach_social_icon_two != '' || $icoach_social_icon_three != '' || $icoach_social_icon_four != ''): ?>
                <div class="footer-social-icon fadeIn animated">
                    <ul>
                        <?php if($icoach_social_icon_one != '' && $icoach_social_link_one != ''): ?>
                            <li><a href="<?php echo esc_url($icoach_social_link_one); ?>" class="fb" title="" target="_blank"><i class="fa <?php echo esc_attr( get_theme_mod('icoach_social_icon_one', 'icoach') ); ?>"></i></a></li>
                        <?php endif; ?>
                        <?php if($icoach_social_icon_two != '' && !empty($icoach_social_icon_two) && $icoach_social_link_two != '' && !empty($icoach_social_link_two)): ?>
                            <li><a href="<?php echo esc_url($icoach_social_link_two); ?>" class="fb" title="" target="_blank"><i class="fa <?php echo esc_attr( get_theme_mod('icoach_social_icon_two', 'icoach') ); ?>"></i></a></li>
                        <?php endif; ?>
                        <?php if($icoach_social_icon_three != '' && !empty($icoach_social_icon_three) && $icoach_social_link_three != '' && !empty($icoach_social_link_three)): ?>
                            <li><a href="<?php echo esc_url($icoach_social_link_three); ?>" class="fb" title="" target="_blank"><i class="fa <?php echo esc_attr( get_theme_mod('icoach_social_icon_three', 'icoach') ); ?>"></i></a></li>
                        <?php endif; ?>
                        <?php if($icoach_social_icon_four != '' && !empty($icoach_social_icon_four) && $icoach_social_link_four != '' && !empty($icoach_social_link_four)): ?>
                            <li><a href="<?php echo esc_url($icoach_social_link_four); ?>" class="fb" title="" target="_blank"><i class="fa <?php echo esc_attr( get_theme_mod('icoach_social_icon_four', 'icoach') ); ?>"></i></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="copyright fadeIn animated">
                <p><?php printf( __( 'Powered by  %1$s ', 'icoach' ), '<a href="https://indigothemes.com/products/icoach-wordpress-theme/" target="_blank">iCoach WordPress Theme</a>'  ); ?></p>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>