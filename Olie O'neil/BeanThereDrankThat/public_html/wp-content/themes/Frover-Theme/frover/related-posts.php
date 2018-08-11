<?php
$categories = get_the_category($post->ID);
if ($categories) {
    $category_ids = array();

    foreach($categories as $each_category) 
        $category_ids[] = $each_category->term_id;

    $args = array(
        'category__in' => $category_ids, //An array of category IDs to be included.
        'post__not_in' => array($post->ID), //An array of post IDs to be excluded from the results.
        'orderby'=> 'rand', //Lists Related posts Randomly. *** MODIFY IF YOU LIKE ***
        'showposts' => 3, //*** MODIFY TO WHAT YOU LIKE.***  Number of related posts to show. 
        //'caller_get_posts' => 1 //*** USE THIS IF YOU ARE RUNNING WordPress Version < 3.1 ***
        'ignore_sticky_posts' => 1 //*** USE THIS for WordPress Version >= 3.1 ***
    );
$query = new WP_Query($args);

    //If there are related posts.
    if( $query->have_posts() ) {
        echo '<div id="frover-related-pro"><h3 class="more-posts-pro">';
 		  printf( __( 'More Posts', 'progression' ));
 		  echo '</h2>';

while ($query->have_posts()) {
	$query->the_post();
?>
	<div class="related-pro-container">
			<?php if( has_post_format( 'gallery' ) ): ?>
				<div class="related-post-image-solar">
					<div class="flexslider gallery-progression">
			      	<ul class="slides">
						<?php
						$args = array(
						    'post_type' => 'attachment',
						    'numberposts' => '-1',
						    'post_status' => null,
						    'post_parent' => $post->ID,
							'orderby' => 'menu_order',
							'order' => 'ASC'
						);
						$attachments = get_posts($args);
						?>
						<?php 
						if($attachments):
						    foreach($attachments as $attachment):
						?>
						<?php $thumbnail = wp_get_attachment_image_src($attachment->ID, 'progression-related'); ?>
						<li><?php if( has_post_format( 'link' ) ): ?><a href="<?php echo get_post_meta($post->ID, 'progression_external_link', true) ?>">
					<?php else: ?><a href="<?php the_permalink(); ?>"><?php endif; ?><img src="<?php echo $thumbnail[0]; ?>" alt="<?php echo $attachment->post_title; ?>" /></a></li>
						<?php endforeach; endif; ?>
					</ul>
					</div>
				</div>
			<?php else: ?>
			<?php if(has_post_thumbnail()): ?>
				<div class="related-post-image-solar">
					<?php if( has_post_format( 'link' ) ): ?><a href="<?php echo get_post_meta($post->ID, 'progression_external_link', true) ?>"><?php else: ?><a href="<?php the_permalink(); ?>"><?php endif; ?><?php the_post_thumbnail('progression-related'); ?></a>
				</div>
				<?php else: ?>
				<?php if(get_post_meta($post->ID, 'progression_media_embed', true)): ?>
					<div class="related-post-image-solar">
						<?php echo apply_filters('the_content', get_post_meta($post->ID, 'progression_media_embed', true)); ?>
					</div>
				<?php endif; ?> <!-- close media_embed option -->
			<?php endif; ?>
			<?php endif; ?>
			<h6><?php if( has_post_format( 'link' ) ): ?><a href="<?php echo get_post_meta($post->ID, 'progression_external_link', true) ?>">
					<?php else: ?><a href="<?php the_permalink(); ?>"><?php endif; ?><?php the_title(); ?></a></h6>
	</div>
<?php 
	}
		echo '<div class="clearfix"></div>';
		echo '</div><!-- close #solar-related -->'; 
	}
}
wp_reset_query(); 
?>