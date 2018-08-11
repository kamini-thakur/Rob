<?php
// Template Name: Contact Page
/**
 *
 * @package progression
 * @since progression 1.0
 */

get_header(); ?>
<?php if(get_post_meta($post->ID, 'progression_category_slug', true)): ?><?php else: ?>
<div id="page-title">		
	<div class="width-container">
		<h1><?php the_title(); ?></h1>
		<?php if(function_exists('bcn_display')) {echo '<div id="bread-crumb">'; bcn_display(); echo '</div>'; }?>
		<div class="clearfix"></div>
	</div>
</div><!-- close #page-title -->
<?php endif; ?> 

	<?php if(get_post_meta($post->ID, 'pageoptions_contact_map', true)): ?>
		<div id="map-progression">
			<?php echo apply_filters('the_content', get_post_meta($post->ID, 'pageoptions_contact_map', true)); ?>
		</div><!-- close #map-progression -->
	<?php endif; ?>

<div id="main">
<div class="width-container bg-sidebar-pro">
	<div id="sidebar-border">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'page' ); ?>
		<?php endwhile; // end of the loop. ?>
		
		<?php get_sidebar(); ?>
	<div class="clearfix"></div>
	</div>
</div>

<?php get_footer(); ?>
