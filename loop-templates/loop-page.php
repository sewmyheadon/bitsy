<?php
/**
 * @package     bitsy
 * @author      Eric Amundson <eric@ivycat.com>
 */

while ( have_posts() ) : the_post();

	get_template_part( 'components/page/content', 'page' );

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile; // end of the loop.