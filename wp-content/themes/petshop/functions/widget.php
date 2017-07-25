<?php function PetShopRegisterCustomWidgets() {
    register_widget( 'PetShopWidgetRecentPosts' );
}
add_action( 'widgets_init', 'PetShopRegisterCustomWidgets' );
/**
 * Recent_Posts widget class
 *
 * @since 2.8.0
 */
class PetShopWidgetRecentPosts extends WP_Widget {

    function __construct() {
        $petShopWidgetOps = array('classname' => 'PetShopWidgetRecentPosts', 'description' => __( "The most recent posts on your site", 'petshop') );
        parent::__construct('recent-posts', __('Recent Posts', 'petshop'), $petShopWidgetOps);
        $this->alt_option_name = 'widget_recent_entries';
        add_action( 'save_post', array($this, 'petShopFlushWidgetCache') );
        add_action( 'deleted_post', array($this, 'petShopFlushWidgetCache') );
        add_action( 'switch_theme', array($this, 'petShopFlushWidgetCache') );
    }
    function widget($args, $instance) {
        $cache = wp_cache_get('PetShopWidgetRecentPosts', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo $cache[ $args['widget_id'] ];
            return;
        }

        ob_start();
        extract($args);

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts', 'petshop' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 10;
        if ( ! $number )
            $number = 10;
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

        $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
        if ($r->have_posts()) :
        echo $before_widget;
        if ( $title ) echo $before_title . $title . $after_title; ?>
        <ul>
        <?php while ( $r->have_posts() ) : $r->the_post(); ?>
            <li>
            	<div class="thumbnails"><?php the_post_thumbnail(array(60, 60)); ?></div>
                <div class="content"><a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a>
                <?php PetShopSideMeta(); ?></siv>
            </li>
        <?php endwhile; ?>
        </ul>
        <?php echo $after_widget;
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();
        endif;
        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('PetShopWidgetRecentPosts', $cache, 'widget');
    }
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $instance['show_date'] = (bool) $new_instance['show_date'];
        $this->petShopFlushWidgetCache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['PetShopWidgetRecentPosts']) )
            delete_option('PetShopWidgetRecentPosts');
        return $instance;
    }

    function petShopFlushWidgetCache() {
        wp_cache_delete('PetShopWidgetRecentPosts', 'widget');
    }
    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false; ?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','petshop' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:', 'petshop' ); ?></label>
        <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
        <p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
        <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?', 'petshop' ); ?></label></p>
<?php }
} ?>