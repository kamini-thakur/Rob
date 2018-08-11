<?php
/**
 * The Template for displaying all single posts.
 *
 * @package progression
 */

get_header(); ?>
<div id="page-title">		
	<div class="width-container">
		<?php $page_for_posts = get_option('page_for_posts'); ?>
		<h1><?php echo get_the_title($page_for_posts); ?></h1>
		<?php if(function_exists('bcn_display')) {echo '<div id="bread-crumb">'; bcn_display(); echo '</div>'; }?>
		<div class="clearfix"></div>
	</div>
</div><!-- close #page-title -->


<div id="main">
<div class="width-container bg-sidebar-pro">
	<div id="sidebar-border">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'single' ); ?>

	<?php endwhile; // end of the loop. ?>
		<?php get_sidebar(); ?>
	<div class="clearfix"></div>
	</div>
</div>
<?php get_footer(); ?>
