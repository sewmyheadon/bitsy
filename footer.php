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

	<footer id="footer" class="site-footer" role="contentinfo">
		<div class="container">

			<div class="row double">
				<div class="6u 12u$(medium)">
					<h2>Aliquam Interdum</h2>
					<p>Ornare interdum nascetur enim lobortis nunc amet placerat pellentesque nascetur in adipiscing. Interdum amet accumsan placerat commodo ut amet aliquam blandit nunc tempor lobortis nunc non. Mi accumsan. Justo aliquet massa adipiscing cubilia eu accumsan id. Arcu accumsan faucibus vis ultricies adipiscing ornare ut. Mi accumsan. Justo aliquet massa adipiscing cubilia eu accumsan id lorem ipsum dolor.</p>
				</div>
				<div class="3u 6u(medium) 12u$(small)">
					<h3>Accumsan</h3>
					<ul class="alt">
						<li>Nascetur nunc varius commodo.</li>
						<li>Vis id faucibus montes tempor</li>
						<li>massa amet lobortis vel.</li>
						<li>Nascetur nunc varius commodo.</li>
					</ul>
				</div>
				<div class="3u$ 6u$(medium) 12u$(small)">
					<h3>Faucibus</h3>
					<ul class="alt">
						<li>Nascetur nunc varius commodo.</li>
						<li>Vis id faucibus montes tempor</li>
						<li>massa amet lobortis vel.</li>
						<li>Nascetur nunc varius commodo.</li>
					</ul>
				</div>
			</div>
			
			<div class="copyright site-info">
				&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?> • All rights reserved. • <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'bitsy' ), 'bitsy', '<a href="https://ivycat.com" rel="designer">IvyCat</a>' ); ?>
			</div><!-- .copyright & .site-info @todo combine styles -->
		</div>
	</footer><!-- #footer -->

<?php wp_footer(); ?>

</body>
</html>
