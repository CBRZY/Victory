<?php

/**
 * Sets up customizer
 */
function victory_customizer() {

	global $wp_customize;

	$wp_customize->remove_section( 'static_front_page' );

	if ( class_exists( 'Kirki' ) ) {
		Kirki::add_config( 'victory_theme', array(
			'capability'    => 'edit_theme_options',
			'option_type'   => 'theme_mod',
		) );

		add_about_section();
		// add_website_section();
		add_contact_section();
		add_social_section();
	} else {

		/**
		 * Adds Kirki warning control to the customizer
		 *
		 * The theme uses Kirki to handle customizer controls. This control
		 * displays a warning message in the customizer if the Kirki
		 * plugin is not installed.
		 */
		class Kirki_Warning extends WP_Customize_Control {
			public $type = 'kirki_warning';

			public function render_content() {
				?>
					<label>
						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
						<p><?php _e( 'This theme requires the Kirki plugin in order to edit your site from within the customizer.', 'victory' ); ?></p>
						<a href="<?php echo get_admin_URL(); ?>themes.php?page=tgmpa-install-plugins" class="button"><?php _e( 'Install Kirki', 'victory' ); ?></a></p>
					</label>
				<?php
			}
		}

		$wp_customize->add_section(
			'theme_settings',
			array(
				'title' => 'Theme Settings',
				'description' => '',
				'priority' => 200,
			)
		);

		$wp_customize->add_setting( 'kirki_warning', array( 'sanitize_callback' => '__return_false' ) );
		$wp_customize->add_control(
			new Kirki_Warning(
				$wp_customize,
				'kirki_warning',
				array(
					'label' => __( 'Please note:', 'victory' ),
					'section' => 'theme_settings',
					'settings' => 'kirki_warning'
				)
			)
		);
	}
}
add_action( 'customize_register', 'victory_customizer' );

function add_about_section(){
	// Adds about section.
	Kirki::add_section( 'victory_about_section', array(
		'title'          => __( 'About', 'victory' ),
		'description'    => __( 'Settings for the About section', 'victory' ),
		'priority'       => 200,
		'capability'     => 'edit_theme_options',
	) );

	Kirki::add_field( 'victory_theme', array(
		'settings' => 'victory[about_image]',
		'label'    => __( 'About image', 'victory' ),
		'section'  => 'victory_about_section',
		'type'     => 'image',
		'priority' => 10,
	) );

	Kirki::add_field( 'victory_theme', array(
		'settings' => 'victory[about_title]',
		'label'    => __( 'About title text', 'victory' ),
		'section'  => 'victory_about_section',
		'type'     => 'text',
		'priority' => 10,
		'default'  => '',
	) );

	Kirki::add_field( 'victory_theme', array(
		'settings' => 'victory[about_content]',
		'label'    => __( 'About content text', 'victory' ),
		'section'  => 'victory_about_section',
		'type'     => 'textarea',
		'priority' => 10,
		'default'  => '',
	) );
}

function add_website_section(){
	// Adds Work section.
	Kirki::add_section( 'website_section', array(
		'title'          => __( 'Website Development', 'victory' ),
		'description'    => __( 'Settings for the Website section', 'victory' ),
		'priority'       => 210,
		'capability'     => 'edit_theme_options',
	) );

	Kirki::add_field( 'victory_theme', array(
		'settings' => 'victory[website_heading]',
		'label'    => __( 'Section heading', 'victory' ),
		'section'  => 'website_section',
		'type'     => 'text',
		'priority' => 10,
	) );
			
			Kirki::add_field( 'victory_theme', array(
		'settings' => 'victory[website_description]',
		'label'    => __( 'Section description', 'victory' ),
		'section'  => 'website_section',
		'type'     => 'text',
		'priority' => 10,
	) );

	Kirki::add_field( 'victory_theme', array(
		'settings' => 'victory[website]',
		'label'    => __( 'Website', 'victory' ),
		'section'  => 'website_section',
		'type'     => 'repeater',
		'priority' => 10,
		'fields'   => array (
			'image_full' => array(
				'label' => __( 'Full Image', 'victory' ),
				'type' => 'image',
			),
			'image_thumb' => array(
				'label' => __( 'Thumbnail Image', 'victory' ),
				'type' => 'image',
			),
			'title' => array(
				'label' => __( 'Title', 'victory' ),
				'type' => 'text',
			),
			'text' => array(
				'label' => __( 'Text', 'victory' ),
				'type' => 'textarea',
			),
		),
	) );
}

