<?php
/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Oak & Stitch
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php
    /**
     * Hook 'oak_stitch_before_site'
     * 
     * @since 1.0.0
     */
    do_action('oak_stitch_before_site');
    ?>

    <div id="page" class="site">
        <a class="skip-link screen-reader-text"
            href="#content"><?php esc_html_e('Skip to content', 'oak-stitch'); ?></a>

        <?php

        /**
         * Hook 'oak_stitch_before_header'
         * 
         * @since 1.0.0
         */

        do_action('oak_stitch_before_header');


        /**
         * Hook 'oak_stitch_header'
         * 
         * @since 1.0.0
         */
        do_action('oak_stitch_header');


        /**
         * Hook 'oak_stitch_after_header'
         * 
         * @since 1.0.0
         */
        do_action('oak_stitch_after_header');

        /**
         * Hook 'oak_stitch_before_main_wrapper'
         * 
         * @since 1.0.0
         */
        do_action('oak_stitch_before_main_wrapper');

        /**
         * Hook 'oak_stitch_main_wrapper'
         * 
         * @since 1.0.0
         */
        do_action('oak_stitch_main_wrapper');


        ?>