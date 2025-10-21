<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    
    <style>
    /* COMPACT NAVIGATION STYLES */
    .nav-menu {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        list-style: none;
        margin: 0;
        padding: 0;
    }
    
    .nav-menu li a {
        color: #fff;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.9rem;
        padding: 8px 12px;
        border-radius: 8px;
        transition: all 0.3s ease;
        white-space: nowrap;
    }
    
    .nav-menu li a:hover {
        background: rgba(255, 255, 255, 0.1);
        color: #ffd700;
    }
    
    /* MOBILE NAVIGATION */
    @media screen and (max-width: 768px) {
        .nav-menu {
            flex-direction: column;
            gap: 8px;
            width: 100%;
        }
        
        .nav-menu li a {
            font-size: 0.85rem;
            padding: 10px 15px;
            text-align: center;
            display: block;
        }
        
        .main-navigation {
            width: 100%;
        }
        
        .ct-container {
            flex-direction: column;
            gap: 15px;
        }
        
        .site-branding {
            text-align: center;
        }
        
        .header-signup {
            text-align: center;
        }
    }
    
    /* TABLET NAVIGATION */
    @media screen and (max-width: 1024px) and (min-width: 769px) {
        .nav-menu {
            gap: 10px;
        }
        
        .nav-menu li a {
            font-size: 0.85rem;
            padding: 6px 10px;
        }
    }
    
    /* HAMBURGER MENU STYLES */
    .menu-toggle {
        background: none;
        border: none;
        color: #fff;
        font-size: 1.5rem;
        cursor: pointer;
        padding: 10px;
        display: none;
    }
    
    @media screen and (max-width: 768px) {
        .menu-toggle {
            display: block;
        }
        
        .nav-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.9);
            backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 0 0 15px 15px;
            z-index: 1000;
        }
        
        .nav-menu.active {
            display: flex;
        }
    }
    </style>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.querySelector('.menu-toggle');
        const navMenu = document.querySelector('.nav-menu');
        
        if (menuToggle && navMenu) {
            menuToggle.addEventListener('click', function() {
                navMenu.classList.toggle('active');
                const isActive = navMenu.classList.contains('active');
                menuToggle.setAttribute('aria-expanded', isActive);
            });
            
            // Close menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!menuToggle.contains(event.target) && !navMenu.contains(event.target)) {
                    navMenu.classList.remove('active');
                    menuToggle.setAttribute('aria-expanded', 'false');
                }
            });
        }
    });
    </script>
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