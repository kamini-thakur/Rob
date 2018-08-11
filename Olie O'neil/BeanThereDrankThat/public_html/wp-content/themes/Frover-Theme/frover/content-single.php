<?php
/**
 * @package progression
 */
?>

<div id="content-container">
	<div class="content-container-pro">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<?php if(get_post_meta($post->ID, 'progression_media_embed', true)): ?>
				<div class="featured-video-progression">
					<?php echo apply_filters('the_content', get_post_meta($post->ID, 'progression_media_embed', true)); ?>
				</div>
			<?php else: ?>
			<?php if( has_post_format( 'gallery' ) ): ?>
				<div class="featured-blog-progression">
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
						<?php $thumbnail = wp_get_attachment_image_src($attachment->ID, 'progression-blog'); ?>
						<?php $image = wp_get_attachment_image_src($attachment->ID, 'large'); ?>
						<li><a href="<?php echo $image[0]; ?>" rel="prettyPhoto[gallery]"><img src="<?php echo $thumbnail[0]; ?>" alt="<?php echo $attachment->post_title; ?>" /></a></li>
						<?php endforeach; endif; ?>
					</ul>
					</div>
				</div>
			<?php else: ?>
			<?php if(has_post_thumbnail()): ?>
				<div class="featured-blog-progression">
					<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); ?>
					<a href="<?php echo $image[0]; ?>" rel="prettyPhoto">
					<?php the_post_thumbnail('progression-blog'); ?>
					</a>
				</div>
			<?php endif; ?> <!-- close media_embed option -->
			<?php endif; ?>
			<?php endif; ?>
			
			
			<div class="blog-container-text">
				<div class="pro-cat"><?php the_category(' '); ?></div>
				
				<h2 class="blog-title"><?php the_title(); ?></h2>	
			
				<?php if ( 'post' == get_post_type() ) : ?>
				<div class="meta-progression"><i class="fa fa-clock-o"></i> <?php progression_posted_on(); ?> <i class="fa fa-user"></i> <?php _e( 'By', 'progression' ); ?> <?php the_author_posts_link(); ?> <i class="fa fa-comments-o"></i> <?php comments_popup_link( '' . __( 'No Comments', 'progression' ) . '', _x( '1 Comment', 'comments number', 'progression' ), _x( '% Comments', 'comments number', 'progression' ) ); ?></div>
				<?php endif; ?>
				
				<div class="entry-content">		
				
					<?php the_content(); ?>
				
					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'progression' ),
							'after'  => '</div>',
						) );
					?>
					<?php edit_post_link( __( 'Edit', 'progression' ), '<p class="edit-link">', '</p>' ); ?>
				</div><!-- .entry-content -->
			
				<?php the_tags('<div id="tags-pro">', ' ', '</div>'); ?> 
		
				<?php progression_content_nav( 'nav-below' ); ?>
			
				
				
				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template();
				?>
			
			</div><!-- close .blog-container-text -->
		
		<div class="clearfix"></div>
		</article><!-- #post-## -->
	</div><!-- close .content-container-pro -->
</div><!-- close #content-container -->
