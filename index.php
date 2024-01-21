<?php get_header(); ?>
	
	<div class="content-wrap">

		<?php get_template_part('template-parts/content', 'featured'); ?>

		<div id="primary" class="content-area clear">

			<main id="main" class="site-main clear">

				<?php if ( is_active_sidebar( 'home' ) ) { ?>

				<div id="recent-content">

					<?php dynamic_sidebar( 'home' ); ?>

				</div><!-- #recent-content -->	

				<?php } else { ?>

				<div id="recent-content" class="content-loop clear">

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

				<?php } ?>							

			</main><!-- .site-main -->

		</div><!-- #primary -->

		<?php get_sidebar(); ?>

	</div><!-- .content-wrap -->

<?php get_footer(); ?>
