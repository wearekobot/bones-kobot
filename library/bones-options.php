<?php

/* GENERAL 
------------------------------------------------------- */ 

/* CONTACT INFORMATION
------------------------------------------------------- */ 

function bones_contact_information($wp_customize) {
	
	// $wp_customize->add_section(
	// 	'front_page',
	// 	array(
	// 		'title' => 'Front Page',
	// 		'description' => __('front page stuff'),
	// 		'priority' => 5
	// 	)
	// );
	
	// $wp_customize->add_setting(
	// 	'image_1',
	// 	array(
	// 		'sanitize_callback' => 'sanitize_text_field'
	// 	)
	// );
	// $wp_customize->add_control(
	// 	new WP_Customize_Upload_Control(
	// 	$wp_customize, 
	// 	'image_1', 
	// 	array(
	// 		'label'      => 'Image 1',
	// 		'section'    => 'front_page',
	// 		'settings'   => 'image_1',
	// 	)) 
	// );
	
	// $wp_customize->add_setting(
	// 	'image_2',
	// 	array(
	// 		'sanitize_callback' => 'sanitize_text_field'
	// 	)
	// );
	// $wp_customize->add_control(
	// 	new WP_Customize_Upload_Control(
	// 	$wp_customize, 
	// 	'image_2', 
	// 	array(
	// 		'label'      => 'Image 2',
	// 		'section'    => 'front_page',
	// 		'settings'   => 'image_2',
	// 	)) 
	// );
	
	// $wp_customize->add_control(
	// 	'business_name',
	// 	array(
	// 		'label' => 'Business Name',
	// 		'section' => 'front_page',
	// 		'type' => 'text'
	// 	)
	// );
	
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
			'section' => 'contact_information',
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
			'section' => 'contact_information',
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
			'section' => 'contact_information',
			'type' => 'text'
		)
	);
	
}
add_action('customize_register', 'bones_contact_information');