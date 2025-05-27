<?php
/**
 * Customizer settings for the header section of the theme.
 * 
 * @package Oak & Stitch
 * @since 1.0.0
 */

 function oak_stitch_customize_register($wp_customize)
 {
     $wp_customize->add_section('header_section', [
         'title' => __('Header Settings', 'oak-stitch'),
         'priority' => 30,
     ]);

     $wp_customize->add_setting('header_layout', [
         'default' => 'default',
         'sanitize_callback' => 'sanitize_text_field',
     ]);

     $wp_customize->add_control('header_layout_control', [
         'label' => __('Header Layout', 'oak-stitch'),
         'section' => 'header_section',
         'settings' => 'header_layout',
         'type' => 'select',
         'choices' => [
             'default' => __('Default', 'oak-stitch'),
             'centered' => __('Centered', 'oak-stitch'),
             'woocommerce' => __('WooCommerce', 'oak-stitch'),
         ],
     ]);
 }

 add_action('customize_register', 'oak_stitch_customize_register');