<?php
/**
 * Template Name: Blank page
 *
 * Template for displaying a blank page.
 *
 * @package spurs
 */

while ( have_posts() ) : the_post();
	get_template_part( '/components/page/content', 'blank' );
endwhile; // end of the loop.