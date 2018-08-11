<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package progression
 */

get_header(); ?>
<?php if(get_post_meta($post->ID, 'progression_category_slug', true)): ?><?php else: ?>


<?php endif; ?> 
<div id="main">
<div class="width-container bg-sidebar-pro">

	<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'page' ); ?>
		<?php endwhile; // end of the loop. ?>

	<!--<div id="sidebar-border">
	<div class="clearfix"></div>
	</div> -->
</div>

<?php get_footer(); ?>
