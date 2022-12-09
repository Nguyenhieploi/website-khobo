<?php

class DNXTIEL_NextImageEffect extends ET_Builder_Module {

	public $slug       = 'dnxtiel_next_image_effect';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'www.divinext.com',
		'author'     => 'Divi Next',
		'author_uri' => 'www.divinext.com',
	);

	public function init() {
		$this->name = esc_html__( 'Next Image Effect Lite', 'dnxtiel-next-image-effect-lite' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . './img/EffectLite.svg';

		$this->settings_modal_toggles = array(
			'general'	=> array(
				'toggles'		=>	array(
					'dnxtiel_img'	=> array(
						'title'		=> esc_html__( 'Image/Icon', 'dnxtiel-next-image-effect-lite' ),
						'priority'	=>	10,
					),
					'dnxtiel_background'	=> array(
						'title'		=>	esc_html__( 'Hover Background', 'dnxtiel-next-image-effect-lite' ),
						'priority'	=>	30,
						'sub_toggles'       => array(
                            'sub_toggle_color'   => array(
								'name' => esc_html__( 'Color', 'dnxtiel-next-image-effect-lite' )
                            ),
                            'sub_toggle_gradient'   => array(
								'name' => esc_html__( 'Gradient', 'dnxtiel-next-image-effect-lite' )
                            )
                        ),
                        'tabbed_subtoggles' => true,
					),
					'dnxtiel_button' 	=> array(
						'title' 		=> esc_html__( 'Button', 'dnxtiel-next-image-effect-lite'),
						'priority'		=> 11
					)
				),
			),
			'advanced' 						=> array(
				'toggles'     				=> array(
					'dnxtiel_hover_effect' 	=> esc_html__( 'Hover Effect', 'dnxtiel-next-image-effect-lite' ),
					'dnxtiel_fonts'			=> esc_html__( 'Heading', 'dnxtiel-next-image-effect-lite' ),
					'dnxtiel_hvr_img'		=> esc_html__( 'Hover Image/Icon', 'dnxtiel-next-image-effect-lite' ),
					'dnxtiel_button'		=> esc_html__( 'Button', 'dnxtiel-next-image-effect-lite' ),
 				)
			),
		);


		// CUSTOM CSS FIELDS
		$this->custom_css_fields = array(
			'dnxtiel_imghvr_wrapper' => array(
				'label' => esc_html__('Image wrapper', 'dnxtiel-next-image-effect-lite' ),
				'selector' => '%%order_class%% .dnxtiel-imghvr-wrapper'
			),
			'dnxtiel_heading' => array(
				'label' => esc_html__('Heading', 'dnxtiel-next-image-effect-lite' ),
				'selector' => '%%order_class%% .dnxtiel-heading',
			),
			'dnxtiel_content' => array(
				'label' => esc_html__('Content', 'dnxtiel-next-image-effect-lite' ),
				'selector' => '%%order_class%% .dnxtiel-imghvr-content p',
			),
			'dnxtiel_hvr_image' => array(
				'label' => esc_html__('Hover Image', 'dnxtiel-next-image-effect-lite' ),
				'selector' => '%%order_class%% .dnxtiel-hover-image, %%order_class%% .dnxtiel-hover-icon',
			),
			'dnxtiel_btn' => array(
				'label' => esc_html__('Button', 'dnxtiel-next-image-effect-lite' ),
				'selector' => '%%order_class%% .dnxtiel-hover-button',
			),
		);
	}

	public function get_fields() {
		$field =  array(
			'dnxtiel_image'				=> array(
				'label'              	=> esc_html__( 'Image', 'dnxtiel-next-image-effect-lite' ),
				'type'               	=> 'upload',
				'option_category'    	=> 'basic_option',
				'upload_button_text' 	=> esc_attr__( 'Upload an image', 'dnxtiel-next-image-effect-lite' ),
				'choose_text'        	=> esc_attr__( 'Choose an Image', 'dnxtiel-next-image-effect-lite' ),
				'update_text'        	=> esc_attr__( 'Set As Image', 'dnxtiel-next-image-effect-lite' ),
				'description'        	=> esc_html__( 'Upload an image to display at the top of your blurb.', 'dnxtiel-next-image-effect-lite' ),
				'toggle_slug'        	=> 'dnxtiel_img',
				'dynamic_content'    	=> 'image',
				'mobile_options'	 	=> true,
			),
			// Image alt
			'dnxtiel_alt'			=> array(
				'label'           	=> esc_html__( 'Image Alt Text', 'dnxtiel-next-image-effect-lite' ),
				'type'            	=> 'text',
				'option_category' 	=> 'basic_option',
				'description'     	=> esc_html__( 'Define the HTML ALT text for your image here.', 'dnxtiel-next-image-effect-lite' ),
				'toggle_slug'     	=> 'dnxtiel_img',
				'dynamic_content' 	=> 'text',
			),
			// Heading Text
			'dnxtiel_heading_text'	=> array(
				'label'           	=> esc_html__( 'Heading Text', 'dnxtiel-next-image-effect-lite' ),
				'type'            	=> 'text',
				'dynamic_content' 	=> 'text',
				'option_category' 	=> 'basic_option',
				'description'     	=> esc_html__( 'Heading Text entered here will appear inside the module.', 'dnxtiel-next-image-effect-lite' ),
				'toggle_slug'     	=> 'main_content',
			),
			//Heading Tag
			'dnxtiel_heading_tag'	=> array(
				'label'           		=> esc_html__( 'Select Heading Tag', 'dnxtiel-next-image-effect-lite' ),
				'type'            		=> 'select',
				'description'     		=> esc_html__( 'Select heading tag, which you would like to use', 'dnxtiel-next-image-effect-lite' ),
				'option_category' 		=> 'basic_option',
				'toggle_slug'     		=> 'main_content',
				'options'         		=> array(
					'h1'	  	  		=> esc_html__( 'H1', 'dnxtiel-next-image-effect-lite' ),
					'h2'	  	  		=> esc_html__( 'H2', 'dnxtiel-next-image-effect-lite' ),
					'h3'	  	  		=> esc_html__( 'H3', 'dnxtiel-next-image-effect-lite' ),
					'h4'	  	  		=> esc_html__( 'H4', 'dnxtiel-next-image-effect-lite' ),
					'h5'	  	  		=> esc_html__( 'H5', 'dnxtiel-next-image-effect-lite' ),
					'h6'	  	  		=> esc_html__( 'H6', 'dnxtiel-next-image-effect-lite' ),
					'p'	      	  		=> esc_html__( 'P', 'dnxtiel-next-image-effect-lite' ),
					'span'	  	  		=> esc_html__( 'Span', 'dnxtiel-next-image-effect-lite' ),
				),
				'default'         		=> 'h2',
			),
			// Content
			'dnxtiel_description' 	=> array(
				'label'           	=> esc_html__( 'Content', 'dnxtiel-next-image-effect-lite' ),
				'type'            	=> 'tiny_mce',
				'dynamic_content' 	=> 'text',
				'option_category' 	=> 'basic_option',
				'description'     	=> esc_html__( 'Content entered here will appear inside the module.', 'dnxtiel-next-image-effect-lite' ),
				'toggle_slug'     	=> 'main_content',
			),
			'dnxtiel_image_hover_effect'=> array(
				'label'             	=> esc_html__( 'Select Image Hover', 'dnxtiel-next-image-effect-lite' ),
				'type'              	=> 'select',
				'option_category'   	=> 'configuration',
				'tab_slug'          	=> 'advanced',
				'toggle_slug'       	=> 'dnxtiel_hover_effect',
				'description'       	=> esc_html__( 'Here you can adjust the hover effect.', 'dnxtiel-next-image-effect-lite' ),
				'options'           	=> array(
					'push-up'   				=>  esc_html__( 'Push Up', 'dnxtiel-next-image-effect-lite' ),
					'push-down'					=>  esc_html__( 'Push Down', 'dnxtiel-next-image-effect-lite' ),
					'push-left'   				=>  esc_html__( 'Push Left', 'dnxtiel-next-image-effect-lite' ),
					'push-right'   				=>  esc_html__( 'Push Right', 'dnxtiel-next-image-effect-lite' ),
					'slide-up'   				=>  esc_html__( 'Slide Up', 'dnxtiel-next-image-effect-lite' ),
					'slide-down'   				=>  esc_html__( 'Slide Down', 'dnxtiel-next-image-effect-lite' ),
					'slide-left'   				=>  esc_html__( 'Slide Left', 'dnxtiel-next-image-effect-lite' ),
					'slide-right'   			=>  esc_html__( 'Slide Right', 'dnxtiel-next-image-effect-lite' ),
					'reveal-up'   				=>  esc_html__( 'Reveal Up', 'dnxtiel-next-image-effect-lite' ),
					'reveal-down'   			=>  esc_html__( 'Reveal Down', 'dnxtiel-next-image-effect-lite' ),
					'reveal-left'   			=>  esc_html__( 'Reveal Left', 'dnxtiel-next-image-effect-lite' ),
					'reveal-right'   			=>  esc_html__( 'Reveal Right', 'dnxtiel-next-image-effect-lite' ),
					'fade'   					=>  esc_html__( 'Fade', 'dnxtiel-next-image-effect-lite' ),
					'hinge-up'   				=>  esc_html__( 'Hinge Up', 'dnxtiel-next-image-effect-lite' ),
					'hinge-down'   				=>  esc_html__( 'Hinge Down', 'dnxtiel-next-image-effect-lite' ),
					'hinge-left'   				=>  esc_html__( 'Hinge Left', 'dnxtiel-next-image-effect-lite' ),
					'hinge-right'   			=>  esc_html__( 'Hinge Right', 'dnxtiel-next-image-effect-lite' ),
					'flip-horiz'   				=>  esc_html__( 'Flip Horizontal', 'dnxtiel-next-image-effect-lite' ),
					'flip-vert'   				=>  esc_html__( 'Flip Vertical', 'dnxtiel-next-image-effect-lite' ),
					'flip-diag-1'   			=>  esc_html__( 'Flip Diag 1', 'dnxtiel-next-image-effect-lite' ),
					'flip-diag-2'   			=>  esc_html__( 'Flip Diag 2', 'dnxtiel-next-image-effect-lite' ),
					'shutter-out-horiz'   		=>  esc_html__( 'Shutter Out Horizontal', 'dnxtiel-next-image-effect-lite' ),
					'shutter-out-vert'   		=>  esc_html__( 'Shutter Out Vertical', 'dnxtiel-next-image-effect-lite' ),
					'shutter-out-diag-1'   		=>  esc_html__( 'Shutter Out Diag 1', 'dnxtiel-next-image-effect-lite' ),
					'shutter-out-diag-2'   		=>  esc_html__( 'Shutter Out Diag 2', 'dnxtiel-next-image-effect-lite' ),
					'shutter-in-horiz'   		=>  esc_html__( 'Shutter In Horizontal', 'dnxtiel-next-image-effect-lite' ),
					'shutter-in-vert'   		=>  esc_html__( 'Shutter In Vertical', 'dnxtiel-next-image-effect-lite' ),
					'shutter-in-out-horiz'   	=>  esc_html__( 'Shutter In Out Horizontal', 'dnxtiel-next-image-effect-lite' ),
					'shutter-in-out-vert'   	=>  esc_html__( 'Shutter In Out Vertical', 'dnxtiel-next-image-effect-lite' ),
					'shutter-in-out-diag-1'   	=>  esc_html__( 'Shutter In Out Diag 1', 'dnxtiel-next-image-effect-lite' ),
					'shutter-in-out-diag-2'   	=>  esc_html__( 'Shutter In Out Diag 2', 'dnxtiel-next-image-effect-lite' ),
					'fold-up'   				=>  esc_html__( 'Fold Up', 'dnxtiel-next-image-effect-lite' ),
					'fold-down'   				=>  esc_html__( 'Fold Down', 'dnxtiel-next-image-effect-lite' ),
					'fold-left'   				=>  esc_html__( 'Fold Left', 'dnxtiel-next-image-effect-lite' ),
					'fold-right'   				=>  esc_html__( 'Fold Right', 'dnxtiel-next-image-effect-lite' ),
					'zoom-in'   				=>  esc_html__( 'Zoom In', 'dnxtiel-next-image-effect-lite' ),
					'zoom-out'   				=>  esc_html__( 'Zoom Out', 'dnxtiel-next-image-effect-lite' ),
					'zoom-out-up'   			=>  esc_html__( 'Zoom Out Up', 'dnxtiel-next-image-effect-lite' ),
					'zoom-out-down'   			=>  esc_html__( 'Zoom Out Down', 'dnxtiel-next-image-effect-lite' ),
					'zoom-out-left'   			=>  esc_html__( 'Zoom Out Left', 'dnxtiel-next-image-effect-lite' ),
					'zoom-out-right'   			=>  esc_html__( 'Zoom Out Right', 'dnxtiel-next-image-effect-lite' ),
					'zoom-out-flip-horiz'   	=>  esc_html__( 'Zoom Out Flip Horizontal', 'dnxtiel-next-image-effect-lite' ),
					'zoom-out-flip-vert'   		=>  esc_html__( 'Zoom Out Flip Vertical', 'dnxtiel-next-image-effect-lite' ),
					'blur'   					=>  esc_html__( 'Blur', 'dnxtiel-next-image-effect-lite' ),
				),
				'default'           	=> 'fade',
			),
			// Hover Background 
			'dnxtiel_hover_bg_show_hide'  => array(
				'label'           => esc_html__( 'Hover Background Color', 'dnxtiel-next-image-effect-lite' ),
				'type'            => 'yes_no_button',                
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxtiel_background',
				'sub_toggle'	  => 'sub_toggle_color',
				'options'         =>  array(
					'on'  => esc_html__( 'Yes', 'dnxtiel-next-image-effect-lite' ),
					'off' => esc_html__( 'No', 'dnxtiel-next-image-effect-lite' ),
				),
				'affects'         => array(
					'dnxtiel_hover_bg',
				),
				'default_on_front' => 'on',
			),
			// Hover BG Color
			'dnxtiel_hover_bg'	 => array(
				'label'          => esc_html__( 'Select Background Color', 'dnxtiel-next-image-effect-lite' ),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxtiel_background',
				'sub_toggle'	 => 'sub_toggle_color',
				'option_category'=> 'basic_option',
				'default'        => '#266de8',
				'depends_show_if'=> 'on',
				'mobile_options' => true,
				'responsive'	 => true,
			),
			// Hover Background Gradient 
			'dnxtiel_hover_gradient_show_hide'  => array(
				'label'           => esc_html__( 'Gradient Hover Color', 'dnxtiel-next-image-effect-lite' ),
				'type'            => 'yes_no_button',                
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxtiel_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxtiel-next-image-effect-lite' ),
					'off' => esc_html__( 'No', 'dnxtiel-next-image-effect-lite' ),
				),
				'affects'         => array(
					'dnxtiel_hover_gradient_color_one',
					'dnxtiel_hover_gradient_color_two',
					'dnxtiel_hover_gradient_type',
					'dnxtiel_hover_gradient_start_position',
					'dnxtiel_hover_gradient_end_position'
				),
				'default_on_front' => 'off',
			),

			'dnxtiel_hover_gradient_color_one'	=> array(
				'label'          => esc_html__('Select Color One', 'dnxtiel-next-image-effect-lite' ),
				'type'           => 'color-alpha',
				'option_category'=> 'basic_option',
				'toggle_slug'    => 'dnxtiel_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#2b87da',
				'depends_show_if'=> 'on'
			),
			'dnxtiel_hover_gradient_color_two'	=> array(
				'label'          => esc_html__('Select Color Two', 'dnxtiel-next-image-effect-lite' ),
				'type'           => 'color-alpha',
				'option_category'=> 'basic_option',
				'toggle_slug'    => 'dnxtiel_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#29c4a9',
				'depends_show_if'=> 'on'
			),
			'dnxtiel_hover_gradient_type'		=> array(
				'label'           => esc_html__( 'Select Gradient Type', 'dnxtiel-next-image-effect-lite' ),
				'type'            => 'select',
				'description'     => esc_html__( 'Select the types of gradient', 'dnxtiel-next-image-effect-lite' ),
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxtiel_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'         => array(
					'linear-gradient' => esc_html__( 'Linear', 'dnxtiel-next-image-effect-lite' ),
					'radial-gradient' => esc_html__( 'Radial', 'dnxtiel-next-image-effect-lite' ),
				),
				'default'         => 'linear-gradient',
				'depends_show_if' => 'on',
			),
			'dnxtiel_hover_gradient_type_linear_direction'   => array(
				'label'           => esc_html__( 'Linear direction', 'dnxtiel-next-image-effect-lite' ),
				'type'            => 'range',
				'option_category'=> 'basic_option',
				'toggle_slug'    => 'dnxtiel_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 360,
				),
				'default'         => '180deg',
				'fixed_unit'      => 'deg',
				'show_if' => array(
					'dnxtiel_hover_gradient_show_hide'	=> 'on',
					'dnxtiel_hover_gradient_type' 		=> 'linear-gradient'
				),
			),
			'dnxtiel_hover_gradient_type_radial_direction'   => array(
				'label'           	=> esc_html__( 'Radial Direction', 'dnxtiel-next-image-effect-lite'),
				'type'            	=> 'select',
				'description'     	=> esc_html__( 'Select the types of gradient', 'dnxtiel-next-image-effect-lite'),                
				'option_category'	=> 'basic_option',
				'toggle_slug'    	=> 'dnxtiel_background',
				'sub_toggle'	 	=> 'sub_toggle_gradient',
				'options'       	=> array(
					'circle at center'       => esc_html__(	'Center', 'dnxtiel-next-image-effect-lite' ),
					'circle at left'         => esc_html__(	'Top Left', 'dnxtiel-next-image-effect-lite' ),
					'circle at top'          => esc_html__(	'Top',	'dnxtiel-next-image-effect-lite' ),
					'circle at top right'    => esc_html__(	'Top Right', 'dnxtiel-next-image-effect-lite' ),
					'circle at right'        => esc_html__(	'Right', 'dnxtiel-next-image-effect-lite' ),
					'circle at bottom right' => esc_html__(	'Bottom Right', 'dnxtiel-next-image-effect-lite' ),
					'circle at bottom'       => esc_html__(	'Bottom', 'dnxtiel-next-image-effect-lite' ),
					'circle at bottom left'  => esc_html__(	'Bottom Left', 'dnxtiel-next-image-effect-lite' ),
					'circle at left'         => esc_html__(	'Left', 'dnxtiel-next-image-effect-lite' ),

				),
				'default'         => 'circle at center',
				'show_if'         => array(
					'dnxtiel_hover_gradient_show_hide'	=> 'on',
					'dnxtiel_hover_gradient_type'		=> 'radial-gradient'
				),
			),
			'dnxtiel_hover_gradient_start_position'           => array(
				'label'           => esc_html__( 'Start Position', 'dnxtiel-next-image-effect-lite' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxtiel_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 100,
				),
				'default'         => '0%',
				'fixed_unit'      => '%',
				'depends_show_if' => 'on',
			),
			'dnxtiel_hover_gradient_end_position'             => array(
				'label'           => esc_html__( 'End Position', 'dnxtiel-next-image-effect-lite' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxtiel_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 100,
				),
				'default'         => '100%',
				'fixed_unit'      => '%',
				'depends_show_if' => 'on',
			),
			'dnxtiel_caption_margin'	=> array(
				'label'           		=> esc_html__('Content Margin', 'dnxtiel-next-image-effect-lite'),
                'type'            		=> 'custom_margin',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
				'toggle_slug'     		=> 'margin_padding', 
			),
			'dnxtiel_caption_padding'	=> array(
				'label'           		=> esc_html__('Content Padding', 'dnxtiel-next-image-effect-lite'),
				'type'            		=> 'custom_padding',
				'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
				'tab_slug'        		=> 'advanced',				
				'toggle_slug'     		=> 'margin_padding',
			),
			'dnxtiel_heading_margin'	=> array(
				'label'           		=> esc_html__('Heading Margin', 'dnxtiel-next-image-effect-lite'),
                'type'            		=> 'custom_margin',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
				'toggle_slug'     		=> 'margin_padding', 
			),
			'dnxtiel_heading_padding'	=> array(
				'label'           		=> esc_html__('Heading Padding', 'dnxtiel-next-image-effect-lite'),
				'type'            		=> 'custom_padding',
				'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
				'tab_slug'        		=> 'advanced',				
				'toggle_slug'     		=> 'margin_padding',
			),
			'dnxtiel_description_margin'	=> array(
				'label'           			=> esc_html__('Description Margin', 'dnxtiel-next-image-effect-lite'),
                'type'            			=> 'custom_margin',
                'mobile_options'  			=> true,
				'hover'           			=> 'tabs',
				'allowed_units'   			=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 			=> 'layout',
                'tab_slug'        			=> 'advanced',
				'toggle_slug'     			=> 'margin_padding', 
			),
			'dnxtiel_description_padding'	=> array(
				'label'           			=> esc_html__('Description Padding', 'dnxtiel-next-image-effect-lite'),
				'type'            			=> 'custom_padding',
				'mobile_options'  			=> true,
				'hover'           			=> 'tabs',
				'allowed_units'   			=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 			=> 'layout',
				'tab_slug'        			=> 'advanced',				
				'toggle_slug'     			=> 'margin_padding',
			),
			'dnxtiel_hvr_image_margin'	=> array(
				'label'           		=> esc_html__('Hover Image Margin', 'dnxtiel-next-image-effect-lite'),
                'type'            		=> 'custom_margin',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
				'toggle_slug'     		=> 'margin_padding',
				'show_if'				=> array(
					'dnxtiel_use_hover_image'=> 'on'
				)
			),
			'dnxtiel_hvr_image_padding'	=> array(
				'label'           		=> esc_html__('Hover Image Padding', 'dnxtiel-next-image-effect-lite'),
				'type'            		=> 'custom_padding',
				'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
				'tab_slug'        		=> 'advanced',				
				'toggle_slug'     		=> 'margin_padding',
				'show_if'				=> array(
					'dnxtiel_use_hover_image'=> 'on'
				)
			),
			'dnxtiel_button_margin'	=> array(
				'label'           		=> esc_html__('Button Margin', 'dnxtiel-next-image-effect-lite'),
                'type'            		=> 'custom_margin',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
				'toggle_slug'     		=> 'margin_padding',
			),
			'dnxtiel_button_padding'	=> array(
				'label'           		=> esc_html__('Button Padding', 'dnxtiel-next-image-effect-lite'),
				'type'            		=> 'custom_padding',
				'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
				'tab_slug'        		=> 'advanced',				
				'toggle_slug'     		=> 'margin_padding',
			),
			'dnxtiel_icon_margin'	=> array(
				'label'           		=> esc_html__('Icon Margin', 'dnxtiel-next-image-effect-lite'),
                'type'            		=> 'custom_margin',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
				'toggle_slug'     		=> 'margin_padding',
			),
			'dnxtiel_icon_padding'	=> array(
				'label'           		=> esc_html__('Icon Padding', 'dnxtiel-next-image-effect-lite'),
				'type'            		=> 'custom_padding',
				'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
				'tab_slug'        		=> 'advanced',				
				'toggle_slug'     		=> 'margin_padding',
			),
			'dnxtiel_use_button' => array(
                'label' => esc_html__('Use Button', 'dnxtiel-next-image-effect-lite'),
                'type' => 'yes_no_button',
                'toggle_slug' => 'dnxtiel_button',
                'options' => array(
                    'on' => esc_html__('Yes', 'dnxtiel-next-image-effect-lite'),
                    'off' => esc_html__('No', 'dnxtiel-next-image-effect-lite'),
                ),
                'affects' => array(
                    'dnxtiel_button_text',
                    'dnxtiel_button_link',
                    'dnxtiel_button_target',
                    'dnxtiel_button_bg_color',
					'dnxtiel_button_alignment',
					'dnxtiel_button_margin',
					'dnxtiel_button_padding'
                ),
                'default_on_front' => 'off',
			),
			'dnxtiel_button_text' => array(
                'label' => esc_html__('Button Text', 'dnxtiel-next-image-effect-lite'),
                'type' => 'text',
                'option_category' => 'basic_option',
                'description' => esc_html__('Input button text', 'dnxtiel-next-image-effect-lite'),
                'toggle_slug' => 'dnxtiel_button',
                'dynamic_content' => 'text',
                'show_if' => array(
                    'dnxtiel_use_button' => 'on',
                ),
            ),
            'dnxtiel_button_link' 		=> array(
                'label' 				=> esc_html__('Link', 'dnxtiel-next-image-effect-lite'),
                'type' 					=> 'text',
                'option_category' 		=> 'basic_option',
                'default' 				=> '#',
                'description' 			=> esc_html__('When clicked the module will link to this URL.', 'dnxtiel-next-image-effect-lite'),
                'toggle_slug' 			=> 'dnxtiel_button',
                'show_if' 				=> array(
                    'dnxtiel_use_button' => 'on',
                ),
            ),
            'dnxtiel_button_target' 	=> array(
                'label' 				=> esc_html__('Link Target', 'dnxtiel-next-image-effect-lite'),
                'type' 					=> 'select',
                'description' 			=> esc_html__('Select the link target', 'dnxtiel-next-image-effect-lite'),
                'option_category' 		=> 'basic_option',
                'toggle_slug' 			=> 'dnxtiel_button',
                'options' 				=> array(
                    '_self' 			=> esc_html__('In The Same Window', 'dnxtiel-next-image-effect-lite'),
                    '_blank' 			=> esc_html__('In The New Tab', 'dnxtiel-next-image-effect-lite'),

                ),
                'default' 				=> '_self',
                'show_if' 				=> array(
                    'dnxtiel_use_button'=> 'on',
                ),
			),
			'dnxtiel_use_hover_image' 	=> array(
                'label' 				=> esc_html__('Use Hover Image', 'dnxtiel-next-image-effect-lite'),
                'type' 					=> 'yes_no_button',
                'toggle_slug' 			=> 'dnxtiel_img',
                'options' 				=> array(
                    'on' 				=> esc_html__('Yes', 'dnxtiel-next-image-effect-lite'),
                    'off' 				=> esc_html__('No', 'dnxtiel-next-image-effect-lite'),
                ),
                'affects' 				=> array(
                    'dnxtiel_hover_image',
					'dnxtiel_hover_image_alt',
					'dnxtiel_hover_image_width',
					'dnxtiel_hvr_image_margin',
					'dnxtiel_hvr_image_padding'
                ),
                'default_on_front' 		=> 'off',
			),
			'dnxtiel_hover_image'		=> array(
				'label'              	=> esc_html__( 'Hover Image', 'dnxtiel-next-image-effect-lite' ),
				'type'               	=> 'upload',
				'option_category'    	=> 'basic_option',
				'upload_button_text' 	=> esc_attr__( 'Upload an image', 'dnxtiel-next-image-effect-lite' ),
				'choose_text'        	=> esc_attr__( 'Choose an Image', 'dnxtiel-next-image-effect-lite' ),
				'update_text'        	=> esc_attr__( 'Set As Image', 'dnxtiel-next-image-effect-lite' ),
				'description'        	=> esc_html__( 'Upload an image to display on hover.', 'dnxtiel-next-image-effect-lite' ),
				'toggle_slug'        	=> 'dnxtiel_img',
				'dynamic_content'    	=> 'image',
				'mobile_options'	 	=> true,
			),
			// Image alt
			'dnxtiel_hover_image_alt'			=> array(
				'label'           	=> esc_html__( 'Hover Image Alt Text', 'dnxtiel-next-image-effect-lite' ),
				'type'            	=> 'text',
				'option_category' 	=> 'basic_option',
				'description'     	=> esc_html__( 'Define the HTML ALT text for your image here.', 'dnxtiel-next-image-effect-lite' ),
				'toggle_slug'     	=> 'dnxtiel_img',
				'dynamic_content' 	=> 'text',
			),
			'dnxtiel_use_icon' => array(
                'label' => esc_html__('Use Icon', 'dnxtiel-next-image-effect-lite'),
                'type' => 'yes_no_button',
                'toggle_slug' => 'dnxtiel_img',
                'options' => array(
                    'on' => esc_html__('Yes', 'dnxtiel-next-image-effect-lite'),
                    'off' => esc_html__('No', 'dnxtiel-next-image-effect-lite'),
                ),
                'affects' => array(
					'dnxtiel_hover_icon',
					'dnxtiel_icon_margin',
					'dnxtiel_icon_padding'
                ),
				'default_on_front' => 'off',
            ),
            'dnxtiel_hover_icon' => array(
                'label' => esc_html__('Icon', 'dnxtiel-next-image-effect-lite'),
                'type' => 'select_icon',
                'class' => array('et-pb-font-icon'),
                'default' => 'N',
                'toggle_slug' => 'dnxtiel_img',
				'option_category' => 'basic_option',
				'show_if'		=> array(
					'dnxtiel_use_icon' => 'on'
				)
            ),

			'dnxtiel_hover_image_width'   => array(
				'label'           	=> esc_html__( 'Image Width', 'dnxtiel-next-image-effect-lite' ),
				'type'            	=> 'range',
				'option_category'	=> 'basic_option',
				'tab_slug' 			=> 'advanced',
				'toggle_slug'    	=> 'dnxtiel_hvr_img',
				'range_settings'  	=> array(
					'step' 			=> 1,
					'min'  			=> 1,
					'max'  			=> 1000,
				),
				'default'         	=> '200px',
				'fixed_unit'      	=> 'px',
				'show_if' 			=> array(
					'dnxtiel_use_hover_image'	=> 'on',
				),
				'mobile_options'	=> true,
			),
			'dnxtiel_hover_image_alignment' => array(
                'label'            => esc_html__( 'Image/Icon Alignment', 'et_builder' ),
				'description'      => esc_html__( 'Align your image to the left, right or center of the module.', 'dnxtiel-next-image-effect-lite' ),
				'type'             => 'text_align',
				'option_category'  => 'configuration',
				'options'          => et_builder_get_text_orientation_options( array('justified') ),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'dnxtiel_hvr_img',
				'mobile_options'   => true,
			),
			'dnxtiel_button_alignment' => array(
                'label'            => esc_html__( 'Button Alignment', 'et_builder' ),
				'description'      => esc_html__( 'Align your button to the left, right or center of the module.', 'dnxtiel-next-image-effect-lite' ),
				'type'             => 'text_align',
				'option_category'  => 'configuration',
				'options'          => et_builder_get_text_orientation_options( array('justified') ),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'dnxtiel_button',
				'mobile_options'   => true,
				'show_if' 			=> array(
					'dnxtiel_use_button'	=> 'on',
				),
			),
			'dnxtiel_icon_size'     => array(
				'label'           	=> esc_html__( 'Icon Size', 'dnxtiel-next-image-effect-lite' ),
				'type'            	=> 'range',
				'option_category' 	=> 'basic_option',
				'tab_slug'			=> 'advanced',
				'toggle_slug'     	=> 'dnxtiel_hvr_img',
				'range_settings'  	=> array(
					'step' 			=> 1,
					'min'  			=> 1,
					'max'  			=> 1000,
				),
				'allowed_units'   	=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
				'default'         	=> '22px',
				'fixed_unit'      	=> 'px',
				'mobile_options'	=> true,
				'hover'				=> 'tabs'
			),
		);

		$additional = array(
			'button_bg_color' => array(
				'label' => esc_html__('Button Background', 'dnxtiel-next-image-effect-lite'),
				'type' => 'background-field',
				'base_name' => "button_bg",
				'context' => "button_bg",
				'option_category' => 'layout',
				'custom_color' => true,
				'default' => ET_Global_Settings::get_value('all_buttons_bg_color'),
				'depends_show_if' => 'on',
				'tab_slug' => 'advanced',
				'toggle_slug' => "dnxtiel_button",
				'background_fields' => array_merge(
					ET_Builder_Element::generate_background_options(
						'button_bg',
						'gradient',
						"advanced",
						"dnxtiel_button",
						"button_bg_gradient"
					),
					ET_Builder_Element::generate_background_options(
						"button_bg",
						"color",
						"advanced",
						"dnxtiel_button",
						"button_bg_color"
					)
					),
				'mobile_options' => true,
				'hover' => 'tabs'
			),
			'icon_bg_color' => array(
				'label' => esc_html__('Icon Background', 'dnxtiel-next-image-effect-lite'),
				'type' => 'background-field',
				'base_name' => "icon_bg",
				'context' => "icon_bg",
				'option_category' => 'layout',
				'custom_color' => true,
				'default' => ET_Global_Settings::get_value('all_buttons_bg_color'),
				'depends_show_if' => 'on',
				'tab_slug' => 'advanced',
				'toggle_slug' => "dnxtiel_hvr_img",
				'background_fields' => array_merge(
					ET_Builder_Element::generate_background_options(
						'icon_bg',
						'gradient',
						"advanced",
						"dnxtiel_hvr_img",
						"icon_bg_gradient"
					),
					ET_Builder_Element::generate_background_options(
						"icon_bg",
						"color",
						"advanced",
						"dnxtiel_hvr_img",
						"icon_bg_color"
					)
					),
				'mobile_options' => true,
				'hover' => 'tabs'
			),
		);


		$additional = array_merge(
			$additional,
			$this->generate_background_options(
                'button_bg',
                'skip',
                "advanced",
                "dnxtiel_button",
                "button_bg_gradient"
			),
			$this->generate_background_options(
                'button_bg',
                'skip',
                "advanced",
                "dnxtiel_button",
                "button_bg_color"
			),
			$this->generate_background_options(
                'icon_bg',
                'skip',
                "advanced",
                "dnxtiel_hvr_img",
                "icon_bg_gradient"
			),
			$this->generate_background_options(
                'icon_bg',
                'skip',
                "advanced",
                "dnxtiel_hvr_img",
                "icon_bg_color"
            )
		);

		return array_merge($field, $additional);
	}

	public function get_advanced_fields_config() {
		return array(
			'text' => false,
			'fonts' => array(
				'hover_text_fonts' => array(
					'label'    		=> esc_html__( '', 'dnxtiel-next-image-effect-lite' ),
					'toggle_slug'   => 'dnxtiel_fonts',
					'tab_slug'		=> 'advanced',
					'css'      => array(
						'main' => '%%order_class%% .dnxtiel-heading',
						'important' => 'all'
					),
				),
				'dnxt_body'   => array(
					'label'          => esc_html__( 'Description', 'dnxtiel-next-image-effect-lite' ),
					'css'            => array(
						'main' => '%%order_class%% .dnxtiel-description',
						'important' => 'all'
					),
					'dnxt_body_text_color' => array(
						'default'      => '#fff',
					),
					'block_elements' => array(
						'tabbed_subtoggles' => true,
						'bb_icons_support'  => true,
						'css'               => array(
							'main' => '%%order_class%% .dnxtiel-imghvr-content p',
							'important' => true
						),
					),
				),
				'button' => array(
					'label'    		=> esc_html__( '', 'dnxtiel-next-image-effect-lite' ),
					'toggle_slug'   => 'dnxtiel_button',
					'tab_slug'		=> 'advanced',
					'hide_text_align' => true,
					'css'      => array(
						'main' => '%%order_class%% .dnxtiel-hover-button',
						'important' => 'all'
					),
				),
			),
			'margin_padding' => array(
				'css' => array(
					'main' => "%%order_class%% .dnxtiel-imghvr-wrapper",
					'important' => 'all',
				),	
			),
			'borders'               => array(
				'default' => array(
					'css'	=> array(
						'main'	=> array(
							'border_radii'  => "%%order_class%% .dnxtiel-imghvr-wrapper",
							'border_styles' => "%%order_class%% .dnxtiel-imghvr-wrapper",
						)
					),
					'defaults'        => array(
						'border_radii'  => 'on|3px|3px|3px|3px',
						'border_styles' => array(
							'width' => '2px',
							'color' => '#0077FF',
							'style' => 'solid',
						),
					),
				),
				'hvr_image' => array(
					'css'	=> array(
						'main'	=> array(
							'border_radii'  => "%%order_class%% .dnxtiel-hover-image,%%order_class%% .dnxtiel-hover-icon",
							'border_styles' => "%%order_class%% .dnxtiel-hover-image,%%order_class%% .dnxtiel-hover-icon",
						)
					),
					'toggle_slug'   => 'dnxtiel_hvr_img',
					'tab_slug'		=> 'advanced',
				),
				'button' => array(
					'css'	=> array(
						'main'	=> array(
							'border_radii'  => "%%order_class%% .dnxtiel-hover-button",
							'border_styles' => "%%order_class%% .dnxtiel-hover-button",
						)
					),
					'toggle_slug'   => 'dnxtiel_button',
					'tab_slug'		=> 'advanced',
				)
			),
			'box_shadow' => array(
				'default' => array(
					'css' => array(
						'main' => "%%order_class%% .dnxtiel-imghvr-wrapper"
					)
				),
				'hvr_image' => array(
					'label' => esc_html__('Image/Icon Box Shadow', 'dnxtiel-next-image-effect-lite'),
                    'option_category' => 'layout',
					'tab_slug'		=> 'advanced',
					'toggle_slug'   => 'dnxtiel_hvr_img',
					'css'	=> array(
						'main'	=> "%%order_class%% .dnxtiel-hover-image,%%order_class%% .dnxtiel-hover-icon"
					)
				),
				'button' => array(
					'label' => esc_html__('Button Box Shadow', 'dnxtiel-next-image-effect-lite'),
                    'option_category' => 'layout',
					'tab_slug'		=> 'advanced',
					'toggle_slug'   => 'dnxtiel_button',
					'hide_text_alignment' => true,
					'css'	=> array(
						'main'	=> "%%order_class%% .dnxtiel-hover-button"
					)
				)
			),
			'background'            => array(
				'settings' => array(
					'color' => 'alpha',
				),
			),
			'height' => array(
				'css' => array(
					'main' => "%%order_class%% .dnxtiel-imghvr-wrapper"
				)
			)
		);
	}

	public function get_alignment( $slug, $device = 'desktop' ) {
		$suffix           = 'desktop' !== $device ? "_{$device}" : '';
		$text_orientation = isset( $this->props[$slug.$suffix] ) ? $this->props[$slug.$suffix] : '';

		return et_pb_get_alignment( $text_orientation );
	}

	public static function apply_bg_css($render_slug, $context, $color, $use_color_gradient, $gradient, $css_property) {
        $bg_image = array();
        $bg_style = "";
        $bg_style_tablet = "";
        $bg_style_phone = "";
        $bg_style_hover = "";

        $bg_type = $context->props[$gradient["gradient_type"]];
        $bg_direction = $context->props[$gradient["gradient_direction"]];
        $bg_direction_radial = $context->props[$gradient["radial"]];
        $bg_start = $context->props[$gradient["gradient_start"]];
        $bg_start_tablet = $context->props[$gradient["gradient_start"]."_tablet"];
        $bg_start_phone = $context->props[$gradient["gradient_start"]."_phone"];
        $bg_start_hover = $use_color_gradient == "on" && isset($context->props[$gradient["gradient_start"]."__hover"]) && $context->props[$gradient["gradient_start"]."__hover"] !== "" ? $context->props[$gradient["gradient_start"]."__hover"] : "";
        $bg_end = $context->props[$gradient["gradient_end"]];
        $bg_end_tablet = $context->props[$gradient["gradient_end"]."_tablet"];
        $bg_end_phone = $context->props[$gradient["gradient_end"]."_phone"];
        $bg_end_hover = $use_color_gradient == "on" && isset($context->props[$gradient["gradient_end"]."__hover"]) &&  $context->props[$gradient["gradient_end"]."__hover"] !== "" ? $context->props[$gradient["gradient_end"]."__hover"] : "";
        $bg_start_position = $context->props[$gradient["gradient_start_position"]];
        $bg_end_position = $context->props[$gradient["gradient_end_position"]];
        $bg_overlays_image = $context->props[$gradient["gradient_overlays_image"]];

        
        if ('on' === $use_color_gradient) {
            $direction = $bg_type === 'linear' ? $bg_direction : "circle at ". $bg_direction_radial." ";
            $start_position = et_sanitize_input_unit($bg_start_position, false, '%');
            $end_position = et_sanitize_input_unit($bg_end_position, false, '%');

            $gradient_bg = "{$bg_type}-gradient( {$direction}, {$bg_start} {$start_position},{$bg_end} {$end_position} )";
            $gradient_bg_tablet = "{$bg_type}-gradient( {$direction}, {$bg_start_tablet} {$start_position},{$bg_end_tablet} {$end_position} )";
            $gradient_bg_phone = "{$bg_type}-gradient( {$direction}, {$bg_start_phone} {$start_position},{$bg_end_phone} {$end_position} )";
            $gradient_bg_hover = "{$bg_type}-gradient( {$direction}, {$bg_start_hover} {$start_position},{$bg_end_hover} {$end_position} )";
    
            if (!empty($gradient_bg) || !empty($gradient_bg_tablet) || !empty($gradient_bg_phone) || !empty($gradient_bg_hover)) {
                $bg_image[] = $gradient_bg;
                $bg_image_tablet[] = $gradient_bg_tablet;
                $bg_image_phone[] = $gradient_bg_phone;
                $bg_image_hover[] = $gradient_bg_hover;
            }
            $has_bg_gradient = true;
        } else {
            $has_bg_gradient = false;
        }
    
    
        if (!empty($bg_image)) {
            if ('on' !== $bg_overlays_image) {
                $bg_image = array_reverse($bg_image);
                $bg_image_tablet = array_reverse($bg_image_tablet);
                $bg_image_phone = array_reverse($bg_image_phone);
                $bg_image_hover = array_reverse($bg_image_hover);
            }
    
            $bg_style .= sprintf('background-image: %1$s !important;', esc_html(join(', ', $bg_image)));
            $bg_style_tablet .= sprintf('background-image: %1$s !important;', esc_html(join(', ', $bg_image_tablet)));
            $bg_style_phone .= sprintf('background-image: %1$s !important;', esc_html(join(', ', $bg_image_phone)));
            $bg_style_hover .= sprintf('background-image: %1$s !important;', esc_html(join(', ', $bg_image_hover)));

        }
        
        
        if (!$has_bg_gradient) {
            $bg_color = $context->props[$color['color_slug']];
            $bg_color_values = et_pb_responsive_options()->get_property_values($context->props, $color['color_slug']);


            $bg_color_tablet = isset($bg_color_values['tablet']) ? $bg_color_values['tablet'] : '';
            $bg_color_phone = isset($bg_color_values['phone']) ? $bg_color_values['phone'] : '';
            $bg_color_hover = isset($context->props[$color['color_slug']."__hover"]) && $context->props[$color['color_slug']."__hover"] !== "" ? $context->props[$color['color_slug']."__hover"] : "";
            
            
            if ('' !== $bg_color) {
                $bg_style .= sprintf('background-color: %1$s !important; ', esc_html($bg_color));
                $bg_style_tablet .= sprintf('background-color: %1$s !important; ', esc_html($bg_color_tablet));
                $bg_style_phone .= sprintf('background-color: %1$s !important; ', esc_html($bg_color_phone));


                if (et_builder_is_hover_enabled($color['color_slug'], $context->props)) {
                    $bg_style_hover = sprintf('background-color: %1$s !important;', $bg_color_hover);
                }

            }
        }
    
        if ('' !== $bg_style) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => $css_property['desktop'],
                'declaration' => rtrim($bg_style),
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => $css_property['desktop'],
                'declaration' => rtrim($bg_style_tablet),
                'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => $css_property['desktop'],
                'declaration' => rtrim($bg_style_phone),
                'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
            ));

            if ("" !== $bg_style_hover) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector' => $context->add_hover_to_order_class($css_property['hover']),
                    'declaration' => rtrim($bg_style_hover),
                ));
            }            
        }
    }

	public function render( $attrs, $content = null, $render_slug ) {

		$multi_view 						= et_pb_multi_view_options( $this );
		$dnxtiel_image					=	$this->props['dnxtiel_image'];
		$dnxtiel_alt					=	$this->props['dnxtiel_alt'];

		$dnxtiel_heading_text			=	$this->props['dnxtiel_heading_text'];
		$dnxtiel_heading_tag			=	$this->props['dnxtiel_heading_tag'];
		$dnxtiel_description			=	$this->props['dnxtiel_description'];

		$dnxtiel_image_hover_effect		=	$this->props['dnxtiel_image_hover_effect'];

		// Handle svg image behaviour
		$dnxtiel_image_pathinfo = pathinfo( $dnxtiel_image );
		$is_dnxtiel_image_svg 	= isset( $dnxtiel_image_pathinfo['extension'] ) ? 'svg' === $dnxtiel_image_pathinfo['extension'] : false;
		
		$image_html = $multi_view->render_element( array(
			'tag'   => 'img',
			'attrs' => array(
				'src'   => '{{dnxtiel_image}}',
				'alt'   => '{{dnxtiel_alt}}',
			),
			'required' => 'dnxtiel_image',
		) );

		// Image
		$dnxtiel_image = sprintf(
			'%1$s',
			$image_html
		);

		// Hover Image
		$dnxtiel_hover_img = "";
		if ($multi_view->has_value('dnxtiel_hover_image')) {
			$dnxtiel_hover_img = $multi_view->render_element(array(
				'tag' => 'img',
				'attrs' => array(
					'src' => '{{dnxtiel_hover_image}}',
					'alt' => '{{dnxtiel_hover_image_alt}}',
					'class' => 'dnxtiel-hover-image',
				),
			));
		}

		$dnxtiel_icon = "";
        if($this->props['dnxtiel_use_icon'] === "on" && $multi_view->has_value('dnxtiel_hover_icon')) {
            $dnxtiel_icon = $multi_view->render_element(array(
                'tag' => 'span',
                'content' => esc_attr__(et_pb_process_font_icon($this->props['dnxtiel_hover_icon'])),
                'attrs' => array(
                    'class' => 'dnxtiel-hover-icon'
                )
            ));
        }

		$dnxtiel_hover_img_wrapper = "";
		if("off" !== $this->props['dnxtiel_use_hover_image'] || "off" !== $this->props['dnxtiel_use_icon']){
			// responsive class generate
			 // Image Alignments
			$hover_image_alignment = $this->get_alignment("dnxtiel_hover_image_alignment");
			$is_hover_image_alignment_responsive  = et_pb_responsive_options()->is_responsive_enabled( $this->props, 'dnxtiel_hover_image_alignment' );
			$hover_image_alignment_tablet         = $is_hover_image_alignment_responsive ? $this->get_alignment( 'tablet' ) : '';
			$hover_image_alignment_phone          = $is_hover_image_alignment_responsive ? $this->get_alignment( 'phone' ) : '';

			$hover_image_alignments = array();
			if ( ! empty( $hover_image_alignment ) ) {
				array_push( $hover_image_alignments, sprintf( 'dnxtiel_hover_image_alignment_%1$s', esc_attr( $hover_image_alignment ) ) );
			}

			if ( ! empty( $hover_image_alignment_tablet ) ) {
				array_push( $hover_image_alignments, sprintf( 'dnxtiel_hover_image_alignment_tablet_%1$s', esc_attr( $hover_image_alignment_tablet ) ) );
			}

			if ( ! empty( $hover_image_alignment_phone ) ) {
				array_push( $hover_image_alignments, sprintf( 'dnxtiel_hover_image_alignment_phone_%1$s', esc_attr( $hover_image_alignment_phone ) ) );
			}

			$hover_image_alignment_classes = join( ' ', $hover_image_alignments );
			// // Image alignment end

			// image wrapper div
			$dnxtiel_hover_img_wrapper = sprintf(
				'<div class="dnxtiel-hover-image-wrapper '. $hover_image_alignment_classes .'">%1$s</div>',
				"off" !== $this->props['dnxtiel_use_hover_image'] ? $dnxtiel_hover_img : $dnxtiel_icon
			);

			// Image/Icon background color
			$icon_bg = array(
				'color_slug' => "icon_bg_color"
			);
			$use_color_gradient = $this->props['icon_bg_use_color_gradient'];
			$gradient = array(
				"gradient_type" => 'icon_bg_color_gradient_type',
				"gradient_direction" => 'icon_bg_color_gradient_direction',
				"radial" => 'icon_bg_color_gradient_direction_radial',
				"gradient_start" => 'icon_bg_color_gradient_start',
				"gradient_end" => 'icon_bg_color_gradient_end',
				"gradient_start_position" => 'icon_bg_color_gradient_start_position',
				"gradient_end_position" => 'icon_bg_color_gradient_end_position',
				"gradient_overlays_image" => 'icon_bg_color_gradient_overlays_image',
			);
	
			$css_property = array(
				"desktop" => "%%order_class%% .dnxtiel-hover-icon, %%order_class%% .dnxtiel-hover-image",
				"hover" => "%%order_class%% .dnxtiel-hover-icon:hover, %%order_class%% .dnxtiel-hover-image:hover"
			);
			self::apply_bg_css($render_slug, $this, $icon_bg, $use_color_gradient, $gradient, $css_property);
			//Image/Icon background color end
		}

		// Heading Text
		$dnxtielheadingtext = '';
		if ( '' !== $dnxtiel_heading_text ){
			$dnxtielheadingtext = sprintf(
				'<%1$s class="dnxtiel-heading">%2$s</%1$s>',
				et_pb_process_header_level( $dnxtiel_heading_tag, 'span' ),
				et_core_esc_previously( $dnxtiel_heading_text )
			);
		}

		// Description
		$description = "";
		if ( '' !== $dnxtiel_description ) {
			$description = sprintf(
				'<div class="dnxtiel-description">%1$s</div>',
				et_core_esc_previously( $dnxtiel_description )
			);
		}

		// Button
		$dnxtiel_button_wrapper = "";
        if("off" !== $this->props['dnxtiel_use_button']){
			$dnxtiel_button = "";
			$button_link 	= $this->props['dnxtiel_button_link'];
			$button_target = $this->props['dnxtiel_button_target'];

			// Button Alignments
			$button_alignment = $this->get_alignment("dnxtiel_button_alignment");
			$is_button_alignment_responsive  = et_pb_responsive_options()->is_responsive_enabled( $this->props, 'dnxtiel_button_alignment' );
			$button_alignment_tablet         = $is_button_alignment_responsive ? $this->get_alignment( 'tablet' ) : '';
			$button_alignment_phone          = $is_button_alignment_responsive ? $this->get_alignment( 'phone' ) : '';

			$button_alignments = array();
			if ( ! empty( $button_alignment ) ) {
				array_push( $button_alignments, sprintf( 'dnxtiel_button_alignment_%1$s', esc_attr( $button_alignment ) ) );
			}

			if ( ! empty( $button_alignment_tablet ) ) {
				array_push( $button_alignments, sprintf( 'dnxtiel_button_alignment_tablet_%1$s', esc_attr( $button_alignment_tablet ) ) );
			}

			if ( ! empty( $button_alignment_phone ) ) {
				array_push( $button_alignments, sprintf( 'dnxtiel_button_alignment_phone_%1$s', esc_attr( $button_alignment_phone ) ) );
			}

			$button_alignment_classes = join( ' ', $button_alignments );
			// // Button alignment end

			$dnxtiel_button = $multi_view->render_element(array(
				'tag' 		=> 'a',
				'content' 	=> '{{dnxtiel_button_text}}',
				'attrs' 	=> array(
					'href' 	=> $button_link,
					'target'=> $button_target,
					'class' => 'dnxtiel-hover-button',
				),
			));
			
			$dnxtiel_button_wrapper = sprintf(
				'<div class="dnxtiel-hover-button-wrapper '. $button_alignment_classes .'">
					%1$s
				</div>', $dnxtiel_button);

			// Button background color
			$button_bg = array(
				'color_slug' => "button_bg_color"
			);
			$use_color_gradient = $this->props['button_bg_use_color_gradient'];
			$gradient = array(
				"gradient_type" => 'button_bg_color_gradient_type',
				"gradient_direction" => 'button_bg_color_gradient_direction',
				"radial" => 'button_bg_color_gradient_direction_radial',
				"gradient_start" => 'button_bg_color_gradient_start',
				"gradient_end" => 'button_bg_color_gradient_end',
				"gradient_start_position" => 'button_bg_color_gradient_start_position',
				"gradient_end_position" => 'button_bg_color_gradient_end_position',
				"gradient_overlays_image" => 'button_bg_color_gradient_overlays_image',
			);
	
			$css_property = array(
				"desktop" => "%%order_class%% .dnxtiel-hover-button",
				"hover" => "%%order_class%% .dnxtiel-hover-button:hover"
			);
			self::apply_bg_css($render_slug, $this, $button_bg, $use_color_gradient, $gradient, $css_property);
			//Button background color end
		} 

		// Hover BG Color
		$dnxtiel_hover_bg_color			= $this->props['dnxtiel_hover_bg'];
		$dnxtiel_hover_bg_color_values	= et_pb_responsive_options()->get_property_values( $this->props, 'dnxtiel_hover_bg' );
		$dnxtiel_hover_bg_color_tablet	= isset( $dnxtiel_hover_bg_color_values['tablet'] ) ? $dnxtiel_hover_bg_color_values['tablet'] : '';
		$dnxtiel_hover_bg_color_phone	= isset( $dnxtiel_hover_bg_color_values['phone'] ) ? $dnxtiel_hover_bg_color_values['phone'] : '';

		if ( 'off' !== $this->props['dnxtiel_hover_bg_show_hide'] ) {
			$dnxtiel_hover_bg_color_style 		 = sprintf( 'background-color: %1$s;', esc_attr( $dnxtiel_hover_bg_color ) );
			$dnxtiel_hover_bg_color_tablet_style = '' !== $dnxtiel_hover_bg_color_tablet ? sprintf( 'background-color: %1$s;', esc_attr( $dnxtiel_hover_bg_color_tablet ) ) : '';
			$dnxtiel_hover_bg_color_phone_style  = '' !== $dnxtiel_hover_bg_color_phone ? sprintf( 'background-color: %1$s;', esc_attr( $dnxtiel_hover_bg_color_phone ) ) : '';
			
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% [class^='imghvr-'] figcaption, %%order_class%% [class^='imghvr-reveal-']:before, %%order_class%% [class^='imghvr-shutter-out-']:before,%%order_class%% [class^='imghvr-shutter-in-']:before, %%order_class%% [class^='imghvr-shutter-in-']:after",
				'declaration' => $dnxtiel_hover_bg_color_style,
			) );
			
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% [class^='imghvr-'] figcaption, %%order_class%% [class^='imghvr-reveal-']:before, %%order_class%% [class^='imghvr-shutter-out-']:before,%%order_class%% [class^='imghvr-shutter-in-']:before, %%order_class%% [class^='imghvr-shutter-in-']:after",
				'declaration' => $dnxtiel_hover_bg_color_tablet_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% [class^='imghvr-'] figcaption, %%order_class%% [class^='imghvr-reveal-']:before, %%order_class%% [class^='imghvr-shutter-out-']:before,%%order_class%% [class^='imghvr-shutter-in-']:before, %%order_class%% [class^='imghvr-shutter-in-']:after",
				'declaration' => $dnxtiel_hover_bg_color_phone_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			) );
		}

		//GRADIENT COLOR 
			$dnxtiel_hover_gradient_color_one = $this->props['dnxtiel_hover_gradient_color_one'];
			$dnxtiel_hover_gradient_color_two = $this->props['dnxtiel_hover_gradient_color_two'];
			// Other gradient options
			$dnxtiel_hover_gradient_type = $this->props['dnxtiel_hover_gradient_type'];
			$dnxtiel_hover_gradient_start = $this->props['dnxtiel_hover_gradient_start_position'];
			$dnxtiel_hover_gradient_end = $this->props['dnxtiel_hover_gradient_end_position'];

			$dnxtiel_hover_gradient_direction = $dnxtiel_hover_gradient_type === 'linear-gradient' ? $this->props['dnxtiel_hover_gradient_type_linear_direction'] : $this->props['dnxtiel_hover_gradient_type_radial_direction'];


			if('off' !== $this->props['dnxtiel_hover_gradient_show_hide']) {
				$dnxtiel_hover_bg_gradient = sprintf('background: %1$s(%2$s, %3$s %5$s, %4$s %6$s)', $dnxtiel_hover_gradient_type, $dnxtiel_hover_gradient_direction, esc_attr($dnxtiel_hover_gradient_color_one), esc_attr($dnxtiel_hover_gradient_color_two), $dnxtiel_hover_gradient_start, $dnxtiel_hover_gradient_end);

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'] figcaption, %%order_class%% [class^='imghvr-reveal-']:before, %%order_class%% [class^='imghvr-shutter-out-']:before,%%order_class%% [class^='imghvr-shutter-in-']:before, %%order_class%% [class^='imghvr-shutter-in-']:after",
					'declaration' => $dnxtiel_hover_bg_gradient,
				) );
			}
		
		// Hover image width
		if("off" !== $this->props['dnxtiel_use_hover_image']) {
			$hover_image_width = $this->props['dnxtiel_hover_image_width'];
			$hover_image_width_values = et_pb_responsive_options()->get_property_values($this->props, 'dnxtiel_hover_image_width');
			$hover_image_width_tablet = isset($hover_image_width_values['tablet']) ? $hover_image_width_values['tablet'] : '';
			$hover_image_width_phone = isset($hover_image_width_values['phone']) ? $hover_image_width_values['phone'] : '';
			$hover_image_width_hover = $this->get_hover_value('dnxtiel_hover_image_width');
		
			if ("" !== $hover_image_width) {
				$hover_image_width_style = sprintf('width: %1$s;', esc_attr__($hover_image_width, 'dnxtiel-next-image-effect-lite'));
				$hover_image_width_style_tablet = sprintf('width: %1$s;', esc_attr__($hover_image_width_tablet, 'dnxtiel-next-image-effect-lite'));
				$hover_image_width_style_phone = sprintf('width: %1$s;', esc_attr__($hover_image_width_phone, 'dnxtiel-next-image-effect-lite'));
				$hover_image_width_style_hover = "";
		
				if (et_builder_is_hover_enabled('dnxtiel_hover_image_width', $this->props)) {
					$hover_image_width_style_hover = sprintf('width: %1$s;', esc_attr__($hover_image_width_hover, 'dnxtiel-next-image-effect-lite'));
				}
		
				ET_Builder_Element::set_style($render_slug, array(
					'selector' => "%%order_class%% .dnxtiel-hover-image",
					'declaration' => $hover_image_width_style,
				));
		
				ET_Builder_Element::set_style($render_slug, array(
					'selector' => "%%order_class%% .dnxtiel-hover-image",
					'declaration' => $hover_image_width_style_tablet,
					'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
				));
		
				ET_Builder_Element::set_style($render_slug, array(
					'selector' => "%%order_class%% .dnxtiel-hover-image",
					'declaration' => $hover_image_width_style_phone,
					'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
				));
			}
		}
		// Hover image width end;

		// Icon size
		if("off" !== $this->props['dnxtiel_use_icon']) {
			$icon_size = $this->props['dnxtiel_icon_size'];
			$icon_size_values = et_pb_responsive_options()->get_property_values($this->props, 'dnxtiel_icon_size');
			$icon_size_tablet = isset($icon_size_values['tablet']) ? $icon_size_values['tablet'] : '';
			$icon_size_phone = isset($icon_size_values['phone']) ? $icon_size_values['phone'] : '';
			$icon_size_hover = $this->get_hover_value('dnxtiel_icon_size');
		
			if ("" !== $icon_size) {
				$icon_size_style = sprintf('font-size: %1$s;', esc_attr__($icon_size, 'dnxtiel-next-image-effect-lite'));
				$icon_size_style_tablet = sprintf('font-size: %1$s;', esc_attr__($icon_size_tablet, 'dnxtiel-next-image-effect-lite'));
				$icon_size_style_phone = sprintf('font-size: %1$s;', esc_attr__($icon_size_phone, 'dnxtiel-next-image-effect-lite'));
				$icon_size_style_hover = "";
		
				if (et_builder_is_hover_enabled('dnxtiel_icon_size', $this->props)) {
					$icon_size_style_hover = sprintf('font-size: %1$s;', esc_attr__($icon_size_hover, 'dnxtiel-next-image-effect-lite'));
				}
		
				ET_Builder_Element::set_style($render_slug, array(
					'selector' => "%%order_class%% .dnxtiel-hover-icon",
					'declaration' => $icon_size_style,
				));
		
				ET_Builder_Element::set_style($render_slug, array(
					'selector' => "%%order_class%% .dnxtiel-hover-icon",
					'declaration' => $icon_size_style_tablet,
					'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
				));
		
				ET_Builder_Element::set_style($render_slug, array(
					'selector' => "%%order_class%% .dnxtiel-hover-icon",
					'declaration' => $icon_size_style_phone,
					'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
				));
			}
		}
		// Icon size end;
		
		$this->apply_css($render_slug);
		return sprintf( 
			'<figure class="imghvr-%4$s dnxtiel-imghvr-wrapper">
				%1$s
				<figcaption class="dnxtiel-imghvr-content">
					%5$s
					%2$s
					%3$s
					%6$s
				</figcaption>
		  	</figure>', 
			$dnxtiel_image,
			$dnxtielheadingtext,
			wpautop( $description ),
			$dnxtiel_image_hover_effect,
			$dnxtiel_hover_img_wrapper,
			$dnxtiel_button_wrapper
		);
	}

	public function apply_css($render_slug){
		/**
         * Custom Padding Margin Output
         *
        */

        self::dnxt_set_style($render_slug, $this->props, "dnxtiel_caption_margin", "%%order_class%% [class^='imghvr-'] figcaption", "margin");
        self::dnxt_set_style($render_slug, $this->props, "dnxtiel_caption_padding", "%%order_class%% [class^='imghvr-'] figcaption", "padding");
		
		self::dnxt_set_style($render_slug, $this->props, "dnxtiel_heading_margin", "%%order_class%% .dnxtiel-heading", "margin");
        self::dnxt_set_style($render_slug, $this->props, "dnxtiel_heading_padding", "%%order_class%% .dnxtiel-heading", "padding");

		self::dnxt_set_style($render_slug, $this->props, "dnxtiel_description_margin", "%%order_class%% .dnxtiel-description", "margin");
        self::dnxt_set_style($render_slug, $this->props, "dnxtiel_description_padding", "%%order_class%% .dnxtiel-description", "padding");

		self::dnxt_set_style($render_slug, $this->props, "dnxtiel_hvr_image_margin", "%%order_class%% .dnxtiel-hover-image", "margin");
        self::dnxt_set_style($render_slug, $this->props, "dnxtiel_hvr_image_padding", "%%order_class%% .dnxtiel-hover-image", "padding");
		// dnxtiel_hvr_image_margin
		
		self::dnxt_set_style($render_slug, $this->props, "dnxtiel_button_margin", "%%order_class%% .dnxtiel-hover-button", "margin");
        self::dnxt_set_style($render_slug, $this->props, "dnxtiel_button_padding", "%%order_class%% .dnxtiel-hover-button", "padding");
		// dnxtielbutton_margin / button_padding

		self::dnxt_set_style($render_slug, $this->props, "dnxtiel_icon_margin", "%%order_class%% .dnxtiel-hover-icon", "margin");
        self::dnxt_set_style($render_slug, $this->props, "dnxtiel_icon_padding", "%%order_class%% .dnxtiel-hover-icon", "padding");
		// dnxtiel_icon_margin / icon_padding
	}

	/**
     * Create set_style function Custom Margin, Padding, Border
     *
     */

    public static function dnxt_set_style($render_slug, $props, $property, $css_selector, $css_property, $important = true)
    {
        $responsive_active = !empty($props[$property . "_last_edited"]) && et_pb_get_responsive_status($props[$property . "_last_edited"]);

        $declaration_desktop = "";
        $declaration_tablet = "";
        $declaration_phone = "";

        $is_important = $important ? '!important' : '';

        switch ($css_property) {
            case "margin":
            case "padding":
                if (!empty($props[$property])) {
                    $values = explode("|", $props[$property]);
                    // if (empty($values[3])) {
                    //     return $values[3] = 0;
                    // }
                    $declaration_desktop = "{$css_property}-top: {$values[0]} {$is_important};
                                        {$css_property}-right: {$values[1]} {$is_important};
                                        {$css_property}-bottom: {$values[2]} {$is_important};
                                        {$css_property}-left: {$values[3]} {$is_important};";
                }

                if ($responsive_active && !empty($props[$property . "_tablet"])) {
                    $values = explode("|", $props[$property . "_tablet"]);
                    $declaration_tablet = "{$css_property}-top: {$values[0]};
                                        {$css_property}-right: {$values[1]};
                                        {$css_property}-bottom: {$values[2]};
                                        {$css_property}-left: {$values[3]};";
                }

                if ($responsive_active && !empty($props[$property . "_phone"])) {
                    $values = explode("|", $props[$property . "_phone"]);
                    $declaration_phone = "{$css_property}-top: {$values[0]};
                                        {$css_property}-right: {$values[1]};
                                        {$css_property}-bottom: {$values[2]};
                                        {$css_property}-left: {$values[3]};";
                }
                break;
            default: //Default is applied for values like height, color etc.
                if (!empty($props[$property])) {
                    $declaration_desktop = "{$css_property}: {$props[$property]};";
                }
                if ($responsive_active && !empty($props[$property . "_tablet"])) {
                    $declaration_tablet = "{$css_property}: {$props[$property . "_tablet"]};";
                }
                if ($responsive_active && !empty($props[$property . "_phone"])) {
                    $declaration_phone = "{$css_property}: {$props[$property . "_phone"]};";
                }
        }

        ET_Builder_Element::set_style($render_slug, array(
            'selector' => $css_selector,
            'declaration' => $declaration_desktop,
        ));

        if (!empty($props[$property . "_tablet"]) && $responsive_active) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => $css_selector,
                'declaration' => $declaration_tablet,
                'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
            ));
        }

        if (!empty($props[$property . "_phone"]) && $responsive_active) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => $css_selector,
                'declaration' => $declaration_phone,
                'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
            ));
        }
    }
}

new DNXTIEL_NextImageEffect;
