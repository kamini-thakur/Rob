<?php


/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
function example_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'example_section_one',
        array(
            'title' => 'Example Settings',
            'description' => 'This is a settings section.',
            'priority' => 35,
        )
    );

	
	$wp_customize->add_setting(
	    'copyright_textbox',
	    array(
	        'default' => 'Default copyright text',
	    )
	);

	$wp_customize->add_control(
	    'copyright_textbox',
	    array(
	        'label' => 'Copyright text',
	        'section' => 'example_section_one',
	        'type' => 'text',
	    )
	);

}
add_action( 'customize_register', 'example_customizer' );






