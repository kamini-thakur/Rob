<?php
/**
 * The Template for displaying all single posts.
 *
 * @package progression
 */

get_header(); ?>

<div id="page-title">		
	<div class="width-container">
		<h1><?php the_title(); ?></h1>
		<?php if(function_exists('bcn_display')) {echo '<div id="bread-crumb">'; bcn_display(); echo '</div>'; }?>
		<div class="clearfix"></div>
	</div>
</div><!-- close #page-title -->

<div id="main">
	<div class="width-container">
		<div id="portfolio-index">	
			
			<?php while ( have_posts() ) : the_post(); ?>
		
				<?php get_template_part( 'content', 'single-portfolio' ); ?>
		
			<?php endwhile; // end of the loop. ?>
			
			<?php get_template_part( 'related', 'portfolio-posts' ); ?>
			
			<div class="clearfix"></div>
		</div><!-- close #portfolio-index -->
	</div><!-- close .width-container -->
</div><!-- close #main -->
<?php get_footer(); ?>
