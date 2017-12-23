<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bitsy
 */
/**
 * Adds custom classes to the array of header classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
add_action( 'bitsy_header_class', 'bitsy_output_header_class' );
function bitsy_output_header_class() {
	// Adds a class of alt to home and landing pages.
	if ( is_front_page() ) {
		echo 'alt';
	}
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
function bitsy_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}

add_filter( 'body_class', 'bitsy_body_classes' );

/**
 * Adds custom classes to the array of footer classes.
 *
 * @param array $classes Classes for the footer element.
 *
 * @return array
 */
function bitsy_output_footer_class() {
	// Adds a class of alt to home and landing pages.
	if ( is_front_page() ) {
		echo 'alt';
	}
}

add_action( 'bitsy_footer_class', 'bitsy_output_footer_class' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function bitsy_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}

add_action( 'wp_head', 'bitsy_pingback_header' );

/**
 * Creating theme hooks
 */
/**
 * Create header class hook
 */
function bitsy_header_class() {
	do_action( 'bitsy_header_class' );
}

/**
 * Create content class hook
 */
function bitsy_content_class() {
	do_action( 'bitsy_content_class' );
}

/**
 * Create footer class hook
 */
function bitsy_footer_class() {
	do_action( 'bitsy_footer_class' );
}

/**
 * Declare Woo Support
 */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

/**
 * Remove WordPress and WooCommerce Generator tags
 */
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wc_generator_tag' );