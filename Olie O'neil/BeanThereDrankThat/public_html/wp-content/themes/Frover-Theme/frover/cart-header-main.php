<?php global $woocommerce; ?>
	<div class="checkout-container">
		<a class="shopping-cart-basket" href="<?php echo $woocommerce->cart->get_cart_url(); ?>">
			<span class="cart-text-pro"><?php _e('Cart','progression'); ?></span>
			<span class="cart-count-pro"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> <?php _e('Items','progression'); ?></span>
			<span class="divider-pro">/</span>
			<span class="sub-price-cart-pro"><?php echo $woocommerce->cart->get_cart_subtotal(); ?></span>
			<i class="fa fa-angle-down"></i>
		</a>
		<div id="checkout-basket-iceberg">
			<div class="ajax-cart-header">
			<?php get_template_part( 'cart/mini-cart-header' ); ?>
			</div>
			<a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>" class="checkout-button-shopping-cart"><?php _e('Checkout','progression'); ?></a>
		<div class="clearfix"></div>
		</div><!-- close #checkout-basket-iceberg -->
	</div><!-- close .checkout-container -->