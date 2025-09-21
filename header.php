<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <header id="masthead" class="site-header">
        <div class="ct-header">
            <div class="ct-container">
                <div class="site-branding">
                    <a href="<?php echo home_url('/'); ?>" class="site-logo">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ykic-poke-ball-logo.png" alt="You Know It Cards" class="header-logo">
                    </a>
                </div>
                
                <nav id="site-navigation" class="main-navigation">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                        <span class="menu-toggle-icon"></span>
                    </button>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'nav-menu',
                        'container'      => false,
                        'fallback_cb'    => 'ykic_default_menu'
                    ));
                    ?>
                </nav>
                
                <div class="header-signup">
                    <a href="<?php echo home_url('/signup/'); ?>" class="signup-header-btn">Sign Up</a>
                </div>
            </div>
        </div>
    </header>

    <div id="content" class="site-content"> 