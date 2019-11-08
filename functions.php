<?php

/**
 * Setup Victory
 */
function victory_setup() {

	// Textdomain
	load_theme_textdomain( 'victory', get_template_directory() . '/languages' );

	// Adds theme support for title tag.
	add_theme_support( 'title-tag' );

}
add_action( 'after_theme_setup', 'victory_setup' );

/**
 * Enqueues scripts and styles
 */
function victory_enqueue() {

	// Loads styles
	wp_enqueue_style( 'victory_fonts', victory_fonts_url(), array(), null );
	wp_enqueue_style( 'victory_style', get_stylesheet_uri() );

	// Loads scripts
	wp_enqueue_script( 'victory_main', get_template_directory_uri() . '/assets/scripts/main.js', array( 'jquery' ) );

	// Localizes scripts
	wp_localize_script( 'victory_main', 'victory_Ajax', array(
		'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce( 'victory-nonce' ),
	));
}
add_action( 'wp_enqueue_scripts', 'victory_enqueue' );

/**
 * Sets up Google Font URL
 */
function victory_fonts_url() {
	$fonts_url = '';

	$ubuntu = esc_html_x( 'on', 'Ubuntu font: on or off', 'viewed' );

	if ( 'off' !== $ubuntu  ) {
		$font_families = array();

		if ( 'off' !== $ubuntu ) {
			$font_families[] = 'Ubuntu:300,700';
		}

		$query_args = array(
			'family'    => urlencode( implode( '|', $font_families ) ),
			'subset'    => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Removes unused menu items and taxonomy features
 */
function victory_remove_menus() {

	// Removes unused top level menus.
	// remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'victory_remove_menus' );


/**
 * Hides menu editor in customizer
 */
function victory_hide_menu_section() {

	// Returns if not an admin page.
	if ( ! is_admin() ) {
		return;
	}

	wp_enqueue_style( 'hide-menu-section', get_template_directory_uri() . '/assets/styles/customizer.css' );
	wp_enqueue_style( 'hide-menu-section' );
}
add_action( 'admin_enqueue_scripts', 'victory_hide_menu_section' );

/**
 * Returns background image inline style
 */
function victory_get_background_image( $background_url ) {
	// Is the background setting empty?
	if ( ! empty( $background_url ) ) {

		// Sets the custom background image
		$background = 'style="background-image: url(\'' . $background_url . '\');"';
	} else {
		$background = '';
	}

	return $background;
}


/**
 * Register the required plugins for this theme.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function victory_require_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// Includes the Kirki plugin from the WordPress Plugin Repository.
		array(
			'name' => 'Kirki',
			'slug' => 'kirki',
			'required' => true,
		),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id' => 'tgmpa', // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '', // Default absolute path to bundled plugins.
		'menu' => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug' => 'themes.php', // Parent menu slug.
		'capability' => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices' => true, // Show admin notices or not.
		'dismissable' => true, // If false, a user cannot dismiss the nag message.
		'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false, // Automatically activate plugins after installation or not.
		'message' => '', // Message to output right before the plugins table.
		'strings' => array(
			'page_title' => esc_html__( 'Install and Activate Required Plugins', 'victory' ),
			'menu_title' => esc_html__( 'Required Plugins', 'victory' ),
			'nag_type' => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		)
	);

	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'victory_require_plugins' );

// Loads required files
require_once( get_template_directory() . '/assets/helpers/class-tgm-plugin-activation.php' );
require_once( get_template_directory() . '/assets/helpers/customizer-theme.php' );
require_once( get_template_directory() . '/assets/helpers/feature-send-mail.php' );

add_filter( 'allow_subdirectory_install',
create_function( '', 'return true;' )
);
