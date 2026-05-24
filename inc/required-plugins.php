<?php
/**
 * Required-plugin registration via TGM Plugin Activation.
 *
 * TGMPA gives us:
 *   - Admin notice + install/activate button when CF7 is missing.
 *   - A dedicated "Install Required Plugins" admin screen with bulk actions.
 *   - One-click install from the wordpress.org plugin repository.
 *
 * Library lives at inc/class-tgm-plugin-activation.php (loaded by functions.php).
 *
 * @package Majoka
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Is Contact Form 7 active right now?
 * Re-used by functions.php to conditionally enqueue cf7.css.
 */
if ( ! function_exists( 'majoka_is_cf7_active' ) ) {
	function majoka_is_cf7_active() {
		return ( defined( 'WPCF7_VERSION' ) || class_exists( 'WPCF7_ContactForm' ) );
	}
}

/**
 * Register required plugins with TGMPA.
 */
function majoka_register_required_plugins() {
	$plugins = array(
		array(
			'name'               => 'Contact Form 7',
			'slug'               => 'contact-form-7',
			'required'           => true,
			'force_activation'   => false,
			'force_deactivation' => false,
		),
	);

	$config = array(
		'id'           => 'majoka',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => false,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'message'      => '',
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'majoka' ),
			'menu_title'                      => __( 'Install Plugins', 'majoka' ),
			'installing'                      => __( 'Installing Plugin: %s', 'majoka' ),
			'updating'                        => __( 'Updating Plugin: %s', 'majoka' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'majoka' ),
			'notice_can_install_required'     => _n_noop(
				'The Majoka Hardware theme requires the following plugin: %1$s.',
				'The Majoka Hardware theme requires the following plugins: %1$s.',
				'majoka'
			),
			'notice_can_install_recommended'  => _n_noop(
				'The Majoka Hardware theme recommends the following plugin: %1$s.',
				'The Majoka Hardware theme recommends the following plugins: %1$s.',
				'majoka'
			),
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure compatibility with the Majoka Hardware theme: %1$s.',
				'The following plugins need to be updated to their latest versions to ensure compatibility with the Majoka Hardware theme: %1$s.',
				'majoka'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'majoka'
			),
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'majoka'
			),
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'majoka'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'majoka'
			),
			'update_link'                     => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'majoka'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'majoka'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'majoka' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'majoka' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'majoka' ),
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'majoka' ),
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for the Majoka Hardware theme. Please update the plugin.', 'majoka' ),
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'majoka' ),
			'dismiss'                         => __( 'Dismiss this notice', 'majoka' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'majoka' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'majoka' ),
		),
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'majoka_register_required_plugins' );
