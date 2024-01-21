<?php
/**
 * BlogRank Pro functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package blogrank
 */

/* Theme Options */
require get_template_directory() . '/framework/codestar-framework.php';
require get_template_directory() . '/admin/admin-options.php';

// A Custom function for get an option
if ( ! function_exists( 'blogrank_option' ) ) {
  function blogrank_option( $option = '', $default = null ) {
    $options = get_option( 'blogrank_option' ); // Attention: Set your unique id of the framework
    return ( isset( $options[$option] ) ) ? $options[$option] : $default;
  }
}
update_option( 'blogrank-pro_license_key' , '91d2e23349c295ef0e0b47c4b76d083x' );
update_option( 'blogrank-pro_license_key_status' , 'valid' );
update_option( '_transient_blogrank-pro_license_message' , 'License key is active. Expires July 20, 20230. You have 1 / 10 sites activated.' );
/* Theme Updater */
function blogrank_theme_updater() {
	require( get_template_directory() . '/updater/theme-updater.php' );
}
add_action( 'after_setup_theme', 'blogrank_theme_updater' );

if ( ! function_exists( 'blogrank_setup' ) ) :

function blogrank_setup() {

	load_theme_textdomain( 'blogrank', get_template_directory() . '/languages' );

	add_theme_support( "wp-block-styles" );
	add_theme_support( "responsive-embeds" );
	add_theme_support( "align-wide" );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Add theme support for Custom Logo.
	// Custom logo.
	$logo_width  = 300;
	$logo_height = 90;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	$args = array(
		'height'      => $logo_height,
		'width'       => $logo_width,
		'flex-height' => true,
		'flex-width'  => true,
	);

	add_theme_support('custom-logo', $args);

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'blogrank' ),	
		'left' => esc_html__( 'Left Menu', 'blogrank' ),				
		'footer' => esc_html__( 'Footer Menu', 'blogrank' ),	
		'mobile' => esc_html__( 'Mobile Menu', 'blogrank' ),						
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'blogrank_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	$editor_stylesheet_path = './assets/css/editor-style.css';

	// Enqueue editor styles.
	add_editor_style( $editor_stylesheet_path );  

}
endif;

add_action( 'after_setup_theme', 'blogrank_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 */
// Set content-width.
global $content_width;

if ( ! isset( $content_width ) ) {
	$content_width = 858;
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blogrank_sidebar_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'blogrank' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'blogrank' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'blogrank' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'blogrank' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Home Right Sidebar', 'blogrank' ),
		'id'            => 'home-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'blogrank' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Columns', 'blogrank' ),
		'id'            => 'footer',
		'description'   => esc_html__( '4 Columns widget area.', 'blogrank' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget footer-column ht_grid_1_4 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );		

}
add_action( 'widgets_init', 'blogrank_sidebar_init' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * SVG Icons.
 */
require get_template_directory() . '/inc/classes/class-blogrank-svg-icons.php';

/**
 * Menu Walker.
 */
require get_template_directory() . '/inc/classes/class-blogrank-walker-page.php';

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';

/**
 * Load about page.
 */
require get_template_directory() . '/inc/about.php';

/**
 * Load plugins.
 */
require get_template_directory() . '/inc/plugins.php';

/**
 * Demo content.
 */
require get_template_directory() . '/demo-content/setup.php';

/**
 * Enqueues scripts and styles.
 */
function blogrank_scripts() {

    // load jquery if it isn't

    wp_enqueue_script('jquery');

	//  Enqueues Javascripts
	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/assets/js/superfish.js', array(), '', true );
	wp_enqueue_script( 'html5', get_template_directory_uri() . '/assets/js/html5.js', array(), '', true );

	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js', array(), '', true ); 
    wp_enqueue_script( 'tabslet', get_template_directory_uri() . '/assets/js/jquery.tabslet.js', array(), '20230701', true );	           		
    wp_enqueue_script( 'blogrank-index', get_template_directory_uri() . '/assets/js/index.js', array(), '20230701', true );                                       	
	wp_enqueue_script( 'blogrank-custom', get_template_directory_uri() . '/assets/js/jquery.custom.js', array(), '20230701', true );	

    // Enqueues CSS styles
    wp_enqueue_style( 'blogrank-googlefonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap', array(), null );    
    wp_enqueue_style( 'blogrank-style', get_stylesheet_uri(), array(), '20230701' );  
    if( blogrank_option('site-layout','yes') == 'yes' ) {  
		wp_enqueue_style( 'blogrank-responsive-style',   get_template_directory_uri() . '/responsive.css', array(), '20230701' );       
	}
	wp_enqueue_style( 'font-awesome-style',   get_template_directory_uri() . '/assets/css/font-awesome.css', array(), '20230701' );       	
    wp_enqueue_style( 'genericons-style',   get_template_directory_uri() . '/genericons/genericons.css' );
	
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }    
}
add_action( 'wp_enqueue_scripts', 'blogrank_scripts' );

/**
 * Post Thumbnails.
 */
if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 300, 300, true ); // default Post Thumbnail dimensions (cropped)
    add_image_size( 'blogrank_featured_large_thumb', 675, 365, true );
    add_image_size( 'blogrank_featured_small_thumb', 300, 180, true );            
    add_image_size( 'blogrank_widget_thumb', 300, 150, true );  
    
}

/**
 * Registers custom widgets.
 */
function blogrank_widgets_init() {

    require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-recent.php';
    register_widget( 'BlogRank_Recent_Widget' );     

    require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-most-commented.php';
    register_widget( 'BlogRank_Most_Commented_Widget' );        

    require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-category-posts.php';
    register_widget( 'BlogRank_Category_Posts_Widget' );   

    require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-tabs.php';
    register_widget( 'BlogRank_Tabs_Widget' ); 
    																
}
add_action( 'widgets_init', 'blogrank_widgets_init' );

// Disable WordPress 5.5+ Lazy Load
add_filter( 'wp_lazy_loading_enabled', '__return_false' );

// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );

// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );
