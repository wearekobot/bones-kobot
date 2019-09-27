<?php

/* Block registry and fields 
------------------------------------------------------- */ 

//
// Block: Social Media
//
//--------------------------------

// Register a social Block
add_action('acf/init', function () {
	acf_register_block(array(
		'name'        => 'social-block',
		'title'       => __('Social Icons'),
		'mode' => 'preview', 
		'description'   => __('Get Social!'),
		'render_template' => 'includes/block--social.php'
	));
});

//
// Block: Contact CTA
//
//--------------------------------

// Register block
add_action('acf/init', function () {
	acf_register_block(array(
		'name'            => 'cta--contact-block',
		'title'           => 'Block: Contact CTA',
		'mode'            => 'edit',
		'description'     => 'This is a block you can drop into any page for a generic Call-to-action that can link to your contact form.',
		'render_template' => 'includes/block--cta_contact.php'
	));
});

// Create fields in ACF
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5d8638f802003',
	'title' => 'Block: Contact CTA',
	'fields' => array(
		array(
			'key' => 'field_5d863907af4c2',
			'label' => 'Heading',
			'name' => 'heading',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'Have Questions?',
			'placeholder' => 'Default: Have Questions?',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5d863918af4c3',
			'label' => 'Text',
			'name' => 'text',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'Reach out to Contact Us',
			'placeholder' => 'Default: Reach out to Contact Us',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5d863932af4c4',
			'label' => 'Button Text',
			'name' => 'button_text',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'Contact Us',
			'placeholder' => 'Default: Contact Us',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/cta--contact-block',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;