<?php
/**
 * SKT Gardening Lite Theme Customizer
 *
 * @package SKT Gardening Lite
 */
function skt_gardening_lite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'skt_gardening_lite_custom_header_args', array(
		'default-text-color'     => '949494',
		'width'                  => 1600,
		'height'                 => 200,
		'wp-head-callback'       => 'skt_gardening_lite_header_style',
 		'default-text-color' => false,
 		'header-text' => false,
	) ) );
}
add_action( 'after_setup_theme', 'skt_gardening_lite_custom_header_setup' );

if ( ! function_exists( 'skt_gardening_lite_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see skt_gardening_lite_custom_header_setup().
 */
function skt_gardening_lite_header_style() {
	$header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() ) :
	?>
		.header {
			background: url(<?php echo esc_url(get_header_image()); ?>) no-repeat;
			background-position: center top;
		}
	<?php endif; ?>	
	</style>
	<?php
}
endif; // skt_gardening_lite_header_style 

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */ 

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function skt_gardening_lite_customize_register( $wp_customize ) {
	
	//Add a class for titles
    class skt_gardening_lite_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#98bc24',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => esc_html__('Color Scheme','skt-gardening-lite'),			
			 'description'	=> esc_html__('More color options in PRO Version','skt-gardening-lite'),	
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	// Slider Section		
	$wp_customize->add_section( 'slider_section', array(
            'title' => esc_html__('Slider Settings', 'skt-gardening-lite'),
            'priority' => null,
            'description'	=> esc_html__('Featured Image Size Should be ( 1420 X 549 ) More slider settings available in PRO Version','skt-gardening-lite'),		
        )
    );	
	
	$wp_customize->add_setting('page-setting7',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'skt_gardening_lite_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> esc_html__('Select page for slide one:','skt-gardening-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting8',array(
			'default' => '0',
			'capability' => 'edit_theme_options',			
			'sanitize_callback'	=> 'skt_gardening_lite_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> esc_html__('Select page for slide two:','skt-gardening-lite'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting9',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'skt_gardening_lite_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> esc_html__('Select page for slide three:','skt-gardening-lite'),
			'section'	=> 'slider_section'
	));	
	
	//Slider hide
	$wp_customize->add_setting('hide_slides',array(
			'sanitize_callback' => 'skt_gardening_lite_sanitize_checkbox',
			'default' => true,
	));	 

	$wp_customize->add_control( 'hide_slides', array(
    	   'section'   => 'slider_section',    	 
		   'label'	=> esc_html__('Uncheck To Show Slider','skt-gardening-lite'),
    	   'type'      => 'checkbox'
     )); // Slider Section	
	 
	// Home Three Boxes Section 	
	$wp_customize->add_section('section_second', array(
		'title'	=> esc_html__('Homepage Three Boxes','skt-gardening-lite'),
		'description'	=> esc_html__('Select Pages from the dropdown for homepage three boxes','skt-gardening-lite'),
		'priority'	=> null
	));	
	
	
	$wp_customize->add_setting('page-column1',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_gardening_lite_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column1',array('type' => 'dropdown-pages',
			'section' => 'section_second',
	));	
	
	
	$wp_customize->add_setting('page-column2',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_gardening_lite_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column2',array('type' => 'dropdown-pages',
			'section' => 'section_second',
	));
	
	$wp_customize->add_setting('page-column3',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_gardening_lite_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column3',array('type' => 'dropdown-pages',
			'section' => 'section_second',
	));
	
	//Hide Page Boxes Column Section
	$wp_customize->add_setting('hide_pagethreeboxes',array(
			'sanitize_callback' => 'skt_gardening_lite_sanitize_checkbox',
			'default' => true,
	));	 

	$wp_customize->add_control( 'hide_pagethreeboxes', array(
    	   'section'   => 'section_second',    	 
		   'label'	=> esc_html__('Uncheck To Show This Section','skt-gardening-lite'),
    	   'type'      => 'checkbox'
     )); // Hide Page Boxes Column Section
	 
	$wp_customize->add_section('section_thumb_with_content', array(
		'title'	=> esc_html__('Home Second Section','skt-gardening-lite'),
		'description'	=> esc_html__('Select Pages from the dropdown for home second section','skt-gardening-lite'),
		'priority'	=> null
	));	
	$wp_customize->add_setting('sec-column1',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_gardening_lite_sanitize_integer',
		));
	$wp_customize->add_control(	'sec-column1',array('type' => 'dropdown-pages',
			'section' => 'section_thumb_with_content',
	));	
	//Hide Second Section Box 	
	$wp_customize->add_setting('hide_home_secwith_content',array(
			'sanitize_callback' => 'skt_gardening_lite_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'hide_home_secwith_content', array(
    	   'section'   => 'section_thumb_with_content',    	 
		   'label'	=> esc_html__('Uncheck To Show This Section','skt-gardening-lite'),
    	   'type'      => 'checkbox'
     )); // Hide Second Section Box 	 
	
	$wp_customize->add_section('header_top_bar',array(
			'title'	=> esc_html__('Header Topbar','skt-gardening-lite'),				
			'description'	=> esc_html__('More social icon available in PRO Version','skt-gardening-lite'),		
			'priority'		=> null
	));
	
	
	$wp_customize->add_setting('fb_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('fb_link',array(
			'label'	=> esc_html__('Add facebook link here','skt-gardening-lite'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'fb_link'
	));	
	$wp_customize->add_setting('twitt_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitt_link',array(
			'label'	=> esc_html__('Add twitter link here','skt-gardening-lite'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'twitt_link'
	));
	$wp_customize->add_setting('gplus_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('gplus_link',array(
			'label'	=> esc_html__('Add google plus link here','skt-gardening-lite'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'gplus_link'
	));
	$wp_customize->add_setting('linked_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('linked_link',array(
			'label'	=> esc_html__('Add linkedin link here','skt-gardening-lite'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'linked_link'
	));
	
	$wp_customize->add_setting('contact_no',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_no',array(
			'label'	=> esc_html__('Add contact number here.','skt-gardening-lite'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'contact_no'
	));
	$wp_customize->add_setting('contact_mail',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('contact_mail',array(
			'label'	=> esc_html__('Add you email here','skt-gardening-lite'),
			'section'	=> 'header_top_bar',
			'setting'	=> 'contact_mail'
	));
	
	//Hide Header Top Bar
	$wp_customize->add_setting('hide_header_topbar',array(
			'sanitize_callback' => 'skt_gardening_lite_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'hide_header_topbar', array(
    	   'section'   => 'header_top_bar',    	 
		   'label'	=> esc_html__('Uncheck To Show This Section','skt-gardening-lite'),
    	   'type'      => 'checkbox'
     )); 	//Hide Header Top Bar	

	$wp_customize->add_section('footer_main',array(
			'title'	=> esc_html__('Footer Area','skt-gardening-lite'),
			'description'	=> esc_html__('Manager Footer From Widgets >> Footer Column 1, Footer Column 2, Footer Column 3, Footer Column 4','skt-gardening-lite'),			
			'priority'	=> null,
	));	
	
    $wp_customize->add_setting('skt_gardening_lite_options[footer-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new skt_gardening_lite_Info( $wp_customize, 'footer_main', array(
        'section' => 'footer_main',
        'settings' => 'skt_gardening_lite_options[footer-info]',
        'priority' => null
        ) )
    ); 
}
add_action( 'customize_register', 'skt_gardening_lite_customize_register' );

