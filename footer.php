<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bitsy
 */

?>

	</div><!-- #content -->

	<footer id="footer" class="site-footer" role="contentinfo">
		<div class="container">

			<div class="site-info">
				<span class="sep"> | </span>
				<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'bitsy' ), 'bitsy', '<a href="https://ivycat.com" rel="designer">Eric Amundson</a>' ); ?>
			</div><!-- .site-info -->
			
			<div class="copyright">
				&copy; Untitled. All rights reserved.
			</div>
		</div>
	</footer><!-- #footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
