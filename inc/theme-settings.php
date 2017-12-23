<?php
/**
 * Check and setup theme's default settings
 *
 * @package spurs
 *
 */

if ( ! function_exists( 'bitsy_setup_theme_default_settings' ) ) :
	function bitsy_setup_theme_default_settings() {

		// Check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .

		// Latest blog posts style.
		$bitsy_posts_index_style = get_theme_mod( 'bitsy_posts_index_style' );
		if ( '' == $bitsy_posts_index_style ) {
			set_theme_mod( 'bitsy_posts_index_style', 'default' );
		}

		// Sidebar position.
		$bitsy_sidebar_position = get_theme_mod( 'bitsy_sidebar_position' );
		if ( '' == $bitsy_sidebar_position ) {
			set_theme_mod( 'bitsy_sidebar_position', 'right' );
		}

		// Container width.
		$bitsy_container_type = get_theme_mod( 'bitsy_container_type' );
		if ( '' == $bitsy_container_type ) {
			set_theme_mod( 'bitsy_container_type', 'container' );
		}
	}
endif;

add_action( 'after_setup_theme', 'bitsy_setup_theme_default_settings' );