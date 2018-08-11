<?php
/**
 * The Header for our theme.
 *
 * @package progression
 * @since progression 1.0
 */
?><!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>  <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	
<header<?php if (get_theme_mod( 'header_fix_progression', '0')) : ?> id="fixed-header-pro"<?php endif ?>>
	<div id="header-top">
		<div class="width-container">
			<?php get_template_part( 'header', 'left' ); ?><!-- edit this area in the header-left.php file -->
			<?php wp_nav_menu( array('theme_location' => 'secondary-menu', 'depth' => 1, 'container_class' => false, 'menu_class' => 'pro-top-menu', 'fallback_cb' => false) ); ?>
			<?php if (class_exists('Woocommerce')) : ?><?php get_template_part( 'cart', 'header' ); ?><!-- edit this area in the cart-header.php file --><?php endif; ?>
			<div class="clearfix"></div>
		</div>
	</div>
	<?php if (get_theme_mod( 'header_fix_progression', '0')) : ?><div id="pro-header-fixed"><?php endif ?>
	<div class="width-container">
		<h1 id="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod( 'logo_upload', get_template_directory_uri() . '/images/logo.png' ); ?>" alt="<?php bloginfo('name'); ?>" width="<?php echo get_theme_mod( 'logo_width', '180' ); ?>" /></a></h1>
		<div id="additional-social-pro">
			<?php get_template_part( 'social', 'icons' ); ?>

		</div><!-- close #additional-social-pro -->
		<nav><?php wp_nav_menu( array('theme_location' => 'primary', 'depth' => 4, 'menu_class' => 'sf-menu', 'fallback_cb' => false) ); ?></nav>
	<div class="clearfix"></div>
	</div><!-- close .width-container -->
	<?php if (get_theme_mod( 'header_fix_progression', '0')) : ?></div><!-- close #pro-header-fixed --><?php endif ?>
</header>

<?php if(get_post_meta($post->ID, 'progression_category_slug', true)): ?>
	<div id="pro-home-slider"><?php echo apply_filters('the_content', get_post_meta($post->ID, 'progression_category_slug', true)); ?></div>
<?php else: ?>
	<div id="home-slider-filler"></div>
<?php endif; ?> 