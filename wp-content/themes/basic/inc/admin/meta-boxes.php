<?php

/**
 * Register Basic dashboard widget
 */
function basic_add_dashboard_widget() {

	add_meta_box(
		'dashboard_widget', __( 'The Basic theme announcements', 'basic' ),
		'basic_dashboard_widget_callback',
		'dashboard',
		'side',
		'high'
	);
}

add_action( 'wp_dashboard_setup', 'basic_add_dashboard_widget' );

/**
 * Callback basic dashboard widget
 *
 * @param $post
 * @param $callback_args
 *
 */
function basic_dashboard_widget_callback( $post, $callback_args ) {

	$locale = get_locale();
	$lang   = 'en';
	$url    = BASIC_THEME_URI;

	if ( 'ru_RU' == $locale ) {
		$lang = 'ru';
		$url .= 'ru/';
	}

	?>
    <div class="update-basic-now" >
        <a href="<?php echo $url; ?>basic/?utm_source=dashboard&utm_medium=banner-<?php echo $lang; ?>&utm_campaign=basic-pro#pro"
           target="_blank" style="">
            <img class="hand" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTguMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDI5NyAyOTciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDI5NyAyOTc7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iMjRweCIgaGVpZ2h0PSIyNHB4Ij4KPHBhdGggZD0iTTI0NC4yNzksOTEuNjYyYy00LjE5OCwwLTguMTk1LDAuODc2LTExLjgyNSwyLjQ1Yy00LjQxMy0xMS4xNTItMTUuMjM4LTE5LjA1OC0yNy44NjktMTkuMDU4ICBjLTQuNjkyLDAtOS4xMzYsMS4wOTItMTMuMDk0LDMuMDM0Yy01LjAwOS05LjY1Ny0xNS4wNDgtMTYuMjctMjYuNTk4LTE2LjI3Yy0zLjM5NSwwLTYuNjU1LDAuNTc5LTkuNzAxLDEuNjMyVjMwLjIwMSAgQzE1NS4xOTMsMTMuNTQ5LDE0MS43MzgsMCwxMjUuMTk4LDBDMTA4LjY2LDAsOTUuMjA2LDEzLjU0OSw5NS4yMDYsMzAuMjAxdjExOS42NDNMNzMuNjA0LDEyNS4xMyAgYy0wLjE1MS0wLjE2OS0wLjMwNS0wLjMzNS0wLjQ2NS0wLjQ5NGMtNS42NzItNS42NzYtMTMuMjIxLTguODIzLTIxLjI1Ni04Ljg2MmMtMC4wNTIsMC0wLjEwMSwwLTAuMTUzLDAgIGMtOC4wMTYsMC0xNS41MjEsMy4wOTUtMjEuMTQ2LDguNzI0Yy05LjkxOCw5LjkyMS0xMC40NjcsMjQuNjQ3LTEuNTAyLDQwLjQwOGMxMS42MDUsMjAuMzksMjQuMjIsMzkuNjE2LDM1LjM1MSw1Ni41ODEgIGM4LjEzNCwxMi4zOTgsMTUuODE4LDI0LjEwOCwyMS40MzUsMzMuNzljNC44NzEsOC40MDIsMTcuODAxLDM1LjY1MSwxNy45MzMsMzUuOTI2YzEuNjc4LDMuNTQxLDUuMjQ3LDUuNzk4LDkuMTYzLDUuNzk4aDEyOC4yNyAgYzQuNDA3LDAsOC4zMDgtMi44NDMsOS42NTktNy4wMzVjMi4zOTItNy40MzksMjMuMzc5LTczLjM5OCwyMy4zNzktOTguODcxdi02OS4yMjlDMjc0LjI3LDEwNS4yMSwyNjAuODE3LDkxLjY2MiwyNDQuMjc5LDkxLjY2MnogICBNMjM0LjU3OSwxMjEuODY1YzAtNS40NjgsNC4zNTItOS45MTYsOS43LTkuOTE2YzUuMzUxLDAsOS43MDMsNC40NDgsOS43MDMsOS45MTZ2NjkuMjI5YzAsMTYuOTI4LTEzLjAxLDYyLjQzNy0yMC4xODksODUuNjE4ICBIMTE5LjM2MWMtNC4yMDYtOC43NTItMTIuMDg5LTI0Ljk2NC0xNS45NDQtMzEuNjEzYy01Ljg5Ny0xMC4xNjgtMTMuNzMtMjIuMTA1LTIyLjAyMi0zNC43NDQgIGMtMTAuOTY2LTE2LjcxLTIzLjM5My0zNS42NTItMzQuNjgxLTU1LjQ4MmMtMi45NDYtNS4xODEtNS42NDYtMTIuMTY2LTEuNzgtMTYuMDMyYzEuODAzLTEuODA3LDQuMjMxLTIuNzUxLDYuODUxLTIuNzc5ICBjMi41NTcsMC4wMTMsNC45NjIsMC45NzcsNi44MDUsMi43MjFsMzkuMTI0LDQ0Ljc1NWMyLjc4LDMuMTgzLDcuMjQ4LDQuMzA2LDExLjIwMiwyLjgyMWMzLjk1OC0xLjQ4Niw2LjU3OS01LjI3MSw2LjU3OS05LjQ5NyAgVjMwLjIwMWMwLTUuNDY3LDQuMzUzLTkuOTEzLDkuNzA0LTkuOTEzYzUuMzUyLDAsOS43MDYsNC40NDYsOS43MDYsOS45MTN2OTQuNzExYzAsNS42MDIsNC41NDMsMTAuMTQ0LDEwLjE0NCwxMC4xNDQgIGM1LjYwMSwwLDEwLjE0NC00LjU0MiwxMC4xNDQtMTAuMTQ0VjkyLjAxNmMwLTUuNDY0LDQuMzUyLTkuOTA5LDkuNzAxLTkuOTA5YzUuMzUxLDAsOS43MDMsNC40NDUsOS43MDMsOS45MDl2NDYuMTI3ICBjMCw1LjYwNSw0LjU0MiwxMC4xNDUsMTAuMTQzLDEwLjE0NWM1LjYwMiwwLDEwLjE0NS00LjUzOSwxMC4xNDUtMTAuMTQ1di0zMi44ODhjMC01LjQ2Nyw0LjM1Mi05LjkxNCw5LjcwMS05LjkxNCAgYzUuMzUyLDAsOS43MDYsNC40NDcsOS43MDYsOS45MTR2NDYuMTNjMCw1LjYwMSw0LjU0MiwxMC4xNDUsMTAuMTQ0LDEwLjE0NWM1LjYwMywwLDEwLjE0NS00LjU0NCwxMC4xNDUtMTAuMTQ1VjEyMS44NjV6IiBmaWxsPSIjRkZGRkZGIi8+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />
            <img src="<?php echo BASIC_THEME_URI; ?>promo/basic-<?php echo $lang; ?>.png" alt="theme basic" >
        </a>
    </div>
	<?php

}

