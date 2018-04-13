<?php
/**
 * The main wrapper.
 *
 * This is a meta file and not common in every WordPress theme. It's
 * inspired by Scribu and the Roots/Sage project.
 * It wraps around the page templates to remove repeated code and keep
 * the theme DRY.
 *
 * @link http://scribu.net/wordpress/theme-wrappers.html
 *
 * @package bitsy
 */

get_header( bitsy_template_base() ); ?>
    <div class="row">
		<?php bitsy_left_sidebar(); ?>
        <div id="primary" class="content-area <?php bitsy_content_classes(); ?>" role="main">
			<?php include bitsy_template_path(); ?>
        </div><!-- #primary -->
		<?php bitsy_right_sidebar(); ?>
    </div>
<?php //get_sidebar( bitsy_template_base() ); Might use as wide footer widget area
get_footer( bitsy_template_base() );
