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
<div id="page-title">		
	<div class="width-container">
		<h1><?php the_title(); ?></h1>
		<?php if(function_exists('bcn_display')) {echo '<div id="bread-crumb">'; bcn_display(); echo '</div>'; }?>
		<div class="clearfix"></div>
	</div>
</div><!-- close #page-title -->
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
