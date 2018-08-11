<?php
add_action('widgets_init', 'pro_social_Media__load_widgets');

function pro_social_Media__load_widgets()
{
	register_widget('Pro_Social_Featured_Media_Widget');
}

class Pro_Social_Featured_Media_Widget extends WP_Widget {
	
	function Pro_Social_Featured_Media_Widget()
	{
		$widget_ops = array('classname' => 'pyre_social_media-feat', 'description' => 'Add your logo and social icons');

		$control_ops = array('id_base' => 'pyre_social_media-widget-feat');

		parent::__construct('pyre_social_media-widget-feat', 'Progression: Logo & Social Icons', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		global $post;
		
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		
		$agent_name = $instance['agent_name'];
		$link_text = $instance['link_text'];
		$link_link = $instance['link_link'];
		$office_text = $instance['office_text'];
		$cell_text = $instance['cell_text'];
		$extra_text = $instance['extra_text'];
		$image_url_pro = $instance['image_url_pro'];
		
		$fb_share_pro = $instance['fb_share_pro'];
		$twttr_share_pro = $instance['twttr_share_pro'];
		$goog_share_pro = $instance['goog_share_pro'];
		$lnkedin_share_pro = $instance['lnkedin_share_pro'];
		$pintrst_share_pro = $instance['pintrst_share_pro'];
		$utube_share_pro = $instance['utube_share_pro'];
		
		echo $before_widget;
		
		if($title) {
			echo  $before_title.$title.$after_title;
		}
		
	 ?>

		<div class="social-icons-widget-pro">
			<?php if($image_url_pro): ?><img src="<?php echo $image_url_pro; ?>" alt="Logo" class="logo-widget-pro" style="width:<?php echo $extra_text; ?>;"><?php endif; ?>	
				
			<?php if($agent_name): ?><div><?php echo $agent_name; ?></div><?php endif; ?>
			<?php if($link_text): ?><div><?php echo $link_text; ?></div><?php endif; ?>
			

			
			<div class="social-ico">
				<?php if($fb_share_pro): ?><a href="<?php echo $fb_share_pro; ?>" target="_blank"><i class="fa fa-facebook"></i></a><?php endif; ?>
				<?php if($twttr_share_pro): ?><a href="<?php echo $twttr_share_pro; ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php endif; ?>
				<?php if($goog_share_pro): ?><a href="<?php echo $goog_share_pro; ?>" target="_blank"><i class="fa fa-google-plus"></i></a><?php endif; ?>
				<?php if($lnkedin_share_pro): ?><a href="<?php echo $lnkedin_share_pro; ?>" target="_blank"><i class="fa fa-linkedin"></i></a><?php endif; ?>
				<?php if($office_text): ?><a href="<?php echo $office_text; ?>" target="_blank"><i class="fa fa-instagram"></i></a><?php endif; ?>
				<?php if($cell_text): ?><a href="<?php echo $cell_text; ?>" target="_blank"><i class="fa fa-tumblr"></i></a><?php endif; ?>
				<?php if($pintrst_share_pro): ?><a href="<?php echo $pintrst_share_pro; ?>" target="_blank"><i class="fa fa-pinterest"></i></a><?php endif; ?>
				<?php if($utube_share_pro): ?><a href="<?php echo $utube_share_pro; ?>" target="_blank"><i class="fa fa-youtube-play"></i></a><?php endif; ?>
				<?php if($link_link): ?><a href="<?php echo $link_link; ?>" target="_blank"><i class="fa fa-envelope"></i></a><?php endif; ?>
			</div><!-- close .social-ico -->
		</div><!-- close .social-icons-widget-pro -->

		
		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['image_url_pro'] = $new_instance['image_url_pro'];
		$instance['agent_name'] = $new_instance['agent_name'];
		$instance['link_text'] = $new_instance['link_text'];
		$instance['link_link'] = $new_instance['link_link'];
		$instance['office_text'] = $new_instance['office_text'];
		$instance['cell_text'] = $new_instance['cell_text'];
		$instance['extra_text'] = $new_instance['extra_text'];
		
		$instance['fb_share_pro'] = $new_instance['fb_share_pro'];
		$instance['twttr_share_pro'] = $new_instance['twttr_share_pro'];
		$instance['goog_share_pro'] = $new_instance['goog_share_pro'];
		$instance['lnkedin_share_pro'] = $new_instance['lnkedin_share_pro'];
		
		$instance['pintrst_share_pro'] = $new_instance['pintrst_share_pro'];
		$instance['utube_share_pro'] = $new_instance['utube_share_pro'];
		
		return $instance;
	}

	function form($instance)
	{
		
		$defaults = array('title' => '', 'image_url_pro' => '', 'agent_name' => '', 'link_text' => '', 'link_link' => '');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'progression' ); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
	
		<p>
			<label for="<?php echo $this->get_field_id('image_url_pro'); ?>"><?php _e( 'Logo Image', 'progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('image_url_pro'); ?>" name="<?php echo $this->get_field_name('image_url_pro'); ?>" value="<?php echo $instance['image_url_pro']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('extra_text'); ?>"><?php _e( 'Logo Width (EX:  180px )', 'progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('extra_text'); ?>" name="<?php echo $this->get_field_name('extra_text'); ?>" value="<?php echo $instance['extra_text']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('agent_name'); ?>"><?php _e( 'Text Field', 'progression' ); ?>:</label>			
			<textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id('agent_name'); ?>" name="<?php echo $this->get_field_name('agent_name'); ?>"><?php echo $instance['agent_name']; ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('link_text'); ?>"><?php _e( 'Additional Text Field', 'progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('link_text'); ?>" name="<?php echo $this->get_field_name('link_text'); ?>" value="<?php echo $instance['link_text']; ?>" />
		</p>
		

		
		
		<p>
			<label for="<?php echo $this->get_field_id('fb_share_pro'); ?>">Facebook <?php _e( 'Link', 'progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('fb_share_pro'); ?>" name="<?php echo $this->get_field_name('fb_share_pro'); ?>" value="<?php echo $instance['fb_share_pro']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('twttr_share_pro'); ?>">Twitter <?php _e( 'Link', 'progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('twttr_share_pro'); ?>" name="<?php echo $this->get_field_name('twttr_share_pro'); ?>" value="<?php echo $instance['twttr_share_pro']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('goog_share_pro'); ?>">Google+ <?php _e( 'Link', 'progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('goog_share_pro'); ?>" name="<?php echo $this->get_field_name('goog_share_pro'); ?>" value="<?php echo $instance['goog_share_pro']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('lnkedin_share_pro'); ?>">LinkedIn <?php _e( 'Link', 'progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('lnkedin_share_pro'); ?>" name="<?php echo $this->get_field_name('lnkedin_share_pro'); ?>" value="<?php echo $instance['lnkedin_share_pro']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('office_text'); ?>">Instagram <?php _e( 'Link', 'progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('office_text'); ?>" name="<?php echo $this->get_field_name('office_text'); ?>" value="<?php echo $instance['office_text']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('cell_text'); ?>">Tumblr <?php _e( 'Link', 'progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('cell_text'); ?>" name="<?php echo $this->get_field_name('cell_text'); ?>" value="<?php echo $instance['cell_text']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('pintrst_share_pro'); ?>">Pinterest <?php _e( 'Link', 'progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('pintrst_share_pro'); ?>" name="<?php echo $this->get_field_name('pintrst_share_pro'); ?>" value="<?php echo $instance['pintrst_share_pro']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('utube_share_pro'); ?>">Youtube <?php _e( 'Link', 'progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('utube_share_pro'); ?>" name="<?php echo $this->get_field_name('utube_share_pro'); ?>" value="<?php echo $instance['utube_share_pro']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('link_link'); ?>"><?php _e( 'E-mail Address', 'progression' ); ?>:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('link_link'); ?>" name="<?php echo $this->get_field_name('link_link'); ?>" value="<?php echo $instance['link_link']; ?>" />
		</p>
		
		
	<?php }
}
?>