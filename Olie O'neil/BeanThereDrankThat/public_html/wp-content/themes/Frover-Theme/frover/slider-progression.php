<?php
/**
 * The template used for displaying featured slider called from the header.php
 *
 * @package progression
 * @since progression 1.0
 */
?>

<?php
$portfolio_type = get_post_meta( $post->ID, 'progression_category_slug', true );
$portfolioloop = new WP_Query(array(
    'post_type'      => 'portfolio',
    'posts_per_page' => 30,
    'tax_query'      => array(
        // Note: tax_query expects an array of arrays!
        array(
            'taxonomy' => 'portfolio_type', // my guess
            'field'    => 'name',
            'terms'    => $portfolio_type
        ),
    ),
));
?>
<div id="page-title">
	<div class="flexslider" id="homepage-slider">
		<ul class="slides">
			<?php while ( $portfolioloop->have_posts() ) : $portfolioloop->the_post(); ?>
				<?php if(has_post_thumbnail()): ?>
					<li <?php if(get_post_meta(get_the_ID(), 'progression_caption_alignment', true) == 'right-align'): ?>class="caption-right-progression"<?php endif; ?><?php if(get_post_meta(get_the_ID(), 'progression_caption_alignment', true) == 'center-align'): ?>class="caption-center-progression"<?php endif; ?>>
						
						<?php if(get_post_meta($post->ID, 'progression_link', true)): ?><a href="<?php echo get_post_meta($post->ID, 'progression_link', true) ?>"><?php endif; ?>
							<?php the_post_thumbnail('progression-slider'); ?>
						<?php if(get_post_meta($post->ID, 'progression_link', true)): ?></a><?php endif; ?>
						
						<?php if(get_post_meta(get_the_ID(), 'progression_caption', true) == 'enable'): ?>
						<div class="caption-progression">
							<div class="width-container">
								<h2><?php if(get_post_meta($post->ID, 'progression_link', true)): ?><a href="<?php echo get_post_meta($post->ID, 'progression_link', true) ?>"><?php endif; ?><?php the_title(); ?><?php if(get_post_meta($post->ID, 'progression_link', true)): ?></a><?php endif; ?></h2><br>
								<?php if(get_post_meta($post->ID, 'progression_link', true)): ?><a href="<?php echo get_post_meta($post->ID, 'progression_link', true) ?>"><?php endif; ?>
									<?php the_content(); ?>
								<?php if(get_post_meta($post->ID, 'progression_link', true)): ?></a><?php endif; ?>
							</div>
						</div><!-- close .caption-progression -->
						<?php endif; ?>
					</li>
				<?php endif; ?>
			<?php endwhile; // end of the loop. ?>
		</ul>
	</div><!-- close .flexslider -->
		
<div class="clearfix"></div>
</div><!-- close #page-title -->