<?php
/**
 * bitsy Theme Customizer.
 *
 * @package bitsy
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'bitsy_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function bitsy_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'bitsy_customize_register' );

if ( ! function_exists( 'bitsy_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function bitsy_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section( 'bitsy_theme_layout_options', array(
			'title'       => __( 'Theme Layout Settings', 'spurs' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Container width and sidebar defaults', 'spurs' ),
			'priority'    => 160,
		) );

		//select sanitization function
		function bitsy_theme_slug_sanitize_select( $input, $setting ) {

			//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
			$input = sanitize_key( $input );

			//get the list of possible select options
			$choices = $setting->manager->get_control( $setting->id )->choices;

			//return input if valid or return default option
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

		}

		$wp_customize->add_setting( 'bitsy_container_type', array(
			'default'           => 'container',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'bitsy_theme_slug_sanitize_select',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'bitsy_container_type', array(
					'label'       => __( 'Container Width', 'spurs' ),
					'description' => __( 'Use fixed or fluid container?', 'spurs' ),
					'section'     => 'bitsy_theme_layout_options',
					'settings'    => 'bitsy_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed-width container', 'spurs' ),
						'container-fluid' => __( 'Full-width container', 'spurs' ),
					),
					'priority'    => '10',
				)
			) );

		$wp_customize->add_setting( 'bitsy_sidebar_position', array(
			'default'           => 'right',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'bitsy_sidebar_position', array(
					'label'             => __( 'Default Sidebar Position', 'spurs' ),
					'description'       => __( '<b>Applies to all pages and posts.</b> <br />
												<b>Select:</b> right, left, both, or none. <br />
												<b>Note:</b> you can override on individual pages.',
						'spurs' ),
					'section'           => 'bitsy_theme_layout_options',
					'settings'          => 'bitsy_sidebar_position',
					'type'              => 'select',
					'sanitize_callback' => 'bitsy_theme_slug_sanitize_select',
					'choices'           => array(
						'right' => __( 'Right sidebar', 'spurs' ),
						'left'  => __( 'Left sidebar', 'spurs' ),
						'both'  => __( 'Left & Right sidebars', 'spurs' ),
						'none'  => __( 'No sidebar', 'spurs' ),
					),
					'priority'          => '20',
				)
			) );
	}
} // endif function_exists( 'bitsy_theme_customize_register' ).
add_action( 'customize_register', 'bitsy_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'bitsy_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function bitsy_customize_preview_js() {
		wp_enqueue_script( 'bitsy_customizer', get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ), '20130508', true );
	}
}
add_action( 'customize_preview_init', 'bitsy_customize_preview_js' );