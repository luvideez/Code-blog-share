<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blogrank
 */

get_header(); ?>

	<div class="content-wrap">

	<div id="primary" class="content-area clear">
				
		<main id="main" class="site-main clear">

			<div class="breadcrumbs clear">		
				<h1>
					<?php echo wp_kses_post( get_the_archive_title('') ); ?>					
				</h1>	
				<?php
					if (is_category() && (blogrank_option('loop-description-on',true) == true)) {
						$term_description = term_description();
						if ( ! empty( $term_description ) ) {
							printf( '<div class="taxonomy-description">%s</div>', wp_kses_post($term_description) );
						}
					}
				?>			
			</div><!-- .breadcrumbs -->

			<div id="recent-content" class="content-loop">

				<?php

				if ( have_posts() ) :	
				
				$i = 1;		
					
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part('template-parts/content', 'loop');

					if ( blogrank_option('archive-ad-on-1',true) && ( $i == blogrank_option('archive-ad-pos-1','2') ) && blogrank_option('archive-ad-1-code') ) {
						echo '<div class="hentry custom-ad content-ad">' . blogrank_option('archive-ad-1-code') . '</div>';
					}

					if ( blogrank_option('archive-ad-on-2',true) && ( $i == blogrank_option('archive-ad-pos-2','5') ) && blogrank_option('archive-ad-2-code') ) {
						echo '<div class="hentry custom-ad content-ad">' . blogrank_option('archive-ad-2-code') . '</div>';
					}					

					if ( blogrank_option('archive-ad-on-3',true) && ( $i == blogrank_option('archive-ad-pos-3','8') ) && blogrank_option('archive-ad-3-code') ) {
						echo '<div class="hentry custom-ad content-ad">' . blogrank_option('archive-ad-3-code') . '</div>';
					}
					
					$i++;

				endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; 

				?>

			</div><!-- #recent-content -->

			<?php get_template_part( 'template-parts/pagination', '' ); ?>

		</main><!-- .site-main -->

	</div><!-- #primary -->

	<?php get_sidebar(); ?>

	</div><!-- .content-wrap -->
	
<?php get_footer(); ?>

