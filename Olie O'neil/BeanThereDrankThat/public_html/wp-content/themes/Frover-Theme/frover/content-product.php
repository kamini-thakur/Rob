<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = get_theme_mod('shop_col_progression', '3');

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>
<li class="product column-<?php echo get_theme_mod('shop_col_progression', '3'); ?> <?php
	if ( $woocommerce_loop['loop'] % $woocommerce_loop['columns'] == 0 )
		echo 'last';
	elseif ( ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] == 0 )
		echo 'first';
	?>">

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

	<a href="<?php the_permalink(); ?>">

		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>

		<div class="shop-meta-index-pro">
			<?php do_action( 'woocommerce_after_shop_loop_item_title' );?>
		</div>
		
		<?php if ( ! defined( 'ABSPATH' ) ) exit; global $product; if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) return; ?>
		<?php if ( $rating_html = $product->get_rating_html() ) : ?>
			<div class="rating-fix-pro"><?php echo $rating_html; ?></div>
		<?php endif; ?>
		<div class="clearfix"></div>
		<h3 class="product-title-index-pro"><?php the_title(); ?></h3>

	</a>
	<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>

	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>

</li>