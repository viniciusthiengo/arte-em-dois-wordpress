<?php
/**
 * Recent posts widget
 */
class EightyDays_Widget_Recent_Posts extends WP_Widget {
	/**
	 * Holds widget settings defaults, populated in constructor.
	 * @var array
	 */
	protected $defaults = array(
		'title'    => '',
		'number'   => 5,
		'category' => '',
	);

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct(
			'eightydays-recent-posts-widget',
			esc_html__( 'EightyDays: Recent Posts', 'eightydays-lite' ),
			array(
				'classname'   => 'eightydays-recent-posts-widget',
				'description' => esc_html__( 'Advanced recent posts widget.', 'eightydays-lite' ),
			)
		);
	}

	/**
	 * Display widget
	 *
	 * @param array $args     Sidebar configuration
	 * @param array $instance Widget settings
	 */
	public function widget( $args, $instance ) {
		$instance   = wp_parse_args( $instance, $this->defaults );
		$query_args = array(
			'posts_per_page'      => $instance['number'],
			'post_status'         => 'publish',
			'post_type'           => 'post',
			'ignore_sticky_posts' => true,
		);
		if ( ! empty( $instance['category'] ) )
			$query_args['cat'] = $instance['category'];

		$query = new WP_Query( $query_args );
		if ( ! $query->have_posts() )
			return;

		echo $args['before_widget'];
		if ( $title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) )
			echo $args['before_title'] . $title . $args['after_title'];
		?>
		<ul>
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<li>
					<?php if ( has_post_thumbnail() ) : ?>
						<a class="eightydays-thumb" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail( 'eightydays-widget-thumb' ); ?>
						</a>
					<?php endif; ?>
					<div class="eightydays-text">
						<div class="eightydays-title">
							<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'eightydays-lite' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
						</div>
						<div class="eightydays-meta">
							<time class="eightydays-date" datetime="<?php echo esc_attr( get_the_time( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
						</div>
					</div>
				</li>
			<?php endwhile; ?>
		</ul>
		<?php
		wp_reset_postdata();
		echo $args['after_widget'];
	}

	/**
	 * Update widget
	 *
	 * @param array $new_instance New widget settings
	 * @param array $old_instance Old widget settings
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance             = $old_instance;
		$instance['title']    = strip_tags( $new_instance['title'] );
		$instance['number']   = absint( $new_instance['number'] );
		$instance['category'] = absint( $new_instance['category'] );

		return $instance;
	}

	/**
	 * Display widget settings
	 *
	 * @param array $instance Widget settings
	 * @return void
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'eightydays-lite' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>">
		</p>
		<p>
			<input id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" size="2" value="<?php echo esc_attr( $instance['number'] ); ?>">
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts', 'eightydays-lite' ); ?></label>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Select Category: ', 'eightydays-lite' ); ?></label>
			<?php
			wp_dropdown_categories( array(
				'show_option_all'    => esc_html__( 'All', 'eightydays-lite' ),
				'orderby'            => 'name',
				'order'              => 'ASC',
				'selected'           => $instance['category'],
				'hierarchical'       => 1,
				'name'               => $this->get_field_name( 'category' ),
				'id'                 => $this->get_field_id( 'category' ),
				'class'              => 'widefat',
			) );
			?>
		<?php
	}
}
