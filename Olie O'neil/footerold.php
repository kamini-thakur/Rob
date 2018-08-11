<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package progression
 * @since progression 1.0
 */
?>

<div class="clearfix"></div>
</div><!-- close #main -->

<!-- display homepage widgets -->
<?php if( is_page_template('homepage.php') ): ?>	
<?php if ( is_active_sidebar( 'homepage-widgets' ) ) : ?>
	<?php dynamic_sidebar( 'homepage-widgets' ); ?>
<?php endif; ?>
<?php endif; ?>

<?php if( is_page_template('homepage-v2.php') ): ?>	
<?php if ( is_active_sidebar( 'homepage-widgets-2' ) ) : ?>
	<?php dynamic_sidebar( 'homepage-widgets-2' ); ?>
<?php endif; ?>
<?php endif; ?>

<?php if ( is_active_sidebar( 'homepage-all-widgets' ) ) : ?>
	<?php dynamic_sidebar( 'homepage-all-widgets' ); ?>
<?php endif; ?>

<div id="widget-area">
	<div class="width-container footer-<?php echo get_theme_mod('footer_cols', '3'); ?>-column">
		<?php if ( ! dynamic_sidebar( 'Footer Widgets' ) ) : ?>
		<?php endif; // end sidebar widget area ?>
	</div>
	<div class="clearfix"></div>
</div>

<footer>
	<div id="copyright">
		<div class="width-container">
			<div id="copyrigh-text"><?php echo get_theme_mod( 'copyright_textbox', '&copy; 2014 All Rights Reserved. Developed by ProgressionStudios' ); ?></div>
			<a class="scrollup" href="#top"><i class="fa fa-angle-up"></i></a>
			<?php wp_nav_menu( array('theme_location' => 'footer-menu', 'depth' => 1, 'container_class' => false, 'menu_class' => 'pro-footer-menu', 'fallback_cb' => false) ); ?>
		</div><!-- close .width-container -->
		<div class="clearfix"></div>
	</div><!-- close #copyright -->
</footer>
<?php wp_footer(); ?>
</body>
</html>