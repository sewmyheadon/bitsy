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

	</div><!-- #main -->

	<footer id="footer" class="site-footer <?php bitsy_footer_class ?>" role="contentinfo">
		<div class="container">

			<?php get_template_part( 'components/footer/footer', 'widgets' ); ?>
	
			<?php get_template_part( 'components/footer/site', 'info' ); ?>

		</div>
	</footer><!-- #footer -->

<?php wp_footer(); ?>

</body>
</html>
