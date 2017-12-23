<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bitsy
 */

if ( ! function_exists( 'bitsy_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function bitsy_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
		/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'bitsy' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
		/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'bitsy' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'bitsy_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function bitsy_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'bitsy' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'bitsy' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'bitsy' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'bitsy' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
					/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'bitsy' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'bitsy' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function bitsy_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'bitsy_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );
		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );
		set_transient( 'bitsy_categories', $all_the_cool_cats );
	}
	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so components_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so components_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in bitsy_categorized_blog.
 */
function bitsy_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'bitsy_categories' );
}

add_action( 'edit_category', 'bitsy_category_transient_flusher' );
add_action( 'save_post', 'bitsy_category_transient_flusher' );

/**
 * Left sidebar loading logic
 */
if ( ! function_exists( 'bitsy_left_sidebar' ) ) {

	function bitsy_left_sidebar() {
		$sidebar_position = get_theme_mod( 'bitsy_sidebar_position' );

		if ( ! is_page_template( 'page-templates/full-width.php' ) ) {
			if ( is_page_template( 'page-templates/left-sidebar.php' ) || is_page_template( 'page-templates/both-sidebars.php' ) || 'left' === $sidebar_position || 'both' === $sidebar_position ) {
				get_sidebar( 'left' );
			}
		}
	}

}

/**
 * Right sidebar loading logic
 */
if ( ! function_exists( 'bitsy_right_sidebar' ) ) {

	function bitsy_right_sidebar() {
		$sidebar_position = get_theme_mod( 'bitsy_sidebar_position' );

		if ( ! is_page_template( 'page-templates/full-width.php' ) ) {
			if ( is_page_template( 'page-templates/right-sidebar.php' ) || is_page_template( 'page-templates/both-sidebars.php' ) || 'right' === $sidebar_position || 'both' === $sidebar_position ) {
				get_sidebar( 'right' );
			}
		}
	}

}

/**
 * Content classes loading logic
 */
if ( ! function_exists( 'bitsy_content_classes' ) ) {

	/**
	 * Prints classes for content area div depending on active sidebars.
	 *
	 * Usage add this function between the class quotes like so
	 *      <div class="<?php bitsy_content_classes(); ?>" id="primary">
	 */
	function bitsy_content_classes() {
		$sidebar_position = get_theme_mod( 'bitsy_sidebar_position' );
		$html             = '';

		if ( is_page_template( 'page-templates/left-sidebar.php' ) && is_active_sidebar( 'left-sidebar' ) ) {
			$html .= 'left-sidebar-template 8u 12u(small) content-area';
			echo $html; // WPCS: XSS OK.

		} elseif ( is_page_template( 'page-templates/right-sidebar.php' ) && is_active_sidebar( 'right-sidebar' ) ) {
			$html .= 'right-sidebar-template 8u 12u(small) content-area';
			echo $html; // WPCS: XSS OK.

		} elseif ( is_page_template( 'page-templates/both-sidebars.php' ) && ( is_active_sidebar( 'left-sidebar' ) ) && is_active_sidebar( 'right-sidebar' ) ) {
			$html .= 'both-sidebar-template 6u 12u(small) content-area';
			echo $html; // WPCS: XSS OK.

		} elseif ( is_page_template( 'page-templates/full-width.php' ) ) {
			$html .= 'full-width-template 12u content-area';
			echo $html; // WPCS: XSS OK.

		} elseif ( 'right' === $sidebar_position || 'left' === $sidebar_position ) {

			if ( is_active_sidebar( 'right-sidebar' ) || is_active_sidebar( 'left-sidebar' ) ) {
				$html .= '8u 12u(small) content-area';
			} else {
				$html .= '12u content-area';
			}
			echo $html; // WPCS: XSS OK.

		} elseif ( is_active_sidebar( 'right-sidebar' ) && is_active_sidebar( 'left-sidebar' ) ) {
			$html = '';
			if ( 'both' === $sidebar_position ) {
				$html .= '6u 12u(small) content-area';
			} else {
				$html .= '12u content-area';
			}
			echo $html; // WPCS: XSS OK.

		} else {
			echo '12u content-area';
		}
	}
}

/**
 * Sidebar classes
 */
if ( ! function_exists( 'bitsy_sidebar_classes' ) ) {

	/**
	 * Prints classes for sidebars area div depending on active sidebars.
	 *
	 * Add this function between the class quotes like so
	 *      <div class="<?php bitsy_sidebar_classes(); ?>">
	 */
	function bitsy_sidebar_classes() {
		$sidebar_position = get_theme_mod( 'bitsy_sidebar_position' );
		$html = '';

		if ( is_page_template( 'page-templates/both-sidebars.php' ) && ( is_active_sidebar( 'left-sidebar' ) ) && is_active_sidebar( 'right-sidebar' ) ) {
			$html .= '3u 12u(small) widget-area';
			echo $html; // WPCS: XSS OK.
		} elseif ( ( is_page_template( 'page-templates/left-sidebar.php' ) && is_active_sidebar( 'left-sidebar' ) ) ||
		           ( is_page_template( 'page-templates/right-sidebar.php' ) && is_active_sidebar( 'right-sidebar' ) ) ) {
			$html .= '4u 12u(small) widget-area';
			echo $html; // WPCS: XSS OK.
		} elseif ( ( 'right' === $sidebar_position || 'left' === $sidebar_position ) && ( is_active_sidebar( 'right-sidebar' ) || is_active_sidebar( 'left-sidebar' ) ) ) {
			$html .= '4u 12u(small) content-area';
			echo $html; // WPCS: XSS OK.
		} elseif ( ( 'both' === $sidebar_position ) && ( is_active_sidebar( 'right-sidebar' ) && is_active_sidebar( 'left-sidebar' ) ) ) {
			$html .= '3u 12u(small) content-area';
			echo $html; // WPCS: XSS OK.
		} else {
			$html .= '12u widget-area';
			echo $html; // WPCS: XSS OK.
		}
	}

}




