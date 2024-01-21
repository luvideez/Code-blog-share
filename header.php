<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blogrank
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="HandheldFriendly" content="true">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<?php wp_head(); ?>
<style type="text/css">
	/* Primary Color */
	button,
	.btn,
	input[type="submit"],
	input[type="reset"],
	input[type="button"],
	#back-top a:hover span,
	.widget_tag_cloud .tagcloud a:hover,
	.sf-menu li a:hover .menu-text,
	.sf-menu li.current-menu-item a:hover .menu-text,
    .widget_tag_cloud .tagcloud a:hover,
    .sidebar .widget-posts-thumbnail ul > li.post-list:nth-of-type(4) span,
    .widget_tag_cloud .tagcloud a:hover,
	#left-menu,
	#left-menu li a,
	.sidebar .wp-block-search .wp-block-search__button,
	#wp-calendar caption,
	#featured-grid .hentry:nth-of-type(1) .entry-category a,
	.sidebar .widget h2:before, .sidebar .widget .widget-title:before,
	.entry-related h3::before {
		background-color: <?php echo blogrank_option('primary-color'); ?>;
	}	
    a, 
    a:visited,
    .site-title a, 
    .widget ul li a:hover,
    .widget-title a:hover,
	.site-title a,
	a:hover,
	.content-loop .entry-title a:hover,
	.byline .entry-author a:hover,
	.byline .entry-comment a:hover,
	.breadcrumbs .breadcrumbs-nav a:hover,
	article.hentry .edit-link a,
	.author-box a,
	.page-content a,
	.page-content a:visited,
	.entry-content a,
	.entry-content a:visited,
	.comment-author a,
	.comment-content a,
	.comment-reply-title small a:hover,
	.sidebar .widget a:hover,
	.sidebar .widget ul li a:hover,
	.sidebar .widget ol li a:hover,
	.sidebar .widget .widget-title a:hover,
	#post-nav a:hover h4,    
	.content-loop .entry-meta .entry-category a, 	
  	.single #primary .entry-header .entry-category a,
    .pagination .page-numbers.current,
    #site-bottom .site-info a:hover,
    #site-bottom .footer-nav li a:hover,
    .site-footer .widget a,
    .site-footer .widget .widget-title a:hover,
    .site-footer .widget ul > li a:hover,
    .site-footer .widget_tabs ul.horizontal li.active a,
    .site-footer .widget_tabs ul.horizontal li.active .fa,
	.single #primary .entry-header .entry-meta .entry-category a,
	.sidebar .widget_tabs ul.horizontal li.active a, 
	.site-footer .widget_tabs ul.horizontal li.active a,
	.sidebar .widget_tabs ul.horizontal li.active .fa, 
	.site-footer .widget_tabs ul.horizontal li.active .fa,
	.content-loop .read-more a:hover,
	.sidebar.left-widget-area .widget-posts-thumbnail ul > li a:hover .entry-wrap {
    	color: <?php echo blogrank_option('primary-color'); ?>;
    }
    #left-menu li li a:hover,
    .sf-menu li li a:hover .menu-text,
    .sf-arrows ul li a.sf-with-ul:hover:after,
    .widget_tag_cloud .tagcloud a {
    	color: <?php echo blogrank_option('primary-color'); ?> !important;
    }

	.sidebar .widget-title a:hover,
	.author-box a:hover,
	.page-content a:hover,
	.entry-content a:hover,
	article.hentry .edit-link a:hover,
	.comment-content a:hover {
		color: <?php echo blogrank_option('secondary-color'); ?> 
	}
	.widget_tag_cloud .tagcloud a,
	.widget_tag_cloud .tagcloud a:hover {
		border-color: <?php echo blogrank_option('primary-color'); ?>		
	}
	#featured-content .entry-category a {
		background-color: <?php echo blogrank_option('secondary-color'); ?>;
	}
    <?php if ( blogrank_option('hide-sidebar-on',false) == true): ?>
	    @media only screen and (max-width: 479px) {
	    	#secondary {
	    		display: none !important;
	    	}	
	    }
	<?php endif; ?>

	@media only screen and (min-width: 1200px) {
		.content-loop .thumbnail-link {
			width: <?php  echo blogrank_option('loop-featured-width','220') . 'px'; ?>;
		}
	}
</style>
<?php echo blogrank_option('header-code'); ?>
</head>

