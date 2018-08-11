<?php
add_action('widgets_init', 'pyre_homepage_hom_feat_load_widgets');

function pyre_homepage_hom_feat_load_widgets()
{
	register_widget('Pyre_Main_Hom_Featured_Media_Widget');
}

class Pyre_Main_Hom_Featured_Media_Widget extends WP_Widget {
	
	function Pyre_Main_Hom_Featured_Media_Widget()
	{
		$widget_ops = array('classname' => 'pyre_homepage_main_higlight-feat', 'description' => 'Highlight content above footer');

		$control_ops = array('id_base' => 'pyre_homepage_main_higlight-feat');

		parent::__construct('pyre_homepage_main_higlight-feat', 'Home: Content w/Background', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		global $post;
		
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		
		$summary_text = $instance['summary_text'];
		
		$link_text = $instance['link_text'];
		$link_link = $instance['link_link'];
		
		
		$widget_bg = $instance['widget_bg'];
		
		$widget_bg_img = $instance['widget_bg_img'];
		
		$widget_image_left_pro = $instance['widget_image_left_pro'];
		
		$checkbox_pro = $instance['checkbox_pro'];
		
		$margin_text_pro = $instance['margin_text_pro'];

		
		echo $before_widget;
		
		 ?>
		

		
		<div class="<?php echo $args['widget_id']; ?> home-content-highlight<?php if($checkbox_pro): ?> light-fonts-pro<?php endif; ?>" <?php if($widget_bg): ?>style="background-color:<?php echo $widget_bg; ?>;"<?php endif; ?>>
			<div class="width-container">
				
				<?php if($widget_image_left_pro): ?>
					<div class="grid2column-progression"><img src="<?php echo $widget_image_left_pro; ?>" alt="<?php echo $title; ?>"></div>
				<?php endif; ?>
				
				<?php if($widget_image_left_pro): ?><div class="grid2column-progression lastcolumn-progression" <?php if($margin_text_pro): ?>style="padding-top:<?php echo $margin_text_pro; ?>;"<?php endif; ?>><?php endif; ?>
				
					<?php if($title): ?>
						<h1 class="home-highlight-heading"><?php echo $title; ?></h1>
					<?php endif; ?>
				
					<?php if($summary_text): ?>
							<div class="home-widget-text-pro"><?php echo do_shortcode( $summary_text ) ?></div>
					<?php endif; ?>
					
					<?php if($link_text): ?><div class="home-widget-button-pro"><a href="<?php echo $link_link; ?>" class="progression-button secondary-button"><?php echo $link_text; ?></a></div><?php endif; ?>
				
				<?php if($widget_image_left_pro): ?></div><?php endif; ?>
			<div class="clearfix"></div>
			</div><!-- close .width-container -->
		</div><!-- close .home-content-highlight -->

		<?php if($widget_bg_img): ?>
			<script type='text/javascript'>jQuery(document).ready(function($) {   $(".<?php echo $args['widget_id']; ?>").backstretch([ "<?php echo $widget_bg_img; ?>" ],{ fade: 750, }); }); </script>
		<?php endif; ?>
		
		
		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		
		$instance['link_text'] = $new_instance['link_text'];
		$instance['link_link'] = $new_instance['link_link'];
		
		$instance['summary_text'] = $new_instance['summary_text'];
		
		$instance['widget_bg'] = $new_instance['widget_bg'];
		
		$instance['widget_bg_img'] = $new_instance['widget_bg_img'];
		$instance['checkbox_pro'] = $new_instance['checkbox_pro'];
		
		$instance['widget_image_left_pro'] = $new_instance['widget_image_left_pro'];
		
		
		$instance['margin_text_pro'] = $new_instance['margin_text_pro'];
		
		return $instance;
	}

	function form($instance)
	{
		
		$defaults = array('title' => 'WHAT WE DO', 'summary_text' => 'At dawn on the 13th the Carnatic entered the port of Yokohama.  This is an important port of call in the Pacific, where all the mail-steamers, and those carrying travellers between North America, China, Japan, and the Oriental', 'link_text' => 'View more', 'link_link' => '#', 'secondary_link_text' => '', 'secondary_link_link' => '', 'widget_bg' => '#ffffff', 'widget_bg_img' => '', 'widget_image_left_pro' => '', 'checkbox_pro' => '1', 'margin_text_pro' => '80px');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('widget_image_left_pro'); ?>">Optional Image in Left Column:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('widget_image_left_pro'); ?>" name="<?php echo $this->get_field_name('widget_image_left_pro'); ?>" value="<?php echo $instance['widget_image_left_pro']; ?>" />
		</p>
	
		<p>
			<label for="<?php echo $this->get_field_id('summary_text'); ?>">Main Text:</label>
			<textarea class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id('summary_text'); ?>" name="<?php echo $this->get_field_name('summary_text'); ?>"><?php echo $instance['summary_text']; ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('link_text'); ?>">Button Text:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('link_text'); ?>" name="<?php echo $this->get_field_name('link_text'); ?>" value="<?php echo $instance['link_text']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('link_link'); ?>">Button Link:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('link_link'); ?>" name="<?php echo $this->get_field_name('link_link'); ?>" value="<?php echo $instance['link_link']; ?>" />
			
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('widget_bg'); ?>">Widget Background Color:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('widget_bg'); ?>" name="<?php echo $this->get_field_name('widget_bg'); ?>" value="<?php echo $instance['widget_bg']; ?>" />
		</p>
		

		
		<p>
			<label for="<?php echo $this->get_field_id('widget_bg_img'); ?>">Widget Background Image:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('widget_bg_img'); ?>" name="<?php echo $this->get_field_name('widget_bg_img'); ?>" value="<?php echo $instance['widget_bg_img']; ?>" />
			
			
			
			
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('checkbox_pro'); ?>">Check box for light text:</label>
			<input class="checkbox" type="checkbox" <?php checked($instance['checkbox_pro'], 'on'); ?> id="<?php echo $this->get_field_id('checkbox_pro'); ?>" name="<?php echo $this->get_field_name('checkbox_pro'); ?>" /> 
			
		</p>
		
		
		<p>
			<label for="<?php echo $this->get_field_id('margin_text_pro'); ?>">Adjust text higher or lower:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('margin_text_pro'); ?>" name="<?php echo $this->get_field_name('margin_text_pro'); ?>" value="<?php echo $instance['margin_text_pro']; ?>" />
		</p>
		
	<?php }
}
?>