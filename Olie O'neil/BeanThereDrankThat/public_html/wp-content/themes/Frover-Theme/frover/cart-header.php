<?php global $woocommerce; ?>
<ul class="cart-nav-pro">
	<?php
	$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
	if ( $myaccount_page_id  && !is_user_logged_in()) {
	  $myaccount_page_url = get_permalink( $myaccount_page_id );
	?>
	<li><a class="login-logout-header" href="<?php echo $myaccount_page_url; ?>"><i class="fa fa-user"></i><?php _e('Login/Register','progression'); ?></a></li>
	<?php
	}
	$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
	if ( $myaccount_page_id && is_user_logged_in()) {
	  $logout_url = wp_logout_url( get_permalink( $myaccount_page_id ) );
	  if ( get_option( 'woocommerce_force_ssl_checkout' ) == 'yes' )
	    $logout_url = str_replace( 'http:', 'https:', $logout_url );
	?>
	<li><a class="login-logout-header" href="<?php echo $logout_url; ?>"><i class="fa fa-user"></i><?php _e('Sign out','progression'); ?></a></li>
	<?php } ?>
	<li class="cart-hover-div"><a class="shopping-cart-basket" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><i class="fa fa-shopping-cart"></i> 
			<?php if((sizeof($woocommerce->cart->cart_contents)) == 0): 
			?>
			<span class="shopping-cart-header-count no-cart-count-pro">
				0
			</span>
			<?php else: ?>
			<span class="shopping-cart-header-count">
			<?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?>
			</span>
			<?php endif; ?></a></li>
</ul>

<div id="checkout-basket-iceberg">
<div id="check-out-basket-iceberg-container">
	<div class="ajax-cart-header">
	<?php get_template_part( 'cart/mini-cart-header' ); ?>
	</div>
	<a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>" class="checkout-button-shopping-cart"><?php _e('Checkout','progression'); ?></a>
<div class="clearfix"></div>
</div><!-- close #checkout-basket-iceberg-container -->
</div><!-- close #checkout-basket-iceberg -->