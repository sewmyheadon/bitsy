<?php
/**
 * @package     bitsy
 * @author      Eric Amundson <eric@ivycat.com>
 *
 * Enqueue scripts and styles.
 */
function bitsy_scripts() {

	wp_enqueue_script( 'bitsy-vendorjs', get_template_directory_uri() . '/assets/js/build/vendor.min.js', array(), '20151215', true );
	wp_enqueue_style( 'bitsy-style', get_stylesheet_directory_uri() . '/style.css' );
	wp_enqueue_script( 'bitsy-navigation', get_template_directory_uri() . '/assets/js/source/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'bitsy-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/source/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'bitsy-js', get_template_directory_uri() . '/assets/js/build/bitsy.min.js', array( 'jquery' ), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bitsy_scripts' );