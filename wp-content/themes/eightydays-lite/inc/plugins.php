<?php
add_action( 'tgmpa_register', 'eightydays_register_required_plugins' );

/**
 * Register required plugins
 */
function eightydays_register_required_plugins() {
	$plugins = array(
		array(
			'name' => esc_html__( 'Jetpack', 'eightydays-lite' ),
			'slug' => 'jetpack',
		),
	);
	$config  = array(
		'domain'       => 'eightydays-lite',
		'default_path' => '',
		'menu'         => 'install-required-plugins',
		'has_notices'  => true,
		'is_automatic' => false,
		'message'      => '',
		'strings'      => array(
			'page_title'                      => esc_html__( 'Install Required Plugins', 'eightydays-lite' ),
			'menu_title'                      => esc_html__( 'Install Plugins', 'eightydays-lite' ),
			'installing'                      => esc_html__( 'Installing Plugin: %s', 'eightydays-lite' ),
			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'eightydays-lite' ),
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'eightydays-lite' ),
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'eightydays-lite' ),
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'eightydays-lite' ),
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'eightydays-lite' ),
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'eightydays-lite' ),
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'eightydays-lite' ),
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'eightydays-lite' ),
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'eightydays-lite' ),
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'eightydays-lite' ),
			'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'eightydays-lite' ),
			'return'                          => esc_html__( 'Return to Required Plugins Installer', 'eightydays-lite' ),
			'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'eightydays-lite' ),
			'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'eightydays-lite' ),
			'nag_type'                        => 'updated'
		)
	);

	tgmpa( $plugins, $config );
}
