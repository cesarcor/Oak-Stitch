<?php
/**
 * Handles header rendering for the Oak & Stitch theme.
 * 
 * @package Oak & Stitch
 * @since 1.0.0
 */

if (!class_exists('Oak_Stitch_Header')):

    class Oak_Stitch_Header {
        private static $instance = null;

        public static function get_instance()
        {
            if (self::$instance === null) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        private function __construct()
        {
            add_action('get_header', [$this, 'oak_stitch_render_header'], 1);
        }

        /**
         * Renders the appropriate header
         *
         * @since 1.0.0
         */

        public function oak_stitch_render_header(){
            remove_all_actions( 'get_header');

            $layout = get_theme_mod('header_layout', 'default');

            if ($this->is_woocommerce_context() || $layout === 'woocommerce'):
                set_theme_mod( 'header_layout', 'woocommerce' );
                get_template_part('template-parts/headers/header', 'woocommerce');
            else:
                switch($layout):
                    case 'default':
                        get_template_part('template-parts/headers/header', 'default');
                        break;
                    case 'centered':
                        get_template_part('template-parts/headers/header', 'centered');
                        break;
                    endswitch;
            endif;
        }

        private function is_woocommerce_context() {
            return class_exists('WooCommerce') && (is_woocommerce() || is_cart() || is_checkout() || is_account_page());
        }

    }

endif;