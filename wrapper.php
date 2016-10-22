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

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php include bitsy_template_path(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar( bitsy_template_base() );
get_footer( bitsy_template_base() ); 
?>
