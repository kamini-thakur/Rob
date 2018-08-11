<?php
/**
 * @package progression
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="portfolio-single-progression">


		<div class="pagination-portfolio">
			<span>
				<?php 
				if (function_exists('next_post_link_plus')) {
				next_post_link_plus( array(
					'loop' => false,
					'tooltip' => 'Previous post',
					'in_same_tax' => 'portfolio_type',
					'format' => '%link',
					'link' => '<i class="fa fa-chevron-left"></i>'
				) );
				}
				?>
			</span>
			<span>
				<?php 
				$terms = get_the_terms( $post->ID , 'portfolio_type' ); 
		        foreach ( $terms as $term ) {
		            $term_link = get_term_link( $term, 'portfolio_type' );
		            if( is_wp_error( $term_link ) )
		            continue;
		       	 	echo '<a href="' . $term_link . '">' . '<i class="fa fa-th"></i>' . '</a>';
				    break;
				    unset($term);
		        } 
		    	?>
			</span>
			<span>
				<?php 
				if (function_exists('previous_post_link_plus')) {
				previous_post_link_plus( array(
					'loop' => false,
					'tooltip' => 'Next post',
					'in_same_tax' => 'portfolio_type',
					'format' => '%link',
					'link' => '<i class="fa fa-chevron-right"></i>'
				) );
				}
				?>
			</span>
			<div class="clearfix"></div>
		</div><!-- close .pagination-portfolio -->
		
		
		<?php if(get_post_meta($post->ID, 'progression_media_embed', true)): ?>
			<div class="featured-image-portfolio-single">
				<?php echo apply_filters('the_content', get_post_meta($post->ID, 'progression_media_embed', true)); ?>
			</div>
		<?php else: ?>
		<?php if( has_post_format( 'gallery' ) ): ?>
			<div class="featured-image-portfolio-single">
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
					<?php $thumbnail = wp_get_attachment_image_src($attachment->ID, 'progression-portfolio-single'); ?>
					<?php $image = wp_get_attachment_image_src($attachment->ID, 'large'); ?>
					<li><a href="<?php echo $image[0]; ?>" rel="prettyPhoto[gallery]"><img src="<?php echo $thumbnail[0]; ?>" alt="<?php echo $attachment->post_title; ?>" /></a></li>
					<?php endforeach; endif; ?>
				</ul>
				</div>
			</div>
		<?php else: ?>
			
			<?php if(has_post_thumbnail()): ?>
				<div class="featured-image-portfolio-single">
					<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); ?>
					<a href="<?php echo $image[0]; ?>" rel="prettyPhoto">
						<?php the_post_thumbnail('progression-portfolio-single'); ?>
					</a>
				</div>
			<?php endif; ?>	<!-- close post_thumbnail -->
		
		<?php endif; ?>
		
		<?php endif; ?> <!-- close media_embed option -->
		
	</div>
	
	<div class="portfolio-post-content">
				<?php $terms = get_the_terms( $post->ID , 'portfolio_type' ); 
	        foreach ( $terms as $term ) {
	            $term_link = get_term_link( $term, 'portfolio_type' );
	            if( is_wp_error( $term_link ) )
	            continue;
	        	echo '<h4 class="category-heading-pro"><a href="' . $term_link . '">' . $term->name . '</a></h4>';
			    break;
			    unset($term);
	        } 
	    ?>
		<?php the_content(); ?>
	</div>
	
	<div class="clearfix"></div>
</article><!-- #post-## -->