<body <?php body_class(); ?>>

<?php
	//wp_body_open hook from WordPress 5.2
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else { 
	    do_action( 'wp_body_open' ); 
	}
?>

<div id="page" class="site <?php if (is_admin_bar_showing()) { echo 'has-admin-bar'; } else { echo 'no-admin-bar'; }?>">

	<a class="skip-link screen-reader-text" href="#content"><?php echo esc_html( 'Skip to content', 'blogrank' ); ?></a>

	<header id="masthead" class="site-header clear">

		<div class="site-start clear">

			<div class="container">

			<div class="site-branding">

				<?php if ( has_custom_logo() ) { ?>

					<div id="logo">
						<?php the_custom_logo(); ?>
					</div><!-- #logo -->

				<?php } ?>

				<?php if (display_header_text()==true) { ?>

					<div class="site-title-desc">

						<div class="site-title">
							<a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo('name'); ?></a>
						</div><!-- .site-title -->	

						<div class="site-description">
							<?php bloginfo('description'); ?>
						</div><!-- .site-desc -->

					</div><!-- .site-title-desc -->

				<?php } ?>

			</div><!-- .site-branding -->	

			<nav id="primary-nav" class="primary-navigation">

				<?php 
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'sf-menu', 'link_before' => '<span class="menu-text">','link_after'=>'</span>' ) );
					}
				?>

			</nav><!-- #primary-nav -->

			<?php if ( blogrank_option('header-search-on', true) == true ) : ?> 
				<div class="header-search">
					<form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input type="search" name="s" class="search-input" placeholder="<?php esc_attr_e('Search', 'blogrank'); ?>" autocomplete="off">
						<button type="submit" class="search-submit"><span class="genericon genericon-search"></span></button>		
					</form>
				</div><!-- .header-search -->
			<?php endif; ?>

			<div class="header-toggles">
				<button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
					<span class="toggle-inner">
						<span class="toggle-icon">
							<i class="fa fa-bars"></i>
						</span>
					</span>
				</button><!-- .nav-toggle -->
			</div><!-- .header-toggles -->	

			<?php if ( blogrank_option('header-search-on', true) == true ) : ?> 
				<div class="header-search-icon">
					<span class="search-icon">
						<span class="genericon genericon-search"></span>
						<span class="genericon genericon-close"></span>			
					</span>
				</div>
			<?php endif; ?>

		</div><!-- .site-start -->			

		</div><!-- .container -->

	</header><!-- #masthead -->

	<div class="menu-modal cover-modal header-footer-group" data-modal-target-string=".menu-modal">

		<div class="menu-modal-inner modal-inner">

			<div class="menu-wrapper section-inner">

				<div class="menu-top">

					<button class="toggle close-nav-toggle fill-children-current-color" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".menu-modal">
						<span class="toggle-text"><?php esc_html_e( 'Close Menu', 'blogrank' ); ?></span>
						<?php blogrank_the_theme_svg( 'cross' ); ?>
					</button><!-- .nav-toggle -->

					<?php

					$mobile_menu_location = '';

					// If the mobile menu location is not set, use the secondary location as fallbacks, in that order.
					if ( has_nav_menu( 'mobile' ) ) {
						$mobile_menu_location = 'mobile';
					} elseif ( has_nav_menu( 'primary' ) ) {
						$mobile_menu_location = 'primary';
					}

					?>

					<nav class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'blogrank' ); ?>" role="navigation">

						<ul class="modal-menu reset-list-style">

						<?php
						if ( $mobile_menu_location ) {

							wp_nav_menu(
								array(
									'container'      => '',
									'items_wrap'     => '%3$s',
									'show_toggles'   => true,
									'theme_location' => $mobile_menu_location,
								)
							);

						} else {

							wp_list_pages(
								array(
									'match_menu_classes' => true,
									'show_toggles'       => true,
									'title_li'           => false,
									'walker'             => new BlogRank_Walker_Page(),
								)
							);

						}
						?>

						</ul>

					</nav>

				</div><!-- .menu-top -->

			</div><!-- .menu-wrapper -->

		</div><!-- .menu-modal-inner -->

	</div><!-- .menu-modal -->		
		
	<div id="content" class="site-content container">

		<div class="clear">

		<?php get_template_part('template-parts/sidebar', 'left'); ?>
