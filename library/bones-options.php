<?php

/* GENERAL 
------------------------------------------------------- */ 

/* CONTACT INFORMATION
------------------------------------------------------- */ 

function bones_contact_information($wp_customize) {
		
	// kill defaults
	$wp_customize->remove_section( 'colors');
	$wp_customize->remove_section( 'background_image');
	$wp_customize->remove_section( 'widgets');
	$wp_customize->remove_section( 'static_front_page');
	$wp_customize->remove_section( 'custom_css');
	$wp_customize->remove_section( 'nav_menus');
	$wp_customize->remove_section( 'title_tagline');

	
	// add new ones
	$wp_customize->add_section(
		'address_information',
		array(
			'title' => 'Address Information',
			'description' => __('These are the fields that populate the links in the footer and elsewhere on the site'),
			'priority' => 5
		)
	);
	
	$wp_customize->add_setting(
		'business_name',
		array(
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control(
		'business_name',
		array(
			'label' => 'Business Name',
			'section' => 'address_information',
			'type' => 'text'
		)
	);
	
	$wp_customize->add_setting(
		'suite_number',
		array(
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control(
		'suite_number',
		array(
			'label' => 'Suite Number',
			'section' => 'address_information',
			'type' => 'text'
		)
	);
	$wp_customize->add_setting(
		'street_address',
		array(
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control(
		'street_address',
		array(
			'label' => 'Street Address',
			'section' => 'address_information',
			'type' => 'text'
		)
	);
	$wp_customize->add_setting(
		'city',
		array(
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control(
		'city',
		array(
			'label' => 'City',
			'section' => 'address_information',
			'type' => 'text'
		)
	);

	$wp_customize->add_setting(
		'province',
		array(
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control(
		'province',
		array(
			'label' => 'Province',
			'section' => 'address_information',
			'type' => 'text'
		)
	);
	$wp_customize->add_setting(
		'postal_code',
		array(
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control(
		'postal_code',
		array(
			'label' => 'Postal Code',
			'section' => 'address_information',
			'type' => 'text'
		)
	);

	$wp_customize->add_section(
		'contact_information',
		array(
			'title' => 'Contact Information',
			'description' => __('These are the fields that populate the links in the footer and elsewhere on the site'),
			'priority' => 5
		)
	);
	
	$wp_customize->add_setting(
		'phone_number',
		array(
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control(
		'phone_number',
		array(
			'label' => 'Phone Number',
			'section' => 'contact_information',
			'type' => 'text'
		)
	);

	$wp_customize->add_setting(
		'fax_number',
		array(
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control(
		'fax_number',
		array(
			'label' => 'Fax Number',
			'section' => 'contact_information',
			'type' => 'text'
		)
	);

	$wp_customize->add_setting(
		'email_address',
		array(
			'sanitize_callback' => 'sanitize_email'
		)
	);
	$wp_customize->add_control(
		'email_address',
		array(
			'label' => 'Email Address',
			'section' => 'contact_information',
			'type' => 'text'
		)
	);

	$wp_customize->add_section(
		'social_media',
		array(
			'title' => 'Social Media',
			'description' => __('Place your Social Media accounts here! Leave any accounts you don\'t have empty.'),
			'priority' => 5
		)
	);
	
	$wp_customize->add_setting(
		'twitter_username',
		array(
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control(
		'twitter_username',
		array(
			'label' => 'Twitter Username',
			'section' => 'social_media',
			'type' => 'text'
		)
	);

	$wp_customize->add_setting(
		'facebook_url', array(
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(
		'facebook_url',
		array(
			'label' => 'Facebook URL',
			'section' => 'social_media',
			'type' => 'text'
		)
	);

	$wp_customize->add_setting(
		'instagram_username',
		array(
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control(
		'instagram_username',
		array(
			'label' => 'Instagram Username',
			'section' => 'social_media',
			'type' => 'text'
		)
	);
		$wp_customize->add_setting(
		'youtube_url', array(
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(
		'youtube_url',
		array(
			'label' => 'Youtube URL',
			'section' => 'social_media',
			'type' => 'text'
		)
	);
	$wp_customize->add_setting(
		'linkedin_url', array(
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(
		'linkedin_url',
		array(
			'label' => 'LinkedIn URL',
			'section' => 'social_media',
			'type' => 'text'
		)
	);
	$wp_customize->add_section(
		'theme_defaults',
		array(
			'title' => 'Theme Defaults',
			'description' => __('These are bits and bobs to make the theme run. Don\'t mess with this if you are unsure of what you are doing'),
			'priority' => 5
		)
	);

	$wp_customize->add_setting(
		'placeholder_image',
		array(
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Upload_Control(
		$wp_customize, 
		'placeholder_image', 
		array(
			'label'      => 'Placeholder Image',
			'section'    => 'theme_defaults',
			'settings'   => 'placeholder_image',
		)) 
	);
	$wp_customize->add_setting(
		'favicon',
		array(
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Upload_Control(
		$wp_customize, 
		'favicon', 
		array(
			'label'      => 'Favicon icon (32x32 png)',
			'section'    => 'theme_defaults',
			'settings'   => 'favicon',
		)) 
	);
	
}
add_action('customize_register', 'bones_contact_information');