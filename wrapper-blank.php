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

    <main class="site-main" id="main">
		<?php include bitsy_template_path(); ?>
    </main><!-- #main -->

<?php
get_footer( bitsy_template_base() );
