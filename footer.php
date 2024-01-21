<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blogrank
 */

?>
		</div><!-- .clear -->

	</div><!-- #content .site-content -->

	<footer id="colophon" class="site-footer">

		<?php if ( is_active_sidebar( 'footer' ) ) { ?>

			<div class="footer-columns clear">

				<div class="container clear">
					<div class="grid-wrap">
						<?php dynamic_sidebar( 'footer' ); ?>
					</div>
				</div><!-- .container -->

			</div><!-- .footer-columns -->

		<?php } ?>

		<div class="clear"></div>

		<div id="site-bottom" class="<?php if ( !is_active_sidebar( 'footer' ) ) { echo 'no-footer-widgets'; } ?> clear">

			<div class="container">

			<?php 
				if ( has_nav_menu( 'footer' ) ) {
					wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu', 'menu_class' => 'footer-nav' ) );
				}
			?>	
			
			<div class="site-info">
				<?php
					echo blogrank_option('footer-credit');
				?>
			</div><!-- .site-info -->

			</div><!-- .container -->

		</div>
		<!-- #site-bottom -->
							
	</footer><!-- #colophon -->
	
</div><!-- #page -->

<?php if ( blogrank_option('back-top-on', true) == true) : ?>
	<!-- Back to top -->
	<div id="back-top">
		<a href="#top" title="<?php echo esc_html('Back to top', 'blogrank-pro'); ?>"><span class="genericon genericon-collapse"></span></a>
	</div>

<?php endif; ?>

<?php echo blogrank_option('footer-code'); ?>

<?php wp_footer(); ?>

</body>
</html>
