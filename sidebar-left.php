<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package spurs
 */

if ( ! is_active_sidebar( 'left-sidebar' ) ) {
	return;
} ?>

<aside class="<?php bitsy_sidebar_classes(); ?>" id="left-sidebar" role="complementary">
    <?php dynamic_sidebar( 'left-sidebar' ); ?>
</aside><!-- #left-sidebar -->