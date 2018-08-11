<?php
/**
 * progression Theme Customizer
 *
 * @package progression
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function progression_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'progression_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function progression_customize_preview_js() {
	wp_enqueue_script( 'progression_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'progression_customize_preview_js' );



/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
function progression_customizer( $wp_customize ) {
	
	// Adds abaillity to add text area
	if ( class_exists( 'WP_Customize_Control' ) ) { 
		# Adds textarea support to the theme customizer 
		class ProgressionTextAreaControl extends WP_Customize_Control { 
			public $type = 'textarea'; 
			public function __construct( $manager, $id, $args = array() ) { 
				$this->statuses = array( '' => __( 'Default', 'progression' ) ); 
				parent::__construct( $manager, $id, $args ); 
			}   
			
			public function render_content() { 
				echo '<label> 
				<span class="customize-control-title">' . esc_html( $this->label ) . '</span> 
				<textarea rows="5" style="width:100%;" '; $this->link(); echo '>' . esc_textarea( $this->value() ) . '</textarea> 
				</label>'; } 
			}   
		}
		
//Add Section Page of Theme Settings
    $wp_customize->add_section(
        'options_panel_progression',
        array(
            'title' => __('Theme Settings', 'progression'),
            'description' => __('Main Theme Settings', 'progression'),
            'priority' => 35,
        )
    );
	
	//Logo Uploader
	$wp_customize->add_setting( 
		'logo_upload' ,
		array(
	        'default' => get_template_directory_uri().'/images/logo.png',
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'logo_upload',
	        array(
	            'label' => __('Theme Logo', 'progression'), 
	            'section' => 'options_panel_progression',
	            'settings' => 'logo_upload',
					'priority'   => 5,
	        )
	    )
	);
	
	//Logo Width
	$wp_customize->add_setting( 
		'logo_width' ,
		array(
	        'default' => '180',
	    )
	);
	$wp_customize->add_control(
   'logo_width',
   	array(
	   	'label' => __('Logo Width', 'progression'), 
			'section' => 'options_panel_progression',
			'type' => 'text',
			'priority'   => 7,
	    )
	);
	
	
	
	
	//Header Padding
	$wp_customize->add_setting( 
		'header_padding' ,
		array(
	        'default' => '30',
	    )
	);
	$wp_customize->add_control(
   'header_padding',
   	array(
	   	'label' => __('Navigation Margin Top (Logo Height)', 'progression'), 
			'section' => 'options_panel_progression',
			'type' => 'text',
			'priority'   => 9,
	    )
	);
	

	//Comment Options
	$wp_customize->add_setting( 
		'header_fix_progression' 
	);
	$wp_customize->add_control(
   'header_fix_progression',
   	array(
	   	'label' => __('Set Header Fixed?', 'progression'), 
			'section' => 'options_panel_progression',
			'type' => 'checkbox',
			'priority'   => 10,
	    )
	);

	// Add Copyright Text
	$wp_customize->add_setting(
	    'copyright_textbox',
	    array(
	        'default' => '&copy; 2014 All Rights Reserved. Developed by ProgressionStudios',
	    )
	);

	$wp_customize->add_control(new ProgressionTextAreaControl( $wp_customize, 'copyright_textbox', array( 
		'label' => __('Copyright Text', 'progression'), 
		'section' => 'options_panel_progression', 
		'settings' => 'copyright_textbox', 
		'priority' => 12, ) 
		)
	);
	
	
	
	//Homepage Child Pages
	$wp_customize->add_setting( 
		'home_col_progression' ,
		array(
	        'default' => '3',
	    )
	);
	$wp_customize->add_control(
   'home_col_progression',
   	array(
		'label' => __('Home Child Page Column Count (2-4)', 'progression'), 
		'section' => 'options_panel_progression', 
		'settings' => 'home_col_progression', 
		'priority' => 19, 
	    )
	);
	
	
	//Comment Options
	$wp_customize->add_setting( 
		'comment_progression' 
	);
	$wp_customize->add_control(
   'comment_progression',
   	array(
	   	'label' => __('Display comments for pages?', 'progression'), 
			'section' => 'options_panel_progression',
			'type' => 'checkbox',
			'priority'   => 20,
	    )
	);
	
	
	
	
	//Portfolio Categories
	$wp_customize->add_setting( 
		'portfolio_col_progression' ,
		array(
	        'default' => '2',
	    )
	);
	$wp_customize->add_control(
   'portfolio_col_progression',
   	array(
	   	'label' => __('Portfolio posts per column (2-4)', 'progression'), 
			'section' => 'options_panel_progression',
			'type' => 'text',
			'priority'   => 40,
	    )
	);
	
	
	//Portfolio Pagination
	$wp_customize->add_setting( 
		'portfolio_pages_progression' ,
		array(
	        'default' => '12',
	    )
	);
	$wp_customize->add_control(
   'portfolio_pages_progression',
   	array(
	   	'label' => __('Portfolio posts per page', 'progression'), 
			'section' => 'options_panel_progression',
			'type' => 'text',
			'priority'   => 45,
	    )
	);
	
	
	//Footer Column
	$wp_customize->add_setting( 
		'footer_cols' ,
		array(
	        'default' => '3',
	    )
	);
	$wp_customize->add_control(
   'footer_cols',
   	array(
	   	'label' => __('Footer Column Count (1-4)', 'progression'), 
			'section' => 'options_panel_progression',
			'type' => 'text',
			'priority'   => 15,
	    )
	);
	
	//Shop Column Count
	$wp_customize->add_setting( 
		'shop_col_progression' ,
		array(
	        'default' => '3',
	    )
	);
	$wp_customize->add_control(
   'shop_col_progression',
   	array(
	   	'label' => __('Shop posts per column (2-4)', 'progression'), 
			'section' => 'options_panel_progression',
			'type' => 'text',
			'priority'   => 50,
	    )
	);



//Add Section Page of Social Settings
    $wp_customize->add_section(
        'footer_options_progression',
        array(
            'title' => __('Header Contact/Social Icons', 'progression'),
            'description' => 'Social Settings here!',
            'priority' => 45,
        )
    );
	
	
	//TOP LEFT HEADER
	$wp_customize->add_setting( 
		'empty_pro_header',
		array(
	        'default' => 'Edit or remove this section under Appearance > Theme Customizer',
	    )
	);
	$wp_customize->add_control(
   'empty_pro_header',
   	array(
	   	'label' => __('Extra text in header', 'progression'), 
			'section' => 'footer_options_progression',
			'type' => 'text',
			'priority'   => 8,
	    )
	);
	
	//Address field
	$wp_customize->add_setting( 
		'address_pro_header'
	);
	$wp_customize->add_control(
   'address_pro_header',
   	array(
	   	'label' => __('Address field in header', 'progression'), 
			'section' => 'footer_options_progression',
			'type' => 'text',
			'priority'   => 12,
	    )
	);
	
	
	//Phone field
	$wp_customize->add_setting( 
		'phone_pro_header'
	);
	$wp_customize->add_control(
   'phone_pro_header',
   	array(
	   	'label' => __('Phone field in header', 'progression'), 
			'section' => 'footer_options_progression',
			'type' => 'text',
			'priority'   => 13,
	    )
	);
	
	//E-mail field
	$wp_customize->add_setting( 
		'eeemail_pro_header'
	);
	$wp_customize->add_control(
   'eeemail_pro_header',
   	array(
	   	'label' => __('E-mail field in header', 'progression'), 
			'section' => 'footer_options_progression',
			'type' => 'text',
			'priority'   => 14,
	    )
	);
	
	
	
	//Facebook Icon
	$wp_customize->add_setting( 
		'facebook_link_progression'
	);
	$wp_customize->add_control(
   'facebook_link_progression',
   	array(
	   	'label' => __('Facebook Icon Link', 'progression'), 
			'section' => 'footer_options_progression',
			'type' => 'text',
			'priority'   => 20,
	    )
	);
	
	//Twitter Icon
	$wp_customize->add_setting( 
		'twitter_link_progression'
	);
	$wp_customize->add_control(
   'twitter_link_progression',
   	array(
	   	'label' => __('Twitter Icon Link', 'progression'), 
			'section' => 'footer_options_progression',
			'type' => 'text',
			'priority'   => 21,
	    )
	);
	
	//Google Plus Icon
	$wp_customize->add_setting( 
		'google_link_progression'
	);
	$wp_customize->add_control(
   'google_link_progression',
   	array(
	   	'label' => __('Google Plus Icon Link', 'progression'), 
			'section' => 'footer_options_progression',
			'type' => 'text',
			'priority'   => 22,
	    )
	);
	
	//Linkedin Icon
	$wp_customize->add_setting( 
		'linkedin_link_progression'
	);
	$wp_customize->add_control(
   'linkedin_link_progression',
   	array(
	   	'label' => __('LinkedIn Icon Link', 'progression'), 
			'section' => 'footer_options_progression',
			'type' => 'text',
			'priority'   => 24,
	    )
	);
	
	//Instagram Icon
	$wp_customize->add_setting( 
		'instagram_link_progression'
	);
	$wp_customize->add_control(
   'instagram_link_progression',
   	array(
	   	'label' => __('Instagram Icon Link', 'progression'), 
			'section' => 'footer_options_progression',
			'type' => 'text',
			'priority'   => 25,
	    )
	);
	
	//Pinterest Icon
	$wp_customize->add_setting( 
		'pinterest_link_progression'
	);
	$wp_customize->add_control(
   'pinterest_link_progression',
   	array(
	   	'label' => __('Pinterest Icon Link', 'progression'), 
			'section' => 'footer_options_progression',
			'type' => 'text',
			'priority'   => 26,
	    )
	);
	
	//Tumblr Icon
	$wp_customize->add_setting( 
		'tumblr_link_progression'
	);
	$wp_customize->add_control(
   'tumblr_link_progression',
   	array(
	   	'label' => __('Tumblr Icon Link', 'progression'), 
			'section' => 'footer_options_progression',
			'type' => 'text',
			'priority'   => 27,
	    )
	);
	
	
	//YouTube Icon
	$wp_customize->add_setting( 
		'youtube_link_progression'
	);
	$wp_customize->add_control(
   'youtube_link_progression',
   	array(
	   	'label' => __('YouTube Icon Link', 'progression'), 
			'section' => 'footer_options_progression',
			'type' => 'text',
			'priority'   => 28,
	    )
	);
	
	//DropBox Icon
	$wp_customize->add_setting( 
		'dropbox_link_progression'
	);
	$wp_customize->add_control(
   'dropbox_link_progression',
   	array(
	   	'label' => __('DropBox Icon Link', 'progression'), 
			'section' => 'footer_options_progression',
			'type' => 'text',
			'priority'   => 29,
	    )
	);
	
	//Flickr Icon
	$wp_customize->add_setting( 
		'flickr_link_progression'
	);
	$wp_customize->add_control(
   'flickr_link_progression',
   	array(
	   	'label' => __('Flickr Icon Link', 'progression'), 
			'section' => 'footer_options_progression',
			'type' => 'text',
			'priority'   => 30,
	    )
	);
	
	
	//Dribbble Icon
	$wp_customize->add_setting( 
		'dribbble_link_progression'
	);
	$wp_customize->add_control(
   'dribbble_link_progression',
   	array(
	   	'label' => __('Dribbble Icon Link', 'progression'), 
			'section' => 'footer_options_progression',
			'type' => 'text',
			'priority'   => 31,
	    )
	);


	

//Add Section Page of Background Colors
    $wp_customize->add_section(
        'progression_background_colors',
        array(
            'title' => __('Background Colors', 'progression'),
            'description' => 'Adjust background colors for the theme!',
            'priority' => 50,
        )
    );
	
	
	$wp_customize->add_setting('header_bg_top', array(
	    'default'     => '#ffffff'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'header_bg_top', array(
		'label'        => __( 'Top Header Background Color', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'header_bg_top',
		'priority'   => 4,
	)));
	
	
	$wp_customize->add_setting('header_bg', array(
	    'default'     => '#ffffff'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'header_bg', array(
		'label'        => __( 'Header Background Color', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'header_bg',
		'priority'   => 5,
	)));
	
	
	
	$wp_customize->add_setting('page_title_progression', array(
	    'default'     => '#f4f5f5'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'page_title_progression', array(
		'label'        => __( 'Page Title Background Color', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'page_title_progression',
		'priority'   => 6,
	)));
	
	
	
	$wp_customize->add_setting('nav_bg', array(
	    'default'     => '#ffffff'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'nav_bg', array(
		'label'        => __( 'Sub-Navigation Background Color', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'nav_bg',
		'priority'   => 8,
	)));
	


	
	
	
	$wp_customize->add_setting('body_bg_progression', array(
	    'default'     => '#ffffff'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'body_bg_progression', array(
		'label'        => __( 'Body Background Color', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'body_bg_progression',
		'priority'   => 15,
	)));
	

	$wp_customize->add_setting('footer_border_progression', array(
	    'default'     => '#ffffff'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_border_progression', array(
		'label'        => __( 'Footer Widget Background Color', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'footer_border_progression',
		'priority'   => 18,
	)));
	
	$wp_customize->add_setting('footer_bg_progression', array(
	    'default'     => '#ffffff'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_bg_progression', array(
		'label'        => __( 'Footer Background Color', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'footer_bg_progression',
		'priority'   => 19,
	)));
	
	

	$wp_customize->add_setting('button_bg_progression', array(
	    'default'     => '#24c4d1'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'button_bg_progression', array(
		'label'        => __( 'Button Background Color', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'button_bg_progression',
		'priority'   => 25,
	)));
	
	

	$wp_customize->add_setting('button_hover_bg_progression', array(
	    'default'     => '#888888'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'button_hover_bg_progression', array(
		'label'        => __( 'Button Hover Background Color', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'button_hover_bg_progression',
		'priority'   => 30,
	)));
	
	
	
	$wp_customize->add_setting('second_button_bg_progression', array(
	    'default'     => '#ecfbfc'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'second_button_bg_progression', array(
		'label'        => __( 'Second Button Background Color', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'second_button_bg_progression',
		'priority'   => 31,
	)));
	
	
	$wp_customize->add_setting('second_button_border_progression', array(
	    'default'     => '#95e6ec'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'second_button_border_progression', array(
		'label'        => __( 'Second Button Border Color', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'second_button_border_progression',
		'priority'   => 32,
	)));
	
	
	$wp_customize->add_setting('second_button_hover_bg_progression', array(
	    'default'     => '#888888'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'second_button_hover_bg_progression', array(
		'label'        => __( 'Second Button Hover Background Color', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'second_button_hover_bg_progression',
		'priority'   => 31,
	)));
	
	
	
	
	$wp_customize->add_setting('page_number_pro', array(
	    'default'     => '#33c8d4'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'page_number_pro', array(
		'label'        => __( 'Portfolio Index Background Color', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'page_number_pro',
		'priority'   => 40,
	)));
	
	
	$wp_customize->add_setting('page_number_hover_pro', array(
	    'default'     => '#0ac6d4'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'page_number_hover_pro', array(
		'label'        => __( 'Price Filter Background Color', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'page_number_hover_pro',
		'priority'   => 41,
	)));
	
	$wp_customize->add_setting('page_number_border_pro', array(
	    'default'     => '#a8eff5'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'page_number_border_pro', array(
		'label'        => __( 'Price Filter Second Background Colo', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'page_number_border_pro',
		'priority'   => 42,
	)));
	
	
	
	//BACKGROUND COLOR
	$wp_customize->add_setting( 
		'slider_bg_pro' ,
		array(
	        'default' => 'rgba(8,158,169,0.7)',
	    )
	);
	$wp_customize->add_control(
   'slider_bg_pro',
   	array(
	   	'label' => __('Slider Blue Text Background Color', 'progression'), 
			'section' => 'progression_background_colors',
			'type' => 'text',
			'priority'   => 50,
	    )
	);
	
	$wp_customize->add_setting('slider_btn_text', array(
	    'default'     => '#1fa8b2'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'slider_btn_text', array(
		'label'        => __( 'Slider Default Button Text Color', 'progression' ),
		'section'    => 'progression_background_colors',
		'settings'   => 'slider_btn_text',
		'priority'   => 51,
	)));
	
	
	//BACKGROUND COLOR
	$wp_customize->add_setting( 
		'slider_bt_bg_pro' ,
		array(
	        'default' => 'rgba(36,196,209,0.1)',
	    )
	);
	$wp_customize->add_control(
   'slider_bt_bg_pro',
   	array(
	   	'label' => __('Slider Default Button Background Color', 'progression'), 
			'section' => 'progression_background_colors',
			'type' => 'text',
			'priority'   => 52,
	    )
	);
	
	
	//BACKGROUND COLOR
	$wp_customize->add_setting( 
		'slider_bt_border_pro' ,
		array(
	        'default' => 'rgba(31, 168, 178, 0.75)',
	    )
	);
	$wp_customize->add_control(
   'slider_bt_border_pro',
   	array(
	   	'label' => __('Slider Default Button Border Color', 'progression'), 
			'section' => 'progression_background_colors',
			'type' => 'text',
			'priority'   => 53,
	    )
	);
	
	
	//BACKGROUND COLOR
	$wp_customize->add_setting( 
		'slider_bt_hvr_bg_pro' ,
		array(
	        'default' => 'rgba(36,196,209,0.18)',
	    )
	);
	$wp_customize->add_control(
   'slider_bt_hvr_bg_pro',
   	array(
	   	'label' => __('Slider Default Button Hover Background Color', 'progression'), 
			'section' => 'progression_background_colors',
			'type' => 'text',
			'priority'   => 54,
	    )
	);
	
	//BACKGROUND COLOR
	$wp_customize->add_setting( 
		'slider_bt_hvr_border_pro' ,
		array(
	        'default' => 'rgba(31, 168, 178, 1)',
	    )
	);
	$wp_customize->add_control(
   'slider_bt_hvr_border_pro',
   	array(
	   	'label' => __('Slider Default Button Hover Border Color', 'progression'), 
			'section' => 'progression_background_colors',
			'type' => 'text',
			'priority'   => 55,
	    )
	);
	

//Add Section Page of Background Colors
    $wp_customize->add_section(
        'progression_font_colors',
        array(
            'title' => __('Font Colors', 'progression'),
            'description' => 'Adjust font colors for the theme!',
            'priority' => 55,
        )
    );
	
	$wp_customize->add_setting('header_top_font_pro', array(
	    'default'     => '#555555'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'header_top_font_pro', array(
		'label'        => __( 'Header Top Font Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'header_top_font_pro',
		'priority'   => 3,
	)));
	
	$wp_customize->add_setting('header_hover_top_font_pro', array(
	    'default'     => '#999999'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'header_hover_top_font_pro', array(
		'label'        => __( 'Header Top Hover Font Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'header_hover_top_font_pro',
		'priority'   => 4,
	)));
	
	$wp_customize->add_setting('body_font_progression', array(
	    'default'     => '#899399'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'body_font_progression', array(
		'label'        => __( 'Body Font Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'body_font_progression',
		'priority'   => 5,
	)));
	
	
	$wp_customize->add_setting('page_font_progression', array(
	    'default'     => '#444444'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'page_font_progression', array(
		'label'        => __( 'Page Title Font Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'page_font_progression',
		'priority'   => 6,
	)));
	
	
	
	$wp_customize->add_setting('body_link_progression', array(
	    'default'     => '#24c4d1'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'body_link_progression', array(
		'label'        => __( 'Main Link Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'body_link_progression',
		'priority'   => 7,
	)));
	
	
	$wp_customize->add_setting('body_link_hover_progression', array(
	    'default'     => '#13a2ae'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'body_link_hover_progression', array(
		'label'        => __( 'Main Hover Link Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'body_link_hover_progression',
		'priority'   => 9,
	)));
	
	$wp_customize->add_setting('navigation_menu_color', array(
	    'default'     => '#8c8c8c'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'navigation_menu_color', array(
		'label'        => __( 'Navigation Link Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'navigation_menu_color',
		'priority'   => 12,
	)));
	
	
	$wp_customize->add_setting('navigation_selected_color', array(
	    'default'     => '#444444'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'navigation_selected_color', array(
		'label'        => __( 'Navigation Selected/Hover Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'navigation_selected_color',
		'priority'   => 13,
	)));
	
	
	
	
	$wp_customize->add_setting('sub_font_color', array(
	    'default'     => '#8c8c8c'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'sub_font_color', array(
		'label'        => __( 'Sub-Navigation Link Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'sub_font_color',
		'priority'   => 14,
	)));
	
	
	$wp_customize->add_setting('sub_hover_font_color', array(
	    'default'     => '#444444'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'sub_hover_font_color', array(
		'label'        => __( 'Sub-Navigation Hover Link Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'sub_hover_font_color',
		'priority'   => 15,
	)));
	
	
	$wp_customize->add_setting('heading_font_progression', array(
	    'default'     => '#444444'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'heading_font_progression', array(
		'label'        => __( 'Heading Font Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'heading_font_progression',
		'priority'   => 18,
	)));
	
	

	
	$wp_customize->add_setting('button_font_pro', array(
	    'default'     => '#ffffff'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'button_font_pro', array(
		'label'        => __( 'Button Font Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'button_font_pro',
		'priority'   => 20,
	)));
	
	
	$wp_customize->add_setting('button_hover_font_pro', array(
	    'default'     => '#ffffff'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'button_hover_font_pro', array(
		'label'        => __( 'Button Hover Font Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'button_hover_font_pro',
		'priority'   => 22,
	)));
	
	
	$wp_customize->add_setting('second_button_font_pro', array(
	    'default'     => '#24c4d1'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'second_button_font_pro', array(
		'label'        => __( 'Second Button Font Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'second_button_font_pro',
		'priority'   => 24,
	)));
	
	
	$wp_customize->add_setting('hover_second_button_font_pro', array(
	    'default'     => '#ffffff'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'hover_second_button_font_pro', array(
		'label'        => __( 'Second Button Hover Font Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'hover_second_button_font_pro',
		'priority'   => 26,
	)));
	
	
	$wp_customize->add_setting('sidebar_font_pro', array(
	    'default'     => '#bbbbbb'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'sidebar_font_pro', array(
		'label'        => __( 'Sidebar Link Font Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'sidebar_font_pro',
		'priority'   => 35,
	)));
	
	
	$wp_customize->add_setting('sidebarhover_font_pro', array(
	    'default'     => '#444444'
	));
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'sidebarhover_font_pro', array(
		'label'        => __( 'Sidebar Hover Link Font Color', 'progression' ),
		'section'    => 'progression_font_colors',
		'settings'   => 'sidebarhover_font_pro',
		'priority'   => 37,
	)));
	
	
}
add_action( 'customize_register', 'progression_customizer' );


function progression_customize_css()
{
    ?>
 
<style type="text/css">
	body #logo, body #logo img {width:<?php echo get_theme_mod('logo_width', '180'); ?>px;}
	.sf-menu a {margin-top:<?php echo get_theme_mod('header_padding', '30'); ?>px; padding-bottom:<?php echo get_theme_mod('header_padding', '30') / 2; ?>px;}
	#additional-social-pro {margin-top:<?php echo get_theme_mod('header_padding', '30'); ?>px; margin-bottom:<?php echo get_theme_mod('header_padding', '30'); ?>px;}
	#header-top { background-color:<?php echo get_theme_mod('header_bg_top', '#ffffff'); ?>;}
	header, #pro-header-fixed {background-color:<?php echo get_theme_mod('header_bg', '#ffffff'); ?>;} 
	#page-title { background:<?php echo get_theme_mod('page_title_progression', '#f4f5f5'); ?>;}
	.sf-menu ul { background:<?php echo get_theme_mod('nav_bg', '#ffffff'); ?>;}
	body { background-color:<?php echo get_theme_mod('body_bg_progression', '#ffffff'); ?>; }
	#widget-area {background-color:<?php echo get_theme_mod('footer_border_progression', '#ffffff'); ?>;}
	footer {background-color:<?php echo get_theme_mod('footer_bg_progression', '#ffffff'); ?>;}
	.portfolio-index-padding {	background:<?php echo get_theme_mod('page_number_pro', '#33c8d4'); ?>;}
	body #main .width-container .widget_price_filter .ui-slider .ui-slider-handle{ background:<?php echo get_theme_mod('page_number_hover_pro', '#0ac6d4'); ?>; border-color:<?php echo get_theme_mod('page_number_hover_pro', '#0ac6d4'); ?>; }
	body  #main .widget_price_filter .ui-slider .ui-slider-range {background:<?php echo get_theme_mod('page_number_hover_pro', '#0ac6d4'); ?>; }
	body #main .width-container .price_slider_wrapper .ui-widget-content{ background:<?php echo get_theme_mod('page_number_border_pro', '#a8eff5'); ?> ; }
	body {color:<?php echo get_theme_mod('body_font_progression', '#899399'); ?>;}
	body.woocommerce #reviews #comments ol.commentlist p.meta strong,
	p.sub-total-pro .amount, #header-top ul span, body #main  #portfolio-sub-nav li a:hover,body #main   #portfolio-sub-nav li.current-cat a, a, a.scrollup, #copyrigh-text a, a.scrollup:hover {color:<?php echo get_theme_mod('body_link_progression', '#24c4d1'); ?>;}
	body .home-content-highlight li.product a:hover h3.product-title-index-pro,
	h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, body .featured-post h4 a:hover,
	body #main a:hover h3.product-title-index-pro, body div.summary a.woocommerce-review-link:hover,
	body ul li.product a.added_to_cart:hover, a:hover, #copyrigh-text a:hover {color:<?php echo get_theme_mod('body_link_hover_progression', '#13a2ae'); ?>; }
	h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a { color:<?php echo get_theme_mod('heading_font_progression', '#444444'); ?>; } 
	.sf-menu a {color:<?php echo get_theme_mod('navigation_menu_color', '#8c8c8c'); ?>;}
	.sf-menu a:hover, body.single-post .sf-menu li.current_page_parent a, .sf-menu li.current-menu-item a, .sf-menu li.current-menu-item a:visited, .sf-menu a:hover, .sf-menu li a:hover, .sf-menu a:hover, .sf-menu a:visited:hover, .sf-menu li.sfHover a, .sf-menu li.sfHover a:visited
	{ color:<?php echo get_theme_mod('navigation_selected_color', '#444444'); ?>; }
	.sf-menu li.sfHover li a, .sf-menu li.sfHover li a:visited, .sf-menu li.sfHover li li a, .sf-menu li.sfHover li li a:visited, .sf-menu li.sfHover li li li a, .sf-menu li.sfHover li li li a:visited, .sf-menu li.sfHover li li li li a, .sf-menu li.sfHover li li li li a:visited
	{ color:<?php echo get_theme_mod('sub_font_color', '#8c8c8c'); ?>; }
	.sf-menu li li:hover, .sf-menu li li.sfHover, .sf-menu li li a:focus, .sf-menu li li a:hover, .sf-menu li li a:active, .sf-menu li li.sfHover a, .sf-menu li.sfHover li a:visited:hover, .sf-menu li li:hover a:visited,
	.sf-menu li li li:hover, .sf-menu li li li.sfHover, .sf-menu li li li a:focus, .sf-menu li li li a:hover, .sf-menu li li li a:active, .sf-menu li li li.sfHover a, .sf-menu li li.sfHover li a:visited:hover, .sf-menu li li li:hover a:visited,
	.sf-menu li li li li:hover, .sf-menu li li li li.sfHover, .sf-menu li li li li a:focus, .sf-menu li li li li a:hover, .sf-menu li li li li a:active, .sf-menu li li li li.sfHover a, .sf-menu li li li.sfHover li a:visited:hover, .sf-menu li li li li:hover a:visited,
	.sf-menu li li li li li:hover, .sf-menu li li li li li.sfHover, .sf-menu li li li li li a:focus, .sf-menu li li li li li a:hover, .sf-menu li li li li li a:active, .sf-menu li li li li li.sfHover a, .sf-menu li li li li.sfHover li a:visited:hover, .sf-menu li li li li li:hover a:visited  
	{ color:<?php echo get_theme_mod('sub_hover_font_color', '#444444'); ?>; }
	#page-title h1 {color:<?php echo get_theme_mod('page_font_progression', '#444444'); ?>;}
	.address-phone-pro, .address-phone-pro a, #header-top ul li a, #header-top ul li, #header-top ul li a i { color:<?php echo get_theme_mod('header_top_font_pro', '#555555'); ?>; }
	#header-top ul li a:hover, .address-phone-pro a:hover { color:<?php echo get_theme_mod('header_hover_top_font_pro', '#999999'); ?>; }
	p.cart-mini-button a.cart-mini-button-text, #checkout-basket-iceberg a.checkout-button-shopping-cart,
	.page-numbers span.current, .page-numbers a:hover, .pagination-portfolio a:hover,
	body .home-content-highlight a.button, body .home-content-highlight button.single_add_to_cart_button, body .home-content-highlight input.button, body.woocommerce-cart #main td.actions  input.button.checkout-button, body .home-content-highlight button.button, body #single-product-pro a.button, body #single-product-pro button.single_add_to_cart_button, body #single-product-pro input.button, body.woocommerce-cart #single-product-pro input.button.checkout-button, body #single-product-pro button.button,
	body a.ls-sc-button.secondary,  body #main .width-container input#submit,
	body #main a.button, body #main button.single_add_to_cart_button, body #main input.button, body.woocommerce-cart #main td.actions  input.button.checkout-button, body #main button.button, body #single-product-pro a.button, body #single-product-pro button.single_add_to_cart_button, body #single-product-pro input.button, body.woocommerce-cart #single-product-pro input.button.checkout-button, body #single-product-pro button.button,
	body a.progression-button, body input.wpcf7-submit, body input#submit, body a.ls-sc-button.default {
		border:1px solid <?php echo get_theme_mod('button_bg_progression', '#24c4d1'); ?>;
		background:<?php echo get_theme_mod('button_bg_progression', '#24c4d1'); ?>;
		color:<?php echo get_theme_mod('button_font_pro', '#ffffff'); ?>; }
		#header-top .cart-nav-pro a.shopping-cart-basket .shopping-cart-header-count {background:<?php echo get_theme_mod('button_bg_progression', '#24c4d1'); ?>;}
		p.cart-mini-button a.cart-mini-button-text:hover, #checkout-basket-iceberg a.checkout-button-shopping-cart:hover,
	body .home-content-highlight a.button:hover, body .home-content-highlight button.single_add_to_cart_button:hover, body .home-content-highlight input.button:hover, body.woocommerce-cart #main td.actions input.button.checkout-button:hover, body .home-content-highlight button.button:hover, body #single-product-pro a.button:hover, body #single-product-pro button.single_add_to_cart_button:hover, body #single-product-pro input.button:hover, body.woocommerce-cart #single-product-pro input.button.checkout-button:hover, body #single-product-pro button.button:hover,
	body #main .width-container input#submit:hover, a.progression-button-slider:hover, a.progression-light-button:hover,
	body #main a.button:hover, body #main button.single_add_to_cart_button:hover, body #main input.button:hover, body.woocommerce-cart #main td.actions input.button.checkout-button:hover, body #main button.button:hover, body #single-product-pro a.button:hover, body #single-product-pro button.single_add_to_cart_button:hover, body #single-product-pro input.button:hover, body.woocommerce-cart #single-product-pro input.button.checkout-button:hover, body #single-product-pro button.button:hover,
	body a.progression-button:hover, body input.wpcf7-submit:hover, body input#submit:hover, body a.ls-sc-button.default:hover {
		background:<?php echo get_theme_mod('button_hover_bg_progression', '#888888'); ?>;
	border-color:<?php echo get_theme_mod('button_hover_bg_progression', '#888888'); ?>;
	color:<?php echo get_theme_mod('button_hover_font_pro', '#ffffff'); ?>; }
	body #main .width-container .woocommerce-tabs .tabs li.active a, body #main .width-container .woocommerce-tabs .tabs li.active a:hover,
	.social-icons-widget-pro .social-ico a i,
	.pagination-portfolio a,
	.page-numbers span, .page-numbers a,
	#portfolio-sub-nav li a:hover, #portfolio-sub-nav li.current-cat a,
	a.comment-reply-link ,
	body #main a.more-link,
	body #main a.ls-sc-button.secondary,
	body a.progression-button.secondary-button,
	body.woocommerce-cart #main td.actions  input,
	body #main #sidebar button.button, body #main #sidebar a.button {
		background:<?php echo get_theme_mod('second_button_bg_progression', '#ecfbfc'); ?>;
		border:1px solid <?php echo get_theme_mod('second_button_border_progression', '#95e6ec'); ?>;
		color:<?php echo get_theme_mod('second_button_font_pro', '#24c4d1'); ?>;}
	a.comment-reply-link:hover,
	body a.progression-button.secondary-button:hover,
	body.woocommerce-cart #main td.actions  input:hover,
	body #main #sidebar button.button:hover, body #main #sidebar a.button:hover, body #main a.more-link:hover,
	body #main a.ls-sc-button.secondary:hover {
	 	background:<?php echo get_theme_mod('second_button_hover_bg_progression', '#888888'); ?>;
		border-color:<?php echo get_theme_mod('second_button_hover_bg_progression', '#888888'); ?>;
		color:<?php echo get_theme_mod('hover_second_button_font_pro', '#ffffff'); ?>; }
	#sidebar ul.product_list_widget li a, #sidebar ul.product_list_widget li .reviewer, #sidebar a { color:<?php echo get_theme_mod('sidebar_font_pro', '#bbbbbb'); ?>; }
	#sidebar ul.product_list_widget li a:hover,
	#sidebar a:hover { color:<?php echo get_theme_mod('sidebarhover_font_pro', '#444444'); ?>; }
	body #pro-home-slider .pro-heading-blue, body #pro-home-slider .pro-text-blue { background:<?php echo get_theme_mod('slider_bg_pro', 'rgba(8,158,169,0.7)'); ?>; }
	body #pro-home-slider a.ls-sc-button.default span, body #pro-home-slider a.ls-sc-button.default { color:<?php echo get_theme_mod('slider_btn_text', '#1fa8b2'); ?>; }
	
	
	body #pro-home-slider a.ls-sc-button.default {border:1px solid <?php echo get_theme_mod('slider_bt_border_pro', 'rgba(31, 168, 178, 0.75)'); ?> !important; background:<?php echo get_theme_mod('slider_bt_bg_pro', 'rgba(36,196,209,0.1)'); ?>;}
	
	body #pro-home-slider a.ls-sc-button.default:hover {
		border:1px solid <?php echo get_theme_mod('slider_bt_hvr_border_pro', 'rgba(31, 168, 178, 1)'); ?> !important;
		background:<?php echo get_theme_mod('slider_bt_hvr_bg_pro', 'rgba(36,196,209,0.18)'); ?>;
	}
	
	<?php if (get_theme_mod( 'comment_progression')) : ?><?php else: ?>body.page #respond {display:none;}<?php endif ?>
</style>
    <?php
}
add_action('wp_head', 'progression_customize_css');

