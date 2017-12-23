<?php
/**
 * The right sidebar containing the main widget area.
 *
 * @package spurs
 */

if ( ! is_active_sidebar( 'right-sidebar' ) ) {
	return;
} ?>

<aside class="<?php bitsy_sidebar_classes(); ?>" id="right-sidebar" role="complementary">
	<?php dynamic_sidebar( 'right-sidebar' ); ?>
</aside><!-- #right-sidebar -->