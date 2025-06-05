<?php
function oak_stitch_enqueue_assets(){
    $theme_dir = get_template_directory();
    $theme_uri = get_template_directory_uri();
    $dev_server = 'http://localhost:5173';
    $is_dev_server = wp_remote_get($dev_server);

    // Use Vite dev server if it's running
    if (!is_wp_error($is_dev_server)) {
        // DEV mode: load from Vite dev server
        wp_enqueue_style(
            'oak-stitch-style',
            $dev_server . '/assets/css/main.css',
            [],
            null
        );

        wp_enqueue_script(
            'oak-stitch-script',
            $dev_server . '/assets/js/main.js',
            [],
            null,
            true
        );
    } else {
        // PROD mode: load from /dist
        $css_file = $theme_dir . '/dist/css/styles.css';
        $js_file = $theme_dir . '/dist/js/main.js';

        if (file_exists($css_file)) {
            wp_enqueue_style(
                'oak-stitch-style',
                $theme_uri . '/dist/css/styles.css',
                [],
                filemtime($css_file)
            );
        }

        if (file_exists($js_file)) {
            wp_enqueue_script(
                'oak-stitch-script',
                $theme_uri . '/dist/js/main.js',
                [],
                filemtime($js_file),
                true
            );
        }
    }
}
add_action('wp_enqueue_scripts', 'oak_stitch_enqueue_assets');

/**
 * 
 * Register theme support for various WordPress features.
 * 
 */
function oak_stitch_setup(){
    register_nav_menus([
        'primary' => __('Primary Menu', 'oak-stitch')
    ]);
}
add_action('after_setup_theme', 'oak_stitch_setup');