function add_contact_section(){
	// Adds Contact section.
	Kirki::add_section( 'victory_contact_section', array(
		'title'          => __( 'Contact', 'victory' ),
		'description'    => __( 'Settings for the contact section', 'victory' ),
		'priority'       => 260,
		'capability'     => 'edit_theme_options',
	) );

	Kirki::add_field( 'victory_theme', array(
		'settings' => 'victory[contact_button]',
		'label'    => __( 'Add contact button', 'victory' ),
		'section'  => 'victory_contact_section',
		'type'     => 'checkbox',
		'priority' => 10,
	) );

	Kirki::add_field( 'victory_theme', array(
		'settings' => 'victory[contact_heading]',
		'label'    => __( 'Section heading', 'victory' ),
		'section'  => 'victory_contact_section',
		'type'     => 'text',
		'priority' => 10,
	) );

	Kirki::add_field( 'victory_theme', array(
		'settings' => 'victory[contact_title]',
		'label'    => __( 'Title', 'victory' ),
		'section'  => 'victory_contact_section',
		'type'     => 'text',
		'priority' => 10,
	) );

	Kirki::add_field( 'victory_theme', array(
		'settings' => 'victory[contact_text]',
		'label'    => __( 'Text', 'victory' ),
		'section'  => 'victory_contact_section',
		'type'     => 'textarea',
		'priority' => 10,
	) );

	Kirki::add_field( 'victory_theme', array(
		'settings' => 'victory[contact_button_text]',
		'label'    => __( 'Send button text', 'victory' ),
		'section'  => 'victory_contact_section',
		'type'     => 'text',
		'priority' => 10,
	) );

	Kirki::add_field( 'victory_theme', array(
		'settings' => 'victory[contact_email]',
		'label'    => __( 'Your email address', 'victory' ),
		'section'  => 'victory_contact_section',
		'type'     => 'text',
		'priority' => 10,
		'description' => 'Contact form submissions will be sent to this email address.',
	) );
}

function add_social_section(){
	// Adds social section.
	Kirki::add_section( 'victory_social_section', array(
		'title'          => __( 'Social Media', 'victory' ),
		'description'    => __( 'Social media settings', 'victory' ),
		'priority'       => 270,
		'capability'     => 'edit_theme_options',
	) );

	Kirki::add_field( 'victory_theme', array(
		'settings' => 'victory[profile_image]',
		'label'    => __( 'Profile image', 'victory' ),
		'section'  => 'victory_social_section',
		'type'     => 'image',
		'priority' => 10,
	) );
			
			Kirki::add_field( 'victory_theme', array(
		'settings' => 'victory[linkedin]',
		'label'    => __( 'Linkedin profile URL', 'victory' ),
		'section'  => 'victory_social_section',
		'type'     => 'text',
		'priority' => 10,
	) );

			Kirki::add_field( 'victory_theme', array(
		'settings' => 'victory[viewbug]',
		'label'    => __( 'Viewbug profile URL', 'victory' ),
		'section'  => 'victory_social_section',
		'type'     => 'text',
		'priority' => 10,
	) );
			
			Kirki::add_field( 'victory_theme', array(
		'settings' => 'victory[unity]',
		'label'    => __( 'Unity Connect profile URL', 'victory' ),
		'section'  => 'victory_social_section',
		'type'     => 'text',
		'priority' => 10,
	) );
			
			Kirki::add_field( 'victory_theme', array(
		'settings' => 'victory[gamejolt]',
		'label'    => __( 'GameJolt profile URL', 'victory' ),
		'section'  => 'victory_social_section',
		'type'     => 'text',
		'priority' => 10,
	) );
			
	Kirki::add_field( 'victory_theme', array(
		'settings' => 'victory[twitter]',
		'label'    => __( 'Twitter profile URL', 'victory' ),
		'section'  => 'victory_social_section',
		'type'     => 'text',
		'priority' => 10,
	) );

	Kirki::add_field( 'victory_theme', array(
		'settings' => 'victory[instagram]',
		'label'    => __( 'Instagram profile URL', 'victory' ),
		'section'  => 'victory_social_section',
		'type'     => 'text',
		'priority' => 10,
	) );

	Kirki::add_field( 'victory_theme', array(
		'settings' => 'victory[medium]',
		'label'    => __( 'Medium profile URL', 'victory' ),
		'section'  => 'victory_social_section',
		'type'     => 'text',
		'priority' => 10,
	) );

	Kirki::add_field( 'victory_theme', array(
		'settings' => 'victory[dribbble]',
		'label'    => __( 'Dribbble profile URL', 'victory' ),
		'section'  => 'victory_social_section',
		'type'     => 'text',
		'priority' => 10,
	) );

	Kirki::add_field( 'victory_theme', array(
		'settings' => 'victory[tumblr]',
		'label'    => __( 'Tumblr profile URL', 'victory' ),
		'section'  => 'victory_social_section',
		'type'     => 'text',
		'priority' => 10,
	) );

	Kirki::add_field( 'victory_theme', array(
		'settings' => 'victory[lastfm]',
		'label'    => __( 'Last.fm profile URL', 'victory' ),
		'section'  => 'victory_social_section',
		'type'     => 'text',
		'priority' => 10,
	) );

	Kirki::add_field( 'victory_theme', array(
		'settings' => 'victory[flickr]',
		'label'    => __( 'Flickr profile URL', 'victory' ),
		'section'  => 'victory_social_section',
		'type'     => 'text',
		'priority' => 10,
	) );
}
