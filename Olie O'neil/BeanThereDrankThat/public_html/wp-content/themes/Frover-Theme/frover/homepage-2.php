<?php
// Template Name: HomePage v2
/**
 *
 * @package progression
 * @since progression 1.0
 */

get_header(); ?>

<div id="main">
	
<div class="width-container">
	<!-- Homepage Child Pages Start -->
	<?php
	$args = array(
		'post_type' => 'page',
		'numberposts' => -1,
		'post' => null,
		'post_parent' => $post->ID,
	    'order' => 'ASC',
	    'orderby' => 'menu_order'
	);
	$features = get_posts($args);
	$features_count = count($features);
	if($features):
		$count = 1;
		foreach($features as $post): setup_postdata($post);
			$image_id = get_post_thumbnail_id();
			$image_url = wp_get_attachment_image_src($image_id, 'large');
			$col_count_progression = get_theme_mod('home_col_progression', '3');
			if($count >= 1+$col_count_progression) { $count = 1; }
	?>
		<div class="home-child-boxes grid<?php echo get_theme_mod('home_col_progression', '3'); ?>column-progression <?php if($count == get_theme_mod('home_col_progression', '3')): echo ' lastcolumn-progression'; endif; ?>">
			<div class="home-child-boxes-container">
				<?php if($image_url[0]): ?><div class="home-child-image-pro"><img src="<?php echo $image_url[0]; ?>" alt="<?php the_title(); ?>"></div><?php endif; ?>
				
				<h5 class="home-child-title"><?php the_title(); ?></h5>
				<?php the_content(); ?>
				<div class="clearfix"></div>
			</div>
		</div>
	<?php if($count == get_theme_mod('home_col_progression', '3')): ?><div class="clearfix"></div><?php endif; ?>
	<?php $count ++; endforeach; ?>
	<?php endif; ?>
	<div class="clearfix"></div>
	<!-- Homepage Child Pages End -->
	
	<!-- this code pull in the homepage content -->
	<?php while(have_posts()): the_post(); ?>
		<?php the_content(); ?>
		<div class='clearfix'></div>
	<?php endwhile; ?>
	
	<div class="clearfix"></div>
</div><!-- close .width-container -->

<?php get_footer(); ?>