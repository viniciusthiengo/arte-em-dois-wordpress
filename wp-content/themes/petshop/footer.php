<?php

/*
 * footer file
 */ ?>
<footer id="main-footer">
    <div class="container">
        <div class="row border-bottom">
            <div class="col-xs-12 col-sm-4">
                <div class="socail-icons">
                    <ul>
                        <?php for($petShopLeft=1; $petShopLeft<=5; $petShopLeft++) :
                            if(get_theme_mod('petShopLeftLink'.$petShopLeft) != '' && get_theme_mod('petShopLeftIcon'.$petShopLeft) != '') : ?>
                                <li><a href="<?php echo esc_url(get_theme_mod('petShopLeftLink'.$petShopLeft)); ?>"><i class="fa <?php echo esc_attr(get_theme_mod('petShopLeftIcon'.$petShopLeft)); ?>" aria-hidden="true"></i></a></li>
                            <?php endif;
                        endfor; ?>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="footer-logo">
                    <?php $petShopFooterLogo=get_theme_mod('petShopFooterLogo');
                            $petShopFooterLogo=wp_get_attachment_url($petShopFooterLogo);
                        if(get_theme_mod('petShopFooterLogo') != ''): ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" rel="home" itemprop="url">
                                <img class="img-responsive logo-dark" src="<?php echo esc_url($petShopFooterLogo); ?>" alt="<?php _e('Logo','petshop');?>">
                            </a>
                        <?php endif; ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="socail-card">
                    <ul>
                        <?php for($petShopRight=1; $petShopRight<=5; $petShopRight++) :
                            if(get_theme_mod('petShopRightLink'.$petShopRight) != '' && get_theme_mod('petShopRightIcon'.$petShopRight) != '') : ?>
                                <li><a href="<?php echo esc_url(get_theme_mod('petShopRightLink'.$petShopRight)); ?>"><i class="fa <?php echo esc_attr(get_theme_mod('petShopRightIcon'.$petShopRight)); ?>" aria-hidden="true"></i></a></li>
                            <?php endif;
                        endfor; ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Row End -->
        <div class="row">
            <?php if(is_active_sidebar('footer-1') && is_active_sidebar('footer-2') && is_active_sidebar('footer-3')) : ?>
                <div class="footer-contact">
                    <div class="col-md-4">
                        <?php if (is_active_sidebar('footer-1')) {
                            dynamic_sidebar('footer-1');
                        } ?>
                    </div>
                    <div class="col-md-4">
                        <?php if (is_active_sidebar('footer-2')) {
                            dynamic_sidebar('footer-2');
                        } ?>
                    </div>
                    <div class="col-md-4">
                        <?php if (is_active_sidebar('footer-3')) {
                            dynamic_sidebar('footer-3');
                        } ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <!-- Row End -->
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="footer-copyrights">
                    <p><?php _e( 'Powered by', 'petshop' ); ?> <a href="<?php echo esc_url('https://indigothemes.com/products/petshop-wordpress-theme/'); ?>" target="_blank"><?php _e('Petshop WordPress Theme','petshop'); ?></a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>