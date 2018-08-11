<?php
/**
 * progression functions and definitions
 *
 * @package progression
 * @since progression 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since progression 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */


if ( ! function_exists( 'progression_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since progression 1.0
 */
function progression_setup() {
	
	if(function_exists( 'set_revslider_as_theme' )){
		add_action( 'init', 'pro_ezio_custom_slider_rev' );
		function pro_ezio_custom_slider_rev() { set_revslider_as_theme(); }
	}

	// Post Thumbnails
	add_theme_support('post-thumbnails');
	add_image_size('progression-slider', 1800, 800, true);
	add_image_size('progression-blog', 1140, 575, true); // Blog Post Image
	add_image_size('progression-portfolio-thumb', 700, 615, true); //600 wide by 600 tall Image is cropped due to true setting  (try 457)
	add_image_size('progression-portfolio-single', 1200, 600, true);   //1200 wide x 800 tall with cropping
	add_image_size('progression-related', 400, 225, true);
	
	
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on progression, use a find and replace
	 * to change 'progression' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'progression', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );
	
	// Include widgets
	require( get_template_directory() . '/widgets/widgets.php' );
	
	
	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio', 'link' ) );
	add_post_type_support( 'portfolio', 'post-formats' );
	

	
	
	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'secondary-menu' => __( 'Header Top Menu', 'progression' ),
		'primary' => __( 'Primary Menu', 'progression' ),
		'footer-menu' => __( 'Footer Menu', 'progression' ),
	) );



}
endif; // progression_setup
add_action( 'after_setup_theme', 'progression_setup' );


/* WooCommerce */
add_theme_support( 'woocommerce' );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);



add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 9;' ), 20 );



// Ajaxy Count Cart in Header
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment22');
function woocommerce_header_add_to_cart_fragment22( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<a class="shopping-cart-basket" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><i class="fa fa-shopping-cart"></i> 
				<?php if((sizeof($woocommerce->cart->cart_contents)) == 0): 
				?>
				<span class="shopping-cart-header-count no-cart-count-pro">
					0
				</span>
				<?php else: ?>
				<span class="shopping-cart-header-count">
				<?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?>
				</span>
				<?php endif; ?>
		
		</a>
	<?php

	$fragments['.shopping-cart-basket'] = ob_get_clean();

	return $fragments;

}


// Ajaxy Cart in Header
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment55');
function woocommerce_header_add_to_cart_fragment55( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
		<div class="ajax-cart-header">
		<?php get_template_part( 'cart/mini-cart-header' ); ?>
		</div>
	<?php

	$fragments['.ajax-cart-header'] = ob_get_clean();

	return $fragments;

}


//remove product short description on single product page
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);




function woo_related_products_limit() {
  global $product;
	
	$args = array(
		'post_type'        		=> 'product',
		'no_found_rows'    		=> 1,
		'posts_per_page'   		=> 3,
		'ignore_sticky_posts' 	=> 1,
		'post__not_in'        	=> array($product->id)
	);
	return $args;
}
add_filter( 'woocommerce_related_products_args', 'woo_related_products_limit' );





/**
 * Registering Custom Post Type
 */
add_action('init', 'progression_portfolio_init');
function progression_portfolio_init() {
	register_post_type(
		'portfolio',
		array(
			'labels' => array(
				'name' => 'Portfolio',
				'singular_name' => 'Portfolio'
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'portfolio-type'),
			'supports' => array('title', 'editor', 'thumbnail','comments'),
			'can_export' => true,
		)
	);

	register_taxonomy('portfolio_type', 'portfolio', array('hierarchical' => true, 'label' => 'Portfolio Categories', 'query_var' => true, 'rewrite' => true));
}


/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since progression 1.0
 */
function progression_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'progression' ),
		'id' => 'sidebar-1',
		'description'   => 'Default Sidebar',
		'before_widget' => '<div id="%1$s" class="sidebar-item widget %2$s">',
		'after_widget' => '<div class="sidebar-divider"></div></div>',
		'before_title' => '<h6 class="widget-title">',
		'after_title' => '</h6>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Shop Sidebar', 'progression' ),
		'id' => 'sidebar-shop',
		'description'   => 'WooCommerce Sidebar',
		'before_widget' => '<div id="%1$s" class="sidebar-item widget %2$s">',
		'after_widget' => '<div class="sidebar-divider"></div></div>',
		'before_title' => '<h6 class="widget-title">',
		'after_title' => '</h6>',
	) );
	

	register_sidebar( array(
		'name' => __( 'Homepage Widgets', 'progression' ),
		'id' => 'homepage-widgets',
		'description'   => 'Display Home: widgets on the homepage page template',
		'before_widget' => '<div id="%1$s" class="widget home-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="title-homepage">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Home v2 Widgets', 'progression' ),
		'id' => 'homepage-widgets-2',
		'description'   => 'Display Home: widgets on the homepage v2 page template',
		'before_widget' => '<div id="%1$s" class="widget home-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="title-homepage">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Home: Widgets on all Pages', 'progression' ),
		'id' => 'homepage-all-widgets',
		'description'   => 'Display Home: widgets on all pages above footer',
		'before_widget' => '<div id="%1$s" class="widget home-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="title-homepage">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widgets', 'progression' ),
		'description' => __( 'Footer widgets', 'progression' ),
		'id' => 'footer-widgets',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
}
add_action( 'widgets_init', 'progression_widgets_init' );



add_filter('widget_text', 'do_shortcode'); 



/* remove more link jump */
function remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );



//Removed Normal Rating Loop
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );




/* custom portfolio posts per page */
function my_post_queries( $query ) {
	$portfolio_count = get_theme_mod('portfolio_pages_progression');
	if ($query->is_main_query()){
	
	if(is_tax( 'portfolio_type' )){
      // show 50 posts on custom taxonomy pages
      $query->set('posts_per_page', $portfolio_count);
    }
	
	}
	

	if(is_post_type_archive( 'portfolio' )){
      $query->set('posts_per_page', $portfolio_count);
    }
	
  }
add_action( 'pre_get_posts', 'my_post_queries' );



/**
 * Enqueue scripts and styles
 */
function progression_scripts() {
	wp_enqueue_style( 'progression-style', get_stylesheet_uri() );
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css', array( 'progression-style' ) );
	wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Raleway:400,300,200,500,700', array( 'progression-style' ) );

	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/libs/modernizr-2.6.2.min.js', false, '20120206', false );
	wp_enqueue_script( 'plugins', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'progression_scripts' );



/* Removing TW Recent Posts Widget Styling */
add_action( 'wp_print_styles', 'my_deregister_styles', 100 );
function my_deregister_styles() {
	wp_deregister_style( 'tw-recent-posts-widget' );
}



function pro_mobile_menu_insert()
{
    ?>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
	$('.sf-menu').mobileMenu({
	    defaultText: '<?php _e( "Navigate to...", "progression" ); ?>',
	    className: 'select-menu',
	    subMenuDash: '&ndash;&ndash;'
	});
	});
	</script>
    <?php
}
add_action('wp_footer', 'pro_mobile_menu_insert');


/*
	MetaBox Options from Dev7studios
*/
require get_template_directory() . '/inc/dev7_meta_box_framework.php';
require get_template_directory() . '/inc/custom-fields.php';


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

/* Load Plugin Activiation */
require get_template_directory() . '/tgm-plugin-activation/plugin-activation.php';
