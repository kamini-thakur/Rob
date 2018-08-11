<?php
function add_custom_meta_boxes() {
    $meta_box = array(
        'id'         => 'progression_page_settings', // Meta box ID
        'title'      => 'Page Settings', // Meta box title
        'pages'      => array('page'), // Post types this meta box should be shown on
        'context'    => 'normal', // Meta box context
        'priority'   => 'high', // Meta box priority
        'fields' => array(
            array(
                'id' => 'progression_category_slug',
                'name' => 'Homepage Slider: Insert Slider Shortcode',
                'desc' => '<br>Copy/paste in your slider shortcode. ',
                'type' => 'text',
                'std' => ''
            ),
            array(
                'id' => 'pageoptions_contact_map',
                'name' => 'Contact Page Map Short Code',
                'desc' => '<br>Add-in a shortcode to display a contact form map. (Contact Page Template only). ',
                'type' => 'text',
                'std' => ''
            )
        )
    );
    dev7_add_meta_box( $meta_box );
	
    $meta_box2 = array(
        'id'         => 'progression_post_settings', // Meta box ID
        'title'      => 'Post Settings', // Meta box title
        'pages'      => array('post', 'portfolio'), // Post types this meta box should be shown on
        'context'    => 'normal', // Meta box context
        'priority'   => 'high', // Meta box priority
        'fields' => array(
            array(
                'id' => 'progression_media_embed',
                'name' => 'Audio/Video Embed',
                'desc' => '<br>Paste in your video embed code here',
                'type' => 'textarea',
                'std' => ''
            ),
            array(
                'id' => 'progression_external_link',
                'name' => 'External Link',
                'desc' => '<br>Make your post link to another page than the post page. ',
                'type' => 'text',
                'std' => ''
            )
        )
    );
    dev7_add_meta_box( $meta_box2 );
	
	
}
add_action( 'dev7_meta_boxes', 'add_custom_meta_boxes' );






?>