/**
 * print widget styles
 */
function basic_update_widget_admin_print_styles(){
    ?>
<style>
.update-basic-now a{background:#936;padding:15px 20px 20px 60px;color:#fff;display:block;font-size:20px;line-height:22px;position:relative;transition:opacity 0.3s}
.update-basic-now a:hover {opacity:0.9;color: #fff}
.update-basic-now img{max-width:100%;height: auto;}
.update-basic-now img.hand{transition:transform 0.3s;position:absolute;left: 20px;top:50%;margin-top:-14px;}
.update-basic-now a:hover img.hand{transform: rotate(90deg)}
</style>
    <?php

}
add_action( 'admin_print_styles', 'basic_update_widget_admin_print_styles');


/**
 * Add Meta Box
 *
 * ======================================================================== */
function basic_add_custom_box() {

	// Adding layout meta box for page
	add_meta_box( 'basic-page-layout', __( 'Select Layout', 'basic' ), 'basic_page_layout', 'page', 'side', 'default' );

	// Adding layout meta box for
	add_meta_box( 'basic-page-layout', __( 'Select Layout', 'basic' ), 'basic_page_layout', 'post', 'side', 'default' );

}

add_action( 'add_meta_boxes', 'basic_add_custom_box' );
/* ======================================================================== */


/* ======================================================================== */
function basic_get_default_page_layouts() {

	$page_layout = array(
		'default-layout' => array(
			'id'    => 'basic_page_layout',
			'value' => 'default',
			'label' => __( 'Default', 'basic' )
		),
		'rightbar'       => array(
			'id'    => 'basic_page_layout',
			'value' => 'rightbar',
			'label' => __( 'Rightbar', 'basic' )
		),
		'leftbar'        => array(
			'id'    => 'basic_page_layout',
			'value' => 'leftbar',
			'label' => __( 'Leftbar', 'basic' )
		),
		'full'           => array(
			'id'    => 'basic_page_layout',
			'value' => 'full',
			'label' => __( 'Fullwidth Content', 'basic' )
		),
		'center'         => array(
			'id'    => 'basic_page_layout',
			'value' => 'center',
			'label' => __( 'Centered Content', 'basic' )
		)
	);

	return $page_layout;

}

/* ======================================================================== */


/* ========================================================================
 *
 * Displays metabox to for select layout option
 *
 * ======================================================================== */
function basic_page_layout() {
	global $post;

	$page_layout = basic_get_default_page_layouts();

	// Use nonce for verification  
	wp_nonce_field( basename( __FILE__ ), 'basic_meta_box_nonce' );

	foreach ( $page_layout as $field ) {
		$layout_meta = get_post_meta( $post->ID, $field['id'], true );
		if ( empty( $layout_meta ) ) {
			$layout_meta = 'default';
		}
		?>
        <label class="basic-post-format-icon">
            <input class="basic-post-format" type="radio" name="<?php echo $field['id']; ?>" value="<?php echo $field['value']; ?>" <?php checked( $field['value'], $layout_meta ); ?>/>
			<?php echo $field['label']; ?></label><br />
		<?php
	}
}

/* ======================================================================== */


/* ========================================================================
 *
 * save the custom metabox data
 *
 * ======================================================================== */
function basic_save_custom_meta( $post_id ) {

	$page_layout = basic_get_default_page_layouts();

	// Verify the nonce before proceeding.
	if ( ! isset( $_POST['basic_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['basic_meta_box_nonce'], basename( __FILE__ ) ) ) {
		return;
	}

	// Stop WP from clearing custom fields on autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( 'page' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		}
	} elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}

	foreach ( $page_layout as $field ) {
		//Execute this saving function
		$old = get_post_meta( $post_id, $field['id'], true );
		$new = isset( $_POST[ $field['id'] ] ) ? $_POST[ $field['id'] ] : 'default';
		if ( $new && $new != $old ) {
			update_post_meta( $post_id, $field['id'], $new );
		} elseif ( '' == $new && $old ) {
			delete_post_meta( $post_id, $field['id'], $old );
		}
	} // end foreach   
}

add_action( 'pre_post_update', 'basic_save_custom_meta' );
/* ======================================================================== */