//Integer
function skt_gardening_lite_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

function skt_gardening_lite_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

//setting inline css.
function skt_gardening_lite_custom_css() {
    wp_enqueue_style(
        'skt-gardening-lite-custom-style',
        get_template_directory_uri() . '/css/skt-gardening-lite-custom-style.css'
    );
        $color = esc_html( get_theme_mod( 'color_scheme' ) ); //E.g. #e64d43
		$header_text_color = get_header_textcolor();
        $custom_css = "
					.sitenav ul li a:hover,
					#sidebar ul li a:hover,
					.cols-3 ul li a:hover, .cols-3 ul li.current_page_item a,					
					.phone-no strong,					
					.left a:hover,
					.blog_lists h4 a:hover,
					.recent-post h6 a:hover,
					.postmeta a:hover,
					.recent-post .morebtn:hover,
					.logo h2 span
					{ 
						 color: {$color} !important;
					}
					.pagination .nav-links span.current, .pagination .nav-links a:hover,
					#commentform input#submit:hover,
					.slide_info .slide_more:hover,							
					.nivo-controlNav a.active,				
					h3.widget-title,				
					.wpcf7 input[type='submit'],					
					.social-icons a:hover,
					input.search-submit,
					.slide_info h2,
					.threebox:hover,
					.copyright-wrapper
					{ 
					   background-color: {$color} !important;
					}
					
					.head-info-area
					{ 
					   border-top-color: {$color} !important;
					}
					
					#menubar,
					h2.section-title::after,
					h2.section-title
					{ 
						border-color: {$color} !important;
					}					
				";
        wp_add_inline_style( 'skt-gardening-lite-custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'skt_gardening_lite_custom_css' );          
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function skt_gardening_lite_customize_preview_js() {
	wp_enqueue_script( 'skt_gardening_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'skt_gardening_lite_customize_preview_js' );