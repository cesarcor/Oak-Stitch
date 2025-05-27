<?php
/**
 * Theme's default header markup
 * 
 * @package Oak & Stitch
 * @since 1.0.0
 */
?>

<header id="site-header" class="site-header border-b border-gray-200">
    <div class="container mx-auto flex items-center justify-between p-5">
        <div class="site-branding">
            <?php
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
                ?>
                <h1 class="site-title">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <?php bloginfo('name'); ?>
                    </a>
                </h1>
            <?php } ?>
        </div>
        <nav id="site-nav" class="site-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'flex space-x-6 items-center'
            ));
            ?>
        </nav>
    </div>
</header>