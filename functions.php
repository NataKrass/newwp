<?php

/**
 * Register and Enqueue Styles.
 */
function twentytwenty_child_register_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
   wp_enqueue_style( 'twentytwenty-child-custom', get_stylesheet_directory_uri() . '/assets/css/custom.css' );
}

add_action( 'wp_enqueue_scripts', 'twentytwenty_child_register_styles' );

/**
 * Register and Enqueue Scripts.
 */
function twentytwenty_child_register_scripts() {

  wp_enqueue_script( 'twentytwenty-child-custom', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery'), '20151215', true );

}

add_action( 'wp_enqueue_scripts', 'twentytwenty_child_register_scripts' );

/**
 * Customizer
 */
function twentytwenty_child_customize_register( $wp_customize ) {
  //All our sections, settings, and controls will be added here
  $wp_customize->add_setting( 'navbar-color' , array(
    'default'   => '#B0451D',
    'transport' => 'refresh',
  ) );

	$wp_customize->add_section( 'custom_color_section' , array(
    'title'      => __( 'Navbar Color', 'twentytwenty_child' ),
    'priority'   => 30,
 ) );
 $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
	'label'      => __( 'Choose color', 'twentytwenty_child' ),
	'section'    => 'custom_color_section',
	'settings'   => 'navbar-color',
) ) );

}
add_action( 'customize_register', 'twentytwenty_child_customize_register' );

function twentytwenty_child_customize_css()
{
    ?>
         <style type="text/css">
             #site-header { background-color: <?php echo get_theme_mod('navbar-color', '#fff'); ?>; }
         </style>
    <?php
}
add_action( 'wp_head', 'twentytwenty_child_customize_css');

?>