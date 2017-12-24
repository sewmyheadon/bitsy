<?php
/**
 * @package     bitsy
 * @author      Eric Amundson <eric@ivycat.com>
 */

/**
 * Count number of widgets in a sidebar and add classes to widget areas
 * so widgets can be displayed one, two, or three per row
 */
if ( ! function_exists( 'bitsy_slbd_count_widgets' ) ) {
	function bitsy_slbd_count_widgets( $sidebar_id ) {
		// If loading from front page, consult $_wp_sidebars_widgets rather than options
		// to see if wp_convert_widget_settings() has made manipulations in memory.
		global $_wp_sidebars_widgets;
		if ( empty( $_wp_sidebars_widgets ) ) {
			$_wp_sidebars_widgets = get_option( 'sidebars_widgets', array() );
		}
		$sidebars_widgets_count = $_wp_sidebars_widgets;

		if ( isset( $sidebars_widgets_count[$sidebar_id] ) ) {
			$widget_count   = count( $sidebars_widgets_count[$sidebar_id] );
			$widget_classes = 'widget-count-' . count( $sidebars_widgets_count[$sidebar_id] );

			if ( $widget_count >= 4 ) {
				// Four or more widgets active
				$widget_classes .= ' 3u';
			} elseif ( 3 == $widget_count ) {
				// Three widgets active
				$widget_classes .= ' 4u';
			} elseif ( 2 == $widget_count ) {
				// Two widgets active
				$widget_classes .= ' 6u';
			} elseif ( 1 == $widget_count ) {
				// One widget active
				$widget_classes .= ' 12u';
			}

			return $widget_classes;
		}
	}
}
/**
 * Initializes themes widgets.
 */
if ( ! function_exists( 'bitsy_widgets_init' ) ) {

	function bitsy_widgets_init() {

		register_sidebar( array(
			'name'          => __( 'Right Sidebar', 'spurs' ),
			'id'            => 'right-sidebar',
			'description'   => 'Right sidebar widget area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Left Sidebar', 'spurs' ),
			'id'            => 'left-sidebar',
			'description'   => 'Left sidebar widget area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Footer Full', 'spurs' ),
			'id'            => 'footer-full',
			'description'   => 'Widget area below main content and above footer',
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s ' . bitsy_slbd_count_widgets( 'footer-full' ) . '">',
			'after_widget'  => '</div><!-- .footer-widget -->',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

	}
}
add_action( 'widgets_init', 'bitsy_widgets_init' );