<?php

function azera_shop_companion_customize_register( $wp_customize ) {
	
	if( class_exists('Azera_Shop_General_Repeater') ) {
		
		/********************************************************/
		/****************** SERVICES OPTIONS  *******************/
		/********************************************************/
		
		/* SERVICES SECTION */
		$wp_customize->add_section( 'azera_shop_services_section' , array(
			'title'       => esc_html__( 'Services section', 'azera-shop-companion' ),
			'priority'    => 4,
			'panel'       => 'azera_shop_front_page_sections'
		));
		
		/* Services show/hide */
		$wp_customize->add_setting( 'azera_shop_our_services_show', array(
			'sanitize_callback' => 'azera_shop_sanitize_text',
			'transport' => 'postMessage'
		));
		
		$wp_customize->add_control( 'azera_shop_our_services_show', array(
			'type' => 'checkbox',
			'label' => __('Disable the Services section?','azera-shop-companion'),
			'section' => 'azera_shop_services_section',
			'priority'    => 1,
		));
		
		/* Services title */
		$wp_customize->add_setting( 'azera_shop_our_services_title', array(
			'default' => esc_html__('Our Services','azera-shop-companion'),
			'sanitize_callback' => 'azera_shop_sanitize_text',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control( 'azera_shop_our_services_title', array(
			'label'    => esc_html__( 'Main title', 'azera-shop-companion' ),
			'section'  => 'azera_shop_services_section',
			'priority'    => 10
		));
		
		/* Services subtitle */
		$wp_customize->add_setting( 'azera_shop_our_services_subtitle', array(
			'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','azera-shop-companion'),
			'sanitize_callback' => 'azera_shop_sanitize_text',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control( 'azera_shop_our_services_subtitle', array(
			'label'    => esc_html__( 'Subtitle', 'azera-shop-companion' ),
			'section'  => 'azera_shop_services_section',
			'priority'    => 20
		));
		
		
		/* Services content */
		$wp_customize->add_setting( 'azera_shop_services_content', array(
			'sanitize_callback' => 'azera_shop_sanitize_repeater',
			'default' => json_encode(
								array(
									array('choice'=>'azera_shop_icon','icon_value' => 'fa-cogs','title' => esc_html__('Lorem Ipsum','azera-shop-companion'),'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo.','azera-shop-companion')),
									array('choice'=>'azera_shop_icon','icon_value' => 'fa-bar-chart-o','title' => esc_html__('Lorem Ipsum','azera-shop-companion'),'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo.','azera-shop-companion')),
									array('choice'=>'azera_shop_icon','icon_value' => 'fa-globe','title' => esc_html__('Lorem Ipsum','azera-shop-companion'),'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo.','azera-shop-companion'))
								)
							)
		));
		$wp_customize->add_control( new Azera_Shop_General_Repeater( $wp_customize, 'azera_shop_services_content', array(
			'label'   => esc_html__('Add new service box','azera-shop-companion'),
			'section' => 'azera_shop_services_section',
			'priority' => 30,
			'azera_shop_image_control' => true,
			'azera_shop_icon_control' => true,
			'azera_shop_title_control' => true,
			'azera_shop_text_control' => true,
			'azera_shop_link_control' => true
		) ) );
		
		/********************************************************/
		/*******************  TEAM OPTIONS  *********************/
		/********************************************************/

		$wp_customize->add_section( 'azera_shop_team_section' , array(
			'title'       => esc_html__( 'Team section', 'azera-shop-companion' ),
			'priority'    => 6,
			'panel'       => 'azera_shop_front_page_sections'
		));
		
		/* Team show/hide */
		$wp_customize->add_setting( 'azera_shop_our_team_show', array(
			'sanitize_callback' => 'azera_shop_sanitize_text',
			'transport' => 'postMessage'
		));
		
		$wp_customize->add_control( 'azera_shop_our_team_show', array(
			'type' => 'checkbox',
			'label' => __('Disable the Team section?','azera-shop-companion'),
			'section' => 'azera_shop_team_section',
			'priority'    => 1,
		));
		
		/* Team title */
		$wp_customize->add_setting( 'azera_shop_our_team_title', array(
			'default' => esc_html__('Our Team','azera-shop-companion'),
			'sanitize_callback' => 'azera_shop_sanitize_text',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control( 'azera_shop_our_team_title', array(
			'label'    => esc_html__( 'Main title', 'azera-shop-companion' ),
			'section'  => 'azera_shop_team_section',
			'priority'    => 10,
		));
		
		/* Team subtitle */
		$wp_customize->add_setting( 'azera_shop_our_team_subtitle', array(
			'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.','azera-shop-companion'),
			'sanitize_callback' => 'azera_shop_sanitize_text',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control( 'azera_shop_our_team_subtitle', array(
			'label'    => esc_html__( 'Subtitle', 'azera-shop-companion' ),
			'section'  => 'azera_shop_team_section',
			'priority'    => 20,
		));
		
		/* Team Background	*/
		$wp_customize->add_setting( 'azera_shop_our_team_background', array(
			'default' 				=> azera_shop_get_file('/images/background-images/parallax-img/team-img.jpg'),
			'sanitize_callback'		=> 'esc_url',
		));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'azera_shop_our_team_background', array(
			'label'    			=> esc_html__( 'Team Background', 'azera-shop-companion' ),
			'section'  			=> 'azera_shop_team_section',
			'priority'    		=> 30
		)));
		
		/* Team content */
		$wp_customize->add_setting( 'azera_shop_team_content', array(
			'sanitize_callback' => 'azera_shop_sanitize_repeater',
			'default' => json_encode(
								array(
									array('image_url' => azera_shop_get_file('/images/team/1.jpg'),'title' => esc_html__('Albert Jacobs','azera-shop-companion'),'subtitle' => esc_html__('Founder & CEO','azera-shop-companion')),
									array('image_url' => azera_shop_get_file('/images/team/2.jpg'),'title' => esc_html__('Tonya Garcia','azera-shop-companion'),'subtitle' => esc_html__('Account Manager','azera-shop-companion')),
									array('image_url' => azera_shop_get_file('/images/team/3.jpg'),'title' => esc_html__('Linda Guthrie','azera-shop-companion'),'subtitle' => esc_html__('Business Development','azera-shop-companion'))
								)
							)
		));
		$wp_customize->add_control( new Azera_Shop_General_Repeater( $wp_customize, 'azera_shop_team_content', array(
			'label'   => esc_html__('Add new team member','azera-shop-companion'),
			'section' => 'azera_shop_team_section',
			'priority' => 40,
			'azera_shop_image_control' => true,
			'azera_shop_title_control' => true,
			'azera_shop_subtitle_control' => true
		) ) );
		
		/********************************************************/
		/********** TESTIMONIALS OPTIONS  ***********************/
		/********************************************************/
		
		$wp_customize->add_section( 'azera_shop_testimonials_section' , array(
			'title'       => esc_html__( 'Testimonials section', 'azera-shop-companion' ),
			'priority'    => 7,
			'panel'       => 'azera_shop_front_page_sections'
		));
		
		/* Testimonials show/hide */
		$wp_customize->add_setting( 'azera_shop_happy_customers_show', array(
			'sanitize_callback' => 'azera_shop_sanitize_text',
			'transport' => 'postMessage'
		));
		
		$wp_customize->add_control( 'azera_shop_happy_customers_show', array(
			'type' => 'checkbox',
			'label' => __('Disable the Testimonials section?','azera-shop-companion'),
			'section' => 'azera_shop_testimonials_section',
			'priority'    => 1,
		));
		
		/* Testimonials title */
		$wp_customize->add_setting( 'azera_shop_happy_customers_title', array(
			'default' => esc_html__('Happy Customers','azera-shop-companion'),
			'sanitize_callback' => 'azera_shop_sanitize_text',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control( 'azera_shop_happy_customers_title', array(
			'label'    => esc_html__( 'Main title', 'azera-shop-companion' ),
			'section'  => 'azera_shop_testimonials_section',
			'priority'    => 10,
		));
		
		/* Testimonials subtitle */
		$wp_customize->add_setting( 'azera_shop_happy_customers_subtitle', array(
			'default' => esc_html__('Cloud computing subscription model out of the box proactive solution.','azera-shop-companion'),
			'sanitize_callback' => 'azera_shop_sanitize_text',
			'transport' => 'postMessage'
		));
		$wp_customize->add_control( 'azera_shop_happy_customers_subtitle', array(
			'label'    => esc_html__( 'Subtitle', 'azera-shop-companion' ),
			'section'  => 'azera_shop_testimonials_section',
			'priority'    => 20,
		));
		
		
		/* Testimonials content */
		$wp_customize->add_setting( 'azera_shop_testimonials_content', array(
			'sanitize_callback' => 'azera_shop_sanitize_repeater',
			'default' => json_encode(
								array(
										array('image_url' => azera_shop_get_file('/images/clients/1.jpg'),'title' => esc_html__('Happy Customer','azera-shop-companion'),'subtitle' => esc_html__('Lorem ipsum','azera-shop-companion'),'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo. Fusce malesuada vulputate faucibus. Integer in hendrerit nisi. Praesent a hendrerit urna. In non imperdiet elit, sed molestie odio. Fusce ac metus non purus sollicitudin laoreet.','azera-shop-companion')),
										array('image_url' => azera_shop_get_file('/images/clients/2.jpg'),'title' => esc_html__('Happy Customer','azera-shop-companion'),'subtitle' => esc_html__('Lorem ipsum','azera-shop-companion'),'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo. Fusce malesuada vulputate faucibus. Integer in hendrerit nisi. Praesent a hendrerit urna. In non imperdiet elit, sed molestie odio. Fusce ac metus non purus sollicitudin laoreet.','azera-shop-companion')),
										array('image_url' => azera_shop_get_file('/images/clients/3.jpg'),'title' => esc_html__('Happy Customer','azera-shop-companion'),'subtitle' => esc_html__('Lorem ipsum','azera-shop-companion'),'text' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec purus feugiat, molestie ipsum et, consequat nibh. Etiam non elit dui. Nullam vel eros sit amet arcu vestibulum accumsan in in leo. Fusce malesuada vulputate faucibus. Integer in hendrerit nisi. Praesent a hendrerit urna. In non imperdiet elit, sed molestie odio. Fusce ac metus non purus sollicitudin laoreet.','azera-shop-companion'))
								)
							)
		));
		$wp_customize->add_control( new Azera_Shop_General_Repeater( $wp_customize, 'azera_shop_testimonials_content', array(
			'label'   => esc_html__('Add new testimonial','azera-shop-companion'),
			'section' => 'azera_shop_testimonials_section',
			'priority' => 30,
			'azera_shop_image_control' => true,
			'azera_shop_title_control' => true,
			'azera_shop_subtitle_control' => true,
			'azera_shop_text_control' => true
		) ) );
	
	}
}
add_action( 'customize_register', 'azera_shop_companion_customize_register', 999 );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function azera_shop_companion_customize_preview_js() {
	wp_enqueue_script( 'azera_shop_companion_customizer', AZERA_SHOP_COMPANION_URL . '/js/azera-shop-companion-customizer.js', array( 'customize-preview' ), '1.0.2', true );
}
add_action( 'customize_preview_init', 'azera_shop_companion_customize_preview_js', 10);

?>