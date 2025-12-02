<?php
/**
 * Dogghouse FCT functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Dogghouse_FCT
 * @since 1.0
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dogghouse_fct_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/dogghouse_fct
	 * If you're building a theme based on Dogghouse FCT, use a find and replace
	 * to change 'dogghouse_fct' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'dogghouse_fct' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'dogghouse_fct' ),
		'social' => __( 'Social Links Menu', 'dogghouse_fct' ),
		'footer' => __( 'Footer Menu', 'dogghouse_fct' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

}
add_action( 'after_setup_theme', 'dogghouse_fct_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dogghouse_fct_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Left', 'dogghouse_fct' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your footer, on the left.', 'dogghouse_fct' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Right', 'dogghouse_fct' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer, on the right.', 'dogghouse_fct' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'dogghouse_fct_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Dogghouse FCT 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function dogghouse_fct_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'dogghouse_fct' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'dogghouse_fct_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Dogghouse FCT 1.0
 */
function dogghouse_fct_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'dogghouse_fct_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function dogghouse_fct_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'dogghouse_fct_pingback_header' );


/**
 * Enqueue scripts and styles.
 */
function dogghouse_fct_scripts() {
	// Theme stylesheet.
	wp_enqueue_style( 'dogghouse_fct-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	/* Begin Custom Enqueues */
    
  /* jQuery Cycle2 */    
  wp_enqueue_script( 'jquery-cycle', get_template_directory_uri() . '/assets/js/jquery.cycle2.min.js', array( 'jquery' ), date('YmdHis'), true );
    
  /* jQuery Cycle2 Carousel */
  wp_enqueue_script ( 'cycle-carousel', get_template_directory_uri() . '/assets/js/jquery.cycle2.carousel.min.js', array( 'jquery' ), date('YmdHis'), true );
    
  /* jQuery ImagesLoaded */
  wp_enqueue_script ( 'images-loaded', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array( 'jquery' ), date('YmdHis'), true );
    
  /* jQuery Fancybox */
  wp_enqueue_script ( 'fancybox', get_template_directory_uri() . '/assets/js/fancybox/dist/jquery.fancybox.min.js', array( 'jquery' ), date('YmdHis'), true );
  wp_enqueue_script ( 'fancybox-media', get_template_directory_uri() . '/assets/js/fancybox/src/js/media.js', array( 'jquery' ), date('YmdHis'), true );
  wp_enqueue_style( 'fancy-style', get_template_directory_uri() . '/assets/js/fancybox/dist/jquery.fancybox.min.css', array(), date('YmdHis') );
    
  /* jQuery Stellar Parallax */
  wp_enqueue_script ( 'stellar-parallax', get_template_directory_uri() . '/assets/js/jquery.stellar.min.js' );
	
  /* jQuery Masonry */
   wp_enqueue_script ( 'masonry', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', array( 'jquery' ), date('YmdHis'), true );
    
  /* Fonts on Fonts on Fonts */
  wp_enqueue_style ( 'font-awesome', get_template_directory_uri() . '/assets/fonts/font-awesome-5.15.4/css/all.min.css' );    
    
  wp_enqueue_style ( 'ion-icons', get_template_directory_uri() . '/assets/fonts/ionicons-2.0.1/css/ionicons.min.css' );  
  
  wp_enqueue_script( 'site-functions', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), date('YmdHis'), true );

  wp_enqueue_script('jquery-tabs', '//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array('jquery', 'jquery-ui-core') );
    
   wp_enqueue_style('jquery-ui-css', '//code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css', array('jquery', 'jquery-ui-core') );
}
add_action( 'wp_enqueue_scripts', 'dogghouse_fct_scripts' );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function dogghouse_fct_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'dogghouse_fct_front_page_template' );

/** 
 * Set SASS color vars with colorpicker fields from the ACF Options page 
 */
define('WP_SCSS_ALWAYS_RECOMPILE', true);

add_filter( 'wp_scss_variables','wp_scss_set_variables' );

function wp_scss_set_variables() {
  $primary = get_field( 'primary', 'option' ) ? : '#3F5563';
  $secondary = get_field( 'secondary', 'option' ) ? : '#3D403F';
	$tertiary = get_field( 'tertiary', 'option' ) ? : '#477982';
	$darkgray = get_field( 'medgray', 'option' ) ? : '#3e4140';
	$medgray = get_field( 'darkgray', 'option' ) ? : '#B4B5B4';
	$lightgray = get_field( 'lightgray', 'option' ) ? : '#F6F6F6';
	
	$typekit_fonts_script = get_field('typekit_fonts_script', 'option') ? : 'url("'.get_template_directory_uri().'/style.css");';
	$typekit_font_headings = get_field( 'typekit_font_headings', 'option' ) ? : 'Georgia, serif';
	$typekit_font_main = get_field( 'typekit_font_main', 'option' ) ? : 'Arial, sans-serif';
	
	$google_fonts_script = get_field('google_fonts_script', 'option') ? : 'url("'.get_template_directory_uri().'/style.css");';
	$google_font_headings = get_field('google_font_headings', 'option') ? : $typekit_font_headings;
	$google_font_main = get_field('google_font_main', 'option') ? : $typekit_font_main;
	
	$mainfont = $google_font_main ? : $typekit_font_main;
	$headingfont = $google_font_headings ? : $typekit_font_headings;
    
	$variables = array(
		'primary' => $primary,
		'secondary' => $secondary,
		'tertiary' => $tertiary,
		'medgray' => $medgray,
		'darkgray' => $darkgray,
		'lightgray' => $lightgray,
		'import-google-fonts' => $google_fonts_script,
		'import-typekit-fonts' => $typekit_fonts_script,
		'mainfont' => $mainfont,
		'headingfont' => $headingfont,
	);
    return $variables;
}

/**
 * Create ACF Options Page for theme options
 */

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

/** 
  * Custom Image Sizes
  */

add_action( 'after_setup_theme', 'custom_image_sizes' );
function custom_image_sizes() {
    /* New image size for HD images */
    add_image_size( 'full_hd', 1920, 1080, $crop = true );
		/* New image size for hero images */
    add_image_size( 'hero_image', 1920, 900, $crop = true );
    /* New image size for featured images */
    add_image_size( 'featured_image', 1920, 768, $crop = true );
    /* New image size for image & content blocks */
    add_image_size( 'image_content_block', 768, 615, $crop = true );
    /* New image size for half-width blocks */
    add_image_size( 'half_width_block', 768, 460, $crop = true );
}
